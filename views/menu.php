<div class="w-section w-menu-tab">
	<div class="w-container" >
		<div class="w-tabs" data-duration-in="300" data-duration-out="100" >
			
			<div class="w-tab-menu w-tab-left w-menu-list" id="menu2">

				<!-- Category Header-->
				<div class="w-menu-header">
					<div>
						<div class="w-row">
							<div class="w-col w-col-6">
								<div class="w-menu-header-text">
									<div>Categories</div>
								</div>
							</div>
							<div class="w-col w-col-6 w-add-button"><a class="w-add-button-text" data-toggle="modal" data-target="#modal-add-fc" href="#"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> New Category</a>
							</div>
						</div>
					</div>
				</div>
				<!-- End Category Header-->

				<!-- Show Category List-->
				<?php 
				$query = "SELECT * FROM food_categories WHERE restaurant_id=$restaurant[id] ORDER BY id DESC";
				$result = mysqli_query($dbc, $query);
				while($list_fc = mysqli_fetch_assoc($result)) { ?>
				<a class="w-tab-link w-inline-block w-tab-link" data-w-tab="Tab <?php echo $list_fc['id']; ?>">
					<div class="no-edit-fc"><?php echo $list_fc['name']; ?></div>
				</a>
				<?php 
			} ?>
			<!-- End Show Category List-->
		</div>

		<div class="w-tab-content w-tab-content" id="menu">
			<div class="w-tab-content-title">
				<h4>Editing Category</h4>
			</div>
			<?php 
			$query = "SELECT * FROM food_categories WHERE restaurant_id=$restaurant[id] ORDER BY id DESC";
			$result = mysqli_query($dbc, $query);
			while($list_fc = mysqli_fetch_assoc($result)) { ?>
			<div class="w-tab-pane" data-w-tab="Tab <?php echo $list_fc['id']; ?>">
				<div class="w-tab-details edit-fc">
					<h4 class="w-category-title">Category Name:</h4>
					<input class="w-input w-category-name edit-fc" type="text" value="<?php echo $list_fc['name']; ?>">
				</div>


				<div class="w-tab-details">
					<div class="w-row">
						<div class="w-col w-col-6">
							<h4 class="w-category-title">Items:</h4>
						</div>
						<div class="w-col w-col-6 w-clearfix"><a class="button w-add-item b-add-fi" data-toggle="modal" data-target="#modal-add-fi" fc-id='<?php echo $list_fc['id']; ?>' href="#">+ New Item</a>
						</div>
					</div>
					<?php 
					$query2 = "SELECT * FROM food WHERE fc_id=$list_fc[id] ORDER BY id DESC";
					$result2 = mysqli_query($dbc, $query2);
					while ($list_food = mysqli_fetch_assoc($result2)) { ?>

					<div class="row list-group-item delete-food w-row w-food-items" id="edit-fi">
						<div class="w-col w-col-4">
							<p class="no-edit-fi food-name w-food-name"><?php echo $list_food['food_name']; ?></p>
							<input type="text" class="edit-fi food-name w-food-name" value="<?php echo $list_food['food_name']; ?>"/>
						</div>
						<div class="w-col w-col-4">
							<p class="no-edit-fi food-price w-food-price"><?php echo $list_food['food_price']; ?></p>
							<input type="text" class="edit-fi food-price w-food-price" value="<?php echo $list_food['food_price']; ?>"/>
						</div>							
						<div class="w-col w-col-2">
							<a class="button-edit no-margin button-sm b-edit-fi no-edit-fi" href="#">Edit</a>
							<a class="button-edit no-margin button-sm b-save-fi edit-fi" fi-id='<?php echo $list_food['id']; ?>' href="#">Save</a>
						</div>
						<div class="w-col w-col-2">
							<a class="button-delete no-margin button-sm b-delete-fi" fi-id='<?php echo $list_food['id']; ?>' href="#">Delete</a>				
						</div>
					</div>
					<?php } ?>
				</div>
				<div class="w-clearfix w-tab-details">
					<a class="button-delete b-delete-fc" href="#" fc-id='<?php echo $list_fc['id']; ?>'>Delete Category</a>
					<a class="button-edit b-save-fc edit-fc" fc-id='<?php echo $list_fc['id']; ?>' href="#">Save</a>
				</div>
			</div>
			<?php 
		} ?>
	</div>
</div>
</div>


<!-- Template Categories-->
<!-- Template cho phan chi tiet category ben phai-->
<template id="categories-template">
	<div class="w-tab-pane" data-w-tab="Tab {{fc_id}}">
		<div class="w-tab-details">
			<h4 class="w-category-title">Category Name:</h4>
			<input class="w-input w-category-name" type="text" value="{{fc_name}}">
		</div>

		<div class="w-tab-details">
			<div class="w-row">
				<div class="w-col w-col-6">
					<h4 class="w-category-title">Items:</h4>
				</div>
				<div class="w-col w-col-6 w-clearfix"><a class="button w-add-item b-add-fi" data-toggle="modal" data-target="#modal-add-fi" fc-id='{{fc_id}}' href="#">+ New Item</a>
				</div>
			</div>
		</div>
		<div class="w-clearfix w-tab-details">
			<a class="button-delete b-delete-fc" href="#" fc-id='{{fc_id}}'>Delete Category</a>
			<a class="button-edit b-save-fc edit-fc" fc-id='{{fc_id}}' href="#">Save</a>
		</div>
	</div>
</template>

<!-- Template Categories2-->
<!-- Template cho phan tab category ben trai-->
<template id="categories-template2">
	<a class="w-tab-link w-inline-block w-tab-link" data-w-tab="Tab {{fc_id}}">
		<div>{{fc_name}}</div>
	</a>
</template>

<!-- Template Food Item-->
<template id="food-item-template">
	<div class="row list-group-item delete-food w-row w-food-items" id="edit-fi">
		<div class="w-col w-col-4">
			<p class="no-edit-fi food-name w-food-name">{{fi_name}}</p>
			<input type="text" class="edit-fi food-name w-food-name" value="{{fi_name}}"/>
		</div>
		<div class="w-col w-col-4">
			<p class="no-edit-fi food-price w-food-price">{{fi_price}}</p>
			<input type="text" class="edit-fi food-price w-food-price" value="{{fi_price}}"/>
		</div>							
		<div class="w-col w-col-2">
			<a class="button-edit no-margin button-sm b-edit-fi no-edit-fi" href="#">Edit</a>
			<a class="button-edit no-margin button-sm b-save-fi edit-fi" fi-id='{{fi_id}}' href="#">Save</a>

		</div>
		<div class="w-col w-col-2">
			<a class="button-delete no-margin button-sm b-delete-fi" fi-id='{{fi_id}}' href="#">Delete</a> 									
		</div>
	</div>						
</template>

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
		            <input type="text" class="form-control" value="here" id="fc-name" restaurant-id='<?php echo $restaurant['id'];?>'>
				</div>
				
				<div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary" data-dismiss="modal" id="add-fc" >Save changes</button>
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