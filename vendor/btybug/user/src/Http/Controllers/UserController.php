<?php

namespace Btybug\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Btybug\User\Http\Requests\User\ChangePassword;
use Btybug\User\Http\Requests\User\EditUserRequest;
use Btybug\User\Http\Requests\User\CreateUser;
use Btybug\User\Repository\RoleRepository;
use Btybug\User\Repository\MembershipRepository;
use Datatables;
use Illuminate\Http\Request;
use Btybug\User\Http\Requests\User\CreateAdminRequest;
use Btybug\User\Http\Requests\User\DeleteAdminRequest;
use Btybug\User\Http\Requests\User\EditAdminRequest;
use Btybug\User\Repository\UserProfileRepository;
use Btybug\User\Repository\UserRepository;
use Btybug\User\Services\RoleService;
use Btybug\User\Services\UserService;
use View;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public $userService;
    public $userRepository;
    public $roleService;
    public $roleRepository;
    public $userProfileRepository;
    public $membershipRepository;

    public function __construct(
        UserService $userService,
        UserRepository $userRepository,
        RoleRepository $roleRepository,
        RoleService $roleService,
        UserProfileRepository $userProfileRepository,
        MembershipRepository $membershipRepository
    )
    {
        $this->roleRepository = $roleRepository;
        $this->roleService = $roleService;
        $this->userRepository = $userRepository;
        $this->userService = $userService;
        $this->userProfileRepository = $userProfileRepository;
        $this->membershipRepository = $membershipRepository;
    }
    /**
     * @return mixed
     */
    public function getIndex()
    {
        $users = $this->userService->getSiteUsers()->paginate();
        return view('users::users.list', compact(['users']))->with("userService",$this->userService);
    }

    /**
     * @return View
     */
    public function getAdmins()
    {
        $admins = $this->userService->getAdmins()->paginate();
        $userService = $this->userService;
        return view('users::admins.list', compact(['admins', 'userService']));
    }

    /**
     * @return View
     */
    public function getCreateAdmin()
    {
        $rolesList = $this->roleService->getRolesList();
        return view('users::admins.create', compact(['rolesList']));
    }

    public function postCreateAdmin(CreateAdminRequest $request)
    {
        $requestData = $request->except('_token', 'password_confirmation');
        if($this->userService->createAdmin($requestData))
            return redirect('/admin/users/admins')->with('message', "Admin has been created successfully !!!");
        return redirect()->back()->with('error', 'Admin not created,Please try again');
    }

    /**
     * @return View
     */
    public function getEditAdmin(Request $request)
    {
        $rolesList = $this->roleService->getRolesList();
        $admin = $this->userService->getAdmin($request->id);
        if (!$admin) abort(404);

        return view('users::admins.edit', compact(['admin', 'rolesList']));
    }

    public function postEditAdmin(EditAdminRequest $request)
    {
        $user = $this->userService->editAdmin($request);
        if ($user) {
            return redirect('/admin/users/admins')->with('message', "Admin updated Successfully !!!");
        }
        return redirect()->back()->with('error', 'Admin not created,Please try again');
    }

    public function postDeleteAdmin(DeleteAdminRequest $request)
    {
        $result = false;
        $user = $this->userService->getAdmin($request->slug);
        if ($user) {
            $result = $this->userRepository->delete($user->id) ? true : false;
        }
        return \Response::json(['success' => $result]);
    }

    /*Need to make it with new email sent*/
    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendPassword(Request $request)
    {
        $user = $this->userRepository->find($request->id);
        if ($user) {
            $this->userService->sendPassword($user);
            return redirect()->back()->with([
                'flash' => [
                    'message' => trans('New Password sent successfully.'),
                ]]);
        } else {
            return redirect()->back()->with([
                'flash' => [
                    'message' => trans('Not Found'),
                    'class' => 'alert-danger'
                ]
            ]);
        }
    }

    /**
     * @param Request $request
     * @return View
     */
    public function getCreate(Request $request)
    {
        $membership = $this->membershipRepository->getAll();
        foreach($membership as $item)
        {
            $membership_key_value[$item->id] = $item->name;
        }
        return view('users::users.create', ['membership'=>$membership_key_value]);
    }

    /**
     * @param CreateUser $request
     * @return View
     */
    public function postCreate(CreateUser $request)
    {
        $data = $request->all();
        $this->userService->createUser($data);
        return redirect('/admin/users');
    }
    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getEdit($id)
    {
        $user = $this->userRepository->findOrFail($id);

        return view('users::users.edit', compact(['user', 'id']));
    }

    public function getChangePassword($id)
    {
        $user = $this->userRepository->findOrFail($id);

        return view('users::users.password', compact(['user', 'id']));
    }

    public function postDelete(DeleteAdminRequest $request)
    {
        $result = $this->userService->deleteUser($request->slug);
        return \Response::json(['success' => $result]);
    }

    public function getShow(Request $request)
    {
        $user = $this->userRepository->find($request->id);
        if (!$user) {
            abort(404);
        }
        return view('users::users.show', compact('user'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|View
     */
    public function editAdmins($id, Request $request)
    {
        //TODO check this action or delete
        //get data for view
        $this->userService->editAdmins($id, $request);

        return view('users::admins.edit', compact('user', 'roles'));
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteMember(Request $request)
    {
        $user = $this->userRepository->find($request->id);
        if (!$user || !$this->userService->ranking($user))
            return redirect()->back();
        $this->userRepository->deleteUser($user->id);
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postResetPassword(Request $request)
    {
        $email = $request->get('email');
        $response = $this->userService->resetPassword($email);
        return \Response::json($response);
    }


    public function passwordChange(ChangePassword $request)
    {
        $id = $request->id;
        $new_password = $request->new_pass;
        $this->userRepository->model()->changePassword($id, $new_password);

        return redirect()->back();
    }

    public function userDetailsChange(EditUserRequest $request)
    {
        $data = $request->except('_token');
        $this->userRepository->update($request->get('id'), $data);
        return redirect()->back();
    }

}
