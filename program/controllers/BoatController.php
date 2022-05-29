<?php

require_once 'models/boat.php';
class BoatController 
{
    public function index()
    {
        echo 'Controlador boat, accion index';
    }

   /* public function edit()
    { 
        if (isset($_POST['boat_name'])) {
            $boat_name = $_POST['boat_name'];
            $boat = new Boat();
            $boat->setBoat_name($boat_name);
            $search = $boat->search_db();

        require_once 'views/boat/boat_edit.php';
        }
    }
*/
    public function update()
    {
        if(isset($_POST)){
        $boat_name = isset($_POST['boat_name']) ? $_POST['boat_name'] : false;
        $marina = isset($_POST['marina']) ? $_POST['marina'] : false;
        $type = isset($_POST['type']) ? $_POST['type'] : false;
        $boat= new Boat;
        $boat->setBoat_name($boat_name);
        $boat->setMarina($marina);
        $boat->setType($type);

        $update=$boat->update();
        
        }
    } 

    public function delete()
    {
        echo"delete boat";
    }

    public function search()
    {
        Utils::isAdmin();
        require_once 'views/boat/boat_search.php';
    }

   /* public function search_db()
    {
        Utils::isAdmin();
        if (isset($_POST['name'])) {
            $boat_name = $_POST['name'];
            $boat = new Boat();
            $boat->setBoat_name($boat_name);
            $search = $boat->search_db();

            require_once 'views/boat/boat_gest.php';
        }
    }
*/
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
       
        header('location:'.base_url.'boat/register');
    }
}
