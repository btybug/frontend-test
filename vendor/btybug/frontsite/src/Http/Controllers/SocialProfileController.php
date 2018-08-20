<?php

namespace Btybug\FrontSite\Http\Controllers;

use App\Http\Controllers\Controller;
use Btybug\btybug\Repositories\HookRepository;
use Btybug\FrontSite\Models\SocialProfile;
use Btybug\FrontSite\Repository\TagsRepository;
use Btybug\User\Http\Requests\User\ChangePassword;
use Btybug\User\Repository\UserRepository;
use Illuminate\Http\Request;


class SocialProfileController extends Controller
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
        return view('manage::frontend.pages.profiles.index', compact([]));
    }

    public function social()
    {
        return view('manage::frontend.pages.profiles.social', compact([]));
    }

    public function socialGeneral()
    {
        $social_profile = new SocialProfile();
        return view('manage::frontend.pages.profiles.general', compact(['social_profile']));
    }

    public function postSocialGeneral(Request $request)
    {
        dd($request->all());
    }

    public function socialQuickbug()
    {
        return view('manage::frontend.pages.profiles.quickbug', compact([]));
    }

}