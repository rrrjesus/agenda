<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Core\Session;
use Source\Models\Auth;
use Source\Models\Contact;
use Source\Models\Sector;
use Source\Models\User;
use Source\Support\Message;
use Source\Support\Thumb;
use Source\Support\Upload;

/**
 *
 */
class Dashboard extends Controller
{

    /** @var User */
    private $user;

    /**
     * App constructor.
     */
    public function __construct()
    {
        parent::__construct(__DIR__."/../../themes/" . CONF_VIEW_THEME_APP);
        date_default_timezone_set('America/Sao_Paulo');

        if(!$this->user = Auth::user()){
            $this->message->warning("Efetue login para acessar o Sistema")->flash();
            redirect("/entrar");
        }

        //UNCONFIRMED EMAIL
        if ($this->user->status != "confirmed") {
            $session = new Session();
            if (!$session->has("appconfirmed")) {
                $this->message->info("IMPORTANTE: Acesse seu e-mail para confirmar seu cadastro e ativar todos os recursos.")->flash();
                $session->set("appconfirmed", true);
                (new Auth())->register($this->user);
            }
        }
    }


    /*
     * AGENDA HOME
     */
    /** @return void */
    public function homeDash(): void
    {
        $head = $this->seo->render(
            "Contatos - " . CONF_SITE_NAME ,
            "Lista de Contatos",
            url("/dashboard"),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("home-dash",
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

    /*
     * AGENDA CONTATOS
     */
    /** @return void */
    public function contactDash(): void
    {
        $head = $this->seo->render(
            "Contatos - " . CONF_SITE_NAME ,
            "Lista de Contatos",
            url("/dashboard"),
            theme("/assets/images/share.jpg")
        );

        $contact = (new Contact());
        $contactlista = $contact->find("status = :s", "s=post")->fetch(true);
        $lixeira = $contact->find("status = :s", "s=trash")->fetch(true);
        $lixo = (!empty($lixeira) ? count($lixeira) : '');

        echo $this->view->render("contact-list",
            [
                "head" => $head,
                "contactlista" => $contactlista,
                "lixo" => $lixo
            ]);

    }

    /** @return void */
    public function contactTrashDash(): void
    {
        $head = $this->seo->render(
            "Lixeira de Contatos - " . CONF_SITE_NAME ,
            "Lixeira de Contatos",
            url("/dashboard/lixeira-contatos"),
            theme("/assets/images/share.jpg")
        );

        $contact = (new Contact())->find("status = :s", "s=trash")->fetch(true);

        echo $this->view->render("contact-list-trash",
            [
                "head" => $head,
                "contact" => $contact
            ]);

    }

    /** @return void
     * @param null|array $data
     */
    public function registerContact(?array $data): void // O ?array $data é pela existência de duas rotas com o mesmo método
    {
        if(!empty($data['csrf'])) {
            if (!csrf_verify($data)) {
                $json['message'] = $this->message->error("Erro ao enviar, favor use o formulário")->icon()->render();
                echo json_encode($json);
                return;
            }

            if(in_array("", $data)){
                $json['message'] = $this->message->info("Informe o setor, nome e ramal para criar contato")->icon()->render();
                echo json_encode($json);
                return;
            }

            $dataSector = (new Sector())->findyBySector($data["sector"])->id;

            $contact = new Contact();
            $contact->bootstrap(
                strtoupper($dataSector),
                strtoupper($data["collaborator"]),
                $data["ramal"]
            );

            if($contact->register($contact)){
                $json['redirect'] = url("/dashboard/cadastrar-contato");
            } else {
                $json['message'] = $contact->message()->icon()->render();
            }
            echo json_encode($json);
            return;
        }

        $head = $this->seo->render(
            "Cadastro de Contato - " . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url("/dashboard/cadastrar-contato"),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("contact-register",
            [
                "head" => $head
            ]);
    }

    /** @param array $data
     * @return void */
    public function updatedContact(array $data):void
    {

        if(!empty($data['csrf'])) {
            if(!empty($data['csrf'])) {
                if (!csrf_verify($data)) {
                    $json['message'] = $this->message->error("Erro ao enviar, favor use o formulário")->icon()->render();
                    echo json_encode($json);
                    return;
                }

                if(in_array("", $data)){
                    $json['message'] = $this->message->info("Informe o setor, nome e ramal para criar contato")->icon()->render();
                    echo json_encode($json);
                    return;
                }

                $id = $data['id'];
                $contacts = (new Contact());

                if($contacts->findById($id)->status == "trash"){
                    $json['message'] = $this->message->warning("O contato informado está na lixeira !!!")->icon()->render();
                    echo json_encode($json);
                    return;
                }

                $sectors = (new Sector());
                if(!isset($sectors->findyBySector($data["sector"])->id)){
                    $json['message'] = $this->message->warning("Informe um setor cadastrado !!!")->icon()->render();
                    echo json_encode($json);
                    return;
                }

                if($sectors->findyBySector($data["sector"])->status == "trash"){
                    $json['message'] = $this->message->warning("O setor informado está na lixeira !!!")->icon()->render();
                    echo json_encode($json);
                    return;
                }

                $dataSector = $sectors->findyBySector($data["sector"])->id;

                $contact = new Contact();

                $contact->bootstrapId(
                    $data["id"],
                    $dataSector,
                    $data["collaborator"],
                    $data["ramal"]
                );

                if($contact->updated($contact)){
                    $json['redirect'] = url("/dashboard/listar-contatos");
                } else {
                    $json['message'] = $contact->message()->icon()->render();
                }
                echo json_encode($json);
                return;
            }
        }

        $id = $data['id'];
        $edit = (new Contact())->findById($id);
        $sector = (new Sector())->findById($edit->sector);

        $head = $this->seo->render(
            "Edição de Contato - " . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url("/dashboard/editar-contato/{$id}"),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("contact-edit",
            [
                "head" => $head,
                "edit" => $edit,
                "sector" => $sector
            ]);
    }

    /** @param array $data
     * @return void */
    public function deletedContact(array $data):void
    {
        if(!empty($data['id'])) {
            $contact = new Contact();
            $contact->bootstrapTrash(
                $data['id'],
                "trash",
                (new \DateTime())->format("Y-m-d H:i:s")
            );
            $contact->deleted($contact);
        }
    }

    /** @param array $data
     * @return void */
    public function reactivatedContact(array $data):void
    {

        if(!empty($data['id'])) {
            $contact = new Contact();
            $contact->bootstrapTrash(
                $data['id'],
                "post",
                ""
            );
            $contact->reactivated($contact);
        }
    }

    public function deleteContact(array $data):void
    {
        if(!empty($data['id'])) {
            $contact = new Contact();
            $contact->bootstrapTrash(
                $data['id'],
                "trash",
                (new \DateTime())->format("Y-m-d H:i:s")
            );
            $contact->delet($contact);
        }
    }

    /*
     * AGENDA SETORES
     */
    /** @return void */
    public function sectorDash(): void
    {
    $head = $this->seo->render(
        "Setores - " . CONF_SITE_NAME ,
        "Setores de SMSUB",
        url("/agenda"),
        theme("/assets/images/share.jpg")
    );

    $sector = (new Sector());
    $sectorlista = $sector->find("status = :s", "s=post")->fetch(true);
    $lixeira = $sector->find("status = :s", "s=trash")->fetch(true);
    $lixo = (!empty($lixeira) ? count($lixeira) : '');

    echo $this->view->render("sector-list",
        [
            "head" => $head,
            "sectorlista" => $sectorlista,
            "lixo" => $lixo
        ]);
    }

    /** @return void */
    public function sectorTrashDash(): void
    {
    $head = $this->seo->render(
        "Lixeira de Setores - " . CONF_SITE_NAME ,
        "Lixeira de Setores",
        url("/dashboard/lixeira-setores"),
        theme("/assets/images/share.jpg")
    );

    $sectorlist = (new Sector())->find("status = :s", "s=trash")->fetch(true);
    echo $this->view->render("sector-list-trash",
        [
            "head" => $head,
            "sectorlist" => $sectorlist
        ]);

}

    /** @return void */
    public function registerSector(?array $data): void // O ?array $data é pela existência de duas rotas com o mesmo método
    {
        if(!empty($data['csrf'])) {
            if (!csrf_verify($data)) {
                $json['message'] = $this->message->error("Erro ao enviar, favor use o formulário")->icon()->render();
                echo json_encode($json);
                return;
            }

            if(in_array("", $data)){
                $json['message'] = $this->message->info("Informe o setor !!!")->icon()->render();
                echo json_encode($json);
                return;
            }

            $sector = new Sector();
            $sector->bootstrapSector(
                strtoupper($data["sector"])
            );

            if($sector->register($sector)){
                $json['redirect'] = url("/dashboard/cadastrar-setor");
            } else {
                $json['message'] = $sector->message()->icon()->render();
            }
            echo json_encode($json);
            return;
        }

        $head = $this->seo->render(
            "Cadastro de Setor - " . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url("/dashboard/cadastrar-setor"),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("sector-register",
            [
                "head" => $head
            ]);
    }

    /** @param array $data
     * @return void */
    public function updatedSector(array $data):void
    {
        if(!empty($data['csrf'])) {
            if(!empty($data['csrf'])) {
                if (!csrf_verify($data)) {
                    $json['message'] = $this->message->error("Erro ao enviar, favor use o formulário")->icon()->render();
                    echo json_encode($json);
                    return;
                }

                if(in_array("", $data)){
                    $json['message'] = $this->message->info("Informe o setor !!!")->icon()->render();
                    echo json_encode($json);
                    return;
                }

                $sector = new Sector();
                $sector->bootstrap(
                    $data["id"],
                    $data["sector"]
                );

                //
                if($sector->updated($sector)){
                    $json['redirect'] = url("/dashboard/listar-setores");
                } else {
                    $json['message'] = $sector->message()->icon()->render();
                }
                echo json_encode($json);
                return;
            }
        }

        $id = $data['id'];
        $edit = (new Sector())->findById($id);

        $head = $this->seo->render(
            "Edição de Setor - " . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url("/dashboard/editar-setor/{$id}"),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("sector-edit",
            [
                "head" => $head,
                "edit" => $edit
            ]);
    }

    /** @param array $data
     * @return void */
    public function deletedSector(array $data):void
    {
        if(!empty($data['id'])) {

            $id = $data['id'];
            $cont = (new Contact())->find("sector=:s", "s=$id")->fetch();

            if($cont) {
                $this->message->warning("Exclusão não realizada, existem contatos na agenda vinculados ao setor !!!")->icon("exclamation-octagon")->flash();
                redirect("/dashboard/listar-setores");
            }

            $sector = new Sector();
            $sector->bootstrapTrash(
                $data['id'],
                "trash",
                (new \DateTime())->format("Y-m-d H:i:s")
            );
            $sector->deleted($sector);
        }
    }

    /** @param array $data
     * @return void */
    public function reactivatedSector(array $data):void
    {
        if(!empty($data['id'])) {
            $sector = new Sector();
            $sector->bootstrapTrash(
                $data['id'],
                "post",
                ""
            );
            $sector->reactivated($sector);
        }
    }

    /** @param array $data
     * @return void */
    public function deleteSector(array $data):void
    {
        if(!empty($data['id'])) {
            $sector = new Sector();
            $sector->bootstrapTrash(
                $data['id'],
                "trash",
                (new \DateTime())->format("Y-m-d H:i:s")
            );
            $sector->delet($sector);
        }
    }

    /** AGENDA USUARIOS
     */
    public function userDash(): void
    {
        $head = $this->seo->render(
            "Usuários - " . CONF_SITE_NAME ,
            "Listando usuários do sistema",
            url("/agenda"),
            theme("/assets/images/share.jpg")
        );

        $user = (new User());
        $userId = (new Auth())->user();
        $userlista = $user->find("id != :i", "i={$userId->id}")->fetch(true);
        $lixeira = $user->find("status = :s", "s=trash")->fetch(true);
        $lixo = (!empty($lixeira) ? count($lixeira) : '');

        echo $this->view->render("user-list",
            [
                "head" => $head,
                "userlista" => $userlista,
                "lixo" => $lixo
            ]);

    }

    /** @return void */
    public function userTrashDash(): void
    {
        $head = $this->seo->render(
            "Lixeira de Usuarios - " . CONF_SITE_NAME ,
            "Lixeira de Usuários",
            url("/dashboard/lixeira-usuarios"),
            theme("/assets/images/share.jpg")
        );

        $userlista = (new User())->find("status = :s", "s=trash")->fetch(true);

        echo $this->view->render("user-list-trash",
            [
                "head" => $head,
                "userlista" => $userlista
            ]);

    }


    /**
     * @return void
     * @param null|array $data
     */
    public function registerUser(?array $data): void // O ?array $data é pela existência de duas rotas com o mesmo método
    {
        if(!empty($data['csrf'])) {
            if (!csrf_verify($data)) {
                $json['message'] = $this->message->error("Erro ao enviar, favor use o formulário")->icon()->render();
                echo json_encode($json);
                return;
            }

            if(in_array("", $data)){
                $json['message'] = $this->message->info("Informe todos os dados para criar o usuário !!!")->icon()->render();
                echo json_encode($json);
                return;
            }
            $auth = new Auth();
            $user = new User();
            $user->bootstrap(
                $data['first_name'],
                $data['last_name'],
                $data['email'],
                $data['functional_record'],
                $data['password']
            );

            if($auth->register($user)){
                $json['redirect'] = url("/dashboard/cadastrar-usuario");
            } else {
                $json['message'] = $auth->message()->icon()->render();
            }
            echo json_encode($json);
            return;
        }

        $head = $this->seo->render(
            "Criar Conta - " . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url("/cadastrar"),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("user-register",
            [
                "head" => $head
            ]);
    }

    /** @param array $data
     * @return void */
    public function updatedUser(array $data):void
    {
        if(!empty($data['csrf'])) {
            if(!empty($data['csrf'])) {
                if (!csrf_verify($data)) {
                    $json['message'] = $this->message->error("Erro ao enviar, favor use o formulário")->icon()->render();
                    echo json_encode($json);
                    return;
                }

                if(in_array("", $data)){
                    $json['message'] = $this->message->icon("exclamation-triangle")->info("Informe todos os campos para criar usuário")->after("Ooops !!! ")->render();
                    echo json_encode($json);
                    return;
                }

                $id = $data['id'];
                $user = (new User());

                if($user->findById($id)->status == "trash"){
                    $json['message'] = $this->message->warning("O usuário informado está na lixeira !!!")->icon()->render();
                    echo json_encode($json);
                    return;
                }

                $user->bootstrapId(
                    $data['id'],
                    $data['first_name'],
                    $data['last_name'],
                    $data['email'],
                    $data['functional_record']
                );

                if($user->updated($user)){
                    $json['redirect'] = url("/dashboard/listar-usuarios");
                } else {
                    $json['message'] = $user->message()->icon()->render();
                }
                echo json_encode($json);
                return;
            }
        }

        $id = $data['id'];
        $edit = (new User())->findById($id);

        $head = $this->seo->render(
            "Edição de Usuário - " . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url("/dashboard/editar-usuario/{$id}"),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("user-edit",
            [
                "head" => $head,
                "edit" => $edit
            ]);
    }

    /** @param array $data
     * @return void */
    public function deletedUser(array $data):void
    {
        if(!empty($data['id'])) {
            $user = new User();
            $user->bootstrapTrash(
                $data['id'],
                "trash",
                (new \DateTime())->format("Y-m-d H:i:s")
            );
            $user->deleted($user);
        }
    }

    /** @param array $data
     * @return void */
    public function deleteUser(array $data):void
    {
        if(!empty($data['id'])) {
            $user = new User();
            $user->bootstrapTrash(
                $data['id'],
                "trash",
                (new \DateTime())->format("Y-m-d H:i:s")
            );
            $user->delet($user);
        }
    }

    /** @param array $data
     * @return void */
    public function reactivatedUser(array $data):void
    {
        if(!empty($data['id'])) {
            $user = new User();
            $user->bootstrapTrash(
                $data['id'],
                "confirmed",
                ""
            );
            $user->reactivated($user);
        }
    }

    /**
     * @param array|null $data
     * @throws \Exception
     */
    public function profile(?array $data): void
    {
        if (!empty($data["update"])) {
            list($d, $m, $y) = explode("/", $data["datebirth"]);
            $user = (new User())->findById($this->user->id);
            $user->first_name = $data["first_name"];
            $user->last_name = $data["last_name"];
            $user->genre = $data["genre"];
            $user->datebirth = "{$y}-{$m}-{$d}";
            $user->document = preg_replace("/[^0-9]/", "", $data["document"]);

            if (!empty($_FILES["photo"])) {
                $file = $_FILES["photo"];
                $upload = new Upload();

                if ($this->user->photo()) {
                    (new Thumb())->flush("storage/{$this->user->photo}");
                    $upload->remove("storage/{$this->user->photo}");
                }

                if (!$user->photo = $upload->image($file, "{$user->first_name} {$user->last_name} " . time(), 360)) {
                    $json["message"] = $upload->message()->before("Ooops {$this->user->first_name}! ")->after(".")->render();
                    echo json_encode($json);
                    return;
                }
            }

            if (!empty($data["password"])) {
                if (empty($data["password_re"]) || $data["password"] != $data["password_re"]) {
                    $json["message"] = $this->message->warning("Para alterar sua senha, informa e repita a nova senha!")->render();
                    echo json_encode($json);
                    return;
                }

                $user->password = $data["password"];
            }

            if (!$user->save()) {
                $json["message"] = $user->message()->render();
                echo json_encode($json);
                return;
            }

            $json["message"] = $this->message->success("Pronto {$data["first_name"]}. Seus dados foram atualizados com sucesso !!!")->icon("emoji-smile")->render();
            echo json_encode($json);
            return;
        }

        $head = $this->seo->render(
            "Meu perfil - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

        echo $this->view->render("user-profile", [
            "head" => $head,
            "user" => $this->user,
            "photo" => ($this->user->photo() ? image($this->user->photo, 360, 360) :
                theme("/assets/images/avatar.jpg", CONF_VIEW_THEME_APP))
        ]);
    }


    /** @return void */
    public function userProfile(array $data):void
    {
        if(!empty($data['csrf'])) {
            if(!empty($data['csrf'])) {
                if (!csrf_verify($data)) {
                    $json['message'] = $this->message->error("Erro ao enviar, favor use o formulário")->icon()->render();
                    echo json_encode($json);
                    return;
                }

                if(in_array("", $data)){
                    $json['message'] = $this->message->after("Ooops, ")->info("Preencha todos os campos !!!")->icon("exclamation-octagon")->render();
                    echo json_encode($json);
                    return;
                }

                $id = $data['id'];
                $user = (new User());

                if($user->findById($id)->status == "trash"){
                    $json['message'] = $this->message->warning("O usuário informado está na lixeira !!!")->icon()->render();
                    echo json_encode($json);
                    return;
                }

                $user->bootstrapId(
                    $data['id'],
                    $data['first_name'],
                    $data['last_name'],
                    $data['email'],
                    $data['functional_record']
                );

                if($user->updated($user)){
                    $json['redirect'] = url("/dashboard/perfil");
                } else {
                    $json['message'] = $user->message()->icon()->render();
                }
                echo json_encode($json);
                return;
            }
        }
        $head = $this->seo->render(
            "Edição de Usuário - " . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url("/dashboard/perfil"),
            theme("/assets/images/share.jpg")
        );

    $edit = (new Auth())->user();

    echo $this->view->render("user-profile",
        [
            "head" => $head,
            "edit" => $edit
        ]);
    }




}