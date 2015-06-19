<?php require_once 'config/init.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head> 
    <title>Internet Systems Development - Test</title>
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
    <h3 class="panel-title">Test</h3>
  </div>
  <div class="panel-body">
  <h1>Generate Statements</h1>
    <?php
    //produce code that will display your name and ID on separate lines
    echo 'Name: Tony Ampomah</br>';
    print "ID: c3351134</br>";

    //produce code to output the string '"That's it for now" she said' including the
    //speech marks.
    echo "'\"That's it for now\" she said'"."</br>";
    /*declare a variable and assign it the name of the day e.g Monday. Output
     *the following statement which should display the content of variable
     * "Today is Monday"
     */
        $day="Monday";
        echo "Today is ".$day;
    
    
    ?>
    <h1>Use Arithmetic Operators </h1>
    <?php
/*Covert Centigrade to Fahrenheit.  Declare a variable to hold a temperature in 
     * Centigrade assign it a value of 26.  Calculate the equivalent temp in Fahrenheit
     * by multiplying by 1.8, then add 32, assign the result to an appropriate variable.  
     * Display the following statement using your variables:
     * "26 degrees Centigrade is equivalent to 78.8 degrees Fahrenheit"
     */
    $temperature=26;
    $temperature_fahrenheit= (1.8*$temperature)+32;
    
    echo $temperature." degrees Centigrade is equivalent to ".$temperature_fahrenheit."degrees Fahrenheit"
    
    ?>    
 
<h1>Use Conditional Statements</h1>
    <?php
    /*Declare variables to hold name and age, assign the values
     * "David" and 54.  Write code that will test the values
     * of your two variables and display the word "eligible" if
     * name is "David" and age is over 50, or "in-eligible" if not.
     */
    

    /*Use the same variables but this time write code to test if
     * the name is between 3 and 12 characters in length, if not
     * display a message "Name must be between 3 and 12 characters", if OK then
     * test as before to see if vars are assigned the values of
     * "David" and age is greater than 50.  Adjust your vars to test your code.
     *
     */
    $name='David';
    $age= 54;
    
    if($name =='David' && $age >=50){
      echo"eligible</br>";
    }else{
      echo"in-eligible</br>";
    }
  $length = strlen($name);
    if ($length >= 3 && $length <= 12) {
        echo"eligible";
          
        } else {
          echo "Name must be between 3 and 12 characters";
        }
    ?>

    <h1>Work with HTML forms</h1>

  <?php
  /*Produce code that will collect the value submitted via the form.
   * You will need to match the action to the name of your file.
   *Calculate the cost for the bags, based on 8.75 per bag,
   *add VAT charged at 20%.  Generate output similar to below
   *
   * Bags: 3 X £8.75 = £26.25
   * Total Cost inc VAT: £31.50
   *
   * The prices should be formatted as shown and the result should be
   * displayed below the form after data is submitted
   * The code should be structured to ignore the calculations until
   * the variables used are set
   */
  if(isset($_POST['bags'])){

      $bags=$_POST['bags'];
      if(!empty($bags))
      {
          if(is_numeric($bags))
          {
              // IF NUMERIC WE PROCEED
              $pound_sign='&pound';
              $per_bag=8.75;
              $totalCost=number_format($bags*$per_bag,2);
              $vat= ($totalCost*20)/100;
              $incVAT= number_format($vat+$totalCost,2);
              echo '<div class="alert alert-success" role="alert">Bags: '.$bags. ' x '.$pound_sign.$per_bag. ' = '.$pound_sign.$totalCost.'</br>' ;
              echo "Total Cost inc VAT: ".$pound_sign.$incVAT.'</div>';
          }
          else
          {
              // OUTPUT AN ERROR MESSAGE
              echo '<div class="alert alert-danger" role="alert">Please enter a number</div>';
          }
      }
      else
      {
          // OUTPUT AN ERROR MESSAGE FOR REQUIRED FIELD
        echo '<div class="alert alert-danger" role="alert">Number of Bags is required</div>';
      }

  }
  ?>
  <form class="form-inline" method="post" action="ISD_test_c3351134.php">
      <fieldset>
          <legend>
          Calculate Bag Charges
      </legend>
      <div class="form-group">
          <input type="text" class="form-control" name="bags" id="no_of_bags" placeholder="Number of Bags">
      </div>
          <button type="submit" class="btn btn-default">Submit</button>
          <button type="reset" class="btn btn-default">Clear</button>
      </fieldset>
  </form>


    <h1>Using Loops</h1>
    <?php
    /*Declare three variables, total=0, average=0 and an array called numbers
     * which stores 8 numbers of any value.  Use a loop to extract each of the
     * numbers from the array and sum them.  Use this to calculate the average
     * of the numbers in the array and display a message communicating that
     * figure
     */
     
     $total=0;
    $average=0;
      
    $numbers=array('12', '21', '14', '15','10','8','16','11');    
    $arrlength=count($numbers);

	    echo '<pre>';
    print_r($numbers);
	    echo '</pre>';
  
