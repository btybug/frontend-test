<?php

namespace Btybug\FrontSite\Http\Controllers;

use App\Http\Controllers\Controller;
use Btybug\btybug\Repositories\HookRepository;
use Btybug\FrontSite\Http\Requests\SaveSocialGeneralRequest;
use Btybug\FrontSite\Models\SocialProfile;
use Btybug\FrontSite\Repository\SocialProfileRepository;
use Btybug\FrontSite\Repository\TagsRepository;
use Btybug\User\Http\Requests\User\ChangePassword;
use Btybug\User\Repository\UserRepository;
use Btybug\FrontSite\Services\TagsService;
use View;
use Illuminate\Http\Request;


class SocialProfileController extends Controller
{

    private $userRepository;
    private $socialProfileRepository;
    private $tagsService;

    public function __construct (
        UserRepository $userRepository,
        SocialProfileRepository $socialProfileRepository,
        TagsService $tagsService
    )
    {
        $this->userRepository = $userRepository;
        $this->socialProfileRepository = $socialProfileRepository;
        $this->tagsService = $tagsService;
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
        $social_profile = \Auth::user()->socialProfile;
        return view('manage::frontend.pages.profiles.general', compact(['social_profile']));
    }

    public function postSocialGeneral(SaveSocialGeneralRequest $request)
    {
        $social_profile = \Auth::user()->socialProfile;
        $this->socialProfileRepository->update($social_profile->id,$request->except('__token','day','month','year','social_media'));
        return redirect()->back();
    }

    public function socialQuickbug()
    {
        return view('manage::frontend.pages.profiles.quickbug', compact([]));
    }

    public function socialTravel()
    {
        return view('manage::frontend.pages.profiles.travel', compact([]));
    }

    public function socialPlaces()
    {
        return view('manage::frontend.pages.profiles.places', compact([]));
    }

    public function postSocialBugit(Request $request)
    {
        $data = $request->all();
        if(count($data['tags']))
        {
            $this->tagsService->tagsSave($data['tags']);
        }
        $user = \Auth::user()->socialProfile;
        $html = \View::make('manage::frontend.pages._partials.bug_render', compact(['data','user']))->render();

        return \Response::json(['html' => $html, 'error' => false]);
    }

}