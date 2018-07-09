<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 04.07.2018
 * Time: 14:25
 */

namespace App\Mini\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Mini\Http\Requests\PageCreateRequest;
use App\Mini\Services\PagesService;
use Btybug\Console\Repository\FrontPagesRepository;
use Illuminate\Http\Request;

class MySiteController extends MiniController
{
    public function settings(Request $request)
    {
        $this->ennable($request);
        return $this->cms->mySiteSettings();
    }

    public function pages(Request $request)
    {
        $this->ennable($request);
        return $this->cms->mySitePages();
    }
}