<?php
/**
 * Created by PhpStorm.
 * User: wzq
 * Date: 2018/7/3
 * Time: 10:16 AM
 */
use Illuminate\Database\Eloquent\Model;

class StudentInfo extends BaseModel
{
    protected $table = 'StudentInfo';
    public function useraccount()
    {
        return $this->belongsTo("App\Models\UserAccount","id","uid");
    }
    public function classes()
    {
        return $this->belongsTo("App\Models\Classes","id","classid");
    }
}