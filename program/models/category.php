<?php

class Category
{
    private $category_id;
    private $category_name;
    private $section_id;

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

    public function getsection_id()
    {
        return $this->section_id;
    }

    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;
    }

    public function setCategory_name($category_name)
    {
        $this->category_name = $category_name;
    }

    public function setsection_id($section_id)
    {
        $this->section_id = $section_id;
    }

    public function showCategories()
    {
        $resultSet=false;
        $sql = "SELECT * FROM category WHERE section_id = '{$this->getsection_id()}'";
        $save = $this->db->query($sql);
        if($save){
            while ($row = $save->fetch_object()):
                $resultSet[] = $row;
            endwhile;
        return $resultSet;
            }else{
                $resultSet = false;
                return $resultSet;
            }
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
        $section_id = $this->getsection_id();

        $sql = "INSERT INTO category SET 
             category_id = null,
             category_name = '{$this->getCategory_name()}',
             section_id = '{$this->getsection_id()}'
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
