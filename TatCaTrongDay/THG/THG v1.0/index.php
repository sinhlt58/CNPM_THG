<?php /* Comments(cm) mình viết theo ý hiểu của mình các bạn nên tìm hiểu các hàm trên gg nhé !
file setup.php khai biến mấy cái biền toàn cục và gọi mấy hàm, nói chung file đấy chạy đầu tiên
sau đó cứ theo thứ tự từng dòng mà đợc nhé.
 * 
 *Cái folder admin đang làm dở nên không có cm nhé. */ ?>

<?php include('config/setup.php'); ?>

<!DOCTYPE htlm>
<html>
	<head>
		
		<title> <?php echo $page['title'].' | '.$site_title; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<?php include('config/css.php'); ?>
		
		<?php include('config/js.php'); ?>
				
	</head>

<body>
		
	<div id="wrap">		
		<?php include(D_TEMPLATE.'/navigation.php')?>	
		
		<div class="container">
			
			<h1><?php echo $page['header']; ?></h1>
			
			 <?php echo $page['body_formatted']; ?>
					 
		</div>
		
	</div><!-- end wrap-->
	
		<?php include(D_TEMPLATE.'/footer.php')?>	
		
		<?php if($debug == 1) {include('widgets/debug.php');} ?>
			
	
</body>
	
</html>