<?php

namespace Source\Models;

use Source\Core\Model;

/**
 *
 */
class Post extends Model
{

    public function __construct()
    {
        parent::__construct("posts", ["id"], ["views"]);
    }

    public function chartPostLabel()
    {
        $stb = $this->chart("view", "view");
        return $stb;
    }

    public function chartPost()
    {
        $this->chart("view", "view");
        return true;
    }

    public function chart($name, $colums)
    {
        $stm = $this->find("","",$colums);

        if(!empty($stm)):
            foreach ($stm->fetch(true) as $row):
                $dataPoints [] = $row->$name;
            endforeach;
            echo json_encode($dataPoints, JSON_NUMERIC_CHECK); //Return the JSON Array
        endif;
        return null;
    }

    /**
     * @return bool
     */
    public function save(): bool
    {
            $postId = $this->id;
            $this->update($this->safe(), "id = :id", "id={$postId}");
            return true;
    }
}