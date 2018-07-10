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
    protected $course = ['企业资源规划', 'Linux程序设计', 'Web应用开发', '大数据与云计算概论', '计算思维', '数据库应用软件', '数据挖掘', '数字图像处理', '移动应用开发', '数值分析', '计算机图形学', '算法设计与分析', '人工智能', '编译原理', '地理信息系统技术与软件', '程序设计基础', '高等数学（A）（2-1）', '线性代数', '概率论与数理统计', '大学英语（3-1）', '虚拟现实技术', '数据库设计', '毕业实习', '编译原理课程设计', '计算机网络', '计算机组成原理', '离散数学', '软件工程', '数据库系统', '数字逻辑', '操作系统', '软件设计与体系结构'];

    private function hash($password)
    {
        return md5($password . $this->salt);
    }

    public function run()
    {
        $this->addUser();
        $this->addClass();
        $this->joinClass();
        $this->addInstructor();
        $this->addSemester();
        $this->addCourse();
        $this->addScore();
        $this->addTestCourse();
    }

    public function addUser()
    {
        $test_user_account = array('id' => 1, 'username' => 'admin', 'password' => $this->hash('admin'), 'type' => 3);
        $test_user_info = array('uid' => 1, 'name' => '黄雨田', 'identity' => '370105199405033348', 'birthday' => '19940503', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 2, 'username' => 'instructor1', 'password' => $this->hash('instructor1'), 'type' => 2);
        $test_user_info = array('uid' => 2, 'name' => '褚宏延', 'identity' => '370811199211223018', 'birthday' => '19921122', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 3, 'username' => 'instructor2', 'password' => $this->hash('instructor2'), 'type' => 2);
        $test_user_info = array('uid' => 3, 'name' => '丁自友', 'identity' => '37132919930824391X', 'birthday' => '19930824', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 4, 'username' => '201201131004', 'password' => $this->hash('370784199403011311'), 'type' => 1);
        $test_user_info = array('uid' => 4, 'name' => '董晨晨', 'identity' => '370784199403011311', 'birthday' => '19940301', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 5, 'username' => '201201131005', 'password' => $this->hash('341182199311133610'), 'type' => 1);
        $test_user_info = array('uid' => 5, 'name' => '董献振', 'identity' => '341182199311133610', 'birthday' => '19931113', 'sex' => True, 'nativeplace' => '安徽');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 6, 'username' => '201201131006', 'password' => $this->hash('371312199401165728'), 'type' => 1);
        $test_user_info = array('uid' => 6, 'name' => '付怀芹', 'identity' => '371312199401165728', 'birthday' => '19940116', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 7, 'username' => '201201131007', 'password' => $this->hash('370811199301010016'), 'type' => 1);
        $test_user_info = array('uid' => 7, 'name' => '高恒', 'identity' => '370811199301010016', 'birthday' => '19930101', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 8, 'username' => '201201131008', 'password' => $this->hash('372925199410016914'), 'type' => 1);
        $test_user_info = array('uid' => 8, 'name' => '郭如新', 'identity' => '372925199410016914', 'birthday' => '19941001', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 9, 'username' => '201201131009', 'password' => $this->hash('372301199602204422'), 'type' => 1);
        $test_user_info = array('uid' => 9, 'name' => '韩宇飞', 'identity' => '372301199602204422', 'birthday' => '19960220', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 10, 'username' => '201201131010', 'password' => $this->hash('370406199207246011'), 'type' => 1);
        $test_user_info = array('uid' => 10, 'name' => '黄德卫', 'identity' => '370406199207246011', 'birthday' => '19920724', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 11, 'username' => '201201131011', 'password' => $this->hash('370724199401115161'), 'type' => 1);
        $test_user_info = array('uid' => 11, 'name' => '蒋雪', 'identity' => '370724199401115161', 'birthday' => '19940111', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 12, 'username' => '201201131012', 'password' => $this->hash('370883199210010928'), 'type' => 1);
        $test_user_info = array('uid' => 12, 'name' => '李令玉', 'identity' => '370883199210010928', 'birthday' => '19921001', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 13, 'username' => '201201131013', 'password' => $this->hash('370282199405090017'), 'type' => 1);
        $test_user_info = array('uid' => 13, 'name' => '刘浩', 'identity' => '370282199405090017', 'birthday' => '19940509', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 14, 'username' => '201201131014', 'password' => $this->hash('370686199307202510'), 'type' => 1);
        $test_user_info = array('uid' => 14, 'name' => '刘均松', 'identity' => '370686199307202510', 'birthday' => '19930720', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 15, 'username' => '201201131015', 'password' => $this->hash('371322199210283468'), 'type' => 1);
        $test_user_info = array('uid' => 15, 'name' => '刘萍', 'identity' => '371322199210283468', 'birthday' => '19921028', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 16, 'username' => '201201131016', 'password' => $this->hash('372901199312062035'), 'type' => 1);
        $test_user_info = array('uid' => 16, 'name' => '刘帅', 'identity' => '372901199312062035', 'birthday' => '19931206', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 17, 'username' => '201201131017', 'password' => $this->hash('370281199209234910'), 'type' => 1);
        $test_user_info = array('uid' => 17, 'name' => '吕腾飞', 'identity' => '370281199209234910', 'birthday' => '19920923', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 18, 'username' => '201201131018', 'password' => $this->hash('371521199402051439'), 'type' => 1);
        $test_user_info = array('uid' => 18, 'name' => '孟凡成', 'identity' => '371521199402051439', 'birthday' => '19940205', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 19, 'username' => '201201131019', 'password' => $this->hash('371524199302063394'), 'type' => 1);
        $test_user_info = array('uid' => 19, 'name' => '孟庆双', 'identity' => '371524199302063394', 'birthday' => '19930206', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 20, 'username' => '201201131020', 'password' => $this->hash('371502199308154811'), 'type' => 1);
        $test_user_info = array('uid' => 20, 'name' => '宓保森', 'identity' => '371502199308154811', 'birthday' => '19930815', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 21, 'username' => '201201131021', 'password' => $this->hash('370781199303294562'), 'type' => 1);
        $test_user_info = array('uid' => 21, 'name' => '潘青', 'identity' => '370781199303294562', 'birthday' => '19930329', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 22, 'username' => '201201131022', 'password' => $this->hash('370323199302281625'), 'type' => 1);
        $test_user_info = array('uid' => 22, 'name' => '唐梦婕', 'identity' => '370323199302281625', 'birthday' => '19930228', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 23, 'username' => '201201131023', 'password' => $this->hash('341125199208078855'), 'type' => 1);
        $test_user_info = array('uid' => 23, 'name' => '王海浪', 'identity' => '341125199208078855', 'birthday' => '19920807', 'sex' => True, 'nativeplace' => '安徽');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 24, 'username' => '201201131025', 'password' => $this->hash('370724199301225179'), 'type' => 1);
        $test_user_info = array('uid' => 24, 'name' => '王鹏', 'identity' => '370724199301225179', 'birthday' => '19930122', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 25, 'username' => '201201131026', 'password' => $this->hash('371311199311092813'), 'type' => 1);
        $test_user_info = array('uid' => 25, 'name' => '王晓强', 'identity' => '371311199311092813', 'birthday' => '19931109', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 26, 'username' => '201201131027', 'password' => $this->hash('370829199304284630'), 'type' => 1);
        $test_user_info = array('uid' => 26, 'name' => '王则宝', 'identity' => '370829199304284630', 'birthday' => '19930428', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 27, 'username' => '201201131028', 'password' => $this->hash('370602199311164310'), 'type' => 1);
        $test_user_info = array('uid' => 27, 'name' => '吴晨', 'identity' => '370602199311164310', 'birthday' => '19931116', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 28, 'username' => '201201131030', 'password' => $this->hash('370105199406101146'), 'type' => 1);
        $test_user_info = array('uid' => 28, 'name' => '闫然', 'identity' => '370105199406101146', 'birthday' => '19940610', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 29, 'username' => '201201131031', 'password' => $this->hash('370322199411010211'), 'type' => 1);
        $test_user_info = array('uid' => 29, 'name' => '杨港', 'identity' => '370322199411010211', 'birthday' => '19941101', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 30, 'username' => '201201131032', 'password' => $this->hash('370681199304104411'), 'type' => 1);
        $test_user_info = array('uid' => 30, 'name' => '姚克锐', 'identity' => '370681199304104411', 'birthday' => '19930410', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 31, 'username' => '201201131033', 'password' => $this->hash('370829199404052036'), 'type' => 1);
        $test_user_info = array('uid' => 31, 'name' => '姚青松', 'identity' => '370829199404052036', 'birthday' => '19940405', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 32, 'username' => '201201131034', 'password' => $this->hash('371482199208206019'), 'type' => 1);
        $test_user_info = array('uid' => 32, 'name' => '袁军', 'identity' => '371482199208206019', 'birthday' => '19920820', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 33, 'username' => '201201131035', 'password' => $this->hash('370921199304155710'), 'type' => 1);
        $test_user_info = array('uid' => 33, 'name' => '苑承功', 'identity' => '370921199304155710', 'birthday' => '19930415', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 34, 'username' => '201201131036', 'password' => $this->hash('37148219950122171X'), 'type' => 1);
        $test_user_info = array('uid' => 34, 'name' => '张德良', 'identity' => '37148219950122171X', 'birthday' => '19950122', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 35, 'username' => '201201131037', 'password' => $this->hash('371581199411252765'), 'type' => 1);
        $test_user_info = array('uid' => 35, 'name' => '张潇', 'identity' => '371581199411252765', 'birthday' => '19941125', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 36, 'username' => '201201131038', 'password' => $this->hash('371521199012262628'), 'type' => 1);
        $test_user_info = array('uid' => 36, 'name' => '赵君静', 'identity' => '371521199012262628', 'birthday' => '19901226', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 37, 'username' => '201101130711', 'password' => $this->hash('370522199107152013'), 'type' => 1);
        $test_user_info = array('uid' => 37, 'name' => '胡鹏辉', 'identity' => '370522199107152013', 'birthday' => '19910715', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 38, 'username' => '201101130735', 'password' => $this->hash('370724199304032057'), 'type' => 1);
        $test_user_info = array('uid' => 38, 'name' => '张凯健', 'identity' => '370724199304032057', 'birthday' => '19930403', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 39, 'username' => '201101130929', 'password' => $this->hash('371326199210221238'), 'type' => 1);
        $test_user_info = array('uid' => 39, 'name' => '武传波', 'identity' => '371326199210221238', 'birthday' => '19921022', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 40, 'username' => '201101130938', 'password' => $this->hash('220802199206071815'), 'type' => 1);
        $test_user_info = array('uid' => 40, 'name' => '赵浩宇', 'identity' => '220802199206071815', 'birthday' => '19920607', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 41, 'username' => '201101130903', 'password' => $this->hash('370682199210094773'), 'type' => 1);
        $test_user_info = array('uid' => 41, 'name' => '迟玉胜', 'identity' => '370682199210094773', 'birthday' => '19921009', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 42, 'username' => '201201130701', 'password' => $this->hash('372324199310091010'), 'type' => 1);
        $test_user_info = array('uid' => 42, 'name' => '鲍峰', 'identity' => '372324199310091010', 'birthday' => '19931009', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 43, 'username' => '201201130702', 'password' => $this->hash('37120319940525032X'), 'type' => 1);
        $test_user_info = array('uid' => 43, 'name' => '陈菡', 'identity' => '37120319940525032X', 'birthday' => '19940525', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 44, 'username' => '201201130703', 'password' => $this->hash('370683199306247646'), 'type' => 1);
        $test_user_info = array('uid' => 44, 'name' => '邓佳', 'identity' => '370683199306247646', 'birthday' => '19930624', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 45, 'username' => '201201130704', 'password' => $this->hash('371526199205105620'), 'type' => 1);
        $test_user_info = array('uid' => 45, 'name' => '董瑶瑶', 'identity' => '371526199205105620', 'birthday' => '19920510', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 46, 'username' => '201201130705', 'password' => $this->hash('370321199404010014'), 'type' => 1);
        $test_user_info = array('uid' => 46, 'name' => '高佳鑫', 'identity' => '370321199404010014', 'birthday' => '19940401', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 47, 'username' => '201201130706', 'password' => $this->hash('371321199302121419'), 'type' => 1);
        $test_user_info = array('uid' => 47, 'name' => '公维来', 'identity' => '371321199302121419', 'birthday' => '19930212', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 48, 'username' => '201201130707', 'password' => $this->hash('370785199212224513'), 'type' => 1);
        $test_user_info = array('uid' => 48, 'name' => '官文卿', 'identity' => '370785199212224513', 'birthday' => '19921222', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 49, 'username' => '201201130708', 'password' => $this->hash('370781199304147513'), 'type' => 1);
        $test_user_info = array('uid' => 49, 'name' => '季文华', 'identity' => '370781199304147513', 'birthday' => '19930414', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 50, 'username' => '201201130709', 'password' => $this->hash('370611199404020013'), 'type' => 1);
        $test_user_info = array('uid' => 50, 'name' => '鞠丰', 'identity' => '370611199404020013', 'birthday' => '19940402', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 51, 'username' => '201201130710', 'password' => $this->hash('370303199311045418'), 'type' => 1);
        $test_user_info = array('uid' => 51, 'name' => '隽奥', 'identity' => '370303199311045418', 'birthday' => '19931104', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 52, 'username' => '201201130711', 'password' => $this->hash('372930199303064452'), 'type' => 1);
        $test_user_info = array('uid' => 52, 'name' => '李光伟', 'identity' => '372930199303064452', 'birthday' => '19930306', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 53, 'username' => '201201130712', 'password' => $this->hash('37080219930908331X'), 'type' => 1);
        $test_user_info = array('uid' => 53, 'name' => '李青超', 'identity' => '37080219930908331X', 'birthday' => '19930908', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 54, 'username' => '201201130713', 'password' => $this->hash('342401199401209024'), 'type' => 1);
        $test_user_info = array('uid' => 54, 'name' => '李文怡', 'identity' => '342401199401209024', 'birthday' => '19940120', 'sex' => False, 'nativeplace' => '安徽');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 55, 'username' => '201201130714', 'password' => $this->hash('371328199202062030'), 'type' => 1);
        $test_user_info = array('uid' => 55, 'name' => '李勇', 'identity' => '371328199202062030', 'birthday' => '19920206', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 56, 'username' => '201201130715', 'password' => $this->hash('37292219950207395X'), 'type' => 1);
        $test_user_info = array('uid' => 56, 'name' => '李宗仁', 'identity' => '37292219950207395X', 'birthday' => '19950207', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 57, 'username' => '201201130716', 'password' => $this->hash('370883199405226518'), 'type' => 1);
        $test_user_info = array('uid' => 57, 'name' => '刘现磊', 'identity' => '370883199405226518', 'birthday' => '19940522', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 58, 'username' => '201201130717', 'password' => $this->hash('370302199308182511'), 'type' => 1);
        $test_user_info = array('uid' => 58, 'name' => '吕自豪', 'identity' => '370302199308182511', 'birthday' => '19930818', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 59, 'username' => '201201130718', 'password' => $this->hash('370725199407102181'), 'type' => 1);
        $test_user_info = array('uid' => 59, 'name' => '马洋', 'identity' => '370725199407102181', 'birthday' => '19940710', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 60, 'username' => '201201130719', 'password' => $this->hash('370684199311260526'), 'type' => 1);
        $test_user_info = array('uid' => 60, 'name' => '曲绍宁', 'identity' => '370684199311260526', 'birthday' => '19931126', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 61, 'username' => '201201130720', 'password' => $this->hash('37078319930714613X'), 'type' => 1);
        $test_user_info = array('uid' => 61, 'name' => '任方龙', 'identity' => '37078319930714613X', 'birthday' => '19930714', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 62, 'username' => '201201130721', 'password' => $this->hash('370830199205027239'), 'type' => 1);
        $test_user_info = array('uid' => 62, 'name' => '荣维同', 'identity' => '370830199205027239', 'birthday' => '19920502', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 63, 'username' => '201201130722', 'password' => $this->hash('370883199102053015'), 'type' => 1);
        $test_user_info = array('uid' => 63, 'name' => '史祥伟', 'identity' => '370883199102053015', 'birthday' => '19910205', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 64, 'username' => '201201130723', 'password' => $this->hash('370103199404017511'), 'type' => 1);
        $test_user_info = array('uid' => 64, 'name' => '宋玉', 'identity' => '370103199404017511', 'birthday' => '19940401', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 65, 'username' => '201201130724', 'password' => $this->hash('371321199206213911'), 'type' => 1);
        $test_user_info = array('uid' => 65, 'name' => '苏庆慧', 'identity' => '371321199206213911', 'birthday' => '19920621', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 66, 'username' => '201201130725', 'password' => $this->hash('370686199203287441'), 'type' => 1);
        $test_user_info = array('uid' => 66, 'name' => '隋佳利', 'identity' => '370686199203287441', 'birthday' => '19920328', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 67, 'username' => '201201130726', 'password' => $this->hash('370481199304120939'), 'type' => 1);
        $test_user_info = array('uid' => 67, 'name' => '孙向阳', 'identity' => '370481199304120939', 'birthday' => '19930412', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 68, 'username' => '201201130727', 'password' => $this->hash('370983199410200027'), 'type' => 1);
        $test_user_info = array('uid' => 68, 'name' => '王俊筱', 'identity' => '370983199410200027', 'birthday' => '19941020', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 69, 'username' => '201201130728', 'password' => $this->hash('37292519930830491X'), 'type' => 1);
        $test_user_info = array('uid' => 69, 'name' => '魏振乾', 'identity' => '37292519930830491X', 'birthday' => '19930830', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 70, 'username' => '201201130729', 'password' => $this->hash('37293019930125632X'), 'type' => 1);
        $test_user_info = array('uid' => 70, 'name' => '吴雪丹', 'identity' => '37293019930125632X', 'birthday' => '19930125', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 71, 'username' => '201201130730', 'password' => $this->hash('371102199303075039'), 'type' => 1);
        $test_user_info = array('uid' => 71, 'name' => '辛本武', 'identity' => '371102199303075039', 'birthday' => '19930307', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 72, 'username' => '201201130731', 'password' => $this->hash('372924199512030040'), 'type' => 1);
        $test_user_info = array('uid' => 72, 'name' => '徐璞', 'identity' => '372924199512030040', 'birthday' => '19951203', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 73, 'username' => '201201130732', 'password' => $this->hash('371327199306026230'), 'type' => 1);
        $test_user_info = array('uid' => 73, 'name' => '杨久龙', 'identity' => '371327199306026230', 'birthday' => '19930602', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 74, 'username' => '201201130733', 'password' => $this->hash('620522199308011120'), 'type' => 1);
        $test_user_info = array('uid' => 74, 'name' => '杨媛媛', 'identity' => '620522199308011120', 'birthday' => '19930801', 'sex' => False, 'nativeplace' => '甘肃');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 75, 'username' => '201201130734', 'password' => $this->hash('371083199312090524'), 'type' => 1);
        $test_user_info = array('uid' => 75, 'name' => '于露', 'identity' => '371083199312090524', 'birthday' => '19931209', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 76, 'username' => '201201130735', 'password' => $this->hash('371526199203250445'), 'type' => 1);
        $test_user_info = array('uid' => 76, 'name' => '于妍妍', 'identity' => '371526199203250445', 'birthday' => '19920325', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 77, 'username' => '201201130736', 'password' => $this->hash('370611199310020717'), 'type' => 1);
        $test_user_info = array('uid' => 77, 'name' => '臧晓坤', 'identity' => '370611199310020717', 'birthday' => '19931002', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 78, 'username' => '201201130738', 'password' => $this->hash('130133199108242734'), 'type' => 1);
        $test_user_info = array('uid' => 78, 'name' => '张伟东', 'identity' => '130133199108242734', 'birthday' => '19910824', 'sex' => True, 'nativeplace' => '河北');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 79, 'username' => '201201130739', 'password' => $this->hash('370102199407123313'), 'type' => 1);
        $test_user_info = array('uid' => 79, 'name' => '张毅仁', 'identity' => '370102199407123313', 'birthday' => '19940712', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 80, 'username' => '201201130740', 'password' => $this->hash('372930199206012693'), 'type' => 1);
        $test_user_info = array('uid' => 80, 'name' => '祝志', 'identity' => '372930199206012693', 'birthday' => '19920601', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 81, 'username' => '201201130801', 'password' => $this->hash('371526199303213211'), 'type' => 1);
        $test_user_info = array('uid' => 81, 'name' => '边加超', 'identity' => '371526199303213211', 'birthday' => '19930321', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 82, 'username' => '201201130802', 'password' => $this->hash('371312199303105326'), 'type' => 1);
        $test_user_info = array('uid' => 82, 'name' => '曹国娇', 'identity' => '371312199303105326', 'birthday' => '19930310', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 83, 'username' => '201201130803', 'password' => $this->hash('370982199310114969'), 'type' => 1);
        $test_user_info = array('uid' => 83, 'name' => '曹青', 'identity' => '370982199310114969', 'birthday' => '19931011', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 84, 'username' => '201201130804', 'password' => $this->hash('371425199204022872'), 'type' => 1);
        $test_user_info = array('uid' => 84, 'name' => '陈强', 'identity' => '371425199204022872', 'birthday' => '19920402', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 85, 'username' => '201201130805', 'password' => $this->hash('370304199404032524'), 'type' => 1);
        $test_user_info = array('uid' => 85, 'name' => '董方雨', 'identity' => '370304199404032524', 'birthday' => '19940403', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 86, 'username' => '201201130806', 'password' => $this->hash('37142119940929549X'), 'type' => 1);
        $test_user_info = array('uid' => 86, 'name' => '付占明', 'identity' => '37142119940929549X', 'birthday' => '19940929', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 87, 'username' => '201201130807', 'password' => $this->hash('372901199302093129'), 'type' => 1);
        $test_user_info = array('uid' => 87, 'name' => '郭春娥', 'identity' => '372901199302093129', 'birthday' => '19930209', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 88, 'username' => '201201130808', 'password' => $this->hash('370285199208173517'), 'type' => 1);
        $test_user_info = array('uid' => 88, 'name' => '郭晓东', 'identity' => '370285199208173517', 'birthday' => '19920817', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 89, 'username' => '201201130809', 'password' => $this->hash('370102199407112112'), 'type' => 1);
        $test_user_info = array('uid' => 89, 'name' => '黄珂', 'identity' => '370102199407112112', 'birthday' => '19940711', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 90, 'username' => '201201130810', 'password' => $this->hash('342901199303211216'), 'type' => 1);
        $test_user_info = array('uid' => 90, 'name' => '黄宽宇', 'identity' => '342901199303211216', 'birthday' => '19930321', 'sex' => True, 'nativeplace' => '安徽');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 91, 'username' => '201201130811', 'password' => $this->hash('370281199210221834'), 'type' => 1);
        $test_user_info = array('uid' => 91, 'name' => '姜桂希', 'identity' => '370281199210221834', 'birthday' => '19921022', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 92, 'username' => '201201130812', 'password' => $this->hash('37112119940519277X'), 'type' => 1);
        $test_user_info = array('uid' => 92, 'name' => '靳世旭', 'identity' => '37112119940519277X', 'birthday' => '19940519', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 93, 'username' => '201201130813', 'password' => $this->hash('372301199302180318'), 'type' => 1);
        $test_user_info = array('uid' => 93, 'name' => '李滨', 'identity' => '372301199302180318', 'birthday' => '19930218', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 94, 'username' => '201201130814', 'password' => $this->hash('370405199301311012'), 'type' => 1);
        $test_user_info = array('uid' => 94, 'name' => '李家振', 'identity' => '370405199301311012', 'birthday' => '19930131', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 95, 'username' => '201201130815', 'password' => $this->hash('23022919931103031X'), 'type' => 1);
        $test_user_info = array('uid' => 95, 'name' => '李业飞', 'identity' => '23022919931103031X', 'birthday' => '19931103', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 96, 'username' => '201201130816', 'password' => $this->hash('371081199403014022'), 'type' => 1);
        $test_user_info = array('uid' => 96, 'name' => '刘恬静', 'identity' => '371081199403014022', 'birthday' => '19940301', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 97, 'username' => '201201130817', 'password' => $this->hash('370282199311111534'), 'type' => 1);
        $test_user_info = array('uid' => 97, 'name' => '卢飞', 'identity' => '370282199311111534', 'birthday' => '19931111', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 98, 'username' => '201201130818', 'password' => $this->hash('370786199402143630'), 'type' => 1);
        $test_user_info = array('uid' => 98, 'name' => '马增科', 'identity' => '370786199402143630', 'birthday' => '19940214', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 99, 'username' => '201201130819', 'password' => $this->hash('371522199404176020'), 'type' => 1);
        $test_user_info = array('uid' => 99, 'name' => '毛丽杰', 'identity' => '371522199404176020', 'birthday' => '19940417', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 100, 'username' => '201201130820', 'password' => $this->hash('371324199005256148'), 'type' => 1);
        $test_user_info = array('uid' => 100, 'name' => '孟令美', 'identity' => '371324199005256148', 'birthday' => '19900525', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 101, 'username' => '201201130821', 'password' => $this->hash('371122199506156811'), 'type' => 1);
        $test_user_info = array('uid' => 101, 'name' => '宋维晓', 'identity' => '371122199506156811', 'birthday' => '19950615', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 102, 'username' => '201201130822', 'password' => $this->hash('372330199306245854'), 'type' => 1);
        $test_user_info = array('uid' => 102, 'name' => '孙国荣', 'identity' => '372330199306245854', 'birthday' => '19930624', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 103, 'username' => '201201130823', 'password' => $this->hash('370282199312025312'), 'type' => 1);
        $test_user_info = array('uid' => 103, 'name' => '孙坤', 'identity' => '370282199312025312', 'birthday' => '19931202', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 104, 'username' => '201201130824', 'password' => $this->hash('371521199403130016'), 'type' => 1);
        $test_user_info = array('uid' => 104, 'name' => '唐哲', 'identity' => '371521199403130016', 'birthday' => '19940313', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 105, 'username' => '201201130825', 'password' => $this->hash('430682199411233617'), 'type' => 1);
        $test_user_info = array('uid' => 105, 'name' => '王安', 'identity' => '430682199411233617', 'birthday' => '19941123', 'sex' => True, 'nativeplace' => '湖南');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 106, 'username' => '201201130826', 'password' => $this->hash('371422199111194019'), 'type' => 1);
        $test_user_info = array('uid' => 106, 'name' => '王国太', 'identity' => '371422199111194019', 'birthday' => '19911119', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 107, 'username' => '201201130827', 'password' => $this->hash('371325199403083023'), 'type' => 1);
        $test_user_info = array('uid' => 107, 'name' => '王海荣', 'identity' => '371325199403083023', 'birthday' => '19940308', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 108, 'username' => '201201130828', 'password' => $this->hash('370882199404286125'), 'type' => 1);
        $test_user_info = array('uid' => 108, 'name' => '王雅欣', 'identity' => '370882199404286125', 'birthday' => '19940428', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 109, 'username' => '201201130829', 'password' => $this->hash('372926199409028658'), 'type' => 1);
        $test_user_info = array('uid' => 109, 'name' => '魏玉聪', 'identity' => '372926199409028658', 'birthday' => '19940902', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 110, 'username' => '201201130830', 'password' => $this->hash('372928199507148314'), 'type' => 1);
        $test_user_info = array('uid' => 110, 'name' => '徐龙轩', 'identity' => '372928199507148314', 'birthday' => '19950714', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 111, 'username' => '201201130831', 'password' => $this->hash('372926198910252229'), 'type' => 1);
        $test_user_info = array('uid' => 111, 'name' => '袁红', 'identity' => '372926198910252229', 'birthday' => '19891025', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 112, 'username' => '201201130832', 'password' => $this->hash('370782199406022419'), 'type' => 1);
        $test_user_info = array('uid' => 112, 'name' => '臧传起', 'identity' => '370782199406022419', 'birthday' => '19940602', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 113, 'username' => '201201130833', 'password' => $this->hash('370285199303236520'), 'type' => 1);
        $test_user_info = array('uid' => 113, 'name' => '张丽萍', 'identity' => '370285199303236520', 'birthday' => '19930323', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 114, 'username' => '201201130834', 'password' => $this->hash('371422199412291314'), 'type' => 1);
        $test_user_info = array('uid' => 114, 'name' => '张凌宇', 'identity' => '371422199412291314', 'birthday' => '19941229', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 115, 'username' => '201201130835', 'password' => $this->hash('371323199309050548'), 'type' => 1);
        $test_user_info = array('uid' => 115, 'name' => '赵娜', 'identity' => '371323199309050548', 'birthday' => '19930905', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 116, 'username' => '201201130837', 'password' => $this->hash('370802199404052714'), 'type' => 1);
        $test_user_info = array('uid' => 116, 'name' => '郑轲', 'identity' => '370802199404052714', 'birthday' => '19940405', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 117, 'username' => '201201130838', 'password' => $this->hash('370203199309115549'), 'type' => 1);
        $test_user_info = array('uid' => 117, 'name' => '郑越', 'identity' => '370203199309115549', 'birthday' => '19930911', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 118, 'username' => '201201130839', 'password' => $this->hash('370406199301160011'), 'type' => 1);
        $test_user_info = array('uid' => 118, 'name' => '朱超', 'identity' => '370406199301160011', 'birthday' => '19930116', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 119, 'username' => '201201130901', 'password' => $this->hash('370126199310233111'), 'type' => 1);
        $test_user_info = array('uid' => 119, 'name' => '卜香国', 'identity' => '370126199310233111', 'birthday' => '19931023', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 120, 'username' => '201201130902', 'password' => $this->hash('371525199206036317'), 'type' => 1);
        $test_user_info = array('uid' => 120, 'name' => '陈志伟', 'identity' => '371525199206036317', 'birthday' => '19920603', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 121, 'username' => '201201130903', 'password' => $this->hash('371526199306094414'), 'type' => 1);
        $test_user_info = array('uid' => 121, 'name' => '陈忠兴', 'identity' => '371526199306094414', 'birthday' => '19930609', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 122, 'username' => '201201130904', 'password' => $this->hash('370214199306234816'), 'type' => 1);
        $test_user_info = array('uid' => 122, 'name' => '程凯', 'identity' => '370214199306234816', 'birthday' => '19930623', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 123, 'username' => '201201130905', 'password' => $this->hash('372930199208041180'), 'type' => 1);
        $test_user_info = array('uid' => 123, 'name' => '代瑞红', 'identity' => '372930199208041180', 'birthday' => '19920804', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 124, 'username' => '201201130906', 'password' => $this->hash('372324199302130323'), 'type' => 1);
        $test_user_info = array('uid' => 124, 'name' => '代文双', 'identity' => '372324199302130323', 'birthday' => '19930213', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 125, 'username' => '201201130907', 'password' => $this->hash('370284199402030011'), 'type' => 1);
        $test_user_info = array('uid' => 125, 'name' => '丁俊杰', 'identity' => '370284199402030011', 'birthday' => '19940203', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 126, 'username' => '201201130908', 'password' => $this->hash('371122199202177218'), 'type' => 1);
        $test_user_info = array('uid' => 126, 'name' => '段会斌', 'identity' => '371122199202177218', 'birthday' => '19920217', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 127, 'username' => '201201130910', 'password' => $this->hash('37292819930801054X'), 'type' => 1);
        $test_user_info = array('uid' => 127, 'name' => '葛倩', 'identity' => '37292819930801054X', 'birthday' => '19930801', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 128, 'username' => '201201130911', 'password' => $this->hash('370911199111235623'), 'type' => 1);
        $test_user_info = array('uid' => 128, 'name' => '公瑞芝', 'identity' => '370911199111235623', 'birthday' => '19911123', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 129, 'username' => '201201130912', 'password' => $this->hash('37142819931229302X'), 'type' => 1);
        $test_user_info = array('uid' => 129, 'name' => '宫亚楠', 'identity' => '37142819931229302X', 'birthday' => '19931229', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 130, 'username' => '201201130913', 'password' => $this->hash('372321199311171312'), 'type' => 1);
        $test_user_info = array('uid' => 130, 'name' => '郭栋', 'identity' => '372321199311171312', 'birthday' => '19931117', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 131, 'username' => '201201130914', 'password' => $this->hash('370283199311012639'), 'type' => 1);
        $test_user_info = array('uid' => 131, 'name' => '韩飞龙', 'identity' => '370283199311012639', 'birthday' => '19931101', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 132, 'username' => '201201130915', 'password' => $this->hash('130528199207167216'), 'type' => 1);
        $test_user_info = array('uid' => 132, 'name' => '侯东飞', 'identity' => '130528199207167216', 'birthday' => '19920716', 'sex' => True, 'nativeplace' => '河北');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 133, 'username' => '201201130916', 'password' => $this->hash('370181199210240319'), 'type' => 1);
        $test_user_info = array('uid' => 133, 'name' => '侯肖', 'identity' => '370181199210240319', 'birthday' => '19921024', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 134, 'username' => '201201130917', 'password' => $this->hash('370403199402180258'), 'type' => 1);
        $test_user_info = array('uid' => 134, 'name' => '黄政', 'identity' => '370403199402180258', 'birthday' => '19940218', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 135, 'username' => '201201130918', 'password' => $this->hash('622827199304075119'), 'type' => 1);
        $test_user_info = array('uid' => 135, 'name' => '贾培梁', 'identity' => '622827199304075119', 'birthday' => '19930407', 'sex' => True, 'nativeplace' => '甘肃');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 136, 'username' => '201201130919', 'password' => $this->hash('370982199211055270'), 'type' => 1);
        $test_user_info = array('uid' => 136, 'name' => '李强', 'identity' => '370982199211055270', 'birthday' => '19921105', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 137, 'username' => '201201130920', 'password' => $this->hash('370982199307172471'), 'type' => 1);
        $test_user_info = array('uid' => 137, 'name' => '李涛', 'identity' => '370982199307172471', 'birthday' => '19930717', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 138, 'username' => '201201130921', 'password' => $this->hash('370902199310294814'), 'type' => 1);
        $test_user_info = array('uid' => 138, 'name' => '刘峰', 'identity' => '370902199310294814', 'birthday' => '19931029', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 139, 'username' => '201201130922', 'password' => $this->hash('37028519921111231X'), 'type' => 1);
        $test_user_info = array('uid' => 139, 'name' => '刘杰', 'identity' => '37028519921111231X', 'birthday' => '19921111', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 140, 'username' => '201201130923', 'password' => $this->hash('371402199410260316'), 'type' => 1);
        $test_user_info = array('uid' => 140, 'name' => '刘世鑫', 'identity' => '371402199410260316', 'birthday' => '19941026', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 141, 'username' => '201201130924', 'password' => $this->hash('370321199310200706'), 'type' => 1);
        $test_user_info = array('uid' => 141, 'name' => '刘薇', 'identity' => '370321199310200706', 'birthday' => '19931020', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 142, 'username' => '201201130925', 'password' => $this->hash('371525199201093320'), 'type' => 1);
        $test_user_info = array('uid' => 142, 'name' => '刘晓敏', 'identity' => '371525199201093320', 'birthday' => '19920109', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 143, 'username' => '201201130926', 'password' => $this->hash('370725199403250996'), 'type' => 1);
        $test_user_info = array('uid' => 143, 'name' => '刘志鹏', 'identity' => '370725199403250996', 'birthday' => '19940325', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 144, 'username' => '201201130927', 'password' => $this->hash('371122199406290618'), 'type' => 1);
        $test_user_info = array('uid' => 144, 'name' => '宋时传', 'identity' => '371122199406290618', 'birthday' => '19940629', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 145, 'username' => '201201130928', 'password' => $this->hash('370725199402103273'), 'type' => 1);
        $test_user_info = array('uid' => 145, 'name' => '王浩', 'identity' => '370725199402103273', 'birthday' => '19940210', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 146, 'username' => '201201130929', 'password' => $this->hash('371081199403147327'), 'type' => 1);
        $test_user_info = array('uid' => 146, 'name' => '王慧鑫', 'identity' => '371081199403147327', 'birthday' => '19940314', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 147, 'username' => '201201130930', 'password' => $this->hash('370611199301312320'), 'type' => 1);
        $test_user_info = array('uid' => 147, 'name' => '王乔木', 'identity' => '370611199301312320', 'birthday' => '19930131', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 148, 'username' => '201201130931', 'password' => $this->hash('370682199312051627'), 'type' => 1);
        $test_user_info = array('uid' => 148, 'name' => '徐程琳', 'identity' => '370682199312051627', 'birthday' => '19931205', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 149, 'username' => '201201130932', 'password' => $this->hash('372926199402280076'), 'type' => 1);
        $test_user_info = array('uid' => 149, 'name' => '于晨', 'identity' => '372926199402280076', 'birthday' => '19940228', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 150, 'username' => '201201130934', 'password' => $this->hash('37032119940620332X'), 'type' => 1);
        $test_user_info = array('uid' => 150, 'name' => '于子琦', 'identity' => '37032119940620332X', 'birthday' => '19940620', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 151, 'username' => '201201130935', 'password' => $this->hash('372901199501085615'), 'type' => 1);
        $test_user_info = array('uid' => 151, 'name' => '张侃', 'identity' => '372901199501085615', 'birthday' => '19950108', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 152, 'username' => '201201130936', 'password' => $this->hash('37078519920503202X'), 'type' => 1);
        $test_user_info = array('uid' => 152, 'name' => '张馨月', 'identity' => '37078519920503202X', 'birthday' => '19920503', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 153, 'username' => '201201130937', 'password' => $this->hash('370323199404031838'), 'type' => 1);
        $test_user_info = array('uid' => 153, 'name' => '张宗霖', 'identity' => '370323199404031838', 'birthday' => '19940403', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 154, 'username' => '201201130938', 'password' => $this->hash('37152219931108571X'), 'type' => 1);
        $test_user_info = array('uid' => 154, 'name' => '种崇秀', 'identity' => '37152219931108571X', 'birthday' => '19931108', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 155, 'username' => '201201130939', 'password' => $this->hash('370684199312146135'), 'type' => 1);
        $test_user_info = array('uid' => 155, 'name' => '周怡凯', 'identity' => '370684199312146135', 'birthday' => '19931214', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 156, 'username' => '201101130214', 'password' => $this->hash('130184198703156019'), 'type' => 1);
        $test_user_info = array('uid' => 156, 'name' => '林星志', 'identity' => '130184198703156019', 'birthday' => '19870315', 'sex' => True, 'nativeplace' => '河北');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 157, 'username' => '201101130234', 'password' => $this->hash('370284199112103139'), 'type' => 1);
        $test_user_info = array('uid' => 157, 'name' => '徐佳超', 'identity' => '370284199112103139', 'birthday' => '19911210', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 158, 'username' => '201101130308', 'password' => $this->hash('371425199009012871'), 'type' => 1);
        $test_user_info = array('uid' => 158, 'name' => '胡明杰', 'identity' => '371425199009012871', 'birthday' => '19900901', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 159, 'username' => '201201130101', 'password' => $this->hash('372325199209132830'), 'type' => 1);
        $test_user_info = array('uid' => 159, 'name' => '蔡晓宇', 'identity' => '372325199209132830', 'birthday' => '19920913', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 160, 'username' => '201201130102', 'password' => $this->hash('371083199212174026'), 'type' => 1);
        $test_user_info = array('uid' => 160, 'name' => '曹冰玉', 'identity' => '371083199212174026', 'birthday' => '19921217', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 161, 'username' => '201201130103', 'password' => $this->hash('362526199403281528'), 'type' => 1);
        $test_user_info = array('uid' => 161, 'name' => '陈梦瑶', 'identity' => '362526199403281528', 'birthday' => '19940328', 'sex' => False, 'nativeplace' => '江西');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 162, 'username' => '201201130104', 'password' => $this->hash('371581199304280875'), 'type' => 1);
        $test_user_info = array('uid' => 162, 'name' => '仇冠豪', 'identity' => '371581199304280875', 'birthday' => '19930428', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 163, 'username' => '201201130105', 'password' => $this->hash('371526199210031638'), 'type' => 1);
        $test_user_info = array('uid' => 163, 'name' => '窦金涛', 'identity' => '371526199210031638', 'birthday' => '19921003', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 164, 'username' => '201201130106', 'password' => $this->hash('370782199404145220'), 'type' => 1);
        $test_user_info = array('uid' => 164, 'name' => '杜松洁', 'identity' => '370782199404145220', 'birthday' => '19940414', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 165, 'username' => '201201130107', 'password' => $this->hash('371525199210266027'), 'type' => 1);
        $test_user_info = array('uid' => 165, 'name' => '范西凤', 'identity' => '371525199210266027', 'birthday' => '19921026', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 166, 'username' => '201201130108', 'password' => $this->hash('371203199205250325'), 'type' => 1);
        $test_user_info = array('uid' => 166, 'name' => '郭燕喜', 'identity' => '371203199205250325', 'birthday' => '19920525', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 167, 'username' => '201201130109', 'password' => $this->hash('372923199211263821'), 'type' => 1);
        $test_user_info = array('uid' => 167, 'name' => '何亚楠', 'identity' => '372923199211263821', 'birthday' => '19921126', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 168, 'username' => '201201130110', 'password' => $this->hash('370687199206265498'), 'type' => 1);
        $test_user_info = array('uid' => 168, 'name' => '纪浩', 'identity' => '370687199206265498', 'birthday' => '19920626', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 169, 'username' => '201201130112', 'password' => $this->hash('372926199207293875'), 'type' => 1);
        $test_user_info = array('uid' => 169, 'name' => '阚景林', 'identity' => '372926199207293875', 'birthday' => '19920729', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 170, 'username' => '201201130113', 'password' => $this->hash('370481199111100317'), 'type' => 1);
        $test_user_info = array('uid' => 170, 'name' => '孔金刚', 'identity' => '370481199111100317', 'birthday' => '19911110', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 171, 'username' => '201201130114', 'password' => $this->hash('372925199306286359'), 'type' => 1);
        $test_user_info = array('uid' => 171, 'name' => '李文豪', 'identity' => '372925199306286359', 'birthday' => '19930628', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 172, 'username' => '201201130115', 'password' => $this->hash('371324199205229435'), 'type' => 1);
        $test_user_info = array('uid' => 172, 'name' => '李夏雷', 'identity' => '371324199205229435', 'birthday' => '19920522', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 173, 'username' => '201201130116', 'password' => $this->hash('371526199305082825'), 'type' => 1);
        $test_user_info = array('uid' => 173, 'name' => '李燕', 'identity' => '371526199305082825', 'birthday' => '19930508', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 174, 'username' => '201201130117', 'password' => $this->hash('410328199203109058'), 'type' => 1);
        $test_user_info = array('uid' => 174, 'name' => '李志涛', 'identity' => '410328199203109058', 'birthday' => '19920310', 'sex' => True, 'nativeplace' => '河南');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 175, 'username' => '201201130118', 'password' => $this->hash('372922199210084454'), 'type' => 1);
        $test_user_info = array('uid' => 175, 'name' => '刘兆鹏', 'identity' => '372922199210084454', 'birthday' => '19921008', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 176, 'username' => '201201130119', 'password' => $this->hash('320283199312192679'), 'type' => 1);
        $test_user_info = array('uid' => 176, 'name' => '陆勇', 'identity' => '320283199312192679', 'birthday' => '19931219', 'sex' => True, 'nativeplace' => '江苏');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 177, 'username' => '201201130120', 'password' => $this->hash('372929199210195116'), 'type' => 1);
        $test_user_info = array('uid' => 177, 'name' => '马传朋', 'identity' => '372929199210195116', 'birthday' => '19921019', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 178, 'username' => '201201130121', 'password' => $this->hash('370725199311282173'), 'type' => 1);
        $test_user_info = array('uid' => 178, 'name' => '齐超', 'identity' => '370725199311282173', 'birthday' => '19931128', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 179, 'username' => '201201130122', 'password' => $this->hash('37021219930508135X'), 'type' => 1);
        $test_user_info = array('uid' => 179, 'name' => '曲兆奇', 'identity' => '37021219930508135X', 'birthday' => '19930508', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 180, 'username' => '201201130123', 'password' => $this->hash('370783199308243572'), 'type' => 1);
        $test_user_info = array('uid' => 180, 'name' => '孙溢华', 'identity' => '370783199308243572', 'birthday' => '19930824', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 181, 'username' => '201201130124', 'password' => $this->hash('37232819931119122X'), 'type' => 1);
        $test_user_info = array('uid' => 181, 'name' => '王畅', 'identity' => '37232819931119122X', 'birthday' => '19931119', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 182, 'username' => '201201130125', 'password' => $this->hash('370983199409204231'), 'type' => 1);
        $test_user_info = array('uid' => 182, 'name' => '王方俊', 'identity' => '370983199409204231', 'birthday' => '19940920', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 183, 'username' => '201201130127', 'password' => $this->hash('370784199311161312'), 'type' => 1);
        $test_user_info = array('uid' => 183, 'name' => '王晓伟', 'identity' => '370784199311161312', 'birthday' => '19931116', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 184, 'username' => '201201130128', 'password' => $this->hash('370782199311270858'), 'type' => 1);
        $test_user_info = array('uid' => 184, 'name' => '王叶平', 'identity' => '370782199311270858', 'birthday' => '19931127', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 185, 'username' => '201201130129', 'password' => $this->hash('371121199209114512'), 'type' => 1);
        $test_user_info = array('uid' => 185, 'name' => '王章浩', 'identity' => '371121199209114512', 'birthday' => '19920911', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 186, 'username' => '201201130130', 'password' => $this->hash('371428199405153528'), 'type' => 1);
        $test_user_info = array('uid' => 186, 'name' => '吴玉梅', 'identity' => '371428199405153528', 'birthday' => '19940515', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 187, 'username' => '201201130131', 'password' => $this->hash('371122199312280056'), 'type' => 1);
        $test_user_info = array('uid' => 187, 'name' => '徐赈甫', 'identity' => '371122199312280056', 'birthday' => '19931228', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 188, 'username' => '201201130132', 'password' => $this->hash('371121199408312319'), 'type' => 1);
        $test_user_info = array('uid' => 188, 'name' => '杨帆', 'identity' => '371121199408312319', 'birthday' => '19940831', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 189, 'username' => '201201130133', 'password' => $this->hash('370284199401012153'), 'type' => 1);
        $test_user_info = array('uid' => 189, 'name' => '杨照泰', 'identity' => '370284199401012153', 'birthday' => '19940101', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 190, 'username' => '201201130134', 'password' => $this->hash('131121199310295018'), 'type' => 1);
        $test_user_info = array('uid' => 190, 'name' => '张灿', 'identity' => '131121199310295018', 'birthday' => '19931029', 'sex' => True, 'nativeplace' => '河北');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 191, 'username' => '201201130135', 'password' => $this->hash('37078319920320151X'), 'type' => 1);
        $test_user_info = array('uid' => 191, 'name' => '张越', 'identity' => '37078319920320151X', 'birthday' => '19920320', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 192, 'username' => '201201130136', 'password' => $this->hash('370782199407020036'), 'type' => 1);
        $test_user_info = array('uid' => 192, 'name' => '张志浩', 'identity' => '370782199407020036', 'birthday' => '19940702', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 193, 'username' => '201201130137', 'password' => $this->hash('371202199312160337'), 'type' => 1);
        $test_user_info = array('uid' => 193, 'name' => '赵鑫', 'identity' => '371202199312160337', 'birthday' => '19931216', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 194, 'username' => '201201130138', 'password' => $this->hash('371323199310017614'), 'type' => 1);
        $test_user_info = array('uid' => 194, 'name' => '朱良军', 'identity' => '371323199310017614', 'birthday' => '19931001', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 195, 'username' => '201201130139', 'password' => $this->hash('370402199212096913'), 'type' => 1);
        $test_user_info = array('uid' => 195, 'name' => '宗兆启', 'identity' => '370402199212096913', 'birthday' => '19921209', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 196, 'username' => '201201130201', 'password' => $this->hash('371202199311286114'), 'type' => 1);
        $test_user_info = array('uid' => 196, 'name' => '毕延深', 'identity' => '371202199311286114', 'birthday' => '19931128', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 197, 'username' => '201201130202', 'password' => $this->hash('330821199409037275'), 'type' => 1);
        $test_user_info = array('uid' => 197, 'name' => '陈碧晨', 'identity' => '330821199409037275', 'birthday' => '19940903', 'sex' => True, 'nativeplace' => '浙江');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 198, 'username' => '201201130203', 'password' => $this->hash('370826199210166896'), 'type' => 1);
        $test_user_info = array('uid' => 198, 'name' => '陈向晖', 'identity' => '370826199210166896', 'birthday' => '19921016', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 199, 'username' => '201201130204', 'password' => $this->hash('320324199409154199'), 'type' => 1);
        $test_user_info = array('uid' => 199, 'name' => '范志威', 'identity' => '320324199409154199', 'birthday' => '19940915', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 200, 'username' => '201201130205', 'password' => $this->hash('370827199410261835'), 'type' => 1);
        $test_user_info = array('uid' => 200, 'name' => '韩璐', 'identity' => '370827199410261835', 'birthday' => '19941026', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 201, 'username' => '201201130206', 'password' => $this->hash('371083199303254021'), 'type' => 1);
        $test_user_info = array('uid' => 201, 'name' => '姜春蕾', 'identity' => '371083199303254021', 'birthday' => '19930325', 'sex' => False, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 202, 'username' => '201201130207', 'password' => $this->hash('370881199310086310'), 'type' => 1);
        $test_user_info = array('uid' => 202, 'name' => '孔超', 'identity' => '370881199310086310', 'birthday' => '19931008', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


        $test_user_account = array('id' => 203, 'username' => '201201130208', 'password' => $this->hash('370828199206011616'), 'type' => 1);
        $test_user_info = array('uid' => 203, 'name' => '李际宇', 'identity' => '370828199206011616', 'birthday' => '19920601', 'sex' => True, 'nativeplace' => '山东');
        DB::table('UserAccount')->insert($test_user_account);
        DB::table('UserInfo')->insert($test_user_info);


    }

    public function addClass()
    {
        $classes = array(
            'id' => 1,
            'name' => '计算机科学与技术-1'
        );
        DB::table('Classes')->insert($classes);

        $classes = array(
            'id' => 2,
            'name' => '计算机科学与技术-2'
        );
        DB::table('Classes')->insert($classes);

        $classes = array(
            'id' => 3,
            'name' => '计算机科学与技术-3'
        );
        DB::table('Classes')->insert($classes);

        $classes = array(
            'id' => 4,
            'name' => '计算机科学与技术-4'
        );
        DB::table('Classes')->insert($classes);

        $classes = array(
            'id' => 5,
            'name' => '计算机科学与技术-5'
        );
        DB::table('Classes')->insert($classes);

    }

    public function joinClass()
    {
        $student_class = array('id' => 1, 'uid' => 4, 'classid' => 4, 'studentid' => '201201131004', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 2, 'uid' => 5, 'classid' => 5, 'studentid' => '201201131005', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 3, 'uid' => 6, 'classid' => 1, 'studentid' => '201201131006', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 4, 'uid' => 7, 'classid' => 2, 'studentid' => '201201131007', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 5, 'uid' => 8, 'classid' => 3, 'studentid' => '201201131008', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 6, 'uid' => 9, 'classid' => 4, 'studentid' => '201201131009', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 7, 'uid' => 10, 'classid' => 5, 'studentid' => '201201131010', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 8, 'uid' => 11, 'classid' => 1, 'studentid' => '201201131011', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 9, 'uid' => 12, 'classid' => 2, 'studentid' => '201201131012', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 10, 'uid' => 13, 'classid' => 3, 'studentid' => '201201131013', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 11, 'uid' => 14, 'classid' => 4, 'studentid' => '201201131014', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 12, 'uid' => 15, 'classid' => 5, 'studentid' => '201201131015', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 13, 'uid' => 16, 'classid' => 1, 'studentid' => '201201131016', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 14, 'uid' => 17, 'classid' => 2, 'studentid' => '201201131017', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 15, 'uid' => 18, 'classid' => 3, 'studentid' => '201201131018', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 16, 'uid' => 19, 'classid' => 4, 'studentid' => '201201131019', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 17, 'uid' => 20, 'classid' => 5, 'studentid' => '201201131020', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 18, 'uid' => 21, 'classid' => 1, 'studentid' => '201201131021', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 19, 'uid' => 22, 'classid' => 2, 'studentid' => '201201131022', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 20, 'uid' => 23, 'classid' => 3, 'studentid' => '201201131023', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 21, 'uid' => 24, 'classid' => 4, 'studentid' => '201201131025', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 22, 'uid' => 25, 'classid' => 5, 'studentid' => '201201131026', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 23, 'uid' => 26, 'classid' => 1, 'studentid' => '201201131027', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 24, 'uid' => 27, 'classid' => 2, 'studentid' => '201201131028', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 25, 'uid' => 28, 'classid' => 3, 'studentid' => '201201131030', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 26, 'uid' => 29, 'classid' => 4, 'studentid' => '201201131031', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 27, 'uid' => 30, 'classid' => 5, 'studentid' => '201201131032', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 28, 'uid' => 31, 'classid' => 1, 'studentid' => '201201131033', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 29, 'uid' => 32, 'classid' => 2, 'studentid' => '201201131034', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 30, 'uid' => 33, 'classid' => 3, 'studentid' => '201201131035', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 31, 'uid' => 34, 'classid' => 4, 'studentid' => '201201131036', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 32, 'uid' => 35, 'classid' => 5, 'studentid' => '201201131037', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 33, 'uid' => 36, 'classid' => 1, 'studentid' => '201201131038', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 34, 'uid' => 37, 'classid' => 2, 'studentid' => '201101130711', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 35, 'uid' => 38, 'classid' => 3, 'studentid' => '201101130735', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 36, 'uid' => 39, 'classid' => 4, 'studentid' => '201101130929', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 37, 'uid' => 40, 'classid' => 5, 'studentid' => '201101130938', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 38, 'uid' => 41, 'classid' => 1, 'studentid' => '201101130903', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 39, 'uid' => 42, 'classid' => 2, 'studentid' => '201201130701', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 40, 'uid' => 43, 'classid' => 3, 'studentid' => '201201130702', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 41, 'uid' => 44, 'classid' => 4, 'studentid' => '201201130703', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 42, 'uid' => 45, 'classid' => 5, 'studentid' => '201201130704', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 43, 'uid' => 46, 'classid' => 1, 'studentid' => '201201130705', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 44, 'uid' => 47, 'classid' => 2, 'studentid' => '201201130706', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 45, 'uid' => 48, 'classid' => 3, 'studentid' => '201201130707', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 46, 'uid' => 49, 'classid' => 4, 'studentid' => '201201130708', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 47, 'uid' => 50, 'classid' => 5, 'studentid' => '201201130709', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 48, 'uid' => 51, 'classid' => 1, 'studentid' => '201201130710', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 49, 'uid' => 52, 'classid' => 2, 'studentid' => '201201130711', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 50, 'uid' => 53, 'classid' => 3, 'studentid' => '201201130712', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 51, 'uid' => 54, 'classid' => 4, 'studentid' => '201201130713', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 52, 'uid' => 55, 'classid' => 5, 'studentid' => '201201130714', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 53, 'uid' => 56, 'classid' => 1, 'studentid' => '201201130715', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 54, 'uid' => 57, 'classid' => 2, 'studentid' => '201201130716', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 55, 'uid' => 58, 'classid' => 3, 'studentid' => '201201130717', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 56, 'uid' => 59, 'classid' => 4, 'studentid' => '201201130718', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 57, 'uid' => 60, 'classid' => 5, 'studentid' => '201201130719', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 58, 'uid' => 61, 'classid' => 1, 'studentid' => '201201130720', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 59, 'uid' => 62, 'classid' => 2, 'studentid' => '201201130721', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 60, 'uid' => 63, 'classid' => 3, 'studentid' => '201201130722', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 61, 'uid' => 64, 'classid' => 4, 'studentid' => '201201130723', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 62, 'uid' => 65, 'classid' => 5, 'studentid' => '201201130724', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 63, 'uid' => 66, 'classid' => 1, 'studentid' => '201201130725', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 64, 'uid' => 67, 'classid' => 2, 'studentid' => '201201130726', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 65, 'uid' => 68, 'classid' => 3, 'studentid' => '201201130727', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 66, 'uid' => 69, 'classid' => 4, 'studentid' => '201201130728', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 67, 'uid' => 70, 'classid' => 5, 'studentid' => '201201130729', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 68, 'uid' => 71, 'classid' => 1, 'studentid' => '201201130730', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 69, 'uid' => 72, 'classid' => 2, 'studentid' => '201201130731', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 70, 'uid' => 73, 'classid' => 3, 'studentid' => '201201130732', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 71, 'uid' => 74, 'classid' => 4, 'studentid' => '201201130733', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 72, 'uid' => 75, 'classid' => 5, 'studentid' => '201201130734', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 73, 'uid' => 76, 'classid' => 1, 'studentid' => '201201130735', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 74, 'uid' => 77, 'classid' => 2, 'studentid' => '201201130736', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 75, 'uid' => 78, 'classid' => 3, 'studentid' => '201201130738', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 76, 'uid' => 79, 'classid' => 4, 'studentid' => '201201130739', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 77, 'uid' => 80, 'classid' => 5, 'studentid' => '201201130740', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 78, 'uid' => 81, 'classid' => 1, 'studentid' => '201201130801', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 79, 'uid' => 82, 'classid' => 2, 'studentid' => '201201130802', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 80, 'uid' => 83, 'classid' => 3, 'studentid' => '201201130803', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 81, 'uid' => 84, 'classid' => 4, 'studentid' => '201201130804', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 82, 'uid' => 85, 'classid' => 5, 'studentid' => '201201130805', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 83, 'uid' => 86, 'classid' => 1, 'studentid' => '201201130806', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 84, 'uid' => 87, 'classid' => 2, 'studentid' => '201201130807', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 85, 'uid' => 88, 'classid' => 3, 'studentid' => '201201130808', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 86, 'uid' => 89, 'classid' => 4, 'studentid' => '201201130809', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 87, 'uid' => 90, 'classid' => 5, 'studentid' => '201201130810', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 88, 'uid' => 91, 'classid' => 1, 'studentid' => '201201130811', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 89, 'uid' => 92, 'classid' => 2, 'studentid' => '201201130812', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 90, 'uid' => 93, 'classid' => 3, 'studentid' => '201201130813', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 91, 'uid' => 94, 'classid' => 4, 'studentid' => '201201130814', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 92, 'uid' => 95, 'classid' => 5, 'studentid' => '201201130815', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 93, 'uid' => 96, 'classid' => 1, 'studentid' => '201201130816', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 94, 'uid' => 97, 'classid' => 2, 'studentid' => '201201130817', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 95, 'uid' => 98, 'classid' => 3, 'studentid' => '201201130818', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 96, 'uid' => 99, 'classid' => 4, 'studentid' => '201201130819', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 97, 'uid' => 100, 'classid' => 5, 'studentid' => '201201130820', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 98, 'uid' => 101, 'classid' => 1, 'studentid' => '201201130821', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 99, 'uid' => 102, 'classid' => 2, 'studentid' => '201201130822', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 100, 'uid' => 103, 'classid' => 3, 'studentid' => '201201130823', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 101, 'uid' => 104, 'classid' => 4, 'studentid' => '201201130824', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 102, 'uid' => 105, 'classid' => 5, 'studentid' => '201201130825', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 103, 'uid' => 106, 'classid' => 1, 'studentid' => '201201130826', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 104, 'uid' => 107, 'classid' => 2, 'studentid' => '201201130827', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 105, 'uid' => 108, 'classid' => 3, 'studentid' => '201201130828', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 106, 'uid' => 109, 'classid' => 4, 'studentid' => '201201130829', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 107, 'uid' => 110, 'classid' => 5, 'studentid' => '201201130830', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 108, 'uid' => 111, 'classid' => 1, 'studentid' => '201201130831', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 109, 'uid' => 112, 'classid' => 2, 'studentid' => '201201130832', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 110, 'uid' => 113, 'classid' => 3, 'studentid' => '201201130833', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 111, 'uid' => 114, 'classid' => 4, 'studentid' => '201201130834', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 112, 'uid' => 115, 'classid' => 5, 'studentid' => '201201130835', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 113, 'uid' => 116, 'classid' => 1, 'studentid' => '201201130837', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 114, 'uid' => 117, 'classid' => 2, 'studentid' => '201201130838', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 115, 'uid' => 118, 'classid' => 3, 'studentid' => '201201130839', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 116, 'uid' => 119, 'classid' => 4, 'studentid' => '201201130901', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 117, 'uid' => 120, 'classid' => 5, 'studentid' => '201201130902', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 118, 'uid' => 121, 'classid' => 1, 'studentid' => '201201130903', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 119, 'uid' => 122, 'classid' => 2, 'studentid' => '201201130904', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 120, 'uid' => 123, 'classid' => 3, 'studentid' => '201201130905', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 121, 'uid' => 124, 'classid' => 4, 'studentid' => '201201130906', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 122, 'uid' => 125, 'classid' => 5, 'studentid' => '201201130907', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 123, 'uid' => 126, 'classid' => 1, 'studentid' => '201201130908', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 124, 'uid' => 127, 'classid' => 2, 'studentid' => '201201130910', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 125, 'uid' => 128, 'classid' => 3, 'studentid' => '201201130911', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 126, 'uid' => 129, 'classid' => 4, 'studentid' => '201201130912', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 127, 'uid' => 130, 'classid' => 5, 'studentid' => '201201130913', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 128, 'uid' => 131, 'classid' => 1, 'studentid' => '201201130914', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 129, 'uid' => 132, 'classid' => 2, 'studentid' => '201201130915', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 130, 'uid' => 133, 'classid' => 3, 'studentid' => '201201130916', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 131, 'uid' => 134, 'classid' => 4, 'studentid' => '201201130917', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 132, 'uid' => 135, 'classid' => 5, 'studentid' => '201201130918', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 133, 'uid' => 136, 'classid' => 1, 'studentid' => '201201130919', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 134, 'uid' => 137, 'classid' => 2, 'studentid' => '201201130920', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 135, 'uid' => 138, 'classid' => 3, 'studentid' => '201201130921', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 136, 'uid' => 139, 'classid' => 4, 'studentid' => '201201130922', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 137, 'uid' => 140, 'classid' => 5, 'studentid' => '201201130923', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 138, 'uid' => 141, 'classid' => 1, 'studentid' => '201201130924', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 139, 'uid' => 142, 'classid' => 2, 'studentid' => '201201130925', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 140, 'uid' => 143, 'classid' => 3, 'studentid' => '201201130926', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 141, 'uid' => 144, 'classid' => 4, 'studentid' => '201201130927', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 142, 'uid' => 145, 'classid' => 5, 'studentid' => '201201130928', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 143, 'uid' => 146, 'classid' => 1, 'studentid' => '201201130929', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 144, 'uid' => 147, 'classid' => 2, 'studentid' => '201201130930', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 145, 'uid' => 148, 'classid' => 3, 'studentid' => '201201130931', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 146, 'uid' => 149, 'classid' => 4, 'studentid' => '201201130932', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 147, 'uid' => 150, 'classid' => 5, 'studentid' => '201201130934', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 148, 'uid' => 151, 'classid' => 1, 'studentid' => '201201130935', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 149, 'uid' => 152, 'classid' => 2, 'studentid' => '201201130936', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 150, 'uid' => 153, 'classid' => 3, 'studentid' => '201201130937', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 151, 'uid' => 154, 'classid' => 4, 'studentid' => '201201130938', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 152, 'uid' => 155, 'classid' => 5, 'studentid' => '201201130939', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 153, 'uid' => 156, 'classid' => 1, 'studentid' => '201101130214', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 154, 'uid' => 157, 'classid' => 2, 'studentid' => '201101130234', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 155, 'uid' => 158, 'classid' => 3, 'studentid' => '201101130308', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 156, 'uid' => 159, 'classid' => 4, 'studentid' => '201201130101', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 157, 'uid' => 160, 'classid' => 5, 'studentid' => '201201130102', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 158, 'uid' => 161, 'classid' => 1, 'studentid' => '201201130103', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 159, 'uid' => 162, 'classid' => 2, 'studentid' => '201201130104', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 160, 'uid' => 163, 'classid' => 3, 'studentid' => '201201130105', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 161, 'uid' => 164, 'classid' => 4, 'studentid' => '201201130106', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 162, 'uid' => 165, 'classid' => 5, 'studentid' => '201201130107', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 163, 'uid' => 166, 'classid' => 1, 'studentid' => '201201130108', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 164, 'uid' => 167, 'classid' => 2, 'studentid' => '201201130109', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 165, 'uid' => 168, 'classid' => 3, 'studentid' => '201201130110', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 166, 'uid' => 169, 'classid' => 4, 'studentid' => '201201130112', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 167, 'uid' => 170, 'classid' => 5, 'studentid' => '201201130113', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 168, 'uid' => 171, 'classid' => 1, 'studentid' => '201201130114', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 169, 'uid' => 172, 'classid' => 2, 'studentid' => '201201130115', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 170, 'uid' => 173, 'classid' => 3, 'studentid' => '201201130116', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 171, 'uid' => 174, 'classid' => 4, 'studentid' => '201201130117', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 172, 'uid' => 175, 'classid' => 5, 'studentid' => '201201130118', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 173, 'uid' => 176, 'classid' => 1, 'studentid' => '201201130119', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 174, 'uid' => 177, 'classid' => 2, 'studentid' => '201201130120', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 175, 'uid' => 178, 'classid' => 3, 'studentid' => '201201130121', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 176, 'uid' => 179, 'classid' => 4, 'studentid' => '201201130122', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 177, 'uid' => 180, 'classid' => 5, 'studentid' => '201201130123', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 178, 'uid' => 181, 'classid' => 1, 'studentid' => '201201130124', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 179, 'uid' => 182, 'classid' => 2, 'studentid' => '201201130125', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 180, 'uid' => 183, 'classid' => 3, 'studentid' => '201201130127', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 181, 'uid' => 184, 'classid' => 4, 'studentid' => '201201130128', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 182, 'uid' => 185, 'classid' => 5, 'studentid' => '201201130129', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 183, 'uid' => 186, 'classid' => 1, 'studentid' => '201201130130', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 184, 'uid' => 187, 'classid' => 2, 'studentid' => '201201130131', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 185, 'uid' => 188, 'classid' => 3, 'studentid' => '201201130132', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 186, 'uid' => 189, 'classid' => 4, 'studentid' => '201201130133', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 187, 'uid' => 190, 'classid' => 5, 'studentid' => '201201130134', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 188, 'uid' => 191, 'classid' => 1, 'studentid' => '201201130135', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 189, 'uid' => 192, 'classid' => 2, 'studentid' => '201201130136', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 190, 'uid' => 193, 'classid' => 3, 'studentid' => '201201130137', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 191, 'uid' => 194, 'classid' => 4, 'studentid' => '201201130138', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 192, 'uid' => 195, 'classid' => 5, 'studentid' => '201201130139', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 193, 'uid' => 196, 'classid' => 1, 'studentid' => '201201130201', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 194, 'uid' => 197, 'classid' => 2, 'studentid' => '201201130202', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 195, 'uid' => 198, 'classid' => 3, 'studentid' => '201201130203', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 196, 'uid' => 199, 'classid' => 4, 'studentid' => '201201130204', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 197, 'uid' => 200, 'classid' => 5, 'studentid' => '201201130205', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 198, 'uid' => 201, 'classid' => 1, 'studentid' => '201201130206', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 199, 'uid' => 202, 'classid' => 2, 'studentid' => '201201130207', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);

        $student_class = array('id' => 200, 'uid' => 203, 'classid' => 3, 'studentid' => '201201130208', 'enrollyear' => '2012');
        DB::table('StudentInfo')->insert($student_class);


    }

    public function addInstructor()
    {

        for ($i = 1; $i <= 3; $i++) {
            $instructor = array(
                'id' => $i,
                'uid' => 2,
                'classid' => $i
            );
            DB::table('Instructor')->insert($instructor);
        }
        for ($i = 4; $i <= 5; $i++) {
            $instructor = array(
                'id' => $i,
                'uid' => 3,
                'classid' => $i
            );
            DB::table('Instructor')->insert($instructor);
        }
    }

    public function addSemester()
    {
        $semester = ['大一', '大二', '大三', '大四'];
        for ($i = 0; $i < 8; $i++) {
            $classes = array(
                'id' => $i + 1,
                'name' => $semester[$i / 2] . ($i % 2 == 0 ? "上" : "下")
            );
            DB::table('Semester')->insert($classes);
        }
    }

    public function addCourse()
    {
        for ($i = 0; $i < count($this->course); $i++) {
            $temp = array(
                'id' => $i + 1,
                'name' => $this->course[$i]
            );
            DB::table('Course')->insert($temp);
        }
    }

    public function addScore()
    {
        $course_num = count($this->course);
        for ($i = 3; $i <= 203; $i++) {
            $inserted = array();
            for ($j = 1; $j <= $course_num; $j++) {
                $temp = array(
                    'uid' => $i,
                    'courseid' => $j,
                    'semesterid' => $course_num % 8 + 1,
                    'score' => rand(50, 100)
                );
                $inserted[] = $temp;
            }
            DB::table('CourseScore')->insert($inserted);
        }
    }

    public function addTestCourse()
    {
        $course_num = count($this->course);

        $course1 = ['课程删除测试', '课程修改测试'];
        for ($i = 0; $i < count($course1); $i++) {
            $temp = array(
                'id' => $i + $course_num+1,
                'name' => $course1[$i]
            );
            DB::table('Course')->insert($temp);
        }
    }
}
