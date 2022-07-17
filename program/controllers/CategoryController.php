<?php

require_once 'models/category.php';

class CategoryController
{
    public function index()
    {
        Utils::isAdmin();
       
        $material_name = $_POST['material_name'];
        $material_id = $_POST['material_id'];
        $cat = new category();
        $cat->setMaterial_id($material_id);
        $category = $cat->showCategories();

        require_once 'views/category/category_register.php';
    }

    public function new_category()
    {
        Utils::isAdmin();
        $cat = new category();
        $material_id = $_POST['material_id'];
        $material_name =$_POST['material_name'];
        $cat ->setMaterial_id($material_id);
       

        require_once 'views/category/new_category.php';
    }

    public function save_category()
    {
        Utils::isAdmin();
        $category = $_POST['new_category'];
        $material_id = $_POST['material_id'];
        $material_name = $_POST['material_name'];
        $cat = new Category();
        $cat->setCategory_name($category);
        $cat->setMaterial_id($material_id);
        $save=$cat->save_category();
        if ($save) {
            $_SESSION['register'] = 'complete';
        } else {
            $_SESSION['register'] = 'failed';
        }
        require_once 'views/category/category_ok.php';

    }

    public function edit_category()
    {
        Utils::isAdmin();
        $id = $_POST['category_id'];
        $name = $_POST['category_name'];
        $material_name = $_POST['material_name'];
        $material_id = $_POST['material_id'];
        require_once 'views/category/category_update.php';
    }

    public function update_category()
    {
        $id = $_POST['category_id'];
        $name = $_POST['category_name'];
        $material_name = $_POST['material_name'];
        $material_id = $_POST['material_id'];
        $cat = new category();
        $cat->setCategory_name($name);
        $cat->setCategory_id($id);
        $cat->setMaterial_id($material_id);
        $save = $cat->edit_category($id);
        
        if ($save) {
            $_SESSION['register'] = 'complete';
        } else {
            $_SESSION['register'] = 'failed';
        }
        require_once 'views/category/category_ok.php';
    }

    public function ask_delete()
    { 
        Utils::isAdmin();
        $material_name = $_POST['material_name'];
        $material_id = $_POST['material_id'];
        $id = $_POST['category_id'];
        $name = $_POST['category_name'];
        $cat = new Category();
        $cat->setCategory_name($name);
        $cat->setCategory_id($id);
        $cat->setMaterial_id($material_id);
        var_dump($cat);
        require_once 'views/category/category_delete.php';
    }

    public function delete_category()
    {
        $id = $_POST['category_id'];
        $material_id = $_POST['material_id'];
        $material_name = $_POST['material_name'];
        $name = $_POST['category_name'];
        $cat = new Category();
        $cat->setCategory_name($name);
        $cat->setCategory_id($id);
        $cat->setMaterial_id($material_id);
        $delete = $cat->delete_category($id);
        if ($delete) {
            $_SESSION['register'] = 'complete';
        } else {
            $_SESSION['register'] = 'failed';
        }
        require_once 'views/category/category_ok.php';
    }
}
