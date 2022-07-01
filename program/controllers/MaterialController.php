<?php

require_once 'models/material.php';

class MaterialController
{
    public function insert_material()
    {
        Utils::isAdmin();
        include_once 'views/material/insert_material.php';
    }

    public function save_material()
    {
            var_dump($_POST);

    }


}
