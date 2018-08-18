<?php

namespace Btybug\FrontSite\Http\Controllers;

use App\Http\Controllers\Controller;
use Btybug\btybug\Repositories\HookRepository;
use Btybug\FrontSite\Repository\TagsRepository;
use Btybug\User\Http\Requests\User\ChangePassword;
use Btybug\User\Repository\UserRepository;
use Illuminate\Http\Request;


/**
 * Class HooksController
 * @package Btybug\FrontSite\Http\Controllers
 */
class MyAccountController extends Controller
{

    private $userRepository;

    public function __construct (
        UserRepository $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return view('manage::frontend.pages.account.index', compact([]));
    }

    public function favorites()
    {
        return view('manage::frontend.pages.account.favorites', compact([]));
    }

    public function general()
    {
        $user = \Auth::user();
        return view('manage::frontend.pages.account.general', compact(['user']));
    }

    public function postGeneral(Request $request)
    {
        $this->userRepository->update(\Auth::id(), $request->except('_token'));
        return redirect()->back();
    }

    public function profiles()
    {
        return view('manage::frontend.pages.account.profiles', compact([]));
    }

    public function password()
    {
        return view('manage::frontend.pages.account.password', compact([]));
    }

    public function preferances()
    {
        return view('manage::frontend.pages.account.preferances', compact([]));
    }

    public function logs()
    {
        return view('manage::frontend.pages.account.logs', compact([]));
    }

    public function postPassword(ChangePassword $request)
    {
        $user = \Auth::user();
        if (! \Hash::check($request->old_pass, $user->password)) {
            return redirect()->back()->with('error','old password wrong');
        }

        $this->userRepository->update($request->id,['password' => bcrypt($request->new_pass)]);
        return redirect()->back()->with('message','Password successfully changed');
    }

}