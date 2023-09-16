<?php

namespace Source\Models;

use Source\Core\Model;

/**
 *
 */
class Sector extends Model
{
    /**
     *
     */
    public function __construct()
    {
        parent::__construct("sectors", ["id"], ["sector_name"]);
    }

    /**
     * @param string $uri
     * @param string $columns
     * @return Category|null
     */
    public function findyBySector(string $sector, string $columns = "*"): ?Sector
    {
        $find = $this->find("sector_name = :s", "s={$sector}", $columns);
        return $find->fetch();
    }

    public function findBySectorId(string $id, string $columns = "*"): ?Sector
    {
        $find = $this->find("id = :id", "id={$id}", $columns);
        return $find->fetch();
    }

    public function bootstrapSector(
        string $sector
    ): Sector
    {
        $this->sector_name = $sector;
        return $this;
    }

    public function bootstrapIdSector(
        string $id,
        int $sector
    ): Sector
    {
        $this->id = $id;
        $this->sector = $sector;
        return $this;
    }

    public function bootstrapTrashSector(
        string $id,
        string $status
    ): Sector
    {
        $this->id = $id;
        $this->status = $status;
        return $this;
    }

    public function save(): bool
    {
        /** Setor Update */
        if (!empty($this->id)) {
            $sectorId = $this->id;

            if ($this->find("sector_name = :s AND id != :i", "s={$this->sector_name}&i={$sectorId}", "id")->fetch()) {
                $this->message->warning("O setor informado já está cadastrado !!!");
                return false;
            }

            $this->update($this->safe(), "id = :id", "id={$sectorId}");
            if ($this->fail()) {
                $this->message->error("Erro ao atualizar, verifique os dados");
                return false;
            }
        }

        /** Setor Create */
        if (empty($this->id)) {
            if ($this->findyBySector($this->sector_name, "id")) {
                $this->message->warning("O Setor informado já está cadastrado !!!");
                return false;
            }

            $sectorId = $this->create($this->safe());

            if ($this->fail()) {
                $this->message->error("Erro ao cadastrar, verifique os dados");
                return false;
            }
        }

        $this->data = ($this->findById($sectorId))->data();
        return true;
    }
}