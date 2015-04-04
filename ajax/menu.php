<?php 

include('../config/connection.php');

//=============START FOOD CATEGORIES==================================================
if (isset($_GET['typeRequestFc'])){
	$typeRequestFc = $_GET['typeRequestFc'];

	if ($typeRequestFc == "add"){//add a new category.
		$restaurantId = $_GET['restaurantId'];
		$nameFc = $_GET['nameFc'];

		$query = "INSERT INTO food_categories (restaurant_id, name) VALUES ($restaurantId, '$nameFc')";
		$result = mysqli_query($dbc, $query);

		$lastFcId = mysqli_insert_id($dbc);

		//response to request.
		$fc = array(
			'fc_name' => $nameFc,
			'fc_id' => $lastFcId,
		);
		echo json_encode($fc);//gui tra lai request dang json.

	}else if ($typeRequestFc == "edit"){//edit a category.
		$nameFc = $_GET['nameFc'];
		$fcId = $_GET['fc-id'];

		$query = "UPDATE food_categories SET name = '$nameFc' WHERE id=$fcId";
		$result = mysqli_query($dbc, $query);

	}else if ($typeRequestFc == "delete"){//delete a category.
		$fcId = $_GET['fc-id'];

		$query = "DELETE FROM food WHERE fc_id=$fcId; DELETE FROM food_categories WHERE id=$fcId";
		$result = mysqli_multi_query($dbc, $query);

	}
}
//=============END FOOD CATEGORIES===================================================

//=============START FOOD ITEM=======================================================
if (isset($_GET['typeRequestFi'])){
	$typeRequestFi = $_GET['typeRequestFi'];
	$query = "";
	
	if ($typeRequestFi == 'add'){//add a food item to database.
		$priceFi = $_GET['priceFi'];
		$nameFi = $_GET['nameFi'];

		$query = "INSERT INTO food (food_name, food_price, fc_id) VALUES ('$nameFi', $priceFi , $_GET[fcId])";
		$result = mysqli_query($dbc, $query);

		$lastFiId = mysqli_insert_id($dbc);

		$fi = array(
			'fi_name' => $nameFi,
			'fi_price' => $priceFi,
			'fi_id' => $lastFiId,
		);
		echo json_encode($fi);//response to clients.

	}else if ($typeRequestFi == 'edit'){//edit a food item from database.
		$priceFi = $_GET['priceFi'];
		$nameFi = $_GET['nameFi'];
		$fiId = $_GET['fiId'];

		$query = "UPDATE food SET food_name='$nameFi', food_price=$priceFi WHERE id=$fiId";
		$result = mysqli_query($dbc, $query);

	}else if ($typeRequestFi == 'delete'){//delete a food item from database.
		$fiId = $_GET['fiId'];

		$query = "DELETE FROM food WHERE id=$fiId";
		$result = mysqli_query($dbc, $query);
	}
}
//=============END START FOOD ITEM====================================================
?>