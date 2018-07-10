<?php
/**
 * Created by PhpStorm.
 * User: wzq
 * Date: 2018/7/9
 * Time: 10:33 AM
 */

namespace App\Repositories;

use App\Models\Course;

use App\Models\CourseScore;

class CourseRepository extends BaseRepository
{
    public $course;
    public $courseScore;

    public function __construct(Course $course, CourseScore $courseScore)
    {
        $this->course = $course;
        $this->courseScore = $courseScore;
    }

    function course_add($name)
    {
        $this->course = new Course();
        $this->course->name = $name;
        $this->course->save();
        return $this->course;
    }

    function course_delete($id)
    {
        return $this->course->delete_by_id($id);
    }

    function course_changename($id, $name)
    {
        return $this->course->update_by_id($id, ['name' => $name]);
    }

    function course_search($condition = null, $order = 'ASC')
    {
        $join_table = [
        ];
        $query = $this->course->newsearch(
            array(
                'this' => ['id', 'name']),
            $join_table,
            $condition,
            $order
        );
        return $query;
    }

    function coursescore_add($uid, $courseid, $semesterid, $score)
    {
        $this->courseScore = new CourseScore();
        $this->courseScore->uid = $uid;
        $this->courseScore->courseid = $courseid;
        $this->courseScore->semesterid = $semesterid;
        $this->courseScore->score = $score;
        $this->courseScore->save();
    }

    function coursescore_delete($id)
    {
        return $this->courseScore->delete_by_id($id);
    }

    function coursescore_update($id, $info)
    {
        return $this->courseScore->update_by_id($id, $info, 'id');
    }

    function coursescore_search($condition = null, $order = null)
    {
        $join_table=[
            ['table'=>'Course','foreign'=>'id','local'=>"courseid",'condition'=>"="],
            ['table'=>'UserInfo','foreign'=>'uid','local'=>"uid",'condition'=>"="],
            ['table'=>'StudentInfo','foreign'=>'uid','local'=>"uid",'condition'=>"="],
            ['table'=>'Classes','foreign'=>'id','localtable'=>'StudentInfo','local'=>"classid",'condition'=>"="],
            ['table'=>'Semester','foreign'=>'id','local'=>"semesterid",'condition'=>"="],



        ];
        $query = $this->courseScore->newsearch(
            array(
                'Classes' => [ 'name as classname','id as classid'],
                'UserInfo' => ['name as peoplename'],
                'StudentInfo' => ['studentid','enrollyear'],
                'Semester'=>['name as semestername',],
                'Course'=>['name as coursename'],
                'this'=>['id','courseid','semesterid','score']
            ),

            $join_table,
            $condition,
            $order
        );
        return $query;
    }


}