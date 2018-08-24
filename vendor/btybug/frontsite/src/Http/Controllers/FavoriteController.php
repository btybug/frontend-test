<?php

namespace Btybug\FrontSite\Http\Controllers;

use App\Http\Controllers\Controller;
use Btybug\btybug\Repositories\HookRepository;
use Btybug\FrontSite\Models\Favorites;
use Btybug\FrontSite\Models\SocialProfile;
use Btybug\FrontSite\Repository\FavoritesRepository;
use Btybug\FrontSite\Repository\TagsRepository;
use Btybug\User\Http\Requests\User\ChangePassword;
use Btybug\User\Repository\UserRepository;
use Illuminate\Http\Request;


class FavoriteController extends Controller
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
        return view('manage::frontend.pages.favorites.favorite_sites', compact([]));
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
                    $favorites_sites = $this->favoritesrepository->model()->SocialProfile()->get();
                    dd($favorites_sites);
                    return view('manage::frontend.pages.favorites.favorite_sites', compact([]));
                }else{
                    $favorites_sites = $this->favoritesrepository->model()->SocialProfile(\Auth::user()->id);
                    dd($favorites_sites);
                    return \Response::json(['error' => true,'message' => 'This site is allready in your favorites']);
                }

            }
        }

    }


}