<?php

namespace Btybug\FrontSite\Http\Controllers;

use App\Http\Controllers\Controller;
use Btybug\btybug\Repositories\HookRepository;
use Btybug\FrontSite\Models\Favorites;
use Btybug\FrontSite\Models\FrontendPage;
use Btybug\FrontSite\Models\SocialProfile;
use Btybug\FrontSite\Repository\FavoritesRepository;
use Btybug\FrontSite\Repository\TagsRepository;
use Btybug\User\Http\Requests\User\ChangePassword;
use Btybug\User\Repository\UserRepository;
use Btybug\User\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;


/**
 * Class HooksController
 * @package Btybug\FrontSite\Http\Controllers
 */
class MyAccountController extends Controller
{

    private $userRepository;
    private $favoritesrepository;

    public function __construct (
        UserRepository $userRepository,
        FavoritesRepository $favoritesRepository
    )
    {
        $this->favoritesrepository = $favoritesRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return view('manage::frontend.pages.account.index', compact([]));
    }

    public function favorites()
    {
        return view('manage::frontend.pages.favorites.favorite_posts', compact([]));
    }

    public function favoriteSites()
    {
        $favorites = \Auth::user()->favorite_sites;
        $sites = array();
        foreach ($favorites as $item)
        {
            $sites[] = SocialProfile::find($favorites[0]->sites_id);
        }
        $urls = array();
        foreach ($sites as $site)
        {
            $url = FrontendPage::where('user_id',$site->user_id)->where('title','profile')->get();
            $urls[] = ['name' => $site->site_name,'url' => $url[0]->url];
        }
        return view('manage::frontend.pages.favorites.favorite_sites', compact(['urls']));
    }

    public function favoriteposts()
    {
        return view('manage::frontend.pages.favorites.favorite_posts', compact([]));
    }

    public function addToFavorites($id = null,$cond = null)
    {
        if ($id){
            if ($cond == 'sites')
            {
                $isset = $this->favoritesrepository->checkIsset(['sites_id' => $id]);
                if ($isset !== true)
                {
                    $data = ['user_id' => \Auth::user()->id,'sites_id' => $id];
                    $this->favoritesrepository->create($data);
                    return view('manage::frontend.pages.favorites.favorite_sites', compact([]));
                }else{
                    return back()->with(['error' => true,'message' => 'This site is allready in your favorites']);
                }

            }
        }

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
        $social_profile = new SocialProfile();
        return view('manage::frontend.pages.profiles.social', compact(['social_profile']));
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

    public function profilesSave(Request $request)
    {
        dd($request->all());
    }

}