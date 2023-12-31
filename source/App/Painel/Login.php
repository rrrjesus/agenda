<?php

namespace Source\App\Painel;

use Source\Core\Controller;
use Source\Models\Auth;

/**
 * Class Login
 * @package Source\App\Admin
 */
class Login extends Controller
{
    /**
     * Login constructor.
     */
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME_PANEL . "/");
    }

    /**
     * Admin access redirect
     */
    public function root(): void
    {
        $user = Auth::user();

        if ($user && $user->level >= 5) {
            redirect("/painel/dash/home");
        } else {
            redirect("/painel/login");
        }
    }

    /**
     * @param array|null $data
     */
    public function login(?array $data): void
    {
        $user = Auth::user();

        if ($user && $user->level >= 5) {
            redirect("/painel/dash/home");
        }

        if (!empty($data["email"]) && !empty($data["password"])) {
            if (request_limit("loginLogin", 3, 5 * 60)) {
                $json["message"] = $this->message->error("ACESSO NEGADO: Aguarde por 5 minutos para tentar novamente.")->icon()->render();
                echo json_encode($json);
                return;
            }

            $auth = new Auth();
            $login = $auth->login($data["email"], $data["password"], true, 5);

            if ($login) {
                $json["redirect"] = url("/painel/dash/home");
            } else {
                $json["message"] = $auth->message()->render();
            }

            echo json_encode($json);
            return;
        }

        $head = $this->seo->render(
            CONF_SITE_NAME . " | Admin",
            CONF_SITE_DESC,
            url("/admin"),
            theme("/assets/images/image.jpg", CONF_VIEW_THEME_PANEL),
            false
        );

        echo $this->view->render("widgets/login/login", [
            "head" => $head
        ]);
    }
}