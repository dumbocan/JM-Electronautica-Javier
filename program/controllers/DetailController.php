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
        $count=0;
        //Viene de worksheet_register.php line 16
        $worksheet_id = $_POST['worksheet_id'];
        $detail = new Detail();
        $detail -> setworksheet_id($worksheet_id);
        $data = $detail -> get_data();
        // saco todos los datos de la base de datos del proyecto
        $de= mysqli_fetch_object($data); var_dump($de);
        // recorro todos los datos que se sacan de la base de datos
        $name = $de -> project_number.' '.$de -> boat_name;
        // le doy un nombre al proyecto con el numero y el nombre
        $sec = new section();
        $secti = $sec -> showsection();
        $cat = new Category();
        
        // llega desde details register line 30
        if(isset($_POST['section'])){//section es el select, option
            // si me llega del select algo, lo busca en la tabla de category
            
            $count = 1;
            $section_id = $_POST['section'];// lee el tipo de seccion
            if($section_id == "new")// si es nueva te envia a index de secciones
            {
                header('location:'.base_url.'section/index');
            }
            $sec -> setsection_id($section_id);
            $sec_name = $sec->get_by_id(); //saca el nombre de la seccion por el numero
            $sec->setsection_name($sec_name);
            
            $setcat = $cat->setsection_id($section_id);
            $cate=$cat->showCategories();
            $a=$sec->getsection_name();
            
        }

        

        if(isset($_POST['category'])){//category es el 2 nivel de select, option
            // si me llega del select algo, lo busca en la tabla de subcategory
            $count = 2 ;
            $category_id = $_POST['category'];
            $cat -> setCategory_id($category_id);
            $cat_name = $cat->get_by_id();
            $a = $_POST['section_name'];
           
            $subcat= new subcategory();
            $subcat-> setcategory_id($category_id);
            $subcat_name = $subcat->showSubcategories();
            
         }
        require_once 'views/detail/details_register.php';
       
    }

public function set_detail()
{

    
}


}
