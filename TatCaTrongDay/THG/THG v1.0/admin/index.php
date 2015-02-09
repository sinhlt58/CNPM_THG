<?php

# Start the session:
session_start();

if(!isset($_SESSION['username'])){//Neu username chua duoc set thi ra trang login.php
	header('Location: login.php');
}

?>


<?php include('config/setup.php'); ?>

<!DOCTYPE htlm>
<html>
	<head>
		
		<title> <?php echo $page['title'].' | '.$site_title; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<?php include('config/css.php'); ?>
		
		<?php include('config/js.php'); ?>
				
	</head>

<body>
		
	<div id="wrap">		
		<?php include(D_TEMPLATE.'/navigation.php')?>	
		
		<h1>Admin Dashboard</h1>
		
		<div class="row">
			
			<div class="col-md-3">
				
				<div class="list-group">
				
				
				<?php 
				
					if(isset($_POST['submitted']) == 1){
						
						$title = mysqli_real_escape_string($dbc, $_POST['title']);
						$label = mysqli_real_escape_string($dbc, $_POST['label']);
						$header = mysqli_real_escape_string($dbc, $_POST['header']);
						$body = mysqli_real_escape_string($dbc, $_POST['body']);
						
						$query = "INSERT INTO pages(title, label, header, body) VALUES ('$title', '$label', '$header', '$body')";
						$result = mysqli_query($dbc, $query);
						
						if($result){
								
							$message = '<p>Page was added!</p>';
						
						} else {
							
							$message = '<p>Page could not be added because: '.mysqli_error($dbc);
							$message .= '<p>'.$query.'/p';
								
						}
						
					}
					
				?>
						
				
					<?php 
					
						$query = "SELECT * FROM pages ORDER BY title ASC";
						$result = mysqli_query($dbc, $query);
						
						while($page_list = mysqli_fetch_assoc($result)){ 
							
							$blurb = substr(strip_tags($page_list['body']),0,160);
							
						?>
								
						<a class="list-group-item" href="#">
							<h4 class="list-group-item-heading"><?php echo $page_list['title']; ?></h4>
							 <p class="list-group-item-text"><?php echo $blurb?></p>
						</a>
							
							
					<?php } ?>
					
				</div>
				
			</div>
			
			<div class="col-md-9">
				
				<?php if(isset($message)) {echo $message;} ?>
						
				<form action="index.php" method="POST" role="form">
					
					
					<div class="form-group">
						
						<label for="title">Title:</label>
						<input class="form-control" type="text" name="title" id="title" placeholder="Page Title">
						
					</div>
					
					<div class="form-group">
						
						<label for="label">Label:</label>
						<input class="form-control" type="text" name="label" id="label" placeholder="Page Label">
						
					</div>
					
					<div class="form-group">
						
						<label for="header">Header:</label>
						<input class="form-control" type="text" name="header" id="header" placeholder="Page Header">
						
					</div>
					
					<div class="form-group">
						
						<label for="body">Body:</label>
						<textarea class="form-control" type="text" name="body" id="body" rows="8" placeholder="Page Header"></textarea>
						
					</div>
					
					<button type="submit" class="btn btn-default">Save</button>
					<input type="hidden" name="submitted" value="1">;
						
				</form>
				
			</div>
			
			
		</div>
		
	</div><!-- end wrap-->
	
		<?php include(D_TEMPLATE.'/footer.php')?>	
		
		<?php if($debug == 1) {include('widgets/debug.php');} ?>
			
	
</body>
	
</html>