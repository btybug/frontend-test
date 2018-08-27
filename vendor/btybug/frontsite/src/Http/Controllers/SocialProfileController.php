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
use Btybug\FrontSite\Models\Tag;
use Btybug\FrontSite\Services\SocialProfileService;
use View;
use Illuminate\Http\Request;


class SocialProfileController extends Controller
{

    private $userRepository;
    private $socialProfileRepository;
    private $tagsService;
    private $socialProfileService;

    public function __construct (
        UserRepository $userRepository,
        SocialProfileRepository $socialProfileRepository,
        TagsService $tagsService,
        SocialProfileService $socialProfileService
    )
    {
        $this->userRepository = $userRepository;
        $this->socialProfileRepository = $socialProfileRepository;
        $this->tagsService = $tagsService;
        $this->socialProfileService = $socialProfileService;
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
        $user = \Auth::user()->socialProfile;
        $bugs = $this->socialProfileService->getall($user);
        return view('manage::frontend.pages.profiles.quickbug', compact(['user','bugs']));
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
        $this->tagsService->tagsSave($request->get('tags',null));
        $user = \Auth::user()->socialProfile;
        $this->socialProfileService->bugsSave($data,$user);
        $bugs = $this->socialProfileService->getall($user);
        $html = \View::make('manage::frontend.pages._partials.bug_render', compact(['data','user','bugs']))->render();

        return \Response::json(['html' => $html, 'error' => false]);
    }

    public function tagsAutocompleate(Request $request)
    {
        $data = $request->all();
        $issetTag = Tag::where('type','=', 'minicms')
            ->where('name', 'like', '%'.$data['term'].'%')->take(5)->get();
        if ($issetTag)
        {
            $results = array();
            foreach ($issetTag as $query)
            {
                $results[] = ['name' => $query->name];
            }
            return \Response::json(json_encode($results));
        }else{
            return \Response::json(['error' => true]);
        }

    }

    public function contactsIndex()
    {
        return view('manage::frontend.pages.contacts.contacts', compact([]));
    }
    public function contactsFollowing()
    {
        return view('manage::frontend.pages.contacts.following', compact([]));
    }
    public function contactsFollowers()
    {
        return view('manage::frontend.pages.contacts.followers', compact([]));
    }
    public function contactsNetworks()
    {
        return view('manage::frontend.pages.contacts.networks', compact([]));
    }


}