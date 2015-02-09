<h1>Site Setting</h1>

<div class="row">
	
	<div class="col-md-12">		
		
		<?php if(isset($message)) {echo $message;} ?>
			
		<?php 
		
			$query = "SELECT * FROM settings ORDER BY id ASC";
			$result = mysqli_query($dbc, $query);
			
			while($opened = mysqli_fetch_assoc($result)){ ?>
				
				<form class="form-inline" action="index.php?page=settings&id=<?php echo $opened['id']; ?>" method="POST" role="form">
			
					
					<div class="form-group">
						
						<label class="sr-only" for="id">ID:</label>
						<input class="form-control" type="text" value="<?php echo $opened['id'] ?>" name="id" id="id" placeholder="id-name">
						
					</div>
					
					<div class="form-group">
						
						<label class="sr-only" for="label">Label:</label>
						<input class="form-control" type="text" value="<?php echo $opened['label'] ?>" name="label" id="label" placeholder="Label">
						
					</div>
					
					<div class="form-group">
						
						<label class="sr-only" for="value">Value:</label>
						<input class="form-control" type="text" value="<?php echo $opened['value'] ?>" name="value" id="value" placeholder="Value">
						
					</div>						
					
					<button type="submit" class="btn btn-default">Save</button>
					<input type="hidden" name="submitted" value="1">
					
					<input type="hidden" name="openedid" value="<?php echo $opened['id']; ?>">
					
				</form>
						
				
			<?php } ?>
			
		</div>
		
	</div>
		
</div>