<?php require_once 'config/init.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head> 
    <title>Week 4 - PHP and HTML Forms</title>
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
    <h3 class="panel-title">Week 4 - PHP and HTML Forms</h3>
  </div>
  <div class="panel-body">
    <h1>Pick a Category Using GET</h1>
    <a href=ISDwk4.php?cat=Films>Films</a>
    <a href=ISDwk4.php?cat=Music>Music</a>
    <a href=ISDwk4.php?cat=Books>Books</a>
    <?php
    if (isset($_GET['cat']))
    {
      $cat = $_GET['cat'];
      echo '<br><h2>'.$cat . ' available displayed here</br></h2>';
    }
    ?>

    <h2>Login Form using GET</h2>

    <?php
    // Checks if email has been set
    if (!isset($_GET['email']))
    {
        $_GET['email'] = NULL;
    }
    // Checks if email and password is set
    if (isset($_GET['email']) && isset($_GET['password']))
    {
        $email = $_GET['email'];
        $password = $_GET['password'];

        // Checks if email and password is not empty
        if (!empty($email) && !empty($password))
        {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                echo '<div class="alert alert-warning" role="alert">Invalid Email</div>';
            }
            else
            {
                    // Outputs the success message
                    echo '<div class="alert alert-warning" role="alert"><h2>Submission accepted</h2>';
                    echo "<h3>Email: " . $email."</h3>";
                    echo "<h3>Password: " . $password."</h3></div>";
            }
        }
        else
        {
            echo '<div class="alert alert-danger" role="alert">All Fields Required</div>';
        }
    }
    ?>

    <form class="form-inline" method="$_GET" action="ISDwk4.php" >
        <div class="form-group">
        <input class="form-control" type="text"  name="email" value="<?php echo $_GET['email']; ?>" placeholder="Email">
          </div>
          <div class="form-group">
        <input class="form-control" type="password" name="password" placeholder="Password">
         </div>
        <input class="btn btn-default" type="submit" value="Submit">
        <input class="btn btn-default" type="reset" value="Clear">
    </form>

 <h2>More Form handling and $_POST</h2>
    <h3>Tax Calculator</h3>
      <?php
      // Checks if after price and rate is set
      if (isset($_POST['after_price']) && isset($_POST['rate']))
      {
          $after_price = $_POST['after_price'];
          $rate = $_POST['rate'];
          $before_tax = number_format((100 * $after_price) / (100 + $rate), 2, '.', '');
          $pound_sign = '&pound';
          // Checks if after price and before tax is not empty
          if (!empty($after_price) && !empty($before_tax))
          {
              if(!is_numeric($after_price) && !is_numeric($rate))
              {
                  echo '<div class="alert alert-warning" role="alert">Please enter numbers only</div>';
              }
              else
              {
                  if ($after_price !== number_format($after_price,2))
                    {
                      echo '<div class="alert alert-warning" role="alert">Please enter the price in the format 9.99</div>';
                    }
                    else
                    {
                      echo '<div class="alert alert-success" role="alert"><h2>Submission accepted</h2>';
                      echo 'Price before tax = ' . $pound_sign . $before_tax.'</div>';
                    }
              }
          }
          else
          {
              echo '<div class="alert alert-danger" role="alert">All Fields Required</div>';
          }

      }
      ?>
      <form class="form-inline" method="POST" action="ISDwk4.php">
          <div class="form-group">
            <input class="form-control" type="text" name="after_price" placeholder="After Tax Price">
          </div>
          <div class="form-group">
            <input class="form-control" type="t_rate" name="rate" placeholder="Tax Rate">
          </div>
        <input class="btn btn-default" type="submit" value="Submit">
        <input class="btn btn-default" type="reset" value="Clear">
      </form>

    <h2>Order Form</h2>
    <h3>Please fill out this form to place your order</h3>
    <?php
    if (isset($_POST['user_name']) && isset($_POST['email']))
    {
        $user_name = $_POST['user_name'];
        $email = $_POST['email'];
        $selectTopping = $_POST['selectTopping'];
        $selectSize = $_POST['selectSize'];

        if (!empty($user_name) && !empty($email) && !empty($selectTopping) )
        {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                // EMAIL NOT VALID
                echo '<div class="alert alert-warning" role="alert">Invalid Email</div>';
            }
            else
            {
                // VALID EMAIL PROCESS ORDER
                echo '<div class="alert alert-success" role="alert"><h2>Thank you for your order:</h2>';
                echo "Customer ID: " . "<strong>" . $user_name . "</strong>";
                print '</br>';
                echo "Email: " . "<strong>" . $email . "</strong>";
                print '</br>';
                echo "Your order: " . "<strong>" . $selectSize ." ".$selectTopping. "</strong>";
                print '</br>';
                $chk = $_POST['chk'];
                echo "Extra Toppings: ";
                foreach ($chk as $ch)
                {
                    echo  "<strong>" .$ch . " ";
                }
                echo '</div>';
            }


        }
        else
        {
            echo '<div class="alert alert-danger" role="alert">All Fields Required</div>';
        }

    }
    ?>
    <form class="form-horizontal" method="POST" action="ISDwk4.php">
         <h4>Enter your login details</h4>
        <div class="form-group">
            <label class="col-md-2 control-label" for="user_name">User Name</label>
                <div class="col-md-6 ">
                    <input class="form-control" type="text" name="user_name" id="user_name" placeholder="User Name">
                </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label" for="email">Email</label>
                <div class="col-md-6">
                    <input class="form-control" type="email" name="email" placeholder="Email">
                </div>
        </div>
        <h4>Pizza Selection</h4>
        <!-- Multiple Radios (inline) -->
        <div class="form-group">
            <label class="col-md-2 control-label" for="radios">Size</label>
                <div class="col-md-6">
                    <label class="radio-inline" for="radios-0">
                    <input type="radio" name="selectSize" id="radios-0" value="Small" checked="checked">
                    Small
                </label>
                <label class="radio-inline" for="radios-1">
                    <input type="radio" name="selectSize" id="radios-1" value="Medium">
                    Medium
                </label>
                <label class="radio-inline" for="radios-2">
                    <input type="radio" name="selectSize" id="radios-2" value="Large">
                    Large
                </label>
            </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-2 control-label" for="selectTopping">Topping</label>
            <div class="col-md-6">
                <select class="form-control" name="selectTopping" id="selectTopping">
                    <option value="">Please Select</option>
                    <option value="Seafood">Seafood</option>
                    <option value="Pudding">Pudding</option>
                    <option value="Beef">Beef</option>
                </select>
            </div>
        </div>

        <!-- Multiple Checkboxes (inline) -->
        <div class="form-group">
            <label class="col-md-2 control-label">Extras</label>
            <div class="col-md-4">
                <label class="checkbox-inline" for="checkboxes">
                    <input type="checkbox" name="chk[]"id="checkboxes" value="Parmesan">Parmesan
                </label>
                <label class="checkbox-inline" for="checkboxes-1">
                    <input type="checkbox" name="chk[]" id="checkboxes" value="Olives">Olives
                </label>
                <label class="checkbox-inline" for="checkboxes-2">
                    <input type="checkbox" name="chk[]" id="checkboxes" value="Capers">Capers
                </label>
            </div>
        </div>
        <div class="text-center">
        <input class="btn btn-default" type="submit" value="Submit">
        <input class="btn btn-default" type="reset" value="Clear">
        </div>
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