<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 4/21/2015
 * Time: 10:13 AM
 */
ob_start();

include_once ('../functions/user.php');

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
        $this->assertTrue(check_user($dbc));
    }

    public function test_case_password_with_pre_space()
    {
        $dbc = Database::getDatabase();
        $_POST = array('email' => 'THG@GMAIL.COM', 'password' => ' 123');
        $this->assertTrue(check_user($dbc));
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

    public function test_signup_no_firstname()
    {
        $dbc = Database::getDatabase();

        $_POST = array('signup_email' => 'thg1@gmail.com',
            'signup_password' => '123',
            'signup_retype_password' => '123',
            'first_name' => '',
            'last_name' => 'abc');
        $this->assertEquals('notFullFilled', validSignUp($dbc));
    }

    public function test_signup_no_lastname()
    {
        $dbc = Database::getDatabase();
        $_POST = array('signup_email' => 'thg1@gmail.com',
            'signup_password' => '123',
            'signup_retype_password' => '123',
            'first_name' => 'abc',
            'last_name' => '');
        $this->assertEquals('notFullFilled', validSignUp($dbc));
    }

   public function test_signup_no_firstname_and_lastname(){
        $dbc = Database::getDatabase();
        $_POST = array('signup_email' => 'thg1@gmail.com',
            'signup_password' => '123',
            'signup_retype_password' => '123',
            'first_name' => '',
            'last_name' => '');
        $this->assertEquals('notFullFilled', validSignUp($dbc));
    }

    public function test_signup_existing_email(){
        $dbc = Database::getDatabase();
        $_POST = array('signup_email' => 'thg@gmail.com',
            'signup_password' => '123',
            'signup_retype_password' => '123',
            'first_name' => 'abc',
            'last_name' => 'abc');
        $this->assertEquals('invalidEmail', validSignUp($dbc));
    }

    public function test_signup_existing_email_case_insensitive(){
        $dbc = Database::getDatabase();
        $_POST = array('signup_email' => 'THG@GMAIL.com',
            'signup_password' => '123',
            'signup_retype_password' => '123',
            'first_name' => 'abc',
            'last_name' => 'abc');
        $this->assertEquals('invalidEmail', validSignUp($dbc));
    }

    public function test_signup_no_password(){
        $dbc = Database::getDatabase();
        $_POST = array('signup_email' => 'THG@GMAIL.com',
            'first_name' => 'abc',
            'last_name' => 'abc');
        $this->assertEquals('notFullFilled', validSignUp($dbc));
    }

    public function test_signup_valid_account(){
        $dbc = Database::getDatabase();
        $_POST = array('signup_email' => 'abc@gmail.com',
            'signup_password' => '123',
            'signup_retype_password' => '123',
            'first_name' => 'abc',
            'last_name' => 'abc');
        $this->assertEquals('true', validSignUp($dbc));
        $query = "DELETE FROM users WHERE email = 'abc@gmail.com'";
        $result = mysqli_query($dbc, $query);
    }
}
?>