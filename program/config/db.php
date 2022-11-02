<?php
class Database{
    public static function connect(){
        $db = new mysqli('localhost', 'javier', 'monleon', 'jm test');
        $db ->query("SET NAMES 'utf8'");
        
        /* comprobar conexión */
if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}
        
        return $db;
    }
}