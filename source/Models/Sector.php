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
        parent::__construct("sectors", ["id"], ["name_sector", "id"]);
    }

    /**
     * @param string $uri
     * @param string $columns
     * @return Category|null
     */
    public function findyByUri(string $uri, string $columns = "*"): ?Sector
    {
        $find = $this->find("uri = :uri", "uri={$uri}", $columns);
        return $find->fetch();
    }

    /**
     * @return bool
     */
    public function save(): bool
    {

    }
}