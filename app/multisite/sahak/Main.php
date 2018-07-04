<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 04.07.2018
 * Time: 16:09
 */

namespace App\multisite\sahak;


use App\multisite\sahak\Providers\ModuleServiceProvider;
use Btybug\User\User;
use Illuminate\Http\Request;

class Main
{
    public function run(User $user,Request $request)
    {
        app()->register(ModuleServiceProvider::class);
        $this->user = $user;
        return $this->account($user,$request);

    }
    public function account($user,$request){
        return view('mini::account',compact('user'));
    }
}