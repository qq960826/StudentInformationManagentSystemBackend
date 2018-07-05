<?php
/**
 * Created by PhpStorm.
 * User: wzq
 * Date: 2018/7/4
 * Time: 11:25 AM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $hidden = ['created_at', 'updated_at'];

    public function get_by_id($id, $idname = 'id')
    {
        return $this->get_by_condition([[$idname, '=', $id]]);
    }

    public function get_by_id_first($id, $idname = 'id')
    {
        return $this->get_by_id($id, $idname)->first();
    }

    public function get_by_condition($condition)
    {
        return $this->where($condition);
    }

    public function get_by_condition_first($condition)
    {
        return $this->get_by_condition($condition)->first();
    }

    public function delete_by_condition($id)
    {
        return $this->delete_by_condition($id)->delete();
    }

    public function delete_by_id($id, $idname = 'id')
    {
        return $this->get_by_id($id, $idname)->delete();
    }

    public function exist_by_condition($condition)
    {
        return !is_null($this->get_by_condition_first($condition));
    }

    public function exist_by_id($id, $idname = 'id')
    {
        return !is_null($this->get_by_id_first($id, $idname));
    }

    public function update_by_id($id, $content, $idname = 'id')
    {
        return $this->get_by_id($id, $idname)->update($content);
    }
}