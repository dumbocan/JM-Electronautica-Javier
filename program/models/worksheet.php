<?php

class worksheet
{
    private $worksheet_id;
    public $worksheet_date;
    private $worksheet_desc;
    private $start_time;
    private $finish_time;
    private $efective_time;
    private $project_id;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getWorksheet_id()
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

    public function getEfective_time()
    {
        return $this->efective_time;
    }

    public function getProject_id()
    {
        return $this->project_id;
    }

    public function setWorksheet_id($worksheet_id)
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

    public function setEfective_time($worksheet_id)
    {
        $this->efective_time = $worksheet_id;
    }

    public function efective_time()
    {
        $id = $this->worksheet_id['worksheet_id'];
        $sql = "UPDATE worksheet SET 
        efective_time =  (select round(hour  ( timediff( finish_time, start_time ) )
        + minute( timediff( finish_time, start_time ) )/60,2) diferencia)
        WHERE worksheet_id = '$id';";
        $this->db->query($sql);
    }

    public function setProject_id($project_id)
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

    public function update_worksheet()
    {
        $sql = "UPDATE worksheet SET 
        worksheet_date = '{$this->getWorksheet_date()}',
        worksheet_desc ='{$this->getWorksheet_desc()}',   
        start_time = '{$this->getStart_time()}',
        finish_time = '{$this->getFinish_time()}',
        efective_time = '{$this->getEfective_time()}',
       
        time_worksheet = now()
        WHERE worksheet_id = '{$this->getWorksheet_id()}'
        ;";

        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }

    // mete en un objeto los datos de un worksheet segun el worksheet_id
    public function get_worksheet_object()
    {
        $sql = "SELECT * FROM worksheet WHERE worksheet_id= '{$this->getWorksheet_id()}' ";
        $save = $this->db->query($sql);

        return $save;
    }

    // buscar los worksheets que tiene un project segun project_id y guargarlos en un array de tantas filas como worksheet haya
    public function get_worksheet()
    {
        $sql = "SELECT * FROM worksheet WHERE project_id = {$this->getProject_id()} ORDER BY worksheet_date;";
        $save = $this->db->query($sql);

        return $save;
    }

    public function delete()
    {
        $sql = "DELETE FROM worksheet WHERE worksheet_id = {$this->getWorksheet_id()}";
        $result = $this->db->query($sql);

        return $result;
    }

    public function total_hours()
    {
        $sql = "SELECT SUM(efective_time) total FROM worksheet WHERE project_id = '{$this->project_id}' ;";
        $data = $this->db->query($sql);
        $result = mysqli_fetch_object($data);
        //var_dump($data);
        return $result;
    }

    public function get_last_id()
    {
        $sql = 'SELECT worksheet_id FROM worksheet ORDER BY worksheet_id DESC LIMIT 1 ;';
        $id = $this->db->query($sql);
        $lid = mysqli_fetch_assoc($id);

        return $lid;
    }

    public function get_project_by_id()
    {
        $sql = "SELECT project_number FROM project WHERE project_id='{$this->getWorksheet_id()}'";
        $save = $this->db->query($sql);

        return $save;
    }

    public function get_details()
    {                                                                                                                    //project_id
        $sql = "SELECT * FROM  detail d  INNER JOIN worksheet w ON w.worksheet_id = d.worksheet_id
        INNER JOIN material m ON m.material_id = d.material_id WHERE project_id = '{$this->project_id}' ORDER BY worksheet_date";
        $save = $this->db->query($sql);
      
       return $save;
    }

    public function pworksheet()
    {
        $sql = "SELECT * FROM worksheet w  
                INNER JOIN project p 
                ON p.project_id = w.project_id
                LEFT JOIN detail d
                ON d.worksheet_id = w.worksheet_id
                INNER JOIN boat b
                ON p.boat_id = b.boat_id
                INNER JOIN costumer c
                ON b.costumer_id = c.costumer_id
                WHERE p.project_id = '{$this->project_id}'";
        $save = $this->db->query($sql);
       
 /* $results = array();
            while($row = mysqli_fetch_array($save)) {
            $results[] = $row;
            }
            $array_final = array();
foreach ($results as $result){
   $array_final[] = $result;
}
var_dump($array_final['1']);
for ($i=0; $i < count($array_final); $i++) { 
    print_r($array_final[$i]['worksheet_date']);print_r($array_final[$i]['worksheet_desc']);
    echo "<br>";
}print_r($array_final[0]['costumer_name']);*/
        return $save;
    }

    public function worksheet_data()
    {
        $sql="SELECT * FROM `worksheet` WHERE project_id = '{$this->project_id}'";
        $save = $this->db->query($sql);
        return $save;
    }
}
