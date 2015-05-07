<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 5/7/2015
 * Time: 6:18 PM
 */
require_once('../classes/time_ago.php');

class TimeAgoTest extends PHPUnit_Framework_TestCase{
    public function test_case_normal(){
        $obj = new convertToAgo();
        $result = $obj->convert_datetime('2014-05-07 6:30:00');
        $expectedResult = mktime(6, 30, 00, 05, 07, 2014);
        $this->assertEquals($expectedResult, $result);
    }

    public function test_case_big_second(){
        $obj = new convertToAgo();
        $result = $obj->convert_datetime('2014-05-07 6:30:70');
        $expectedResult = mktime(6, 31, 10, 05, 7, 2014);
        $this->assertEquals($expectedResult, $result);
    }

    public function test_case_big_minute(){
        $obj = new convertToAgo();
        $result = $obj->convert_datetime('2014-05-07 6:70:10');
        $expectedResult = mktime(7, 10, 10, 05, 7, 2014);
        $this->assertEquals($expectedResult, $result);
    }

    public function test_case_big_hour(){
        $obj = new convertToAgo();
        $result = $obj->convert_datetime('2014-05-07 25:10:10');
        $expectedResult = mktime(1, 10, 10, 05, 8, 2014);
        $this->assertEquals($expectedResult, $result);
    }

    public function test_case_big_day(){
        $obj = new convertToAgo();
        $result = $obj->convert_datetime('2014-05-32 1:10:10');
        $expectedResult = mktime(1, 10, 10, 6, 1, 2014);
        $this->assertEquals($expectedResult, $result);
    }

    public function test_case_big_month(){
        $obj = new convertToAgo();
        $result = $obj->convert_datetime('2014-13-1 1:10:10');
        $expectedResult = mktime(1, 10, 10, 1, 1, 2015);
        $this->assertEquals($expectedResult, $result);
    }

    public function test_case_february_in_common_year(){
        $obj = new convertToAgo();
        $result = $obj->convert_datetime('2015-02-29 1:10:10');
        $expectedResult = mktime(1, 10, 10, 3, 1, 2015);
        $this->assertEquals($expectedResult, $result);
    }

    public function test_case_february_in_leap_year(){
        $obj = new convertToAgo();
        $result = $obj->convert_datetime('2014-02-29 1:10:10');
        $expectedResult = mktime(1, 10, 10, 2, 29, 2014);
        $this->assertEquals($expectedResult, $result);
    }

    public function test_make_ago_second(){
        $obj = new convertToAgo();
        $result = $obj->makeAgo(time() - 1);
        $this->assertEquals('1 sec ago', $result);
    }

    public function test_make_ago_seconds(){
        $obj = new convertToAgo();
        $result = $obj->makeAgo(time() - 30);
        $this->assertEquals('30 secs ago', $result);
    }

    public function test_make_ago_minute(){
        $obj = new convertToAgo();
        $result = $obj->makeAgo(time() - 70);
        $this->assertEquals('1 min ago', $result);
    }

    public function test_make_ago_minutes(){
        $obj = new convertToAgo();
        $result = $obj->makeAgo(time() - 170);
        $this->assertEquals('3 mins ago', $result);
    }

    public function test_make_ago_hour(){
        $obj = new convertToAgo();
        $result = $obj->makeAgo(time() - 3601);
        $this->assertEquals('1 hr ago', $result);
    }

    public function test_make_ago_hours(){
        $obj = new convertToAgo();
        $result = $obj->makeAgo(time() - 7201);
        $this->assertEquals('2 hrs ago', $result);
    }

    public function test_make_ago_day(){
        $obj = new convertToAgo();
        $result = $obj->makeAgo(time() - 86401);
        $this->assertEquals('1 day ago', $result);
    }

    public function test_make_ago_days(){
        $obj = new convertToAgo();
        $result = $obj->makeAgo(time() - 200000);
        $this->assertEquals('2 days ago', $result);
    }

    public function test_make_ago_week(){
        $obj = new convertToAgo();
        $result = $obj->makeAgo(time() - 604801);
        $this->assertEquals('1 week ago', $result);
    }

    public function test_make_ago_weeks(){
        $obj = new convertToAgo();
        $result = $obj->makeAgo(time() - 1300000);
        $this->assertEquals('2 weeks ago', $result);
    }
}