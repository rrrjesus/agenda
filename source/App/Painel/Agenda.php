<?php

namespace Source\App\Painel;

use Source\Models\Contact;
use Source\Models\Report\Online;
use Source\Models\Sector;
use Source\Models\User;

class Agenda extends Painel
{

    /**
     * Agenda constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /*
     * AGENDA DE SETORES
     */

    /**
     * @param array|null $data
     * @throws \Exception
     */

    /** @return void */
    public function activedSectors(): void
    {
        $head = $this->seo->render(
            "Setores Ativados - " . CONF_SITE_NAME ,
            "Painel para gerenciamento de setores ativados",
            url("/painel/agenda/setores/ativados"),
            theme("/assets/images/share.jpg")
        );

        $sector = (new Sector());
        $sectors = $sector->find("status = :s", "s=actived")->fetch(true);

        echo $this->view->render("widgets/agenda/sectors/actived",
            [
                "app" => "agenda",
                "head" => $head,
                "sectors" => $sectors,
                "painel" => (object)[
                    "ativos" => $sector->find("status = :s", "s=actived")->count(),
                    "desativados" => $sector->find("status = :s", "s=disabled")->count()
                ]
            ]);

    }

    /**
     * @param array|null $data
     * @throws \Exception
     */
    /** @return void */
    public function disabledSectors(): void
    {
        $head = $this->seo->render(
            "Setores Desativados - " . CONF_SITE_NAME ,
            "Painel para gerenciamento de setores desativados",
            url("/painel/agenda/setores/desativados"),
            theme("/assets/images/share.jpg")
        );

        $sector = (new Sector());
        $sectors = $sector->find("status = :s", "s=disabled")->fetch(true);
        $lixeira = $sector->find("status = :s", "s=disabled")->count();

        echo $this->view->render("widgets/agenda/sectors/disabled",
            [
                "app" => "agenda",
                "head" => $head,
                "sectors" => $sectors,
                "lixeira" => $lixeira
            ]);

    }

    /** @return void
     * @param null|array $data
     */
    public function sector(?array $data): void // O ?array $data é pela existência de duas rotas com o mesmo método
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

                $sectorCreate = new Sector();

                $sectorCreate->id = $sectorId;

                if ($sectorCreate->find("sector_name = :s AND id != :i", "s={$sectorCreate->sector_name}&i={$sectorId}", "id")->fetch()) {
                    $json['message'] = $this->message->warning("O setor informado já está cadastrado");
                    echo json_encode($json);
                    return;
                }

                $sectorCreate->sector = $data["sector"];

                if (!$sectorCreate->save()) {
                    $json["message"] = $sectorCreate->message()->icon()->render();
                    echo json_encode($json);
                    return;
                }

