

<div class="row">	
	<div class="col-md-2">

		<form class="form-inline" action="http://localhost/THG/THGv1.0/menu" method="POST" role="form">
			<div class="bs-example" data-example-id="simple-table">
				<table class = "table table-striped">
					<caption><h3>New item</h3></caption>
					<?php if(isset($message)) {echo $message;}?>
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
								<input type="submit" name="accept" value="Add" class="btn btn-primary">
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
			<?php if(isset($message_update_food)) {echo $message_update_food;}?>
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
						<td scope="row"><?php echo number_format($food_list['food_price']) ?></td>
						<td>
							
								<a href="#" id="del_<?php echo $food_list['id']; ?>" class="btn btn-delete btn-default"><i class="fa fa-trash-o"></i></a>
							
							
								<a class="btn btn-default" data-toggle="modal" data-target="#updateModal<?php echo $food_list['id'];?>"><i class = "fa fa-bars"></i></a>
							
							<!-- Modal -->
							<div class="modal fade" id="updateModal<?php echo $food_list['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">Update</h4>
										</div>
										<div class="modal-body">
											<form action="" method="POST" enctype="multipart/form-data" role="form">
												<input type="hidden" name="id" value="<?php echo $food_list['id'];?>">
												<input type="hidden" name="user_id_food" value="<?php echo $food_list['user_id_food'];?>">
												<div class="form-group" >
													<label>Name</label>
													<input type="text" name="food_name" class="form-control" value="<?php echo $food_list['food_name'];?>" placeholder="Enter name">
												</div>
												<div class="form-group">
													<label>Price</label>
													<input type="text" name="food_price" class="form-control" value="<?php echo $food_list['food_price'];?>" placeholder="Enter price">
												</div>
												<div class="modal-footer">
													<input type="submit" name="acceptUpdate" value="OK" class="btn btn-primary">
													<input type="reset" name="resetUpdate" value="Cancel" class="btn btn-default" data-dismiss="modal">
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
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
