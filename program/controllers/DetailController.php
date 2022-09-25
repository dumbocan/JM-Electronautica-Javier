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
        
       
        if(isset($_POST['count'])){

            $count= $_POST['count'] ;
        }
        Utils::isAdmin();
        // $count variable de control para el swift
        $count = 0;
        //Viene de worksheet_register.php
        $worksheet_id = $_POST['worksheet_id'];
        $detail = new Detail('');
        $section = new section();
        $category = new Category();
        $subcategory = new Subcategory();
        $worksheet = new Worksheet();
        $detail -> setworksheet_id($worksheet_id);

        //buscamos si hay material en base de datos
        

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
//var_dump($_POST);
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
            $detail_data = $detail -> get_detail_data();
            $price = $detail_data -> subcategory_price +=( ($detail_data -> subcategory_price) * 20 /100);
            $detail -> setmaterial_price($price);
            



           
        }
        
        require_once 'views/detail/details_register.php';
       
    }

    public function detail_save()
    {
        if(isset($_POST['detail_save'])){
            $worksheet_id = $_POST['worksheet_id'];
            $subcategory_id = $_POST['subcategory_id'];
            $material_quantity = $_POST['material_quantity'];
            $material_price = $_POST['material_price'];
            $detail_date = $_POST['detail_date'];
            $detail_discount = $_POST['detail_discount'];
            $subcategory_name = $_POST['subcategory_name'];
            $detail = new Detail();
            $detail -> setworksheet_id($worksheet_id);
            $detail -> setSubcategory_id($subcategory_id);
            $detail -> setMaterial_quantity($material_quantity);
            $detail -> setMaterial_price($material_price);
            $detail -> setdetail_date($detail_date);
            
            if($detail_discount == null){
                $detail_discount = 0;
            }
                $detail -> setdetail_discount($detail_discount);
            
            
            $save = $detail -> save_detail();
            if ($save) {
                $_SESSION['register'] = 'complete';
            } else {
                $_SESSION['register'] = 'failed';
            }
            require_once 'views/detail/detail_ok.php';
        }
        if(isset($_POST['add_stock']))
        {
            $add = $_POST['add'];
          
            $detail = new Detail();
            $worksheet_id = $_POST['worksheet_id'];
            $detail -> setWorksheet_id($worksheet_id);
            $subcategory_id = $_POST['subcategory_id'];
            $subcategory_name = $_POST['subcategory_name'];
            $subcategory_stock = 0; 
            $detail -> setSubcategory_id($subcategory_id);
            $category_name = $detail ->get_name_by_id();
            $subcategory = new Subcategory();
            $subcategory -> setsubcategory_id($subcategory_id);
            $subcategory -> setsubcategory_name($subcategory_name);
            $subcategory -> setsubcategory_stock($subcategory_stock);
            $get_subcategories = $subcategory -> showSubcategory();
            $result_get_subcategories = mysqli_fetch_object($get_subcategories);
            $category_data = $detail ->get_name_by_id();
            $category_name = $category_data -> category_name;
            $category_id = $category_data -> category_id;
            
            require_once 'views/subcategory/subcategory_update.php';

            //var_dump( $result_get_subcategories);
        }
    }

    public function update_detail()
    {   var_dump($_POST);
        $count = 3;

        if (isset($_POST['count']) && $_POST['count'] == 2){
            $count = $_POST['count'];

             }elseif (isset($_POST['count']) && $_POST['count'] == 1){
                $count = $_POST['count'];
                $category_id = $_POST['category'];
            }
        $detail_id = $_POST['detail_id'];
        //$subcategory_name = $_POST['subcategory_name'];
        $detail = new Detail($detail_id);
        $subcategory = new Subcategory(); 
        $subcategory -> setsubcategory_id($detail -> subcategory_id);
        $show_subcategory = $detail -> get_subcategories(); 
        $detail_data = $detail -> get_detail_data();
        $show_category = $detail -> get_categories();

       // $category = new Category();
        //$category -> setcategory_id($subcategory -> category_id);
        //var_dump($category);
        require_once 'views/detail/detail_update.php';
        
        

    }


}
