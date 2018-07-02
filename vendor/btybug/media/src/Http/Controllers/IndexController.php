<?php namespace Btybug\Media\Http\Controllers;

/**
 * Created by PhpStorm.
 * User: Comp1
 * Date: 12/19/2016
 * Time: 2:58 PM
 */
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function index($folder)
    {
//        return view('media::index',compact('folder'));
    }

    public function settings()
    {
        return view('media::settings');
    }
}