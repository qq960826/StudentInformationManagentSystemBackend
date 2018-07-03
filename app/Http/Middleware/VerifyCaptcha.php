<?php
/**
 * Created by PhpStorm.
 * User: wzq
 * Date: 2018/7/3
 * Time: 9:03 AM
 */
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use App\Services\HelperService;

class VerifyCaptcha{
    protected $helper;
    public function __construct(HelperService $helperService){
        $this->helper=$helperService;
    }

    protected function checkverify(Request $request, $userinput) {
        $temp=$request->session()->pull('captcha');
        return $temp == $userinput;
    }

    public function handle($request, Closure $next){
        $page_permission_id = $this->helper->get_page_id($request);
        if(in_array($page_permission_id,$this->PageNeedCaptcha)){
            $captcha_system=$request->session()->pull('captcha');
            $captcha_user=$request->get('captcha');
            if($captcha_system!=$captcha_user){
                return $this->helper->MakeMessageResponse(1);
            }
        }

        return $next($request);
    }
    protected $PageNeedCaptcha=[3];

}