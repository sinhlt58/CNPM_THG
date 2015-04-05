<?php

include ('../config/connection.php');

if (isset($_POST['keyword'])){
    $key_word = $_POST['keyword'];

    $query1 = "SELECT email, first_name, last_name, id FROM users WHERE email = '$key_word'";
    $result1 = mysqli_query($dbc, $query1);

    if (mysqli_num_rows($result1) == 0){

        echo "does not exit";

    }else{

        if (isset($_POST['restaurantId'])){

            $data = mysqli_fetch_assoc($result1);

            $restaurant_id = $_POST['restaurantId'];
            $user_id = $data['id'];
            $full_name = $data['first_name'].' '.$data['last_name'];

            $query2 = "INSERT INTO users_restaurants (user_id, restaurant_id, role) VALUES ($user_id, $restaurant_id, 1)";
            $result2 = mysqli_query($dbc, $query2);

            if (!$result2){
                echo mysqli_error($dbc, $result2);
            }

            echo $full_name;
        }

    }
}

?>