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


    function search($select = null, $condition = null, $order = null)
    {
        $query = $this;
        if (!is_null($select) && isset($select['this'])) {
            $query = $query->select($select['this']);
        }

        if (!is_null($select)) {
            foreach ($select as $key => $val) {
                if ($key == 'this')
                    continue;
                //with
                $query = $query->with([$key => function ($query) use ($key, $val, $order) {
                    if (!is_null($val) && isset($val)) {
                        $query->select($val);
                    }
                }]);
                //wherehas
                $query = $query->whereHas($key, function ($query) use ($key, $condition, $order) {
                    if (!is_null($condition) && isset($condition[$key]))
                        $query->where($condition[$key]);
                    if (!is_null($order) && isset($order[$key]))
                        $query->orderBy($order[$key]['key'], $order[$key]['order']);
                });
            }
        }
        if (!is_null($condition) && isset($condition['this'])) {
            $query = $query->where($condition['this']);
        }
        if (!is_null($order) && isset($order['this'])) {
            $query = $query->orderBy($order['this']['key'], $order['this']['order']);
        }
        return $query;
    }


    function newsearch($select = null, $joined = null, $condition = null, $order = null)
    {
        $query = $this;

        foreach ($joined as $item) {
            $query = $query->leftJoin($item['table'], $item['table'] . '.' . $item['foreign'], $item['condition'], (isset($item['localtable']) ? $item['localtable'] : $this->table) . '.' . $item['local']);
        }
        $select_transformed = array();
        if (!is_null($select))

            foreach ($select as $key => $value) {
                $selected_table = $key == 'this' ? $this->table : $key;
                foreach ($value as $item) {
                    $select_transformed[] = ($key != "raw") ? ($selected_table . '.' . $item) : $item;
                }
            }
        $query = $query->select($select_transformed);
        if (!is_null($condition))
            foreach ($condition as $key => $value) {
                $selected_table = $key == 'this' ? $this->table : $key;
                foreach ($value as $item) {
                    $query = $query->where($selected_table . '.' . $item[0], $item[1], $item[2]);
                }
            }
        if (!is_null($order))
            foreach ($order as $key => $value) {
                $selected_table = $key == 'this' ? $this->table : $key;
                $query = $query->orderBy($selected_table . '.' . $value['key'], $value['order']);
                break;
            }

        return $query;
    }
}