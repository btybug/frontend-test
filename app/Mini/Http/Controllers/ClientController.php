<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 04.07.2018
 * Time: 14:25
 */

namespace App\Mini\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function account(Request $request)
    {
        $user=\Auth::user();
        $username=\Auth::user()->username;
        $class='App\multisite\\'.$username.'\Main';
        $cms=new $class();
        return $cms->run($user,$request);

    }
}