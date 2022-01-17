<?php
require_once("config.php");

/*
{
    protected $pdo;
    public fuction getConexion(){
        return $this ->pdo;
    }
}
public function_construct()
{
*/
    try {
    $connection= new PDO('mysql:host='.DBHOST.';dbname='.DBNAME,DBUSER,DBPASS);
    } catch (Exception $e) {
        die($e->getMessage());
    }
?>