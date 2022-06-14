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
    private $timestamp;

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

    public function getProject_description()
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

    public function getTimestamp()
    {
        return $this->timestamp;
    }

    public function setProject_number($project_number)
    {
        $this->project_number = $project_number;
    }

    public function setProject_date($project_date)
    {
        $this->project_date = $project_date;
    }

    public function setProject_description($project_desciption)
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

    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    // introduce los valores en tabla project y retorna boolean
    public function save()
    {
        $sql = "INSERT INTO project VALUES (null, 
        '{$this->getProject_number()}',
        '{$this->getProject_date()}',   
        '{$this->getProject_description()}',
        '{$this->getProject_state()}',
        '{$this->getProject_comments()}',
        '{$this->getPictures()}',
        '{$this->getFiles()}',
        '{$this->getBoat_id()}',
        NOW()
        );";

        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }

    //busca el numero de trabajo en tabla work_number y retorna como objeto
    public function getNumber()
    {
        $sql = 'select work_number as number from work_number ORDER BY id DESC LIMIT 1';
        $save = $this->db->query($sql);
        $number = $save->fetch_object();

        return $number;
    }

    //busca el numero de proyecto y nombre de barco dependiendo del estado (w/s/f) y retorna un string (YY-MM-XXX nombre barco)
    public function getState($state)
    {
        $sql = "SELECT * FROM `project` p 
                  INNER JOIN boat b 
                          ON b.boat_id 
                           = p.boat_id 
                       WHERE project_state = '$state' ORDER BY project_date";

        $save = $this->db->query($sql);

        $array = [];
        while ($pro = $save->fetch_object()) {
            $array[] = $pro->project_date.' /  '.$pro->project_number.' '.$pro->boat_name;
        }

        return $array;
    }

    public function update_state($project_id)
    {
        $sql = "UPDATE project 
        SET project_state = '{$this->getProject_state()}' 
        WHERE project_id = {$project_id};";

        $save = $this->db->query($sql);

        return $save;
    }

    public function getProject($number)
    {
        $sql = "SELECT * FROM `project` p 
                  INNER JOIN boat b 
                          ON b.boat_id 
                           = p.boat_id 
                       WHERE project_number = '$number'";

        $save = $this->db->query($sql);
        $data = $save->fetch_object();

        return $data;
    }

    /*este funciona

    INSERT INTO numero (id,fecha) SELECT NULL, CONCAT(DATE_FORMAT(NOW(),"%y-%m-"),LPAD(COUNT(*)+1,3,'0')) FROM numero

    SET @id=(SELECT LPAD(COUNT(*),3,'0') FROM numero);
    insert INTO numero (id, fecha) VALUES (null, (concat(date_format(now(),"%y-%m-"),(lpad((@id+1), 3, '0')))));


    SET GLOBAL event_scheduler = ON;

    CREATE EVENT reset
    ON SCHEDULE EVERY 1 MONTH STARTS '2022-06-01 00:00:01'

    DO truncate table numero;

    otra forma:
        SET GLOBAL event_scheduler = ON;

    CREATE EVENT reset
    ON SCHEDULE EVERY 1 MONTH STARTS (select adddate(last_day(curdate()), 1))

    DO truncate table numero;


    SHOW events;

    eliminar
    DROP EVENT nombre_evento;

    primer dia del mes siguiente
    select adddate(last_day(curdate()), 1)

       --------------------------------------------
    SELECT minute(tiempo) from tiempo
    INSERT INTO `tiempo`(`id`, `tiempo`) VALUES (null,curtime());
    SELECT minute(tiempo) AS minutos FROM tiempo WHERE minute(tiempo) < 5;
    SELECT second(tiempo) AS segundos FROM tiempo WHERE second(tiempo) < 5;



    */
}

//SELECT MonthName(fecha) AS mes, count(*) AS numFilas FROM usuario GROUP BY mes
