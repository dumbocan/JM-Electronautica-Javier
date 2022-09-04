<?php

class Detail
{
    private $detail_id;
    private $worksheet_id;
    private $subcategory_id;
    private $material_quantity;
    private $material_price;
    private $db;

    //conexion base de datos

    public function __construct()
    {
        $this->db = Database::connect();
    }
    public function getDetail_id()
    {
        return $this->detail_id;
    }
    public function getWorksheet_id()
    {
        return $this->worksheet_id;
    }
    public function getSubcategory_id()
    {
        return $this->subcategory_id;
    }
    public function getMaterial_quantity()
    {
        return $this->material_quantity;
    }

    public function getMaterial_price()
    {
        return $this->material_price;
    }


    public function setDetail_id($detail_id)
    {
        $this->detail_id = $detail_id;
    }
    public function setworksheet_id($worksheet_id)
    {
        $this->worksheet_id = $worksheet_id;
    }
    public function setSubcategory_id($subcategory_id)
    {
        $this->subcategory_id = $subcategory_id;
    }
    public function setMaterial_quantity($material_quantity)
    {
        $this->material_quantity = $material_quantity;
    }
    public function setMaterial_price($material_price)
    {
        $this->material_price = $material_price;
    }


    public function get_data()
    {
        $sql = "SELECT * FROM worksheet  w
        INNER JOIN  project p
        ON p.project_id = w.project_id
        INNER JOIN boat b 
        ON p.boat_id = b.boat_id
        WHERE worksheet_id = '{$this->worksheet_id}';";

        $result = $this->db->query($sql);
        return $result;
    }
}
