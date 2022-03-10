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
        require_once 'views/layouts/header.php';
        require_once 'views/project/project_description.php';
        $date = date_create();
        $p_date = date_format($date, 'y-m');
        return $p_date;
    }
}
