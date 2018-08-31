<?php


namespace Btybug\FrontSite\Http\Controllers;

use App\Events\CommentPushed;
use App\Http\Controllers\Controller;
use Btybug\FrontSite\Models\Bugs;
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
        $comment=$this->bugCommentsRepository->create($data)->toArray();
        $comment['created_at']=timeago($comment['created_at']);
        $comment['count']=Bugs::find($data['bug_id'])->comments()->count();
        $user=User::join('social_profile', 'users.id', '=', 'social_profile.user_id')
            ->where('users.id',\Auth::id())
            ->select('users.f_name','users.l_name', 'social_profile.site_image')
        ->first();
        broadcast(new CommentPushed($user->toArray(),$comment,$data['bug_id']));
    }


}
