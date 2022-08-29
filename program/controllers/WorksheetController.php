<?php

require_once 'models/worksheet.php';

class worksheetController extends projectController
{
    public function prepare_worksheet()
    {
        Utils::isAdmin();
       /* // Si existe subcategoria, inicializa la variable $subcategory. 
        //viene de details_register.php line 36
        if(isset($_POST['subcategory'])){
            $subcategory = $_POST['subcategory'];
        
        var_dump($subcategory);
        }
        if(isset($_POST['id'])){
            $number = $_POST['id'];
        }elseif(isset($_POST['return'])){
            $id = $_POST['return'];
            $worksheet = new worksheet();
            $worksheet -> setProject_id($id);
            $numb=$worksheet-> get_project_by_id();
            $number=$numb->project_number;
        }else*/
       var_dump($_POST);
        if(isset($_POST['project_id'])){
            //le entra  por post  el numero de proyecto
            $number = $_POST['project_id'];
        $worksheet = new worksheet();
        $project = new project();
        $worksheet -> setProject_id($number);
        $project -> setProject_id($number);
        //$project -> setProject_state('s');
        $search_worksheet = $worksheet->get_worksheet();
        
        $project_data = $project -> getProject();

        // busca si hay hojas de trabajo anteriores para mostrar
        }
       
        require_once 'views/worksheet/worksheet_register.php';
    }

    // utiliza la funcion find_project dependiendo de los inputs si
    // busca proyectos empezados, en espera, o acabados.
    public function search_project()
    {
        Utils::isAdmin();
        if (isset($_POST['f'])) {
            $stateF = 'f';
            $searchF = self::find_project_state($stateF);
            
            require_once 'views/worksheet/worksheet_finished.php';
        } else {
            $stateS = 's';
            $searchS = self::find_project_state($stateS);
            $stateW = 'w';
            $searchW = self::find_project_state($stateW);

            require_once 'views/project/project_project.php';
        }
    }

    //busca  los numeros de proyectos y nombre de barco del estado que se pida.
    public function find_project_state($state)
    {
        Utils::isAdmin();
        
        $b = $this->find_projects_state($state);
        return $b;
    }

    public function find_project_number($number)
    {
        Utils::isAdmin();
      
        $b = $this -> find_projects_number($number);

        return $b;
    }

