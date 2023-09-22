<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Models\Auth;
use Source\Models\Contact;
use Source\Models\Post;
use Source\Models\Sector;
use Source\Models\User;
use Source\Support\Message;

/**
 *
 */
class Dashboard extends Controller
{

    /** Contrutor */
    public function __construct()
    {
        parent::__construct(__DIR__."/../../themes/" . CONF_VIEW_THEME_APP);
       // var_dump((new Post())->find()->fetch(true));

        date_default_timezone_set('America/Sao_Paulo');

        if(!Auth::user()){
            $this->message->warning("Efetue login para acessar o Sistema")->flash();
            redirect("/entrar");
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

        $contact = (new Contact())->find()->fetch(true);
        $post = (new Post());
        $post1 = $post->findById(1)->views;
        $post2 = $post->findById(2)->views;
        $post3 = $post->findById(3)->views;

        echo $this->view->render("home-dash",
            [
                "head" => $head,
                "contact" => $contact,
                "post1" => $post1,
                "post2" => $post2,
                "post3" => $post3,
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
                $json['message'] = $this->message->error("Erro ao enviar, favor use o formulário")->render();
                echo json_encode($json);
                return;
            }

            if(in_array("", $data)){
                $json['message'] = $this->message->info("Informe o setor, nome e ramal para criar contato")->render();
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
                $json['message'] = $contact->message()->render();
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
                    $json['message'] = $this->message->error("Erro ao enviar, favor use o formulário")->render();
                    echo json_encode($json);
                    return;
                }

                if(in_array("", $data)){
                    $json['message'] = $this->message->info("Informe o setor, nome e ramal para criar contato")->render();
                    echo json_encode($json);
                    return;
                }

                $id = $data['id'];
                $contacts = (new Contact());

                if($contacts->findById($id)->status == "trash"){
                    $json['message'] = $this->message->warning("O contato informado está na lixeira !!!")->render();
                    echo json_encode($json);
                    return;
                }

                $sectors = (new Sector());
                if(!isset($sectors->findyBySector($data["sector"])->id)){
                    $json['message'] = $this->message->warning("Informe um setor cadastrado !!!")->render();
                    echo json_encode($json);
                    return;
                }

                if($sectors->findyBySector($data["sector"])->status == "trash"){
                    $json['message'] = $this->message->warning("O setor informado está na lixeira !!!")->render();
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
                    $json['message'] = $contact->message()->render();
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
                $json['message'] = $this->message->error("Erro ao enviar, favor use o formulário")->render();
                echo json_encode($json);
                return;
            }

            if(in_array("", $data)){
                $json['message'] = $this->message->info("Informe o setor !!!")->render();
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
                $json['message'] = $sector->message()->render();
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
                    $json['message'] = $this->message->error("Erro ao enviar, favor use o formulário")->render();
                    echo json_encode($json);
                    return;
                }

                if(in_array("", $data)){
                    $json['message'] = $this->message->info("Informe o setor !!!")->render();
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
                    $json['message'] = $sector->message()->render();
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

        $users = (new User())->find()->fetch(true);
        //$user_session = (new Auth())->user();

        echo $this->view->render("user-list",
            [
                "head" => $head,
                "users" => $users
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
                $json['message'] = $this->message->error("Erro ao enviar, favor use o formulário")->render();
                echo json_encode($json);
                return;
            }

            if(in_array("", $data)){
                $json['message'] = $this->message->info("Informe seus dados para criar sua conta")->render();
                echo json_encode($json);
                return;
            }
            $auth = new Auth();
            $user = new User();
            $user->bootstrap(
                $data['first_name'],
                $data['last_name'],
                $data['email'],
                $data['password']
            );

            if($auth->register($user)){
                $json['redirect'] = url("/confirma");
            } else {
                $json['message'] = $auth->message()->render();
            }
            echo json_encode($json);
            return;
        }

        $head = $this->seo->render(
            "Cadastrar Conta - " . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url("/cadastrar"),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("user-register",
            [
                "head" => $head
            ]);
    }

    /** @return void */
    public function userProfile()
    {
    $user = (new Auth())->user();

    echo $this->view->render("user-profile",

        [
            "head" => $head,
            "user" => $user
        ]);
    }




}