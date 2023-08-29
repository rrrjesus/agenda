<?php

namespace Source\App;

use Source\Core\Connect;
use Source\Core\Controller;
use Source\Models\Auth;
use Source\Models\Contact;
use Source\Models\Dashboard;
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
        //var_dump([(new Dashboard())->completeSector("sector_name")]);
        //var_dump((new Contact())->register("24", "RODOLFO", "3354"));
       // var_dump((new Contact())->findByRamal("3424"));
        //var_dump((new Contact())->findByRamal(3005));
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
     * @return void
     * @param null|array $data
     */
    public function register(?array $data): void // O ?array $data é pela existência de duas rotas com o mesmo método
    {
        if(!empty($data['csrf'])) {
            if (!csrf_verify($data)) {
                $json['message'] = $this->message->error("Erro ao enviar, favor use o formulário")->render();
                echo json_encode($json);
                return;
            }

            if(in_array("", $data)){
                $json['message'] = $this->message->info("Informe o setor, nome e ramal para criar contato")->render();
                echo json_encode($json);
                return;
            }

            $dash = new Dashboard();
            $contact = new Contact();
            $contact->bootstrap(
                $data["sector"],
                $data["collaborator"],
                $data["ramal"]
            );

            if($dash->register($contact)){
                $json['redirect'] = url("/app/contato");
            } else {
                $json['message'] = $dash->message()->render();
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

    public function updateContact(array $data):void
    {

        if(!empty($data['csrf'])) {
            if(!empty($data['csrf'])) {
                if (!csrf_verify($data)) {
                    $json['message'] = $this->message->error("Erro ao enviar, favor use o formulário")->render();
                    echo json_encode($json);
                    return;
                }

                if(in_array("", $data)){
                    $json['message'] = $this->message->info("Informe o setor, nome e ramal para criar contato")->render();
                    echo json_encode($json);
                    return;
                }

                $dash = new Dashboard();
                $contact = new Contact();
                $contact->bootstrapId(
                    $data["id"],
                    $data["sector"],
                    $data["collaborator"],
                    $data["ramal"]
                );

                if($dash->register($contact)){
                    $json['redirect'] = url("/app/agenda");
                } else {
                    $json['message'] = $dash->message()->render();
                }
                echo json_encode($json);
                return;
            }
        }

        $ramal = $data['ramal'];
        $edit = (new Contact())->findByRamal($ramal);

        $head = $this->seo->render(
            "Edição de Contato - " . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url("/app/contato"),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("contact-edit",
            [
                "head" => $head,
                "edit" => $edit
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