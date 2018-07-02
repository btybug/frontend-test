<?php

/**
 * Created by PhpStorm.
 * User: Ara Arakelyan
 * Date: 7/19/2017
 * Time: 3:52 PM
 */

namespace Btybug\User\Services;

use Btybug\User\Repository\UserProfileRepository;
use Illuminate\Support\Facades\Auth;
use Btybug\btybug\Services\GeneralService;
use Btybug\User\Models\Roles;
use Btybug\User\Models\FormSettings;
use Btybug\User\Repository\UserRepository;
use Btybug\User\User;

class UserService extends GeneralService
{
    public $uploadPath = '/resources/assets/images/users/';

    private $userRepository;
    private $authUser;
    private $userProfileRepository;
    public function __construct(
        UserRepository $userRepository,
        UserProfileRepository $userProfileRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->authUser = Auth::user();
        $this->userProfileRepository = $userProfileRepository;
    }

    public function getSiteUsers()
    {
        return $this->userRepository->model()->where('role_id', ZERO);
    }

    public function getAdmins()
    {
        return $this->userRepository->model()->where('role_id', '!=', ZERO);
    }

    public function getAdmin(int $id)
    {
        return $this->userRepository->model()->where('role_id', '!=', ZERO)->where('id', $id)->first();
    }

    /**
     * @param $id
     * @param string $action
     * @return bool
     */
    public function ranking($id, $action = 'delete')
    {
        $current = $this->userRepository->find($id);

        if (!Auth::user()->isSuperadmin()) {
            if ($current->isSuperadmin())
                return false;

            if ($current->isAdministrator()) {
                if (Auth::user()->isAdministrator() && $action == 'edit') {
                    return true;
                }
                return false;
            }
        }
        return true;
    }

    public function sendPassword(User $user)
    {
        $random = str_random(10);
        $this->userRepository->update($user->id, [
            'password' => bcrypt($random)
        ]);
        $emailData = [
            'template' => 'emails.auth.password',
            'data' => ['username' => $user->username, 'password' => $random],
            'usage' => $user,
            'subject' => 'New password sent to member.'
        ];
        \Event::fire(new sendEmailEvent($this->authUser, $emailData));
    }

    public function resetPassword(string $email)
    {
        if ($user = $this->userRepository->findBy('email', $email)) {
            $emailData = [
                'template' => 'emails.auth.reset',
                'data' => ['username' => $user->username],
                'usage' => $user,
                'subject' => 'Reset Password'
            ];
            \Event::fire(new sendEmailEvent($this->authUser, $emailData));

            return ['data' => true, 'code' => 200, 'error' => false];
        }

        return ['data' => false, 'code' => 500, 'error' => true];
    }

    public function deleteUser(int $id)
    {
        $result = $this->userRepository->find($id);
        if ($result) {
            \File::deleteDirectory(base_path() . $this->uploadPath . $id);
            $result = $this->userRepository->delete($id) ? true : false;
        }
        return $result;
    }

    /**
     * @param string $page
     * @return array
     */
    public function getOptions($model)
    {
        $data = \Config::get('user_options');
        if ($data && !empty($data)) {
            foreach ($data as $key => $plugin) {
                if (isset($plugin) && count($plugin)) {
                    foreach ($plugin as $title => $item) {
                        if (isset($item['html'])) {
                            echo $this->replaceDynamicValuesWithModelAttributes($item['html'], $model);
                        }
                        if (isset($item['view']) && View::exists($item['view'])) {
                            (isset($item['data'])) ? $compact = $item['data'] : $compact = [];
                            echo $this->replaceDynamicValuesWithModelAttributes(view($item['view'])->with($compact)->render(), $model);
                        }
                    }
                }

            }
        }
    }
    public function createUser($data)
    {
        User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'membership_id' => $data['membership_id'],
            'status' => 'active',
        ]);
    }
    public function createAdmin($data)
    {
        //TODO remove membership from users table
        $data['membership_id'] = ZERO;
        $user = $this->userRepository->create($data);
        if ($user && $this->userProfileRepository->createProfile($user->id)) {
            return true;
        }
        return false;
    }
    public function editAdmin($request)
    {
        $admin = $this->getAdmin($request->id);
        if (!$admin) abort(404);

        $requestData = $request->except('_token', 'password_confirmation');

        if (empty($requestData['password'])) $requestData['password'] = $admin->password;

        $user = $this->userRepository->update($admin->id, $requestData);
        return $user;
    }
    public function editAdmins($id, $request)
    {
        $roles = Roles::all()->pluck('name', 'id');
        $user = User::find($id);
        if (!$user || !User::ranking($user, 'edit'))
            return redirect()->back();

        $user = $this->dhelper->formatCustomFld($user);
        /*THIS is system function for edit user quickly*/
        if ($request->ajax()) {
            $data = $request->except('extra');
            $metaData = [];

            $rules = array_merge($metaData, [
                'email' => 'required|email|max:255|unique:users,email,' . $user->id . ',id',
                'username' => 'required|max:255|unique:users,username,' . $user->id . ',id',
            ]);
            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
                $account = unserialize($user['meta_data']);
                $html = View::make('users::_partials.edit_profile', compact('roles', 'user', 'account'))
                    ->withErrors($validator->errors())
                    ->render();
                return \Response::json(['data' => $html, 'code' => 200, 'error' => true]);
            }

            $roleID = (isset($data['role'])) ? $data['role'] : null;
            $userMeta = $request->get('extra', null);
            //save data
            $user = $this->user->updateUser($id, $data, $roleID, $userMeta);
            $account = unserialize($user['user_meta']);
            $html = View::make('users::_partials.edit_profile', compact('roles', 'user', 'profileFields', 'account'))->render();
            return \Response::json(['data' => $html, 'code' => 200, 'error' => false]);
        }
    }

    private function replaceDynamicValuesWithModelAttributes($html, $model)
    {
        preg_match_all("/\[([^\]]*)\]/", $html, $matches);
        $keys = $matches[1];
        if (count($keys)) {
            foreach ($keys as $key) {
                if (isset($model->{$key})) {
                    $html = str_replace('[' . $key . ']', $model->{$key}, $html);
                }
            }
        }
        return $html;
    }



}