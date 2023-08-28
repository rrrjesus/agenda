<?php

namespace Source\Models;

use Source\Core\Model;

/**
 *
 */
class Contact extends Model
{
    /**
     *
     */
    public function __construct()
    {
        parent::__construct("contacts", ["id"], ["sector", "collaborator", "ramal"]);
    }

    /**
     * @param string $sector
     * @param string $collaborator
     * @param string $ramal
     * @param string|null $document
     * @return Contact
     */
    public function bootstrap(
        string $sector,
        string $collaborator,
        string $ramal
    ): Contact
    {
        $this->sector = $sector;
        $this->collaborator = $collaborator;
        $this->ramal = $ramal;
        return $this;
    }

    /**
     * @param string $sector
     * @param string $collaborator
     * @param string $ramal
     * @param string|null $document
     * @return Contact
     */
    public function bootstrapId(
        string $id,
        string $sector,
        string $collaborator,
        string $ramal
    ): Contact
    {
        $this->id = $id;
        $this->sector = $sector;
        $this->collaborator = $collaborator;
        $this->ramal = $ramal;
        return $this;
    }

    /**
     * @param string $ramal
     * @param string $columns
     * @return null|Contact
     */
    public function findByRamal(string $ramal, string $columns = "*"): ?Contact
    {
        $find = $this->find("ramal = :ramal", "ramal={$ramal}", $columns);
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
                $this->message->error("Erro ao cadastrar, verifique os dadoss");
                return false;
            }
        }

        $this->data = ($this->findById($contactId))->data();
        return true;
    }

    public function edit(string $sector, string $collaborator, string $ramal):bool
    {
        $contact = (new Contact())->findByRamal($ramal);

        if (!$contact){
            $this->message->warning("O contato para editar não foi encontrado!");
            return false;
        }

        if ($contact->ramal != $ramal){
            $this->message->error("Desculpe mas o contato não é válido");
            return false;
        }

        $contact->sector = $sector;
        $contact->collaborator = $collaborator;
        $contact->ramal = $ramal;
        $contact->save();
        return true;

    }
}