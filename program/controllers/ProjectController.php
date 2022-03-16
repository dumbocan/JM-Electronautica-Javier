<?php

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
        
        $costumer = new Costumer();
        $boat = new Boat();
        $getData = $costumer->getData();
        
        $project = new Project();
        
        $pro = $project->getNumber();

        $project->setProject_number($pro);

        
        
        
        $a = $project->getProject_number();

      
        require_once 'views/project/description.php';
    }
}
