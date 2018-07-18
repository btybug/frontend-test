<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 18.07.2018
 * Time: 21:46
 */

namespace Btybug\Mini\Http\Controllers;


use App\Http\Controllers\Controller;
use Btybug\btybug\Models\ContentLayouts\ContentLayouts;
use Btybug\Mini\Services\LayoutsService;
use Illuminate\Http\Request;

class AdminLayoutsController extends Controller
{
    public function __construct(ContentLayouts $contentLayouts)
    {
       $this->contentLayouts=$contentLayouts;
    }

    public function assetsLayouts(Request $request, LayoutsService $layoutsService,$slug = null)
    {
        $layouts = $this->contentLayouts->whereTag('minicms')->get();
        $model = $layoutsService->getUnit($layouts,$slug);
        return view('multisite::admin.assets.layouts.preview', compact(['layouts', 'model', 'slug']));
    }

    public function iframeRander($slug)
    {
        $layout = $this->contentLayouts->find($slug);
        $html = \View('multisite::admin.assets.layouts._partials.renderHtml')->with('layout', $layout)->render();

        return $html;
    }

    public function assetsLayoutSettings(Request $request, LayoutsService $layoutsService,$slug = null)
    {
        $layouts = $this->contentLayouts->whereTag('minicms')->get();
        $model = $layoutsService->getUnit($layouts,$slug);
        return view('multisite::admin.assets.layouts.settings', compact(['layouts', 'model', 'slug']));
    }
}