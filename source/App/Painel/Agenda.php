<?php

namespace Source\App\Painel;

use Source\Models\Contact;
use Source\Models\Report\Online;
use Source\Models\Sector;
use Source\Models\User;

class Agenda extends Painel
{

    /**
     * Control constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /*
     * AGENDA CONTATOS
     */

    /**
     * @param array|null $data
     * @throws \Exception
     */
    /** @return void */
    public function contacts(): void
    {
        $head = $this->seo->render(
            "Painel de Contatos - " . CONF_SITE_NAME ,
            "Painel para gerenciamento da lista de contatos",
            url("/painel/agenda/contatos"),
            theme("/assets/images/share.jpg")
        );

        $contatos = (new Contact())->find("status = :s", "s=post")->fetch(true);

        echo $this->view->render("widgets/agenda/contacts",
            [
                "app" => "agenda",
                "head" => $head,
                "ramais" => (object)[
                    "totais" => (new Contact())->find()->count(),
                    "ativos" => (new Contact())->find("status = :s", "s=post")->count(),
                    "desativados" => (new Contact())->find("status = :s", "s=trash")->count()
                ],
                "contatos" => $contatos
            ]);

    }

    /** @return void */
    public function sectors(): void
    {
        $head = $this->seo->render(
            "Painel - Contatos - " . CONF_SITE_NAME ,
            "Lista de Contatos",
            url("/painel"),
            theme("/assets/images/share.jpg")
        );

        $sector = (new Sector());
        $lista = $sector->find("status = :s", "s=active")->fetch(true);
        $trash = $sector->find("status = :s", "s=trash")->fetch(true);
        $lixo = (!empty($lixeira) ? count($lixeira) : '');

        echo $this->view->render("widgets/agenda/lista",
            [
                "app" => "agenda",
                "head" => $head,
                "setores" => (object)[
                    "totais" => (new Sector())->find()->count(),
                    "ativos" => (new Sector())->find("status = :s", "s=active")->count(),
                    "desativados" => (new Sector())->find("status = :s", "s=disable")->count()
                ],
                "ramais" => (object)[
                    "totais" => (new Contact())->find()->count(),
                    "ativos" => (new Contact())->find("status = :s", "s=post")->count(),
                    "desativados" => (new Contact())->find("status = :s", "s=trash")->count()
                ],
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
}