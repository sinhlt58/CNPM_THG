<?php

include ('../config/connection.php');

if (isset($_POST['keyword'])){
    $key_word = '%'.$_POST['keyword'].'%';

    $query = "SELECT email FROM users WHERE email LIKE '$key_word' ORDER BY email ASC LIMIT 0, 10";
    $result = mysqli_query($dbc, $query);

    if (mysqli_num_rows($result) != 0 ){

        $emails = array();

        while ($list_email = mysqli_fetch_assoc($result)){

            $emails[] = $list_email['email'];

        }

        echo json_encode($emails);

    }

}

?>