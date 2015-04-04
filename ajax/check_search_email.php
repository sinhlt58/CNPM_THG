<?php

include ('../config/connection.php');

if (isset($_POST['keyword'])){
    $key_word = $_POST['keyword'];

    $query1 = "SELECT email, first_name, last_name, id FROM users WHERE email = '$key_word'";
    $result1 = mysqli_query($dbc, $query1);

    if (mysqli_num_rows($result1) == 0){
        echo "does not exit";
    }else{
        $data = mysqli_fetch_assoc($result1);

        $user_id = $data['id'];

        $full_name = $data['first_name'].' '.$data['last_name'];

        echo $full_name;
    }
}

?>