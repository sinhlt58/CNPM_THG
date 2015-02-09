<?php

/* Hàm nhận 2 đối, $dbc: là cái database nào(có được từ trong file connection.php)
 $id ở đây là xem hàng nào trong database, trả về giá trị ở cột value
 hàm này dùng trong file setup.php 
 Híc tóm lại hàm này cho cái page admin nếu cột vaule=1 thì nó hiện cái nút debug còn không ngược lại.*/
function data_setting_value($dbc, $id){
	
	$query = "SELECT * FROM settings WHERE id = '$id'";//Lấy vị trí hàng với id tương ứng.
	$result = mysqli_query($dbc, $query);//execute the query (không rõ nữa).

	$data = mysqli_fetch_assoc($result);//Lấy hết dữ liệu trong hàng ứng với id và lưu vào mảng data.
	
	return $data['value'];//trả về giá trị của mảng data ở vị trí value.
			
}

function data_post_type ($dbc, $id) {
	$query = "SELECT * FROM post_types WHERE id=$id";
	$result = mysqli_query($dbc, $query);

	$data = mysqli_fetch_assoc($result);
	
	return $data;		
	
}

/* Nôm na giống hàm bên trên lấy dữ liệu trong bảng pages, còn hàm trên lấy dữ liệu trong bảng setting*/
function data_post($dbc, $id){
	
	if (is_numeric($id)){
		$cond = "WHERE id = $id";	
	} else {
		$cond = "WHERE slug = '$id'";	
	}
	
	$query = "SELECT * FROM posts $cond";
	$result = mysqli_query($dbc, $query);

	$data = mysqli_fetch_assoc($result);
	
	$data['body_nohtml'] = strip_tags($data['body']);//hàm strip_tags dùng xóa hết các tags thì phải.
	
	if ($data['body'] == $data['body_nohtml']){
		
		$data['body_formatted'] = '<p>'.$data['body'].'</p>';//nếu body không có tag của html thì thêm vào tag <p></p>
		
	} else {
		
		$data['body_formatted'] = $data['body']; //còn không giữ nguyên.
		
	}
	
	return $data;
}

?>