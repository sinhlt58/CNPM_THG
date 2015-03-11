<?php

/*A cái hàm này nó tự lấy dữ liệu trong bảng pages sau đó nó tự động in các label của page
 lên thanh navigation, nó được gọi trong file template/navigation.php*/
function nav_main($dbc, $path){
	
	if(isUserLoggedIn()){
		$target = 'WHERE target = "sign_in"';
	}else{
		$target = 'WHERE target = "not_sign_in"';
	}
	
	$query = 'SELECT * FROM navigation '.$target;
	$run = mysqli_query($dbc, $query);
	
	while($nav = mysqli_fetch_assoc($run)) { 
		$nav['slug'] = get_slug($dbc, $nav['url']);	
	?>
		
		<li <?php selected($path['call_parts'][0], $nav['slug'], 'class="active"'); ?> ><a href="<?php echo $nav['url']; ?>"><?php echo $nav['label']; ?></a></li>
	
	<?php }

	}

?>