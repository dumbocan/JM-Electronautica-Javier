<?php

require_once 'models/material.php';

class MaterialController
{
    public function index()
    {
        Utils::isAdmin();
        $mat = new material();
        $material = $mat->showMaterial();

        require_once 'views/material/material_register.php';
    }

    public function new_material()
    {
        Utils::isAdmin();
        require_once 'views/material/new_material.php';
    }

    public function save_material()
    {
        Utils::isAdmin();
        $material = $_POST['new_material'];

        $mat = new Material();
        $mat->setMaterial_name($material);
        $save=$mat->save_material();
        if ($save) {
            $_SESSION['register'] = 'complete';
        } else {
            $_SESSION['register'] = 'failed';
        }
        require_once 'views/material/material_ok.php';
    }

    public function edit_material()
    {
        Utils::isAdmin();
        $id = $_POST['material_id'];
        $name = $_POST['material_name'];
        require_once 'views/material/material_update.php';
    }

    public function update_material()
    {
        $id = $_POST['material_id'];
        $name = $_POST['material_name'];
        $material = new Material();
        $material->setMaterial_name($name);
        $material->setMaterial_id($id);
        $save = $material->edit_material($id);
        
        if ($save) {
            $_SESSION['register'] = 'complete';
        } else {
            $_SESSION['register'] = 'failed';
        }
        require_once 'views/material/material_ok.php';
    }

    public function ask_delete()
    { 
        Utils::isAdmin();

        $name = $_POST['material_name'];
        $id = $_POST['material_id'];
        require_once 'views/material/material_delete.php';
    }

    public function delete_material()
    {
        $id = $_POST['material_id'];
        $material = new Material();
        $material->setMaterial_id($id);
        $delete = $material->delete_material($id);
        if ($delete) {
            $_SESSION['register'] = 'complete';
        } else {
            $_SESSION['register'] = 'failed';
        }
        require_once 'views/material/material_ok.php';
    }

    
}
