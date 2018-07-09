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
        $this->instructorTest();
        $this->studentinfoTest();
    }

    public function classTest()
    {
        $this->class_addTest();
        $this->class_deleteTest();
        $this->class_editTest();
        $this->class_searchTest();
    }

    public function semesterTest()
    {
        $this->semester_addTest();
        $this->semester_deleteTest();
        $this->semester_editTest();
        $this->semester_searchTest();
    }

    public function instructorTest()
    {
        $this->instructor_addTest();
        $this->instructor_editTest();
        $this->instructor_deleteTest();
        $this->instructor_serachTest();
    }

    public function studentinfoTest()
    {
        $this->student_addTest();
        $this->student_deleteTest();
        $this->student_editTest();
        $this->student_searchTest();
        $this->studentid_view_by_idTest();
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
        $info['condition']['name'] = array('data' => '查询', 'fuzzy' => true);
        $result = $this->schoolrollService->classes_search($info);
        $this->assertEquals(0, count($result['data']));//单用户模糊搜索测试

        $info = array();
        $info['condition']['name'] = array('data' => '查找', 'fuzzy' => true);
        $result = $this->schoolrollService->classes_search($info);
        $this->assertEquals(4, count($result['data']));//单用户模糊搜索测试

        $info = array();
        $info['condition']['name'] = array('data' => '查找', 'fuzzy' => true,);
        $info['by'] = 'name';
        $info['order'] = 'ASC';
        $result = $this->schoolrollService->classes_search($info);
        $this->assertEquals('查找班级0', $result['data'][0]['name']);

        $info = array();
        $info['condition']['name'] = array('data' => '查找', 'fuzzy' => true);
        $info['by'] = 'id';
        $info['order'] = 'ASC';
        $result = $this->schoolrollService->classes_search($info);
        $this->assertEquals('查找班级1', $result['data'][0]['name']);

        $info = array();
        $info['condition']['name'] = array('data' => '查找', 'fuzzy' => true);
        $info['by'] = 'id';
        $info['order'] = 'DESC';
        $result = $this->schoolrollService->classes_search($info);
        $this->assertEquals('查找班级0', $result['data'][0]['name']);


        $info = array();
        $info['condition']['name'] = array('data' => '查找', 'fuzzy' => true);
        $info['by'] = 'id';
        $info['order'] = 'ASC';
        $info['currentpage'] = 1;
        $info['sep'] = 2;
        $result = $this->schoolrollService->classes_search($info);
        $this->assertEquals(2, count($result['data']));
        $this->assertEquals(6, $result['data'][0]['id']);

        $info = array();
        $info['condition']['name'] = array('data' => '查找', 'fuzzy' => true);
        $info['by'] = 'id';
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
        $info['condition']['id'] = array('data' => 3, 'fuzzy' => false);
        $info['by'] = 'id';
        $info['order'] = 'ASC';
        $result = $this->schoolrollService->semester_search($info);
        $this->assertEquals(1, count($result['data']));

        $result = $this->schoolrollService->semester_delete(3);
        $this->assertEquals(1500, $result);

        $info = array();
        $info['condition']['id'] = array('data' => 3, 'fuzzy' => false);
        $info['by'] = 'id';
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
        $info['condition']['id'] = array('data' => 1, 'fuzzy' => false);
        $info['by'] = 'id';
        $info['order'] = 'ASC';
        $result = $this->schoolrollService->semester_search($info);
        $this->assertEquals('测试学期1', $result['data'][0]['name']);

        $result = $this->schoolrollService->semester_edit(1, '测试学期1');
        $this->assertEquals(1600, $result);
        $result = $this->schoolrollService->semester_edit(1, '测试学期5');
        $this->assertEquals(1600, $result);

        $info = array();
        $info['condition']['id'] = array('data' => 1, 'fuzzy' => false);
        $info['by'] = 'id';
        $info['order'] = 'ASC';
        $result = $this->schoolrollService->semester_search($info);
        $this->assertEquals('测试学期5', $result['data'][0]['name']);
    }

    public function semester_searchTest()
    {
        $info = array();
        $info['condition']['name'] = array('data' => '查询', 'fuzzy' => true);
        $result = $this->schoolrollService->semester_search($info);
        $this->assertEquals(0, count($result['data']));//单用户模糊搜索测试

        $info = array();
        $info['condition']['name'] = array('data' => '查找', 'fuzzy' => true);
        $result = $this->schoolrollService->semester_search($info);
        $this->assertEquals(4, count($result['data']));//单用户模糊搜索测试

        $info = array();
        $info['condition']['name'] = array('data' => '查找', 'fuzzy' => true);
        $info['by'] = 'name';
        $info['order'] = 'ASC';
        $result = $this->schoolrollService->semester_search($info);
        $this->assertEquals('查找学期0', $result['data'][0]['name']);

        $info = array();
        $info['condition']['name'] = array('data' => '查找', 'fuzzy' => true);
        $info['by'] = 'id';
        $info['order'] = 'ASC';
        $result = $this->schoolrollService->semester_search($info);
        $this->assertEquals('查找学期1', $result['data'][0]['name']);

        $info = array();
        $info['condition']['name'] = array('data' => '查找', 'fuzzy' => true);
        $info['by'] = 'id';
        $info['order'] = 'DESC';
        $result = $this->schoolrollService->semester_search($info);
        $this->assertEquals('查找学期0', $result['data'][0]['name']);


        $info = array();
        $info['condition']['name'] = array('data' => '查找', 'fuzzy' => true);
        $info['by'] = 'id';
        $info['order'] = 'ASC';
        $info['currentpage'] = 1;
        $info['sep'] = 2;
        $result = $this->schoolrollService->semester_search($info);
        $this->assertEquals(2, count($result['data']));
        $this->assertEquals(6, $result['data'][0]['id']);

        $info = array();
        $info['condition']['name'] = array('data' => '查找', 'fuzzy' => true);
        $info['by'] = 'id';
        $info['order'] = 'ASC';
        $info['currentpage'] = 2;
        $info['sep'] = 2;
        $result = $this->schoolrollService->semester_search($info);
        $this->assertEquals(2, count($result['data']));
        $this->assertEquals(8, $result['data'][0]['id']);
    }

    public function instructor_addTest()
    {
        $result = $this->schoolrollService->instructor_add('', '1');
        $this->assertEquals(1801, $result);

        $result = $this->schoolrollService->instructor_add('1', '');
        $this->assertEquals(1802, $result);

        $result = $this->schoolrollService->instructor_add(100, 10);
        $this->assertEquals(1804, $result);

        $result = $this->schoolrollService->instructor_add(10, 100);
        $this->assertEquals(1806, $result);

        $result = $this->schoolrollService->instructor_add(5, 10);
        $this->assertEquals(1805, $result);

        $result = $this->schoolrollService->instructor_add(8, 10);
        $this->assertEquals(1803, $result);

        $result = $this->schoolrollService->instructor_add(8, 11);
        $this->assertEquals(1800, $result);

        $result = $this->schoolrollService->instructor_add(8, 11);
        $this->assertEquals(1803, $result);
    }

    public function instructor_editTest()
    {

        $result = $this->schoolrollService->instructor_edit('', '1');
        $this->assertEquals(2001, $result);

        $info = array();
        $result = $this->schoolrollService->instructor_edit(100, $info);
        $this->assertEquals(2002, $result);

        $info = array(
            'uid' => 100
        );
        $result = $this->schoolrollService->instructor_edit(3, $info);
        $this->assertEquals(2003, $result);

        $info = array(
            'uid' => 7
        );
        $result = $this->schoolrollService->instructor_edit(3, $info);
        $this->assertEquals(2004, $result);

        $info = array(
            'classid' => 100
        );
        $result = $this->schoolrollService->instructor_edit(3, $info);
        $this->assertEquals(2005, $result);

        $info = array(
            'uid' => 9,
            'classid' => 11
        );
        $result = $this->schoolrollService->instructor_edit(3, $info);
        $this->assertEquals(2006, $result);

        $info = array(
            'uid' => 10,
            'classid' => 12
        );
        $result = $this->schoolrollService->instructor_edit(3, $info);
        $this->assertEquals(2000, $result);

        $info = array(
            'uid' => 11,
            'classid' => 13
        );
        $result = $this->schoolrollService->instructor_edit(3, $info);
        $this->assertEquals(2000, $result);
    }

    public function instructor_deleteTest()
    {
        $result = $this->schoolrollService->instructor_delete('');
        $this->assertEquals(1901, $result);//

        $result = $this->schoolrollService->instructor_delete(123);
        $this->assertEquals(1902, $result);

        $result = $this->schoolrollService->instructor_delete(123);
        $this->assertEquals(1902, $result);

        $result = $this->schoolrollService->instructor_delete(5);
        $this->assertEquals(1900, $result);

    }

    public function instructor_serachTest()
    {
        $info = array();
        $info['condition']['peoplename'] = ['data' => '王艳坤', 'fuzzy' => false];
        $result = $this->schoolrollService->instructor_search($info);
        $this->assertEquals(4, count($result['data']));

        $info = array();
        $info['condition']['classname'] = ['data' => '辅导员班级5', 'fuzzy' => false];
        $result = $this->schoolrollService->instructor_search($info);
        $this->assertEquals(2, count($result['data']));

        $info = array();
        $info['condition']['classname'] = ['data' => '辅导员班级5', 'fuzzy' => false];
        $info['condition']['peoplename'] = ['data' => '王艳坤', 'fuzzy' => false];
        $result = $this->schoolrollService->instructor_search($info);
        $this->assertEquals(1, count($result['data']));


        $info = array();
        $info['condition']['peoplename'] = ['data' => '王艳坤', 'fuzzy' => false];
        $info['by'] = 'classname';
        $info['order'] = 'ASC';
        $result = $this->schoolrollService->instructor_search($info);
        $this->assertEquals(4, count($result['data']));
        $this->assertEquals('辅导员班级2', ($result['data'][0]['classname']));

        $info = array();
        $info['condition']['peoplename'] = ['data' => '王艳坤', 'fuzzy' => false];
        $info['by'] = 'classname';
        $info['order'] = 'DESC';
        $result = $this->schoolrollService->instructor_search($info);
        $this->assertEquals(4, count($result['data']));
        $this->assertEquals('辅导员班级5', ($result['data'][0]['classname']));

        $info = array();
        $info['condition']['peoplename'] = ['data' => '王艳坤', 'fuzzy' => false];
        $info['by'] = 'classname';
        $info['order'] = 'DESC';
        $info['currentpage'] = 1;
        $info['sep'] = 2;
        $result = $this->schoolrollService->instructor_search($info);
        $this->assertEquals(2, count($result['data']));
        $this->assertEquals('辅导员班级5', ($result['data'][0]['classname']));

    }

    public function student_addTest()
    {
        $info = array();
        $result = $this->schoolrollService->studentinfo_add($info);
        $this->assertEquals(2201, $result);

        $info = array(
            'studentid' => '22222222222213134325435364564',
            'classid' => 13,
            'enrollyear' => '20150912'
        );
        $result = $this->schoolrollService->studentinfo_add($info);
        $this->assertEquals(2202, $result);


        $info = array(
            'studentid' => '222222222',
            'classid' => 233,
            'enrollyear' => '20150912'
        );
        $result = $this->schoolrollService->studentinfo_add($info);
        $this->assertEquals(2203, $result);

        $info = array(
            'studentid' => '201501120704',
            'classid' => 14,
            'enrollyear' => '20150912'
        );
        $result = $this->schoolrollService->studentinfo_add($info);
        $this->assertEquals(2204, $result);


        $info = array(
            'studentid' => '201501104',
            'classid' => 14,
            'enrollyear' => '20150912'
        );
        $result = $this->schoolrollService->studentinfo_add($info);
        $this->assertEquals(2205, $result);

        $info = array(
            'studentid' => '201501121002',
            'classid' => 14,
            'enrollyear' => '201509122'
        );
        $result = $this->schoolrollService->studentinfo_add($info);
        $this->assertEquals(2206, $result);

        $info = array(
            'studentid' => '201501121002',
            'classid' => 14,
            'enrollyear' => '20150912'
        );
        $result = $this->schoolrollService->studentinfo_add($info);
        $this->assertEquals(2200, $result);


    }

    public function student_deleteTest()
    {

        $result = $this->schoolrollService->studentinfo_delete('');
        $this->assertEquals(2301, $result);//

        $result = $this->schoolrollService->studentinfo_delete(123);
        $this->assertEquals(2302, $result);

        $result = $this->schoolrollService->studentinfo_delete(1);
        $this->assertEquals(2300, $result);
    }

    public function student_editTest()
    {
        $info = array();
        $result = $this->schoolrollService->studentinfo_edit('', $info);
        $this->assertEquals(2401, $result);

        $info = array();
        $result = $this->schoolrollService->studentinfo_edit(123123123123, $info);
        $this->assertEquals(2402, $result);

        $info = array(
            'studentid' => '22222222222213134325435364564',
            'classid' => 13,
            'enrollyear' => '20150912'
        );
        $result = $this->schoolrollService->studentinfo_edit(2, $info);
        $this->assertEquals(2403, $result);


        $info = array(
            'studentid' => '201501120710',
            'classid' => 13,
            'enrollyear' => '20150912'
        );
        $result = $this->schoolrollService->studentinfo_edit(2, $info);
        $this->assertEquals(2404, $result);


        $info = array(
            'studentid' => '201501120610',
            'classid' => 144,
            'enrollyear' => '20150912'
        );
        $result = $this->schoolrollService->studentinfo_edit(2, $info);
        $this->assertEquals(2406, $result);


        $info = array(
            'studentid' => '201501120610',
            'classid' => 12,
            'enrollyear' => '201509212'
        );
        $result = $this->schoolrollService->studentinfo_edit(2, $info);
        $this->assertEquals(2407, $result);

        $info = array(
            'studentid' => '201501120610',
            'classid' => 12,
            'enrollyear' => '20150912'
        );
        $result = $this->schoolrollService->studentinfo_edit(2, $info);
        $this->assertEquals(2400, $result);
    }

    public function student_searchTest()
    {
        $info['condition']['classname'] = ['data' => '辅导员班级4', 'fuzzy' => false];
        $result = $this->schoolrollService->studentinfo_search($info);
        $this->assertEquals(2, count($result['data']));

        $info['condition']['classname'] = ['data' => '辅导员班级4', 'fuzzy' => false];
        $info['by'] = 'studentid';
        $info['order'] = 'ASC';
        $result = $this->schoolrollService->studentinfo_search($info);
        $this->assertEquals('郑明明', ($result['data'][0]['peoplename']));


        $info['condition']['classname'] = ['data' => '辅导员班级4', 'fuzzy' => false];
        $info['by'] = 'studentid';
        $info['order'] = 'DESC';
        $result = $this->schoolrollService->studentinfo_search($info);
        $this->assertEquals('仝晓盈', ($result['data'][0]['peoplename']));


    }

    public function studentid_view_by_idTest()
    {
        $result = $this->schoolrollService->studentid_view_by_id(15);

        $this->assertEquals('仝晓盈', ($result['peoplename']));

    }
}