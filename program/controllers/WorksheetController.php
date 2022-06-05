<?php

require_once 'models/worksheet.php';

class worksheetController extends projectController
{
    public function index()
    {
        echo 'Controlador worksheet, accion index';
        require_once 'views/worksheet/worksheet_register.php';
    }
    // utiliza la funcion find_project dependiendo de los inputs si
    // busca proyectos empezados, en espera, o acabados.
    public function search_project()
    {
        if(isset($_POST['f'])){
            $stateF="f";
            $searchF=self::find_project($stateF);
            require_once 'views/worksheet/worksheet_finished.php';
        }else{
        $stateS="s";      
        $searchS=self::find_project($stateS);
        $stateW="w";      
        $searchW=self::find_project($stateW);
        
        require_once 'views/worksheet/worksheet_project.php';
        }
    }

    //busca  los numeros de proyectos y nombre de barco del estado que se pida.
    public function find_project($state)
    {  
        $a = new projectController();
        $b=$a->find_projects($state);
        
        return $b;
    }
}
