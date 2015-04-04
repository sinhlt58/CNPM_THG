<?php

include('../config/connection.php');

$id = $_GET['id'];

$query = "DELETE FROM food WHERE id = $id";
$result = mysqli_query($dbc, $query);

if($result) {
    echo 'Item Deleted';
} else {

    echo 'There was an error...<br>';
    echo $query.'<br>';
    echo mysqli_error($dbc);

}

?>