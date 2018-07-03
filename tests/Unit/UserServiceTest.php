<?php
/**
 * Created by PhpStorm.
 * User: wzq
 * Date: 2018/7/3
 * Time: 7:37 PM
 */

namespace Tests\Unit;
use Tests\TestCase;
use App\Services\UserService;
class UserServiceTest extends TestCase
{
    protected  $userservice;
    public function setup(){
        parent::setUp();
        $this->userservice=$this->app->make('App\Services\UserService');
    }
    public function testBasicTest(){
        $this->logintest();

    }
    public function logintest(){
        $info=array();
        $this->assertEquals(103,$this->userservice->login($info));

        $info["type"]=3;
        $info["username"]="notexist";
        $info["password"]="notexist";
        $this->assertEquals(101,$this->userservice->login($info));


    }

}