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

        if (!$this->check_permission($user_role_id, $page_permission_id)) {
            return $this->helper->MakeMessageResponse(0);
        }

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
    private $student = [1, 2, 3, 4];
    private $instructor = [1, 2, 3, 4];
    private $manager = [1, 2, 3, 4];
}