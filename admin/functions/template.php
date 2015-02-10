<?php

function nav_main($dbc, $pageid){
	
	$query = "SELECT * FROM pages";
	$run = mysqli_query($dbc, $query);
	
	while($nav = mysqli_fetch_assoc($run)) {?>
		
		<li<?php if($pageid==$nav['id']){echo ' class="active"'; }?>><a href="?page=<?php echo $nav['id']; ?>"><?php echo $nav['label']; ?></a></li>
	
	<?php }	
}

?>