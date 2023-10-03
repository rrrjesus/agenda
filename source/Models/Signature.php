<?php

namespace Source\Models;

use Source\Core\Model;

class Signature extends Model
{
    public function __construct()
    {
        parent::__construct("signature", ["id"], ["name"]);
    }

    static function completeName($columns): ?Signature
    {
        $stm = (new Signature())->find("status=:s","s=post",$columns);
        $array = array();

        if(!empty($stm)):
            foreach ($stm->fetch(true) as $row):
                $array[] = $row->name;
            endforeach;
            echo json_encode($array); //Return the JSON Array
        endif;
        return null;
    }

    function retorna($columns) : ?Signature
    {
        $stm = (new Signature())->find("status=:s","s=post",$columns);
        $array = array();

        if (!empty($stm)):
            foreach ($stm->fetch() as $row):
                $array['cargoinp'] = $row->office;
                $array['andarinp'] = $row->floor;
                $array['salainp'] = $row->room;
            endforeach;
            echo json_encode($array);
        endif;
        return null;
    }


}