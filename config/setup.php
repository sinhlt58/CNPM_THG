<?php
error_reporting(0);
# Start the session:
session_start();

# Database Connection:
include('config/connection.php');

# Constants:
DEFINE('D_TEMPLATE', 'template');
DEFINE('NAME_DOMAIN', 'http://localhost/THG/THGv1.0');

# Function:
include ('functions/user.php');
include ('functions/sandbox.php');
include ('functions/data.php');
include ('functions/template.php');

# User Setup:
/* 
 * Them 1 bien $checkPassword de kiem tra sai mat khau.
 * Them phan kiemtra sign-up
 * By: HaiTrieu
 * */
#----Login
$checkPassword = check_user($dbc);
#----Signup
$checkSignUp = validSignUp($dbc);
$user = data_user($dbc, $_SESSION['username']);

# Site and Page Setup:
$site_title = 'THG 1.0';
$debug = data_setting_value($dbc, 'debug-status');

$path = get_path();
$slug = $path['call_parts'][0];
check_path($slug, $dbc);


$page = data_post($dbc, $slug);
$view = data_post_type($dbc, $page['type']);

?>