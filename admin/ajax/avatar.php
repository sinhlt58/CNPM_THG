<?php 

include('../../config/connection.php');

$id = $_GET['id'];

$query = "SELECT avatar FROM users WHERE id = $id";
$result = mysqli_query($dbc, $query);

$data = mysqli_fetch_assoc($result);

?>

<img src="../uploads/<?php echo $data['avatar']; ?>">