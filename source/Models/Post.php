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

    public function chartPost($columns)
    {
        $stm = $this->find("","",$columns);
        $dataPoints = array();

        if(!empty($stm)):
            foreach ($stm->fetch(true) as $row):
                $dataPoints [] = array("y" => $row->views, "label" => $row->uri);
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