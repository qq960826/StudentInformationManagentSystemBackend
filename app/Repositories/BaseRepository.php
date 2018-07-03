<?php
/**
 * Created by PhpStorm.
 * User: wzq
 * Date: 2018/7/2
 * Time: 9:40 PM
 */

namespace App\Repositories;


abstract class BaseRepository
{
    protected $model;
    public function get_by_id($id) {
        return $this->model->find($id);
    }
    public function delete($id) {
        return $this->model->get_by_id($id)->delete();
    }


}