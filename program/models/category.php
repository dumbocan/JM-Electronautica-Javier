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
        $sql = 'SELECT * FROM category';
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
        $sql = "INSERT INTO category VALUES (
             category_name = '{$this->getCategory_name()}'
             WHERE 
             material_id='{$this->getMaterial_id}');";
        var_dump($this->getCategory_name());
    }
}
