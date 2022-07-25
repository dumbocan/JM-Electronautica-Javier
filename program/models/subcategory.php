<?php

class subcategory
{
    private $subcategory_id;
    private $subcategory_name;
    private $category_id;

    private $db;

    //conexion base de datos

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getsubcategory_id()
    {
        return $this->subcategory_id;
    }

    public function getsubcategory_name()
    {
        return $this->subcategory_name;
    }

    public function getcategory_id()
    {
        return $this->category_id;
    }

    public function setsubcategory_id($subcategory_id)
    {
        $this->subcategory_id = $subcategory_id;
    }

    public function setsubcategory_name($subcategory_name)
    {
        $this->subcategory_name = $subcategory_name;
    }

    public function setcategory_id($category_id)
    {
        $this->category_id = $category_id;
    }

    public function showCategories()
    {
        $sql = "SELECT * FROM subcategory WHERE category_id = '{$this->getcategory_id()}'";
        $save = $this->db->query($sql);
        while ($row = $save->fetch_object()) {
            $resultSet[] = $row;
        }

        return $resultSet;
    }

    public function edit_subcategory($id)
    {
        $sql = "UPDATE subcategory SET
               subcategory_name = '{$this->getsubcategory_name()}'
               WHERE 
               subcategory_id = '{$this->getsubcategory_id()}';";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function save_subcategory()
    {
        $category_id = $this->getcategory_id();

        $sql = "INSERT INTO subcategory SET 
             subcategory_id = null,
             subcategory_name = '{$this->getsubcategory_name()}',
             category_id = '{$this->getcategory_id()}'
             ;";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function delete_subcategory()
    {
        $sql = "DELETE FROM subcategory WHERE subcategory_id = '{$this->getsubcategory_id()}';";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }
}
