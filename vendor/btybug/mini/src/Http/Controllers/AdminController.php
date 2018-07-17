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
use Btybug\Mini\Repositories\MinicmsPagesRepository;
use Btybug\Mini\Services\UnitService;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    private $unitService;

    public function __construct(
        UnitService $unitService
    )
    {
        $this->unitService = $unitService;
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
        $units = Painter::whereTag('minicms')->get();
        $model = $this->unitService->getUnit($units, $slug);

        return view('multisite::admin.assets.units.preview', compact(['units', 'model','slug']));
    }

    public function assetsUnitsForm(Request $request, $slug = null)
    {
        $units = Painter::whereTag('minicms')->get();
        $model = $this->unitService->getUnit($units, $slug);

        return view('multisite::admin.assets.units.form', compact(['units', 'model','slug']));
    }

    public function assetsUnitsMapping(Request $request, $slug = null)
    {
        $units = Painter::whereTag('minicms')->get();
        $model = $this->unitService->getUnit($units, $slug);

        return view('multisite::admin.assets.units.mapping', compact(['units', 'model','slug']));
    }

    public function assetsUnitsSettings(Request $request, $slug = null)
    {
        $units = Painter::whereTag('minicms')->get();
        $model = $this->unitService->getUnit($units, $slug);

        return view('multisite::admin.assets.units.settings', compact(['units', 'model','slug']));
    }

    public function assetsForms()
    {
        return view('multisite::admin.assets.forms');
    }

    public function assetsPages(MinicmsPagesRepository $pagesRepository)
    {
        $pages = $pagesRepository->getAll();

        return view('multisite::admin.assets.pages', compact('pages'));

    }

    public function assetsPlugins()
    {
        return view('multisite::admin.assets.plugins');

    }

    public function iframeRander($slug)
    {
        return BBRenderUnits($slug);
    }

    public function createPage(Request $request, MinicmsPagesRepository $pagesRepository)
    {
        $data = $request->except('_token');

        return $pagesRepository->create($data);
    }


}