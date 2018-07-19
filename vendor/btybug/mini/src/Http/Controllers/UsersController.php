<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 05.07.2018
 * Time: 21:28
 */

namespace Btybug\Mini\Http\Controllers;


use App\Http\Controllers\Controller;
use Btybug\btybug\Models\Painter\Painter;
use Btybug\FrontSite\Repository\TagsRepository;
use Btybug\Mini\Services\UnitService;
use Btybug\User\Repository\UserRepository;
use Btybug\User\Services\UserService;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    private $unitService;
    private $painter;
    private $tagsRepository;
    private $userService;

    public function __construct(
        UnitService $unitService,
        Painter $painter,
        TagsRepository $tagsRepository,
        UserService $userService
    )
    {
        $this->unitService = $unitService;
        $this->painter = $painter;
        $this->tagsRepository = $tagsRepository;
        $this->userService = $userService;
    }

    public function getIndex()
    {
        $users = $this->userService->getSiteUsers()->paginate(15);

        return view('multisite::admin.users.list',compact(['users']));
    }
}