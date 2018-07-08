<?php
/**
 * Created by PhpStorm.
 * User: wzq
 * Date: 2018/7/3
 * Time: 10:16 AM
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentInfo extends BaseModel
{
    protected $table = 'StudentInfo';
    public function useraccount()
    {
        return $this->hasOne("App\Models\UserAccount","id","uid");
    }
    public function classes()
    {
        return $this->hasOne("App\Models\Classes","id","classid");
    }
    public function userinfo(){
        return $this->hasOne("App\Models\UserInfo","id","uid");

    }
}