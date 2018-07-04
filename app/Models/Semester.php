<?php
/**
 * Created by PhpStorm.
 * User: wzq
 * Date: 2018/7/3
 * Time: 10:17 AM
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Semester extends BaseModel
{
    protected $table = 'Semester';
    public function coursescore(){
        return $this->hasMany("App\Models\Semester","semesterid","id");
    }
}