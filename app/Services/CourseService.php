<?php
/**
 * Created by PhpStorm.
 * User: wzq
 * Date: 2018/7/9
 * Time: 10:37 AM
 */

namespace App\Services;

use App\Repositories\CourseRepository;
use App\Repositories\SchoolRollRepository;
use App\Repositories\UserRepository;


class CourseService extends BaseService
{
    protected $courseRepository;

    protected $helperService;

    protected $userRepository;

    protected $schoolRollRepository;

    public function __construct(CourseRepository $courseRepository, HelperService $helperService, UserRepository $userRepository, SchoolRollRepository $schoolRollRepository)
    {
        $this->courseRepository = $courseRepository;
        $this->helperService = $helperService;
        $this->userRepository = $userRepository;
        $this->schoolRollRepository = $schoolRollRepository;
    }

    function course_add($name)
    {
        if (!isset($name) || is_null($name) || $name == '')
            return 2601;//课程名称参数不完整
        if (strlen($name) > 100)
            return 2602;//课程名称长度不能大于100
        if ($this->courseRepository->course->exist_by_condition([['name', '=', $name]]))
            return 2603;//课程名称已存在
        $this->courseRepository->course_add($name);
        return 2600;//课程添加成功
    }

    function course_delete($id)
    {
        if (!isset($id) || is_null($id) || $id == '')
            return 2701;//课程id非法
        if (!$this->courseRepository->course->exist_by_id($id))
            return 2702;//课程id不存在
        $this->courseRepository->course_delete($id);
        return 2700;//课程删除成功
    }

    function course_edit($id, $name)
    {
        if (!isset($id) || is_null($id) || $id == '')
            return 2801;//课程id非法
        if (!isset($name) || is_null($name) || $name == '')
            return 2804;//课程名称不能为空
        if (strlen($name) > 100)
            return 2805;//课程名称长度不能大于100
        if (!$this->courseRepository->course->exist_by_id($id))
            return 2802;//课程id不存在
        if ($this->courseRepository->course->exist_by_condition([['name', '=', $name], ['id', '!=', $id]]))
            return 2803;//课程名称已存在
        $this->courseRepository->course->update_by_id($id, ['name' => $name]);
        return 2800;//课程编辑成功
    }

    function course_search($info)
    {
        $condition = array();
        $order = null;
        $filter = array(
            'this' => ['id', 'name']
        );
        if (!isset($info["currentpage"]) || $info["currentpage"] == '')
            $info["currentpage"] = 0;
        if (!isset($info["sep"]) || $info["sep"] == '')
            $info["sep"] = 50;
        if (isset($info["condition"])) {
            $condition = $this->condition_process($filter, $info["condition"]);
        }
        if (isset($info["by"])) {
            $order = $this->order_process($filter, $info);
        }
        $query = $this->courseRepository->course_search($condition, $order);


        $paginate = $query->paginate($info["sep"], ['*'], 'page', $info["currentpage"]);
        $data = $paginate->toArray()['data'];
        $result = array('sep' => $paginate->perPage(), 'total' => $paginate->lastPage(), 'current' => $paginate->currentPage(), 'data' => $data);

        return $result;
    }


    function coursescore_add($info)
    {
        if (!isset($info['uid']) || !isset($info['courseid']) || !isset($info['semesterid']) || !isset($info['score']) ||
            $info['uid'] == '' || $info['courseid'] == '' || $info['semesterid'] == '' || $info['score'] == '')
            return 3001;//用户id参数不完整
        $user_account = $this->schoolRollRepository->studentInfo->get_by_id_first($info['uid'], 'uid');
        if (is_null($user_account))
            return 3002;//学生id不存在
        if (!$this->schoolRollRepository->semester->exist_by_id($info['semesterid']))
            return 3003;//学期不存在
        if (!$this->courseRepository->course->exist_by_id($info['courseid']))
            return 3004;//课程不存在
        if ($this->courseRepository->courseScore->exist_by_condition([['uid', '=', $info['uid']], ['courseid', '=', $info['courseid']]]))
            return 3005;//课程成绩已存在
        $this->courseRepository->coursescore_add($info['uid'], $info['courseid'], $info['semesterid'], $info['score']);
        return 3000;//课程成绩添加成功
    }

    function coursescore_delete($id)
    {
        if (!isset($id) || is_null($id) || $id == '')
            return 3101;//成绩成绩id非法
        if (!$this->courseRepository->courseScore->exist_by_id($id))
            return 3102;//成绩成绩id不存在
        $this->courseRepository->coursescore_delete($id);
        return 3100;//成绩删除成功
    }

    function coursescore_edit($id, $info)
    {
        $courseupdate = array();
        if (!isset($id) || is_null($id) || $id == '')
            return 3201;//成绩id非法
        if (!$this->courseRepository->courseScore->exist_by_id($id))
            return 3202;//成绩id不存在
        if (isset($info['uid']) && $info['uid'] != '') {
            $user_account = $this->schoolRollRepository->studentInfo->get_by_id_first($info['uid'], 'uid');
            if (is_null($user_account))
                return 3203;//学生id不存在
            $courseupdate['uid'] = $info['uid'];
        }
        if (isset($info['semesterid']) && $info['semesterid'] != '') {
            if (!$this->schoolRollRepository->semester->exist_by_id($info['semesterid']))
                return 3204;//学期不存在
            $courseupdate['semesterid'] = $info['semesterid'];
        }
        if (isset($info['courseid']) && $info['courseid'] != '') {
            if (!$this->courseRepository->course->exist_by_id($info['courseid']))
                return 3205;//课程不存在
            $courseupdate['courseid'] = $info['courseid'];
        }
        $coursescoreInfo = $this->courseRepository->courseScore->get_by_id_first($id);

        $courseupdate['uid'] = isset($courseupdate['uid']) ? $courseupdate['uid'] : $coursescoreInfo['uid'];
        $courseupdate['courseid'] = isset($courseupdate['courseid']) ? $courseupdate['courseid'] : $coursescoreInfo['courseid'];

        if ($this->courseRepository->courseScore->exist_by_condition([['uid', '=', $courseupdate['uid']], ['courseid', '=', $courseupdate['courseid']], ['id', '!=', $id]]))
            return 3206;//该成绩信息已存在
        $this->courseRepository->courseScore->update_by_id($id, $courseupdate);
        return 3200;//成绩编辑成功
    }

