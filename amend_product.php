<?php require_once 'config/init.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head> 
    <title>Internet Systems Development - Amending Form</title>
<?php require_once 'head.php'; ?>
  </head>
  <body>
    <?php include'navbar.php'; ?>
 <div class="container">
<br><br><br><br>
  <div class="row">
       <div class="col-lg-3">
           <?php require_once'leftnav.php'; ?>
              
            </div>
  <div class="col-lg-9">
         <div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Homepage</h3>
  </div>
  <div class="panel-body">


      <?php
      if(isset($_POST['product_name']) && isset($_POST['product_price']) && isset($_POST['image_name']) )
      {
         echo  $product_id = $_POST['product_id'];
        echo  $product_name = $_POST['product_name'];
        echo  $product_price = $_POST['product_price'];
       echo   $image_name = $_POST['image_name'];
          if (!empty($product_name) && !empty($product_price))
          {
              if(is_numeric($product_price) && !is_numeric($product_name))
              {
                  // UPDATE PRODUCT
               echo   $sql = "UPDATE testproducts SET ProductName='$product_name', ProductPrice='$product_price', ImageName='$image_name' WHERE ProductID='$product_id'";
                  $result = $dbh->exec($sql);
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
      <?php
      // GETS THE ID
      $AmendID=$_GET['id'];
      // MAKE THE SQL QUERY
      $sql ="SELECT * FROM testproducts WHERE ProductID='$AmendID'";
      // STORES RESULTS IN THE VARIABLE
      $result = $dbh->query($sql);
      // STORES THEM IN A ROW
      $row = $result->fetch(PDO::FETCH_ASSOC);
      ?>
      <form class = "form-horizontal" method="post" action="amend_product.php">
          <fieldset>
              <!-- Form Name -->
              <legend>Update Product Details</legend>
              <input type="hidden" name="product_id" value="<?php echo $row["ProductID"]; ?>" />
              <!-- Text input-->
              <div class = "form-group">
                  <label class = "col-md-4 control-label" for = "product_name"></label>
                  <div class = "col-md-4">
                      <input id = "product_name" name = "product_name" type = "text" placeholder = "Product Name" class = "form-control input-md" value="<?php echo $row["ProductName"]; ?>">

                  </div>
              </div>

              <!-- Text input-->
              <div class = "form-group">
                  <label class = "col-md-4 control-label" for = "product_price"></label>
                  <div class = "col-md-4">
                      <input id = "product_price" name = "product_price" type = "text" placeholder = "Product Price" class = "form-control input-md" required = "" value="<?php echo $row['ProductPrice']; ?>">

                  </div>
              </div>

              <!-- Text input-->
              <div class = "form-group">
                  <label class = "col-md-4 control-label" for = "image_name"></label>
                  <div class = "col-md-4">
                      <input id = "image_name" name = "image_name" type = "text" placeholder = "Image Name" class = "form-control input-md" required = "" value="<?php echo $row["ImageName"]; ?>">
                  </div>
              </div>

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
<?php include_once'footer.php'; ?>
    </div>
    <?php include 'javascript_link.php'; ?>
  </body>
</html>