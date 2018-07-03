<?php
/**
 * Created by PhpStorm.
 * User: wzq
 * Date: 2018/7/2
 * Time: 9:40 PM
 */

namespace App\Services;


abstract class BaseService
{
    protected $model;
    protected function message($condition, $message, $data=null) {
        $result = array();
        $result['condition'] = intval($condition);
        $result['message']   = $message;
        if(!is_null($data) && is_array($data)) {
            foreach ($data as $key => $val)
                $result[$key] = $data[$key];
        }
        return $result;
    }
    public function get_by_id($id) {
        return $this->model->find($id);
    }
    public function delete($id) {
        return $this->model->get_by_id($id)->delete();
    }


}