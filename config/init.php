<?php 
//initilise
ob_start();
error_reporting(0);
session_start();
require_once'db.php';
    try {
            $dbh = new PDO($dsn,$username,$password);
        }
        catch (PDOException $e)
        {
            die ( 'Connection failed: ' . $e->getMessage());
        }
