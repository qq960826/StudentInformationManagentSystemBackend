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
    public function courseTest(){
        $this->course_addTest();
        $this->course_editTest();
        $this->course_deleteTest();
    }
    public function course_addTest(){
        $result=$this->courseService->course_add('');
        $this->assertEquals(2601,$result);
        $result=$this->courseService->course_add('1212112121121211212112121121211212112121121211212112121121211212112121121211212112121121211212112121121211212112121121211212112121121211212112121');
        $this->assertEquals(2602,$result);
        $result=$this->courseService->course_add('企业资源规划');
        $this->assertEquals(2603,$result);
        $result=$this->courseService->course_add('信息安全导论');
        $this->assertEquals(2600,$result);
    }
    public function course_editTest(){
        $info=array();
        $result=$this->courseService->course_edit('',"");
        $this->assertEquals(2801,$result);

        $result=$this->courseService->course_edit(100,"");
        $this->assertEquals(2804,$result);

        $result=$this->courseService->course_edit(34,"1212112121121211212112121121211212112121121211212112121121211212112121121211212112121121211212112121121211212112121121211212112121121211212112121");
        $this->assertEquals(2805,$result);

        $result=$this->courseService->course_edit(100,"课程修改测试");
        $this->assertEquals(2802,$result);

        $result=$this->courseService->course_edit(34,"课程删除测试");
        $this->assertEquals(2803,$result);

        $result=$this->courseService->course_edit(34,"课程修改测试1");
        $this->assertEquals(2800,$result);
    }

    public function course_deleteTest(){
        $result=$this->courseService->course_delete('');
        $this->assertEquals(2701,$result);

        $result=$this->courseService->course_delete(1222);
        $this->assertEquals(2702,$result);

        $result=$this->courseService->course_delete(35);
        $this->assertEquals(2700,$result);

    }

    public function coursescoreTest(){
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
}