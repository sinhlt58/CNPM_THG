<?php

# Database Connection Here...
$localhost = 'localhost';
$user_name = 'thg';
$password = '123';
$database_name = 'thg';

//Ket noi den database, hinh nhu tra va 1 cai gi do de biet duoc vi tri database trong mysql.
$dbc = mysqli_connect($localhost, 'root' , '', $database_name) OR die('Count not connect because: '.mysqli_connect_error());

?>