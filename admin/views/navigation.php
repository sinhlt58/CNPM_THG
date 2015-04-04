<h1>Navigation</h1>

<div class="row">
	
	<div class="col-md-3">
		
		<ul id="sort-nav" class="list-group">
			
			<?php 
			
			$query = "SELECT * FROM navigation ORDER BY position ASC";
			$result = mysqli_query($dbc, $query);
			
			while ($list = mysqli_fetch_assoc($result)) { ?>	
					
					<li id="list_<?php echo $list['id'] ?>" class="list-group-item">
						
						<a id="label_<?php echo $list['id'] ?>" data-toggle="collapse" data-target="#form_<?php echo $list['id'] ?>">
							<?php echo $list['label']; ?> <i class="fa fa-chevron-down"></i>						
						</a>
						<div id="form_<?php echo $list['id'] ?>" class="collapse">
							
							<form  class="form-horizontal nav-form" action="index.php?page=navigation&id=<?php echo $list['id']; ?>" method="POST" role="form">
						
								
								<div class="form-group">
									
									<label class="col-sm-2 control-label" for="id">ID:</label>
									<div class="col-sm-10">
										<input class="form-control input-sm" type="text" value="<?php echo $list['id'] ?>" name="id" id="id" placeholder="id-name">									
									</div>
									
								</div>
								
								<div class="form-group">
									
									<label class="col-sm-2 control-label" for="label">Label:</label>
									<div class="col-sm-10">
										<input class="form-control input-sm" type="text" value="<?php echo $list['label'] ?>" name="label" id="label" placeholder="Label">
									</div>
									
								</div>
								
								<div class="form-group">
									
									<label class="col-sm-2 control-label" for="url">Url:</label>
										<div class="col-sm-10">
									<input class="form-control input-sm" type="text" value="<?php echo $list['url'] ?>" name="url" id="url" placeholder="Url">
									</div>
									
								</div>
								
								<div class="form-group">
									
									<label class="col-sm-2 control-label" for="status">Status:</label>
									<div class="col-sm-10">
										<input class="form-control input-sm" type="text" value="<?php echo $list['status'] ?>" name="status" id="status" placeholder="Status">
									</div>
									
								</div>								
								
								<button type="submit" class="btn btn-default">Save</button>
								<input type="hidden" name="submitted" value="1">
								
								<input type="hidden" name="openedid" value="<?php echo $list['id']; ?>">
								
							</form>
						
						</div>
					
					</li>
					
			<?php } ?>
		
		</ul>
		
	</div>
		
	<div class="col-md-9">		
		
		<?php if(isset($message)) {echo $message;} ?>
			
		</div>
		
	</div>
		
</div>