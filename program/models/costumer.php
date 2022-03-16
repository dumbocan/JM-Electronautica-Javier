<?php

class Costumer 
{
    private $costumer_id;
    private $costumer_name;
    private $address;
    private $passport;
    private $country;
    private $telephone;
    private $email;

    private $db;

    //conexion base de datos

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getCostumer_id()
    {
        return $this->costumer_id;
    }

    public function getCostumer_name()
    {
        return $this->costumer_name;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getPassport()
    {
        return $this->passport;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setCostumer_id($costumer_id)
    {
        $this->costumer_id = $costumer_id;
    }

    public function setCostumer_name($costumer_name)
    {
        $this->costumer_name = $costumer_name;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function setPassport($passport)
    {
        $this->passport = $passport;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function save()
    {
        $sql = "INSERT INTO costumer VALUES (null,
                                            '{$this->getCostumer_name()}',
                                            '{$this->getAddress()}',   
                                            '{$this->getPassport()}',
                                            '{$this->getCountry()}',
                                            '{$this->getTelephone()}',
                                            '{$this->getEmail()}'
                                            );";

        $save = $this->db->query($sql);
        $_SESSION['costumer_id'] = $this->db->insert_id;
        
        $result = false;
        if ($save) {
            $result = true;
        }
        //$id = mysqli_insert_id($this->db);

        return $result;
    }
    public function getData()
    {
        $boatId = $_SESSION['costumer_id']-1;
        $sql="select * from costumer co
              INNER JOIN boat bo 
              ON co.costumer_id = bo.costumer_id 
              WHERE co.costumer_id={$boatId}";
             
        $query = $this->db->query($sql);
        return $query->fetch_object();
        
        
        
    }
    
}
