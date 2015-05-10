<div class="w-nav navigation" data-collapse="medium" data-animation="default" data-duration="400" data-contain="1">
		
		<?php if($debug == 1) { ?>
			<button id="btn-debug" class="btn btn-default"><i class="fa fa-bug"></i></button>
		<?php } ?>
		
		<!-- Phien ban nguoi dung - khong co debug -->
		<div class="w-container">
			<a class="w-nav-brand brand-link" href="home">
        		<div class="logo-text">THG</div>
      		</a>
			
			<nav class="w-nav-menu w-clearfix nav-menu" role="navigation">
				<?php nav_main($dbc, $path); ?>
			 </nav>	
			
			<div class="pull-right">
					
				<?php if(is_sign_in()){ ?>

				<div class="w-dropdown nav-link w-logout" data-delay="0">
        			<div class="w-dropdown-toggle nav-drop-down">
          				<div>Hello, <?php echo $user['fullname']; ?></div>
          				<div class="w-icon-dropdown-toggle"></div>
        		</div>
        				<nav class="w-dropdown-list"><a class="w-dropdown-link" href="views/logout.php">Logout</a>
       					</nav>
      			</div>	
				<?php }?>
				
				<?php if(!is_sign_in()){ ?>
				<nav class="w-nav-menu w-clearfix nav-menu sign-up-menu" role="navigation">
					<a href="<?php echo NAME_DOMAIN; ?>/sign-in" class="w-nav-link nav-link" href="#">Log In</a>
					<a href="<?php echo NAME_DOMAIN; ?>/sign-up" class="w-nav-link nav-link" href="#">Sign Up</a>
      			</nav>
					
				<?php }?>
				
			</div>
			<div class="w-nav-button nav-link menu">
        <div class="w-icon-nav-menu"></div>
      </div>
			<!-- Log out button here -->
		</div>
		<!-- End of container -->
	
</div><!-- END Main nav-->