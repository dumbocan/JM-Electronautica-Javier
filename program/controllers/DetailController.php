<?php
require_once 'models/section.php';
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
        $worksheet_id = $_POST['id'];

        $detail = new Detail();
        $data=$detail->get_data($worksheet_id);
        $de= mysqli_fetch_object($data);
        //var_dump($de);
        $name= $de->project_number.' '.$de->boat_name;
        $sec= new section();
        $secti=$sec->showsection();
        require_once 'views/detail/details_register.php';
       
    }
}
