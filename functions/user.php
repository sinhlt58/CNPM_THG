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

/*
 * Ham kiem tra dang ky hop le(khong trung voi email trong CSDL)
 * By: HaiTrieu
 * Still has some errors
 * */
function validSignUp($dbc) {
    if (!isset($_POST['signup_email'], $_POST['signup_password'], $_POST['signup_retype_password']) && !empty($_POST['first_name']) && !empty($_POST['last_name'])) {

        $query = "SELECT * FROM users WHERE email = '$_POST[signup_email]'";
        $run = mysqli_query($dbc, $query);

        if(mysqli_num_rows($run) == 0){
            if ($_POST['signup_password'] == $_POST['signup_retype_password']) {
                // Insert into database
                $insertNewUser = "INSERT INTO users(first_name, last_name, email, password) VALUES ('$_POST[first_name]', '$_POST[last_name]', '$_POST[signup_email]', SHA1($_POST[signup_password]))";
                $InsertResult = mysqli_query($dbc, $insertNewUser);

                // Login
                $_SESSION['username'] = $_POST['signup_email'];
                header('Location: restaurants');
                return 'true';
            }
            else {
                /* Sai mat khau xac nhan. */
                return 'wrongPassword';
            }
        }
        else {
            /* Neu ten tai khoan da ton tai. */
            return 'invalidEmail';
        }
    }else return 'notFullFilled';

}


?>