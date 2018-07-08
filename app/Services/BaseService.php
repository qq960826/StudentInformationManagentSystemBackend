<?php
/**
 * Created by PhpStorm.
 * User: wzq
 * Date: 2018/7/4
 * Time: 4:13 PM
 */

namespace App\Services;


class BaseService
{
    protected $data;

    public function setdata($data)
    {
        $this->data = $data;
    }

    public function getdata()
    {
        return $this->data;
    }

    function condition_process($filter, $condition)
    {
        $result = array();
        foreach ($condition as $condition_key => $condition_value) {
            foreach ($filter as $filter_key => $filter_value) {
                if (in_array($condition_key, $filter_value)) {
                    $temp = $this->condition_translate($condition_key,$condition_value);
                    if (!is_null($temp))
                        $result[$filter_key][] = $temp;
                }
            }
        }
        return $result;
    }

    function order_process($filter, $order)
    {
        if (is_null($order) || !isset($order['by']))
            return null;
        $result = array();
        foreach ($filter as $filter_key => $filter_value) {
            if (in_array($order['by'], $filter_value)) {
                $result[$filter_key]['key'] = $order['by'];
                $result[$filter_key]['order'] = 'ASC';
                if (isset($order["order"]) && $order["order"] == 'DESC')
                    $result[$filter_key]['order'] = 'DESC';
            }
        }
        return count($result) == 0 ? null : $result;

    }

    function condition_translate($key,$item)
    {
        if (!isset($item['fuzzy']) || $item['fuzzy'] == false)
            $fuzzy = false;
        else
            $fuzzy = true;
        if (!isset($item['data']) || $item['data'] == '')
            return null;
        $condition = [$key, $fuzzy ? 'like' : '=', $fuzzy ? $item['data'] . '%' : $item['data']];
        return $condition;
    }
}