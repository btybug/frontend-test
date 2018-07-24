<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 24.07.2018
 * Time: 10:46
 */

namespace Btybug\Mini\Http\Controllers;


use Btybug\btybug\Http\Controller;
use Illuminate\Http\Request;

class FrontPagesController extends Controller
{
    public function home(Request $request)
    {
        dd($request->all());
    }
}