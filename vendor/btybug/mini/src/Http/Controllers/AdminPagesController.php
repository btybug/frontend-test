<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 16.07.2018
 * Time: 20:57
 */

namespace Btybug\Mini\Http\Controllers;


use App\Http\Controllers\Controller;
use Btybug\btybug\Models\Settings;
use Btybug\btybug\Repositories\AdminsettingRepository;
use Btybug\FrontSite\Repository\TagsRepository;
use Btybug\Mini\Repositories\MinicmsPagesRepository;
use Illuminate\Http\Request;


class AdminPagesController extends Controller
{
    private $pageRepository;
    private $settings;

    public function __construct(
        MinicmsPagesRepository $pagesRepository,
        AdminsettingRepository $settings,
        TagsRepository $tagsRepository
    )
    {
        $this->pageRepository = $pagesRepository;
        $this->settings = $settings;
        $this->tagsRepository = $tagsRepository;
    }

    public function assetsPages()
    {
        $pages = $this->pageRepository->getAll();
        $header = Settings::where('section', 'minicms')->where('settingkey', 'default_header')->select('val AS header')->first();
        $layout = Settings::where('section', 'minicms')->where('settingkey', 'default_layout')->select('val AS page_layout')->first();
        $tags=$this->tagsRepository->pluckByCondition(['type'=>'minicms'],'name','name');
        return view('multisite::admin.assets.pages', compact('pages','header', 'layout','tags'));
    }

    public function createPage(Request $request)
    {
        $data = $request->except('_token');
        return $this->pageRepository->create($data);
    }
    public function editPage(Request $request)
    {
        $data = $request->except(['_token','id']);
        $id = $request->get('id');
        $this->pageRepository->update($id,$data);
        return redirect()->back();
    }

    public function getPageEditForl(Request $request)
    {
        $model = $this->pageRepository->find($request->get('id'));
        $tags=$this->tagsRepository->pluckByCondition(['type'=>'minicms'],'name','name');
        $html = \View::make('multisite::admin.assets.page_edit_form', compact('model','tags'))->render();
        return response()->json(['error' => false, 'html' => $html]);
    }

    public function assetsGeneral()
    {
        $header = Settings::where('section', 'minicms')->where('settingkey', 'default_header')->select('val AS header')->first();
        $layout = Settings::where('section', 'minicms')->where('settingkey', 'default_layout')->select('val AS layout')->first();
        return view('multisite::admin.assets.general', compact('header', 'layout'));
    }

    public function assetsGeneralSave(Request $request)
    {
        $header = $request->get('header');
        $layout = $request->get('layout');
        $this->settings->createOrUpdate($header, 'minicms', 'default_header');
        $this->settings->createOrUpdate($layout, 'minicms', 'default_layout');
        return redirect()->back();
    }
}