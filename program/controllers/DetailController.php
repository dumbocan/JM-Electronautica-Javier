<?php
require_once 'models/section.php';
require_once 'models/category.php';
require_once 'models/detail.php';

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
        
        if(isset($_POST['section'])){
            // si me llega del select algo, lo busca en la tabla de category
            $count = 1 ;
            $section_id = $_POST['section'];
            $sec_name = $sec->get_by_id($section_id);
            $sec->setsection_name($sec_name);
            $cat= new category();
            $setcat = $cat->setsection_id($section_id);
            $cate=$cat->showCategories();
            
            
        }
       var_dump($_POST);
        if(isset($_POST['category'])){
            // si me llega del select algo, lo busca en la tabla de category
            $count = 1 ;
            $category_id = $_POST['category'];
            $cat_name = $cat->get_by_id($category_id);
            $cat->setcategory_name($sec_name);
            $subcat= new subcategory();
            $setcat = $subcat->setcategory_id($category_id);
            $subcate=$subcat->showSubcategories();
            
            
        }
        require_once 'views/detail/details_register.php';
       
    }
}
