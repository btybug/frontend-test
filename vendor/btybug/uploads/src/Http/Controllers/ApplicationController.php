<?php
/**
 * Copyright (c) 2017. All rights Reserved BtyBug TEAM
 */

namespace Btybug\Uploads\Http\Controllers;


use Btybug\Uploads\Repository\AppProductRepository;
use Btybug\Uploads\Repository\AppRepository;
use Btybug\Uploads\Repository\Plugins;
use Btybug\Uploads\Services\AppsService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Symfony\Component\Console\Tests\Input\StringInput;

class ApplicationController extends Controller
{
    public function getIndex ()
    {
        return view('uploads::application.index');
    }
}