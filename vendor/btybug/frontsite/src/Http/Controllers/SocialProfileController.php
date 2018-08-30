<?php

namespace Btybug\FrontSite\Http\Controllers;

use App\Http\Controllers\Controller;
use Btybug\btybug\Repositories\HookRepository;
use Btybug\FrontSite\Http\Requests\SaveSocialGeneralRequest;
use Btybug\FrontSite\Models\SocialProfile;
use Btybug\FrontSite\Repository\BugFriendsRepository;
use Btybug\FrontSite\Repository\BugsRepository;
use Btybug\FrontSite\Repository\ScoreRepository;
use Btybug\FrontSite\Repository\SocialProfileRepository;
use Btybug\FrontSite\Repository\TagsRepository;
use Btybug\FrontSite\Services\ScoreService;
use Btybug\User\Http\Requests\User\ChangePassword;
use Btybug\User\Repository\UserRepository;
use Btybug\FrontSite\Services\TagsService;
use Btybug\FrontSite\Models\Tag;
use Btybug\FrontSite\Services\SocialProfileService;
use Btybug\User\User;
use View;
use Btybug\FrontSite\Repository\BugTagsRepository;
use Illuminate\Http\Request;


class SocialProfileController extends Controller
{

    private $userRepository;
    private $socialProfileRepository;
    private $tagsService;
    private $tagsRepository;
    private $socialProfileService;
    private $bugTagsRepository;
    private $bugRepository;
    private $bugFriendsRepository;
    private $scoreRepository;
    private $scoreService;

    public function __construct (
        UserRepository $userRepository,
        SocialProfileRepository $socialProfileRepository,
        TagsService $tagsService,
        TagsRepository $tagsRepository,
        SocialProfileService $socialProfileService,
        BugTagsRepository $bugTagsRepository,
        BugsRepository $bugsRepository,
        BugFriendsRepository $bugFriendsRepository,
        ScoreRepository $scoreRepository,
        ScoreService $scoreService
    )
    {
        $this->userRepository = $userRepository;
        $this->bugRepository = $bugsRepository;
        $this->socialProfileRepository = $socialProfileRepository;
        $this->tagsService = $tagsService;
        $this->tagsRepository = $tagsRepository;
        $this->socialProfileService = $socialProfileService;
        $this->bugTagsRepository = $bugTagsRepository;
        $this->bugFriendsRepository = $bugFriendsRepository;
        $this->scoreRepository = $scoreRepository;
        $this->scoreService = $scoreService;
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

        $user = $this->userRepository->find(\Auth::id());
        $bugs = $user->bugits()->orderBy('created_at', 'DESC')->get();
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
        $user = $this->userRepository->find(\Auth::id());
        $bug = $this->socialProfileService->bugsSave($data,$user);
        $this->tagsService->tagsSave($request->get('tags',null),$bug['id']);
        if (isset($data['user_id']) && isset($bug['id']))
        {
            $this->bugFriendsRepository->save($bug['id'],$data['user_id']);
        }
        $bugs = $user->bugits()->orderBy('created_at', 'DESC')->get();
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

    public function getAllUsers(Request $request)
    {
        $term = $request->get('query');

        return $this->userRepository->model()->where('username','like', '%'.$term.'%')->where('role_id',0)->get();
    }
    public function deleteBug(Request $request)
    {
        $success = $this->socialProfileService->bugDelete($request->id);
        if($success)
        {
            return back();
        }else{
            return back();
        }

    }

    public function getBugsByTags($id)
    {
        $user = $this->userRepository->find(\Auth::id());
        $tag = $this->tagsRepository->find($id);
        $bugs = $tag->bugs;
        return view('manage::frontend.pages.profiles.bugsByTags', compact(['user','bugs']));
    }
    public function widgetPreviewOnRight(Request $request)
    {
        $user_id = $request->userid;
        $ident = $request->ident;
        $user = $this->userRepository->find($user_id);
        $html = \View::make('manage::frontend.pages._partials.widget', compact(['user']))->render();
        return ['html' => $html,'ident' => $ident];
    }

    public function postScoreing(Request $request)
    {
        $result = $this->scoreService->doScore($request->symbol,$request->bugs_id);
        return $result;
    }


}