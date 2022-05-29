<?php

require_once 'models/costumer.php';

require_once 'models/project.php';
class CostumerController extends BoatController
{
    public function index()
    {
        echo 'Controlador costumer, accion indexado';
    }

    public function edit()
    {
        if (isset($_POST['costumer_name'])) {
            $name = $_POST['costumer_name'];
            $edit = true;

            $costumer = new Costumer();
            $costumer->setcostumer_name($name);
            $pro = $costumer->search_db();
            $data = $pro->fetch_object();
            require_once 'views/costumer/costumer_register.php';
        } elseif (isset($_POST['boat_name'])) {
            $boat_name = $_POST['boat_name'];
            $boat = new Boat();
            $boat->setBoat_name($boat_name);
            $pro = $boat->search_db();
            $data = $pro->fetch_object();
            require_once 'views/costumer/costumer_register.php';
        } else {
            header('Location:'.base_url.'costumer/index');
        }
    }

    public function delete()
    {
        echo'delete costumer';
    }

    public function register()
    {
        Utils::isAdmin();
        require_once 'views/costumer/costumer_register.php';
    }

    public function search()
    {
        Utils::isAdmin();
        require_once 'views/costumer/costumer_search.php';
    }

    public function search_db()
    {
        Utils::isAdmin();
       

        if (isset($_POST['costumer']) == 'costumer') {
            $name = $_POST['costumer_name'];
            $costumer = new Costumer();
            $costumer->setcostumer_name($name);
            $search = $costumer->search_db();
            require_once 'views/costumer/costumer_gest.php';

        } elseif (isset($_POST['boat'])== "boat") {
            $boat_name = $_POST['boat_name'];
            
            $boat = new Boat();
            $boat->setBoat_name($boat_name);
            $search = $boat->search_db();

            require_once 'views/boat/boat_gest.php';

        } else {
            header('Location:'.base_url.'costumer/index');
        }
    }

    public function save()
    {
        Utils::isAdmin();
        if (isset($_POST)) {
            $costumer_name = isset($_POST['costumer_name']) ? $_POST['costumer_name'] : false;
            $address = isset($_POST['address']) ? $_POST['address'] : false;
            $passport = isset($_POST['passport']) ? $_POST['passport'] : false;
            $country = isset($_POST['country']) ? $_POST['country'] : false;
            $telephone = isset($_POST['telephone']) ? $_POST['telephone'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $boat_name = isset($_POST['boat_name']) ? $_POST['boat_name'] : false;
            $marina = isset($_POST['marina']) ? $_POST['marina'] : false;
            $type = isset($_POST['type']) ? $_POST['type'] : false;

            if ($costumer_name && $address && $passport && $country && $telephone && $boat_name && $marina && $type) {
                $costumer = new Costumer();
                $costumer->setCostumer_name($costumer_name);
                $costumer->setAddress($address);
                $costumer->setPassport($passport);
                $costumer->setCountry($country);
                $costumer->setTelephone($telephone);
                $costumer->setEmail($email);

                $save = $costumer->save();

                $id = $costumer->getCostumer_id();
                $_SESSION['id'] = $id;
                $boat = new Boat();

                $boat->setBoat_name($boat_name);
                $boat->setMarina($marina);
                $boat->setType($type);
                $boat->setCostumer_id($id);

                $saveBoat = $boat->save();

                if ($save && $saveBoat) {
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
        if ($_SESSION['register'] == 'complete') {
            //require_once 'views/project/description.php';
            header('location:'.base_url.'project/description');
        } else {
            header('location:'.base_url.'costumer/costumer_register');
        }
    }
}
