<?php

class subcategory
{
    private $subcategory_id;
    private $subcategory_name; 
    private $subcategory_stock;
    private $subcategory_price;
    private $serial_number;
    private $category_id;
    private $db;

    //conexion base de datos

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getsubcategory_id()
    {
        return $this->subcategory_id;
    }

    public function getsubcategory_name()
    {
        return $this->subcategory_name;
    }

    public function getsubcategory_stock()
    {
        return $this->subcategory_stock;
    }
    public function getsubcategory_price()
    {
        return $this->subcategory_price;
    }
    public function getserial_number()
    {
        return $this->serial_number;
    }
    public function getcategory_id()
    {
        return $this->category_id;
    }

    public function setsubcategory_id($subcategory_id)
    {
        $this->subcategory_id = $subcategory_id;
    }

    public function setsubcategory_name($subcategory_name)
    {
        $this->subcategory_name = $subcategory_name;
    }
    public function setsubcategory_stock($subcategory_stock)
    {
        $this->subcategory_stock = $subcategory_stock;
    }
    public function setsubcategory_price($subcategory_price)
    {
        $this->subcategory_price = $subcategory_price;
    }
    public function setserial_number($serial_number)
    {
        $this->serial_number = $serial_number;
    }
    public function setcategory_id($category_id)
    {
        $this->category_id = $category_id;
    }

    public function showSubcategories()
    {
        $row=false;
        $sql = "SELECT * FROM subcategory WHERE category_id = '{$this->getcategory_id()}' ORDER BY subcategory_name";
        $save = $this -> db -> query($sql);//var_dump($sql);
        if($save){  
            return $save;
        }else{
            $row = false;
            return $row;
        }
    }

    public function showSubcategory()
    {
        $row=false;
        $sql = "SELECT * FROM subcategory WHERE subcategory_id = '{$this->getsubcategory_id()}' ";
        $save = $this -> db -> query($sql);//var_dump($sql);
        if($save){  
            return $save;
        }else{
            $row = false;
            return $row;
        }
    }

    public function edit_subcategory()
    {
        $sql = "UPDATE subcategory SET
               subcategory_name = '{$this->getsubcategory_name()}',
               subcategory_stock = '{$this->getsubcategory_stock()}',
               subcategory_price = '{$this->getsubcategory_price()}',
               serial_number = '{$this->getserial_number()}'

               WHERE 
               subcategory_id = '{$this->getsubcategory_id()}';";
        $save = $this -> db -> query($sql);var_dump($sql);
        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function save_subcategory()
    {

        $sql = "INSERT INTO subcategory SET 
             subcategory_id = null,
             subcategory_name = '{$this -> getsubcategory_name()}',
             subcategory_stock = '{$this -> getsubcategory_stock()}',
             subcategory_price = '{$this -> getsubcategory_price()}',
             serial_number = '{$this -> getserial_number()}',

             category_id = '{$this -> getcategory_id()}'
             ;";
        $save = $this->db -> query($sql);
        $result = false;
        //var_dump($sql);die;
        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function delete_subcategory()
    {
        $sql = "DELETE FROM subcategory WHERE subcategory_id = '{$this -> getsubcategory_id()}';";
        $save = $this -> db -> query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }

    

}
