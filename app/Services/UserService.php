<?php
/**
 * Created by PhpStorm.
 * User: wzq
 * Date: 2018/7/3
 * Time: 6:40 PM
 */

namespace App\Services;

use App\Models\UserAccount;
use App\Models\UserInfo;

use App\Repositories\UserRepository;
use App\Services\HelperService;
use App\Services\BaseService;

class UserService extends BaseService
{
    protected $userRepository;
    protected $helperService;

    public function __construct(UserRepository $userRepository, HelperService $helperService)
    {
        $this->userRepository = $userRepository;
        $this->helperService = $helperService;

    }

    public function login($info)
    {
        if (!isset($info['username']) || !isset($info['password']) || !isset($info['type']))
            return 103;
        $user = $this->userRepository->get_login_user($info['username'], $info['password'], intval($info['type']));
        if (is_null($user))
            return 101;
        if ($user->locked == true)
            return 102;
        return 100;
    }

    public function delete($id)
    {
        if (!isset($id))
            return 201;
        if ($this->userRepository->delete_user($id))
            return 202;
        return 200;
    }

    public function changespassword($id, $oldpassword, $newpassword)
    {
        if (!isset($id) || !isset($oldpassword) || !isset($newpassword) || $id == '' || $oldpassword == '' || $newpassword == '')
            return 304;
        if (strlen($newpassword) > 32 || strlen($newpassword) < 6)
            return 303;
        if (!$this->userRepository->useraccount->exist_by_id($id))
            return 302;
        $user = $this->userRepository->useraccount->get_by_id_first($id);
        if ($user->password != $this->helperService->hash($oldpassword))
            return 301;
        $this->userRepository->change_password($id, $newpassword);
        return 300;

    }

    public function resetpassword($id)
    {
        if (!isset($id) || $id == '')
            return 401;
        if (!$this->userRepository->useraccount->exist_by_id($id))
            return 402;
        $user = $this->userRepository->useraccount->get_by_id_first($id);
        $userinfo = $user->userinfo()->first();
        if (!isset($userinfo->identity) || $userinfo->identity == '')
            return 403;
        $this->userRepository->reset_password($id);
        return 400;
    }

    public function adduser($info)
    {
        if (!isset($info['username']) || !isset($info['name']) || !isset($info['identity']) || !isset($info['nativeplace']) || !isset($info['type']) || $info['username'] == '' || $info['name'] == '' || $info['identity'] == '' || $info['nativeplace'] == '')
            return 505;//参数不完整
        if (strlen($info['username']) > 16)
            return 506;//用户名长度超过16
        if (strlen($info['name']) > 16)
            return 507;//姓名长度超过16
        if (strlen($info['nativeplace']) > 20)
            return 508;//籍贯长度超过20
        if (!$this->helperService->idcard_checks($info['identity']))
            return 503;//身份证不合法
        if ($this->userRepository->userinfo->exist_by_condition([['identity', '=', $info['identity']]]))
            return 502;//身份证已注册
        if ($this->userRepository->useraccount->exist_by_condition([['username', '=', $info['username']]]))
            return 504;//用户名已存在
        if (intval($info['type']) < 0 || intval($info['type']) > 3)
            return 509;//角色类型不合法
        $info['hobby'] = isset($info['hobby']) ? $info['hobby'] : "";
        if (strlen($info['hobby']) >= 100)
            return 510;
        $info['sex'] = $this->helperService->idcard_get_sex($info['identity']);
        $info['birthday'] = $this->helperService->idcard_get_birthday($info['identity']);
        $info['password'] = $info['identity'];
        $info['type'] = intval($info['type']);

        $this->userRepository->add_user($info);
        return 500;
    }

    public function deleteuser($id)
    {
        if (!$this->userRepository->useraccount->exist_by_condition([['id', '=', $id]]))
            return 601;//用户不存在
        $this->userRepository->useraccount->get_by_id($id)->delete();
        return 600;
    }

    public function changehobby($id, $hobby)
    {
        if (!$this->userRepository->useraccount->exist_by_condition([['id', '=', $id]]))
            return 701;//用户不存在
        $hobby = (!isset($hobby) || $hobby == '') ? '' : $hobby;
        if (strlen($hobby) > 100)
            return 702;//爱好长度不能超过100
        $this->changehobby($id, $hobby);
        return 700;//爱好修改成功
    }

    public function viewinfo($id)
    {
        if (!$this->userRepository->useraccount->exist_by_id($id) || !$this->userRepository->userinfo->exist_by_id($id, 'uid'))
            return 801;//用户不存在
        $useraccount = ($this->userRepository->useraccount->get_by_id_first($id));
        $userinfo = $useraccount->userinfo()->first();
        $result_userinfo = $userinfo->makeHidden(['uid'])->toArray();
        $result_useraccount = $useraccount->makeHidden(['password', 'locked'])->toArray();
        $this->setdata(array_merge($result_useraccount, $result_userinfo));
        return 800;
    }


}