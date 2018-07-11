<?php
/**
 * Created by PhpStorm.
 * User: wzq
 * Date: 2018/7/3
 * Time: 4:09 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gregwar\Captcha\CaptchaBuilder;
use App\Services\HelperService;
use App\Services\UserService;
use App\Services\SchoolRollService;


class CommonController extends Controller
{
    protected $helper;
    protected $userService;
    protected $schoolRollService;

    public function __construct(HelperService $helperService, UserService $userService, SchoolRollService $schoolRollService)
    {
        $this->helper = $helperService;
        $this->userService = $userService;
        $this->schoolRollService = $schoolRollService;
    }

    public function captcha(Request $request)
    {
        //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->setMaxOffset(4);
        $builder->setBackgroundColor(255, 255, 255);
        $builder->build($width = 100, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();
        //验证码内容存入session
        $request->session()->put('captcha', $phrase);
        //生成图片
        $res = $builder->get();

        return $this->helper->MakeJSONMessage(10, base64_encode($res));
    }

    public function login(Request $request)
    {

        $info = $request->json()->all();
        $res = $this->userService->login($info);
        if ($res == 100) {//登录成功
            $userinfo = $this->userService->getdata();
            if ($userinfo['type'] == 1) {//加载学生学籍
                $studentinfo = $this->schoolRollService->studentid_view_by_id($userinfo['uid']);
                $request->session()->put('studentinfo', $studentinfo);
            } elseif ($userinfo['type'] == 2) {//加载老师所管理班级
                $search['condition']['uid'] = ['data' => $userinfo['uid'], 'fuzzy' => false];
                $instructorinfo = $this->schoolRollService->instructor_search($info);
                $request->session()->put('instructorinfo', $instructorinfo);

            } elseif ($userinfo['type'] == 3) {

            }
            $request->session()->put('role_id', $userinfo['type']);
            $request->session()->put('userinfo', $userinfo);
        }
        return $this->helper->MakeJSONMessage($res);
    }

    public function logout(Request $request)
    {
        $request->session()->flush(); //清空session
        $request->session()->regenerate(); //重置session_id
        return $this->helper->MakeJSONMessage(200);

    }
}