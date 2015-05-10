<!--
	* Code dang ky them tai khoan moi.
	* By: HaiTrieu
-->
<script src="js/checkForm.js"></script>

<div class="w-section background">
    <div class="login-card">
      <h4>CREAT NEW ACCOUNT</h4>
      <div class="signup-sub-tittle">Here's a free account</div>
      <div class="w-form">
        <form class="w-clearfix" action = "<?php echo NAME_DOMAIN; ?>/sign-up" method = "POST" role = "form">
          <input class="w-input w-category-name form-control first-name" id="first_name" type="text" placeholder="First Name" name="first_name" data-name="First Name">
          <input class="w-input w-category-name form-control last-name" id="last_name" type="text" placeholder="Last Name" name="last_name" data-name="Last Name">
          <input class="w-input w-category-name form-control" id="signup_email" type="email" placeholder="Enter your email address" name="signup_email" data-name="Email 3" required="required" autofocus="autofocus">
          <div class="text-danger" id="email_warning"></div>
          <input class="w-input w-category-name form-control" id="signup_password" type="password" placeholder="Password" name="signup_password" required="required" data-name="Password 2">
          <input class="w-input w-category-name form-control" id="signup_retype_password" type="password" placeholder="Re-type Password" name="signup_retype_password" required="required" data-name="Confirm Password">
          <div class="text-danger" id="password_warning"></div>
          <div class="w-checkbox w-clearfix">
            <input class="w-checkbox-input" id="term-services" type="checkbox" name="term-services" data-name="term-services" required="required">
            <label class="w-form-label check-box-text" for="term-services">Signing up for a THG account means you agree to the <a class="page-link" href="#">Privacy Policy</a> and <a class="page-link" href="#">Terms of Service</a>.</label>
          </div>
           <?php
                    if ($checkSignUp == 'wrongPassword') {
                        echo '<strong><font color = "red">Incorrect retyped password!</font></strong></br>';
                    }
                    if (($checkSignUp == 'notFullFilled') && ($_POST['signup_email'] != '')) {
                        echo '<strong><font color = "red">You must complete your sign-up form!</font></strong></br>';
                    }
                    if ($checkSignUp == 'invalidEmail') {
                        echo '<strong><font color = "red">That email already exists!</font></strong></br>';
                    }
                    ?>
          <input class="w-button button log-in-button" type="submit" value="Creat Account">
          <a class="login-link have-account" href="sign-in">Already have an account? Login.</a>
        </form>
      </div>
    </div>
  </div>

<!--
<div class = "row">
    <div class="col-md-4 col-md-offset-4">
        <div class = "panel panel-default">
            <div class = "panel-heading">
                <strong class = "panel-title"><center>CREAT NEW ACCOUNT</center></strong>
            </div>
            <div class = "panel-body">
                <form action = "<?php echo NAME_DOMAIN; ?>/sign-up" method = "POST" role = "form">
                    <div class="form-group">
                        <label for="signup_email">Email address</label>
                        <input type="email" class="form-control" id="signup_email" name = "signup_email" placeholder="Example: email@gmail.com" >
                    </div>
                    <div class="text-danger" id="email_warning"></div>
                    <div class="form-group">
                        <label for="signup_password">Password</label>
                        <input type="password" class="form-control" id="signup_password" name = "signup_password" placeholder="**********">
                    </div>
                    <div class="form-group">
                        <label for="signup_retype_password">Retype password</label>
                        <input type="password" class="form-control" id="signup_retype_password" name ="signup_retype_password"
                               placeholder="**********" disabled="disabled">
                    </div>
                    <div class="text-danger" id="password_warning"></div>
                    <div class="form-group">
                        <label for="first_name">Your first name</label>
                        <input type="text" class="form-control" id="first_name" name = "first_name" placeholder="Example: John">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Your last name</label>
                        <input type="text" class="form-control" id="last_name" name = "last_name" placeholder="Example: Michael">
                    </div>
                    <?php
                    if ($checkSignUp == 'wrongPassword') {
                        echo '<strong><font color = "red">Incorrect retyped password!</font></strong></br>';
                    }
                    if (($checkSignUp == 'notFullFilled') && ($_POST['signup_email'] != '')) {
                        echo '<strong><font color = "red">You must complete your sign-up form!</font></strong></br>';
                    }
                    if ($checkSignUp == 'invalidEmail') {
                        echo '<strong><font color = "red">That email already exists!</font></strong></br>';
                    }
                    ?>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
-->
