<?php
//Setup file:

# Database Connection
include('config/connection.php');

# Constants:
DEFINE('D_TEMPLATE', 'template');//dinh nghia hang D_TEMPLATE la ten folder 'template', khi nao thay đổi đường  dẫn cho dễ.

# Function:
//Load các hàm trong các file ở dưới.
include ('functions/data.php');
include ('functions/template.php');

# Site Setup:
$debug = data_setting_value($dbc, 'debug-status');

$site_title = 'THG 1.0';

if(isset($_GET['page'])){//kiểm tra xem $_GET có giá trị không
	
	$pageid = $_GET['page']; // Set $pageid to equal the value givin in the URL.
	
} else {
	
	$pageid = 1; // Set $pageid equal to 1 (the Home Page).
}


# Page Setup
$page = data_page($dbc,$pageid);

?>