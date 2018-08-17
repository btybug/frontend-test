<?php

namespace Btybug\FrontSite\Http\Controllers;

use App\Http\Controllers\Controller;
use Btybug\btybug\Repositories\HookRepository;
use Btybug\FrontSite\Repository\TagsRepository;
use Illuminate\Http\Request;


/**
 * Class HooksController
 * @package Btybug\FrontSite\Http\Controllers
 */
class MyAccountController extends Controller
{


    public function __construct (
    )
    {
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
        return view('manage::frontend.pages.account.general', compact([]));
    }

}