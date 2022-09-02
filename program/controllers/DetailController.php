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
        //Viene de worksheet_register.php line 16
        $worksheet_id = $_POST['worksheet_id'];
        $detail = new Detail();
        $detail -> setworksheet_id($worksheet_id);
        $data = $detail -> get_data();
        // saco todos los datos de la base de datos del proyecto
        $get_data = mysqli_fetch_object($data);
        // recorro todos los datos que se sacan de la base de datos
        $name = $get_data -> project_number.' '.$get_data -> boat_name;
        // le doy un nombre al proyecto con el numero y el nombre
        $section = new section();
        $show_section = $section -> showsection();
        $category = new Category();
        $subcategory = new Subcategory();
        
        // llega desde details register line 30
        if(isset($_POST['section'])){//section es el select, option
            // si me llega del select algo, lo busca en la tabla de category
            
            $count = 1;
            $section_id = $_POST['section'];// lee el tipo de seccion
            if($section_id == "new")// si es nueva te envia a index de secciones
            {
                header('location:'.base_url.'section/index');
            }
            $section -> setsection_id($section_id);
            $sec_name = $section->get_by_id(); //saca el nombre de la seccion por el numero
            $section -> setsection_name($sec_name);
            
            $setcat = $category -> setsection_id($section_id);
            $cate=$category -> showCategories();
            $section_name = $section -> getsection_name();
            
        }

        

        if(isset($_POST['category'])){//category es el 2 nivel de select, option
            // si me llega del select algo, lo busca en la tabla de subcategory
            $count = 2 ;
            $category_id = $_POST['category'];
            $category -> setCategory_id($category_id);
            $cat_name = $category->get_by_id();
            $section_name = $_POST['section_name'];  
           
            $subcategory = new subcategory();
            $subcategory -> setcategory_id($category_id);
            $show_subcategory = $subcategory -> showSubcategories();   
         }
var_dump($_POST);
        if(isset($_POST['subcategory'])){
            $count = 3;
            $subcategory_id = $_POST['subcategory'];
            $subcategory = new subcategory();
            $subcategory -> setsubcategory_id($subcategory_id);
            $show_subcategory = $subcategory -> showSubcategories();
var_dump($show_subcategory);

        }

        require_once 'views/detail/details_register.php';
       
    }

public function set_detail()
{

    
}


}
