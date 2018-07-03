<?php
/**
 * Created by PhpStorm.
 * User: wzq
 * Date: 2018/7/3
 * Time: 10:12 AM
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class UserAccount extends Model
{
    protected $table = 'UserAccount';
    public function userinfo(){
        return $this->hasOne("App\Models\UserInfo","uid","id");
    }
    public function studentinfo(){
        return $this->hasOne("App\Models\StudentInfo","uid","id");
    }
    public function coursescore(){
        return $this->hasMany("App\Models\CourseScore","uid","id");
    }
    public function instructor(){
        return $this->hasMany("App\Models\Instructor","uid","id");
    }

}