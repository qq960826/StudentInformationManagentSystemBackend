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
    protected $salt="q23esdatgf43g6yrtdcvweqrfhgetryg2435132sdhgesdgt34";
    public function __construct(UserInfo $userinfo,UserAccount $useraccount)
    {
        $this->userinfo = $userinfo;
        $this->useraccount = $useraccount;
    }


    public function get_login_user($login_name, $login_pass, $type = 0)
    {
        return $this->useraccount->where("username", $login_name)
            ->where('password', md5($login_pass.$this->salt))
            ->where('type',$type)
            ->first();
    }

    public function get_userinfo_by_id($id)
    {
        return $this->userinfo
            ->where('uid',$id)
            ->first();
    }

    public function get_useraccount_by_id($id)
    {
        return $this->useraccount
            ->where('id',$id)
            ->first();
    }

    public function add_useraccount($info)
    {
        $this->useraccount->username=$info["username"];
        $this->useraccount->password=md5($info["password"]);
        $this->useraccount->type=$info["type"];
        return $this->useraccount->save();
    }

    public function add_userinfo($info)
    {
        $this->userinfo->uid=$info["uid"];
        $this->userinfo->name=$info["name"];
        $this->userinfo->sex=$info["sex"];
        $this->userinfo->identity=$info["identity"];
        $this->userinfo->birthday=$info["birthday"];
        $this->userinfo->nativeplace=$info["nativeplace"];
        $this->userinfo->hobby=$info["hobby"];
        return $this->userinfo->save();
    }

    public function add_user($info)
    {
        $userinfo=$this->add_useraccount($info);
        $info['uid']=$userinfo->id;
        return $this->add_useraccount($info);
    }

    public function delete_user($id){
        return $this->useraccount->find($id)->delete();
    }




}