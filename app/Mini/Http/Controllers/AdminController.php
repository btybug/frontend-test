<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 05.07.2018
 * Time: 21:28
 */

namespace App\Mini\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function getIndex()
    {
        return view('multisite::admin.index');
    }

    public function getSettings()
    {
        return view('multisite::admin.settings');
    }


}