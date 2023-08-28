<?php

namespace Source\App;

use mysql_xdevapi\Session;
use Source\Core\Controller;
use Source\Models\Auth;
use Source\Models\Contact;
use Source\Models\PanelContact;
use Source\Models\Post;
use Source\Models\Sector;
use Source\Models\User;
use Source\Support\Message;

/**
 *
 */
class App extends Controller
{
    /**
     *
     */
    public function __construct()
    {
        parent::__construct(__DIR__."/../../themes/" . CONF_VIEW_THEME_APP);
        //var_dump(Auth::user());
        //var_dump((new Contact())->register("24", "RODOLFO", "3354"));
       // var_dump((new Contact())->findByRamal("3424"));
        if(!Auth::user()){
            $this->message->warning("Efetue login para acessar o Sistema")->flash();
            redirect("/entrar");
        }
        
        //Restrição
    }

    /**
     * SITE HOME
     */
    public function homeApp(): void
    {
        $head = $this->seo->render(
            "Usuários - " . CONF_SITE_NAME ,
            "Listando usuários do sistema",
            url("/agenda"),
            theme("/assets/images/share.jpg")
        );

        $users = (new User())->find()->fetch(true);
        //$user_session = (new Auth())->user();

        echo $this->view->render("home-app",
            [
                "head" => $head,
                "user_session" => Auth::user(),
                "users" => $users
            ]);
    }


    /**
     * SITE HOME
     */
    public function contactApp(): void
    {
        $head = $this->seo->render(
            "Usuários - " . CONF_SITE_NAME ,
            "Agenda com dados dos colaboradores",
            url("/agenda"),
            theme("/assets/images/share.jpg")
        );

        $contact = (new Contact())->find()->fetch(true);
        $user = (new Auth())->user();

        echo $this->view->render("contact-app",
            [
                "head" => $head,
                "contact" => $contact,
                "user" => $user
            ]);
    }

    /**
     * @return void
     */
    public function sectorApp(): void
    {
        $head = $this->seo->render(
            "Usuários - " . CONF_SITE_NAME ,
            "Setores de SMSUB",
            url("/agenda"),
            theme("/assets/images/share.jpg")
        );

        $sector = (new Sector())->find()->fetch(true);

        echo $this->view->render("sector-app",
            [
                "head" => $head,
                "sector" => $sector
            ]);
    }


    /**
     * SITE FORGET RESET
     * @param array $data
     * @return void
     */
    public function register(array $data): void
    {

        if(!empty($data['csrf'])) {
            if (!csrf_verify($data)) {
                $json['message'] = $this->message->error("Erro ao enviar, favor use o formulário")->render();
                echo json_encode($json);
                return;
            }

            if(in_array("", $data)){
                $json['message'] = $this->message->info("Informe os dados do contato")->render();
                echo json_encode($json);
                return;
            }

            $contact = new Contact();

            if($contact->findByRamal($data['ramal'])) {
                $json['message'] = $this->message->info("O Ramal informado pertence a outro contato")->render();
                echo json_encode($json);
                return;
            }

            if ($contact->register($data['sector'], $data['collaborator'], $data['ramal'])){
                $this->message->success("Contato {$data['collaborator']} criado com sucesso!!!")->flash();
                $json["redirect"] = url("/app/contato");
            }else{
                $json["message"] = $contact->message()->render();
            }

            echo json_encode($json);
            return;
        }

        $head = $this->seo->render(
            "Cadastro de Contato - " . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url("/app/contato"),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("contact-register",
            [
                "head" => $head
            ]);
    }

    /**
     * @return void
     */
    public function registerSector(): void
    {

        $head = $this->seo->render(
            "Setores - " . CONF_SITE_NAME ,
            "Setores de SMSUB",
            url("/app/setores/cadastrar"),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("sector-register-app",
            [
                "head" => $head
            ]);
    }

    /**
     * @return void
     */
    public function logout()
    {
        (new Message())->info("Você saiu com sucesso " . Auth::user()->first_name . " Volta logo :)")->flash();
        Auth::logout();
        redirect("/entrar");
    }
}