<?php

namespace Source\Models;

use Source\Core\Model;

class Panel extends Model
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

    public function idSector(): ?Sector
    {
        if($this->sector_name) {
            return(new Sector())->findyBySector($this->sector_name);
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
        }else{
            $this->message->success("Cadastro de {$contact->collaborator} salvo com sucesso!!!")->flash();
        }


        return true;
    }

    public function updated(Contact $contact): bool // Só aceita um objeto da Classe User e bool só retorna true e false
    {
        if(!$contact->save()) {
            $this->message = $contact->message;
            return false;
        }else {
            $this->message->warning("Edição de {$contact->collaborator} salva com sucesso!!!")->flash();
        }

        return true;
    }

    public function deleted(Contact $contact): bool // Só aceita um objeto da Classe User e bool só retorna true e false
    {
        if(!$contact->save()) {
            $this->message = $contact->message;
            return false;
        }else {
            $this->message->error("Exclusão de : {$contact->collaborator} - Ramal : {$contact->ramal}salva com sucesso!!!")->flash();
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