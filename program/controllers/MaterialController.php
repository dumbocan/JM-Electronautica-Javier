<?php 


require_once 'models/material.php';
require_once 'models/supplier.php';

class MaterialController
{

    public function show_material()
    {
        $material = new Material(0);
        $data = $material -> show_material();
        require_once 'views/material/material_register.php';
    }

    public function add_material()
    {
        $material = new Material(0);
        $supplier = new Supplier(0);
       // 
        $supplier_data = $supplier -> get_supplier();
        require_once 'views/material/material_new.php';

    }

    public function material_save()
    {
        var_dump($_POST);
        $material_name = $_POST['material_name'];
        $material_stock = $_POST['material_stock'];
        $material = new Material(0);
        $material -> setMaterial_name($material_name);
        $material -> setMaterial_stock($material_stock);
        $material -> add_material();
    }
}