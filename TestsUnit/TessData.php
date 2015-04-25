<?php
require_once('../functions/data.php');
require_once('../functions/sandbox.php');
require_once('ConnectionClass.php');

class DataUserTest extends PHPUnit_Framework_TestCase{

    protected $dbc;

    public function DataUserTest(){
        $this->dbc = Dbc::getDbc();
    }


    public function testGetDataUserById(){

        $dataWithId = data_user($this->dbc, 9);

        $this->assertEquals('admin', $dataWithId['first_name']);
        $this->assertEquals('admin', $dataWithId['last_name']);
        $this->assertEquals('admin admin', $dataWithId['fullname']);
        $this->assertEquals('admin, admin', $dataWithId['fullname_reverse']);
        $this->assertEquals('thg@gmail.com', $dataWithId['email']);


    }

    public function testGetDataUserByEmail(){

        $dataWithEmail = data_user($this->dbc, "thg@gmail.com");

        $this->assertEquals('admin', $dataWithEmail['first_name']);
        $this->assertEquals('admin', $dataWithEmail['last_name']);
        $this->assertEquals('admin admin', $dataWithEmail['fullname']);
        $this->assertEquals('admin, admin', $dataWithEmail['fullname_reverse']);
        $this->assertEquals(9, $dataWithEmail['id']);
    }

    public function testGetPostType(){

        $this->assertEquals('page', data_post_type($this->dbc, 1)['name']);
        $this->assertEquals('none-navigation', data_post_type($this->dbc, 2)['name']);
        $this->assertEquals('page', data_post_type($this->dbc, 3)['name']);

    }

    public function testGetSlugOfPage(){

    }

}

?>