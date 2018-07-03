<?php
/**
 * Created by PhpStorm.
 * User: wzq
 * Date: 2018/7/3
 * Time: 10:17 AM
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class CourseScore extends Model
{
    protected $table = 'CourseScore';
    public function useraccount(){
        return $this->belongsTo("App\Models\UserAccount","id","uid");
    }
    public function course(){
        return $this->belongsTo("App\Models\Course","id","courseid");
    }
    public function semester(){
        return $this->belongsTo("App\Models\Semester","id","semesterid");
    }
}