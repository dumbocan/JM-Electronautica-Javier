<?php
require_once 'models/detail.php';

class DetailController
{
    public function insert()
    {    Utils::isAdmin();
        echo 'Controlador detail, accion indexado';
    }

public function detail()
    {
        echo "detail";
        var_dump($_POST);
    }





}

