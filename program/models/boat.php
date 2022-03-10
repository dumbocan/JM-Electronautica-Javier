<?php

class Boat 
{
    private $boat_id;
    private $boat_name;
    private $marina;
    private $type;
    private $costumer_id;

    private $db;

    //conexion base de datos

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getBoat_id()
    {
        return $this->boat_id;
    }

    public function getBoat_name()
    {
        return $this->boat_name;
    }

    public function getMarina()
    {
        return $this->marina;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getCostumer_id()
    {
        return $this->costumer_id;
    }

    public function setBoat_id($boat_id)
    {
        $this->boat_id = $boat_id;
    }

    public function setBoat_name($boat_name)
    {
        $this->boat_name = $boat_name;
    }

    public function setMarina($marina)
    {
        $this->marina = $marina;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setCostumer_id($costumer_id)
    {
        $this->costumer_id = $costumer_id;
    }

    public function save()
    {
        $sql = "INSERT INTO boat VALUES (null,
                                            '{$this->getBoat_name()}',
                                            '{$this->getMarina()}',   
                                            '{$this->getType()}',
                                            '{$this->getCostumer_id()}'
                                            );";

        $save = $this->db->query($sql);
        
        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }

    
}
