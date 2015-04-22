<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 4/21/2015
 * Time: 10:13 AM
 */
ob_start();

require_once ('D:/Dropbox/XAMPP/THG/functions/user.php');

class Database{
    private $dbc;
    public static function getDatabase(){
        $dbc = mysqli_connect('localhost', 'thg', '123', 'thg') OR die('Count not connect because: '.mysqli_connect_error());
        return $dbc;
    }
}

class User_Test extends PHPUnit_Framework_TestCase{

    public function test_check_user()
    {
        $dbc = Database::getDatabase();
        $_POST = array('email' => 'thg@gmail.com', 'password' => '123');
        $this->assertTrue(check_user($dbc));
    }

    public function test_case_insensitive_username()
    {
        $dbc = Database::getDatabase();
        $_POST = array('email' => 'THG@gmail.com', 'password' => '123');
        $this->assertTrue(check_user($dbc));
    }
    public function test_case_insensitive_domain()
    {
        $dbc = Database::getDatabase();
        $_POST = array('email' => 'THG@GMAIL.COM', 'password' => '123');
        $this->assertTrue(check_user($dbc));
    }

    public function test_case_password_with_post_space()
    {
        $dbc = Database::getDatabase();
        $_POST = array('email' => 'THG@GMAIL.COM', 'password' => '123 ');
        $this->assertFalse(check_user($dbc));
    }

    public function test_case_password_with_pre_space()
    {
        $dbc = Database::getDatabase();
        $_POST = array('email' => 'THG@GMAIL.COM', 'password' => ' 123');
        $this->assertFalse(check_user($dbc));
    }

    public function test_case_password_with_random_space()
    {
        $dbc = Database::getDatabase();
        $_POST = array('email' => 'THG@GMAIL.COM', 'password' => ' 12 3');
        $this->assertFalse(check_user($dbc));
    }
    public function test_case_wrong_password()
    {
        $dbc = Database::getDatabase();
        $_POST = array('email' => 'THG@GMAIL.COM', 'password' => ' 12 34');
        $this->assertFalse(check_user($dbc));
    }
    public function test_case_wrong_username()
    {
        $dbc = Database::getDatabase();
        $_POST = array('email' => 'THG1@GMAIL.COM', 'password' => '123');
        $this->assertFalse(check_user($dbc));
    }

    public function test_signup_notFullFilled_1()
    {
        $dbc = Database::getDatabase();

        $_POST = array('signup_email' => 'thg@gmail.com',
            'signup_password' => '123',
            'signup_retype_password' => '123',
            'first_name' => '',
            'last_name' => '');
        $this->assertEquals('notFullFilled', validSignUp($dbc));
    }

    public function test_signup_notFullFilled_2()
    {
        $dbc = Database::getDatabase();
        $_POST = array('signup_email' => 'thg@gmail.com',
            'signup_password' => '123',
            'signup_retype_password' => '123',
            'first_name' => 'abc',
            'last_name' => '');
        $this->assertEquals('notFullFilled', validSignUp($dbc));
    }

    public function test_signup_notFullFilled_3(){
        $dbc = Database::getDatabase();
        $_POST = array('signup_email' => 'thg@gmail.com',
            'signup_password' => '123',
            'signup_retype_password' => '123',
            'first_name' => '',
            'last_name' => 'abc');
        $this->assertEquals('notFullFilled', validSignUp($dbc));
    }
}
?>