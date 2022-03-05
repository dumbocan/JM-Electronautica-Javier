<?php

require_once 'models/costumer.php';

class CostumerController
{
    public function index()
    {
        require_once 'views/layouts/header.php';
        echo 'Controlador costumer, accion index';
    }

    public function registro()
    {
        require_once 'views/layouts/header.php';
        require_once 'views/costumer_input.php';
    }

    public function save()
    {
        if (isset($_POST)) {
            $costumer_name = isset($_POST['costumer_name']) ? $_POST['costumer_name'] : false;
            $address = isset($_POST['address']) ? $_POST['address'] : false;
            $passport = isset($_POST['passport']) ? $_POST['passport'] : false;
            $country = isset($_POST['country']) ? $_POST['country'] : false;
            $telephone = isset($_POST['telephone']) ? $_POST['telephone'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            if ($costumer_name && $address && $passport && $country && $telephone && $email) {
                $costumer = new Costumer();
                $costumer->setCostumer_name($costumer_name);
                $costumer->setAddress($address);
                $costumer->setPassport($passport);
                $costumer->setCountry($country);
                $costumer->setTelephone($telephone);
                $costumer->setEmail($email);

                $save = $costumer->save();
                if ($save) {
                    $_SESSION['register'] = 'complete';
                } else {
                    $_SESSION['register'] = 'failed';
                }
            } else {
                $_SESSION['register'] = 'failed';
            }
        } else {
            $_SESSION['register'] = 'failed';
        }
        //var_dump($_SESSION);
        //exit();
        header('location:'.base_url.'costumer/registro');
    }
}
