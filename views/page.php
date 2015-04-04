<?php include(D_TEMPLATE.'/navigation.php'); ?>

<div class="container">

		<h1><?php echo $page['header']; ?></h1>
		
		<?php include('views/'.$page['slug'].'.php'); // View type?>
			
		<?//php echo $page['body_formatted']; ?>
					 
</div>