<?php namespace Btybug\Uploads\Http\Controllers;

use App\Http\Controllers\Controller;
use Btybug\btybug\Models\ContentLayouts\ContentLayouts;
use Btybug\btybug\Models\Sections;
use Btybug\btybug\Services\CmsItemUploader;
use Btybug\Console\Repository\FrontPagesRepository;
use Illuminate\Http\Request;
use Resources;
use View;


/**
 * Class SectionsController
 * @package Btybug\Console\Http\Controllers
 */
class PageSectionsController extends Controller
{

    /**
     * @var null
     */
    private $helpers = null;
    /**
     * @var CmsItemUploader
     */
    private $upload;

    /**
     * SectionsController constructor.
     */
    public function __construct()
    {
        $this->upload = new CmsItemUploader('page_sections');
    }

    /**
     * @param Request $request
     * @return View
     */
    public function getIndex(Request $request)
    {
        $slug = $request->get('p', 0);
        $currentPageSection = null;
        $all_layouts = ContentLayouts::all()->get();
        $pageSections = ContentLayouts::all()->paginate(4, 4, 'bty-pagination-2');
        if ($slug) {
            $currentPageSection = ContentLayouts::find($slug);

        } else {
            if (count($pageSections)) {
                $currentPageSection = $pageSections[0];
            }
        }
        $variations = $currentPageSection ? $currentPageSection->variations()->all() : [];

        return view('uploads::gears.page_sections.index', compact(['pageSections', 'all_layouts', 'currentPageSection', 'variations', 'type']));
    }

    public function getIndexFromPost(Request $request)
    {
        $pageSections = json_decode($request->arr, true);
        if (!count($pageSections)) {
            $all_layouts = ContentLayouts::all()->get();
            $pageSections = ContentLayouts::all()->paginate(4, 4, 'bty-pagination-2');
        } else {
            $pageSections = ContentLayouts::makeUnits($pageSections);
            $all_layouts = $pageSections->get();
            $pageSections = $pageSections->paginate(4, 4, 'bty-pagination-2');
        }

        return \Response::json(View::make('uploads::gears.page_sections._partials.page_section_variations', compact(['pageSections', 'all_layouts']))->render());
    }

    public function getFrontend(Request $request)
    {
        $slug = $request->get('p', 0);
        $currentPageSection = null;
        $all_layouts = ContentLayouts::all()->get();
        $pageSections = ContentLayouts::all()->paginate(4, 4, 'bty-pagination-2');
        if ($slug) {
            $currentPageSection = ContentLayouts::find($slug);

        } else {
            if (count($pageSections)) {
                $currentPageSection = $pageSections[0];
            }
        }

        $variations = $currentPageSection ? $currentPageSection->variations()->all() : [];

        return view('uploads::gears.page_sections.index', compact(['pageSections', 'all_layouts', 'currentPageSection', 'variations', 'type']));
    }

    public function getFrontendFromPost(Request $request)
    {
        $pageSections = json_decode($request->arr, true);
        if (!count($pageSections)) {
            $all_layouts = ContentLayouts::all()->get();
            $pageSections = ContentLayouts::all()->paginate(4, 4, 'bty-pagination-2');
        } else {
            $pageSections = ContentLayouts::makeUnits($pageSections);
            $all_layouts = $pageSections->get();
            $pageSections = $pageSections->paginate(4, 4, 'bty-pagination-2');
        }

        return \Response::json(View::make('uploads::gears.page_sections._partials.page_section_variations', compact(['pageSections', 'all_layouts']))->render());
    }

    public function filterLayouts(Request $request)
    {
        $date_from = $request->date_from;
        $date_to = $request->date_to;
        $author = $request->author;
        $tag = $request->tag;

        $pageSections = ContentLayouts::all();
        if ($date_from || $date_to) {
            $pageSections = $pageSections->whereDate($date_from, $date_to);
        }
        if ($author) {
            $pageSections = $pageSections->where("author", "like", $author);
        }
        if ($tag) {
            $pageSections = $pageSections->whereTag($tag);
        }
        $all_layouts = $pageSections->get();
        $pageSections = $pageSections->paginate(4, 4, 'bty-pagination-2');

        $html = View::make('uploads::gears.page_sections._partials.page_section_variations', compact(['pageSections', 'all_layouts']))->render();

        return \Response::json(['html' => $html, 'error' => false]);
    }


    public function getVariations($slug)
    {
        $pageSection = ContentLayouts::find($slug);
        if (!$pageSection) abort(404);
        $variations = $pageSection->variations()->all();

        return view('uploads::gears.page_sections.variations', compact(['pageSection', 'variations']));
    }


    /**
     * @param $slug
     */
    public function getSettings($slug, Request $request)
    {
        $settings = $request->all();
        if ($slug) {
            $view = ContentLayouts::renderLivePreview($slug, $settings);

            return $view ? $view : abort('404');
        } else {
            abort('404');
        }

    }

