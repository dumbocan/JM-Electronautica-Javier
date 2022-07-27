<?php

require_once 'models/subcategory.php';

class subcategoryController
{
    public function index()
    {
        Utils::isAdmin();

        $category_name = $_POST['category_name'];
        $category_id = $_POST['category_id'];
        $cat = new subcategory();
        $cat->setcategory_id($category_id);
        $subcategory = $cat->showSubcategories();
        if($subcategory == true) {
            require_once 'views/subcategory/subcategory_register.php';
        }else{ 
            require_once 'views/subcategory/new_subcategory.php';
        }

    }

    public function new_subcategory()
    {
        Utils::isAdmin();
        
        $cat = new subcategory();
        $category_id = $_POST['category_id'];
        $category_name = $_POST['category_name'];
        $cat->setCategory_id($category_id);

        require_once 'views/subcategory/new_subcategory.php';
    }

    public function save_subcategory()
    {
        Utils::isAdmin();
       
        $subcategory = $_POST['new_subcategory'];
        $category_id = $_POST['category_id'];
        $category_name = $_POST['category_name'];
        $cat = new subcategory();
        $cat->setsubcategory_name($subcategory);
        $cat->setcategory_id($category_id);
        $save = $cat->save_subcategory();
        if ($save) {
            $_SESSION['register'] = 'complete';
        } else {
            $_SESSION['register'] = 'failed';
        }
        require_once 'views/subcategory/subcategory_ok.php';
    }

    public function edit_subcategory()
    {
        Utils::isAdmin();
        $id = $_POST['subcategory_id'];
        $name = $_POST['subcategory_name'];
        $category_name = $_POST['category_name'];
        $category_id = $_POST['category_id'];
        require_once 'views/subcategory/subcategory_update.php';
    }

    public function update_subcategory()
    {
        $id = $_POST['subcategory_id'];
        $name = $_POST['subcategory_name'];
        $category_name = $_POST['category_name'];
        $category_id = $_POST['category_id'];
        $cat = new subcategory();
        $cat->setsubcategory_name($name);
        $cat->setsubcategory_id($id);
        $cat->setcategory_id($category_id);
        $save = $cat->edit_subcategory($id);

        if ($save) {
            $_SESSION['register'] = 'complete';
        } else {
            $_SESSION['register'] = 'failed';
        }
        require_once 'views/subcategory/subcategory_ok.php';
    }

    public function ask_delete()
    {
        Utils::isAdmin();
        $category_name = $_POST['category_name'];
        $category_id = $_POST['category_id'];
        $id = $_POST['subcategory_id'];
        $name = $_POST['subcategory_name'];
        $cat = new subcategory();
        $cat->setsubcategory_name($name);
        $cat->setsubcategory_id($id);
        $cat->setcategory_id($category_id);
       
        require_once 'views/subcategory/subcategory_delete.php';
    }

    public function delete_subcategory()
    {
        $id = $_POST['subcategory_id'];
        $category_id = $_POST['category_id'];
        $category_name = $_POST['category_name'];
        $name = $_POST['subcategory_name'];
        $cat = new subcategory();
        $cat->setsubcategory_name($name);
        $cat->setsubcategory_id($id);
        $cat->setcategory_id($category_id);
        $delete = $cat->delete_subcategory($id);
        if ($delete) {
            $_SESSION['register'] = 'complete';
        } else {
            $_SESSION['register'] = 'failed';
        }
        require_once 'views/subcategory/subcategory_ok.php';
    }
}
