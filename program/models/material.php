<?php

class Material
{
    public $material_id;
    public $material_name;
    public $material_stock;
    public $material_price;
    public $material_sn;
    public $supplier_id;
    private $db;

 //conexion base de datos

 public function __construct($material_id)
 {
    $this->db = Database::connect();

    if(!$material_id == 0)
    {
    $data = $this -> set_material($material_id);
    
    $this -> material_id = $data -> material_id;
    $this -> material_name = $data -> material_name;
    $this -> material_stock = $data -> material_stock;
    $this -> material_price = $data -> material_price;
    $this -> material_sn = $data -> material_sn;
    $this -> supplier_id = $data -> supplier_id;
    }
 }

    public function getMaterial_id()
    {
        return $this->material_id;
    }
    public function getMaterial_name()
    {
        return $this->material_name;
    }
    public function getMaterial_stock()
    {
        return $this->material_stock;
    }
    public function getMaterial_price()
    {
        return $this->material_price;
    }public function getMaterial_sn()
    {
        return $this->material_sn;
    }public function getSupplier_id()
    {
        return $this->supplier_id;
    }

    public function setMaterial_id($material_id)
    {
        $this->material_id = $material_id;
    }
    public function setMaterial_name($material_name)
    {
        $this->material_name = $material_name;
    } 
    public function setMaterial_stock($material_stock)
    {
        $this->material_stock = $material_stock;
    } 
    public function setMaterial_price($material_price)
    {
        $this->material_price = $material_price;
    } 
    public function setMaterial_sn($material_sn)
    {
        $this->material_sn = $material_sn;
    } 
    public function setSupplier_id($supplier_id)
    {
        $this->supplier_id = $supplier_id;
    } 
public function set_material($id)
{
    $sql = "SELECT * FROM material WHERE material_id = '$id'"; 
    $save = $this->db->query($sql);
    $data = mysqli_fetch_object ($save);
    return $data; 
}

public function show_material()
{
    $sql = "SELECT * FROM material m INNER JOIN supplier s ON m.supplier_id = s.supplier_id ORDER BY material_name";
    $save = $this -> db -> query($sql);
   
    return $save;

}

public function add_material()
{
    $sql = "INSERT INTO material VALUES
                    (
                     null , 
                    '{$this -> getMaterial_name()}' , 
                    '{$this -> getMaterial_stock()}' , 
                    '{$this -> getMaterial_price()}' , 
                    '{$this -> getMaterial_sn()}' , 
                    '{$this -> getSupplier_id()}'
                    )";
    $save = $this -> db -> query($sql);
    $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
}

public function update_material()
{
    $sql = "UPDATE material SET
                    
                    material_id = '{$this -> getMaterial_id()}', 
                    material_name = '{$this -> getMaterial_name()}' , 
                    material_stock = '{$this -> getMaterial_stock()}' , 
                    material_price = '{$this -> getMaterial_price()}' , 
                    material_sn = '{$this -> getMaterial_sn()}' , 
                    supplier_id = '{$this -> getSupplier_id()}'
                    WHERE material_id = '{$this -> getMaterial_id()}'";
    $save = $this -> db -> query($sql);
    $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function material_delete()
    {
        $sql = "DELETE FROM material WHERE material_id = '{$this -> getMaterial_id()}';";
        $save = $this -> db -> query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function search_db()
    {
        $name = $this->getmaterial_name();
        $sql = "SELECT * FROM `material` WHERE material_name LIKE '%$name%'";
        $result = $this->db->query($sql);

        return $result;
    }

}