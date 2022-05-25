<?php

class Utils
{
    public static function deleteSession($name)
    {
        if (isset($_SESSION[$name])) {
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }

        return $name;
    }

    public static function isAdmin()
    {
        if (!isset($_SESSION['admin'])) {
            header('location:'.base_url);
        } else {
            return true;
        }
    }

    public static function setEvent($table)
    {
        $db = Database::connect();
        $db ->query("SET GLOBAL event_scheduler = ON;");
        $sql = "
        CREATE EVENT reset".$table."
        ON SCHEDULE EVERY 1 MONTH STARTS (select adddate(last_day(curdate()), 1))
        DO truncate table ".$table."_number;
        ";
        $query = $db->query($sql);
        
        
    }

    public static function insertNumber()
    {
        $db = Database::connect();
        $sql = 'INSERT INTO work_number (id,work_number) SELECT NULL, CONCAT(DATE_FORMAT(NOW(),"%y-%m-"),LPAD(COUNT(*)+1,3,"0"))FROM work_number;';
        $query = $db->query($sql);
        
       
    }
}
