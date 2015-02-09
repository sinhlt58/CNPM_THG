
<div class="row">
	
	<div class="col-md-2">
		
		<?php 
			
			if(isset($_POST['food_name']) &&  isset($_POST['food_price'])){
				
				$query = "INSERT INTO food(user_id_food, food_name, food_price) VALUES ($user[id], '$_POST[food_name]', $_POST[food_price])";
				$result = mysqli_query($dbc, $query);
				
				if (!$result) {
			
					echo 'Co van de vi: '.$query.'</br>';
				}
			} else {
				//echo "Nhap va di ban dung de trong the.";
			}
			
			
		?>
		
		<h3>New item</h3>
		
		<form class="form-inline" action="http://localhost/THG/THGv1.0/menu" method="POST" role="form">
		
			<div class="form-group">
						
					<label class="sr-only" for="food_name">Name</label>
					<input class="form-control" type="text" value="" name="food_name" id="food_name" placeholder="Food name">
						
			</div>
			
			<div class="form-group">
						
					<label class="sr-only" for="food_price">Price</label>
					<input class="form-control" type="text" value="" name="food_price" id="food_price" placeholder="Food Price">
						
			</div>
			
			<button type="submit" class="btn btn-default">Save</button>
		
		</form>
		
	</div>		
	
	<div class="col-md-2"></div>
	
	<div class="col-md-6">
		
		<h3>Menu</h3>
			<?php 
			
				$query = "SELECT * FROM food WHERE user_id_food = $user[id]";
				$result = mysqli_query($dbc, $query);
				
				$space = '------';
				
				while ($food_list = mysqli_fetch_assoc($result)) { ?>
					
					<div id="page_<?php echo $food_list['id']; ?>" class="list-group-item" >
						
						<h4 class="list-group-item-heading">
							
							<?php echo $food_list['food_name'].$space.$food_list['food_price']; ?>
							
							<span class="pull-right">								
								<a href="#" id="del_<?php echo $food_list['id']; ?>" class="btn btn-delete"><i class="fa fa-trash-o"></i></a>					
							</span>
							
						</h4>
						 
					</div>
					
				<?php } ?>
				
	</div>
	
	<div class="col-md-2"></div>	
	
</div>
