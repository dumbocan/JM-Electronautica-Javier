<?php

class Detail
{
    public $detail_id;
    public $worksheet_id;
    public $detail_date;
    public $material_id;
    public $material_quantity;
    public $material_price;
    public $detail_discount;
    private $db;

    //conexion base de datos

    public function __construct($id)
    {
        $this->db = Database::connect();
        if($id <> '0'){
        $data = self :: get_detail_by_detail_ids($id);
        $this -> detail_id = $data -> detail_id;
        $this -> worksheet_id = $data -> worksheet_id;
        $this -> detail_date = $data -> detail_date;
        $this -> material_id = $data -> material_id;
        $this -> material_quantity = $data -> material_quantity;
        $this -> material_price = $data -> material_price;
        $this -> detail_discount = $data -> detail_discount; 
        }       
    }
    public function get_detail_by_detail_ids($id)
    {

        $sql = "SELECT * FROM detail WHERE detail_id = '{$id}'";
        $save = $this -> db -> query($sql);
        $data = mysqli_fetch_object($save);
        return $data;
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
    public function getMaterial_id()
    {
        return $this->material_id;
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
    public function setMaterial_id($material_id)
    {
        $this->material_id = $material_id;
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
        $sql = "SELECT *  FROM  material   WHERE material_id = '{$this -> getMaterial_id()}'";    
        $save = $this -> db -> query($sql);
        if($save){
            $data = mysqli_fetch_object($save);
            return $data;
        }
        
 
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
                                    '{$this -> getMaterial_id()}' , 
                                    '{$this -> getMaterial_quantity()}' , 
                                    '{$this -> getMaterial_price()}' , 
                                    '{$this -> getDetail_discount()}'
                                    )";

        $save = $this -> db -> query($sql);

       
        return $save;
    }

    public function get_name_by_id()
    {
        $sql = "SELECT * FROM  material  WHERE material_id = '{$this -> getMaterial_id()}'";
        $save = $this -> db -> query($sql);
        $data = mysqli_fetch_object($save);
        return $data;


    }

    public function get_detail($project_id)
    {                                                                                                                    //project_id
        $sql = "SELECT * FROM  detail d  INNER JOIN worksheet w ON w.worksheet_id = d.worksheet_id WHERE project_id = $project_id ORDER BY worksheet_date";
        $save = $this -> db -> query($sql);
        var_dump($sql);
        //$data = mysqli_fetch_object($save);
        return $save;
       
    } 

    public function get_detail_by_detail_id()
    {
        $sql = "SELECT * FROM detail WHERE detail_id = '{$this -> detail_id}'";
        $save = $this -> db -> query($sql);
        $data = mysqli_fetch_object($save);
        return $data;
    }
    

    

}
