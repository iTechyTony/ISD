<?php
	
//Make connection to database
require_once'config/init.php';
//Gather data sent from AmendProducts.php page
$New_ProductName=$_POST['txtProductName'];

$New_ProductPrice=$_POST['txtProductPrice'];

$Tweak_Image=$_POST['ImageFilename'];

$SameID=$_POST['hideProductID'];

//Produce an update query to update product record for the id provided
$query = "UPDATE testproducts
SET
 ProductName='$New_ProductName', 
 ProductPrice='$New_ProductPrice',
 ImageName='$Tweak_Image'
WHERE ProductID='$SameID'";

//run query 
$result = mysqli_query($connection,$query) or exit ("Error in query: $query. ".mysqli_error()); 

//Redirect to ManageProducts.php page
header( 'Location: manage_product.php' ) ;


