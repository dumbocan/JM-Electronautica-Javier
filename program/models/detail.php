<?php

class Detail
{
    private $detail_id;
    private $worksheet_id;
    private $detail_date;
    private $subcategory_id;
    private $material_quantity;
    private $material_price;
    private $detail_discount;
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
    public function getDetail_date() 
    {
		return $this->detail_date;
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
    public function getDetail_discount() 
    {
		return $this->detail_discount;
	}


    public function setDetail_id($detail_id)
    {
        $this->detail_id = $detail_id;
    }
    public function setworksheet_id($worksheet_id)
    {
        $this->worksheet_id = $worksheet_id;
    }
    public function setDetail_date($detail_date)
    {
		$this->detail_date = $detail_date;
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
    public function setDetail_discount($detail_discount)
    {
		$this->detail_discount = $detail_discount;
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
    public function get_detail_data()
    {
        $sql = "SELECT *  FROM subcategory s LEFT JOIN detail d ON d.subcategory_id = s.subcategory_id  WHERE s.subcategory_id = '{$this -> getsubcategory_id()}'";    
        $save = $this -> db -> query($sql);
        $data = mysqli_fetch_object($save);
        return $data;
 
    }

    public function get_material_price_percentage()
    {
        $sql = 'SELECT material_price_percentage FROM settings';
        $save = $this -> db -> query($sql);
        $data1 = mysqli_fetch_object($save);
        $data = $data1 -> material_price_percentage;
        return $data;

    }

    public function save_detail()
    {  
        $sql = "INSERT INTO detail  VALUES 
                                    (
                                     null , 
                                    '{$this -> getDetail_date()}' ,
                                    '{$this -> getWorksheet_id()}' , 
                                    '{$this -> getSubcategory_id()}' , 
                                    '{$this -> getMaterial_quantity()}' , 
                                    '{$this -> getMaterial_price()}' , 
                                    '{$this -> getDetail_discount()}'
                                    )";

        $save = $this -> db -> query($sql);

       
        return $save;
    }

    public function get_name_by_id()
    {
        $sql = "SELECT * FROM category c INNER JOIN subcategory s ON c.category_id = s.category_id WHERE subcategory_id = '{$this -> getSubcategory_id()}'";
        $save = $this -> db -> query($sql);
        $data = mysqli_fetch_object($save);
        return $data;


    }

}
