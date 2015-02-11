<?php
//Setup file:
error_reporting(0);

# Database Connection
include('config/connection.php');

# Constants:
DEFINE('D_TEMPLATE', 'template');//dinh nghia hang D_TEMPLATE la ten folder 'template', khi nao thay đổi đường  dẫn cho dễ.

# Function:
//Load các hàm trong các file ở dưới.
include ('functions/sandbox.php');
include ('functions/data.php');
include ('functions/template.php');

# Site Setup:
$debug = data_setting_value($dbc, 'debug-status');

$path = get_path();

$site_title = 'THG 1.0';

if(!isset($path['call_parts'][0]) || $path['call_parts'][0] == ''){//kiểm tra xem $_GET có giá trị không
	
	$path['call_parts'][0] = 'home'; // Set $path['call_parts'][0] to equal the value givin in the URL.
	//header('Location: home');
	
}

# Page Setup:
$page = data_post($dbc,$path['call_parts'][0]);
$view = data_post_type($dbc, $page['type']);

# User Setup:
$user = data_user($dbc, $_SESSION['username']);

# Page menu setup:
include ('config/menu.php');
?>