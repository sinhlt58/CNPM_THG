<?php
	require "db.php";
	$query = mysql_query("SELECT * FROM food_1");
	
	if ($query == false) {
		die(mysql_error());
	}
	
	while ($rows = mysql_fetch_array($query)) {
		$name = $rows['Name'];
		$price = $rows['Price'];
		echo "Name of food: $name<br>Price: $price<br>";
	}
	
?>