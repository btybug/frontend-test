<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 18.07.2018
 * Time: 21:46
 */

namespace Btybug\Mini\Http\Controllers;


use App\Http\Controllers\Controller;
use Btybug\Mini\Model\MiniSuperLayouts;
use Btybug\Mini\Services\LayoutsService;
use Illuminate\Http\Request;

class AdminLayoutsController extends Controller
{
    public function __construct(MiniSuperLayouts $contentLayouts)
    {
        $this->contentLayouts = $contentLayouts;
    }

    public function assetsLayouts(Request $request, LayoutsService $layoutsService, $slug = null)
    {
        $layouts = $this->contentLayouts->whereTag('minicms')->get();
        $model = $layoutsService->getUnit($layouts, $slug);
        $variations=($model)?$model->variations()->all()->pluck('title','id'):collect([]);
        return view('multisite::admin.assets.layouts.preview', compact(['layouts', 'model', 'slug','variations']));
    }

    public function iframeRander($slug)
    {
        $layout = $this->contentLayouts->find($slug);
        $variation = $layout->variations(false)->find($slug)->toArray()['settings'];
        $html = \View('multisite::admin.assets.layouts._partials.renderHtml')->with(['layout' => $layout, 'variation' => $variation])->render();
        return $html;
    }

//    public function assetsLayoutLive(Request $request, LayoutsService $layoutsService, $slug = null)
//    {
//$layouts = $this->contentLayouts->whereTag('minicms')->get();
//$model = $layoutsService->getUnit($layouts, $slug);
//return view('multisite::admin.assets.layouts.settings', compact(['layouts', 'model', 'slug']));
//}

    public function assetsLayoutLive($slug, Request $request)
    {
        $settings = $request->all();
        if ($slug) {
            $view = $this->contentLayouts->renderLivePreview($slug, $settings);

            return $view ? $view : abort('404');
        } else {
            abort('404');
        }

    }

    public function assetsLayoutsCreateVariation($slug)
    {
        $layout=$this->contentLayouts->find($slug);
        dd($layout->makeVariation());

        if(!$layout)return abort(404);
    }
}