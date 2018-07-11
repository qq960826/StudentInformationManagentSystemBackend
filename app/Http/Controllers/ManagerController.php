<?php
/**
 * Created by PhpStorm.
 * User: wzq
 * Date: 2018/7/11
 * Time: 9:18 AM
 */

namespace App\Http\Controllers;

use App\Services\HelperService;
use App\Services\UserService;
use App\Services\SchoolRollService;
use Illuminate\Http\Request;

class ManagerController extends Controller
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

    public function user_add(Request $request)
    {
        $info = $request->json()->all();
        $result = $this->userService->adduser(
            $info
        );
        return $this->helper->MakeJSONMessage($result);
    }

    public function user_edit(Request $request)
    {
        $info = $request->json()->all();
        $id = null;
        if (isset($info['uid'])) {
            $id = $info['uid'];
            unset($info['uid']);
        }
        $result = $this->userService->updateuser(
            $id, $info
        );
        return $this->helper->MakeJSONMessage($result);
    }

    public function user_resetpassword(Request $request)
    {
        $info = $request->json()->all();
        $id = null;
        if (isset($info['uid'])) {
            $id = $info['uid'];
            unset($info['uid']);
        }
        $result = $this->userService->resetpassword(
            $id
        );
        return $this->helper->MakeJSONMessage($result);
    }

    public function user_delete(Request $request)
    {
        $info = $request->json()->all();
        $id = null;
        if (isset($info['uid'])) {
            $id = $info['uid'];
            unset($info['uid']);
        }
        $result = $this->userService->deleteuser(
            $id
        );
        return $this->helper->MakeJSONMessage($result);
    }

    public function user_search(Request $request){
        $info = $request->json()->all();
        $result = $this->userService->usersearch(
            $info
        );
        return json_encode($result);
    }

}