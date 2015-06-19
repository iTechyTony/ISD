<?php require_once 'config/init.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>ISD Week 5 PHP and MYSQL</title>
    <?php require_once 'head.php'; ?>
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container">
    <br><br><br><br>

    <div class="row">
        <div class="col-lg-3">
            <?php require_once 'leftnav.php'; ?>
        </div>
        <div class="col-lg-9">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">ISD Week 5 PHP and MYSQL</h3>
                </div>
                <div class="panel-body">
                    <?php
                    if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['gender']) && isset($_POST['age']))
                    {
                        $first_name = $_POST['first_name'];
                        $last_name = $_POST['last_name'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $gender = $_POST['gender'];
                        $age = $_POST['age'];

                        if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($password) && !empty($gender) && !empty($age))
                        {
                            if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                            {
                                echo '<div class="alert alert-warning" role="alert">Invalid Email</div>';
                            }
                            else if ((isset($password)))
                            {
                                $length = strlen($password);
                                $length_fname = strlen($first_name);
                                $length2_lname = strlen($last_name);
                                if ($length > 6 && $length <= 10)
                                    {
                                    If (is_numeric($password)) {
                                        echo '<div class="alert alert-warning" role="alert">Password cannot be a number</div>';
                                    }
                                    elseif (is_numeric($first_name) || is_numeric($last_name) || $length_fname > 20 || $length2_lname > 20)
                                    {
                                        echo '<div class="alert alert-warning" role="alert">First and Last Names cannot be numbers</br>';
                                        echo 'First and Last Names cannot be more than 20 characters</br></div>';
                                    }
                                    elseif ($age < 13)
                                    {
                                        echo '<div class="alert alert-warning" role="alert">Age must be 13 or more</div>';
                                    }
                                    else
                                    {
                                        echo '<div class="alert alert-success" role="alert"><h2>You have successfully registered with the details below</h2>';
                                        echo "First Name: " . $first_name;
                                        print '<br>';
                                        echo "Last name: " . $last_name;
                                        print '<br>';
                                        echo "Email: " . $email;
                                        print '<br>';
                                        echo 'Password: '.$encrypted_password = md5($password);
                                        print '<br>';
                                        echo "Gender: " . $gender;
                                        print '<br>';
                                        echo 'Age: ' . $age.'</div>';

                                        echo $sql = "INSERT INTO `customer` VALUES ('','$first_name', '$last_name', '$email', '$encrypted_password', '$gender', '$age')";
                                        $dbh->query($sql);
                                    }
                                }
                                else
                                {
                                    echo '<div class="alert alert-success" role="alert">Your password must be between 6 and 10 characters in length</div>';
                                }
                            }
                            else if (!(isset($password)))
                            {
                                echo '<div class="alert alert-success" role="alert">Please enter a password.</div>';
                            }
                            else
                            {
                                echo '<div class="alert alert-success" role="alert">Please enter a password.</div>';
                            }
                        }
                        else
                        {
                            echo '<div class="alert alert-danger" role="alert"><p>All Fields Required</p></div>';
                        }
                    }
                    ?>
                    <form class="form-horizontal" method="POST" action="ISDwk5.php">
                        <fieldset>

                            <!-- Form Name -->
                            <legend >Simple Registration Form</legend>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="first_name">First Name</label>
                                <div class="col-md-4">
                                    <input id="first_name" name="first_name" type="text" placeholder="Enter First Name" class="form-control input-md" value="<?php echo $first_name; ?>">

                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="last_name">Last Name</label>
                                <div class="col-md-4">
                                    <input id="last_name" name="last_name" type="text" placeholder="Enter Last Name" class="form-control input-md" value="<?php echo $last_name; ?>">

                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="email">Email</label>
                                <div class="col-md-4">
                                    <input id="email" name="email" type="text" placeholder="Enter Email" class="form-control input-md" value="<?php echo $email; ?>">
                                </div>
                            </div>

                            <!-- Password input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="password">Password</label>
                                <div class="col-md-4">
                                    <input id="password" name="password" type="password" placeholder="Enter Password" class="form-control input-md" value="<?php if(!isset($password)){echo $password;} ?>">
                                </div>
                            </div>

                            <!-- Multiple Radios (inline) -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="gender">Gender</label>
                                <div class="col-md-4">
                                    <label class="radio-inline" for="gender-0">
                                        <input type="radio" name="gender" id="gender-0" value="<?php if(!isset($gender)){echo $gender; }else{ echo 'Male';} ?>" checked="checked" >
                                        Male
                                    </label>
                                    <label class="radio-inline" for="gender-1">
                                        <input type="radio" name="gender" id="gender-1" value="<?php if(!isset($gender)){echo $gender; }else{ echo 'Female';} ?>" >
                                        Female
                                    </label>
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="age">Age</label>
                                <div class="col-md-4">
                                    <input id="age" name="age" type="text" placeholder="Enter Age" class="form-control input-md" value="<?php echo $age; ?>">
                                </div>
                            </div>

                            <!-- Button (Double) -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="btnSubmit"></label>
                                <div class="col-md-8">
                                    <button id="btnSubmit" name="btnSubmit" class="btn btn-success">Submit</button>
                                    <button id="btnClear" name="btnClear" class="btn btn-warning">Clear</button>
                                </div>
                            </div>

                        </fieldset>
                    </form>

                    <?php
                    function displayCustomerData($result)
                    {
                        ?>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Age</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $numOfRows=0;
                            while ($row = $result->fetch(PDO::FETCH_ASSOC))
                            {
                                $numOfRows++;
                                echo '<tr><th scope="row">'.$numOfRows.'</th>';
                                echo '<td>' . $row["first_name"] . '</td>';
                                echo '<td>' . $row["last_name"] . '</td>';
                                echo '<td>' . $row["email"] . '</td>';
                                echo '<td>' . $row["gender"] . '</td>';
                                echo '<td>' . $row["age"] . '</td></tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    <?php
                    }
                    ?>
                    <h2>Select All from the Customer Database</h2>
                    <?php
                    $sql = "SELECT * FROM customer";
                    $result = $dbh->query($sql);
                    displayCustomerData($result);
                    ?>
                    <h3>SELECT records only WHERE age is greater than or equal to 22</h3>
                    <?php
                    $sql = "SELECT * FROM customer WHERE age >= '22'";
                    $result = $dbh->query($sql);
                    displayCustomerData($result);
                    ?>
                    <h3>SELECT records WHERE females have an age greater than or equal to 22</h3>
                    <?php
                    $sql = "SELECT * FROM customer WHERE age >='22' AND Gender='Female'";
                    $result = $dbh->query($sql);
                    displayCustomerData($result);
                    ?>
                    <h3>SELECT all records WHERE male and ORDER BY age descending (DESC)</h3>
                    <?php
                    $sql = "SELECT * FROM customer WHERE Gender='Male' ORDER BY age DESC";
                    $result = $dbh->query($sql);
                    displayCustomerData($result);
                    ?>
                    <h3>Use LIKE to SELECT all records with an \'a\' in the first name, ORDER BY age DESC and LIMIT the
                        number of records displayed to 3</h3>
                    <?php
                    $sql = "SELECT * FROM customer WHERE first_name like 'a%' ORDER BY age DESC";
                    $result = $dbh->query($sql);
                    displayCustomerData($result);
                    ?>
                </div>
            </div>
        </div>
        <?php include_once 'footer.php'; ?>
    </div>
    <?php include 'javascript_link.php'; ?>
</body>
</html>