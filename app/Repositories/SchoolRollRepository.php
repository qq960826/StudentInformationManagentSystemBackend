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

    function classes_search($condition = null, $orderby = null, $order = 'ASC')
    {
        $res_query = $this->classes
            ->select('id', 'name');
        if (!is_null($condition))
            $res_query = $res_query->where($condition);
        if (!is_null($orderby) && isset($orderby['method']) && $orderby['method'] = 'classes' && $orderby['key'] != '')
            $res_query->orderBy($orderby['key'], $order);
        return $res_query;
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

    function semester_search($condition = null, $orderby = null, $order = 'ASC')
    {
        $res_query = $this->semester
            ->select('id', 'name');
        if (!is_null($condition))
            $res_query = $res_query->where($condition);
        if (!is_null($orderby) && isset($orderby['method']) && $orderby['method'] = 'semester' && $orderby['key'] != '')
            $res_query->orderBy($orderby['key'], $order);
        return $res_query;
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

    function studentInfo_search($condition = null, $orderby = null, $order = 'ASC')
    {
//        $res_query = $this->useraccount
//
//        if (!is_null($condition))
//            $res_query = $res_query->where($condition);
//        if (!is_null($orderby) && isset($orderby['method']) && $orderby['method'] = 'useraccount' && $orderby['key'] != '')
//            $res_query->orderBy($orderby['key'], $order);
//        return $res_query;
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

    function instructor_search(){
        
    }
}