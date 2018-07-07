<?php
/**
 * Created by PhpStorm.
 * User: wzq
 * Date: 2018/7/6
 * Time: 4:33 PM
 */

namespace Tests\Unit;

use Tests\TestCase;

class SchoolRollServiceTest extends TestCase
{
    protected $schoolrollService;

    public function setup()
    {
        parent::setUp();
        $this->schoolrollService = $this->app->make('App\Services\SchoolRollService');
    }

    public function testBasicTest()
    {
        $this->classTest();
        $this->semesterTest();
    }

    public function classTest(){
        $this->class_addTest();
        $this->class_deleteTest();
        $this->class_editTest();
        $this->class_searchTest();
    }

    public function semesterTest(){
        $this->semester_addTest();
        $this->semester_deleteTest();
        $this->semester_editTest();
        $this->semester_searchTest();
    }

    public function class_addTest()
    {

        $result = $this->schoolrollService->classes_add('');
        $this->assertEquals(1001, $result);//'班级名称参数不完整

        $result = $this->schoolrollService->classes_add('classes_addTestclasses_addTestclasses_addTestclasses_addTestclasses_addTestclasses_addTestclasses_addTestclasses_addTestclasses_addTestclasses_addTestclasses_addTest');
        $this->assertEquals(1002, $result);//'班级名称长度不能大于100'

        $result = $this->schoolrollService->classes_add('测试班级1');
        $this->assertEquals(1003, $result);//'班级名称已存在'

        $result = $this->schoolrollService->classes_add('添加班级1');
        $this->assertEquals(1000, $result);//'班级添加成功
    }

    public function class_deleteTest()
    {
        $result = $this->schoolrollService->classes_delete('');
        $this->assertEquals(1101, $result);//

        $result = $this->schoolrollService->classes_delete(123);
        $this->assertEquals(1102, $result);

        $result = $this->schoolrollService->classes_delete(3);
        $this->assertEquals(1100, $result);
    }

    public function class_editTest()
    {
        $result = $this->schoolrollService->classes_edit('', '1');
        $this->assertEquals(1201, $result);
        $result = $this->schoolrollService->classes_edit(1, '');
        $this->assertEquals(1204, $result);
        $result = $this->schoolrollService->classes_edit(1, 'classes_addTestclasses_addTestclasses_addTestclasses_addTestclasses_addTestclasses_addTestclasses_addTestclasses_addTestclasses_addTestclasses_addTestclasses_addTest');
        $this->assertEquals(1205, $result);
        $result = $this->schoolrollService->classes_edit(122, '修改班级2');
        $this->assertEquals(1202, $result);
        $result = $this->schoolrollService->classes_edit(1, '测试班级2');
        $this->assertEquals(1203, $result);
        $result = $this->schoolrollService->classes_edit(1, '测试班级1');
        $this->assertEquals(1200, $result);
        $result = $this->schoolrollService->classes_edit(1, '测试班级5');
        $this->assertEquals(1200, $result);
    }

    public function class_searchTest()
    {
        $info = array();
        $info['condition'][] = array('data' => '查询', 'fuzzy' => true, 'key' => 'name');
        $result = $this->schoolrollService->classes_search($info);
        $this->assertEquals(0, count($result['data']));//单用户模糊搜索测试

        $info = array();
        $info['condition'][] = array('data' => '查找', 'fuzzy' => true, 'key' => 'name');
        $result = $this->schoolrollService->classes_search($info);
        $this->assertEquals(4, count($result['data']));//单用户模糊搜索测试

        $info = array();
        $info['condition'][] = array('data' => '查找', 'fuzzy' => true, 'key' => 'name');
        $info['orderby'] = 'name';
        $info['order'] = 'ASC';
        $result = $this->schoolrollService->classes_search($info);
        $this->assertEquals('查找班级0', $result['data'][0]['name']);

        $info = array();
        $info['condition'][] = array('data' => '查找', 'fuzzy' => true, 'key' => 'name');
        $info['orderby'] = 'id';
        $info['order'] = 'ASC';
        $result = $this->schoolrollService->classes_search($info);
        $this->assertEquals('查找班级1', $result['data'][0]['name']);

        $info = array();
        $info['condition'][] = array('data' => '查找', 'fuzzy' => true, 'key' => 'name');
        $info['orderby'] = 'id';
        $info['order'] = 'DESC';
        $result = $this->schoolrollService->classes_search($info);
        $this->assertEquals('查找班级0', $result['data'][0]['name']);


        $info = array();
        $info['condition'][] = array('data' => '查找', 'fuzzy' => true, 'key' => 'name');
        $info['orderby'] = 'id';
        $info['order'] = 'ASC';
        $info['currentpage'] = 1;
        $info['sep'] = 2;
        $result = $this->schoolrollService->classes_search($info);
        $this->assertEquals(2, count($result['data']));
        $this->assertEquals(6, $result['data'][0]['id']);

        $info = array();
        $info['condition'][] = array('data' => '查找', 'fuzzy' => true, 'key' => 'name');
        $info['orderby'] = 'id';
        $info['order'] = 'ASC';
        $info['currentpage'] = 2;
        $info['sep'] = 2;
        $result = $this->schoolrollService->classes_search($info);
        $this->assertEquals(2, count($result['data']));
        $this->assertEquals(8, $result['data'][0]['id']);
    }




