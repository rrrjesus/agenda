<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Models\Auth;
use Source\Models\Contact;
use Source\Models\ContactPanel;
use Source\Models\Sector;
use Source\Models\SectorPanel;
use Source\Models\User;
use Source\Support\Message;

/**
 *
 */
class Dashboard extends Controller
{
    /**
     *
     */
    public function __construct()
    {
        parent::__construct(__DIR__."/../../themes/" . CONF_VIEW_THEME_APP);
        //var_dump([(new ContactPanel())->completeSector("sector_name")]);

        if(!Auth::user()){
            $this->message->warning("Efetue login para acessar o Sistema")->flash();
            redirect("/entrar");
        }
    }

    /**
     * SITE HOME
     */
    public function homeDash(): void
    {
        $head = $this->seo->render(
            "Contatos - " . CONF_SITE_NAME ,
            "Lista de Contatos",
            url("/dashboard"),
            theme("/assets/images/share.jpg")
        );

        $contact = (new Contact())->find()->fetch(true);

        echo $this->view->render("home-dash",
            [
                "head" => $head,
                "contact" => $contact
            ]);

    }

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

    public function userProfile()
    {
        $user = (new Auth())->user();

        echo $this->view->render("user-profile",

            [
                "head" => $head,
                "user" => $user
            ]);
    }


    /**
     * SITE HOME
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

        echo $this->view->render("user-dash",
            [
                "head" => $head,
                "users" => $users
            ]);
    }

    /**
     * @return void
     */
    public function sectorDash(): void
    {
        $head = $this->seo->render(
            "Setores - " . CONF_SITE_NAME ,
            "Setores de SMSUB",
            url("/agenda"),
            theme("/assets/images/share.jpg")
        );

        $sector = (new Sector())->find()->fetch(true);

        echo $this->view->render("sector-list",
            [
                "head" => $head,
                "sector" => $sector
            ]);
    }

    /**
     * @return void
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

            $dash = new ContactPanel();
            $contact = new Contact();
            $contact->bootstrap(
                strtoupper($dataSector),
                strtoupper($data["collaborator"]),
                $data["ramal"]
            );

            if($dash->register($contact)){
                $json['redirect'] = url("/dashboard/cadastrar-contato");
            } else {
                $json['message'] = $dash->message()->render();
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

                $sectorId = (new Sector());
                if(!isset($sectorId->findyBySector($data["sector"])->id)){
                    $json['message'] = $this->message->warning("Informe um setor cadastrado !!!")->render();
                    echo json_encode($json);
                    return;
                }

                $dataSector = $sectorId->findyBySector($data["sector"])->id;

                $dash = new ContactPanel();
                $contact = new Contact();
                $contact->bootstrapId(
                    $data["id"],
                    $dataSector,
                    $data["collaborator"],
                    $data["ramal"]
                );

                //
                if($dash->updated($contact)){
                    $json['redirect'] = url("/dashboard/listar-contatos");
                } else {
                    $json['message'] = $dash->message()->render();
                }
                echo json_encode($json);
                return;
            }
        }

        $id = $data['id'];
        $edit = (new Contact())->findById($id);
        $sector = (new Sector())->findById($edit->sector)->sector_name;

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

    public function deletedContact(array $data):void
    {

        if(!empty($data['id'])) {
            $dash = new ContactPanel();
            $contact = new Contact();
            $contact->bootstrapTrash(
                $data['id'],
                "trash"
            );
            $dash->deleted($contact);
        }
    }

    public function reactivatedContact(array $data):void
    {

        if(!empty($data['id'])) {
            $dash = new ContactPanel();
            $contact = new Contact();
            $contact->bootstrapTrash(
                $data['id'],
                "post"
            );
            $dash->reactivated($contact);
        }
    }

    /**
     * @return void
     */
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
            $dashSector = new SectorPanel();
            $sector->bootstrapSector(
                strtoupper($data['sector'])
            );

            if($dashSector->register($sector)){
                $json['redirect'] = url("/dashboard/cadastrar-setor");
            } else {
                $json['message'] = $dashSector->message()->render();
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

                $sectorId = (new Sector());
                if(!isset($sectorId->findyBySector($data["sector"])->id)){
                    $json['message'] = $this->message->warning("Informe um setor cadastrado !!!")->render();
                    echo json_encode($json);
                    return;
                }

                $dataSector = $sectorId->findyBySector($data["sector"])->id;

                $dashSector = new SectorPanel();
                $sector = new Sector();
                $sector->bootstrapIdSector(
                    $data["id"],
                    $dataSector
                );

                //
                if($dashSector->updated($sector)){
                    $json['redirect'] = url("/dashboard/listar-setores");
                } else {
                    $json['message'] = $dashSector->message()->render();
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

    public function deletedSector(array $data):void
    {

        if(!empty($data['id'])) {
            $dashSector = new SectorPanel();
            $sector = new Sector();
            $sector->bootstrapTrashSector(
                $data['id'],
                "trash"
            );
            $dashSector->deleted($sector);
        }
    }

    public function reactivatedSector(array $data):void
    {

        if(!empty($data['id'])) {
            $dashSector = new SectorPanel();
            $sector = new Sector();
            $sector->bootstrapTrashSector(
                $data['id'],
                "post"
            );
            $dashSector->reactivated($sector);
        }
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