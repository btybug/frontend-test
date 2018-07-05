<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 04.07.2018
 * Time: 16:09
 */

namespace App\multisite\miniuser;


use App\multisite\miniuser\Providers\ModuleServiceProvider;
use Btybug\User\User;
use Illuminate\Http\Request;

class Main
{
    private $user;
    private $request;
    public function __construct(User $user,Request $request)
    {
        app()->register(ModuleServiceProvider::class);
        $this->user = $user;
        $this->request = $request;
    }

    public function run()
    {
        return view('mini::account')->with('user',$this->user);
    }

    public function listPages()
    {
        return view('mini::pages.lists')->with(['user'=>$this->user,'pages'=>$this->user->frontPages]);
    }


    public function accountSettings()
    {
         return view('mini::account.settings')->with('user',$this->user);

    }
    public function plugins()
    {
         return view('mini::plugins.lists')->with('user',$this->user);

    }

    public function pluginsSettings()
    {
         return view('mini::plugins.settings')->with('user',$this->user);

    }

    public function media()
    {
         return view('mini::media.drive')->with('user',$this->user);

    }

    public function mediaSettings()
    {
         return view('mini::media.settings')->with('user',$this->user);

    }

    public function preferences()
    {
         return view('mini::preferences.lists')->with('user',$this->user);

    }

    public function marketPlugins()
    {
         return view('mini::market.plugins')->with('user',$this->user);

    }

    public function marketGears()
    {
         return view('mini::market.gears')->with('user',$this->user);

    }


}