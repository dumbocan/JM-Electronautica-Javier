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

    public function setefective_time($efective_time)
    {
        $this->efective_time = $efective_time;
    }

    public function setproject_id($project_id)
    {
        $this->project_id = $project_id;
    }

    public function save_worksheet()
    {
        $sql = "INSERT INTO worksheet VALUES (null,
        '{$this->getWorksheet_date()}',
        '{$this->getWorksheet_desc()}',   
        '{$this->getStart_time()}',
        '{$this->getFinish_time()}',
        '{$this->getEfective_time()}',
        '{$this->getProject_id()}',
        now()
        );";
var_dump($sql);
        $save = $this->db->query($sql);

        $result = false;
        if ($save) 
        {
            $result = true;
        }
        

        return $result;
    }

    public function get_worksheet($id)
    {
        $sql="SELECT * FROM worksheet WHERE project_id = {$id} ORDER BY worksheet_date";
        
        $save = $this->db->query($sql); 
        while ($data = $save->fetch_object()) {
           $values[]= $data->worksheet_date." ".$data->worksheet_desc." ".$data->start_time." ".$data->finish_time." ".$data->efective_time; 
        }

     return $values;
        
    }


    


}


