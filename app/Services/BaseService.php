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
    public function setdata($data){
        $this->data=$data;
    }
    public function getdata(){
        return $this->data;
    }

}