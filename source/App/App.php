<?php

namespace Source\App;

use mysql_xdevapi\Session;
use Source\Core\Controller;
use Source\Models\Auth;
use Source\Models\Contact;
use Source\Models\Post;
use Source\Models\Sector;
use Source\Models\User;
use Source\Support\Message;

class App extends Controller
{
    public function __construct()
    {
        parent::__construct(__DIR__."/../../themes/" . CONF_VIEW_THEME_APP);
        //var_dump(Auth::user());
        //var_dump((new Message())->render());
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

    public function contRegisterApp(): void
    {
        $head = $this->seo->render(
            "Usuários - " . CONF_SITE_NAME ,
            "Setores de SMSUB",
            url("/app/agenda/cadastrar"),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("contact-register-app",
            [
                "head" => $head
            ]);
    }

    public function setRegisterApp(): void
    {
        $head = $this->seo->render(
            "Usuários - " . CONF_SITE_NAME ,
            "Setores de SMSUB",
            url("/app/setores/cadastrar"),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("sector-register-app",
            [
                "head" => $head
            ]);
    }

    public function logout()
    {
        (new Message())->info("Você saiu com sucesso " . Auth::user()->first_name . " Volta logo :)")->flash();
        Auth::logout();
        redirect("/entrar");
    }
}