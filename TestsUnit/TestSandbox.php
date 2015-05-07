<?php
require_once('ConnectionClass.php');
require_once('../functions/sandbox.php');

class setData{
    static public function setIdUserAndRestaurant($idU, $idR){
        $_SESSION["username"] = $idU;
        $_SESSION["restaurantId"] = $idR;
    }
}

class TestSandBox extends PHPUnit_Framework_TestCase{

    public function testSelected(){
        $this->assertTrue(selected("home", "home", "selected"));
        $this->assertFalse(selected("homes", "home", "selected"));
    }

    public function testIsSignIn(){
        $_SESSION["username"] = "thg@gmail.com";
        $this->assertTrue(is_sign_in());
        $_SESSION["username"] = null;
        $this->assertFalse(is_sign_in());
    }

    public function testIsChooseRestaurant(){
        $_SESSION["restaurantId"] = 1;
        $this->assertTrue(is_choose_restaurant());
        $_SESSION["restaurantId"] = null;
        $this->assertFalse(is_choose_restaurant());
    }

    public function testStatusUserPage(){
        $not_sign_in = 1;
        $signed_in = 2;
        $choose_restaurant = 3;

        setData::setIdUserAndRestaurant(null, null);
        $this->assertEquals($not_sign_in, status_user_page());

        setData::setIdUserAndRestaurant(1, null);
        $this->assertEquals($signed_in, status_user_page());

        setData::setIdUserAndRestaurant(1, 1);
        $this->assertEquals($choose_restaurant, status_user_page());

        setData::setIdUserAndRestaurant(null, 1);
        $this->assertEquals($not_sign_in, status_user_page());

    }

}


?>