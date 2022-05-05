<?php

class Project
{
    private $project_number;
    private $project_date;
    private $project_desciption;
    private $project_state;
    private $project_comments;
    private $pictures;
    private $files;
    private $boat_id;
    private $invoice_id;

    private $db;

    //conexion base de datos

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getProject_number()
    {
        return $this->project_number;
    }

    public function getProject_date()
    {
        return $this->project_date;
    }

    public function getProject_desciption()
    {
        return $this->project_desciption;
    }

    public function getProject_state()
    {
        return $this->project_state;
    }

    public function getProject_comments()
    {
        return $this->project_comments;
    }

    public function getPictures()
    {
        return $this->pictures;
    }

    public function getFiles()
    {
        return $this->files;
    }

    public function getBoat_id()
    {
        return $this->boat_id;
    }

    public function getInvoice_id()
    {
        return $this->invoice_id;
    }

    public function setProject_number($project_number)
    {
        $this->project_number = $project_number;
    }

    public function setProject_date($project_date)
    {
        $this->project_date = $project_date;
    }

    public function setProject_desciption($project_desciption)
    {
        $this->project_desciption = $project_desciption;
    }

    public function setProject_state($project_state)
    {
        $this->project_state = $project_state;
    }

    public function setProject_comments($project_comments)
    {
        $this->project_comments = $project_comments;
    }

    public function setPictures($pictures)
    {
        $this->pictures = $pictures;
    }

    public function setFiles($files)
    {
        $this->files = $files;
    }

    public function setBoat_id($boat_id)
    {
        $this->boat_id = $boat_id;
    }

    public function setInvoice_id($invoice_id)
    {
        $this->invoice_id = $invoice_id;
    }

    
    public function getNumber()
    {
        $date = date_create();
        $p_date = date_format($date, 'y-m');
        $sql = 'SELECT  count(*) as projects  FROM project';
        $query = $this->db->query($sql);
        $count = $query->fetch_assoc();
        $number = $count['projects'];

        $p_number = $p_date.'-'.$number;

        return $p_number;
    }

   
}

//SELECT MonthName(fecha) AS mes, count(*) AS numFilas FROM usuario GROUP BY mes
