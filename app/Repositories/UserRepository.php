<?php
/**
 * Created by PhpStorm.
 * User: wzq
 * Date: 2018/7/3
 * Time: 10:09 AM
 */
namespace App\Repositories;
use App\Models\UserInfo;
use App\Models\UserAccount;

class UserRepository extends BaseRepository
{
    protected $userinfo;
    protected $useraccount;
    public function __construct(UserInfo $userinfo,UserAccount $useraccount) {
        $this->userinfo = $userinfo;
        $this->useraccount = $useraccount;}

    public function delete($id)
    {

    }

    public function get_login_user($login_name, $login_pass, $type = 0)
    {
        return $this->model->where("username", $login_name)
            ->where('hash', $login_pass)
            ->first();
    }

}