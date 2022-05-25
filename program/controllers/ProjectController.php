<?php

require_once 'models/project.php';

class projectController extends BoatController
{
    public $boat;

    public function __construct()
    {
    }

    public function index()
    {
        require_once 'views/layouts/header.php';
        echo'<h1>PROJECT CONTROLLER / INDEX</h1>';
    }

    public function description()
    {
        $boat = new boat();
        $id = ($_SESSION['id']);
        $data = $boat->getData($id);
        $boat_id = $data->boat_id;

        $project = new project();
        Utils::insertNumber();

        $number = $project->getNumber();
        var_dump($number);
        require_once 'views/project/description.php';
    }

    public function save()
    {
        Utils::isAdmin();
        if (isset($_POST)) {
            $project_number = isset($_POST['project_number']) ? $_POST['project_number'] : false;
            echo $project_number;
            $project_date = isset($_POST['project_date']) ? $_POST['project_date'] : false;
            $project_description = isset($_POST['project_description']) ? $_POST['project_description'] : false;
            $project_state = isset($_POST['project_state']) ? $_POST['project_state'] : false;
            $project_comments = isset($_POST['project_comments']) ? $_POST['project_comments'] : false;
            $pictures = isset($_POST['pictures']) ? $_POST['pictures'] : false;
            $files = isset($_POST['files']) ? $_POST['files'] : false;
            $boat_id = isset($_POST['boat_id']) ? $_POST['boat_id'] : false;

            if ($project_date && $project_description && $project_state && $project_comments) {
                $project = new Project();

                $project->setProject_number($project_number);
                $project->setProject_date($project_date);
                $project->setProject_description($project_description);
                $project->setProject_state($project_state);
                $project->setProject_comments($project_comments);
                $project->setPictures($pictures);
                $project->setFiles($files);
                $project->setBoat_id($boat_id);

                $save = $project->save();

                if ($save) {
                    $_SESSION['register'] = 'complete';
                } else {
                    $_SESSION['register'] = 'failed';
                }
            } else {
                $_SESSION['register'] = 'failed';
            }
        } else {
            $_SESSION['register'] = 'failed';
        }
        if ($_SESSION['register'] == 'complete') {
            header('location:'.base_url);
        } else {
            header('location:'.base_url.'costumer/fdsregister');
        }
    }
}
