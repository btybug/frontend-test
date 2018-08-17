<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 04.07.2018
 * Time: 14:25
 */

namespace Btybug\FrontSite\Http\Controllers;


use Btybug\btybug\Http\Controller;
use Btybug\Mini\Model\MiniSuperPainter;
use Illuminate\Http\Request;


class ClientController extends Controller
{
    private $formBuilderRepository;
    private $unitService;
    private $painter;
    private $tagsRepository;
    private $membershipRepository;
    private $contentLayouts;
    private $formbuilderRepository;

    public function __construct(
        MiniSuperPainter $painter
    )
    {
        $this->painter = $painter;
    }
    public function dashboard(Request $request)
    {
        $units = $this->painter->where('self_type', 'units')->get();
        return view('manage::dashboard.index')->with(['user' =>\Auth::user(),'units' => $units]);
    }
    public function communication_notifications(Request $request)
    {

        return view('manage::communications.c_notifications')->with(['user' => \Auth::user()]);
    }
    public function communication_messages(Request $request)
    {

        return view('manage::communications.c_messages')->with(['user' => \Auth::user()]);
    }
    public function communication_subscribers(Request $request)
    {
        return view('manage::communications.c_subscribers')->with(['user' => \Auth::user()]);
    }

}