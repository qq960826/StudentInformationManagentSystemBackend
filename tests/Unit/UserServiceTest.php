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
    protected $userservice;

    public function setup()
    {
        parent::setUp();
        $this->userservice = $this->app->make('App\Services\UserService');
    }

    public function testBasicTest()
    {
//        $this->logintest();
//        $this->changepasswordtest();
//        $this->resetpasswordtest();
//        $this->addusertest();
//        $this->deleteusertest();
        $this->viewinfotest();
        $this->usersearchtest();
    }

    public function logintest()
    {
        $info = array();
        $this->assertEquals(103, $this->userservice->login($info));

        $info["type"] = 3;
        $info["username"] = "notexist";
        $info["password"] = "notexist";
        $this->assertEquals(101, $this->userservice->login($info));

        $info["type"] = 3;
        $info["username"] = "admin";
        $info["password"] = "admin";
        $this->assertEquals(100, $this->userservice->login($info));

        $info["type"] = 1;
        $info["username"] = "locked";
        $info["password"] = "locked";
        $this->assertEquals(102, $this->userservice->login($info));
    }

    public function changepasswordtest()
    {
        $this->assertEquals(304, $this->userservice->changespassword(1000, "", ""));//空参数测试
        $this->assertEquals(303, $this->userservice->changespassword(1000, "1234", "sfdsfrdhgfdshyrtjhrtejhretjerrtgfvtreyrtjghfertghfdhrtehuyrtjuyt"));//超长测试
        $this->assertEquals(303, $this->userservice->changespassword(1000, "1234", "1234"));//密码过短测试
        $this->assertEquals(302, $this->userservice->changespassword(1000, "1234", "1234214"));//用户名不存在测试
        $this->assertEquals(301, $this->userservice->changespassword(2, "test2test2", "test1test1"));//原始密码错误测试
        $this->assertEquals(300, $this->userservice->changespassword(2, "test1test1", "test2test2"));//密码修改成功测试

        $info["type"] = 1;
        $info["username"] = "test1";
        $info["password"] = "test2test2";
        $this->assertEquals(100, $this->userservice->login($info));//密码修改验证

        $this->assertEquals(300, $this->userservice->changespassword(2, "test2test2", "test1test1"));//密码修改成功测试


    }

    public function resetpasswordtest()
    {
        $this->assertEquals(401, $this->userservice->resetpassword(""));//空参数测试
        $this->assertEquals(402, $this->userservice->resetpassword(10000));//用户不存在测试

        $info["type"] = 1;
        $info["username"] = "test2";
        $info["password"] = "test2test2";
        $this->assertEquals(100, $this->userservice->login($info));//密码重置前验证
        $this->assertEquals(400, $this->userservice->resetpassword(3));//密码重置成功测试

        $info["type"] = 1;
        $info["username"] = "test2";
        $info["password"] = "370303199809211735";
        $this->assertEquals(100, $this->userservice->login($info));//密码重置前后证

        $this->assertEquals(300, $this->userservice->changespassword(3, "370303199809211735", "test2test2"));//密码重置后改回来


    }

    public function addusertest()
    {
        $info = array();
        $this->assertEquals(505, $this->userservice->adduser($info));//参数缺少测试
        $info = array();
        $info['name'] = '测试员';
        $info['username'] = 'admi123n';
        $info['identity'] = '430602199608264512';
        $info['type'] = 1;
        $info['nativeplace'] = "山东青岛";
        $this->assertEquals(503, $this->userservice->adduser($info));//身份证非法测试
        $info = array();
        $info['name'] = '测试员';
        $info['username'] = 'admi123n';
        $info['identity'] = '430602199608264511';
        $info['type'] = 1;
        $info['nativeplace'] = "山东青岛";
        $this->assertEquals(502, $this->userservice->adduser($info));//身份证已注册测试
        $info = array();
        $info['name'] = '测试员';
        $info['username'] = 'admin';
        $info['identity'] = '371302199803120618';
        $info['type'] = 1;
        $info['nativeplace'] = "山东青岛";
        $this->assertEquals(504, $this->userservice->adduser($info));//用户名已注册测试
        $info = array();
        $info['name'] = '测试员';
        $info['username'] = 'admin123';
        $info['identity'] = '371302199803120618';
        $info['type'] = 3;
        $info['nativeplace'] = "山东青岛";
        $this->assertEquals(500, $this->userservice->adduser($info));//注册成功测试
        $info = array();
        $info['username'] = 'admin123';
        $info['password'] = '371302199803120618';
        $info['type'] = 3;
        $this->assertEquals(100, $this->userservice->login($info));//注册成功验证
    }

    public function deleteusertest()
    {
        $this->assertEquals(601, $this->userservice->deleteuser(1000));//删除失败
        $info = array();
        $info['username'] = 'delete';
        $info['password'] = 'delete';
        $info['type'] = 1;
        $this->assertEquals(100, $this->userservice->login($info));//注册成功验证
        $this->assertEquals(600, $this->userservice->deleteuser(5));//删除成功
        $this->assertEquals(601, $this->userservice->deleteuser(5));//删除失败


    }

    public function viewinfotest()
    {
        $this->assertEquals(801, $this->userservice->viewinfo(1000));//获取页面成功
        $this->assertEquals(800, $this->userservice->viewinfo(1));//获取页面失败
        $result = $this->userservice->getdata();
        $this->assertEquals("王梓樯", $result["name"]);
        $this->assertEquals("430602199608264511", $result["identity"]);
        $this->assertEquals("1996-08-26", $result["birthday"]);
        $this->assertEquals(true, $result["sex"]);
        $this->assertEquals("湖南岳阳", $result["nativeplace"]);

        $this->assertEquals(800, $this->userservice->viewinfo(2));//获取页面失败
        $result = $this->userservice->getdata();
        $this->assertEquals("李源波", $result["name"]);


    }

    public function usersearchtest()
    {


        $info = array();
        $info['condition'][] = array('data' => '430602', 'fuzzy' => true,'key'=>'identity');
        $result = $this->userservice->usersearch($info);
        $result = $this->userservice->usersearch($info);

    }

}