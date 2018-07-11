<?php
/**
 * Created by PhpStorm.
 * User: wzq
 * Date: 2018/7/9
 * Time: 3:43 PM
 */

namespace Tests\Unit;

use Tests\TestCase;

class CourseServiceTest extends TestCase
{
    protected $courseService;

    public function setup()
    {
        parent::setUp();
        $this->artisan('migrate:refresh');
       $this->artisan('db:seed');
        $this->courseService = $this->app->make('App\Services\CourseService');

    }

    public function testBasicTest()
    {
        $this->courseTest();
        $this->coursescoreTest();
    }

    public function courseTest()
    {
        $this->course_addTest();
        $this->course_editTest();
        $this->course_deleteTest();
        $this->course_searchTest();
    }

    public function coursescoreTest()
    {
        $this->coursescore_addTest();
        $this->coursescore_deleteTest();
        $this->coursescore_editTest();
        $this->coursescore_searchTest();
        $this->coursescore_view_by_uidTest();
        $this->coursescore_rank_list_single_view_by_classTest();
        $this->coursescore_rank_list_semester_view_by_classTest();
        $this->coursescore_rank_list_all_view_by_classTest();
        $this->coursescore_rank_list_single_view_by_idTest();

    }

    public function course_addTest()
    {
        $result = $this->courseService->course_add('');
        $this->assertEquals(2601, $result);
        $result = $this->courseService->course_add('1212112121121211212112121121211212112121121211212112121121211212112121121211212112121121211212112121121211212112121121211212112121121211212112121');
        $this->assertEquals(2602, $result);
        $result = $this->courseService->course_add('企业资源规划');
        $this->assertEquals(2603, $result);
        $result = $this->courseService->course_add('信息安全导论');
        $this->assertEquals(2600, $result);
    }

    public function course_editTest()
    {
        $info = array();
        $result = $this->courseService->course_edit('', "");
        $this->assertEquals(2801, $result);

        $result = $this->courseService->course_edit(100, "");
        $this->assertEquals(2804, $result);

        $result = $this->courseService->course_edit(34, "1212112121121211212112121121211212112121121211212112121121211212112121121211212112121121211212112121121211212112121121211212112121121211212112121");
        $this->assertEquals(2805, $result);

        $result = $this->courseService->course_edit(100, "课程修改测试");
        $this->assertEquals(2802, $result);

        $result = $this->courseService->course_edit(34, "课程删除测试");
        $this->assertEquals(2803, $result);

        $result = $this->courseService->course_edit(34, "课程修改测试1");
        $this->assertEquals(2800, $result);
    }

    public function course_deleteTest()
    {
        $result = $this->courseService->course_delete('');
        $this->assertEquals(2701, $result);

        $result = $this->courseService->course_delete(1222);
        $this->assertEquals(2702, $result);

        $result = $this->courseService->course_delete(36);
        $this->assertEquals(2700, $result);

    }

    public function course_searchTest()
    {
        $info = array();
        $info['condition']['name'] = array('data' => '计算机', 'fuzzy' => false);
        $result = $this->courseService->course_search($info);
        $this->assertEquals(0, count($result['data']));

        $info = array();
        $info['condition']['name'] = array('data' => '计算机', 'fuzzy' => true);
        $result = $this->courseService->course_search($info);
        $this->assertEquals(3, count($result['data']));//单用户模糊搜索测试

        $info = array();
        $info['condition']['name'] = array('data' => '计算机', 'fuzzy' => true,);
        $info['by'] = 'name';
        $info['order'] = 'ASC';
        $result = $this->courseService->course_search($info);
        $this->assertEquals('计算机图形学', $result['data'][0]['name']);

        $info = array();
        $info['condition']['name'] = array('data' => '计算机', 'fuzzy' => true);
        $info['by'] = 'id';
        $info['order'] = 'ASC';
        $result = $this->courseService->course_search($info);
        $this->assertEquals('计算机图形学', $result['data'][0]['name']);

        $info = array();
        $info['condition']['name'] = array('data' => '计算机', 'fuzzy' => true);
        $info['by'] = 'id';
        $info['order'] = 'DESC';
        $result = $this->courseService->course_search($info);
        $this->assertEquals('计算机组成原理', $result['data'][0]['name']);


        $info = array();
        $info['condition']['name'] = array('data' => '计算机', 'fuzzy' => true);
        $info['by'] = 'id';
        $info['order'] = 'ASC';
        $info['currentpage'] = 1;
        $info['sep'] = 2;
        $result = $this->courseService->course_search($info);
        $this->assertEquals(2, count($result['data']));
        $this->assertEquals(11, $result['data'][0]['id']);

        $info = array();
        $info['condition']['name'] = array('data' => '计算机', 'fuzzy' => true);
        $info['by'] = 'id';
        $info['order'] = 'ASC';
        $info['currentpage'] = 2;
        $info['sep'] = 2;
        $result = $this->courseService->course_search($info);
        $this->assertEquals(1, count($result['data']));
        $this->assertEquals(26, $result['data'][0]['id']);

    }

