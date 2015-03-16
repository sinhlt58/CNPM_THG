<?php

# Start Session:
session_start();

$location = "home";

unset($_SESSION['username']);// Xoa user key.

if ($_SESSION['status_user_page'] == 2){
    unset($_SESSION['status_user_page']);
    $location = "sign-in";
}

session_destroy(); //Xoa het session keys.

header('Location: ../'.$location);

?>