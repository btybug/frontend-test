<?php
/**
 * Copyright (c) 2017.
 * *
 *  * Created by PhpStorm.
 *  * User: Edo
 *  * Date: 10/3/2016
 *  * Time: 10:44 PM
 *
 */

namespace Btybug\FrontSite\Http\Controllers;

use App\Events\PageCreateEvent;
use App\Http\Controllers\Controller;
use Btybug\btybug\Helpers\helpers;
use Btybug\btybug\Models\ContentLayouts\ContentLayouts;
use Btybug\btybug\Models\ContentLayouts\MainBody;
use Btybug\btybug\Models\Settings;
use Btybug\btybug\Repositories\AdminsettingRepository;
use Btybug\btybug\Services\CmsItemReader;
use Btybug\Console\Repository\FrontPagesRepository;
use Btybug\FrontSite\Models\FrontendPage;
use Btybug\FrontSite\Repository\ClassifierRepository;
use Btybug\FrontSite\Repository\VersionsRepository;
use Btybug\FrontSite\Services\ClassifierService;
use Btybug\FrontSite\Services\FrontendPageService;
use Btybug\Modules\Models\Fields;
use Btybug\Uploads\Repository\VersionProfilesRepository;
use Btybug\User\Repository\MembershipRepository;
use Btybug\User\Repository\SpecialAccessRepository;
use Btybug\User\Services\RoleService;
use Btybug\User\Services\UserService;
use Illuminate\Http\Request;
use Response;
use Validator;
use View;

/**
 * Class PageController
 *
 * @package Btybug\Tools\Http\Controllers
 */
class PagesController extends Controller
{

    // private $page;
    /**
     * @var helpers|null
     */
    private $helpers = null;
    /**
     * @var null|string
     */
    private $home = null;

    /**
     * PageController constructor.
     *
     * @param Page $page
     * @param Manage $manager
     * @param Termrepository $term
     * @param WidgetRepository $widgetRepository
     */
    public function __construct(Settings $settings)
    {
        $this->helpers = new helpers;
        $this->settings = $settings;
    }

    /**
     * @param string $type
     * @return View
     */
    public function getIndex(
        Request $request,
        FrontPagesRepository $frontPagesRepository,
        UserService $userService
    )
    {
        $type = $request->get('type', 'core');
        $pages = $frontPagesRepository->getGroupedWithModule();

        $admins = $userService->getAdmins()->pluck('username', 'id')->toArray();
        return view('manage::frontend.pages.index', compact(['page', 'pages', 'admins', 'tags', 'type', 'classifierPageRelations']));
    }

    public function getSettings(
        Request $request,
        FrontPagesRepository $frontPagesRepository,
        UserService $userService,
        ClassifierRepository $classifierRepository,
        ClassifierService $classifierService,
        FrontendPageService $frontendPageService,
        VersionProfilesRepository $profilesRepository,
        AdminsettingRepository $adminsettingRepository
    )
    {

        $id = $request->param;
        $page = $frontPagesRepository->find($id);
        $admins = $userService->getAdmins()->pluck('username', 'id')->toArray();
        $tags = $page->tags;
        $classifies = $classifierRepository->getAll();
        $classifierPageRelations = $classifierService->getClassifierPageRelations($page->id);
        $cssData = $profilesRepository->wherePluck('type', 'css', 'name', 'id')->toArray();
        $jsData = $profilesRepository->wherePluck('type', 'js', 'name', 'id')->toArray();
        $page->setAttribute('cssData', $cssData);
        $page->setAttribute('jsData', $jsData);

        return view('manage::frontend.pages.settings', compact(['page', 'admins', 'tags', 'id', 'classifies', 'classifierPageRelations', 'cssData', 'jsData']));
    }

    public function getSpecialSettings(
        Request $request,
        FrontPagesRepository $frontPagesRepository,
        UserService $userService,
        ClassifierRepository $classifierRepository,
        ClassifierService $classifierService,
        FrontendPageService $frontendPageService,
        VersionsRepository $versionsRepository,
        AdminsettingRepository $adminsettingRepository
    )
    {
        $id = $request->param;
        $page = $frontPagesRepository->find($id);
        $tags = $page->tags;
        $placeholders = $frontendPageService->getPlaceholdersInUrl($page->page_layout_settings);
        $cssData = $versionsRepository->wherePluck('type', 'css', 'name', 'id')->toArray();
        $jsData = $versionsRepository->getJSLiveLinks(true)->toArray();
        return view('manage::frontend.pages.special_settings', compact(['page', 'admins', 'tags', 'id', 'placeholders', 'cssData', 'jsData']));
    }

