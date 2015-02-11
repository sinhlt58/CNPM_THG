<?php 

if(isset($_POST['acceptUpdate'])):

	$food_id = isset($_POST['id'])?$_POST['id']:"";; //id trong post la id cua thuc an trong form.
	$name = isset($_POST['food_name'])?$_POST['food_name']:"";
	$price = isset($_POST['food_price'])?$_POST['food_price']:"";
		
	if ($name != '' && $price != '') {
		
		$query = "UPDATE food SET food_name = '$_POST[food_name]', food_price = $_POST[food_price] WHERE id = $food_id";
		$result = mysqli_query($dbc, $query);
		
		if (!result) {
			$message_update_food = '<p class="bg-danger">Something wrong!</p>';
		} else {
			//print not thing.
		}
	} else {$message_update_food = '<p class="bg-danger">Empty food name error!</p>';}	
	
endif;	
?>


<?php
if(isset($_POST['accept'])):
	$_POST['accept']=NULL;
	if(isset($_POST['food_name']) &&  isset($_POST['food_price']) && $_POST['food_name'] != ""){
		$query = "INSERT INTO food(user_id_food, food_name, food_price) VALUES ($user[id], '$_POST[food_name]', $_POST[food_price])";
		$result = mysqli_query($dbc, $query);
		if (!$result) {
			$message = '<p class="bg-danger">Can not insert item!</p>';
		}
	} else {
		$message = '<p class="bg-danger">Can not insert item!</p>';
	}
	if($result!=false){
		header("location: menu");
	}
endif;
?>

<?php  /* PHẦN UPDATE THỨC ĂN CỦA VŨ ĐỨC NGÀY 20/2/2015.
	if(isset($_POST['acceptUpdate'])):
		$id = isset($_POST['id'])?$_POST['id']:"";
    $user_id_food = isset($_POST['user_id_food'])?$_POST['user_id_food']:"";
    	$param = "WHERE id=$id";
    	$food_temp = data_query('*','food',$param);
    	$food = $food_temp[0];
		$name = isset($_POST['food_name'])?$_POST['food_name']:"";
		$price = isset($_POST['food_price'])?$_POST['food_price']:"";
		$arr = "user_id_food = '$user_id_food', food_name='$name', food_price='$price'";

		$food_update = data_update($arr, 'food', $param);
	endif;*/
?>



