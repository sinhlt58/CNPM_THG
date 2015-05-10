<?php /*Tai khoan mac dinh thg@gmail.com pass: 123*/


?>
<div class="w-section background">
    <div class="login-card">
      <h4>LOGIN</h4>
      <div class="w-form">
        <form action = "<?php echo NAME_DOMAIN; ?>/sign-in" method = "POST" role = "form">
          <input class="w-input form-control" id="email" type="email" placeholder="Enter your email address" name="email" required="required" autofocus="autofocus">
          <input class="w-input form-control" id="password" type="password" placeholder="Password" name="password" required="required" data-name="Password">
          <div class="w-checkbox w-clearfix">
            <input class="w-checkbox-input" id="checkbox" type="checkbox" name="checkbox" data-name="Checkbox">
            <label class="w-form-label check-box-text" for="checkbox">Remember me?</label>
          </div>
          <div class="w-row form-col">
            <div class="w-col w-col-4 w-col-small-6 w-col-tiny-6 w-clearfix col-no-padding">
              <input class="w-button log-in-button button" type="submit" value="Log In" id="sign-in">
            </div>
            <div class="w-col w-col-8 w-col-small-6 w-col-tiny-6 w-clearfix"><a class="login-link" href="sign-up">Don't have an account?</a><a class="login-link" href="#">Forgot Password?</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--
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
		
-->
