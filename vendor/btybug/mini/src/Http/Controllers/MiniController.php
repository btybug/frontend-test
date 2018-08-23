<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 05.07.2018
 * Time: 21:28
 */

namespace Btybug\Mini\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MiniController extends Controller
{
    protected $cms;
    protected $user;

    public function ennable(Request $request)
    {
        $this->user = \Auth::user();
        $site_url = $this->user->site_url;
        $class = 'App\multisite\\' . $site_url . '\Main';
        $this->cms = new $class($this->user, $request);
    }

}