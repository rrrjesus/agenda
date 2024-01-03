<?php

namespace Source\Models;

use Source\Core\Model;

/**
 *
 */
class Sector extends Model
{
    public function __construct()
    {
        parent::__construct("sectors", ["id"], ["sector_name"]);
    }

    /** @param string $uri
     * @param string $columns
     * @return Sector|null
     */
    public function findyBySector(string $sector, string $columns = "*"): ?Sector
    {
        $find = $this->find("sector_name = :s", "s={$sector}", $columns);
        return $find->fetch();
    }

    /**
     * @param string $sector
     * @param string $columns
     * @return null|Sector
     */
    public function findBySector(string $sector, string $columns = "*"): ?Sector
    {
        $find = $this->find("sector_name = :s", "s={$sector}", $columns);
        return $find->fetch();
    }

    /** @return Sector|null
     */
    public function sector(): ?Sector
    {
        if(!empty($this->sector)) {
            return(new Sector())->findById($this->sector);
        }
        return null;
    }

    static function completeSector($columns): ?Sector
    {
        $stm = (new Sector())->find("status=:s","s=actived",$columns);
        $array = array();

        if(!empty($stm)):
            foreach ($stm->fetch(true) as $row):
                $array[] = $row->sector_name;
            endforeach;
            echo json_encode($array); //Return the JSON Array
        endif;
        return null;
    }
}