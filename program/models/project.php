<?php

class Project{
    
    private $project_number;     
    private $project_date;        
    private $project_desciption;  
    private $project_state;       
    private $project_comments;     
    private $pictures;            
    private $files;               
    private $boat_id;             
    private $invoice_id;          

    function getProject_number() {
        return $this->project_number;
    }

    function getProject_date() {
        return $this->project_date;
    }

    function getProject_desciption() {
        return $this->project_desciption;
    }

    function getProject_state() {
        return $this->project_state;
    }

    function getProject_comments() {
        return $this->project_comments;
    }

    function getPictures() {
        return $this->pictures;
    }

    function getFiles() {
        return $this->files;
    }

    function getBoat_id() {
        return $this->boat_id;
    }

    function getInvoice_id() {
        return $this->invoice_id;
    }

    function setProject_number($project_number) {
        $this->project_number = $project_number;
    }

    function setProject_date($project_date) {
        $this->project_date = $project_date;
    }

    function setProject_desciption($project_desciption) {
        $this->project_desciption = $project_desciption;
    }

    function setProject_state($project_state) {
        $this->project_state = $project_state;
    }

    function setProject_comments($project_comments) {
        $this->project_comments = $project_comments;
    }

    function setPictures($pictures) {
        $this->pictures = $pictures;
    }

    function setFiles($files) {
        $this->files = $files;
    }

    function setBoat_id($boat_id) {
        $this->boat_id = $boat_id;
    }

    function setInvoice_id($invoice_id) {
        $this->invoice_id = $invoice_id;
    }

  




}
//SELECT MonthName(fecha) AS mes, count(*) AS numFilas FROM usuario GROUP BY mes