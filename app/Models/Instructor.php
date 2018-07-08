<?php
/**
 * Created by PhpStorm.
 * User: wzq
 * Date: 2018/7/3
 * Time: 10:14 AM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructor extends BaseModel
{
    protected $table = 'Instructor';

    public function useraccount()
    {
        return $this->hasOne("App\Models\UserAccount", "id", "uid");
    }

    public function classes()
    {
        return $this->hasOne('App\Models\Classes', 'id', 'classid');
    }

    public function userinfo()
    {
        return $this->hasOne('App\Models\UserInfo', 'uid', 'uid');
    }
}