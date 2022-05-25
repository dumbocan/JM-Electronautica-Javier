<?php

require_once 'models/boat.php';
class BoatController
{
    public function index()
    {
        echo 'Controlador boat, accion index';
    }

    public function register()
    {
        Utils::isAdmin();
        require_once 'views/costumer/boat_register.php';
    }

    public function save()
    {
        Utils::isAdmin();
        if (isset($_POST)) {
            $boat_name = isset($_POST['boat_name']) ? $_POST['boat_name'] : false;
            $marina = isset($_POST['marina']) ? $_POST['marina'] : false;
            $type = isset($_POST['type']) ? $_POST['type'] : false;

            if ($boat_name && $marina && $type) {
                $boat = new Boat();
                $boat->setBoat_name($boat_name);
                $boat->setMarina($marina);
                $boat->setType($type);

                $save = $boat->save();
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
        header('location:'.base_url.'boat/register');
    }
}
