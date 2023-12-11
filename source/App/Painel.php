<?php

namespace Source\App;

use Source\Core\Controller;

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

}