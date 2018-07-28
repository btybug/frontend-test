<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 05.07.2018
 * Time: 21:28
 */

namespace Btybug\Mini\Http\Controllers;


use App\Http\Controllers\Controller;
use Btybug\btybug\Models\Painter\Painter;
use Btybug\FrontSite\Repository\TagsRepository;
use Btybug\Mini\Model\MiniSuperLayouts;
use Btybug\Mini\Model\MiniSuperPainter;
use Btybug\Mini\Services\UnitService;
use Btybug\User\Repository\MembershipRepository;
use Illuminate\Http\Request;

class AdminWidgetsController extends Controller
{

    private $unitService;
    private $painter;
    private $tagsRepository;
    private $membershipRepository;

    public function __construct(
        UnitService $unitService,
        MiniSuperPainter $painter,
        TagsRepository $tagsRepository,
        MembershipRepository $membershipRepository
    )
    {
        $this->unitService = $unitService;
        $this->painter = $painter;
        $this->tagsRepository = $tagsRepository;
        $this->membershipRepository = $membershipRepository;
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
        $units = $this->painter->where('self_type','widget')->get();
        $model = $this->unitService->getUnit($units, $slug);

        $tags = $model->tags;
        $memberships = $this->membershipRepository->pluck('name','slug')->toArray();

        $tags = implode(',', $tags);
        $variations = ($model) ? $model->variations()->all()->pluck('title', 'id') : collect([]);
        return view('multisite::admin.assets.widgets.preview', compact(['units', 'model', 'slug','tags','memberships','variations']));
    }


    public function postAssetsUnitsSettings(Request $request, $slug)
    {
        $tags = ($request->get('tags')) ? explode(',', $request->get('tags')) : [];
        $memberships = $request->get('memberships') ?? [];

        if(count($tags)){
            foreach ($tags as $tag){
                $this->tagsRepository->create(['name' => $tag,'type' => 'minicms']);
            }
        }

        $unit = $this->painter->findByVariation($slug);
        $unit->setAttributes('tags',$tags)->setAttributes('memberships',$memberships)->setAttributes('status',$request->get('status'))->edit();

        return redirect()->back();
    }

    public function assetsForms()
    {
        return view('multisite::admin.assets.forms');
    }

    public function assetsPlugins()
    {
        return view('multisite::admin.assets.plugins');

    }

    public function iframeRander($slug)
    {
        $html = render_mini_unit($slug, $this->painter);

        $html = \View('multisite::admin.assets.widgets._partials.renderHtml')->with('html', $html)->render();

        return $html;
    }

    public function renderWithForm($slug)
    {
        $html = render_mini_unit($slug, $this->painter);
        $unit = $this->painter->findByVariation($slug);
        $settings = $unit->renderSettings();
        $html = \View('multisite::admin.assets.widgets._partials.renderWithForm',compact('html','settings'))->render();

        return $html;
    }
    public function assetsUnitsSettings(Request $request, $slug = null)
    {
        $units = $this->painter->whwere('self_type','widget')->get();
        $model = $this->unitService->getUnit($units, $slug);
        $tags = $model->tags;
        $memberships = $this->membershipRepository->pluck('name','slug')->toArray();

        $tags = implode(',', $tags);
        return view('multisite::admin.assets.widgets.settings', compact(['units', 'model', 'slug','tags','memberships']));
    }
    public function assetsUnitsLive ($slug)
    {
        if ($slug) {
            $view = MiniSuperPainter::renderLivePreview($slug, 'frontend');

            return $view ? $view : abort('404');
        } else {
            abort('404');
        }
    }
    public function unitPreviewIframe ($id, $type = null)
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

        return view('multisite::admin.assets.widgets._partials.unit_preview', compact(['htmlBody', 'htmlSettings', 'settings', 'settings_json', 'id', 'ui']));
    }
    public function postSettings (Request $request)
    {
        $output = MiniSuperPainter::saveSettings($request->id, $request->itemname, $request->except(['_token', 'itemname']), $request->save);

        return response()->json([
            'error' => $output ? false : true,
            'url'   => $output ? url('/admin/mini/assets/widgets/live/' . $output['slug']) : false,
            'html'  => $output ? $output['html'] : false,
            'slug'  => $output['slug']
        ]);
    }
    public function assetsCreateWidgetVariation ($slug)
    {
        $layout = $this->painter->find($slug);
        if (! $layout) abort(404);
        $variation = $layout->makeVariation();
        return redirect()->route('mini_admin_assets_widgets_live', $variation->id);
    }
}