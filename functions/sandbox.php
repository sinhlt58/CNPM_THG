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

function check_slug(&$slug, $dbc){
  if(!empty($slug)){

    $query = "SELECT posts.type FROM posts WHERE slug = '$slug'";
    $result = mysqli_query($dbc, $query);

    if(mysqli_num_rows($result) === 0){
      header('Location: not-found');

    }else{
      $not_sign_in = 1;
      $choose_restaurant = 3;

      $page_type_data = mysqli_fetch_assoc($result);
      $page_type = $page_type_data['type'];

      if (is_sign_in()){//neu dang nhap roi.

        if (is_choose_restaurant()) {//da chon 1 nha hang nao day.

          if ($page_type != $choose_restaurant)
            header('Location: views/logout.php');

        }else{//chua chon nha hang. (tuc la dang o page restaurants.)

        }
      }else{//chua dang nhap.

        if ($page_type != $not_sign_in)//new vao cac page khac loai 1 se day ra page not-found.
          $slug = 'not-found';

      }
    }
  }else header('Location: home');
}

?>