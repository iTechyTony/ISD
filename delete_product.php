<?php
//Make connection to database
require_once'config/init.php';

//Gather id from $_GET[]
$ID=$_GET['id'];

//Construct DELETE query to remove record where WHERE id provided equals the id in the table
$sql = "DELETE FROM testproducts WHERE ProductID='$ID'";
$dbh->query($sql);
	header('Location: ' .'manage_products.php');

