<?php
/**
 * Created by PhpStorm.
 * User: wzq
 * Date: 2018/7/3
 * Time: 6:40 PM
 */

namespace App\Services;
use App\Repositories\UserRepository;

class UserService
{
    protected $userRepository;
    public function __construct(UserRepository $userRepository){
        $this->userRepository=$userRepository;
    }
    public function login($info){
        if (!isset($info['username']) || !isset($info['password']) || !isset($info['type']))
            return 103;
        $user=$this->userRepository->get_login_user($info['username'],$info['password'],intval($info['type']));
        if(is_null($user))
            return 101;
        if($user->locked==true)
            return 102;
        return 100;
    }
    public function delete($id){
        if(!isset($id))
            return 201;
        if($this->userRepository->delete_user($id))
            return 202;
        return 200;
    }
    public function changeselfpassword($id,$oldpassword,$newpassword){
//        if ()
    }

}