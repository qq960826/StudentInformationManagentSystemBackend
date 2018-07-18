<?php
/*/**
 * Created by PhpStorm.
 * User: wzq
 * Date: 2018/7/3
 * Time: 10:09 AM
 */

namespace App\Repositories;

use App\Models\UserInfo;
use App\Models\UserAccount;
use App\Services\HelperService;

class UserRepository extends BaseRepository
{
    public $userinfo;
    public $useraccount;
    public $helperService;

    public function __construct(UserInfo $userinfo, UserAccount $useraccount, HelperService $helperService)
    {
        $this->userinfo = $userinfo;
        $this->useraccount = $useraccount;
        $this->helperService = $helperService;

    }

    public function get_login_user($login_name, $login_pass, $type = 0)
    {
        return $this->useraccount->where("username", $login_name)
            ->where('password', $this->helperService->hash($login_pass))
            ->where('type', $type)
            ->first();
    }


    public function add_useraccount($info)
    {
        $this->useraccount = new UserAccount();
        $this->useraccount->username = $info["username"];
        $this->useraccount->password = $this->helperService->hash($info["password"]);
        $this->useraccount->type = $info["type"];
        $this->useraccount->save();
        return $this->useraccount;
    }

    public function add_userinfo($info)
    {
        $this->userinfo = new UserInfo();
        $this->userinfo->uid = $info["uid"];
        $this->userinfo->name = $info["name"];
        $this->userinfo->sex = $info["sex"];
        $this->userinfo->identity = $info["identity"];
        $this->userinfo->birthday = $info["birthday"];
        $this->userinfo->nativeplace = $info["nativeplace"];
        $this->userinfo->hobby = $info["hobby"];
        return $this->userinfo->save();
    }

    public function add_user($info)
    {
        $userinfo = $this->add_useraccount($info);
        $info['uid'] = $userinfo->id;
        return $this->add_userinfo($info);
    }

    public function delete_user($id)
    {
        return $this->useraccount->delete_by_id($id);
    }

    public function change_password($id, $password)
    {
        $account = $this->useraccount->find($id);
        $account->password = $this->helperService->hash($password);
        return $account->save();
    }

    public function reset_password($id)
    {
        $userinfo = $this->userinfo->where('uid', $id)->first();
        $account = $userinfo->useraccount()->first();
        $account->password = $this->helperService->hash($userinfo->identity);
        return $account->save();
    }

    public function change_hobby($id, $hobby)
    {
//        $userinfo = $this->userinfo->get_by_id_first($id,'uid');
//        $userinfo->hobby = $hobby;

        return $this->change_userinfo($id,['hobby'=>$hobby]);
    }

    public function change_userinfo($id, $info)
    {
        return $this->userinfo->update_by_id($id, $info, 'uid');
    }

    public function change_useraccount($id, $info)
    {
        return $this->useraccount->update_by_id($id, $info, 'id');
    }

    public function search_user($condition = null, $order=null)
    {

        $join_table=[
            ['table'=>'UserInfo','foreign'=>'uid','local'=>"id",'condition'=>"="],
        ];
        $query = $this->useraccount->newsearch(
            array(
                'UserInfo' => ['uid', 'name', 'identity', 'sex', 'nativeplace', 'birthday','hobby'],
                'this' => ['type', 'username']),
            $join_table,
            $condition,
            $order
        );
        return $query;
    }

    public function view_info($id)
    {
        $res_query = $this->useraccount->with('userinfo')->where([['id', '=', $id]])->first();
        return $res_query;
    }
}
