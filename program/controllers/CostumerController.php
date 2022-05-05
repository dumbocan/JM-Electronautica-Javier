<?php

require_once 'models/costumer.php';
require_once 'models/boat.php';
require_once 'models/project.php';
class CostumerController
{
    public function index()
    {
        echo 'Controlador costumer, accion indexado';
    }

    public function register()
    {
        Utils::isAdmin();
        require_once 'views/costumer/costumer_register.php';
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

            if ($costumer_name && $address && $passport && $country && $telephone && $email && $boat_name && $marina && $type) {
                $costumer = new Costumer();
                $costumer->setCostumer_name($costumer_name);
                $costumer->setAddress($address);
                $costumer->setPassport($passport);
                $costumer->setCountry($country);
                $costumer->setTelephone($telephone);
                $costumer->setEmail($email);

                $save = $costumer->save();

                $id = $costumer->getCostumer_id();
                $_SESSION['id']=$id;
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

                /*$project = new Project();
                $number = $project->getNumber();
                $project->setProject_number($number);
              
                $projectNumber=$project->getProject_number();*/
            } else {
                $_SESSION['register'] = 'failed';
            }
        } else {
            $_SESSION['register'] = 'failed';
        }
        if ($_SESSION['register'] == 'complete') {
            
            header('location:'.base_url.'project/description');
        } else {
        
            header('location:'.base_url.'costumer/costumer_register');
        }
    }

    /*public function get_data()
    {
        $project = new Boat();
        //$data_boat=new Boat;
        $id = $this->costumer_id;
        $data = $project->getData($id);

        require_once 'views/project/description.php';
    }*/
}
