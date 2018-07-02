<?php
/**
 * Created by PhpStorm.
 * User: wzq
 * Date: 2018/7/2
 * Time: 9:40 PM
 */

namespace App\Services;


class BaseService
{
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
}