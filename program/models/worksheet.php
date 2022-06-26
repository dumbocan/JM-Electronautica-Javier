<?php

class worksheet
{
    private $worksheet_id;
    private $worksheet_date;
    private $worksheet_desc;
    private $start_time;
    private $finish_time;
    private $efective_time;
    private $project_id;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getworksheet_id()
    {
        return $this->worksheet_id;
    }

    public function getworksheet_date()
    {
        return $this->worksheet_date;
    }

    public function getworksheet_desc()
    {
        return $this->worksheet_desc;
    }

    public function getstart_time()
    {
        return $this->start_time;
    }

    public function getfinish_time()
    {
        return $this->finish_time;
    }

    public function getefective_time()
    {
        return $this->efective_time;
    }

    public function getproject_id()
    {
        return $this->project_id;
    }

    public function setworksheet_id($worksheet_id)
    {
        $this->worksheet_id = $worksheet_id;
    }

    public function setworksheet_date($worksheet_date)
    {
        $this->worksheet_date = $worksheet_date;
    }

    public function setworksheet_desc($worksheet_desc)
    {
        $this->worksheet_desc = $worksheet_desc;
    }

    public function setstart_time($start_time)
    {
        $this->start_time = $start_time;
    }

    public function setfinish_time($finish_time)
    {
        $this->finish_time = $finish_time;
    }

    public function setefective_time($worksheet_id)
    {
        $this->efective_time = $worksheet_id;
    }

    public function efective_time($worksheet_id)
    {
        $id = ($worksheet_id['worksheet_id']);
        $sql = "UPDATE worksheet SET 
        efective_time =  (select round(hour  ( timediff( finish_time, start_time ) )
        + minute( timediff( finish_time, start_time ) )/60,2) diferencia)
        WHERE worksheet_id = '$id';";

        $this->db->query($sql);
    }

    public function setproject_id($project_id)
    {
        $this->project_id = $project_id;
    }

    public function save_worksheet()
    {
        $sql = "INSERT INTO worksheet SET 
        worksheet_id=null,
        worksheet_date='{$this->getWorksheet_date()}',
        worksheet_desc='{$this->getWorksheet_desc()}',   
        start_time='{$this->getStart_time()}',
        finish_time='{$this->getFinish_time()}',
        efective_time='{$this->getEfective_time()}',
        project_id='{$this->getProject_id()}',
        time_worksheet=now()
        ;";

        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function update_worksheet($worksheet_id)
    {
        $sql = "UPDATE worksheet SET 
        worksheet_date = '{$this->getWorksheet_date()}',
        worksheet_desc ='{$this->getWorksheet_desc()}',   
        start_time = '{$this->getStart_time()}',
        finish_time = '{$this->getFinish_time()}',
        efective_time = '{$this->getEfective_time()}',
       
        time_worksheet = now()
        WHERE worksheet_id = '{$worksheet_id}'
        ;";

        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }

    // mete en un objeto los datos de un worksheet segun el worksheet_id
    public function get_worksheet_object($id)
    {
        $sql = "SELECT * FROM worksheet WHERE worksheet_id= {$id} ";
        $save = $this->db->query($sql);
        $data = $save->fetch_object();

        return $data;
    }

    // buscar los worksheets que tiene un project segun project_id y guargarlos en un array de tantas filas como worksheet haya
    public function get_worksheet($id)
    {
        $values = [];

        $sql = "SELECT * FROM worksheet WHERE project_id = {$id} ORDER BY worksheet_date";

        $save = $this->db->query($sql);
        while ($data = $save->fetch_object()) {
            $values[] = ($data->worksheet_id.' '.$data->worksheet_date.' '.$data->worksheet_desc.' '.$data->start_time.' '.$data->finish_time.' '.$data->efective_time);
        }

        return $values;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM worksheet WHERE worksheet_id = '$id'";
        $result = $this->db->query($sql);

        return $result;
    }

    public function get_last_id()
    {
        $sql = 'SELECT worksheet_id FROM worksheet ORDER BY worksheet_id DESC LIMIT 1 ;';
        $id = $this->db->query($sql);
        $lid = mysqli_fetch_assoc($id);

        return $lid;
    }

    public function get_project_by_id($id)
    {
        $sql="SELECT project_number FROM project WHERE project_id='{$id}'";
        $ids = $this->db->query($sql);
        $lid = mysqli_fetch_object($ids);
       
        return $lid;
    }

}
