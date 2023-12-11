<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Models\Auth;
use Source\Support\Message;

class Painel extends Controller
{
    public function __construct()
    {

        /**  Construtor para carregar template  */
        parent::__construct(__DIR__."/../../themes/" . CONF_VIEW_THEME_PANEL);
    }

    public function home(): void
    {

        $head = $this->seo->render(
            "Contatos - " . CONF_SITE_NAME ,
            "Lista de Contatos",
            url("/dashboard"),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("home",
        [
            "head" => $head
        ]);
    }

    /** @return void */
    public function logout()
    {
        (new Message())->info("Você saiu com sucesso " . Auth::user()->first_name . " Volta logo :)")->flash();
        Auth::logout();
        redirect("/entrar");
    }


}