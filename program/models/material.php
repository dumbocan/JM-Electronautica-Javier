<?php

class Detail
{
    private $material_id;
    private $material_name;
    private $serial_number;
    private $material_price;

    private $db;

    //conexion base de datos

    public function __construct()
    {
        $this->db = Database::connect();
    }
}
