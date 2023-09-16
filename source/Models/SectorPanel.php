<?php

namespace Source\Models;

use Source\Core\Model;

class SectorPanel extends Model
{
    public function __construct()
    {
        parent::__construct("sectors", ["id"], ["sector_name"]);
    }

    /**
     * @return Category|null
     */
    public function sector(): ?Sector
    {
        if($this->sector) {
            return(new Sector())->findById($this->sector);
        }
        return null;
    }

    public function idSector(): ?Sector
    {
        if($this->sector_name) {
            return(new Sector())->findyBySector($this->sector_name);
        }
        return null;
    }

    /**
     * @param Sector $sector
     * @return bool
     */
    public function register(Sector $sector): bool // Só aceita um objeto da Classe Sector e bool só retorna true e false
    {
        if(!$sector->save()) {
            $this->message = $sector->message;
            return false;
        }else{
            $this->message->success("Cadastro do setor : {$sector->sector_name} salvo com sucesso!!!")->flash();
        }

        return true;
    }

    public function updated(Sector $sector): bool // Só aceita um objeto da Classe User e bool só retorna true e false
    {
        if(!$sector->save()) {
            $this->message = $sector->message;
            return false;
        }else {
            $this->message->warning("Edição de {$sector->sector_name} salva com sucesso!!!")->flash();
        }

        return true;
    }

    public function deleted(Sector $sector): bool // Só aceita um objeto da Classe User e bool só retorna true e false
    {
        if(!$sector->save()) {
            $this->message = $sector->message;
            return false;
        }else {
            $this->message->error("Exclusão de setor : {$sector->sector_name} feita com sucesso!!!")->flash();
            redirect("/dashboard/listar-contatos");
        }

        return true;
    }

    public function reactivated(Sector $sector): bool // Só aceita um objeto da Classe User e bool só retorna true e false
    {
        if(!$sector->save()) {
            $this->message = $sector->message;
            return false;
        }else {
            $this->message->success("Reativação de : {$sector->sector_name} feita com sucesso!!!")->flash();
            redirect("/dashboard/lixeira-contatos");
        }

        return true;
    }

    static function completeSector($columns): ?Sector
    {
        $stm = (new Sector())->find("","",$columns);
        $array = array();

        if(!empty($stm)):
            foreach ($stm->fetch(true) as $row):
                $array[] = $row->sector_name;
            endforeach;
            echo json_encode($array); //Return the JSON Array
        endif;
        return null;
    }
}