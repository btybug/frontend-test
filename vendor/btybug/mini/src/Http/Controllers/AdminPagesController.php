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
use Btybug\Mini\Repositories\MinicmsPagesRepository;
use Illuminate\Http\Request;


class AdminPagesController extends Controller
{
    private $pageRepository;
    private $settings;

    public function __construct(
        MinicmsPagesRepository $pagesRepository,
        AdminsettingRepository $settings
    )
    {
        $this->pageRepository = $pagesRepository;
        $this->settings = $settings;
    }

    public function assetsPages()
    {
        $pages = $this->pageRepository->getAll();

        return view('multisite::admin.assets.pages', compact('pages'));
    }

    public function createPage(Request $request)
    {
        $data = $request->except('_token');
        return $this->pageRepository->create($data);
    }

    public function getPageEditForl(Request $request)
    {
        $model = $this->pageRepository->find($request->get('id'));
        $html = \View::make('multisite::admin.assets.page_edit_form', compact('model'))->render();
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