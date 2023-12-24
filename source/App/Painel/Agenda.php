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
    public function list(): void
    {
        $head = $this->seo->render(
            "Painel de Contatos - " . CONF_SITE_NAME ,
            "Painel para gerenciamento da lista de contatos",
            url("/painel/agenda/contatos"),
            theme("/assets/images/share.jpg")
        );

        $contact = (new Contact());
        $contatos = $contact->find("status = :s", "s=post")->fetch(true);

        echo $this->view->render("widgets/agenda/list",
            [
                "app" => "agenda",
                "head" => $head,
                "contatos" => $contatos,
                "ramais" => (object)[
                    "ativos" => $contact->find("status = :s", "s=post")->count(),
                    "desativados" => $contact->find("status = :s", "s=trash")->count()
                ]
            ]);

    }

    /**
     * @param array|null $data
     * @throws \Exception
     */
    /** @return void */
    public function trash(): void
    {
        $head = $this->seo->render(
            "Lixeira de Contatos - " . CONF_SITE_NAME ,
            "Painel para gerenciamento da lixeira de contatos",
            url("/painel/agenda/lixeira"),
            theme("/assets/images/share.jpg")
        );

        $contact = (new Contact());
        $contacts = $contact->find("status = :s", "s=trash")->fetch(true);
        $lixeira = $contact->find("status = :s", "s=trash")->count();

        echo $this->view->render("widgets/agenda/trash",
            [
                "app" => "agenda",
                "head" => $head,
                "contacts" => $contacts,
                "lixeira" => $lixeira
            ]);

    }

    /** @return void */
    public function sectors(): void
    {
        $head = $this->seo->render(
            "Painel - Setores - " . CONF_SITE_NAME ,
            "Lista de Setores",
            url("/painel"),
            theme("/assets/images/share.jpg")
        );

        $sector = (new Sector());
        $sectors = $sector->find("status = :s", "s=post")->fetch(true);

        echo $this->view->render("widgets/agenda/sectors",
            [
                "app" => "agenda",
                "head" => $head,
                "sectors" => $sectors,
                "sector" => (object)[
                    "ativos" => $sector->find("status = :s", "s=post")->count(),
                    "desativados" => $sector->find("status = :s", "s=trash")->count()
                ]
            ]);

    }

    /** @return void
     * @param null|array $data
     */
    public function contact(?array $data): void // O ?array $data é pela existência de duas rotas com o mesmo método
    {
        if(!empty($data['csrf'])) {
            //create
            if (!empty($data["action"]) && $data["action"] == "create") {

                $data = filter_var_array($data, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                if(in_array("", $data)){
                    $json['message'] = $this->message->info("Digite o setor, nome e ramal para criar o contato ...")->icon()->render();
                    echo json_encode($json);
                    return;
                }

                if (!csrf_verify($data)) {
                    $json['message'] = $this->message->error("Erro ao cadastrar, verifique os dados ...")->icon()->render();
                    echo json_encode($json);
                    return;
                }

                if(is_ramal( $data["ramal"])){
                    $json['message'] = $this->message->warning("O Ramal informado não é válido !!!")->icon()->render();
                    echo json_encode($json);
                    return;
                }

                $dataSector = (new Sector())->findyBySector($data["sector"])->id;

                $contactCreate = new Contact();

                if ( $contactCreate->findByRamal( $data["ramal"], "id")) {
                    $json['message'] = $this->message->warning("O Ramal informado já esta cadastrado")->icon()->render();
                    echo json_encode($json);
                    return;
                }

                $contactCreate->sector = $dataSector;
                $contactCreate->collaborator = strtoupper($data["collaborator"]);
                $contactCreate->ramal = $data["ramal"];

                if (!$contactCreate->save()) {
                    $json["message"] = $contactCreate->message()->icon()->render();
                    echo json_encode($json);
                    return;
                }

                $this->message->success("Cadastro de {$data["collaborator"]} salvo com sucesso ...")->icon()->flash();
                $json["redirect"] = url("/painel/agenda/contatos");

                echo json_encode($json);
                return;
            }

            //update
            if (!empty($data["action"]) && $data["action"] == "update") {
                $data = filter_var_array($data, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $contactEdit = (new Contact())->findById($data["contact_id"]);
                $contact = (new Contact());

                if ($contact->find("ramal = :r AND id != :i", "r={$data["ramal"]}&i={$data["contact_id"]}", "id")->fetch()) {
                    $json['message'] = $this->message->warning("O Ramal informado pertence a outro contato")->icon()->render();
                    echo json_encode($json);
                    return;
                }

                if (!$contactEdit) {
                    $this->message->error("Você tentou atualizar um contato que não existe ou foi removido")->icon()->flash();
                    echo json_encode(["redirect" => url("/painel/agenda/lista")]);
                    return;
                }

                $dataSector = (new Sector())->findyBySector($data["sector"])->id;

                $contactEdit->sector = $dataSector;
                $contactEdit->collaborator = strtoupper($data["collaborator"]);
                $contactEdit->ramal = $data["ramal"];

                if (!$contactEdit->save()) {
                    $json["message"] = $contactEdit->message()->icon()->render();
                    echo json_encode($json);
                    return;
                }

                $this->message->success("Contato de ".ucfirst(strtolower($data["collaborator"]))." ramal {$data["ramal"]} atualizado com sucesso...")->icon("check2-all")->flash();
                $json["redirect"] = url("/painel/agenda/lista");
                echo json_encode($json);
                return;
            }

            //delete
            if (!empty($data["action"]) && $data["action"] == "delete") {
                $data = filter_var_array($data, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $contactDelete = (new Contact())->findById($data["contact_id"]);

                if (!$contactDelete) {
                    $this->message->error("Você tentou excluir um contato que não existe ou já foi removido")->flash();
                    $json["redirect"] = url("/painel/agenda/lista");
                    echo json_encode($json);
                    return;
                }

                $contactDelete->destroy();
                $this->message->success("Contato de ".ucfirst(strtolower($data["collaborator"]))." ramal {$data["ramal"]} foi excluído com sucesso...")->icon("check2-all")->flash();
                $json["redirect"] = url("/painel/agenda/lista");
                echo json_encode($json);
                return;
            }
        }

        $contactEdit = null;
        if (!empty($data["contact_id"])) {
            $contactId = filter_var($data["contact_id"], FILTER_VALIDATE_INT);
            $contactEdit = (new Contact())->findById($contactId);
        }

        $head = $this->seo->render(
            "Contatos - " . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url("/painel/agenda/contatos/novo"),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("widgets/agenda/contact",
            [
                "app" => "agenda",
                "head" => $head,
                "contact" => $contactEdit
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