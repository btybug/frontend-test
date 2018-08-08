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
use Btybug\Mini\Services\PagesService;
use Btybug\Uploads\Repository\FormBuilderRepository;
use Illuminate\Http\Request;


class AdminPagesController extends Controller
{
    private $pageRepository;
    private $settings;
    private $pagesService;
    private $formBuilderRepository;

    public function __construct(
        MinicmsPagesRepository $pagesRepository,
        AdminsettingRepository $settings,
        TagsRepository $tagsRepository,
        PagesService $pagesService,
        FormBuilderRepository $formBuilderRepository
    )
    {
        $this->pageRepository = $pagesRepository;
        $this->settings = $settings;
        $this->tagsRepository = $tagsRepository;
        $this->pagesService = $pagesService;
        $this->formBuilderRepository = $formBuilderRepository;
    }

    public function assetsPages()
    {
        $pages = $this->pageRepository->getAll();
        $header = Settings::where('section', 'minicms')->where('settingkey', 'default_header')->select('val AS header_unit')->first();
        $layout = Settings::where('section', 'minicms')->where('settingkey', 'default_layout')->select('val AS page_layout')->first();
        $tags = $this->tagsRepository->pluckByCondition(['type' => 'minicms'], 'name', 'name');
        return view('multisite::admin.assets.pages', compact('pages', 'header', 'layout', 'tags'));
    }

    public function createPage(Request $request)
    {
        $data = $request->except('_token');

        return $this->pagesService->create($data);
    }

    public function editPage(Request $request)
    {
        $data = $request->except(['_token', 'id']);
        $v=\Validator::make($data,['template'=>'required']);
        if($v->fails())return redirect()->back()->withErrors(['messages'=>$v->messages()]);
        $data['page_layout'] = ($data['layout'] == 0) ? null : $data['page_layout'];
        $data['header_unit'] = ($data['header'] == 2) ? $data['header_unit'] : null;
        $id = $request->get('id');
        $this->pageRepository->update($id, $data);
        $this->pagesService->pageOptimize($id);
        return redirect()->back();
    }

    public function getPageEditForl(Request $request)
    {
        $model = $this->pageRepository->find($request->get('id'));
        $tags = $this->tagsRepository->pluckByCondition(['type' => 'minicms'], 'name', 'name');
        $html = \View::make('multisite::admin.assets.page_edit_form', compact('model', 'tags'))->render();
        return response()->json(['error' => false, 'html' => $html]);
    }
}