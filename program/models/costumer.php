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

    public function delete()
    {
        $sql = "DELETE FROM costumer WHERE costumer_name = '{$this->getCostumer_name()}'";
        $result = $this->db->query($sql);

        return $result;
    }

    public function search_db()
    {
        $name = $this->getCostumer_name();
        $sql = "SELECT * FROM `costumer` WHERE costumer_name LIKE '%$name%'";
        $result = $this->db->query($sql);

        return $result;
    }

    public function costumer_name($data)
    {
        $sql = "SELECT * FROM costumer c INNER JOIN boat b ON b.costumer_id = c.costumer_id WHERE costumer_name = '$data'";
        $get_result = $this->db->query($sql);
        $result = mysqli_fetch_object($get_result);

        return $result;
    }

    public function update()
    {
        $sql = "UPDATE costumer SET 
    
    costumer_name = '{$this->getCostumer_name()}',
    address = '{$this->getAddress()}',   
    passport = '{$this->getPassport()}',
    country = '{$this->getCountry()}',
    telephone = '{$this->getTelephone()}',
    email = '{$this->getEmail()}'
    WHERE costumer_id = '{$this->getCostumer_id()}';";

        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
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

        $result = false;
        if ($save) {
            $result = true;
        }
        $id = mysqli_insert_id($this->db);
        $iduser = $this->setCostumer_id($id);

        return $result.$iduser;
    }

    public function getOne()
    {
    }
}
