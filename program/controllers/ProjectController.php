<?php

require_once 'controllers/CostumerController.php';
require_once 'controllers/ProjectController.php';
require_once 'models/project.php';
class projectController extends CostumerController
{
    public function index()
    {
        require_once 'views/layouts/header.php';
        echo'<h1>PROJECT CONTROLLER / INDEX</h1>';
    }

    public function description()
    {
        require_once 'views/project/description.php';
    }
}
