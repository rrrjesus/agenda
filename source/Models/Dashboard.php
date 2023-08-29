<?php

namespace Source\Models;

use Source\Core\Model;

class Dashboard extends Model
{
    public function __construct()
    {
        parent::__construct("contacts", ["id"], ["sector", "collaborator", "ramal"]);
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

    /**
     * @param Contact $contact
     * @return bool
     */
    public function register(Contact $contact): bool // Só aceita um objeto da Classe User e bool só retorna true e false
    {
        if(!$contact->save()) {
            $this->message = $contact->message;
            return false;
        }elseif(!empty($this->id)){
            $this->message->success("Edição de {$this->collaborator} salva com sucesso!!!")->flash();
        }else{
            $this->message->success("Cadastro de {$this->collaborator} salvo com sucesso!!!")->flash();
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

    static function completeRamal($columns): ?Contact
    {
        $stm = (new Contact())->find("","",$columns);
        $array = array();

        if(!empty($stm)):
            foreach ($stm->fetch(true) as $row):
                $array[] = $row->ramal;
            endforeach;
            echo json_encode($array); //Return the JSON Array
        endif;
        return null;
    }
}