<?php 

# Start Session:	
session_start();

# Database Connection Here...
include('config/connection.php');

if ($_POST) {
	
	$query = "SELECT * FROM users WHERE email = '$_POST[email]' AND password = SHA1($_POST[password])";
	$run = mysqli_query($dbc, $query);
	
	if(mysqli_num_rows($run) == 1){
		
		$_SESSION['username'] = $_POST['email'];//$_SESSION['username'] nhu kieu 1 bien vay.
		header('Location: index.php');
		
	}
}

 ?>

<!DOCTYPE htlm>
<html>
	<head>
		
		<title>USERS LOGIN</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<?php include('config/css.php'); ?>
		
		<?php include('config/js.php'); ?>
				
	</head>

<body>
	<?php //include(D_TEMPLATE.'/navigation.php')?>		
		
	<div class = "row">
		<div class="col-md-4 col-md-offset-4">
			<div class = "panel panel-default">
				<div class = "panel-heading">
					<strong class = "panel-title">USERS LOGIN</strong>	
				</div>
				<div class = "panel-body">	
					<form action = "login.php" method = "post" role = "form">
		 		 		<div class="form-group">
		    				<label for="email">Email address</label>
		    				<input type="email" class="form-control" id="email" name = "email" placeholder="Enter email">
		  				</div>
		  				<div class="form-group">
		    				<label for="password">Password</label>
		    				<input type="password" class="form-control" id="password" name = "password" placeholder="Password">
		  				</div>
	  					<button type="submit" class="btn btn-default">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
		
	<?php //include(D_TEMPLATE.'/footer.php')?>	
		
	<?php //if($debug == 1) {include('widgets/debug.php');} ?>
			
	
</body>
	
</html>