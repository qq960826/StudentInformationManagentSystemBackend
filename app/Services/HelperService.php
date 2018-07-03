<?php
/**
 * Created by PhpStorm.
 * User: wzq
 * Date: 2018/7/3
 * Time: 3:33 PM
 */

namespace App\Services;

use Illuminate\Http\Response;

class HelperService
{
    public function message($code, $message, $data = null)
    {
        $result = array();
        $result['code'] = intval($code);
        $result['message'] = $message;
        if (!is_null($data) && is_array($data)) {
            foreach ($data as $key => $val)
                $result[$key] = $data[$key];
        }
        return $result;
    }

    public function MessageCodeTranslation($code)
    {
        $messagemap = array();
        $messagemap[0] = "权限不够";
        $messagemap[1] = "验证码错误";

        $messagemap[100] = "登陆成功";
        $messagemap[101] = "密码错误";
        $messagemap[102] = "账号密码不存在";
        return $messagemap[$code];
    }

    public function MakeMessage($code, $data = null)
    {
        return $this->message($code, $this->MessageCodeTranslation($code), $data);
    }
    public function MakeJSONMessage($code, $data = null)
    {
        return json_encode($this->MakeMessage($code, $data));
    }
    public function MakeMessageResponse($code, $data = null)
    {
        return Response($this->MakeJSONMessage($code, $data));
    }


    public function get_page_id($request)
    {
        if ($request->is('/')) return 1;
        if ($request->is('common/security/captcha')) return 2;
        if ($request->is('common/security/login')) return 3;
        if ($request->is('common/security/logout')) return 4;

        return 0;
    }
}