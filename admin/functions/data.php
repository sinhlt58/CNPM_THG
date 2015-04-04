<?php

function data_setting_value($dbc, $id){
	
	$query = "SELECT * FROM settings WHERE id = '$id'";
	$result = mysqli_query($dbc, $query);

	$data = mysqli_fetch_assoc($result);
	
	return $data['value'];
			
}

function data_user($dbc, $id) {
	
	if (is_numeric($id)){
		
		$cond = "WHERE id = '$id'";
		
	} else {
		
		$cond = "WHERE email = '$id'";
	}
		
	$query = "SELECT * FROM users $cond";
	$result = mysqli_query($dbc, $query);

	$data = mysqli_fetch_assoc($result);
	
	$data['fullname'] = $data['first_name'].' '.$data['last_name'];
	$data['fullname_reverse'] = $data['last_name'].', '.$data['first_name'];
	
	return $data;
}

function data_post($dbc, $id){
		
	$query = "SELECT * FROM posts WHERE id = $id";
	$result = mysqli_query($dbc, $query);

	$data = mysqli_fetch_assoc($result);
	
	$data['body_nohtml'] = strip_tags($data['body']);
	
	if ($data['body'] == $data['body_nohtml']){
		
		$data['body_formatted'] = '<p>'.$data['body'].'</p>';//neu body ko co tag html thi them tag<p></p>
		
	} else {
		
		$data['body_formatted'] = $data['body'];
		
	}
	
	
	
	return $data;
}

?>