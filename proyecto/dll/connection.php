<?php
require_once("config.php");

    try {
    $connection= new PDO('mysql:host='.DBHOST.';dbname='.DBNAME,DBUSER,DBPASS);
    } catch (Exception $e) {
        die($e->getMessage());
    }
?>