<?php
/**
 * Created by PhpStorm.
 * User: wzq
 * Date: 2018/7/3
 * Time: 9:10 AM
 */

namespace App\Http\Middleware;

use Closure;
use App\Services\HelperService;

class PermissionCheck
{
    protected $helper;

    public function __construct(HelperService $helperService)
    {
        $this->helper = $helperService;
    }

    public function handle($request, Closure $next)
    {
        $page_permission_id = $this->helper->get_page_id($request);

        if (!$request->session()->has('role_id')) {
            $user_role_id = 0;
            $request->session()->put('role_id', $user_role_id); //游客模式
        } else {
            $user_role_id = $request->session()->get('role_id');
        }
        $request->roleid = $user_role_id;

        if (!$this->check_permission($user_role_id, $page_permission_id)) {
            return $this->helper->MakeMessageResponse(0);
        }
        if ($user_role_id == 1) {//加载学生信息
            $request->studentinfo = $request->session()->get('studentinfo');

        } elseif ($user_role_id == 2) {//加载教师所在班级信息
            $request->instructorinfo = $request->session()->get('instructorinfo');

        }
        $request->userinfo = $request->session()->get('userinfo');

        return $next($request);
    }


    private function check_permission($user_role_id, $page_permission_id)
    {
        if ($user_role_id == 0)
            return in_array($page_permission_id, $this->guest);
        elseif ($user_role_id == 1)
            return in_array($page_permission_id, $this->student);
        elseif ($user_role_id == 2)
            return in_array($page_permission_id, $this->instructor);
        elseif ($user_role_id == 3)
            return in_array($page_permission_id, $this->manager);
        else
            return false;
    }

    //permission table
    private $guest = [1, 2, 3];
    private $student = [1, 2, 3, 4, 5, 6, 7];
    private $instructor = [1, 2, 3, 4, 5, 6, 7];
    private $manager = [1, 2, 3, 4, 5, 6, 7,
                        100,101,102,103,104,105,106,107,108];
}