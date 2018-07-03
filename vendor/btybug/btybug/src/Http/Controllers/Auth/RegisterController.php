<?php

namespace Btybug\btybug\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Btybug\User\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'membership_id' => 1,
            'status' => 'active',
        ]);

        $this->makeMiniCms($user);

        return $user;
    }

    private function makeMiniCms($user){
        BBRegisterFrontPages($user->username . ' page','/'.$user->username);
        if(! \File::isDirectory('multisite')) {
            \File::makeDirectory('multisite');
        }

        if(! \File::isDirectory('multisite'.DS.$user->username)) {
            \File::makeDirectory('multisite'.DS.$user->username);
        }
    }
}
