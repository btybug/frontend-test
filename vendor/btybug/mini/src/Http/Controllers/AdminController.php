<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 05.07.2018
 * Time: 21:28
 */

namespace Btybug\Mini\Http\Controllers;


use App\Http\Controllers\Controller;
use Btybug\FrontSite\Repository\TagsRepository;
use Btybug\Mini\Model\MiniSuperPainter;
use Btybug\Mini\Services\UnitService;
use Btybug\Uploads\Repository\FormBuilderRepository;
use Btybug\User\Repository\MembershipRepository;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    private $unitService;
    private $painter;
    private $tagsRepository;
    private $membershipRepository;
    private $formbuilderRepository;

    public function __construct(
        UnitService $unitService,
        MiniSuperPainter $painter,
        TagsRepository $tagsRepository,
        MembershipRepository $membershipRepository,
        FormBuilderRepository $formbuilderRepository

    )
    {
        $this->unitService = $unitService;
        $this->painter = $painter;
        $this->tagsRepository = $tagsRepository;
        $this->membershipRepository = $membershipRepository;
        $this->formbuilderRepository = $formbuilderRepository;
    }

    public function getIndex()
    {
        return view('multisite::admin.index');
    }

    public function getSettings()
    {
        return view('multisite::admin.settings');
    }

    public function getAssets()
    {
        return view('multisite::admin.assets.index');
    }

    public function assetsUnits(Request $request, $slug = null)
    {
        BBAddTab('mini_assets', [
            'title' => 'Add New Unit',
            'url' => '#',
            'item_class' => 'pull-right info'
        ]);
        $units = $this->painter->where('self_type', 'units')->get();
        $model = $this->unitService->getUnit($units, $slug);

        $tags = $model->tags;
        $memberships = $this->membershipRepository->pluck('name', 'slug')->toArray();

        $tags = implode(',', $tags);
        $variations = ($model) ? $model->variations()->all()->pluck('title', 'id') : collect([]);
        return view('multisite::admin.assets.units.preview', compact(['units', 'model', 'slug', 'tags', 'memberships', 'variations']));
    }


    public function postAssetsUnitsSettings(Request $request, $slug)
    {
        $tags = ($request->get('tags')) ? explode(',', $request->get('tags')) : [];
        $memberships = $request->get('memberships') ?? [];

        if (count($tags)) {
            foreach ($tags as $tag) {
                $this->tagsRepository->create(['name' => $tag, 'type' => 'minicms']);
            }
        }

        $unit = $this->painter->findByVariation($slug);
        $unit->setAttributes('tags', $tags)->setAttributes('memberships', $memberships)->setAttributes('status', $request->get('status'))->edit();

        return redirect()->back();
    }

    public function assetsForms()
    {
        $conditions = ['type' => 'user_settings', 'user_id' => null];
        $user_forms = $this->formbuilderRepository->findAllByMultiple($conditions);
        return view('multisite::admin.assets.forms')->with('user_forms', $user_forms);
    }

    public function formPublish($id)
    {
        $this->formbuilderRepository->find($id)->update(['is_published'=>1]);
        return redirect()->back();
    }
    public function formUnPublish($id)
    {
        $this->formbuilderRepository->find($id)->update(['is_published'=>0]);
        return redirect()->back();
    }

    public function CreateForms()
    {
        return view('multisite::admin.assets.formbuild');
    }

    public function assetsPlugins()
    {
        return view('multisite::admin.assets.plugins');

    }

    public function iframeRander($slug)
    {
        $html = render_mini_unit($slug, $this->painter);

        $html = \View('multisite::admin.assets.units._partials.renderHtml')->with('html', $html)->render();

        return $html;
    }

    public function renderWithForm($slug)
    {
        $html = render_mini_unit($slug, $this->painter);
        $unit = $this->painter->findByVariation($slug);
        $settings = $unit->renderSettings();
        $html = \View('multisite::admin.assets.units._partials.renderWithForm', compact('html', 'settings'))->render();

        return $html;
    }

    public function assetsUnitsSettings(Request $request, $slug = null)
    {
        $units = $this->painter->all()->get();
        $model = $this->unitService->getUnit($units, $slug);
        $tags = $model->tags;
        $memberships = $this->membershipRepository->pluck('name', 'slug')->toArray();

        $tags = implode(',', $tags);
        return view('multisite::admin.assets.units.settings', compact(['units', 'model', 'slug', 'tags', 'memberships']));
    }

    public function assetsUnitsLive($slug)
    {
        if ($slug) {
            $view = MiniSuperPainter::renderLivePreview($slug, 'frontend');

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

        return view('uploads::gears.units._partials.unit_preview', compact(['htmlBody', 'htmlSettings', 'settings', 'settings_json', 'id', 'ui']));
    }

    public function DeleteForms($id = null)
    {
        if ($id) {
            $this->formbuilderRepository->delete($id);
        }

        return back();
    }

    public function EditForms($id = null)
    {
        $editableData = $this->formbuilderRepository->findOrFail($id);

        return view('multisite::admin.assets.formbuild')->with('editableData', $editableData);
    }

    public function RenderForms($id = null)
    {
        $editableData = $this->formbuilderRepository->findOrFail($id);
        return view('uploads::applications.formRender')->with('editableData', $editableData);
    }
}