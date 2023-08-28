<?php

namespace Source\Models;

use Source\Core\Model;

/**
 *
 */
class ContactOk extends Model
{

    /**
     * @param bool $all = ignore status and post_at
     */
    public function __construct()
    {
        parent::__construct("contacts", ["id"], ["collaborator", "ramal"]);
    }

    /**
     * @param string $uri
     * @param string $columns
     * @return Contact|null
     */
    public function findBySector(string $sector_name, string $columns = "*"): ?ContactOk
    {
        $find = $this->find("sector_name = :sector_name", "uri={$sector_name}", $columns);
        return $find->fetch();
    }

    /**
     * @param string $ramal
     * @param string $columns
     * @return null|Contact
     */
    public function findByRamal(string $ramal, string $columns = "*"): ?ContactOk
    {
        $find = $this->find("ramal = :ramal", "ramal={$ramal}", "ramal");
        return $find->fetch();
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
     * @param string $email
     * @param string $code
     * @param string $password
     * @param string $passwordRe
     * @return bool
     */
    public function register(string $sector, string $collaborator, string $ramal): bool
    {
        $contact = new ContactOk();

        if (!$contact){
            $this->message->warning("O contato não foi cadastrado!");
            return false;
        }

        $contact->sector = $sector;
        $contact->collaborator = $collaborator;
        $contact->ramal = $ramal;
        $contact->save();
        return true;

    }


    /**
     * @return bool
     */
    public function save(): bool
    {
        /** User Update */
        if (!empty($this->id)) {

            $contactId = $this->id;

            if ($this->find("ramal = :r AND id != :i", "r={$this->ramal}&i={$contactId}", "id")->fetch()) {
                $this->message->warning("O ramal informado já está cadastrado");
                return false;
            }

            $this->update($this->safe(), "id = :id", "id={$contactId}");
            if ($this->fail()) {
                $this->message->error("Erro ao atualizar, verifique os dados");
                return false;
            }
        }

        /** User Create */
        if (empty($this->id)) {
            if ($this->findByRamal($this->ramal, "id")) {
                $this->message->warning("O Ramal informado pertence a outro contato");
                return false;
            }

            $contactId = $this->create($this->safe());

            if ($this->fail()) {
                $this->message->error("Erro ao cadastrar, verifique os dados");
                return false;
            }
        }

        $this->data = ($this->findById($contactId))->data();
        return true;
    }
}