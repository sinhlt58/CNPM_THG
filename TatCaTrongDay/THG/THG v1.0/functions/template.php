<?php

/*A cái hàm này nó tự lấy dữ liệu trong bảng pages sau đó nó tự động in các label của page
 lên thanh navigation, nó được gọi trong file template/navigation.php*/
function nav_main($dbc, $pageid){
	
	$query = "SELECT * FROM pages";
	$run = mysqli_query($dbc, $query);
	
	while($nav = mysqli_fetch_assoc($run)) {?>
		
		<li<?php if($pageid==$nav['id']){echo ' class="active"'; }?>><a href="?page=<?php echo $nav['id']; ?>"><?php echo $nav['label']; ?></a></li>
	
	<?php }	
}

?>