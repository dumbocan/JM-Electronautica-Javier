<?php

require_once 'models/project.php';
class projectController
{
    public function index()
    {
        require_once 'views/layouts/header.php';
        echo'<h1>PROJECT CONTROLLER / INDEX</h1>';
    }

    public function description()
    {
        
        require_once 'models/project.php';
        $date = date_create();
        $p_date = date_format($date, 'y-m');
        $project = new Project;
        $pro=$project->getNumber();
        $p_number= $p_date.'-' .$pro;
        $project->setProject_number($p_number);
       $a=$project->getProject_number();
        require_once 'views/project/project_description.php';

        
    }
}