                $this->message->success("Cadastro de {$data["sector"]} salvo com sucesso ...")->icon()->flash();
                $json["redirect"] = url("/painel/agenda/setores/setor");
                echo json_encode($json);
                return;
            }

            //update
            if (!empty($data["action"]) && $data["action"] == "update") {
                $data = filter_var_array($data, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $sectorEdit = (new Sector())->findById($data["sector_id"]);
                $sector = (new Sector());

                if ($sector->find("sector_name = :s AND id != :i", "s={$data["sector"]}&i={$data["sector_id"]}", "id")->fetch()) {
                    $json['message'] = $this->message->warning("O Setor informado já existe ...")->icon()->render();
                    echo json_encode($json);
                    return;
                }

                if (!$sectorEdit) {
                    $this->message->error("Você tentou atualizar um setor que não existe ou foi removido")->icon()->flash();
                    echo json_encode(["redirect" => url("/painel/agenda/ramais/ativados")]);
                    return;
                }

                $sectorEdit->sector_name = $data["sector"];

                if (!$sectorEdit->save()) {
                    $json["message"] = $sectorEdit->message()->icon()->render();
                    echo json_encode($json);
                    return;
                }

                $this->message->success("Setor {$data["sector"]} atualizado com sucesso...")->icon("check2-all")->flash();
                $json["redirect"] = url("/painel/agenda/setores/ativados");
                echo json_encode($json);
                return;
            }
        }

        $sectorEdit = null;
        if (!empty($data["sector_id"])) {
            $sectorId = filter_var($data["sector_id"], FILTER_VALIDATE_INT);
            $sectorEdit = (new Sector())->findById($sectorId);
        }

        $head = $this->seo->render(
            "Setores - " . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url("/painel/agenda/setores/setor"),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("widgets/agenda/sectors/sector",
            [
                "app" => "agenda",
                "head" => $head,
                "sector" => $sectorEdit
            ]);
    }


    /*
     * AGENDA DE RAMAIS
     */

    /**
     * @param array|null $data
     * @throws \Exception
     */
    /** @return void */
    public function activedExtensions(): void
    {
        $head = $this->seo->render(
            "Ramais Ativados - " . CONF_SITE_NAME ,
            "Painel para gerenciamento de ramais ativados",
            url("/painel/agenda/ramais/ativados"),
            theme("/assets/images/share.jpg")
        );

        $contact = (new Contact());
        $contatos = $contact->find("status = :s", "s=actived")->fetch(true);

        echo $this->view->render("widgets/agenda/extensions/actived",
            [
                "app" => "agenda",
                "head" => $head,
                "contatos" => $contatos,
                "ramais" => (object)[
                    "ativos" => $contact->find("status = :s", "s=actived")->count(),
                    "desativados" => $contact->find("status = :s", "s=disabled")->count()
                ]
            ]);

    }

    /**
     * @param array|null $data
     * @throws \Exception
     */
    /** @return void */
    public function disabledExtensions(): void
    {
        $head = $this->seo->render(
            "Ramais Desativados - " . CONF_SITE_NAME ,
            "Painel para gerenciamento de ramais desativados",
            url("/painel/agenda/ramais/desativados"),
            theme("/assets/images/share.jpg")
        );

        $contact = (new Contact());
        $contacts = $contact->find("status = :s", "s=disabled")->fetch(true);
        $lixeira = $contact->find("status = :s", "s=disabled")->count();

        echo $this->view->render("widgets/agenda/extensions/disabled",
            [
                "app" => "agenda",
                "head" => $head,
                "contacts" => $contacts,
                "lixeira" => $lixeira
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

                $sectors = (new Sector());
                if(!isset($sectors->findyBySector($data["sector"])->id)){
                    $json['message'] = $this->message->warning("Informe um setor cadastrado !!!")->icon()->render();
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

                $this->message->success("Cadastro de {$data["collaborator"]} - ramal : {$data["ramal"]} salvo com sucesso ...")->icon()->flash();
                $json["redirect"] = url("/painel/agenda/ramais/ramal");

                echo json_encode($json);
                return;
            }

            //update
            if (!empty($data["action"]) && $data["action"] == "update") {
                $data = filter_var_array($data, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $contactEdit = (new Contact())->findById($data["ramal_id"]);
                $contact = (new Contact());

                if ($contact->find("ramal = :r AND id != :i", "r={$data["ramal"]}&i={$data["ramal_id"]}", "id")->fetch()) {
                    $json['message'] = $this->message->warning("O Ramal informado pertence a outro contato")->icon()->render();
                    echo json_encode($json);
                    return;
                }

                $sectors = (new Sector());
                if(!isset($sectors->findyBySector($data["sector"])->id)){
                    $json['message'] = $this->message->warning("Informe um setor cadastrado !!!")->icon()->render();
                    echo json_encode($json);
                    return;
                }

                if (!$contactEdit) {
                    $this->message->error("Você tentou atualizar um contato que não existe ou foi removido")->icon()->flash();
                    echo json_encode(["redirect" => url("/painel/agenda/ramais/ativados")]);
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
                $json["redirect"] = url("/painel/agenda/ramais/ativados");
                echo json_encode($json);
                return;
            }
        }

        $contactEdit = null;
        if (!empty($data["ramal_id"])) {
            $contactId = filter_var($data["ramal_id"], FILTER_VALIDATE_INT);
            $contactEdit = (new Contact())->findById($contactId);
        }

        $head = $this->seo->render(
            "Contatos - " . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url("/painel/agenda/ramais/ramal"),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("widgets/agenda/extensions/contact",
            [
                "app" => "agenda",
                "head" => $head,
                "contact" => $contactEdit
            ]);
    }

    /** @param array $data
     * @return void */
    public function disabledExtension(?array $data): void
    {
        if (!empty($data["ramal_id"])) {
            $data = filter_var_array($data, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $ramalDisable = (new Contact())->findById($data["ramal_id"]);

            if (!$ramalDisable) {
                $this->message->error("Você tentou desabilitar um ramal que não existe ou foi removido")->icon()->flash();
                redirect("/painel/agenda/ramais/ativados");
                return;
            }

            $ramalDisable->status = "disabled";
            $ramalDisable->updated_at = (new \DateTime())->format("Y-m-d H:i:s");

            if (!$ramalDisable->save()) {
                $ramalDisable->message()->icon()->render();
                redirect("/painel/agenda/ramais/ativados");
                return;
            }

        }

        $this->message->success("Ramal {$ramalDisable->ramal} desabilitado com sucesso...")->icon("check2-all")->flash();
        redirect("/painel/agenda/ramais/ativados");
    }

    /** @param array $data
     * @return void */
    public function activatedExtension(?array $data): void
    {
        if (!empty($data["ramal_id"])) {
            $data = filter_var_array($data, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $ramalDisable = (new Contact())->findById($data["ramal_id"]);

            if (!$ramalDisable) {
                $this->message->error("Você tentou desabilitar um ramal que não existe ou foi removido")->icon()->flash();
                redirect("/painel/agenda/ramais/desativados");
                return;
            }

            $ramalDisable->status = "actived";
            $ramalDisable->updated_at = (new \DateTime())->format("Y-m-d H:i:s");

            if (!$ramalDisable->save()) {
                $ramalDisable->message()->icon()->render();
                redirect("/painel/agenda/ramais/desativados");
                return;
            }

        }

        $this->message->success("Ramal {$ramalDisable->ramal} ativado com sucesso...")->icon("check2-all")->flash();
        redirect("/painel/agenda/ramais/desativados");
    }

    /** @param array $data
     * @return void */
    public function deletedExtension(?array $data): void
    {
        if (!empty($data["ramal_id"])) {
            $data = filter_var_array($data, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $ramalDisable = (new Contact())->findById($data["ramal_id"]);

            if (!$ramalDisable) {
                $this->message->error("Você tentou excluir um ramal que não existe ou foi removido")->icon()->flash();
                redirect("/painel/agenda/ramais/ativados");
                return;
            }

            $ramalDisable->destroy();
        }

        $this->message->success("Ramal {$ramalDisable->ramal} excluido com sucesso...")->icon("trash")->flash();
        redirect("/painel/agenda/ramais/ativados");
    }
}