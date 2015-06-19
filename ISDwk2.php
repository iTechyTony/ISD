<?php require_once 'config/init.php'; ?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <title>ISD Week - 2 PHP Fundamentals</title>
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
                    <h3 class = "panel-title">ISD Week - 2 PHP Fundamentals</h3>
                </div>
                <div class = "panel-body">
	                <?php
		                print "<h1>Using Escape Characters</h1>";

		                echo '"most progammers say it\'s better to use \'echo\' rather than \'print\'" said Paul';

		                print "<h1>Using Variables</h1>";

		                //Declaring variables
		                $name = "David"; // Strings

		                $age = "12";

		                $height_meters = 1.75; // decimal (float)

		                $calc = 100; //integer

		                $fully_grown = true; //boolean

		                $height_inches = ( $height_meters * $calc / 2.54 );

		                $height_inches %= 12;

		                $height_inches_roundered = intval ( ( $height_meters * $calc / 2.54 ) / 12 );

		                //Outputing variables
		                echo 'Hi my name is ' . "$name" . ' and I am ' . "$age" . ' years old<br />';

		                print"Mi nombre es $name y tengo $age anos de edad<br />";

		                echo "Name: $name<br />";

		                echo "Age: $age<br />";

		                echo "Height in Meters: $height_meters<br />";

		                echo "Height in Feet and inches: $height_inches_roundered ft $height_inches ins <br />";

		                print "<h1>Selection</h1>";

		                $day = date ( 'l' );
		                echo "it's $day<br />";

		                if ( $day = "Wednesday" ) {
			                echo "it's not midweek<br />";
		                }
		                else {
			                echo "it's midweek<br />";
		                }

		                $day1 = date ( 'z' );
		                echo "$day1 days gone so far this year<br />";

		                if ( $day1 < "183" ) {
			                echo "First half of the year<br />";
		                }
		                elseif ( $day1 > "183" ) {
			                echo "Second half on the year<br />";
		                }
		                else {
			                echo "Middle of the year<br />";
		                }

		                $age1 = 20;
		                $weekend = date ( 'N' );
		                $time_zone = date ( 'G' );

		                if ( $age1 < '20' and $weekend > '5' or $time_zone >= '12' and $time_zone < '17' ) {
			                echo "Apply a discount of 20%";
		                }
		                elseif ( $age1 > '20' and $time_zone > '5' and $time_zone < '12' and $weekend > '5' ) {
			                echo "Apply a discount of 15%";
		                }
		                elseif ( $age1 >= '20' and $weekend > '5' ) {
			                echo "Apply a discount of 10%";
		                }
		                else {
			                echo "No discount";
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

