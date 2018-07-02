<?php

namespace Btybug\Console\Http\Controllers;

use App\Http\Controllers\Controller;
use Btybug\btybug\Services\SettingsService;
use Illuminate\Http\Request;
use Btybug\btybug\Models\ContentLayouts\ContentLayouts;
use Btybug\Console\Services\BackendService;
use Btybug\Framework\Repository\VersionsRepository;
use Btybug\btybug\Repositories\AdminsettingRepository;

/**
 * Class BackendController
 * @package Btybug\Console\Http\Controllers
 */
class ApiController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {
        return view('console::api.index');
    }

    public function create()
    {
        return view("console::api.create");
    }

}