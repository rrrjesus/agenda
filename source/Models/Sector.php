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

    /**
     * @return bool
     */
    public function save(): bool
    {

    }
}