<?php

require_once 'models/material.php';
require_once 'models/supplier.php';

class MaterialController
{
    public function show_material()
    {
        $material = new Material(0);
        $data = $material->show_material();
        require_once 'views/material/material_register.php';
    }

    public function add_material()
    {
        $material = new Material(0);
        $supplier = new Supplier(0);

        $supplier_data = $supplier->get_supplier();
        require_once 'views/material/material_new.php';
    }

    public function material_save()
    {
        $material_name = $_POST['material_name'];
        $material_stock = $_POST['material_stock'];
        $material_price = $_POST['material_price'];
        $material_sn = $_POST['material_sn'];
        $supplier_id = $_POST['supplier_id'];

        $material = new Material(0);
        $material->setMaterial_name($material_name);
        $material->setMaterial_stock($material_stock);
        $material->setMaterial_price($material_price);
        $material->setMaterial_sn($material_sn);
        $material->setSupplier_id($supplier_id);
        $material->setMaterial_stock($material_stock);

        $add_material = $material->add_material();
        if ($add_material) {
            $_SESSION['register'] = 'complete';
        } else {
            $_SESSION['register'] = 'failed';
        }
        header('location:'.base_url.'material/show_material');
         //require_once 'views/material/material_register.php';
    }

    public function edit_material()
    {
        $material_id = $_POST['material_id'];
        $material = new material($material_id);
        $supplier = new Supplier($material -> supplier_id);
        
        $suppliers = $supplier->get_supplier();
        require_once 'views/material/edit_material.php';
    }

    public function update_material()
    {   
        $material_id = $_POST['material_id'];
        $material_name = $_POST['material_name'];
        $material_stock = $_POST['material_stock'];
        $material_price = $_POST['material_price'];
        $material_sn = $_POST['material_sn'];
        $supplier_id = $_POST['supplier_id'];

        $material = new Material(0);
        $material->setMaterial_id($material_id);
        $material->setMaterial_name($material_name);
        $material->setMaterial_stock($material_stock);
        $material->setMaterial_price($material_price);
        $material->setMaterial_sn($material_sn);
        $material->setSupplier_id($supplier_id);
        $material->setMaterial_stock($material_stock);

        $material_update = $material -> update_material();
        if ($material_update) {
            $_SESSION['register'] = 'complete';
        } else {
            $_SESSION['register'] = 'failed';
        }
        header('location:'.base_url.'material/show_material');

    }

    public function material_ask_delete()
    {
        $material_name = $_POST['material_name'];
        $material_id = $_POST['material_id'];
        require_once 'views/material/material_delete.php';
    }

    public function material_delete()
    {
        $material_id = $_POST['material_id'];
        $material = new material($material_id);
        $delete = $material -> material_delete();
        if ($delete) {
            $_SESSION['register'] = 'complete';
        } else {
            $_SESSION['register'] = 'failed';
        }
        header('location:'.base_url.'material/show_material');
    }

}
