<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 04.07.2018
 * Time: 14:25
 */

namespace Btybug\Mini\Http\Controllers;


use Auth;
use Btybug\Console\Repository\FrontPagesRepository;
use Btybug\FrontSite\Repository\TagsRepository;
use Btybug\Mini\Model\MiniPainter;
use Btybug\Mini\Model\MiniSuperLayouts;
use Btybug\Mini\Model\MiniSuperPainter;
use Btybug\Mini\Services\LayoutsService;
use Btybug\Mini\Services\PagesService;
use Btybug\Mini\Services\UnitService;
use Btybug\Uploads\Repository\FormBuilderRepository;
use Btybug\User\Repository\MembershipRepository;
use Illuminate\Http\Request;
use Zend\Diactoros\Response;


class ClientController extends MiniController
{
    private $formBuilderRepository;
    private $unitService;
    private $painter;
    private $tagsRepository;
    private $membershipRepository;
    private $contentLayouts;
    private $formbuilderRepository;

    public function __construct(
        FormBuilderRepository $formBuilderRepository,
        UnitService $unitService,
        MiniSuperPainter $painter,
        TagsRepository $tagsRepository,
        MembershipRepository $membershipRepository,
        MiniSuperLayouts $contentLayouts,
        FormBuilderRepository $formbuilderRepository
    )
    {
        $this->contentLayouts = $contentLayouts;
        $this->unitService = $unitService;
        $this->painter = $painter;
        $this->tagsRepository = $tagsRepository;
        $this->membershipRepository = $membershipRepository;
        $this->formbuilderRepository = $formbuilderRepository;
    }

    public function account(Request $request)
    {
        $this->ennable($request);
        return $this->cms->run();
    }

    ////////////////////////////Account Settings /////////////////////////
    public function accountSettings(Request $request)
    {
        $this->ennable($request);
        return $this->cms->accountSettings();
    }

    public function accountSettingsTab1(Request $request)
    {
        $this->ennable($request);
        return $this->cms->accountSettingsTab1();
    }

    public function accountSettingsTab2(Request $request)
    {
        $this->ennable($request);
        return $this->cms->accountSettingsTab2();
    }

    public function accountSettingsTab3(Request $request)
    {
        $this->ennable($request);
        return $this->cms->accountSettingsTab3();
    }

    public function accountSettingsTab4(Request $request)
    {
        $this->ennable($request);
        return $this->cms->accountSettingsTab4();
    }

