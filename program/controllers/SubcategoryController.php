<?php

require_once 'models/subcategory.php';
require_once 'models/detail.php';

class subcategoryController extends DetailController
{
    public function index()
    {
        Utils::isAdmin();
        if(isset($_POST['add']))  {
            $add = '1';}else{
            $add = '0';}    
        $category_name = $_POST['category_name'];
        $category_id = $_POST['category_id'];
        $cat = new subcategory();
        $cat -> setcategory_id($category_id);
        $subcategory = $cat -> showSubcategories(); 
        
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
       
        require_once 'views/subcategory/subcategory_register.php';
    }

    public function save_subcategory()
    {
        Utils::isAdmin();
       
        $subcategory_name = $_POST['subcategory_name'];
        $subcategory_stock = $_POST['subcategory_stock'];
        $subcategory_price = $_POST['subcategory_price'];
        $serial_number = $_POST['serial_number'];


        $category_id = $_POST['category_id'];
        $category_name = $_POST['category_name'];
        $cat = new subcategory();
        $cat->setsubcategory_name($subcategory_name);
        $cat->setsubcategory_stock($subcategory_stock);
        $cat->setsubcategory_price($subcategory_price);
        $cat->setserial_number($serial_number);
        $cat->setcategory_id($category_id);
        $save = $cat->save_subcategory();
        $subcategory_id = $cat -> show_subcategory_id();

       /* $detail = new detail();
        //busco los datos de precio insertados, y busco el % de precio a incrementar y lo aplico a la tabla de detail

        $detail -> setSubcategory_id($subcategory_id);
        $detail_data = $detail -> get_detail_data();
        $percentage = $detail -> get_material_price_percentage();
       
        $price = $detail_data -> subcategory_price +=( ($detail_data -> subcategory_price) * $percentage /100);
        $detail -> setmaterial_price($price); */
        
        

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
        $category_id = $_POST['category_id'];        
        $category_name = $_POST['category_name'];
        $subcategories = new subcategory();
        $subcategories -> setsubcategory_id($id);
        $subcategories -> setsubcategory_name($name);
        $subcategories -> setcategory_id($category_id);
        $get_subcategories = $subcategories -> showSubcategory();
        $result_get_subcategories = mysqli_fetch_object($get_subcategories);
        //var_dump($result_get_subcategories);
        
        require_once 'views/subcategory/subcategory_update.php';
    }

    public function update_subcategory()
    {
        $subcategory_id = $_POST['subcategory_id'];
        $subcategory_name = $_POST['subcategory_name'];
        $subcategory_stock = $_POST['subcategory_stock'];
        $subcategory_price = $_POST['subcategory_price'];
        $serial_number = $_POST['serial_number'];
        $add = $_POST['add'];
        $category_name = $_POST['category_name'];
        $category_id = $_POST['category_id'];
        $cat = new subcategory();
        $cat->setsubcategory_name($subcategory_name);
        $cat->setsubcategory_stock($subcategory_stock);
        $cat->setsubcategory_price($subcategory_price);
        $cat->setserial_number($serial_number);

        $cat->setsubcategory_id($subcategory_id);
        $cat->setcategory_id($category_id);
        $save = $cat->edit_subcategory();

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
