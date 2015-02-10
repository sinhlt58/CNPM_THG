<?php 

include('../../config/connection.php');

$label = mysqli_real_escape_string($dbc, $_POST['label']);
$url = mysqli_real_escape_string($dbc, $_POST['url']);

$query = "UPDATE navigation SET id = '$_POST[id]', label = '$label', url = '$url', status = $_POST[status] WHERE id = '$_POST[openedid]'";
$result = mysqli_query($dbc, $query);

if ($result) {
	
	echo 'Saved<br>'.$query;
	
} else {
	
	echo mysqli_error($dbc).'<br>'.$query;
		
}

?>