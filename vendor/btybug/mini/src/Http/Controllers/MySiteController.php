<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 04.07.2018
 * Time: 14:25
 */

namespace Btybug\Mini\Http\Controllers;


use Btybug\Mini\Generator;
use Btybug\Mini\Http\Requests\PageCreateRequest;
use Btybug\Mini\Services\PagesService;
use Btybug\Console\Repository\FrontPagesRepository;
use Illuminate\Http\Request;

class MySiteController extends MiniController
{
    protected $pageService;
    protected $pageRepositroy;

    public function __construct(
        PagesService $pagesService,
        FrontPagesRepository $pageRepositroy
    )
    {
        $this->pageService = $pagesService;
        $this->pageRepositroy = $pageRepositroy;
    }

    public function settings(Request $request)
    {
        $this->ennable($request);
        return $this->cms->mySiteSettings();
    }

    public function specialSettings(Request $request)
    {
        $this->ennable($request);
        return $this->cms->mySiteSpecialSettings();
    }
/////////////////////////////////////////////////////Pages/////////////////////////////////////////////////////////////
    public function pages(Request $request)
    {
        $this->ennable($request);
        return $this->cms->mySitePages();
    }

    public function pagesCreate(PageCreateRequest $request)
    {
        $this->ennable($request);
        $page = $this->user->frontPages()->where('parent_id', null)->first();
        $data = [
            'title' => $request->get('title') . ' page',
            'url' => $page->url . '/' . \Str::slug($request->get('title')),
            'user_id' => $this->user->id,
            'status' => 'published',
            'parent_id'=>$page->id,
            'page_access' => 0,
            'slug' => str_slug($request->get('title') . $this->user->id),
            'type' => 'custom',
            'render_method' => true,
            'content_type' => 'template',
            'module_id' => 'btybug/mini',
            'header' => 1,
            'css_type' => Generator::DEFAULT_VALUE,
            'js_type' => Generator::DEFAULT_VALUE
        ];
        $newPage = $this->pageRepositroy->create($data);
        return \Response::json(['id' => $newPage->id,'title' => $newPage->title]);
    }

    public function editUserPage(Request $request, $id)
    {
        $this->pageService->editPage($request);
        return redirect()->back();
    }

    public function pageEdit(Request $request, $di)
    {
        $this->ennable($request);
        return $this->cms->pageEdit();
    }

    public function pageEditContent(Request $request, $di)
    {
        $this->ennable($request);
        return $this->cms->pageEditContent();
    }

    public function sorting(Request $request)
    {
        $this->ennable($request);
        if (count($request->data)) {
            try {
                $this->pageService->saveSort($request->data);
            } catch (\Exception $exception) {
                return $this->cms->responseJson(true, $exception->getMessage());
            }
        }

        return $this->cms->responseJson(false, 'successfully sorted');
    }

    public function showPage(Request $request)
    {
        $this->ennable($request);
        try {
            $page = $this->pageRepositroy->findOrFail($request->id);
            $html = \View('mini::pages._partials.view')->with('page', $page)->render();
        } catch (\Exception $exception) {
            return $this->cms->responseJson(true, $exception->getMessage());

        }

        return $this->cms->responseJson(false, 'successfully requested', ['html' => $html]);
    }
    ///////////////////////////////////////////////// Bty Bug //////////////////////////////////////////////////
    public  function btybug(Request $request){
        $this->ennable($request);
        return $this->cms->btybug();
    }
    public  function pagesFunction(Request $request){
        $this->ennable($request);
        return $this->cms->pagesFunction();
    }
    public  function settingsFunction(Request $request){
        $this->ennable($request);
        return $this->cms->settingsFunction();
    }
    //////////////////////////////////////////////////// More Sites //////////////////////////////////////////////
    public  function moreSites(Request $request)
    {
        $this->ennable($request);
        return $this->cms->moreSites();
    }

    public function pagesDelete(Request $request,$id = null)
    {
        $this->ennable($request);
        return $this->cms->pagesDelete($id);
    }

}