<nav class="navbar navbar-default" role="navigation">
		
		<?php if($debug == 1) { ?>
			<button id="btn-debug" class="btn btn-default"><i class="fa fa-bug"></i></button>
		<?php } ?>
		
		<!-- Phien ban nguoi dung - khong co debug -->
		<div class="container">
			
			<ul class="nav navbar-nav">
				<?php nav_main($dbc, $path); ?>
				
			</ul>
			<div class="pull-right">
					
				<?php if(is_sign_in()){ ?>
					<ul class="nav navbar-nav ">
						<li class="dropdown">
							
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <?php echo $user['fullname']; ?> <span class="caret"></span></a>
							
							<ul class="dropdown-menu" role="menu">
								<li><a href="views/logout.php">Logout</a></li>
							</ul>
							
						</li>
					</ul>	
				<?php }?>
				
				<?php if(!is_sign_in()){ ?>
					<ul class="nav navbar-nav">
						<li>
							<a href="<?php echo NAME_DOMAIN; ?>/sign-in"><strong>Sign In</strong></a>
						</li>
					</ul>
					<ul class="nav navbar-nav">
						<li>
							<a href="<?php echo NAME_DOMAIN; ?>/sign-up"><strong>Sign Up</strong></a>
						</li>
					</ul>
				<?php }?>
				
			</div>
			<!-- Log out button here -->
		</div>
		<!-- End of container -->
	
</nav><!-- END Main nav-->