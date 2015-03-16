<?php

function check_user($dbc){
    if (isset($_POST['email'], $_POST['password'])) {

        $query = "SELECT * FROM users WHERE email = '$_POST[email]' AND password = SHA1($_POST[password])";
        $run = mysqli_query($dbc, $query);

        if(mysqli_num_rows($run) == 1){

            $_SESSION['username'] = $_POST['email'];

            header('Location: restaurants');
            return true;

        }else {
            echo "something wrong";
            return flase;
        }
    }

}

?>