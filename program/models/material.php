<?php

class Material
{
    private $material_id;
    private $material_name;
   

    private $db;

    //conexion base de datos

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getMaterial_id()
    {
        return $this->material_id;
    }

    public function getMaterial_name()
    {
        return $this->material_name;
    }

    public function setMaterial_id($material_id)
    {
        $this->material_id = $material_id;
    }

    public function setMaterial_name($material_name)
    {
        $this->material_name = $material_name;
    }

    public function showMaterial()
    {
        $sql = 'SELECT * FROM material';
        $save = $this->db->query($sql);
        while ($row = $save->fetch_object()) {
            $resultSet[] = $row;
        }

        return $resultSet;
    }

    public function edit_material($id)
    {
        $sql = "UPDATE material SET
               material_name = '{$this->getMaterial_name()}'
               WHERE 
               material_id = '{$this->getMaterial_id()}';";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function save_material()
    {
        $sql = "INSERT INTO material SET 
             material_name = '{$this->getMaterial_name()}';";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function delete_material()
    {
        $sql="DELETE FROM material WHERE material_id = '{$this->getMaterial_id()}';";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;

    }
}