<?php
/**
 * Created by PhpStorm.
 * User: wzq
 * Date: 2018/7/6
 * Time: 7:38 AM
 */

namespace App\Services;

use App\Repositories\SchoolRollRepository;
use App\Repositories\UserRepository;

class SchoolRollService extends BaseService
{
    protected $schoolRollRepository;

    protected $helperService;

    protected $userRepository;

    public function __construct(SchoolRollRepository $schoolRollRepository, UserRepository $userRepository, HelperService $helperService)
    {
        $this->schoolRollRepository = $schoolRollRepository;
        $this->helperService = $helperService;
        $this->userRepository = $userRepository;
    }

    function classes_add($name)
    {
        if (!isset($name) || is_null($name) || $name == '')
            return 1001;//班级名称参数不完整
        if (strlen($name) > 100)
            return 1002;//班级名称长度不能大于100
        if ($this->schoolRollRepository->classes->exist_by_condition([['name', '=', $name]]))
            return 1003;//班级名称已存在
        $this->schoolRollRepository->classes_add($name);
        return 1000;//班级添加成功
    }

    function classes_delete($id)
    {
        if (!isset($id) || is_null($id) || $id == '')
            return 1101;//班级id非法
        if (!$this->schoolRollRepository->classes->exist_by_id($id))
            return 1102;//班级id不存在
        $this->schoolRollRepository->classes_delete($id);
        return 1100;//班级删除成功
    }

    function classes_edit($id, $name)
    {
        if (!isset($id) || is_null($id) || $id == '')
            return 1201;//班级id非法
        if (!isset($name) || is_null($name) || $name == '')
            return 1204;//班级名称不能为空
        if (strlen($name) > 100)
            return 1205;//班级名称长度不能大于100
        if (!$this->schoolRollRepository->classes->exist_by_id($id))
            return 1202;//班级id不存在
        if ($this->schoolRollRepository->classes->exist_by_condition([['name', '=', $name], ['id', '!=', $id]]))
            return 1203;//班级名称已存在
        $this->schoolRollRepository->classes->update_by_id($id, ['name' => $name]);
        return 1200;//班级编辑成功
    }

    function classes_search($info)
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
        $query = $this->schoolRollRepository->classes_search($condition, $order);


        $paginate = $query->paginate($info["sep"], ['*'], 'page', $info["currentpage"]);
        $data = $paginate->toArray()['data'];
        foreach ($data as $key => $val) {
            $data[$key] = $this->helperService->array_flatten($val);
        }
        $result = array('sep' => $paginate->perPage(), 'total' => $paginate->lastPage(), 'current' => $paginate->currentPage(), 'data' => $data);

