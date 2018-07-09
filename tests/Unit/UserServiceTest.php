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
        $this->artisan('migrate:refresh');
        $this->artisan('db:seed',['--class'=>'SchoolRollAndUserServiceTestSeeder']);
        $this->userservice = $this->app->make('App\Services\UserService');
    }

    public function testBasicTest()
    {
        $this->logintest();
        $this->changepasswordtest();
        $this->resetpasswordtest();
        $this->addusertest();
        $this->deleteusertest();
        $this->viewinfotest();
        $this->usersearchtest();
        $this->updateusertest();
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
        $info['condition']['identity']=array('data' => '430602', 'fuzzy' => true);
        $result = $this->userservice->usersearch($info);
        $this->assertEquals("王梓樯", $result['data'][0]["name"]);//单用户模糊搜索测试

        $info = array();
        $info['condition']['username']=array('data' => 'test', 'fuzzy' => true);
        $result = $this->userservice->usersearch($info);
        $this->assertEquals(3, count($result['data']));//多用户模糊搜索测试

        $info = array();
        $info['condition']['username']=array('data' => 'test', 'fuzzy' => false);
        $result = $this->userservice->usersearch($info);
        $this->assertEquals(0, count($result['data']));//精准搜索测试

        $info = array();
        $info['condition']['username']=array('data' => 'test', 'fuzzy' => true);
        $info['by'] = 'username';
        $info['order'] = 'ASC';
        $result = $this->userservice->usersearch($info);//升序搜索测试
        $this->assertEquals('test0', $result['data'][0]['username']);

        $info = array();
        $info['condition']['username']=array('data' => 'test', 'fuzzy' => true);
        $info['by'] = 'username';
        $info['order'] = 'DESC';
        $result = $this->userservice->usersearch($info);//降序搜索测试
        $this->assertEquals('test2', $result['data'][0]['username']);


        $info = array();
        $info['condition']['username']=array('data' => 'test', 'fuzzy' => true);
        $info['by'] = 'id';
        $info['order'] = 'ASC';
        $result = $this->userservice->usersearch($info);//升序搜索测试
        $this->assertEquals('test1', $result['data'][0]['username']);


        $info = array();
        $info['condition'][] = array();
        $info['by'] = 'id';
        $info['order'] = 'ASC';
        $info['currentpage'] = 1;
        $info['sep'] = 3;

        $result = $this->userservice->usersearch($info);//分页搜索测试
        $this->assertEquals(1, $result['data'][0]['uid']);


        $info = array();
        $info['condition'][] = array();
        $info['by'] = 'id';
        $info['order'] = 'ASC';
        $info['currentpage'] = 2;
        $info['sep'] = 3;

        $result = $this->userservice->usersearch($info);//分页搜索测试
        $this->assertEquals(4, $result['data'][0]['uid']);

    }

    public function updateusertest()
    {
        $this->assertEquals(800, $this->userservice->viewinfo(7));//获取页面成功
        $result = $this->userservice->getdata();
        $this->assertEquals('卢宏业',$result["name"]);


        $info = array();
        $info['name']='卢本伟';
        $this->assertEquals(900, $this->userservice->updateuser(7,$info));//修改成功
        $this->assertEquals(800, $this->userservice->viewinfo(7));//获取页面成功
        $result = $this->userservice->getdata();
        $this->assertEquals('卢本伟',$result["name"]);


        $info = array();
        $info['identity']='370611199812060014';
        $this->assertEquals(900, $this->userservice->updateuser(7,$info));//修改成功
        $this->assertEquals(800, $this->userservice->viewinfo(7));//获取页面成功
        $result = $this->userservice->getdata();
        $this->assertEquals('370611199812060014',$result["identity"]);

        $info = array();
        $info['identity']='370611199812060015';
        $this->assertEquals(902, $this->userservice->updateuser(7,$info));//身份证不合法

        $info = array();
        $info['identity']='430602199608264511';
        $this->assertEquals(901, $this->userservice->updateuser(7,$info));//身份证已注册

        $info = array();
        $info['username']='admin';
        $this->assertEquals(903, $this->userservice->updateuser(7,$info));//用户名已注册
    }

}