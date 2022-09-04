<?php
require_once 'models/section.php';
require_once 'models/category.php';
require_once 'models/detail.php';
require_once 'models/subcategory.php';
require_once 'models/worksheet.php';

class DetailController extends worksheetController
{
    public function insert()
    {
        Utils::isAdmin();
        echo 'Controlador detail, accion indexado';
    }

    public function add_detail()
    {
        Utils::isAdmin();
        // $count variable de control para el swift
        $count = 0;
        //Viene de worksheet_register.php
        $worksheet_id = $_POST['worksheet_id'];
         $detail = new Detail();
         $section = new section();
         $category = new Category();
        $subcategory = new Subcategory();
        $worksheet = new Worksheet();
      
        $detail -> setworksheet_id($worksheet_id);
        $data = $detail -> get_data();
        // saco todos los datos de la base de datos del proyecto
        $get_project_data = mysqli_fetch_object($data);
        // recorro todos los datos que se sacan del proyecto
        $name = $get_project_data -> project_number.' '.$get_project_data -> boat_name;
        // le doy un nombre al proyecto con el numero y el nombre
        $worksheet -> setworksheet_date($get_project_data -> worksheet_date);
        $worksheet -> setWorksheet_id($worksheet_id);
        $show_section = $section -> showsection();
      
        // llega desde details register 
        if(isset($_POST['section'])){//section es el select, option
            // si me llega del select section, lo busca en la tabla de category
            
            $count = 1;
            // $count variable de control para el swift
            $section_id = $_POST['section'];// lee el tipo de seccion
            if($section_id == "new")// si es nueva te envia a index de secciones
            {
                header('location:'.base_url.'section/index');
            }
            $section -> setsection_id($section_id);
            $set_section_name = $section->get_by_id(); //saca el nombre de la seccion por el numero
            $section -> setsection_name($set_section_name -> section_name);
            
            $category -> setsection_id($section_id);
            $show_categories = $category -> showCategories();
            $get_section_name = $section -> getsection_name();
            
        }

        

        if(isset($_POST['category'])){//category es el 2 nivel de select, option
            // si me llega del select algo, lo busca en la tabla de subcategory
            $count = 2 ;
            $category_id = $_POST['category'];
            $category -> setCategory_id($category_id);
            $subcategory -> setcategory_id($category_id);
            $show_subcategory = $subcategory -> showSubcategories();   
         }
var_dump($_POST);
        if(isset($_POST['subcategory'])){
            $count = 3;
            $subcategory_id = $_POST['subcategory'];
            $subcategory -> setsubcategory_id($subcategory_id);

            
            $show_subcategory = $subcategory -> showSubcategory();
            $subcategory_data = mysqli_fetch_object($show_subcategory);
            $subcategory -> setsubcategory_id($subcategory_id);
            $subcategory -> setsubcategory_name($subcategory_data -> subcategory_name);
            $subcategory -> setsubcategory_stock($subcategory_data -> subcategory_stock);
            $subcategory -> setsubcategory_price($subcategory_data -> subcategory_price);

            $detail -> setworksheet_id($worksheet_id);
            $detail -> setsubcategory_id($subcategory_id);
           // $detail -> setmaterial_quantity();
           // $detail -> setmaterial_price();

            $quantity = $subcategory -> getsubcategory_stock();


           // var_dump($quantity);
        }


        require_once 'views/detail/details_register.php';
       
    }




}
