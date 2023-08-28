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
        }else{
            $this->message->success("Cadastro {$contact->collaborator} salvo com sucesso!!!")->flash();
        }

        return true;
    }
}