    public function createVariationForlayout($slug)
    {
        $unit = ContentLayouts::find($slug);
        $variation = $unit->variations()->createVariation([]);

        return redirect()->route('uploads_layouts_settings', $variation->id);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postSettings(Request $request)
    {

        $output = ContentLayouts::savePageSectionSettings($request->slug, $request->itemname, $request->except(['_token', 'itemname']), $request->save);

        return response()->json([
            'url' => isset($output['id']) ? url('/admin/uploads/layouts/settings/' . $output['id']) : false,
            'html' => isset($output['data']) ? $output['data'] : false
        ]);
    }

    public function postPageSectionSettings(Request $request,$page_id,FrontPagesRepository $repository)
    {
       if($request->save){
           $slug = explode('.', $request->slug);
           $page=$repository->find($page_id);
           if(! $request->inherit){
               $page->page_layout=$slug[0];
               $page->page_layout_settings=json_encode($request->all(),true);
           }
           $page->page_layout_inheritance = $request->inherit;

           $page->save();
       }
        $output = ContentLayouts::savePageSectionSettings($request->slug, $request->itemname, $request->except(['_token', 'itemname']), null);
        return response()->json([
            'url' => ($request->save) ? url('/admin/front-site/structure/front-pages/settings/'.$page_id.'/layout') : false,
            'html' => isset($output['data']) ? $output['data'] : false
        ]);
    }

    public function getSettingsResponsive($slug, Request $request)
    {
        $output = ContentLayouts::savePageSectionSettings($slug, $request->itemname, $request->except(['_token', 'itemname']), false);
        $html = isset($output['data']) ? $output['data'] : false;

        return view('uploads::assets.responsive', compact('html'));
    }

    public function postOptions(Request $request)
    {
        $model = ContentLayouts::find($request->bb_slug);
        if ($model) {
            $settingsHtml = "ContentLayouts.$model->folder.settings";
            $settings = $request->except('key', 'type');
            $data = $request->only('key', 'type');
            $preview = \view($settingsHtml)->with([
                'model' => $model,
                'settings' => $settings,
                'data' => $data])->render();


            $html = \View('uploads::gears.page_sections._partials.right_box', compact(['model', 'preview', 'settings', 'data']))->with('variation', $request->get('bb_variation'))->render();

            return response()->json([
                'html' => $html,
                'error' => false
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }

    public function postPageOptions(Request $request)
    {
//        dd($request->all(),333);
        $model = ContentLayouts::find($request->bb_slug);
        $page_id=$request->bb_page;
        if ($model) {
            $settingsHtml = "ContentLayouts.$model->folder.settings";
            $settings = $request->except('key', 'type');
            $data = $request->only('key', 'type');
            $preview = \view($settingsHtml)->with([
                'model' => $model,
                'settings' => $settings,
                'data' => $data])->render();

            $variation = ($request->get('bb_variation')) ?? $model->slug . '.default';
            $html = \View('uploads::gears.page_sections._partials.right_box_page_section', compact(['model','page_id','preview', 'settings', 'data']))->with('variation', $variation)->render();
            return response()->json([
                'html' => $html,
                'error' => false
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }

    public function getConsole(Request $request)
    {
        return dd($request->except('_token'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postDeleteVariation(Request $request)
    {
        $result = false;
        if ($request->slug) {
            $result = ContentLayouts::deleteVariation($request->slug);
        }

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postDelete(Request $request)
    {
        $slug = $request->get('slug');
        $pageSection = ContentLayouts::find($slug);
        if ($pageSection) {
            $deleted = $pageSection->delete();

            return \Response::json(['success' => $deleted, 'url' => url('/admin/uploads/gears/page-sections')]);
        }
    }

    /**
     * @param Request $request
     * @return array|\Illuminate\Http\JsonResponse|string
     */
    public function postUpload(Request $request)
    {
        return $this->upload->run($request, 'frontend');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postMakeActive(Request $request)
    {
        $data = $request->all();
        $result = false;
        if ($data['type'] == 'page_section') {
            ContentLayouts::active()->makeInActive()->save();
            $page_section = ContentLayouts::find($data['slug']);
            if ($page_section) $result = $page_section->setAttributes("active", true)->save() ? false : true;
            if (!ContentLayouts::activeVariation($data['slug'])) {
                $main = $page_section->variations()[0];
                $result = $main->setAttributes("active", true)->save() ? false : true;
            }
        } else if ($data['type'] == 'page_section_variation') {
            ContentLayouts::activeVariation($data['slug'])->makeInActiveVariation()->save();
            $pageSectionVariation = ContentLayouts::findVariation($data['slug']);
            $pageSectionVariation->setAttributes('active', true);
            $result = $pageSectionVariation->save() ? false : true;
        }

        return \Response::json(['error' => $result]);

    }

    public function removeLayout()
    {
        ContentLayouts::removeLayoutJson();

        return redirect()->back()->with("success", "Layouts was optimized successfully");
    }
}



