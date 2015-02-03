<?php

	$connection = mysql_connect("localhost", "root", "haitrieu1108") or die("Couldn't connect to server!");
	mysql_select_db("restaurants", $connection) or die("Couldn't connect to database!");
	error_reporting(0);
	
	if ($_POST['save']) {
		if ($_POST['name'] && $_POST['price']) {
			$name = mysql_real_escape_string($_POST['name']);
			$price = mysql_real_escape_string($_POST['price']);
			$check = mysql_fetch_array(mysql_query("SELECT * FROM `food_1` WHERE `Name` = '$name'"));
			
			if ($check != '0') {
				die("That food already exists! Try another name!");
			}
			if (!ctype_alnum($name)) {
				die("Food name contains special characters!");
			}
			mysql_query("INSERT INTO `food_1` (`Name`, `Price`) VALUES ('$name', '$price')");
			die("Successfully add food to databse!");
		}
	}
?>