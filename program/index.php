<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php

session_start();
ob_start();


require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
require_once 'views/layouts/header.php';
require_once 'views/layouts/bar.php';
//require_once 'views/user/login.php';
require_once 'views/layouts/footer.php';
$work = 'work';
$invoice = 'invoice';

// empezar el set de la base de datos para el inicializar
// el numero de factura y hoja de trabajo cada mes
Utils::setEvent($work);
Utils::setEvent($invoice);


function show_error()
{
    $error = new errorController();
    $error->index();
}

// Direccionamiento de URL amistosa de MVC
if (isset($_GET['controller'])) {
    $nombre_controlador = $_GET['controller'].'controller';
} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
    $nombre_controlador = controller_default;
} else {
    show_error();
    exit();
}

if (class_exists($nombre_controlador)) {
    $controlador = new $nombre_controlador();

    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];

        $controlador->$action();
    } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
        $action_default = action_default;
        $controlador->$action_default();
    } else {
        show_error();
    }
} else {
    show_error();
}

//require_once 'views/layouts/footer.php';
