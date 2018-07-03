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
    private function hash($password){
        return md5($password.$this->salt);
    }

    public function __construct(UserInfo $userinfo,UserAccount $useraccount)
    {
        $this->userinfo = $userinfo;
        $this->useraccount = $useraccount;
    }

    public function get_login_user($login_name, $login_pass, $type = 0)
    {
        return $this->useraccount->where("username", $login_name)
            ->where('password', $this->hash($login_pass))
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
        $this->useraccount=new UserAccount();
        $this->useraccount->username=$info["username"];
        $this->useraccount->password=md5($info["password"]);
        $this->useraccount->type=$info["type"];
        return $this->useraccount->save();
    }

    public function add_userinfo($info)
    {
        $this->userinfo=new UserInfo();
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

    public function change_password($id,$password){
        $account=$this->useraccount->find($id);
        $account->password=$this->hash($password);
        return $account->save();
    }
    public function reset_password($id){
        $userinfo=$this->userinfo->where('uid',$id)->first();
        $account=$this->useraccount->find($id);
        $account->password=$this->hash($userinfo->identity);
        return $account->save();
    }

    public function change_hobby($id,$hobby){
        $account=$this->useraccount->find($id);
        $account->hobby=$hobby;
        return $account->save();
    }

    public function get_by_condition(){

    }





}