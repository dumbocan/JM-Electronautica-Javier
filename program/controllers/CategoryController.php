<?php

require_once 'models/category.php';

class CategoryController
{
    public function index()
    {
        Utils::isAdmin();
        $cat = new category();
        $category = $cat->showCategories();

        require_once 'views/category/category_register.php';
    }

    public function new_category()
    {
        Utils::isAdmin();
        require_once 'views/category/new_category.php';
    }

    public function save_category()
    {
        Utils::isAdmin();
        $category = $_POST['new_category'];

        $cat = new Category();
        $cat->setCategory_name($category);
        $cat->save_category();
    }

    public function edit_category()
    {
        Utils::isAdmin();
        $id = $_POST['category_id'];
        $name = $_POST['category_name'];
        require_once 'views/category/category_update.php';
    }

    public function update_category()
    {
        $id = $_POST['category_id'];
        $name = $_POST['category_name'];
        $category = new category();
        $category->setCategory_name($name);
        $category->setCategory_id($id);
        $save = $category->edit_category($id);
        var_dump($save);
        if ($save) {
            $_SESSION['register'] = 'complete';
        } else {
            $_SESSION['register'] = 'failed';
        }
        require_once 'views/category/category_ok.php';
    }

    public function delete_category()
    {
        var_dump($_POST);
    }
}
