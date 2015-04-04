<?php
//Setup file:

error_reporting(0);

# Database Connection Here...
include('../config/connection.php');

# Constants:
DEFINE('D_TEMPLATE', 'template');

# Function:
include ('functions/data.php');
include ('functions/template.php');
include ('functions/sandbox.php');

# Site Setup:
$debug = data_setting_value($dbc, 'debug-status');

$site_title = 'THG 1.0';

if(isset($_GET['page'])){
	
	$page = $_GET['page']; // Set $page to equal the value givin in the URL.
	
} else {
	
	$page = 'dashboard'; // Set $page equal to 1 (the Home Page).
}


# Page Setup:
include ('config/queries.php');					

# User Setup:
$user = data_user($dbc, $_SESSION['username']);

?>