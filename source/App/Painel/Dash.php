<?php

namespace Source\App\Painel;

use Source\App\Painel\Painel;
use Source\Models\Auth;
use Source\Models\CafeApp\AppPlan;
use Source\Models\CafeApp\AppSubscription;
use Source\Models\Report\Online;
use Source\Models\User;

/**
 * Class Dash
 * @package Source\App\Admin
 */
class Dash extends Painel
{
    /**
     * Dash constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     *
     */
    public function dash(): void
    {
        redirect("/painel/dash/home");
    }

    /**
     * @param array|null $data
     * @throws \Exception
     */
    public function home(?array $data): void
    {
        //real time access
        if (!empty($data["refresh"])) {
            $list = null;
            $items = (new Online())->findByActive();
            if ($items) {
                foreach ($items as $item) {
                    $list[] = [
                        "dates" => date_fmt($item->created_at, "H\hi") . " - " . date_fmt($item->updated_at, "H\hi"),
                        "user" => ($item->user ? $item->user()->fullName() : "Guest User"),
                        "pages" => $item->pages,
                        "url" => $item->url
                    ];
                }
            }

            echo json_encode([
                "count" => (new Online())->findByActive(true),
                "list" => $list
            ]);
            return;
        }

        $head = $this->seo->render(
            CONF_SITE_NAME . " | Dashboard",
            CONF_SITE_DESC,
            url("/painel"),
            theme("/assets/images/image.jpg", CONF_VIEW_THEME_PANEL),
            false
        );

        echo $this->view->render("widgets/dash/home", [
            "app" => "dash",
            "head" => $head,
            "users" => (object)[
                "users" => (new User())->find("level < 5")->count(),
                "admins" => (new User())->find("level >= 5")->count()
            ],
            "online" => (new Online())->findByActive(),
            "onlineCount" => (new Online())->findByActive(true)
        ]);
    }

    /**
     *
     */
    public function logoff(): void
    {
        $this->message->success("Você saiu com sucesso {$this->user->first_name}.")->icon("check2-all")->flash();

        Auth::logout();
        redirect("/painel/login");
    }
}