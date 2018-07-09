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

    public function pagesCreate(PageCreateRequest $request)
    {
        $this->ennable($request);
        $page = $this->user->frontPages()->where('parent_id', null)->first();
        BBRegisterFrontPages($request->get('title') . ' page', $page->url . '/' . \Str::slug($request->get('title')), $page->id, $this->user->id, 'custom');
        return redirect()->back();
    }

    public function editUserPage(Request $request,$id,PagesService $service,FrontPagesRepository $repository)
    {
        $service->editPage($request,$repository);
        return redirect()->back();
    }

    public function pageEdit(Request $request,$di)
    {
        $this->ennable($request);
        return $this->cms->pageEdit();
    }
    public function pageEditContent(Request $request,$di)
    {
        $this->ennable($request);
        return $this->cms->pageEditContent();
    }
}