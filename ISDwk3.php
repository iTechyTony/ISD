<?php require_once 'config/init.php'; ?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Week 3 - Further Fundamentals of PHP</title>
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
                    <h3 class = "panel-title">Week 3 - Further Fundamentals of PHP</h3>
                </div>
                <div class = "panel-body">
                    <h1>Arrays</h1>
                    <h2>Simple Arrays</h2>
	                <?php
		                $pound_sign = '&pound';
		                //Mehod 1 - instantiating an array directly
		                $products = array ( "t-shirt" , "cap" , "mug" );
		                //Whole array can be viewed using print_r() - useful for debugging
		                echo '<pre>';
		                print_r ( $products );
		                echo '</pre>';
		                print "<h4>We have three products</h4>";

		                print "1.$products[0]<br />";
		                print "2.$products[1]<br />";
		                print "3.$products[2]<br />";

		                print "<h2>Associative Arrays</h2>";

		                $prices = array ( "t-shirt" => 9.99 , "cap" => "4.99" , "mug" => 6.99 );
		                //End of array

		                //Access elements in the array using their keys";
		                echo '<pre>';
		                print_r ( $prices );
		                echo '</pre>';
		                print '<h4>Here are our prices</h4>';

		                echo "T-shirt:" . $prices[ "t-shirt" ];

		                echo "<br />Cap:" . $prices[ "cap" ];

		                echo "<br />Mug:" . $prices[ "mug" ];

		                print "<h3>Multi-Dimensional Arrays </h3>";

		                //To create the basket holding two wine items

		                $stock = array ( //id1
			                //Row 1
			                array ( "description" => "t-shirt" , "price" => 9.99 , "stock" => 100 ) , //Row 2
			                array ( "blue" , "green " , "red" ) , //id2
			                //Row 3
			                array ( "description" => "cap" , "price" => 4.99 , "stock" => 50 ) , //Row 4
			                array ( "blue" , "black" , "grey " ) , //Row 5
			                array ( "description" => "mug" , "price" => 6.99 , "stock" => 30 ) , //Row 6
			                array ( "yellow" , "green" , "pink" ) );
		                //End of basket
		                echo '<pre>';
		                print_r ( $stock );
		                print '</pre>';

		                echo "<h4>This is my order</h4>";
		                print $stock[ 1 ][ 1 ] . $stock[ 0 ][ "description" ] . '<br>';
		                print "Price:" . $pound_sign . $stock[ 0 ][ "price" ] . '<br>';
		                print $stock[ 3 ][ 2 ] . $stock[ 2 ][ "description" ] . '<br>';
		                print "Price:" . $pound_sign . $stock[ 2 ][ "price" ];

		                print '<h1>Loops</h1>';
		                print '<h2>While Loops</h2>';
		                $shirt_price = 9.99;
		                $counter = 1;
	                ?>
	                <table class = "table table-bordered">
		                <thead>
                            <tr>
	                            <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
					<tbody>
	                <?php
		                while ( $counter <= 10 ) {
			                $shirt_price = $shirt_price + 9.99;
			                $counter++;
			                echo '<tr><td>' . $counter . '</td>';
			                echo '<td>' . $pound_sign . $shirt_price . '</td></tr>';
		                }
	                ?>
		                </tbody>
		              </table>
	                <h2>For Loops</h2>
	                <?php
		                $names = array ( 'Tony' , 'John' , 'Ruth' );
		                echo '<pre>';
		                print_r ( $names );
		                foreach ( $names as &$v ) {
			                $v = strtolower ( $v );
		                }
		                print_r ( $names );
		                echo count ( $names );
		                echo '</pre>';
	                ?>
	                <h2>Foreach Loop </h2>
	                <?php
		                $name = array ( 'Tony' => 'c123456' , 'John' => 'c654321' , 'Ruth' => 'c987654' );
		                echo '<pre>';
		                print_r ( $name );
		                echo '</pre>';
		                foreach ( $name as $key => $value ) {
			                echo 'Name: ' . $key . ' ID: ' . $value . '<br>';
		                }

	                ?>
	                <h1>Some Useful Functions</h1>
	                <?php
		                $password = htmlentities ( trim ( 'password' ) );
		                echo 'Password is:' . $password . '<br>';

		                if ( ( isset( $password ) && empty( $password ) ) )//initialise password
		                {
			                echo "Please enter a password.<br>";
		                }
		                else if ( ( isset( $password ) ) ) {
			                $length = strlen ( $password );
			                if ( $length > 6 && $length <= 8 ) {
				                If ( is_numeric ( $password ) ) {
					                echo "Password cannot be a number";
				                }
				                else {
					                echo "Password OK";
					                print '<br>';
					                echo 'encryted password: ' . md5 ( $password );
				                }
			                }
			                else {
				                echo "Your password must be between 6 and 8 characters in length<br>";
			                }
		                }
		                else if ( ! ( isset( $password ) ) ) {
			                echo "Please enter a password. <br>";
		                }
		                else {
			                echo "Please enter a password.<br>";
		                }
	                ?>
                </div>
            </div>
        </div>
    </div>
	<?php include_once 'footer.php'; ?>
</div>
<?php include 'javascript_link.php'; ?>
</body>
</html>