    public function coursescore_addTest()
    {
        $info = array();
        $result = $this->courseService->coursescore_add($info);
        $this->assertEquals(3001, $result);

        $info = array(
            'uid' => 1000,
            'courseid' => 34,
            'semesterid' => 1,
            'score' => 12
        );
        $result = $this->courseService->coursescore_add($info);
        $this->assertEquals(3002, $result);

        $info = array(
            'uid' => 4,
            'courseid' => 12,
            'semesterid' => 144,
            'score' => 12
        );
        $result = $this->courseService->coursescore_add($info);
        $this->assertEquals(3003, $result);


        $info = array(
            'uid' => 4,
            'courseid' => 133,
            'semesterid' => 1,
            'score' => 12
        );
        $result = $this->courseService->coursescore_add($info);
        $this->assertEquals(3004, $result);
        $info = array(
            'uid' => 4,
            'courseid' => 1,
            'semesterid' => 1,
            'score' => 12
        );
        $result = $this->courseService->coursescore_add($info);
        $this->assertEquals(3005, $result);

        $info = array(
            'uid' => 4,
            'courseid' => 35,
            'semesterid' => 1,
            'score' => 12
        );
        $result = $this->courseService->coursescore_add($info);
        $this->assertEquals(3000, $result);


        $info = array(
            'uid' => 4,
            'courseid' => 34,
            'semesterid' => 1,
            'score' => 12
        );
        $result = $this->courseService->coursescore_add($info);
        $this->assertEquals(3000, $result);
    }

    public function coursescore_deleteTest()
    {
        $result = $this->courseService->coursescore_delete('');
        $this->assertEquals(3101, $result);

        $result = $this->courseService->coursescore_delete(122222);
        $this->assertEquals(3102, $result);

        $result = $this->courseService->coursescore_delete(6401);
        $this->assertEquals(3100, $result);
    }

    public function coursescore_editTest()
    {
        $info = array();
        $result = $this->courseService->coursescore_edit('', $info);
        $this->assertEquals(3201, $result);

        $info = array();
        $result = $this->courseService->coursescore_edit(64342, $info);
        $this->assertEquals(3202, $result);

        $info = array('uid' => 1000);
        $result = $this->courseService->coursescore_edit(6402, $info);
        $this->assertEquals(3203, $result);

        $info = array('uid' => 5, 'semesterid' => 1000);
        $result = $this->courseService->coursescore_edit(6402, $info);
        $this->assertEquals(3204, $result);

        $info = array('uid' => 5, 'semesterid' => 2, 'courseid' => 12121);
        $result = $this->courseService->coursescore_edit(6402, $info);
        $this->assertEquals(3205, $result);

        $info = array('uid' => 5, 'semesterid' => 2, 'courseid' => 3);
        $result = $this->courseService->coursescore_edit(6402, $info);
        $this->assertEquals(3206, $result);

        $info = array('uid' => 5, 'semesterid' => 2, 'courseid' => 35);
        $result = $this->courseService->coursescore_edit(6402, $info);
        $this->assertEquals(3200, $result);
    }

    public function coursescore_searchTest()
    {
        $info = array();
        $info['condition']['peoplename'] = array('data' => '蒋雪', 'fuzzy' => false);
        $result = $this->courseService->coursescore_search($info);
        $this->assertEquals(32, count($result['data']));

        $info = array();
        $info['condition']['coursename'] = array('data' => '企业资源规划', 'fuzzy' => false);
        $info['condition']['classname'] = array('data' => '计算机科学与技术-1', 'fuzzy' => false);

        $result = $this->courseService->coursescore_search($info);
        $this->assertEquals(40, count($result['data']));


        $info = array();
        $info['condition']['semestername'] = array('data' => '大一', 'fuzzy' => true);
        $info['condition']['coursename'] = array('data' => '企业资源规划', 'fuzzy' => false);

        $result = $this->courseService->coursescore_search($info);
        $this->assertEquals(200, $result['total']);

        $info = array();
        $info['condition']['coursename'] = array('data' => '计算机', 'fuzzy' => true);
        $result = $this->courseService->coursescore_search($info);
        $this->assertEquals(600, $result['total']);

        $info = array();
        $info['condition']['coursename'] = array('data' => '计算机', 'fuzzy' => true);
        $info['by'] = 'classname';
        $info['order'] = 'ASC';
        $result = $this->courseService->coursescore_search($info);
        $this->assertEquals('计算机科学与技术-1', $result['data'][0]['classname']);

        $info = array();
        $info['condition']['coursename'] = array('data' => '计算机', 'fuzzy' => true);
        $info['by'] = 'classname';
        $info['order'] = 'DESC';
        $result = $this->courseService->coursescore_search($info);
        $this->assertEquals('计算机科学与技术-5', $result['data'][0]['classname']);

        $info = array();
        $info['condition']['coursename'] = array('data' => '计算机', 'fuzzy' => true);
        $info['by'] = 'classname';
        $info['order'] = 'DESC';
        $info['currentpage'] = 15;
        $info['sep'] = 40;
        $result = $this->courseService->coursescore_search($info);
        $this->assertEquals('计算机科学与技术-1', $result['data'][0]['classname']);

    }

    public function coursescore_view_by_uidTest()
    {
        $result = $this->courseService->coursescore_view_by_uid(10);
        $this->assertEquals(32, count($result));
        $this->assertEquals('黄德卫', $result[0]['peoplename']);
    }

    public function coursescore_rank_list_single_view_by_classTest(){
        $info=array('classid'=>1,'courseid'=>2);
        $result = $this->courseService->coursescore_rank_list_single_view_by_class($info);
    }

    public function coursescore_rank_list_semester_view_by_classTest(){
        $info=array('classid'=>1,'semesterid'=>2);
        $result = $this->courseService->coursescore_rank_list_semester_view_by_class($info);
    }
    public function coursescore_rank_list_all_view_by_classTest(){
        $info=array('classid'=>1);
        $result = $this->courseService->coursescore_rank_list_all_view_by_class($info);
    }

    public function coursescore_rank_list_single_view_by_idTest(){
        $info=array('classid'=>1,'courseid'=>2);
        $result = $this->courseService->coursescore_rank_list_single_view_by_id($info,116);
//        $this->assertEquals(2,$result['rank']);

    }

}