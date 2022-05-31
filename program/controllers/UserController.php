<?php

require_once 'models/user.php';

class UserController
{
    //Primera pagina en mostrarse por default
    public function index()
    {
        //echo 'Controlador Usuarios, accion index';
        require_once 'views/user/login.php';
    }

    // Manda a la vista para registrar
    public function register()
    {
        require_once 'views/user/register.php';
    }

    public function save()
    {
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            if ($nombre && $apellidos && $email && $password) {
                $usuario = new User();
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($password);

                $save = $usuario->save();
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
        header('location:'.base_url.'usuario/register');
    }

    public function login()
    {
        require_once 'views/user/login.php';
        if (isset($_POST)) {
            //identificar al usuario
            //
            //consulta a bbase de datos
            $usuario = new User();
            $usuario->setEmail($_POST['email']);

            $usuario->setPassword($_POST['password']);

            $identity = $usuario->login();

            if ($identity && is_object($identity)) {
                $_SESSION['identity'] = $identity;

                if ($identity->rol == 'admin') {
                    $_SESSION['admin'] = true;
                }
            } else {
                $_SESSION['error_login'] = 'Identificacion fallida!!';
            }
            //crear una sesion
        }
        header('location:'.base_url);
    }

    public function logOut()
    {
        if (isset($_SESSION['identity'])) {
            unset($_SESSION['identity']);
        }
        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }
        header('location:'.base_url);
    }
}
