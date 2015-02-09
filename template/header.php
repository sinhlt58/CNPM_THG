<?php
# Start the session:
session_start();

if(!isset($_SESSION['username'])){//Neu username chua duoc set thi ra trang login.php
	header('Location: login.php');
}

?>

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
		