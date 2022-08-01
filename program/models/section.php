<?php

class section
{
    private $section_id;
    public $section_name;

    private $db;

    //conexion base de datos

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getsection_id()
    {
        return $this->section_id;
    }

    public function getsection_name()
    {
        return $this->section_name;
    }

    public function setsection_id($section_id)
    {
        $this->section_id = $section_id;
    }

    public function setsection_name($section_name)
    {
        $this->section_name = $section_name;
    }

    public function showsection()
    {
        $sql = 'SELECT * FROM section';
        $save = $this->db->query($sql);
        while ($row = $save->fetch_object()) {
            $resultSet[] = $row;
        }

        return $resultSet;
    }

    public function edit_section($id)
    {
        $sql = "UPDATE section SET
               section_name = '{$this->getsection_name()}'
               WHERE 
               section_id = '{$this->getsection_id()}';";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function save_section()
    {
        $sql = "INSERT INTO section SET 
             section_name = '{$this->getsection_name()}';";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function delete_section()
    {
        $sql = "DELETE FROM section WHERE section_id = '{$this->getsection_id()}';";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function get_by_id()
    {
        $sql = "SELECT * FROM section WHERE section_id = '{$this -> section_id}'";
        $save = $this->db->query($sql);
        $row = $save->fetch_object();
        return $row;

    }
}
