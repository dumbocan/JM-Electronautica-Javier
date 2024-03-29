<?php

require_once 'models/project.php';

class projectController extends BoatController
{
    public $boat;

    public function index()
    {
        Utils::isAdmin();
        require_once 'views/layouts/header.php';
        echo'<h1>PROJECT CONTROLLER / INDEX</h1>';
    }

    // saco el nombre del barco segun $_SESSION id y el numero de proyecto
    public function description()
    {
        Utils::isAdmin();
        if (isset($_POST['costumer_id'])) {  
            //costumer_id me llega de costumer_gest line 40
            $id = $_POST['costumer_id'];
        } else {
            $id = ($_SESSION['id']);
        }
        $boat = new boat();

        $data = $boat->getData($id);

        $boat_id = $data->boat_id;

        $project = new project();
        Utils::insertNumber();

        $number = $project->getNumber();

        require_once 'views/project/project_description.php';
    }

    public function update_project()
    {
        Utils::isAdmin();
        // me llega un array, lo despiezo y recojo el numero de proyecto
        $project_id = $_POST['project_id'];

      //  $data = array_pop($array);
      //  $numb = (explode(' ', $data));
      //  $numb = ($numb[3]);
        $project = new project();
        $project -> setProject_id($project_id);

        $data = $project->getProject();

        require_once 'views/project/project_update.php';
    }

    public function update()
    {
        Utils::isAdmin();

        if (isset($_POST)) {
            $project_number = isset($_POST['project_number']) ? $_POST['project_number'] : false;

            $project_date = isset($_POST['project_date']) ? $_POST['project_date'] : false;
            $project_description = isset($_POST['project_desc']) ? $_POST['project_desc'] : false;
            $project_state = isset($_POST['project_state']) ? $_POST['project_state'] : false;
            $project_comments = isset($_POST['project_comments']) ? $_POST['project_comments'] : false;
            $pictures = isset($_POST['pictures']) ? $_POST['pictures'] : false;
            $files = isset($_POST['files']) ? $_POST['files'] : false;
            $project_id = isset($_POST['project_id']) ? $_POST['project_id'] : false;
            $boat_id = isset($_POST['boat_id']) ? $_POST['boat_id'] : false;

            if ($project_date && $project_description && $project_state ) {
                $project = new Project();

                $project->setProject_id($project_id);
                $project->setProject_number($project_number);
                $project->setProject_date($project_date);
                $project->setProject_description($project_description);
                $project->setProject_state($project_state);
                $project->setProject_comments($project_comments);
                $project->setPictures($pictures);
                $project->setFiles($files);
                $project->setBoat_id($boat_id);
               
                $update = $project->update();

                if ($update) {
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
            //header('location:'.base_url.'project/project_ok');
            require_once 'views/project/project_ok.php';

        } else {
           
            header('location:'.base_url.'project/register');
        }
    }

    public function save()
    {
        Utils::isAdmin();
        //recive datos de project_description.php 
        if (isset($_POST)) {
            $project_number = isset($_POST['project_number']) ? $_POST['project_number'] : false;
            echo $project_number;
            $project_date = isset($_POST['project_date']) ? $_POST['project_date'] : false;
            $project_description = isset($_POST['project_description']) ? $_POST['project_description'] : false;
            $project_state = isset($_POST['project_state']) ? $_POST['project_state'] : false;
            $project_comments = isset($_POST['project_comments']) ? $_POST['project_comments'] : " ";
            $pictures = isset($_POST['pictures']) ? $_POST['pictures'] : false;
            $files = isset($_POST['files']) ? $_POST['files'] : false;
            $boat_id = isset($_POST['boat_id']) ? $_POST['boat_id'] : false;

            if ($project_date && $project_description && $project_state) {
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
                $id = $project->get_last_id();
                $project -> setProject_id($id);
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
            //header('location:'.base_url.'project/project_ok');
            require_once 'views/project/project_ok.php';

        } else {
            header('location:'.base_url.'project/register');
        }
    }

    public function project_ok()
    {
        Utils::isAdmin();
        require_once 'views/project/project_ok.php';
    }

    public function find_projects_state($state)
    {
        Utils::isAdmin();
        $project = new project();

        $get = $project->getState($state);
        return $get;
    }

    public function find_projects_number($number)
    {
        Utils::isAdmin();
        $project = new project();

        $get = $project->getProject($number);

        return $get;
    }
    public function delete_project()
    {
        Utils::isAdmin();
        $project_id=($_POST['project_id']);
        $boat_name = ($_POST['boat_name']);        

       /* $data = array_pop($array);
        $numb = (explode(' ', $data));
        $number = $numb[3];
       */
        $project = new Project();
        
        $project -> setProject_id($project_id);
        $delete = $project->delete();
        
        if ($delete) {
            $_SESSION['delete'] = 'complete';
        } else {
            $_SESSION['delete'] = 'failed';
        }
       // header('Location:'.base_url.'project/project_ok');
        require_once 'views/project/project_ok.php';

    }

    public function ask_delete()
    { 
        Utils::isAdmin();
        $name = $_POST['boat_name'];
        $project_id = $_POST['project_id'];
        require_once 'views/project/project_delete.php';
    }
}
