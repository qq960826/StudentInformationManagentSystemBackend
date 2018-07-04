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
    protected $salt = "q!@#$%^&132sdhgesdgt34";

    public function hash($password)
    {
        return md5($password . $this->salt);
    }

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
        $messagemap[101] = "帐号或密码错误";
        $messagemap[102] = "帐号已锁定";
        $messagemap[103] = "登录信息不完整";

        $messagemap[200] = "用户删除成功";
        $messagemap[201] = "用户删除参数不完整";
        $messagemap[202] = "指定用户不存在";

        $messagemap[300] = "密码修改成功";
        $messagemap[301] = "原始密码错误";
        $messagemap[302] = "指定用户不存在";
        $messagemap[303] = "密码过长不能超过32位，且密码长度不能低于6位";
        $messagemap[304] = "密码修改参数不完整";

        $messagemap[400] = "密码重置成功";
        $messagemap[401] = "密码重置参数不完整";
        $messagemap[402] = "密码重置用户不存在";
        $messagemap[403] = "用户证件信息不存在";

        $messagemap[500] = "用户添加成功";
        $messagemap[501] = "密码过长不能超过32位，且密码长度不能低于6位";
        $messagemap[502] = "身份证已存在";
        $messagemap[503] = "身份证信息非法";
        $messagemap[504] = "用户名已存在";
        $messagemap[505] = "用户添加提交参数不完整";
        $messagemap[506] = "用户名长度不能超过16";
        $messagemap[507] = "姓名长度不能超过16";
        $messagemap[508] = "籍贯长度不能超过20";
        $messagemap[509] = "角色类型不合法";
        $messagemap[510] = "爱好长度不能超过100";

        $messagemap[600] = "用户删除成功";
        $messagemap[601] = "用户不存在";

        $messagemap[700] = "爱好修改成功";
        $messagemap[701] = "用户不存在";
        $messagemap[702] = "爱好长度不能超过100";

        $messagemap[800] = "用户信息获取成功";
        $messagemap[801] = "用户不存在";
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

    function idcard_verify_number($idcard_base)
    {
        if (strlen($idcard_base) != 17) {
            return false;
        }
        //加权因子
        $factor = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
        //校验码对应值
        $verify_number_list = array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');
        $checksum = 0;
        for ($i = 0; $i < strlen($idcard_base); $i++) {
            $checksum += substr($idcard_base, $i, 1) * $factor[$i];
        }
        $mod = $checksum % 11;
        $verify_number = $verify_number_list[$mod];
        return $verify_number;
    }

    function idcard_checks($idcard)
    {
        if (strlen($idcard) != 18) {
            return false;
        }
        $idcard_base = substr($idcard, 0, 17);
        if ($this->idcard_verify_number($idcard_base) != strtoupper(substr($idcard, 17, 1))) {
            return false;
        } else {
            return true;
        }
    }

    function idcard_get_birthday($idcard)
    {
        return substr($idcard, 6, 8);
    }

    function idcard_get_sex($idcard)
    {
        return ((int)substr($idcard, 16, 1))%2==0?false:true;
    }
}