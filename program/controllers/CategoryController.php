<?php

require_once 'models/category.php';

class CategoryController
{
    public function index()
    {
        Utils::isAdmin();
       var_dump($_POST);
        $section_name = $_POST['section_name'];
        $section_id = $_POST['section_id'];
        $cat = new category();
        $cat->setsection_id($section_id);
        $category = $cat->showCategories();
        if($category == true) {
            require_once 'views/category/category_register.php';
        }else{ 
            require_once 'views/category/new_category.php';
        }
    }

    public function new_category()
    {
        Utils::isAdmin();
        $cat = new category();
        $section_id = $_POST['section_id'];
        $section_name =$_POST['section_name'];
        $cat ->setsection_id($section_id);
        if(isset($_POST['control']) == 1){
            $control = "1";
            $project_number = $_POST['project_number'];
            $boat_name = $_POST['boat_name'];
            $worksheet_date = $_POST['worksheet_date'];
            require_once 'views/category/new_category.php';
var_dump($_POST);


        }else{
        require_once 'views/category/new_category.php';
        }
    }

    public function save_category()
    {
        Utils::isAdmin();
        $category = $_POST['new_category'];
        $section_id = $_POST['section_id'];
        $section_name = $_POST['section_name'];
        $control = $_POST['control'];
        $cat = new Category();
        $cat->setCategory_name($category);
        $cat->setsection_id($section_id);
        $save=$cat->save_category();
        if ($save) {
            $_SESSION['register'] = 'complete';
        } else {
            $_SESSION['register'] = 'failed';
        }
        if(isset($_POST['control']) == 1){
            $control = "1";
            $project_number = $_POST['project_number'];
            $boat_name = $_POST['boat_name'];
            $worksheet_date = $_POST['worksheet_date'];
            require_once 'views/category/new_category.php';
var_dump($_POST);


        }else{
        require_once 'views/category/new_category.php';
        }
        require_once 'views/category/category_ok.php';

    }

    public function edit_category()
    {
        Utils::isAdmin();
        $id = $_POST['category_id'];
        $name = $_POST['category_name'];
        $section_name = $_POST['section_name'];
        $section_id = $_POST['section_id'];
        require_once 'views/category/category_update.php';
    }

    public function update_category()
    {
        $id = $_POST['category_id'];
        $name = $_POST['category_name'];
        $section_name = $_POST['section_name'];
        $section_id = $_POST['section_id'];
        $cat = new category();
        $cat->setCategory_name($name);
        $cat->setCategory_id($id);
        $cat->setsection_id($section_id);
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
        $section_name = $_POST['section_name'];
        $section_id = $_POST['section_id'];
        $id = $_POST['category_id'];
        $name = $_POST['category_name'];
        $cat = new Category();
        $cat->setCategory_name($name);
        $cat->setCategory_id($id);
        $cat->setsection_id($section_id);
       
        require_once 'views/category/category_delete.php';
    }

    public function delete_category()
    {
        $id = $_POST['category_id'];
        $section_id = $_POST['section_id'];
        $section_name = $_POST['section_name'];
        $name = $_POST['category_name'];
        $cat = new Category();
        $cat->setCategory_name($name);
        $cat->setCategory_id($id);
        $cat->setsection_id($section_id);
        $delete = $cat->delete_category($id);
        if ($delete) {
            $_SESSION['register'] = 'complete';
        } else {
            $_SESSION['register'] = 'failed';
        }
        require_once 'views/category/category_ok.php';
    }
}
