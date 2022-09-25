<?php

class Supplier
{
    public $supplier_id;
    public $supplier_name;
    public $supplier_address;
    public $supplier_cif;
    public $supplier_account;
    private $db;

 //conexion base de datos

 public function __construct($supplier_id)
 {
    $this->db = Database::connect();

    if(!$supplier_id == 0)
    {
    $data = $this -> set_supplier($supplier_id);
    
    $this -> supplier_id = $data -> supplier_id;
    $this -> supplier_name = $data -> supplier_name;
    $this -> supplier_address = $data -> supplier_address;
    $this -> supplier_cif = $data -> supplier_cif;
    $this -> supplier_account = $data -> supplier_account;
   

    }else{
    echo "nada";
    }


 }

 public function getSupplier_id()
    {
        return $this->supplier_id;
    }
    public function getSupplier_name()
    {
        return $this -> supplier_name;
    }
    public function getSupplier_address()
    {
        return $this->supplier_address;
    }
    public function getSupplier_cif()
    {
        return $this->supplier_cif;
    }
    public function getSupplier_account()
    {
        return $this->supplier_account;
    }
  
    public function setSupplier_id($supplier_id)
    {
        $this->supplier_id = $supplier_id;
    }
    public function setSupplier_name($supplier_name)
    {
        $this->supplier_name = $supplier_name;
    }
    public function setSupplier_address($supplier_address)
    {
        $this->supplier_address = $supplier_address;
    }
    public function setSupplier_cif($supplier_cif)
    {
        $this->supplier_cif = $supplier_cif;
    }
    public function setSupplier_account($supplier_account)
    {
        $this->supplier_account = $supplier_account;
    }
    
    

public function set_supplier($id)
{
    $sql = "SELECT * FROM supplier WHERE supplier_id = '$id'"; 
    $save = $this->db->query($sql);
    $data = mysqli_fetch_object ($save);
    return $data; 
}

public function get_supplier()
{
    $sql = "SELECT * FROM supplier";
    $save = $this -> db -> query($sql);
    return $save;
}



}