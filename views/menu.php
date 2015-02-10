
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
	<form class="form-inline" action="http://localhost/THG/THGv1.0/menu" method="POST" role="form">
		<div class="bs-example" data-example-id="simple-table">
			<table class = "table table-striped">
				<caption><h3>New item</h3></caption>
				<thead>
					<tr>
						<td>
							<h4>Food</h4>
							<div class="form-group">
								<label class="sr-only" for="food_name">Name</label>
								<input class="form-control" type="text" value="" name="food_name" id="food_name">
							</div>
						</td>
					</tr>
					
					<tr>
						<td>
							<h4>Price</h4>
							<div class="form-group">
								<label class="sr-only" for="food_price">Price</label>
								<input class="form-control" type="text" value="" name="food_price" id="food_price">
							</div>
						</td>
					</tr>
					
					<tr>
						<td>
							<button type="submit" class="btn btn-default"><i class="fa fa-plus"></i>    Add</button>
						</td>
					</tr>
				</thead>
			</table>
		</div>	
	</form>
		
	</div>		
	
	<div class="col-md-2"></div>
	
	<div class="col-md-6">
		<!-- Stripped table to display menu -->
		<div class="bs-example" data-example-id="simple-table">
			<table class = "table table-striped">
				<caption><h3>Menu</h3></caption>
				<thead>
					<th>#</th>
					<td>Name</td>
					<td>Price</td>
					<td>Delete/Change</td>
				</thead>
				<tbody>
					<?php 
			
						$query = "SELECT * FROM food WHERE user_id_food = $user[id]";
						$result = mysqli_query($dbc, $query);
						$food_count = 0;
						while ($food_list = mysqli_fetch_assoc($result)) { ?>
							<!-- Food ID, name, and price display in a row -->
								<tr id="page_<?php echo $food_list['id']; ?>">
										<th  scope="row"><?php echo ++$food_count; ?></th>
										<td scope="row"><?php echo $food_list['food_name'] ?></td>
										<td scope="row"><?php echo $food_list['food_price'] ?></td>
										<td>
											<button class = "button-danger">
												<a href="#" id="del_<?php echo $food_list['id']; ?>" class="btn btn-delete"><i class="fa fa-trash-o"></i></a>
											</button>
											<button>
												<a href="#" id="del_<?php echo $food_list['id']; ?>" class="btn btn-delete"><i class = "fa fa-bars"></i></a>
											</button>
										</td>
									
								</tr>
							<!-- End of a row -->
					<?php } ?>
				</tbody>
			</table>
			<!-- End of table -->
		</div>
			
				
	</div>
	
	<div class="col-md-2"></div>	
	
</div>