    ///////////////////////////////////////////////////////////////////////////
    public function accountForms(Request $request)
    {
        $user_forms = $this->formbuilderRepository->getAll();
        $this->ennable($request);
        return $this->cms->accountForms()->with('user_forms', $user_forms);
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

    public function extraWidgets(Request $request, $slug = null)
    {
        $this->ennable($request);
        $units = MiniPainter::where('self_type', 'widget')->get();
        $model = $this->unitService->getUserUnit($units, $slug);
        $tags = $model->tags;
        $memberships = $this->membershipRepository->pluck('name', 'slug')->toArray();
        $tags = implode(',', $tags);
        $variations = ($model) ? $model->makeUserVariationPath($slug, $this->user)->variations()->all()->pluck('title', 'id') : collect([]);

        return $this->cms->extraWidgets($units, $model, $slug, $tags, $memberships, $variations);
    }

    public function extraLayouts(Request $request, LayoutsService $layoutsService, $slug = null)
    {

        $layouts = $this->contentLayouts->all()->get();
        $model = $layoutsService->getUnit($layouts, $slug);
        $variations = ($model) ? $model->variations()->all()->pluck('title', 'id') : collect([]);
        $this->ennable($request);
        return $this->cms->extraLayouts($layouts, $model, $slug, $variations);
    }

    public function extraGears(Request $request, $slug = null)
    {
        $this->ennable($request);
        $units = MiniPainter::where('self_type', 'units')->get();
        $model = $this->unitService->getUserUnit($units, $slug);
        $tags = $model->tags;
        $memberships = $this->membershipRepository->pluck('name', 'slug')->toArray();
        $tags = implode(',', $tags);
        $variations = ($slug) ? $model->makeUserVariationPath($slug, $this->user)->variations()->all()->pluck('title', 'id') : collect([]);
        return $this->cms->extraGears($units, $model, $slug, $tags, $memberships, $variations);
    }

    public function editUserPage(Request $request, $id, PagesService $service, FrontPagesRepository $repository)
    {
        $service->editPage($request, $repository);
        return redirect()->back();
    }

    public function extraGearsOptimize(Request $request)
    {
        $this->ennable($request);
        MiniPainter::optimize();
        return redirect()->back();
    }

    public function extraPluginSettings(Request $request)
    {
        $this->ennable($request);
        return $this->cms->extraPluginSettings();
    }

    public function CreateForms(Request $request)
    {
        $this->ennable($request);
        return $this->cms->accountFormBuilder();
    }

    public function FormsSave(Request $request)
    {
        $data = $request->except('_token');
        if (!$request->id) {
            $this->formBuilderRepository->create([
                'title' => $data['formName'],
                'description' => $data['formDescription'],
                'form_json' => $data['body'],
                'user_id' => Auth::user()->id,
                'type' => 'user_settings'
            ]);
        } else {
            $this->formbuilderRepository->update($request->id, [
                'title' => $data['formName'],
                'description' => $data['formDescription'],
                'form_json' => $data['body'],
            ]);
        }

        $this->ennable($request);
        return $this->cms->FormSave();
    }


    public function accountFormsEdit(Request $request, $id = null)
    {
        $editableData = $this->formbuilderRepository->findOrFail($id);
        $this->ennable($request);
        return $this->cms->FormEdit($editableData);
    }

    public function accountFormsDelete(Request $request, $id = null)
    {
        $this->formbuilderRepository->delete($id);
        return back();
    }

    public function accountFormsRender(Request $request, $id = null)
    {
        $editableData = $this->formbuilderRepository->findOrFail($id);
        $this->ennable($request);
        return $this->cms->FormRender($editableData);
    }

    public function assetsUnitsPreview(Request $request, $slug)
    {
        $this->ennable($request);
        if ($slug) {
            $view = MiniPainter::renderLivePreviewUser($slug, $this->user);
            return $view ? $view : abort('404');
        } else {
            abort('404');
        }
    }

    public function assetsUnitsPreviewSave(Request $request)
    {
        $this->ennable($request);
        $output = MiniPainter::makeUserVariationPath($request->id, $this->user)->saveSettings($request->id, $request->itemname, $request->except(['_token', 'itemname']), $request->save);

        return response()->json([
            'error' => $output ? false : true,
            'url' => $output ? route('mini_extra_gears_preview', $output['slug']) : false,
            'html' => $output ? $output['html'] : false,
            'slug' => $output['slug']
        ]);
    }

    public function FormsInputs(Request $request, $id)
    {
        $this->ennable($request);
        return $this->cms->FormInputs($id);
    }

    public function getFavourites(Request $request)
    {
        $this->ennable($request);
        return $this->cms->getFavourites();
    }

    public function CreateGearVariation(Request $request, $slug)
    {
        $this->ennable($request);
        $layout = MiniPainter::find($request->id);
        if (!$layout) abort(404);
        $variation = $layout->makeUserVariationPath($request->id, $this->user)->makeVariation();
        return redirect()->route('mini_extra_gears_preview', $variation->id);
    }


    public function assetsUnitsLive($slug = null)
    {
        if ($slug) {
            $view = MiniSuperPainter::renderLivePreview($slug, 'frontend');
            $view->data['body'] = route('mini_extra_gears_settings_iframe', $slug);
            $view->data['settings'] = url('mini_extra_gears_settings_iframe', $slug) . '/settings';
            return $view ? $view : abort('404');
        } else {
            abort('404');
        }
    }

    public function unitPreviewIframe($id, $type = null)
    {
        $slug = explode('.', $id);
        $ui = MiniSuperPainter::find($slug[0]);
        $variation = $ui->variations(false)->find($id);
        $settings = [];
        $extra_data = 'some string';
        if (count($variation->settings) > 0) {
            $settings = $variation->settings;
        }
        if ($ui->main_type == 'data_source') {
            $extra_data = BBGiveMe('array', 3);
        }
        $htmlBody = $ui->renderLive(['settings' => $settings, 'source' => $extra_data, 'cheked' => 1, 'field' => null]);
        $htmlSettings = $ui->renderSettings(compact('settings'));
        $settings_json = json_encode($settings, true);
        $ui->setSaveUrl(route('minicms_settings_save', $id));
        return view('multisite::admin.assets.units._partials.unit_preview', compact(['htmlBody', 'htmlSettings', 'settings', 'settings_json', 'id', 'ui']));
    }

    public function unitPreviewIframeUser($id, $type = null, Request $request)
    {
        $this->ennable($request);
        $slug = explode('.', $id);
        $ui = MiniPainter::find($slug[0]);
        $ui->makeUserVariationPath($id, $this->user);
        $variation = $ui->variations(false)->find($id);
        $settings = [];
        $extra_data = 'some string';
        if (count($variation->settings) > 0) {
            $settings = $variation->settings;
        }
        if ($ui->main_type == 'data_source') {
            $extra_data = BBGiveMe('array', 3);
        }
        $htmlBody = $ui->renderLive(['settings' => $settings, 'source' => $extra_data, 'cheked' => 1, 'field' => null]);
        $htmlSettings = $ui->renderSettings(compact('settings'));
        $settings_json = json_encode($settings, true);
        $ui->setSaveUrl(route('minicms_settings_save_user', $id));
        return view('multisite::admin.assets.units._partials.unit_preview', compact(['htmlBody', 'htmlSettings', 'settings', 'settings_json', 'id', 'ui']));
    }

    public function home(Request $request)
    {
        $this->ennable($request);
        return $this->cms->home();
    }

    public function dashboard(Request $request)
    {
        $this->ennable($request);
        $units = $this->painter->where('self_type', 'units')->get();
        return $this->cms->dashboard($units);
    }

    public function communications(Request $request)
    {
        $this->ennable($request);
        return $this->cms->communications();
    }

    public function communication_notifications(Request $request)
    {
        $this->ennable($request);
        return $this->cms->communication_notifications();
    }

    public function communication_messages(Request $request)
    {
        $this->ennable($request);
        return $this->cms->communication_messages();
    }

    public function communication_subscribers(Request $request)
    {
        $this->ennable($request);
        return $this->cms->communication_subscribers();
    }

    public function sorting(Request $request)
    {
        dd($request);
    }
}