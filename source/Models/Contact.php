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
     * @param string $id
     * @param int $sector
     * @param string $collaborator
     * @param string $ramal
     * @return $this
     */
    public function bootstrapId(
        string $id,
        int $sector,
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
     * @param string $id
     * @param string $status
     * @return $this
     */
    public function bootstrapTrash(
        string $id,
        string $status
    ): Contact
    {
        $this->id = $id;
        $this->status = $status;
        return $this;
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
            if ($this->find("ramal = :r", "r={$this->ramal}", "id")->fetch()) {
                $this->message->warning("O Ramal informado pertence a outro contato");
                return false;
            }

            if(is_ramal($this->ramal)){
                $this->message->warning("O Ramal informado não é válido !!!");
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

    public function sector(): ?Sector
    {
        if($this->sector) {
            return(new Sector())->findById($this->sector);
        }
        return null;
    }
}