    function coursescore_search($info, $ispaginate = true)
    {
        $condition = array();
        $order = null;
        $filter = array(
            'this' => ['id', 'uid', 'courseid', 'semesterid'],
            'StudentInfo' => ['studentid', 'enrollyear'],
            'Semester' => ['semestername' => 'name'],
            'Classes' => ['classname' => 'name'],
            'Course' => ['coursename' => 'name'],
            'UserInfo' => ['peoplename' => 'name'],
        );
        if (!isset($info["currentpage"]) || $info["currentpage"] == '')
            $info["currentpage"] = 0;
        if (!isset($info["sep"]) || $info["sep"] == '')
            $info["sep"] = 50;
        if (isset($info["condition"])) {
            $condition = $this->condition_process($filter, $info["condition"]);
        }
        if (isset($info["by"])) {
            $order = $this->order_process($filter, $info);
        }
        $query = $this->courseRepository->coursescore_search($condition, $order);
        if ($ispaginate) {
            $paginate = $query->paginate($info["sep"], ['*'], 'page', $info["currentpage"]);
            $data = $paginate->toArray()['data'];
            $result = array('sep' => $paginate->perPage(), 'total' => $paginate->total(), 'laspage' => $paginate->lastPage(), 'current' => $paginate->currentPage(), 'data' => $data);
        } else {
            $data = $query->get()->toArray();
            $result = array('data' => $data);
        }
        return $result;
    }

    public function coursescore_view_by_uid($id)
    {
        $parameter = array();
        $parameter['condition']['uid'] = array('data' => $id, 'fuzzy' => false);
        $parameter['by'] = 'courseid';
        $parameter['order'] = 'ASC';
        $data = $this->coursescore_search($parameter);
        $result = $data['data'];
        return $result;
    }

    public function coursescore_rank_list_single_view_by_class($info)

    {

        if (!isset($info['courseid']) || !isset($info['classid']) || $info['courseid'] == '' || $info['classid'] == '') {
            return 3601;//用户id参数不完整
        }
        if (!$this->courseRepository->course->exist_by_id($info['courseid']))
            return 3602;//课程不存在
        if (!$this->schoolRollRepository->classes->exist_by_id($info['classid']))
            return 3603;//班级不存在
        $query=$this->courseRepository->coursescore_sum($info,0);
        $data=$query->get()->toArray();
        return $data;
    }

    public function coursescore_rank_list_semester_view_by_class($info)
    {
        if (!isset($info['semesterid']) || !isset($info['classid']) || $info['semesterid'] == '' || $info['classid'] == '') {
            return 3601;//用户id参数不完整
        }
        if (!$this->schoolRollRepository->semester->exist_by_id($info['semesterid']))
            return 3602;//学期不存在
        if (!$this->schoolRollRepository->classes->exist_by_id($info['classid']))
            return 3603;//班级不存在
        $query=$this->courseRepository->coursescore_sum($info,1);
        $data=$query->get()->toArray();
        return $data;
    }

    public function coursescore_rank_list_all_view_by_class($info)
    {
        if (!isset($info['classid'])||  $info['classid'] == '')
            return 3601;//用户id参数不完整
        if (!$this->schoolRollRepository->classes->exist_by_id($info['classid']))
            return 3603;//班级不存在
        $query=$this->courseRepository->coursescore_sum($info,3);
        $data=$query->get()->toArray();
        return $data;
    }

    public function coursescore_rank_list_single_view_by_id($info,$uid){
        if (is_null($uid)||$uid=='')
            return 3605;//用户id不存在
        $data=$this->coursescore_rank_list_single_view_by_class($info);
        if(!is_array($data))
            return $data;
        foreach ($data as $index=>$value){
            if($uid==$value['uid']){
                return array('rank'=>$index+1);
            }
        }
        return 3604;//用户成绩不存在
    }

    public function coursescore_rank_list_semester_view_by_id($info,$uid){
        if (is_null($uid)||$uid=='')
            return 3605;//用户id不存在
        $data=$this->coursescore_rank_list_semester_view_by_class($info);
        if(!is_array($data))
            return $data;
        foreach ($data as $index=>$value){
            if($uid==$value['uid']){
                return array('rank'=>$index+1);
            }
        }
        return 3604;//用户成绩不存在
    }

    public function coursescore_rank_list_all_view_by_class($info,$uid){
        if (is_null($uid)||$uid=='')
            return 3605;//用户id不存在
        $data=$this->coursescore_rank_list_semester_view_by_class($info);
        if(!is_array($data))
            return $data;
        foreach ($data as $index=>$value){
            if($uid==$value['uid']){
                return array('rank'=>$index+1);
            }
        }
        return 3604;//用户成绩不存在
    }
}


