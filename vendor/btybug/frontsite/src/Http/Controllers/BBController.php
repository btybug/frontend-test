<?php

namespace Btybug\FrontSite\Http\Controllers;

use App\Http\Controllers\Controller;
use Btybug\btybug\Repositories\HookRepository;
use Btybug\FrontSite\Repository\TagsRepository;
use Btybug\User\Repository\UserRepository;
use Illuminate\Http\Request;


/**
 * Class HooksController
 * @package Btybug\FrontSite\Http\Controllers
 */
class BBController extends Controller
{
    private $userRepository;

    public function __construct (
        UserRepository $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }

    public function allMembers()
    {
        $users = $this->userRepository->getAll();

        return view('manage::frontend.pages.bb.all_members', compact([]));
    }

}