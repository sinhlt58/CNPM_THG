<?php
    include_once '../config/connection.php';
    $query = "SELECT * FROM users WHERE email = '$_POST[signup_mail]'";
    $run = mysqli_query($dbc, $query);
    if(mysqli_num_rows($run) != 0) {                        //if the email existed
        echo 'existed';
    }
?>