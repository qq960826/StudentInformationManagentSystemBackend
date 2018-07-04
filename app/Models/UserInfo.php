<?php
/**
 * Created by PhpStorm.
 * User: wzq
 * Date: 2018/7/3
 * Time: 10:11 AM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends BaseModel
{
    protected $table = 'UserInfo';

    public function useraccount()
    {
        return $this->belongsTo("App\Models\UserAccount", "uid", "id");
    }

}