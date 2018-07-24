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

class AdminController extends Controller
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
        $units = $this->painter->all()->get();
        $model = $this->unitService->getUnit($units, $slug);

        return view('multisite::admin.assets.units.preview', compact(['units', 'model', 'slug']));
    }

    public function assetsUnitsSettings(Request $request, $slug = null)
    {
        $units = $this->painter->all()->get();
        $model = $this->unitService->getUnit($units, $slug);
        $tags = $model->tags;
        $memberships = $this->membershipRepository->pluck('name','slug')->toArray();

        $tags = implode(',', $tags);
        return view('multisite::admin.assets.units.settings', compact(['units', 'model', 'slug','tags','memberships']));
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
        $unit->setAttributes('tags',$tags)->setAttributes('memberships',$memberships)->edit();

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

        $html = \View('multisite::admin.assets.units._partials.renderHtml')->with('html', $html)->render();

        return $html;
    }

    public function renderWithForm($slug)
    {
        $html = render_mini_unit($slug, $this->painter);
        $unit = $this->painter->findByVariation($slug);
        $settings = $unit->renderSettings();
        $html = \View('multisite::admin.assets.units._partials.renderWithForm',compact('html','settings'))->render();

        return $html;
    }
}