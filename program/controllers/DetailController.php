<?php
require_once 'models/section.php';
require_once 'models/category.php';
require_once 'models/detail.php';
require_once 'models/subcategory.php';


class DetailController
{
    public function insert()
    {
        Utils::isAdmin();
        echo 'Controlador detail, accion indexado';
    }

    public function add_detail()
    {
        Utils::isAdmin();
        $count=0;
        
        $worksheet_id = $_POST['id'];
       
        $detail = new Detail();
        $data=$detail->get_data($worksheet_id);
        $de= mysqli_fetch_object($data);
        
        $name= $de->project_number.' '.$de->boat_name;
        $sec= new section();
        $secti=$sec->showsection();
        $cat = new Category();
        

        if(isset($_POST['section'])){
            // si me llega del select algo, lo busca en la tabla de category
            
            $count = 1;
            $section_id = $_POST['section'];
            if($section_id == "new")
            {

                header('location:'.base_url.'section/new_section');
            }
            $sec_name = $sec->get_by_id($section_id);
            $sec->setsection_name($sec_name);
            $cat= new category();
            $setcat = $cat->setsection_id($section_id);
            $cate=$cat->showCategories();
            $a=$sec->getsection_name();
           
            
        }

        

        if(isset($_POST['category'])){
            // si me llega del select algo, lo busca en la tabla de subcategory
            $count = 2 ;
            $category_id = $_POST['category'];
            $cat_name = $cat->get_by_id($category_id);
            $a = $_POST['section_name'];
            if($category_id == "new")
            {
                  $count = 3;        var_dump($_POST);

                  $section_name = $_POST['section_name'];
                  $section_id = $_POST['section_id'];
                             
            }else{
           
            $subcat= new subcategory();
            $subcat-> setcategory_id($category_id);
            $subcat_name = $subcat->showSubcategories();
            //$cat->setcategory_name($sec_name);
            
            //$setcat = $subcat->setcategory_id($category_id);
            //$subcate=$subcat->showSubcategories();
            
            }
         }
        require_once 'views/detail/details_register.php';
       
    }
}
