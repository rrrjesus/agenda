<?php

use Source\Models\Sector;

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
