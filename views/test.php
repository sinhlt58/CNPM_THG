function check_path($slug, $dbc){
if(isset($slug)){

$query = "SELECT * FROM posts WHERE slug = '$slug'";
$result = mysqli_query($dbc, $query);

if(mysqli_num_rows($result) == 0){
if (isUserLoggedIn()){
if (isChooseRestaurant()){
header('Location: menu');
}
else{
header('Location: restaurants');
}
}else {
header('Location: home');
}

}else{
//giu nguen gia tri cua $path['call_parts'][0].
$_SESSION['pre_valid_page'] = $slug;
}
}
}