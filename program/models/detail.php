<?php

class Detail
{
    private $detail_id;
    private $worksheet_id;
    private $material_id;
    private $material_quantity;
    private $material_price;
    private $db;

    //conexion base de datos

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function get_data($worksheet_id)
    {
        $sql = "SELECT * FROM worksheet  w
        INNER JOIN  project p
        ON p.project_id = w.project_id
        INNER JOIN boat b 
        ON p.boat_id = b.boat_id
        WHERE worksheet_id = '$worksheet_id';";

        $result = $this->db->query($sql);
        return $result;
    }
}
