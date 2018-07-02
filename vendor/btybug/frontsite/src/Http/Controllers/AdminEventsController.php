<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 6/28/17
 * Time: 12:06 PM
 */

namespace Btybug\FrontSite\Http\Controllers;


use Btybug\Console\Repository\FormsRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminEventsController extends Controller
{
    public function getIndex(FormsRepository $formsRepository)
    {
        return view('manage::admin_events.index', compact([]));
    }

    public function getCreate()
    {
        return view('manage::admin_events.create', compact([]));
    }
}