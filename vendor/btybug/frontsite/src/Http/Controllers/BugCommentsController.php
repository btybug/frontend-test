<?php


namespace Btybug\FrontSite\Http\Controllers;

use App\Events\CommentPushed;
use App\Http\Controllers\Controller;
use Btybug\FrontSite\Repository\BugCommentsRepository;
use Btybug\User\User;
use Illuminate\Http\Request;

/**
 * Class SystemController
 * @package Btybug\Settings\Http\Controllers
 */
class BugCommentsController extends Controller
{
    /**
     * @var Settings|null
     */
    private $bugCommentsRepository = null;

    /**
     * SystemController constructor.
     * @param Settings $settings
     */
    public function __construct(BugCommentsRepository $bugCommentsRepository)
    {
        $this->bugCommentsRepository = $bugCommentsRepository;
    }

    public function pushComment(Request $request)
    {
        $data=$request->except('_token');
        $data['author_id']=\Auth::id();
        $comment=$this->bugCommentsRepository->create($data);
        $user=User::join('social_profile', 'users.id', '=', 'social_profile.user_id')
            ->where('users.id',\Auth::id())
            ->select('users.*', 'social_profile.site_image')
        ->first();
        broadcast(new CommentPushed($user,$comment,$data['bug_id']));
    }


}