for($x=0;$x<$arrlength;$x++)
   {
    $total= $numbers[$x]+$total;
   }
  $average=($total/count($numbers));

    echo "The average number is : ".$average;
    
    ?>
    
 
<h1>Connecting to a database</h1>
  <?php
  function displayData($result)
  {
      ?>
      <table class="table table-bordered">
          <thead>
          <tr>
              <th>#</th>
              <th>Product ID</th>
              <th>Product Name</th>
              <th>Product Price</th>
          </tr>
          </thead>
          <tbody>
          <?php
          $numOfRows=0;
          while ($row = $result->fetch(PDO::FETCH_ASSOC))
          {
              $numOfRows++;
              echo '<tr><th scope="row">'.$numOfRows.'</th>';
              echo '<td>' . $row["ProductID"] . '</td>';
              echo '<td>' . $row["ProductName"] . '</td>';
              echo '<td>' . $row["ProductPrice"] . '</td>';
          }
          ?>
          </tbody>
      </table>
  <?php
  }
  ?>

    <?php
    /*You should have prepared a products table in advance of this test, if
     * you have not then you will first need to run the sql code that has
     * been provided separately.
     *
     * Your first task is to select all the records from your products table
     * and display them.  Referring to the screen grab provided separately
     * may be of particular help here.  Comments have been provided to give
     * you a structure for your code.
     */

    //Make connection to database

    //Using same connection file from init.php


    //Display heading
    print "<h2>Select all from testproducts table </h2>";
    
    //run query to select all records from products table
    $sql = "SELECT * FROM testproducts";
    //store the result of the query in a variable
    $result = $dbh->query($sql);
    //Task 1 - loop through all records and display the ID, name and price of
    //each product
    displayData($result);

    /*Task 2 - Only display products
     * costing more than 7 pounds and order your result by price descending.
     */
    //Display heading
    print "<h2>Select all from testproducts table and list by price highest first</h2>";
    //run query to select records with a price greater than 7 pounds order result
    //by price descending store the result of the query in a variable

    $sql = "SELECT * FROM testproducts WHERE ProductPrice > 7 ORDER BY ProductPrice DESC";
    $result = $dbh->query($sql);

    //loop through all records and display the ID, name and price of
    //each product
    displayData($result);
    ?>
    <h2>Add records to a database table</h2>
  <?php
  /*Task 3 - Use the form above to capture a new product and it's price.
   * You will need to match the section to the name of your file.
   * On submission the form should add the product detailed in the form
   * boxes to the products table
   */
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

  /*And finally if you have reached here and have time to spare then you
   *should add code to the form interaction above to secure and validate
   * the user data.
   */
  ?>
  <form class="form-inline" method="post" action="ISD_test_c3351134.php">
      <legend>
          Insert Product Details
      </legend>
      <div class="form-group">
          <input class="form-control" type="text" name="product_name" id="product_name" placeholder="Product Name">
      </div>
      <div class="form-group">
          <input class="form-control" type="text" name="product_price" id="product_price" placeholder="Product Price">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
  </form>

</div>
</div>
</div>
<?php include_once'footer.php'; ?>
    </div>
    <?php include 'javascript_link.php'; ?>
  </body>
</html>