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
use App\Services\CourseService;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    protected $helper;
    protected $userService;
    protected $schoolRollService;
    protected $courseService;

    public function __construct(HelperService $helperService, UserService $userService, SchoolRollService $schoolRollService, CourseService $courseService)
    {
        $this->helper = $helperService;
        $this->userService = $userService;
        $this->schoolRollService = $schoolRollService;
        $this->courseService = $courseService;
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

    public function user_search(Request $request)
    {
        $info = $request->json()->all();
        $result = $this->userService->usersearch(
            $info
        );
        return json_encode($result);
    }

    public function classes_add(Request $request)
    {
        $info = $request->json()->all();
        $name = null;
        if (isset($info['name'])) {
            $name = $info['name'];
            unset($info['name']);
        }
        $result = $this->schoolRollService->classes_add(
            $name
        );
        return $this->helper->MakeJSONMessage($result);

    }

    public function classes_delete(Request $request)
    {
        $info = $request->json()->all();
        $id = null;
        if (isset($info['id'])) {
            $id = $info['id'];
            unset($info['id']);
        }
        $result = $this->schoolRollService->classes_delete($id);
        return $this->helper->MakeJSONMessage($result);
    }

    public function classes_edit(Request $request)
    {
        $info = $request->json()->all();
        $id = null;
        $name = null;
        if (isset($info['id'])) {
            $id = $info['id'];
            unset($info['id']);
        }
        if (isset($info['name'])) {
            $name = $info['name'];
            unset($info['name']);
        }
        $result = $this->schoolRollService->classes_edit($id, $name);
        return $this->helper->MakeJSONMessage($result);

    }

    public function classes_search(Request $request)
    {
        $info = $request->json()->all();
        $result = $this->schoolRollService->classes_search(
            $info
        );
        return json_encode($result);
    }


    public function student_add(Request $request)
    {
        $info = $request->json()->all();
        $result = $this->schoolRollService->studentinfo_add($info);
        return $this->helper->MakeJSONMessage($result);
    }

    public function student_delete(Request $request)
    {
        $info = $request->json()->all();
        $id = null;
        if (isset($info['id'])) {
            $id = $info['id'];
            unset($info['id']);
        }
        $result = $this->schoolRollService->studentinfo_delete($id);
        return $this->helper->MakeJSONMessage($result);

    }

    public function student_edit(Request $request)
    {
        $info = $request->json()->all();
        $id = null;
        if (isset($info['id'])) {
            $id = $info['id'];
            unset($info['id']);
        }
        $result = $this->schoolRollService->studentinfo_edit($id, $info);
        return $this->helper->MakeJSONMessage($result);
    }

    public function student_search(Request $request)
    {
        $info = $request->json()->all();
        $result = $this->schoolRollService->studentinfo_search(
            $info
        );
        return json_encode($result);
    }

    public function instructor_add(Request $request)
    {
        $info = $request->json()->all();
        $userid = null;
        $classid = null;
        if (isset($info['uid'])) {
            $userid = $info['uid'];
            unset($info['uid']);
        }
        if (isset($info['classid'])) {
            $classid = $info['classid'];
            unset($info['classid']);
        }
        $result = $this->schoolRollService->instructor_add(
            $userid, $classid
        );
        return $this->helper->MakeJSONMessage($result);
    }

    public function instructor_edit(Request $request)
    {
        $info = $request->json()->all();
        $id = null;
        if (isset($info['id'])) {
            $id = $info['id'];
            unset($info['id']);
        }
        $result = $this->schoolRollService->instructor_edit($id, $info);
        return $this->helper->MakeJSONMessage($result);
    }

    public function instructor_delete(Request $request)
    {
        $info = $request->json()->all();
        $id = null;
        if (isset($info['id'])) {
            $id = $info['id'];
            unset($info['id']);
        }
        $result = $this->schoolRollService->instructor_delete($id);
        return $this->helper->MakeJSONMessage($result);
    }

    public function instructor_search(Request $request)
    {
        $info = $request->json()->all();
        $result = $this->schoolRollService->instructor_search(
            $info
        );
        return json_encode($result);
    }

    public function semester_add(Request $request)
    {
        $info = $request->json()->all();
        $name = null;
        if (isset($info['name'])) {
            $name = $info['name'];
            unset($info['name']);
        }
        $result = $this->schoolRollService->semester_add(
            $name
        );
        return $this->helper->MakeJSONMessage($result);

    }

    public function semester_delete(Request $request)
    {
        $info = $request->json()->all();
        $id = null;
        if (isset($info['id'])) {
            $id = $info['id'];
            unset($info['id']);
        }
        $result = $this->schoolRollService->semester_delete($id);
        return $this->helper->MakeJSONMessage($result);
    }

    public function semester_edit(Request $request)
    {
        $info = $request->json()->all();
        $id = null;
        $name = null;
        if (isset($info['id'])) {
            $id = $info['id'];
            unset($info['id']);
        }
        if (isset($info['name'])) {
            $name = $info['name'];
            unset($info['name']);
        }
        $result = $this->schoolRollService->semester_edit($id, $name);
        return $this->helper->MakeJSONMessage($result);

    }

    public function semester_search(Request $request)
    {
        $info = $request->json()->all();
        $result = $this->schoolRollService->semester_search(
            $info
        );
        return json_encode($result);
    }

    public function course_add(Request $request)
    {
        $info = $request->json()->all();
        $name = null;
        if (isset($info['name'])) {
            $name = $info['name'];
            unset($info['name']);
        }
        $result = $this->courseService->course_add($name);
        return $this->helper->MakeJSONMessage($result);
    }

    public function course_delete(Request $request)
    {
        $info = $request->json()->all();
        $id = null;
        if (isset($info['id'])) {
            $id = $info['id'];
            unset($info['id']);
        }
        $result = $this->courseService->course_delete($id);
        return $this->helper->MakeJSONMessage($result);
    }

    public function course_edit(Request $request)
    {
        $info = $request->json()->all();
        $id = null;
        $name = null;
        if (isset($info['id'])) {
            $id = $info['id'];
            unset($info['id']);
        }
        if (isset($info['name'])) {
            $name = $info['name'];
            unset($info['name']);
        }
        $result = $this->courseService->course_edit($id, $name);
        return $this->helper->MakeJSONMessage($result);

    }

    public function course_search(Request $request)
    {
        $info = $request->json()->all();
        $result = $this->courseService->course_search(
            $info
        );
        return json_encode($result);
    }
}