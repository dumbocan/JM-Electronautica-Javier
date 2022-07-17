<?php

class Category
{
    private $category_id;
    private $category_name;
    private $material_id;

    private $db;

    //conexion base de datos

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getCategory_id()
    {
        return $this->category_id;
    }

    public function getCategory_name()
    {
        return $this->category_name;
    }

    public function getMaterial_id()
    {
        return $this->material_id;
    }

    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;
    }

    public function setCategory_name($category_name)
    {
        $this->category_name = $category_name;
    }

    public function setMaterial_id($material_id)
    {
        $this->material_id = $material_id;
    }

    public function showCategories()
    {
       
        $sql = "SELECT * FROM category WHERE material_id = '{$this->getMaterial_id()}'";
        $save = $this->db->query($sql);
        while ($row = $save->fetch_object()) {
            $resultSet[] = $row;
        }

        return $resultSet;
    }

    public function edit_category($id)
    {
        $sql = "UPDATE category SET
               category_name = '{$this->getCategory_name()}'
               WHERE 
               category_id = '{$this->getCategory_id()}';";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function save_category()
    {
        $material_id= $this->getMaterial_id();
       
        $sql = "INSERT INTO category SET 
             category_id = null,
             category_name = '{$this->getCategory_name()}',
             material_id = '{$this->getMaterial_id()}'
             ;";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function delete_category()
    {
        $sql = "DELETE FROM category WHERE category_id = '{$this->getCategory_id()}';";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }
}
