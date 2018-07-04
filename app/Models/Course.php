<?php
/**
 * Created by PhpStorm.
 * User: wzq
 * Date: 2018/7/3
 * Time: 10:17 AM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends BaseModel
{
    protected $table = 'Course';

    public function coursescore()
    {
        return $this->hasMany("App\Models\CourseScore", "courseid", "id");
    }
}