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
use Btybug\User\Repository\MembershipRepository;
use Illuminate\Http\Request;

class AdminLayoutsController extends Controller
{
    private $membershipRepository;

    public function __construct(
        MiniSuperLayouts $contentLayouts,
        MembershipRepository $membershipRepository
    )
    {
        $this->contentLayouts = $contentLayouts;
        $this->membershipRepository = $membershipRepository;
    }

    public function assetsLayouts(Request $request, LayoutsService $layoutsService, $slug = null)
    {
        $layouts = $this->contentLayouts->whereTag('minicms')->get();
        $model = $layoutsService->getUnit($layouts, $slug);
        $variations = ($model) ? $model->variations()->all()->pluck('title', 'id') : collect([]);
        return view('multisite::admin.assets.layouts.preview', compact(['layouts', 'model', 'slug', 'variations']));
    }

    public function iframeRander($slug)
    {
        $layout = $this->contentLayouts->find($slug);
        $variation = $layout->variations(false)->find($slug)->toArray()['settings'];
        $html = \View('multisite::admin.assets.layouts._partials.renderHtml')->with(['layout' => $layout, 'variation' => $variation])->render();
        return $html;
    }

    public function assetsLayoutSettings(Request $request, LayoutsService $layoutsService, $slug = null)
    {
        $layouts = $this->contentLayouts->whereTag('minicms')->get();
        $model = $layoutsService->getUnit($layouts, $slug);
        $tags = null;
        $memberships = $this->membershipRepository->pluck('name','slug')->toArray();

        return view('multisite::admin.assets.layouts.settings', compact(['layouts', 'model', 'slug','tags','memberships']));
    }

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
        $layout = $this->contentLayouts->find($slug);
        if (!$layout) abort(404);
        $variation = $layout->makeVariation();
        return redirect()->route('mini_admin_assets_layouts_live', $variation->id);
    }
}