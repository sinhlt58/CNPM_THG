
<?php if(isset($opened['id'])) { ?>
<script>
	
	$(document).ready(function(){
		
		Dropzone.autoDiscover = false;
		
		var myDropzone = new Dropzone("#avatar-dropzone");
		
		myDropzone.on("success", function(file){
			
			$("#avatar").load("ajax/avatar.php?id=<?php echo $opened['id']; ?>");
			
		});
		
	});
	
</script>
<?php } ?>	

<h1>User manager</h1>

<div class="row">
	
	<div class="col-md-3">		
		
		<div class="list-group">	
			
		<a class="list-group-item" href="?page=users">
			<i class="fa fa-plus"></i> New User
		</a>
			
		<?php 
		
			$query = "SELECT * FROM users ORDER BY last_name ASC";
			$result = mysqli_query($dbc, $query);
			
			while($list = mysqli_fetch_assoc($result)){ 
				
				$list = data_user($dbc, $list['id']);
				
			?>
					
			<a class="list-group-item <?php selected($list['id'], $opened['id'], 'active'); ?>" href="index.php?page=users&id=<?php echo $list['id']; ?>">
				<h4 class="list-group-item-heading"><?php echo $list['fullname_reverse']; ?></h4>
				 <!--<p class="list-group-item-text"><?php echo $blurb?></p>-->
			</a>
				
				
		<?php } ?>
			
		</div>
		
	</div>
	
	<div class="col-md-9">
		
		<?php if(isset($message)) {echo $message;} ?>
		
		<form action="index.php?page=users&id=<?php echo $opened['id']; ?>" method="POST" role="form">
			
			<?php if($opened['avatar'] != '') { ?>
				
				<div id="avatar">
					
					<div class="avatar-container" style="background-image: url('../uploads/<?php echo $opened['avatar']; ?>')"></div>
					
				</div>
								
			<?php } ?>
			
			<div class="form-group">
				
				<label for="first_name">First Name:</label>
				<input class="form-control" type="text" value="<?php echo $opened['first_name'] ?>" name="first_name" id="first_name" placeholder="First Name">
				
			</div>
			
			<div class="form-group">
				
				<label for="last_name">Last Name:</label>
				<input class="form-control" type="text" value="<?php echo $opened['last_name'] ?>" name="last_name" id="last_name" placeholder="Last Name">
				
			</div>
			
			<div class="form-group">
				
				<label for="email">Email Address:</label>
				<input class="form-control" type="text" value="<?php echo $opened['email'] ?>" name="email" id="email" placeholder="Email Address">
				
			</div>			
			
			<div class="form-group">
				
				<label for="status">Status:</label>
				<select class="form-control" name="status" id="status">
					
					<option value="0"<?php if (isset($_GET['id'])){ selected('0', $opened['status'], 'selected');} ?>>Inactive</option>
					<option value="1"<?php if (isset($_GET['id'])){ selected('1', $opened['status'], 'selected');} ?>>Active</option>
								
				</select>
				
			</div>
				
			<div class="form-group">
				
				<label for="password">Password:</label>
				<input class="form-control" type="password" value="" name="password" id="password" placeholder="Password">
				
			</div>
			
			<div class="form-group">
				
				<label for="passwordv">Verify Password:</label>
				<input class="form-control" type="password" value="" name="passwordv" id="passwordv" placeholder="Type password again">
				
			</div>	
				
			<button type="submit" class="btn btn-default">Save</button>
			<input type="hidden" name="submitted" value="1">
			
			<?php if(isset($opened['id'])) { ?>
				<input type="hidden" name="id" value="<?php echo $opened['id']; ?>">
			<?php } ?>
				
		</form>
		
		<?php if(isset($opened['id'])) { ?>
		
			<form action="uploads.php?id=<?php echo $opened['id']; ?>" class="dropzone" id="avatar-dropzone">
				
				<input type="file" name="file">
				
			</form>
		
		<?php } ?>	
		
	</div>
	
</div>