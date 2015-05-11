<?php
require_once('/../functions/data.php');
require_once('/../classes/ConnectionClass.php');

class DataUserTest extends PHPUnit_Framework_TestCase{

    protected $dbc;

    public function DataUserTest(){
        $this->dbc = Dbc::getDbc();
    }


    public function testGetDataUserById(){

        $dataWithId = data_user($this->dbc, 9);

        $this->assertEquals('thg', $dataWithId['first_name']);
        $this->assertEquals('thg', $dataWithId['last_name']);
        $this->assertEquals('thg thg', $dataWithId['fullname']);
        $this->assertEquals('thg, thg', $dataWithId['fullname_reverse']);
        $this->assertEquals('thg@gmail.com', $dataWithId['email']);

    }

    public function testGetDataUserByEmail(){

        $dataWithEmail = data_user($this->dbc, "thg@gmail.com");

        $this->assertEquals('thg', $dataWithEmail['first_name']);
        $this->assertEquals('thg', $dataWithEmail['last_name']);
        $this->assertEquals('thg thg', $dataWithEmail['fullname']);
        $this->assertEquals('thg, thg', $dataWithEmail['fullname_reverse']);
        $this->assertEquals(9, $dataWithEmail['id']);
    }

    public function testGetPostType(){

        $this->assertEquals('page', data_post_type($this->dbc, 1)['name']);
        $this->assertEquals('none-navigation', data_post_type($this->dbc, 2)['name']);
        $this->assertEquals('page', data_post_type($this->dbc, 3)['name']);

    }

    public function testGetTypeOfPage(){
        $this->assertEquals(1, data_post($this->dbc, 'home')['type']);
        $this->assertEquals(2, data_post($this->dbc, 'restaurants')['type']);
        $this->assertEquals(3, data_post($this->dbc, 'staff')['type']);
    }

    public function testGetTypeOfPageWithId(){
        $this->assertEquals(1, data_post($this->dbc, 1)['type']);
        $this->assertEquals(2, data_post($this->dbc, 10)['type']);
        $this->assertEquals(3, data_post($this->dbc, 12)['type']);
    }

    public function testGetDataOfRestaurant(){
        $_SESSION['restaurantId'] = 1;
        $compare = array('id' => 1, 'name' => 'RESTAURANT THG', 'number_of_table' => 100, 'name_boss' => 'thg@gmail.com');
        $this->assertEquals($compare, restaurant_data($this->dbc));
    }

    public function testSettingsForPage(){

        $this->assertEquals('Thg11.0', data_setting_value($this->dbc, 'site-title'));
    }

}

?>