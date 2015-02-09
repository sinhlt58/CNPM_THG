<?php 

# Start Session:
session_start();

# Database Connection Here...
include('../config/connection.php');

if ($_POST) {
	
	$query = "SELECT * FROM users WHERE email = '$_POST[email]' AND password = SHA1('$_POST[password]')";
	$run = mysqli_query($dbc, $query);
	
	if(mysqli_num_rows($run) == 1){
		
		$_SESSION['username'] = $_POST['email'];
		header('Location: index.php');
		
	}
}

 ?>

<!DOCTYPE htlm>
<html>
	<head>
		
		<title>Admin Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<?php include('config/css.php'); ?>
		
		<?php include('config/js.php'); ?>
				
	</head>

<body>
		
	<div id="wrap">		
		<?php //include(D_TEMPLATE.'/navigation.php')?>	
		
		<div class="container">
			
			<br/><br/><br/><br/>
			<div class="row">
				
				<div class="col-md-4 col-md-offset-1">
					<fieldset>
					<div class="panel_panel-info">
						
						<div class="pannel-heading">
							 <strong>Login</strong>
						</div><!-- END panel-head -->
						
						<div class="panel-body">
						
							<form action="login.php" method="POST" role="form">
								
							  <div class="form-group">
							    <label for="email">Email address</label>
							    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
							  </div>
							  
							  <div class="form-group">
							    <label for="passord">Password</label>
							    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
							  </div>
							  
							  <!--
							  <div class="checkbox">
							    <label>
							      <input type="checkbox"> Check me out
							    </label>
							  </div>
							  -->
							  
							  <button type="submit" class="btn btn-default">Submit</button>
							  
							</form>	
						
						</div><!-- END panel-body -->
						
					</div><!-- END panel-->				
					
				</div><!-- END col -->
				
				
			</div><!-- END row -->
			
		
		
		</div><!-- END container -->	
		
	</div><!-- end wrap-->
	
		<?php //include(D_TEMPLATE.'/footer.php')?>	
		
		<?php //if($debug == 1) {include('widgets/debug.php');} ?>
			
	
</body>
	
</html>