    public function getGeneral(
        Request $request,
        FrontPagesRepository $frontPagesRepository,
        UserService $userService,
        ClassifierRepository $classifierRepository,
        ClassifierService $classifierService,
        FrontendPageService $frontendPageService,
        RoleService $roleService,
        MembershipRepository $membershipRepository,
        SpecialAccessRepository $specialAccessRepository
    )
    {
        $id = $request->id;
        $page = $frontPagesRepository->find($id);
        $admins = $userService->getAdmins()->pluck('username', 'id')->toArray();
        $tags = $page->tags;
        $classifies = $classifierRepository->getAll();
        $classifierPageRelations = $classifierService->getClassifierPageRelations($page->id);
        $memberships = $membershipRepository->pluck('name', 'id')->toArray();
        $specials = $specialAccessRepository->pluck('name', 'id')->toArray();

        return view('manage::frontend.pages.general', compact(['page', 'admins', 'specials', 'tags', 'id', 'classifies', 'classifierPageRelations', 'memberships']));
    }

    public function getSpecialGeneral(
        Request $request,
        FrontPagesRepository $frontPagesRepository,
        UserService $userService,
        ClassifierRepository $classifierRepository,
        ClassifierService $classifierService,
        FrontendPageService $frontendPageService,
        RoleService $roleService,
        MembershipRepository $membershipRepository,
        SpecialAccessRepository $specialAccessRepository
    )
    {
        $id = $request->id;
        $page = $frontPagesRepository->find($id);
        $admins = $userService->getAdmins()->pluck('username', 'id')->toArray();
        $tags = $page->tags;
        $classifies = $classifierRepository->getAll();
        $classifierPageRelations = $classifierService->getClassifierPageRelations($page->id);
        $placeholders = $frontendPageService->getPlaceholdersInUrl($page->page_layout_settings);
        $memberships = $membershipRepository->pluck('name', 'id')->toArray();
        $specials = $specialAccessRepository->pluck('name', 'id')->toArray();

        return view('manage::frontend.pages.special-general', compact(['page', 'admins', 'specials', 'tags', 'id', 'classifies', 'classifierPageRelations', 'placeholders', 'memberships']));
    }

    public function postSettings(
        Request $request,
        FrontendPageService $frontendPageService
    )
    {
        $updatedPage = $frontendPageService->saveSettings($request);

        if (isset($request->redirect_type) && $request->redirect_type == 'view') {
            return redirect('/admin/manage/structure/front-pages/page-test-preview/'
                . $updatedPage->id . "?pl_live_settings=page_live&pl="
                . $updatedPage->page_layout
                . '&'
                . $frontendPageService->getPlaceholdersInUrl($updatedPage->page_layout_settings)
                . '&content_type=' . $request->get('content_type') . '&template=' . $request->get('template'));
        }
        $extraMessage='';
        try{
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, url($updatedPage->url));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            $data = curl_exec($ch);
            curl_close($ch);
        }catch (\Exception $e){
            $extraMessage=$e->getMessage();
        }


