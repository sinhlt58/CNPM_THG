<?php
require_once('../functions/data.php');
require_once('../functions/sandbox.php');
require_once('ConnectionClass.php');

class DataUser extends PHPUnit_Framework_TestCase{

    public function testGetDataUser(){

        $dbc = Dbc::getDbc();

        $dataWithId = data_user($dbc, 9);

        $this->assertEquals('admin', $dataWithId['first_name']);
        $this->assertEquals('admin', $dataWithId['last_name']);
        $this->assertEquals('admin admin', $dataWithId['fullname']);
        $this->assertEquals('admin, admin', $dataWithId['fullname_reverse']);
        $this->assertEquals('thg@gmail.com', $dataWithId['email']);

        $dataWithEmail = data_user($dbc, "thg@gmail.com");

        $this->assertEquals('admin', $dataWithEmail['first_name']);
        $this->assertEquals('admin', $dataWithEmail['last_name']);
        $this->assertEquals('admin admin', $dataWithEmail['fullname']);
        $this->assertEquals('admin, admin', $dataWithEmail['fullname_reverse']);
        $this->assertEquals(9, $dataWithEmail['id']);
    }

}

?>