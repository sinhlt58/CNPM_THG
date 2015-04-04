<?php /*Tai khoan mac dinh thg@gmail.com pass: 123*/


?>
<div class = "row">
	<div class="col-md-4 col-md-offset-4">
		<div class = "panel panel-default">
			<div class = "panel-heading">
				<strong class = "panel-title">USERS LOGIN</strong>	
			</div>
			<div class = "panel-body">	
				<form action = "<?php echo NAME_DOMAIN; ?>/sign-in" method = "POST" role = "form">
	 		 		<div class="form-group">
	    				<label for="email">Email address</label>
	    				<input type="email" class="form-control" id="email" name = "email" placeholder="Enter email">
	  				</div>
	  				<div class="form-group">
	    				<label for="password">Password</label>
	    				<input type="password" class="form-control" id="password" name = "password" placeholder="Password">
	  				</div>
  					<button id="sign-in" type="submit" class="btn btn-default">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>
		
