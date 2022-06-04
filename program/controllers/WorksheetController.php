<?php

require_once 'models/worksheet.php';

class worksheetController
{
    public function index()
    {
        echo 'Controlador worksheet, accion index';
     require_once 'views/worksheet/worksheet_register.php';
    }
}
