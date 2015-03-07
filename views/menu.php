<div class="row">
	<div class="col-sm-2"></div>
	
	<div class="col-sm-8" id="menu">
	
			<div class="row list-group-item list-group-item-info">
				<h4 class="text-center"><b>Menu</b>
					<button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#modal-add-fc">+</button>
				</h4>
				
			</div>
			
			<?php 
					
				$query = "SELECT * FROM food_categories WHERE user_id=$user[id] ORDER BY id DESC";
				$result = mysqli_query($dbc, $query);
				
				while($list_fc = mysqli_fetch_assoc($result)) { ?>
					
					<div class="row list-group-item list-group-item-warning delete-fc" id="edit-fc">
						<div class="col-sm-8">
							<p><strong class="no-edit-fc"><?php echo $list_fc['name']; ?></strong></p>
							<input type="text" class="edit-fc" value="<?php echo $list_fc['name']; ?>"/>
						</div>
						<div class="col-sm-4">
							<div class="btn-group btn-group-sm pull-right">
						  		<button type="button" class="btn btn-primary b-add-fi" data-toggle="modal" data-target="#modal-add-fi" fc-id='<?php echo $list_fc['id']; ?>'>+</button>
						  		<button type="button" class="btn btn-primary b-edit-fc no-edit-fc">-</button>
						  		<button type="button" class="btn btn-primary b-save-fc edit-fc" fc-id='<?php echo $list_fc['id']; ?>'>s</button>
						  		<button type="button" class="btn btn-primary b-delete-fc" fc-id='<?php echo $list_fc['id']; ?>'>x</button>
				  			</div>						
						</div>
					</div>
					
					<?php 
						$query2 = "SELECT * FROM food WHERE fc_id=$list_fc[id] ORDER BY id DESC";
						$result2 = mysqli_query($dbc, $query2);
						while ($list_food = mysqli_fetch_assoc($result2)) { ?>

							<div class="row list-group-item delete-food" id="edit-fi">
								<div class="col-sm-4">
									<p class="no-edit-fi food-name"><?php echo $list_food['food_name']; ?></p>
									<input type="text" class="edit-fi food-name" value="<?php echo $list_food['food_name']; ?>"/>
								</div>
								<div class="col-sm-4">
									<p class="no-edit-fi food-price"><?php echo $list_food['food_price']; ?></p>
									<input type="text" class="edit-fi food-price" value="<?php echo $list_food['food_price']; ?>"/>
								</div>							
								<div class="col-sm-4">
									<div class="btn-group btn-group-sm pull-right">
								  		<button type="button" class="btn btn-primary b-edit-fi no-edit-fi">-</button>
								  		<button type="button" class="btn btn-primary b-save-fi edit-fi" fi-id='<?php echo $list_food['id']; ?>'>s</button>
								  		<button type="button" class="btn btn-primary b-delete-fi" fi-id='<?php echo $list_food['id']; ?>'>x</button>
						  			</div>						
								</div>
							</div>
							
					<?php } ?>

			<?php } ?>
						
	</div>
		
	<!-- Form for Modal to add Category --->
	<div class="modal fade" id="modal-add-fc">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        			<h4 class="modal-title" id="exampleModalLabel">New Food Category</h4>
        			<div id="show"></div>					
				</div>
				
				<div class="modal-body">
		            <label for="fc-name" class="control-label">Name Category:</label>
		            <input type="text" class="form-control" value="here" id="fc-name" user-id='<?php echo $user['id'];?>'>					
				</div>
				
				<div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary" data-dismiss="modal" id="add-fc">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Form for Modal to add Food Item --->
	<div class="modal fade" id="modal-add-fi">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        			<h4 class="modal-title" id="exampleModalLabel">New Food Item</h4>
        			<div id="show"></div>					
				</div>
				
				<div class="modal-body">
		            <label for="fi-name" class="control-label">Name:</label>
		            <input type="text" class="form-control" value="" id="fi-name">
		            <label for="fi-price" class="control-label">Price:</label>
		            <input type="text" class="form-control" value="" id="fi-price">					
				</div>
				
				<div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary" data-dismiss="modal" id="add-fi" fi-id="">Save changes</button>
				</div>
			</div>
		</div>
	</div>		
	
	<!-- Template Categories-->
	<template id="categories-template">
			<div class="row list-group-item list-group-item-warning delete-fc" id="edit-fc">
				<div class="col-sm-8">
					<p><strong class="no-edit-fc">{{fc_name}}</strong></p>
					<input type="text" class="edit-fc" value="{{fc_name}}"/>
				</div>
				<div class="col-sm-4">
					<div class="btn-group btn-group-sm pull-right">
						<button type="button" class="btn btn-primary b-add-fi" data-toggle="modal" data-target="#modal-add-fi" fc-id='{{fc_id}}'>+</button>
				  		<button type="button" class="btn btn-primary b-edit-fc no-edit-fc">-</button>
				  		<button type="button" class="btn btn-primary b-save-fc edit-fc" fc-id='{{fc_id}}'>s</button>
				  		<button type="button" class="btn btn-primary b-delete-fc" fc-id='{{fc_id}}'>x</button>
		  			</div>						
				</div>
			</div>
	</template>
	
	<!-- Template Food Item-->
	<template id="food-item-template">
			<div class="row list-group-item delete-food" id="edit-fi">
				<div class="col-sm-4">
					<p class="no-edit-fi food-name">{{fi_name}}</p>
					<input type="text" class="edit-fi food-name" value="{{fi_name}}"/>
				</div>
				<div class="col-sm-4">
					<p class="no-edit-fi food-price">{{fi_price}}</p>
					<input type="text" class="edit-fi food-price" value="{{fi_price}}"/>
				</div>							
				<div class="col-sm-4">
					<div class="btn-group btn-group-sm pull-right">
				  		<button type="button" class="btn btn-primary b-edit-fi no-edit-fi">-</button>
				  		<button type="button" class="btn btn-primary b-save-fi edit-fi" fi-id='{{fi_id}}'>s</button>
				  		<button type="button" class="btn btn-primary b-delete-fi" fi-id='{{fi_id}}'>x</button>
		  			</div>						
				</div>
			</div>						
	</template>


	<div class="col-sm-2"></div>
</div>
