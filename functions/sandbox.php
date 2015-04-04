<?php 

function get_path() {
  $path = array();
  if (isset($_SERVER['REQUEST_URI'])) {
    $request_path = explode('?', $_SERVER['REQUEST_URI']);

    $path['base'] = rtrim(dirname($_SERVER['SCRIPT_NAME']), '\/');
    $path['call_utf8'] = substr(urldecode($request_path[0]), strlen($path['base']) + 1);
    $path['call'] = utf8_decode($path['call_utf8']);
    if ($path['call'] == basename($_SERVER['PHP_SELF'])) {
      $path['call'] = '';
    }
    $path['call_parts'] = explode('/', $path['call']);

    $path['query_utf8'] = urldecode($request_path[1]);
    $path['query'] = utf8_decode(urldecode($request_path[1]));
    $vars = explode('&', $path['query']);
    foreach ($vars as $var) {
      $t = explode('=', $var);
      $path['query_vars'][$t[0]] = $t[1];
    }
  }
return $path;
}

function get_slug($dbc, $url) {
	
	$pos = strrpos($url, '/');
	$slug = substr($url, $pos + 1);
	
	return $slug;
	
}


function selected($value1, $value2, $return) {
	if ($value1 == $value2){
		echo $return;
	}
}

function is_sign_in(){
  if (isset($_SESSION['username'])){
    return true;
  }else return false;
}

function is_choose_restaurant(){
  if (isset($_SESSION['restaurantId'])){
    return true;
  }else return false;
}

function status_user_page(){
  $not_sign_in = 1;
  $signed_in = 2;
  $choose_restaurant = 3;

  if (is_sign_in()){
    if (is_choose_restaurant()){
      return $choose_restaurant;
    }
    else{
      return $signed_in;
    }
  }else{
    return $not_sign_in;
  }
}

function check_slug(&$slug, $dbc){
  if(!empty($slug)){

    $query = "SELECT posts.type FROM posts WHERE slug = '$slug'";
    $result = mysqli_query($dbc, $query);

    if(mysqli_num_rows($result) === 0){
      header('Location: not-found');

    }else{

      $page_type_data = mysqli_fetch_assoc($result);
      $page_type = $page_type_data['type'];

      $not_sign_in = 1;
      $signed_in = 2;
      $choose_restaurant = 3;

      if ($_SESSION['status_user_page'] === $not_sign_in){

          if ($page_type != $not_sign_in) $slug = 'not-found';

      }else if ($_SESSION['status_user_page'] === $signed_in){

        if ($page_type != $signed_in) header('Location: restaurants');

      }else if ($_SESSION['status_user_page'] === $choose_restaurant){

          if($slug == 'restaurants'){

            $_SESSION['status_user_page'] = $signed_in;
            unset($_SESSION['restaurantId']);

          }

          if($page_type == $not_sign_in)
            header('Location: menu');
      }

    }
  }else header('Location: home');
}

?>