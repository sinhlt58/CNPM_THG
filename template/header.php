<?php include('config/setup.php'); ?>

<!DOCTYPE html>
<html>
<head>
	
	<title> <?php echo $page['title'].' | '.$site_title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<?php include('config/css.php'); ?>
	
	<?php include('config/js.php'); ?>
	<link href="UI Design/lib/style.css" rel="stylesheet" type="text/css">
	<script src="lib/webfont.js"></script>
	<link href=
	"http://fonts.googleapis.com/css?family=Ubuntu:300,300italic,400,400italic,500,500italic,700,700italic%7CMontserrat:400,700%7CRoboto:300,regular,500%7CRoboto+Condensed:300,regular,700%7CRoboto+Slab:300,regular,700%7CArbutus+Slab:regular"
	rel="stylesheet">
	<script>
		WebFont.load({
			google: {
				families: ["Ubuntu:300,300italic,400,400italic,500,500italic,700,700italic","Montserrat:400,700","Roboto:300,regular,500","Roboto Condensed:300,regular,700","Roboto Slab:300,regular,700","Arbutus Slab:regular"]
			}
		});
	</script>
	<script src="UI Design/lib/modernizr-2.7.1.js" type="text/javascript"></script>
	<style type="text/css">
		a:hover, a.hover {
		text-decoration: none;
		}
		a:visited, a.visited {
		text-decoration: none;
		}a:link, a.link {
		text-decoration: none;
		}
		a:active, a.active {
		text-decoration: none;
		}
	</style>
</head>

<body>

	<div id="wrap">
		
			<?php if(is_sign_in() && $view['name'] != 'none-navigation'){ 
				 $query2 = "SELECT * FROM restaurants WHERE id=$restaurant[id]";
                 $result2 = mysqli_query($dbc, $query2);
				$restaurant = mysqli_fetch_assoc($result2);
			?>
			<div class="w-section section w-title">
			<div class="w-container">
				<div class="w-main-title"><?php echo $restaurant['name']; ?></div>
			</div>	
			</div>
			<?php }?>
		