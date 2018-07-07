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
use Illuminate\Http\Request;

class ClientController extends MiniController
{
    public function account(Request $request)
    {
        $this->ennable($request);
        return $this->cms->run();
    }

    public function pages(Request $request)
    {
        $this->ennable($request);
        return $this->cms->listPages();
    }

    public function pagesCreate(PageCreateRequest $request)
    {
        $this->ennable($request);
        $page = $this->user->frontPages()->where('parent_id', null)->first();
        BBRegisterFrontPages($request->get('title') . ' page', $page->url . '/' . \Str::slug($request->get('title')), $page->id, $this->user->id, 'custom');
        return redirect()->back();
    }

    public function accountSettings(Request $request)
    {
        $this->ennable($request);
        return $this->cms->accountSettings();
    }

    public function accountGeneral(Request $request)
    {
        $this->ennable($request);
        return $this->cms->accountGeneral();
    }

    public function plugins(Request $request)
    {
        $this->ennable($request);
        return $this->cms->plugins();
    }

    public function pluginsSettings(Request $request)
    {
        $this->ennable($request);
        return $this->cms->pluginsSettings();
    }

    public function media(Request $request)
    {
        $this->ennable($request);
        return $this->cms->media();
    }

    public function mediaSettings(Request $request)
    {
        $this->ennable($request);
        return $this->cms->mediaSettings();
    }

    public function preferences(Request $request)
    {
        $this->ennable($request);
        return $this->cms->preferences();
    }

    public function extraPlugins(Request $request)
    {
        $this->ennable($request);
        return $this->cms->extraPlugins();
    }

    public function extraGears(Request $request)
    {
        $this->ennable($request);
        return $this->cms->extraGears();
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