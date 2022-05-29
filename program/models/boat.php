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

    public function search_db()
    {
        $name = $this->getBoat_name();
        $sql = "SELECT * FROM `boat` WHERE boat_name LIKE '%$name%'";
        $result = $this->db->query($sql);
   
        return $result; 
    }

  public function boat_name($data)
  {
    $sql = "SELECT * FROM boat b INNER JOIN costumer c ON c.costumer_id = b.costumer_id WHERE boat_id = '$data'";
    $get_result = $this->db->query($sql);
    $result=mysqli_fetch_object($get_result);
   
    return $result;
  }

    public function getData($id)
    {
        $sql = "select * from costumer co
              INNER JOIN boat bo 
              ON co.costumer_id = bo.costumer_id 
              WHERE co.costumer_id={$id}";

        $query = $this->db->query($sql);
        $var = $query->fetch_object();

        return $var;
    }

    public function update()
    {
    }
}
