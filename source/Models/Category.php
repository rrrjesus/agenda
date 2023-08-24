<?php

namespace Source\Models;

use Source\Core\Model;

/**
 *
 */
class Category extends Model
{
    /**
     *
     */
    public function __construct()
    {
        parent::__construct("categories", ["id"], ["title", "id"]);
    }

    /**
     * @param string $uri
     * @param string $columns
     * @return Category|null
     */
    public function findyByUri(string $uri, string $columns = "*"): ?Category
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