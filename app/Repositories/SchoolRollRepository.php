<?php
/**
 * Created by PhpStorm.
 * User: wzq
 * Date: 2018/7/5
 * Time: 11:57 PM
 */

namespace App\Repositories;

use App\Models\StudentInfo;
use App\Models\Classes;
use App\Models\Semester;
use App\Models\Instructor;

class SchoolRollRepository
{
    public $classes;
    public $studentInfo;
    public $semester;
    public $instructor;

    public function __construct(Classes $classes, StudentInfo $studentInfo, Semester $semester, Instructor $instructor)
    {
        $this->classes = $classes;
        $this->studentInfo = $studentInfo;
        $this->semester = $semester;
        $this->instructor = $instructor;
    }

    function classes_add($name)
    {
        $this->classes = new Classes();
        $this->classes->name = $name;
        $this->classes->save();
        return $this->classes;
    }

    function classes_delete($id)
    {
        return $this->classes->delete_by_id($id);
    }

    function classes_changename($id, $name)
    {
        return $this->classes->update_by_id($id, ['name' => $name]);
    }

    function classes_search($condition = null, $order = 'ASC')
    {
        $join_table=[
        ];
        $query = $this->classes->newsearch(
            array(
                'this' => ['id', 'name']),
            $join_table,
            $condition,
            $order
        );
        return $query;
    }


    function semester_add($name)
    {
        $this->semester = new Semester();
        $this->semester->name = $name;
        $this->semester->save();
        return $this->semester;
    }

    function semester_delete($id)
    {
        return $this->semester->delete_by_id($id);
    }

    function semester_changename($id, $name)
    {
        return $this->semester->update_by_id($id, ['name' => $name]);
    }

    function semester_search($condition = null, $order = null)
    {
        $join_table=[
        ];
        $query = $this->semester->newsearch(
            array(
                'this' => ['id', 'name']),
            $join_table,
            $condition,
            $order
        );
        return $query;
    }


    function studentInfo_add($info)
    {
        $this->studentInfo = new StudentInfo();
        $this->studentInfo->uid = $info['uid'];
        $this->studentInfo->classid = $info['classid'];
        $this->studentInfo->studentid = $info['studentid'];
        $this->studentInfo->enrollyear = $info['enrollyear'];
        $this->studentInfo->save();
        return $this->studentInfo;
    }

    function studentInfo_delete($id)
    {
        return $this->studentInfo->delete_by_id($id);
    }

    function studentInfo_change($id, $info)
    {
        return $this->studentInfo->update_by_id($id, $info, 'id');
    }

    function studentInfo_search($condition = null, $order = null)
    {
        $join_table=[
            ['table'=>'Classes','foreign'=>'id','local'=>"classid",'condition'=>"="],
            ['table'=>'UserInfo','foreign'=>'uid','local'=>"uid",'condition'=>"="],
        ];
        $query = $this->studentInfo->newsearch(
            array(
                'Classes' => [ 'name as classname'],
                'UserInfo' => ['name as peoplename','identity','sex','hobby','birthday','nativeplace'],
                'this' => ['id', 'uid', 'classid','studentid','enrollyear']),
            $join_table,
            $condition,
            $order
        );
        return $query;
    }

    function instructor_add($uid, $classid)
    {
        $this->instructor = new Instructor();
        $this->instructor->uid = $uid;
        $this->instructor->classid = $classid;
        $this->instructor->save();
        return $this->instructor;
    }

    function instructor_delete($id)
    {
        return $this->instructor->delete_by_id($id);
    }

    function instructor_change($id, $info)
    {
        return $this->instructor->update_by_id($id, $info, 'id');
    }

    function instructor_search($condition = null, $order = null)
    {
        $join_table=[
            ['table'=>'UserAccount','foreign'=>'id','local'=>"uid",'condition'=>"="],
            ['table'=>'Classes','foreign'=>'id','local'=>"classid",'condition'=>"="],
            ['table'=>'UserInfo','foreign'=>'uid','local'=>"uid",'condition'=>"="],
        ];
        $query = $this->instructor->newsearch(
            array(
                'UserAccount' => ['username as username'],
                'Classes' => ['name as classname'],
                'UserInfo' => ['name as peoplename'],
                'this' => ['id', 'uid', 'classid']),
            $join_table,
            $condition,
            $order
        );
        return $query;
    }


}