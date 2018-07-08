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
        $messagemap[602] = "用户不存在";

        $messagemap[700] = "爱好修改成功";
        $messagemap[701] = "用户不存在";
        $messagemap[702] = "用户删除参数不完整";

        $messagemap[800] = "用户信息获取成功";
        $messagemap[801] = "用户不存在";

        $messagemap[900] = "用户添加成功";
        $messagemap[901] = "身份证已存在";
        $messagemap[902] = "身份证信息非法";
        $messagemap[903] = "用户名已存在";
        $messagemap[904] = "用户名长度不能超过16";
        $messagemap[905] = "姓名长度不能超过16";
        $messagemap[906] = "籍贯长度不能超过20";
        $messagemap[907] = "角色类型不合法";
        $messagemap[908] = "爱好长度不能超过100";
        $messagemap[909] = "id参数非法";

        $messagemap[1000] = "班级添加成功";
        $messagemap[1001] = "班级名称参数不完整";
        $messagemap[1002] = "班级名称长度不能大于100";
        $messagemap[1003] = "班级名称已存在";

        $messagemap[1100] = "班级删除成功";
        $messagemap[1101] = "班级id非法";
        $messagemap[1102] = "班级id不存在";

        $messagemap[1200] = "班级编辑成功";
        $messagemap[1201] = "班级id非法";
        $messagemap[1202] = "班级id不存在";
        $messagemap[1203] = "班级名称已存在";
        $messagemap[1204] = "班级名称不能为空";
        $messagemap[1205] = "班级名称长度不能大于100";

        $messagemap[1400] = "学期添加成功";
        $messagemap[1401] = "学期名称参数不完整";
        $messagemap[1402] = "学期名称长度不能大于100";
        $messagemap[1403] = "学期名称已存在";

        $messagemap[1500] = "学期删除成功";
        $messagemap[1501] = "学期id非法";
        $messagemap[1502] = "学期id不存在";

        $messagemap[1600] = "学期编辑成功";
        $messagemap[1601] = "学期id非法";
        $messagemap[1602] = "学期id不存在";
        $messagemap[1603] = "学期名称已存在";
        $messagemap[1604] = "学期名称参数不完整";
        $messagemap[1605] = "学期名称长度不能大于100";

        $messagemap[1800] = "辅导员添加成功";
        $messagemap[1801] = "用户id参数不完整";
        $messagemap[1802] = "班级id参数不完整";
        $messagemap[1803] = "辅导员信息已存在";
        $messagemap[1804] = "用户id不存在";
        $messagemap[1805] = "用户身份不是辅导员";
        $messagemap[1806] = "班级不存在";

        $messagemap[1900] = "辅导员删除成功";
        $messagemap[1901] = "辅导员id非法";
        $messagemap[1902] = "辅导员id不存在";

        $messagemap[2000] = "学期编辑成功";
        $messagemap[2001] = "辅导员id非法";
        $messagemap[2002] = "辅导员id不存在";
        $messagemap[2003] = "用户id不存在";
        $messagemap[2004] = "用户身份不是辅导员";
        $messagemap[2005] = "班级不存在";
        $messagemap[2006] = "辅导员信息已存在";

        $messagemap[2200] = "学期编辑成功";
        $messagemap[2201] = "参数不完整";
        $messagemap[2202] = "学号长度不能大于20";
        $messagemap[2203] = "班级id不存在";
        $messagemap[2204] = "该学生学籍信息已存在";
        $messagemap[2205] = "学籍信息添加成功";

        $messagemap[2300] = "学籍信息删除成功";
        $messagemap[2301] = "学籍id非法";
        $messagemap[2302] = "学籍信息不存在";

        $messagemap[2400] = "学籍信息修改成功";
        $messagemap[2401] = "学籍id非法";
        $messagemap[2402] = "学籍id不存在";
        $messagemap[2403] = "学号长度不能大于20";
        $messagemap[2404] = "该学生学籍信息已存在";
        $messagemap[2405] = "该学生用户信息不存在";
        $messagemap[2406] = "班级id不存在";
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
        return ((int)substr($idcard, 16, 1)) % 2 == 0 ? false : true;
    }
    function array_flatten($array) {
        if (!is_array($array)) {
            return false;
        }
        $result = array();
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $result = array_merge($result,$this->array_flatten($value));
            } else {
                $result = array_merge($result, array($key => $value));
            }
        }
        return $result;
    }
    function search_condition_process($item){
        if (!isset($item['fuzzy']) || $item['fuzzy'] == false)
            $fuzzy = false;
        else
            $fuzzy = true;
        if (!isset($item['data']) || $item['data'] == '')
            return null;
        if (!isset($item['key']) || $item['key'] == '')
            return null;
        $condition = [$item['key'], $fuzzy ? 'like' : '=',$fuzzy? $item['data'].'%':$item['data']];
        return $condition;
    }
}