        return redirect()->back()->with('message', 'Page settings has been saved successfully.'." $extraMessage");
    }

    public function postSpecialSettings(
        Request $request,
        FrontendPageService $frontendPageService,
        VersionsRepository $versionsRepository,
        AdminsettingRepository $adminsettingRepository
    )
    {
        $updatedPage = $frontendPageService->saveSpecialSettings($request);

        return redirect()->back()->with('message', 'Page settings has been saved successfully.');
    }

    public function postGeneral(
        Request $request,
        FrontendPageService $frontendPageService
    )
    {
        $frontendPageService->saveGeneralSettings($request);

        return redirect()->back()->with('message', 'Page settings has been saved successfully.');
    }


    public function postData(
        Request $request,
        FrontPagesRepository $frontPagesRepository,
        UserService $userService
    )
    {
        $id = $request->id;
        if ($page = $frontPagesRepository->find($id)) {
            if ($page && !$page->page_section) $page->page_section = 0;
            $admins = $userService->getAdmins()->pluck('username', 'id')->toArray();
            $html = View("manage::frontend.pages._partials.page-data", compact(['html', 'page', 'admins']))->render();
            return \Response::json(['error' => false, 'html' => $html]);
        }
        return \Response::json(['error' => true]);
    }

    public function postUserAvatar(Request $request)
    {
        return Response::json(['url' => BBGetUserAvatar($request->id)]);
    }

    public function postClassify(
        Request $request,
        ClassifierRepository $classifierRepository,
        ClassifierService $classifierService
    )
    {
        $classify = $classifierRepository->find($request->id);
        $type = $request->type;
        if ($classify) {
            $termsList = $classifierService->classifierItems();
            $html = View('manage::frontend.pages._partials.classify-items', compact(['termsList', 'classify', 'type']))->render();

            return Response::json(['error' => false, 'html' => $html]);
        }
        return Response::json(['error' => false]);
    }

    public function postNew(
        FrontendPageService $frontendPageService,
        Request $request
    )
    {
        $new = $frontendPageService->addNewPage(null, $request->get('type'));
        event(new PageCreateEvent($new, $request->all()));
        return redirect()->back();
    }

    public function getAddChild(
        Request $request,
        FrontendPageService $frontendPageService
    )
    {
        $new = $frontendPageService->addNewPage($request->parent_id);
        if ($new) return redirect()->to('/admin/manage/structure/front-pages' . '?type=custom')->with('message', 'Congratulations: New Page Created Successfully');

        return redirect()->back()->with('message', 'Page not Created');
    }

    public function postDelete(
        Request $request,
        FrontPagesRepository $frontPagesRepository
    )
    {
        $page = $frontPagesRepository->find($request->slug);
        $result = $frontPagesRepository->delete($page->id);

        return \Response::json(['success' => true, 'message' => "Page successfully deleted"]);
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postCreate(Request $request)
    {
        //TODO delete if needed
        $req = $request->all();
        unset($req['_token']);
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|max:255|min:3',
                'view_url' => 'required|max:25|min:3|unique:core_pages,view_url',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $req['code'] = str_slug($req['view_url'], "-");
            $this->page->create($req);
            $this->helpers->updatesession('Page Added Successfully!', 'alert-success');
            return redirect($this->home);
        }
    }

    /**
     * @param $id
     * @return View
     */
    public function getUpdate($id)
    {
        //TODO delete if needed
        $data = $this->page->getPage($id);
        return view('create::front_pages.edit', $data);
    }

    public function getPagePreview($page_id, Request $request)
    {
        $layout = $request->get('pl');
        $main_view = $request->get('mw');
        $isLivePreview = $request->get('pl_live_settings');

        $page = FrontendPage::find($page_id);
        $url = null;
        if (!$page) return redirect()->back();
        if (!str_contains($page->url, '{param}')) $url = $page->url;

        $layouts = CmsItemReader::getAllGearsByType('page_sections')
            ->where('place', 'frontend')
            ->pluck("title", "slug");

        $main_views = CmsItemReader::getAllGearsByType('main_view')
            ->where('place', 'frontend')
            ->pluck("title", "slug");
        // $html = \View::make("ContentLayouts.$layout.$layout")->with(['settings'=>$this->options])->render();
        $lay = ContentLayouts::findVariation($layout);

        if (!$lay) {
            return view('manage::frontend.pages.page-preview', ['data' => compact(['page_id', 'layout', 'page', 'url', 'layouts', 'isLivePreview', 'main_views', 'main_view'])]);
        }

        $view['view'] = "manage::frontend.pages.page-preview";
        $view['variation'] = $lay;
        $data = explode('.', $layout);

        return ContentLayouts::find($data[0])->renderSettings($view, compact(['page_id', 'layout', 'page', 'url', 'layouts', 'isLivePreview', 'main_views', 'main_view']));
    }

    public function getPageTestPreview($page_id, Request $request)
    {
        $layout = $request->get('pl');
        $main_view = $request->get('mw');
        $isLivePreview = $request->get('pl_live_settings');
        if (!$layout) {
            $default = Settings::where('section', 'setting_system')->where('settingkey', 'frontend_page_section')->first();
            if ($default) {
                return redirect('/admin/manage/structure/front-pages/page-test-preview/1?pl_live_settings=page_live&pl=' . $default->val);
            }

        }
        $page = FrontendPage::find($page_id);
        $url = null;
        if (!$page) return redirect()->back();
        if (!str_contains($page->url, '{param}')) $url = $page->url;

        $layouts = CmsItemReader::getAllGearsByType('page_sections')
            ->where('place', 'frontend')
            ->pluck("title", "slug");

        $main_views = CmsItemReader::getAllGearsByType('main_view')
            ->where('place', 'frontend')
            ->pluck("title", "slug");
        $settings = $request->except('_token');
        $settings['main_content'] = $page->main_content;
        $data = compact(['page_id', 'layout', 'page', 'url', 'layouts', 'isLivePreview', 'main_views', 'main_view', 'settings']);

        return view('manage::frontend.pages.page-test-preview', compact('settings', 'data'));
    }

    public function postPagePreview($page_id, Request $request)
    {
        $pageLayoutSettings = $request->except(['pl', 'image', 'pl_live_settings', 'layout_id']);
        $data = $request->except(['pl', 'image']);
        $layout_id = $request->get('layout_id');
        $mw = $request->get('mw');
        $header = $request->get('header', 0);
        $footer = $request->get('footer', 0);
        $page = FrontendPage::find($page_id);
        if ($layout_id && !ContentLayouts::findVariation($layout_id)) return \Response::json(['error' => true, 'message' => 'Page Section not found  !!!']);
        if ($mw && !MainBody::findVariation($mw)) return \Response::json(['error' => true, 'message' => 'Main view not found  !!!']);
        $data['page_id'] = $page_id;

        $v = \Validator::make($data, ['page_id' => "exists:frontend_pages,id"]);

        if ($v->fails()) return \Response::json(['error' => true, 'message' => $v->messages()]);
        if ($page) {
            $page->page_layout_settings = (!empty($pageLayoutSettings)) ? $pageLayoutSettings : null;
            $page->page_layout = $layout_id ? $layout_id : NULL;
            $page->save();
            return \Response::json(['error' => false, 'message' => 'Page Layout settings Successfully assigned', 'url' => url('admin/manage/frontend/pages/settings', [$page->id])]);
        }

        return \Response::json(['error' => true, 'message' => 'Page not found  !!!']);
    }

    public function getFieldsByGroup(Request $request)
    {
        $form = Forms::find($request->get('id'));

        if ($form) {
            if ($form->form_type == 'user') {
                $fields = Fields::where('table_name', $form->fields_type)->where('status', Fields::ACTIVE)->where('available_for_users', 1)->get()->toArray();
            } else {
                $fields = Fields::where('table_name', $form->fields_type)->where('status', Fields::ACTIVE)->get()->toArray();
            }

            return \Response::json(['fields' => $fields]);
        }

        return \Response::json(['error' => true, 'message' => 'Form not found']);
    }

    public function liveSettings(Request $request)
    {
        \Session::put('live_pages', [$request->id => $request->except('_token')]);
        return Response::json(['success' => true]);
    }

    public function postPageLive($id)
    {
        $page = FrontendPage::find($id);
        $session = \Session::get('live_pages');
        $settings = $session[$id]['page_layout_settings'];
        if (isset($session[$id]['live_edit']) && $session[$id]['live_edit'] == "live_edit") {
            $data = $session[$id];
            $model = ContentLayouts::findByVariation($data['page_layout']);
            $html = $model->render($settings);
            $settingsHtml = view('manage::frontend.pages._partials.settings_preview', compact(['settings', 'model', 'page']))->render();
            return view('manage::frontend.pages._partials.live_preview', compact(['html', 'model', 'settingsHtml', 'page']));
        }

        $page->page_layout = $session[$id]['page_layout'];
        $page->header = $session[$id]['header'];
        $page->footer = $session[$id]['footer'];
        return view('btybug::front_pages', compact(['settings', 'page']));

    }

    public function postSortPages(
        Request $request,
        FrontendPageService $pageService
    )
    {
        $result = $pageService->sort($request->only('item', 'parent'));
        return Response::json(['error' => $result]);
    }

    public function getExtra($id)
    {
        return view('manage::frontend.pages.extra', compact('id'));
    }

    public function getSettingsLayout($id,FrontPagesRepository $repository,Request $request)
    {
        $page=$repository->find($id);
        $layout=$request->get('layout');
        if(! $layout) $layout = $page->page_layout;
        $slug = $request->get('variations');
        if(! $slug) $slug = $layout.'.default';

        $inherit = $request->get('inherit',$page->page_layout_inheritance);
//        dd($inherit);
        if($inherit){
            $parent = $page->parent;
            if($parent){
                $page->page_layout_settings = $parent->page_layout_settings;
                $page->page_layout = $parent->page_layout;
                $slug = $parent->page_layout;
            }
        }

        $page->page_layout_inheritance = $inherit;
        $settings=($request->get('layout'))?[]:(@json_decode($page->page_layout_settings,true))?json_decode($page->page_layout_settings,true):[];

        if ($slug) {
            $view = ContentLayouts::renderPageLivePreview($slug,$settings,$page);

            return $view ? $view : abort('404');
        } else {
            abort('404');
        }
    }

}
