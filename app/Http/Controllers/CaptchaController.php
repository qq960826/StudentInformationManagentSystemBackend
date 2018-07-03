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


class CaptchaController extends Controller
{
    protected $helper;
    public function __construct(HelperService $helperService){
        $this->helper=$helperService;
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

        //临时测试采用
//        header("Cache-Control: no-cache, must-revalidate");
//        header('Content-Type: image/jpeg');
//        $builder->output();
//
//        return $res;
        //临时测试采用

        return base64_encode($res);
    }
}