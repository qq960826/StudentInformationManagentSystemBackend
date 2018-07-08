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

        //用户编辑测试搜索
        $test_user_account = array(
            'id' => 7,
            'username' => 'edittest',
            'password' => $this->hash('edittest'),
            'type' => 1
        );
        $test_user_info = array(
            'uid' => 7,
            "name" => "卢宏业",
            'identity' => "370285199711195350",
            'birthday' => "19971119",
            'sex' => false,
            'nativeplace' => "山东青岛",

        );
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $this->addClass();
        $this->addSemester();
        $this->addInstructor();
    }
    public function addClass(){
        $classes=array(
            'id'=>1,
            'name'=>'测试班级1'
        );
        DB::table('Classes')->insert($classes);

        $classes=array(
            'id'=>2,
            'name'=>'测试班级2'
        );
        DB::table('Classes')->insert($classes);

        $classes=array(
            'id'=>3,
            'name'=>'删除班级1'
        );
        DB::table('Classes')->insert($classes);

        $classes=array(
            'id'=>4,
            'name'=>'编辑班级1'
        );
        DB::table('Classes')->insert($classes);

        $classes=array(
            'id'=>5,
            'name'=>'编辑班级2'
        );
        DB::table('Classes')->insert($classes);

        $classes=array(
            'id'=>6,
            'name'=>'查找班级1'
        );
        DB::table('Classes')->insert($classes);

        $classes=array(
            'id'=>7,
            'name'=>'查找班级2'
        );
        DB::table('Classes')->insert($classes);


        $classes=array(
            'id'=>8,
            'name'=>'查找班级3'
        );
        DB::table('Classes')->insert($classes);

        $classes=array(
            'id'=>9,
            'name'=>'查找班级0'
        );
        DB::table('Classes')->insert($classes);
    }

    public function addSemester(){
        $classes=array(
            'id'=>1,
            'name'=>'测试学期1'
        );
        DB::table('Semester')->insert($classes);

        $classes=array(
            'id'=>2,
            'name'=>'测试学期2'
        );
        DB::table('Semester')->insert($classes);

        $classes=array(
            'id'=>3,
            'name'=>'删除学期1'
        );
        DB::table('Semester')->insert($classes);

        $classes=array(
            'id'=>4,
            'name'=>'编辑学期1'
        );
        DB::table('Semester')->insert($classes);

        $classes=array(
            'id'=>5,
            'name'=>'编辑学期2'
        );
        DB::table('Semester')->insert($classes);

        $classes=array(
            'id'=>6,
            'name'=>'查找学期1'
        );
        DB::table('Semester')->insert($classes);

        $classes=array(
            'id'=>7,
            'name'=>'查找学期2'
        );
        DB::table('Semester')->insert($classes);


        $classes=array(
            'id'=>8,
            'name'=>'查找学期3'
        );
        DB::table('Semester')->insert($classes);

        $classes=array(
            'id'=>9,
            'name'=>'查找学期0'
        );
        DB::table('Semester')->insert($classes);
    }
    public function addInstructor(){
        $test_user_account = array(
            'id' => 8,
            'username' => 'instructor1',
            'password' => $this->hash('instructor1'),
            'type' => 2
        );
        $test_user_info = array(
            'uid' => 8,
            "name" => "于宇彤",
            'identity' => "371425199707146471",
            'birthday' => "19970714",
            'sex' => false,
            'nativeplace' => "山东青岛",

        );
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);

        $test_user_account = array(
            'id' => 9,
            'username' => 'instructor2',
            'password' => $this->hash('instructor2'),
            'type' => 2
        );
        $test_user_info = array(
            'uid' => 9,
            "name" => "王艳坤",
            'identity' => "370703199705023512",
            'birthday' => "19970502",
            'sex' => false,
            'nativeplace' => "山东青岛",

        );
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);

        $test_user_account = array(
            'id' => 10,
            'username' => 'instructor3',
            'password' => $this->hash('instructor3'),
            'type' => 2
        );
        $test_user_info = array(
            'uid' => 10,
            "name" => "杨金宝",
            'identity' => "37142519960927607X",
            'birthday' => "19960927",
            'sex' => false,
            'nativeplace' => "山东青岛",

        );
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);

        $test_user_account = array(
            'id' => 11,
            'username' => 'instructor4',
            'password' => $this->hash('instructor4'),
            'type' => 2
        );
        $test_user_info = array(
            'uid' => 11,
            "name" => "张万泉",
            'identity' => "371423199608183418",
            'birthday' => "19960927",
            'sex' => false,
            'nativeplace' => "山东青岛",

        );
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);



        $classes=array(
            'id'=>10,
            'name'=>'辅导员班级1'
        );
        DB::table('Classes')->insert($classes);

        $classes=array(
            'id'=>11,
            'name'=>'辅导员班级2'
        );
        DB::table('Classes')->insert($classes);

        $classes=array(
            'id'=>12,
            'name'=>'辅导员班级3'
        );
        DB::table('Classes')->insert($classes);


        $classes=array(
            'id'=>13,
            'name'=>'辅导员班级4'
        );
        DB::table('Classes')->insert($classes);

        $classes=array(
            'id'=>14,
            'name'=>'辅导员班级5'
        );
        DB::table('Classes')->insert($classes);

        $instructor=array(
            'id'=>1,
            'uid'=>8,
            'classid'=>10
        );
        DB::table('Instructor')->insert($instructor);
        $instructor=array(
            'id'=>2,
            'uid'=>9,
            'classid'=>11
        );
        DB::table('Instructor')->insert($instructor);
        $instructor=array(
            'id'=>3,
            'uid'=>10,
            'classid'=>12
        );
        DB::table('Instructor')->insert($instructor);

        $instructor=array(
            'id'=>4,
            'uid'=>10,
            'classid'=>14
        );
        DB::table('Instructor')->insert($instructor);

        $instructor=array(
            'id'=>5,
            'uid'=>10,
            'classid'=>10
        );
        DB::table('Instructor')->insert($instructor);
    }
}
