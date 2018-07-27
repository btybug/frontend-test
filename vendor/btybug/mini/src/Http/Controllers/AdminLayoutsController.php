<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 18.07.2018
 * Time: 21:46
 */

namespace Btybug\Mini\Http\Controllers;


use App\Http\Controllers\Controller;
use Btybug\FrontSite\Repository\TagsRepository;
use Btybug\Mini\Model\MiniSuperLayouts;
use Btybug\Mini\Services\LayoutsService;
use Btybug\User\Repository\MembershipRepository;
use Illuminate\Http\Request;

class AdminLayoutsController extends Controller
{
    private $membershipRepository;
    private $tagsRepository;
    private $contentLayouts;

    public function __construct (
        MiniSuperLayouts $contentLayouts,
        MembershipRepository $membershipRepository,
        TagsRepository $tagsRepository
    )
    {
        $this->contentLayouts = $contentLayouts;
        $this->membershipRepository = $membershipRepository;
        $this->tagsRepository = $tagsRepository;
    }

    public function assetsLayouts (Request $request, LayoutsService $layoutsService, $slug = null)
    {
        $layouts = $this->contentLayouts->all()->get();
        $model = $layoutsService->getUnit($layouts, $slug);
        $variations = ($model) ? $model->variations()->all()->pluck('title', 'id') : collect([]);

        return view('multisite::admin.assets.layouts.preview', compact(['layouts', 'model', 'slug', 'variations']));
    }

    public function iframeRander ($slug)
    {
        $layout = $this->contentLayouts->find($slug);
        $variation = $layout->variations(false)->find($slug)->toArray()['settings'];
        $html = \View('multisite::admin.assets.layouts._partials.renderHtml')->with(['layout' => $layout, 'variation' => $variation])->render();

        return $html;
    }

    public function assetsLayoutSettings (Request $request, LayoutsService $layoutsService, $slug = null)
    {
        $layouts = $this->contentLayouts->all()->get();
        $model = $layoutsService->getUnit($layouts, $slug);
        $tags = $model->tags;
        $memberships = $this->membershipRepository->pluck('name', 'slug')->toArray();
        $tags = implode(',', $tags);

        return view('multisite::admin.assets.layouts.settings', compact(['layouts', 'model', 'slug', 'tags', 'memberships']));
    }

    public function postAssetsLayoutSettings (Request $request, $slug)
    {
        $tags = ($request->get('tags')) ? explode(',', $request->get('tags')) : [];
        $memberships = $request->get('memberships') ?? [];

        if (count($tags)) {
            foreach ($tags as $tag) {
                $this->tagsRepository->create(['name' => $tag, 'type' => 'minicms']);
            }
        }

        $layout = $this->contentLayouts->findByVariation($slug);
        if ($layout) {
            $layout->setAttributes('tags', $tags)->setAttributes('memberships', $memberships)->setAttributes('status', $request->get('status'))->edit();
        }

        return redirect()->back();
    }

    public function assetsLayoutLive ($slug, Request $request)
    {
        $settings = $request->all();
        if ($slug) {
            $view = $this->contentLayouts->renderLivePreview($slug, $settings);

            return $view ? $view : abort('404');
        } else {
            abort('404');
        }

    }

    public function assetsLayoutsCreateVariation ($slug)
    {
        $layout = $this->contentLayouts->find($slug);
        if (! $layout) abort(404);
        $variation = $layout->makeVariation();

        return redirect()->route('mini_admin_assets_layouts_live', $variation->id);
    }
}