    public function semester_addTest()
    {

        $result = $this->schoolrollService->semester_add('');
        $this->assertEquals(1401, $result);//'学期名称参数不完整

        $result = $this->schoolrollService->semester_add('classes_addTestclasses_addTestclasses_addTestclasses_addTestclasses_addTestclasses_addTestclasses_addTestclasses_addTestclasses_addTestclasses_addTestclasses_addTest');
        $this->assertEquals(1402, $result);//'学期名称长度不能大于100'

        $result = $this->schoolrollService->semester_add('测试学期1');
        $this->assertEquals(1403, $result);//'学期名称已存在'

        $result = $this->schoolrollService->semester_add('添加学期1');
        $this->assertEquals(1400, $result);//'学期添加成功
    }

    public function semester_deleteTest()
    {
        $result = $this->schoolrollService->semester_delete('');
        $this->assertEquals(1501, $result);//

        $result = $this->schoolrollService->semester_delete(123);
        $this->assertEquals(1502, $result);

        $info = array();
        $info['condition'][] = array('data' => 3, 'fuzzy' => false, 'key' => 'id');
        $info['orderby'] = 'id';
        $info['order'] = 'ASC';
        $result = $this->schoolrollService->semester_search($info);
        $this->assertEquals(1, count($result['data']));

        $result = $this->schoolrollService->semester_delete(3);
        $this->assertEquals(1500, $result);

        $info = array();
        $info['condition'][] = array('data' => 3, 'fuzzy' => false, 'key' => 'id');
        $info['orderby'] = 'id';
        $info['order'] = 'ASC';
        $result = $this->schoolrollService->semester_search($info);
        $this->assertEquals(0, count($result['data']));
    }

    public function semester_editTest()
    {
        $result = $this->schoolrollService->semester_edit('', '1');
        $this->assertEquals(1601, $result);
        $result = $this->schoolrollService->semester_edit(1, '');
        $this->assertEquals(1604, $result);
        $result = $this->schoolrollService->semester_edit(1, 'classes_addTestclasses_addTestclasses_addTestclasses_addTestclasses_addTestclasses_addTestclasses_addTestclasses_addTestclasses_addTestclasses_addTestclasses_addTest');
        $this->assertEquals(1605, $result);
        $result = $this->schoolrollService->semester_edit(122, '修改学期2');
        $this->assertEquals(1602, $result);
        $result = $this->schoolrollService->semester_edit(1, '测试学期2');
        $this->assertEquals(1603, $result);


        $info = array();
        $info['condition'][] = array('data' => 1, 'fuzzy' => false, 'key' => 'id');
        $info['orderby'] = 'id';
        $info['order'] = 'ASC';
        $result = $this->schoolrollService->semester_search($info);
        $this->assertEquals('测试学期1', $result['data'][0]['name']);

        $result = $this->schoolrollService->semester_edit(1, '测试学期1');
        $this->assertEquals(1600, $result);
        $result = $this->schoolrollService->semester_edit(1, '测试学期5');
        $this->assertEquals(1600, $result);

        $info = array();
        $info['condition'][] = array('data' => 1, 'fuzzy' => false, 'key' => 'id');
        $info['orderby'] = 'id';
        $info['order'] = 'ASC';
        $result = $this->schoolrollService->semester_search($info);
        $this->assertEquals('测试学期5', $result['data'][0]['name']);
    }

    public function semester_searchTest()
    {
        $info = array();
        $info['condition'][] = array('data' => '查询', 'fuzzy' => true, 'key' => 'name');
        $result = $this->schoolrollService->semester_search($info);
        $this->assertEquals(0, count($result['data']));//单用户模糊搜索测试

        $info = array();
        $info['condition'][] = array('data' => '查找', 'fuzzy' => true, 'key' => 'name');
        $result = $this->schoolrollService->semester_search($info);
        $this->assertEquals(4, count($result['data']));//单用户模糊搜索测试

        $info = array();
        $info['condition'][] = array('data' => '查找', 'fuzzy' => true, 'key' => 'name');
        $info['orderby'] = 'name';
        $info['order'] = 'ASC';
        $result = $this->schoolrollService->semester_search($info);
        $this->assertEquals('查找学期0', $result['data'][0]['name']);

        $info = array();
        $info['condition'][] = array('data' => '查找', 'fuzzy' => true, 'key' => 'name');
        $info['orderby'] = 'id';
        $info['order'] = 'ASC';
        $result = $this->schoolrollService->semester_search($info);
        $this->assertEquals('查找学期1', $result['data'][0]['name']);

        $info = array();
        $info['condition'][] = array('data' => '查找', 'fuzzy' => true, 'key' => 'name');
        $info['orderby'] = 'id';
        $info['order'] = 'DESC';
        $result = $this->schoolrollService->semester_search($info);
        $this->assertEquals('查找学期0', $result['data'][0]['name']);


        $info = array();
        $info['condition'][] = array('data' => '查找', 'fuzzy' => true, 'key' => 'name');
        $info['orderby'] = 'id';
        $info['order'] = 'ASC';
        $info['currentpage'] = 1;
        $info['sep'] = 2;
        $result = $this->schoolrollService->semester_search($info);
        $this->assertEquals(2, count($result['data']));
        $this->assertEquals(6, $result['data'][0]['id']);

        $info = array();
        $info['condition'][] = array('data' => '查找', 'fuzzy' => true, 'key' => 'name');
        $info['orderby'] = 'id';
        $info['order'] = 'ASC';
        $info['currentpage'] = 2;
        $info['sep'] = 2;
        $result = $this->schoolrollService->semester_search($info);
        $this->assertEquals(2, count($result['data']));
        $this->assertEquals(8, $result['data'][0]['id']);
    }
}