    // guarda los datos del formulario worksheet
    public function save_worksheet()
    {
        Utils::isAdmin();

        if (isset($_POST)) {
            $project_state = isset($_POST['project_state']) ? $_POST['project_state'] : false;
            $project_id = isset($_POST['project_id']) ? $_POST['project_id'] : false;
            $worksheet_date = isset($_POST['worksheet_date']) ? $_POST['worksheet_date'] : false;
            $worksheet_desc = isset($_POST['worksheet_desc']) ? $_POST['worksheet_desc'] : false;
            $start_time = isset($_POST['start_time']) ? $_POST['start_time'] : false;
            $finish_time = isset($_POST['finish_time']) ? $_POST['finish_time'] : false;
            if ($_POST['efective_time'] == '') {
                $efective_time = '0';
            } else {
                $efective_time = $_POST['efective_time'];
            }

            if ($project_state && $project_id && $worksheet_date && $worksheet_desc && $start_time && $finish_time) {
                $worksheet = new Worksheet();
               
                $worksheet->setWorksheet_date($worksheet_date);
                $worksheet->setWorksheet_desc($worksheet_desc);
                $worksheet->setStart_time($start_time);
                $worksheet->setFinish_time($finish_time);
                $worksheet->setproject_id($project_id);
                $worksheet->setEfective_time($efective_time);

                $save = $worksheet->save_worksheet();
                $id = $worksheet->get_last_id();
                $worksheet -> setWorksheet_id($id);
               
                if ($efective_time == "0") {
                    $worksheet->efective_time();
                }

                $project = new Project();
                $project->setProject_state($project_state);
                $update = $project->update_state($project_id);

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
            $proid=$worksheet->getproject_id();
           // header('location:'.base_url.'worksheet/worksheet_ok');
           require_once 'views/worksheet/worksheet_ok.php';
        } else {
            echo "algo salio mal";
            //header('location:'.base_url);
        }
    }

    //Recive los datos del formulario para actualizar worksheet
    public function update_worksheet()
    {
        Utils::isAdmin();
       
        if (isset($_POST)) {
            $worksheet_date = isset($_POST['worksheet_date']) ? $_POST['worksheet_date'] : false;
            $worksheet_desc = isset($_POST['worksheet_desc']) ? $_POST['worksheet_desc'] : false;
            $start_time = isset($_POST['start_time']) ? $_POST['start_time'] : false;
            $finish_time = isset($_POST['finish_time']) ? $_POST['finish_time'] : false;
            $efective_time = isset($_POST['efective_time']) ? $_POST['efective_time'] : false;
            $worksheet_id = isset($_POST['worksheet_id']) ? $_POST['worksheet_id'] : false;
            $project_id= isset($_POST['project_id']) ? $_POST['project_id'] : false;
            if ($worksheet_date && $worksheet_desc && $start_time && $finish_time && $efective_time && $worksheet_id) {
                $worksheet = new Worksheet();

                $worksheet->setWorksheet_date($worksheet_date);
                $worksheet->setWorksheet_desc($worksheet_desc);
                $worksheet->setStart_time($start_time);
                $worksheet->setFinish_time($finish_time);
                $worksheet->setEfective_time($efective_time);
                $worksheet->setWorksheet_id($worksheet_id);
                $worksheet->setProject_id($project_id);

                $save = $worksheet->update_worksheet();
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
           
            $project_id = $worksheet->getProject_id();
            //header('location:'.base_url.'worksheet/worksheet_ok');
            require_once 'views/worksheet/worksheet_ok.php';
        } else {
            echo 'no se ha grabado';
            //header('location:'.base_url);
        }
    }

    // busca worksheet para imprimirla y poder editar
    public function show_worksheet()
    {
        $worksheet_id = $_POST['worksheet_id'];
        
        $worksheet = new worksheet();
        $worksheet -> setWorksheet_id($worksheet_id);
        $search_worksheet_object = $worksheet->get_worksheet_object();
        require_once 'views/worksheet/worksheet_update.php';
    }

    public function finish_project()
    {
        Utils::isAdmin();
        $state = $_POST['project_state'];
        $project_id = $_POST['project_id'];
        $project = new Project();
        $project->setProject_state($state);
        $update = $project->update_state($project_id);
    }

    public function worksheet_ok()
    {
        Utils::isAdmin();
        require_once 'views/worksheet/worksheet_ok.php';
    }

    public function ask_delete()
    {
        Utils::isAdmin();
        $worksheet_id = $_POST['worksheet_id'];
        $worksheet_date = $_POST['worksheet_date'];
        $project_id = $_POST['project_id'];

        require_once 'views/worksheet/worksheet_delete.php';
    }

    public function delete_worksheet()
    {
        Utils::isAdmin();
        if (isset($_POST['worksheet_id'])) 
        {
            $worksheet_id = ($_POST['worksheet_id']);
        }
        if (isset($_POST['project_id']))
        {
            $project_id = ($_POST['project_id']);
        }
        $worksheet = new Worksheet();
        $worksheet -> setWorksheet_id($worksheet_id);
        $worksheet -> setProject_id($project_id);
       
        $delete = $worksheet->delete();
        if ($delete) {
            $_SESSION['delete'] = 'complete';
        } else {
            $_SESSION['delete'] = 'failed';
        }
        // header('Location:'.base_url.'worksheet/worksheet_ok');

        require_once 'views/worksheet/worksheet_ok.php';
    }
    




}

// SELECT MINUTE(worksheet.start_time) / 60 + (SELECT HOUR(worksheet.start_time) FROM worksheet) FROM worksheet  WHERE worksheet_id = 3

//SELECT MINUTE(worksheet.start_time) / 60 + (SELECT HOUR(worksheet.start_time) FROM worksheet WHERE worksheet_id = 3) FROM worksheet WHERE worksheet_id = 3

//SELECT ROUND((SELECT MINUTE(worksheet.start_time) / 60 + (SELECT HOUR(worksheet.start_time) FROM worksheet WHERE worksheet_id = 3) FROM worksheet WHERE worksheet_id = 3), 2) as hora_decimal

// funciona bien:

// SELECT round(hour  ( timediff( finish_time, start_time ) )
//+ minute( timediff( finish_time, start_time ) )/60,2) diferencia
//FROM worksheet
//WHERE worksheet_id = 17
