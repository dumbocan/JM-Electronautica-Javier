<?php
require_once 'models/material.php';

require_once 'models/detail.php';
require_once 'models/worksheet.php';

class DetailController extends worksheetController
{
     
    public function add_detail()
    {          
       
       
        Utils::isAdmin();
        $quantity = 0;
        $search_db = 0;
        //Viene de worksheet_register.php
        $worksheet_id = $_POST['worksheet_id'];
        $detail = new Detail(0);
      
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
      

            $detail -> setworksheet_id($worksheet_id);
            
           

           
            
                if(isset($_POST['material_name'])){
                    $search_db =1;
                    $material = new Material(0);
                    $material_name = $_POST['material_name'];
                    $material -> setMaterial_name($material_name);
                    $search = $material -> search_db();
                    

                }   

                if(isset($_POST['material_id'])){
                    $search_db = 2;
                    $material_id = $_POST['material_id'];
                    $worksheet_id = $_POST['worksheet_id'];
                    $material = new Material($material_id);
                    $quantity = $material -> material_stock;
                    $detail = new Detail(0);
                    $detail -> setMaterial_id($material_id);
                    $detail_data = $detail -> get_detail_data();
                    $price = $detail_data -> material_price +=( ($detail_data -> material_price) * 20 /100);
                    $detail -> setmaterial_price($price);
                    

                }

           
    
        
        require_once 'views/detail/details_register.php';
       
    }

    public function detail_save()
    {
        
            $worksheet_id = $_POST['worksheet_id'];
            $material_id = $_POST['material_id'];
            $material_quantity = $_POST['material_quantity'];
            $material_price = $_POST['material_price'];
            $detail_date = $_POST['detail_date'];
            $detail_discount = $_POST['detail_discount'];
            $subcategory_name = $_POST['subcategory_name'];
            $detail = new Detail(0);
            $detail -> setworksheet_id($worksheet_id);
            $detail -> setMaterial_id($material_id);
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

  

    public function add_stock()
    {
        $detail = new Detail($detail_id);

    }

}
