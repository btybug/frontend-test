<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 04.07.2018
 * Time: 16:09
 */

namespace App\multisite\miniuser;


use App\multisite\miniuser\Providers\ModuleServiceProvider;
use Btybug\btybug\Models\Painter\Painter;
use Btybug\FrontSite\Models\FrontendPage;
use Btybug\User\User;
use Illuminate\Http\Request;

class Main
{
    private $user;
    private $request;

    public function __construct(User $user, Request $request)
    {
        app()->register(ModuleServiceProvider::class);
        $this->user = $user;
        $this->request = $request;
    }

    public function run()
    {
        return view('mini::account')->with('user', $this->user);
    }

    public function listPages()
    {
        return view('mini::pages.lists')->with(['user' => $this->user, 'pages' => $this->user->frontPages]);
    }


    public function accountSettings()
    {
        return view('mini::account.settings')->with('user', $this->user);

    }

    public function accountGeneral()
    {
        return view('mini::account.general')->with('user', $this->user);

    }

    public function plugins()
    {
        return view('mini::plugins.lists')->with('user', $this->user);

    }

    public function pluginsSettings()
    {
        return view('mini::plugins.settings')->with('user', $this->user);

    }

    public function media()
    {
        return view('mini::media.drive')->with('user', $this->user);

    }

    public function mediaSettings()
    {
        return view('mini::media.settings')->with('user', $this->user);

    }

    public function preferences()
    {
        return view('mini::preferences.lists')->with('user', $this->user);

    }

    public function extraPlugins()
    {
        return view('mini::extra.plugins')->with('user', $this->user);

    }

    public function extraGears()
    {
        $units = Painter::whereTag('my_account')->paginate(4, 4, 'bty-pagination-2');
        return view('mini::extra.gears', compact('units'))->with('user', $this->user);

    }

    public function pageEdit()
    {
        $id = $this->request->id;
        $page = FrontendPage::find($id);
        return view('mini::pages.edit', compact('page', 'id'))->with('user', $this->user);

    }

    public function pageEditContent()
    {
        $id = $this->request->id;
        $page = FrontendPage::find($id);
        $page->setAttribute('cssData', []);
        $page->setAttribute('jsData', []);
        return view('mini::pages.content', compact('page', 'id'))->with('user', $this->user);

    }

    public function mySitePages()
    {
        return view('mini::mysite.pages')->with(['user' => $this->user, 'pages' => $this->user->frontPages]);
    }


    public function mySiteSettings()
    {
        return view('mini::mysite.settings')->with('user', $this->user);

    }

    public function mySiteSpecialSettings()
    {
        return view('mini::mysite.special')->with('user', $this->user);

    }

    public function CCMessages()
    {
        return view('mini::communications.messages')->with('user', $this->user);
    }

    public function CCNotifications()
    {
        return view('mini::communications.notifications')->with('user', $this->user);
    }

    public function CCReviews()
    {
        return view('mini::communications.reviews')->with('user', $this->user);
    }

    public function BtyCv()
    {
        return view('mini::btybug.cv')->with('user', $this->user);
    }

    public function BtyJobs()
    {
        return view('mini::btybug.jobs')->with('user', $this->user);
    }

    public function BtyMarket()
    {
        return view('mini::btybug.market')->with('user', $this->user);
    }

    public function BtyBlog()
    {
        return view('mini::btybug.blog')->with('user', $this->user);
    }
}