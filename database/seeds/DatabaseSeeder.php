<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    protected $salt = "q!@#$%^&132sdhgesdgt34";
    protected $userRepository;

    private function hash($password)
    {
        return md5($password . $this->salt);
    }

    public function run()
    {
        //登录单元测试
        $test_user_account = array(
            'id' => 1,
            'username' => 'admin',
            'password' => $this->hash('admin'),
            'type' => 3
        );
        $test_user_info = array(
            'uid' => 1,
            "name" => "王梓樯",
            'identity' => "430602199608264511",
            'birthday' => "19960826",
            'sex' => true,
            'nativeplace' => "湖南岳阳",

        );
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        //密码修改单元测试
        $test_user_account = array(
            'id' => 2,
            'username' => 'test1',
            'password' => $this->hash('test1test1'),
            'type' => 1
        );
        $test_user_info = array(
            'uid' => 2,
            "name" => "李源波",
            'identity' => "37028419980518041X",
            'birthday' => "19980518",
            'sex' => true,
            'nativeplace' => "湖南岳阳",

        );
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);
        //密码重置单元测试
        $test_user_account = array(
            'id' => 3,
            'username' => 'test2',
            'password' => $this->hash('test2test2'),
            'type' => 1
        );
        $test_user_info = array(
            'uid' => 3,
            "name" => "刘淏",
            'identity' => "370303199809211735",
            'birthday' => "19980921",
            'sex' => true,
            'nativeplace' => "湖南岳阳",

        );
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);

        //登录单元测试
        $test_user_account = array(
            'id' => 4,
            'username' => 'locked',
            'password' => $this->hash('locked'),
            'type' => 1,
            'locked' => true
        );
        $test_user_info = array(
            'uid' => 4,
            "name" => "谢进山",
            'identity' => "370285199803223515",
            'birthday' => "19960826",
            'sex' => true,
            'nativeplace' => "湖南岳阳",

        );
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        //用户删除测试
        $test_user_account = array(
            'id' => 5,
            'username' => 'delete',
            'password' => $this->hash('delete'),
            'type' => 1,
        );
        $test_user_info = array(
            'uid' => 5,
            "name" => "孙浩峰",
            'identity' => "370705199711102033",
            'birthday' => "19971110",
            'sex' => true,
            'nativeplace' => "湖南岳阳",

        );
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        //用户搜索
        $test_user_account = array(
            'id' => 6,
            'username' => 'test0',
            'password' => $this->hash('test2test2'),
            'type' => 1
        );
        $test_user_info = array(
            'uid' => 6,
            "name" => "王姝爽",
            'identity' => "370602199809290023",
            'birthday' => "19980929",
            'sex' => false,
            'nativeplace' => "山东青岛",

        );
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);
    }
}
