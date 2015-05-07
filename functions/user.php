<?php

function check_user($dbc){
    if (isset($_POST['email'], $_POST['password'])) {

        $query = "SELECT * FROM users WHERE email = '$_POST[email]' AND password = SHA1($_POST[password])";
        $run = mysqli_query($dbc, $query);

        if($run == false)
            return false;
        if(mysqli_num_rows($run) == 1){

            $_SESSION['username'] = $_POST['email'];

            header('Location: restaurants');
            return true;

        }else {
            echo "something wrong";
            return false;
        }
    }

}

/*
 * Ham kiem tra dang ky hop le(khong trung voi email trong CSDL)
 * By: HaiTrieu
 * Still has some errors
 * */
function validSignUp($dbc) {
    if (empty($_POST['signup_email']) || empty($_POST['first_name']) || empty($_POST['last_name'])) {
        return 'notFullFilled';
    }

    if (isset($_POST['signup_email'], $_POST['signup_password'], $_POST['signup_retype_password'])) {
        $query = "SELECT * FROM users WHERE email = '$_POST[signup_email]'";
        $run = mysqli_query($dbc, $query);

        if(mysqli_num_rows($run) == 0){
            if ($_POST['signup_password'] == $_POST['signup_retype_password']) {
                $query = "INSERT INTO users (first_name, last_name, email, password) VALUES ('$_POST[first_name]', '$_POST[last_name]', '$_POST[signup_email]', SHA1($_POST[signup_password]))";
                $result = mysqli_query($dbc, $query);

                $last_insert_user_id = mysqli_insert_id($dbc);
                $default_name_restaurant = "My restaurant";
                $default_number_of_tables = 100;

                //insert to restaurants table.
                $query2 = "INSERT INTO restaurants (name, number_of_table) VALUES ('$default_name_restaurant', $default_number_of_tables)";
                $result2 = mysqli_query($dbc, $query2);
                $last_insert_restaurant_id = mysqli_insert_id($dbc);

                //insert to restaurants_users.
                $query3 = "INSERT INTO users_restaurants (user_id, restaurant_id, role) VALUES ($last_insert_user_id, $last_insert_restaurant_id, 0)";
                $result3 = mysqli_query($dbc, $query3);

                // Login
                $_SESSION['username'] = $_POST['signup_email'];
                header('Location: restaurants');
                return 'true';
            }
        }else{
            return 'invalidEmail';
        }
                // Insert into database
    }else{
        return 'notFullFilled';
    }

}


?>