        return $result;

    }


    function semester_add($name)
    {
        if (!isset($name) || is_null($name) || $name == '')
            return 1401;//学期名称参数不完整
        if (strlen($name) > 100)
            return 1402;//学期名称长度不能大于100
        if ($this->schoolRollRepository->semester->exist_by_condition([['name', '=', $name]]))
            return 1403;//学期名称已存在
        $this->schoolRollRepository->semester_add($name);
        return 1400;//学期添加成功
    }

    function semester_delete($id)
    {
        if (!isset($id) || is_null($id) || $id == '')
            return 1501;//学期id非法
        if (!$this->schoolRollRepository->semester->exist_by_id($id))
            return 1502;//学期id不存在
        $this->schoolRollRepository->semester_delete($id);
        return 1500;//学期删除成功
    }

    function semester_edit($id, $name)
    {
        if (!isset($id) || is_null($id) || $id == '')
            return 1601;//学期id非法
        if (!isset($name) || is_null($name) || $name == '')
            return 1604;//学期名称参数不完整
        if (strlen($name) > 100)
            return 1605;//学期名称长度不能大于100
        if (!$this->schoolRollRepository->semester->exist_by_id($id))
            return 1602;//学期id不存在
        if ($this->schoolRollRepository->semester->exist_by_condition([['name', '=', $name], ['id', '!=', $id]]))
            return 1603;//学期名称已存在
        $this->schoolRollRepository->semester->update_by_id($id, ['name' => $name]);
        return 1600;//学期编辑成功
    }

    function semester_search($info)
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
        $query = $this->schoolRollRepository->semester_search($condition, $order);
        $paginate = $query->paginate($info["sep"], ['*'], 'page', $info["currentpage"]);

        $data = $paginate->toArray()['data'];
        foreach ($data as $key => $val) {
            $data[$key] = $this->helperService->array_flatten($val);
        }
        $result = array('sep' => $paginate->perPage(), 'total' => $paginate->lastPage(), 'current' => $paginate->currentPage(), 'data' => $data);

        return $result;
    }

    function instructor_add($userid, $classid)
    {
        if (!isset($userid) || is_null($userid) || $userid == '')
            return 1801;//用户id参数不完整
        if (!isset($classid) || is_null($classid) || $classid == '')
            return 1802;//班级id参数不完整
        $user_account = $this->userRepository->useraccount->get_by_id_first($userid);
        if (is_null($user_account))
            return 1804;//用户id不存在
        if ($user_account->type != 2)
            return 1805;//用户身份不是辅导员
        if (!$this->schoolRollRepository->classes->exist_by_id($classid))
            return 1806;//班级不存在
        if ($this->schoolRollRepository->instructor->exist_by_condition([['uid', '=', $userid], ['classid', '=', $classid]]))
            return 1803;//辅导员信息已存在
        $this->schoolRollRepository->instructor_add($userid, $classid);
        return 1800;//辅导员添加成功
    }

    function instructor_delete($id)
    {
        if (!isset($id) || is_null($id) || $id == '')
            return 1901;//辅导员id非法
        if (!$this->schoolRollRepository->instructor->exist_by_id($id))
            return 1902;//辅导员id不存在
        $this->schoolRollRepository->instructor_delete($id);
        return 1900;//辅导员删除成功
    }

    function instructor_edit($id, $info)
    {
        $instructorupdate = array();
        if (!isset($id) || is_null($id) || $id == '')
            return 2001;//辅导员id非法
        if (!$this->schoolRollRepository->instructor->exist_by_id($id))
            return 2002;//辅导员id不存在
        if (isset($info['uid']) && $info['uid'] != '') {
            $user_account = $this->userRepository->useraccount->get_by_id_first($info['uid']);
            if (is_null($user_account))
                return 2003;//用户id不存在
            if ($user_account->type != 2)
                return 2004;//用户身份不是辅导员
            $instructorupdate['uid'] = $info['uid'];
        }
        if (isset($info['classid']) && $info['classid'] != '') {
            if (!$this->schoolRollRepository->classes->exist_by_id($info['classid']))
                return 2005;//班级不存在
            $instructorupdate['classid'] = $info['classid'];
        }
        $instructorInfo = $this->schoolRollRepository->instructor->get_by_id_first($id);

        $instructorupdate['uid'] = isset($instructorupdate['uid']) ? $instructorupdate['uid'] : $instructorInfo['uid'];
        $instructorupdate['classid'] = isset($instructorupdate['classid']) ? $instructorupdate['classid'] : $instructorInfo['classid'];

        if ($this->schoolRollRepository->instructor->exist_by_condition([['uid', '=', $instructorupdate['uid']], ['classid', '=', $instructorupdate['classid']], ['id', '!=', $id]]))
            return 2006;//辅导员信息已存在
        $this->schoolRollRepository->instructor->update_by_id($id, $instructorupdate);
        return 2000;//学期编辑成功
    }

    function instructor_search($info)
    {
        $condition = array();
        $order = null;
        $filter = array(
            'this' => ['id', 'uid', 'classid'],
            'useraccount' => ['username'],
            'classes' => ['classname'],
            'userinfo' => ['peoplename'],
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
        $query = $this->schoolRollRepository->instructor_search($condition, $order);
        $paginate = $query->paginate($info["sep"], ['*'], 'page', $info["currentpage"]);
        $data = $paginate->toArray()['data'];
        foreach ($data as $key => $val) {
            $data[$key] = $this->helperService->array_flatten($val);
            $data[$key] ['id']=$data[$key] ['iid'];
            unset($data[$key] ['iid']);
        }

        $result = array('sep' => $paginate->perPage(), 'total' => $paginate->lastPage(), 'current' => $paginate->currentPage(), 'data' => $data);
        return $result;
    }


    function studentinfo_add($info)
    {
        if (!isset($info['classid']) || !isset($info['studentid']) || !isset($info['enrollyear']) ||
            $info['classid'] == '' || $info['studentid'] == '' || $info['enrollyear'] == '')
            return 2201;//参数不完整
        if (strlen($info['studentid']) > 20)
            return 2202;//学号长度不能大于20
        if (!$this->schoolRollRepository->classes->exist_by_id('classid'))
            return 2203;//班级id不存在
        if ($this->schoolRollRepository->studentInfo->exist_by_condition([['studentid', '=', $info['studentid']]]))
            return 2204;//该学生学籍信息已存在
        $useraccount = $this->userRepository->useraccount->get_by_condition_first([['username', '=', $info['studentid']], ['type', '=', 1]]);
        if (is_null($useraccount))
            return 2205;//该学生用户信息不存在
        $info['uid'] = $useraccount->id;
        $this->schoolRollRepository->studentInfo_add($info);
        return 2200;//学籍信息添加成功
    }

    function studentinfo_delete($id)
    {
        if (!isset($id) || is_null($id) || $id == '')
            return 2301;//学籍id非法
        if ($this->schoolRollRepository->studentInfo->exist_by_id($id))
            return 2302;//学籍信息不存在；
        $this->schoolRollRepository->studentInfo->delete_by_id($id);
        return 2300;//学籍信息删除成功
    }

    function studentinfo_edit($id, $info)
    {
        $studentinfoupdate = array();
        if (!isset($id) || is_null($id) || $id == '')
            return 2401;//学籍id非法
        if (!$this->schoolRollRepository->studentInfo->exist_by_id($id))
            return 2402;//学籍id不存在
        if (isset($info['studentid']) && $info['studentid'] != '') {
            if (strlen($info['studentid']) > 20)
                return 2403;//学号长度不能大于20
            if ($this->schoolRollRepository->studentInfo->exist_by_condition([['studentid', '=', $info['studentid']], ['id', '!=', $id]]))
                return 2404;//该学生学籍信息已存在
            $useraccount = $this->userRepository->useraccount->get_by_condition_first([['username', '=', $info['studentid']], ['type', '=', 1]]);
            if (is_null($useraccount))
                return 2405;//该学生用户信息不存在
            $studentinfoupdate['uid'] = $useraccount->id;
            $studentinfoupdate['studentid'] = $info['studentid'];
        }
        if (isset($info['classid']) && $info['classid'] != '') {
            if (!$this->schoolRollRepository->classes->exist_by_id('classid'))
                return 2406;//班级id不存在
            $studentinfoupdate['classid'] = $info['classid'];
        }
        $this->schoolRollRepository->studentInfo_change($id, $studentinfoupdate);
        return 2400;//学籍信息修改成功
    }

    function studentinfo_search($info)
    {

    }
}