<?php require_once 'config/init.php'; ?>
<!DOCTYPE html>
<html lang = "en">
  <head>
    <title>ISD Insert, Amend and Delete</title>
	  <?php require_once 'head.php'; ?>
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <div class = "container">
<br><br><br><br>
  <div class = "row">
       <div class = "col-lg-3">
           <?php require_once 'leftnav.php'; ?>
            </div>
  <div class = "col-lg-9">
         <div class = "panel panel-info">
  <div class = "panel-heading">
    <h3 class = "panel-title">Homepage</h3>
  </div>
  <div class = "panel-body">
    <h1>Products Table</h1>
    <table class = "table table-striped">
      <thead>
        <tr>
            <th><a href = manage_products.php?cat=ProductName>Product Name</a></th>
            <th><a href = manage_products.php?cat=ProductPrice>Price</a></th>
            <th>Image</th>
            <th>Amend</th>
	        <th>Delete</th>
        </tr>
      </thead>
      <tbody>
	  <?php
		  function displayData ( $result )
		  {
			  while ( $row = $result->fetch ( PDO::FETCH_ASSOC ) ) {
				  echo '<tr><td>' . $row[ "ProductName" ] . '</td>';
				  echo '<td>' . $row[ "ProductPrice" ] . '</td>';
				  echo '<td><img src="assets/images/' . $row[ 'ImageName' ] . '">' . '</td>';
				  echo '<td><a href="amend_product.php?id=' . $row[ 'ProductID' ] . '">Amend</a></td>';
				  echo '<td>' . '<a href="delete_product.php?id=' . $row[ 'ProductID' ] . '">Delete</a></td></tr>';
			  }
		  }


		  if ( isset( $_GET[ 'cat' ] ) ) {
			  $cat = $_GET[ 'cat' ];
			  $sql = "SELECT * FROM testproducts ORDER BY $cat ";
			  $result = $dbh->query ( $sql );
			  displayData ( $result );
		  }
		  else {
			  $sql = "SELECT * FROM testproducts ORDER BY ProductPrice,ProductName";
			  $result = $dbh->query ( $sql );
			  displayData ( $result );
		  }
	  ?>
      </tbody>
    </table>
      <h2>Admin Form</h2>

      <?php
      if(isset($_POST['product_name']) && isset($_POST['product_price']))
      {
          $product_name = $_POST['product_name'];
          $product_price = $_POST['product_price'];
          if (!empty($product_name) && !empty($product_price))
          {
              if(is_numeric($product_price) && !is_numeric($product_name))
              {
                  echo '<div class="alert alert-success" role="alert">You have successfully added a product';
                  echo '<br>Details Below<br>Product Name: '.$product_name;
                  echo '<br>Product Price: '.$product_price.'</div>';
                  $sql = "INSERT INTO `testproducts` VALUES ('','$product_name','$product_price', '')";
                  $dbh->query($sql);

                  header('Location: ' .'manage_products.php');

              }
              else
              {
                  echo '<div class="alert alert-danger" role="alert">Only words can be entered into Product Name<br>';
                  echo 'Only numbers can be enterred into Product Price<br></div>';
              }

          }
          else
          {
              echo '<div class="alert alert-danger" role="alert">All Fields Required</div>';
          }

      }
?>
        <form class = "form-horizontal" method="post" action="manage_products.php">
<fieldset>
<!-- Form Name -->
<legend>Inserting Into Product Table</legend>

<!-- Text input-->
<div class = "form-group">
  <label class = "col-md-4 control-label" for = "product_name"></label>
  <div class = "col-md-4">
  <input id = "product_name" name = "product_name" type = "text" placeholder = "Product Name" class = "form-control input-md">

  </div>
</div>

<!-- Text input-->
<div class = "form-group">
  <label class = "col-md-4 control-label" for = "product_price"></label>
  <div class = "col-md-4">
  <input id = "product_price" name = "product_price" type = "text" placeholder = "Product Price" class = "form-control input-md" required = "">

  </div>
</div>

    <!-- Text input-->
    <div class = "form-group">
        <label class = "col-md-4 control-label" for = "image_name"></label>
        <div class = "col-md-4">
            <input id = "image_name" name = "image_name" type = "text" placeholder = "Image Name" class = "form-control input-md" required = "">
        </div>
    </div>
<!-- File Button

<div class = "form-group">
  <label class = "col-md-4 control-label" for = "img_tag">Image</label>
  <div class = "col-md-4">
    <input id = "img_tag" name = "img_tag" class = "input-file" type = "file">
  </div>
</div>
<!-- TO BE DONE-->

<!-- Button (Double) -->
<div class = "form-group">
  <label class = "col-md-4 control-label" for = "btnSuccess"></label>
  <div class = "col-md-8">
    <button id = "btnSuccess" type="submit" name = "btnSuccess" class = "btn btn-success">Submit</button>
    <button id = "btnClear" type="reset" name = "btnClear" class = "btn btn-danger">Clear</button>
  </div>
</div>
</fieldset>
</form>
            </div>
        </div>
    </div>
  </div>
	    <?php include_once 'footer.php'; ?>
    </div>
    <?php include 'javascript_link.php'; ?>
  </body>
</html>