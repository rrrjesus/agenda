<?php

namespace Source\Models;

use Source\Core\Model;
use Source\Core\Session;
use Source\Core\View;
use Source\Support\Email;

/**
 *
 */
class Auth extends Model
{
    /**
     * Auth Constructor
     */
    public function __construct()
    {
        parent::__construct("user", ["id"], ["email", "password", "status"]);
    }

    /**
     * @return User|null
     */
    public static function user(): ?User
    {
        $session = new Session();
        if(!$session->has("authUser")){
            return null;
        }
        return (new User())->findById($session->authUser);
    }

    static function remoteUser(): ?User
    {
        $stm = (new User())->find("email =:e", "e='{$_GET['email']}'", "");

        if (!empty($stm)) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }

    /**
     * log-out
     * @return void
     */
    public static function logout(): void
    {
        $session = new Session();
        $session->unset("authUser");
    }

     /**
     * @param User $user
     * @return bool
     */
    public function register(User $user): bool // Só aceita um objeto da Classe User e bool só retorna true e false
    {
        if(!$user->save()) {
            $this->message = $user->message;
            return false;
        }else{
            $this->message->success("Cadastro de {$user->first_name} salvo com sucesso!!!")->icon()->flash();
        }
        return true;
    }

    /**
     * @param string $email
     * @param string $password
     * @param bool $save
     * @return bool
     */
    public function login(string $email, string $password, bool $save = false): bool
    {
        if(!is_email($email)) {
            $this->message->warning("O email informado não é válido");
            return false;
        }

        if($save){
            setcookie("authEmail", $email, time() + 604800, "/");
        }else{
            setcookie("authEmail", "", time() - 3600, "/");
        }

        if(!is_passwd($password)){
            $this->message->warning("A senha informada não é válida")->icon("person-lock");
            return false;
        }

        $user = (new User())->findByEmail($email);
        if(!$user){
            $this->message->error("O e-mail informado não está cadastrado")->icon("exclamation-circle");
            return false;
        }

        if(!passwd_verify($password, $user->password)){
            $this->message->error("A senha informada não confere")->icon("exclamation-circle");
            return false;
        }

        if (passwd_rehash($user->password)) {
            $user->password = passwd($password);
            $user->save();
        }

        //LOGIN
        (new Session())->set("authUser", $user->id);
        $this->message->success("Bem Vindo(a) ".$user->first_name)->icon()->flash();
        return true;
    }

    /**
     * @param string $email
     * @return bool
     */
    public function forget(string $email): bool
    {
        $user = (new User())->findByEmail($email);

        if(!$user){
            $this->message->warning("O email nâo está cadastrado");
            return false;
        }

        $user->forget = md5(uniqid(rand(), true));
        $user->save();

        $view = new View(__DIR__."/../../shared/views/email");
        $message = $view->render("forget", [
            "first_name" => $user->first_name,
            "forget_link" => url("/recuperar/{$user->email}|{$user->forget}")
            ]);
        (new Email())->bootstrap(
            "Recupere sua senha no " . CONF_SITE_NAME,
            "$message",
            $user->email,
        "{$user->first_name} {$user->last_name}"
        )->send();
        return true;
    }

    /**
     * @param string $email
     * @param string $code
     * @param string $password
     * @param string $passwordRe
     * @return bool
     */
    public function reset(string $email, string $code, string $password, string $passwordRe): bool
    {
        $user = (new User())->findByEmail($email);

        if (!$user){
            $this->message->warning("A conta para recuperação não foi encontrada!");
            return false;
        }

        if ($user->forget != $code){
            $this->message->error("Desculpe mas o código de verificação não é válido");
            return false;
        }

        if (!is_passwd($password)){
            $min = CONF_PASSWD_MIN_LEN;
            $max = CONF_PASSWD_MAX_LEN;
            $this->message->info("Sua senha deve ter entre {$min} e {$max} caracteres");
            return false;
        }

        if ($password != $passwordRe){
            $this->message->warning("Você informou duas senhas diferentes");
            return false;
        }

        $user->password = $password;
        $user->forget = null;
        $user->save();
        return true;

    }

}