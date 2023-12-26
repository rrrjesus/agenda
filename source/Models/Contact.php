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
     * @param string $ramal
     * @param string $columns
     * @return null|Contact
     */
    public function findByRamal(string $ramal, string $columns = "*"): ?Contact
    {
        $find = $this->find("ramal = :ramal", "ramal={$ramal}", $columns);
        return $find->fetch();
    }

    static function completeRamal($columns): ?Contact
    {
        $stm = (new Contact())->find("","",$columns);
        $array = array();

        if(!empty($stm)):
            foreach ($stm->fetch(true) as $row):
                $array[] = $row->ramal;
            endforeach;
            echo json_encode($array); //Return the JSON Array
        endif;
        return null;
    }

    static function completeFone($columns): ?Contact
    {
        $stm = (new Contact())->find("","",$columns);


        if(!empty($stm)):
            foreach ($stm->fetch(true) as $row):
                $array[] = '4934 '.$row->ramal;
            endforeach;
            echo json_encode($array); //Return the JSON Array
        endif;
        return null;
    }

    public function sector(): ?Sector
    {
        if($this->sector) {
            return(new Sector())->findById($this->sector);
        }
        return null;
    }
}