<?php
/**
 * Created by PhpStorm.
 * User: wzq
 * Date: 2018/7/3
 * Time: 10:13 AM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends BaseModel
{
    protected $table = 'Classes';

    public function instructor()
    {
        return $this->belongsTo('App\Model\Instructor', 'classid', 'id');
    }

    public function studentinfo()
    {
        return $this->hasMany('App\Model\StudentInfo', 'classid', 'id');
    }

}