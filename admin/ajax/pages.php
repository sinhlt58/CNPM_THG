<?php 

include('../../config/connection.php');

$id = $_GET['id'];

$query = "DELETE FROM posts WHERE id = $id";
$result = mysqli_query($dbc, $query);

if($result) {
	echo 'Page Deleted';
} else {
	
	echo 'There was an error...<br>';
	echo $query.'<br>';
	echo mysqli_error($dbc);
	
}

?>

