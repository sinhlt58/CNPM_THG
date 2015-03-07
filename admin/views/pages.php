<h1>Page Manager</h1>

<div class="row">
	
	<div class="col-md-3">		
		
		<div class="list-group">	
			
		<a class="list-group-item" href="?page=pages">
			<i class="fa fa-plus"></i> New Page
		</a>
			
		<?php
		
			$query = "SELECT * FROM posts WHERE type = 1 ORDER BY title ASC";
			$result = mysqli_query($dbc, $query);
			
			while($list = mysqli_fetch_assoc($result)){ 
				
				$blurb = substr(strip_tags($list ['body']),0,160);
				
			?>
					
				<div id="page_<?php echo $list['id']; ?>" class="list-group-item <?php selected($list ['id'], $opened['id'], 'active'); ?>" >
					<h4 class="list-group-item-heading"><?php echo $list ['title']; ?>
						<span class="pull-right">
							
							<a href="#" id="del_<?php echo $list['id']; ?>" class="btn btn-danger btn-delete"><i class="fa fa-trash-o"></i></a>
							<a href="index.php?page=pages&id=<?php echo $list ['id']; ?>" class="btn btn-default"><i class="fa fa-chevron-right"></i></a>					
						
						</span>
						
					</h4>
					 <p class="list-group-item-text"><?php echo $blurb?></p>
				</div>
					
				
		<?php } ?>
			
		</div>
		
	</div>
	
	<div class="col-md-9">
		
		<?php if(isset($message)) {echo $message;} ?>
		
		<form action="index.php?page=pages&id=<?php echo $opened['id']; ?>" method="POST" role="form">
			
			
			<div class="form-group">
				
				<label for="title">Title:</label>
				<input class="form-control" type="text" value="<?php echo $opened['title'] ?>" name="title" id="title" placeholder="Page Title">
				
			</div>
			
			<div class="form-group">
				
				<label for="user">User:</label>
				<select class="form-control" name="user" id="user">
					
					<option value="0">No user</option>
					
					<?php
					
						$query = "SELECT id FROM users ORDER BY first_name ASC";
						$result = mysqli_query($dbc, $query);
						
						while ($user_list = mysqli_fetch_assoc($result)){
								
							$user_data = data_user($dbc, $user_list['id']);	 
								
						?>
							
							<option value="<?php echo $user_data['id']; ?>" 
								<?php
								  if (isset($_GET['id'])){
								  	//if($user_data['id'] == $opened['user_id']){echo 'selected';}
									selected($user_data['id'], $opened['user_id'], 'selected');
								  } else {
								  	//if($user_data['id'] == $user['id']){echo 'selected';}
								  	selected($user_data['id'], $user['id'], 'selected');
								  }
								   
								  
								?>><?php echo $user_data['fullname']; ?></option>
							
					<?php } ?>
					
					
					
					
				</select>
				
			</div>
				
			<div class="form-group">
				
				<label for="slug">Slug:</label>
				<input class="form-control" type="text" value="<?php echo $opened['slug']; ?>" name="slug" id="slug" placeholder="Slug Label">
				
			</div>	
				
			<div class="form-group">
				
				<label for="label">Label:</label>
				<input class="form-control" type="text" value="<?php echo $opened['label']; ?>" name="label" id="label" placeholder="Page Label">
				
			</div>
			
			<div class="form-group">
				
				<label for="header">Header:</label>
				<input class="form-control" type="text" value="<?php echo $opened['header']; ?>" name="header" id="header" placeholder="Page Header">
				
			</div>
			
			<div class="form-group">
				
				<label for="body">Body:</label>
				<textarea class="form-control editor" type="text" name="body" id="body" rows="8" placeholder="Page Header"><?php echo $opened['body']; ?></textarea>
				
			</div>
			
			<button type="submit" class="btn btn-default">Save</button>
			<input type="hidden" name="submitted" value="1">
			<?php if(isset($opened['id'])) { ?>
				<input type="hidden" name="id" value="<?php echo $opened['id']; ?>">
			<?php } ?>	
				
		</form>
		
	</div>
	
	
</div>