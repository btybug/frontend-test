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
}