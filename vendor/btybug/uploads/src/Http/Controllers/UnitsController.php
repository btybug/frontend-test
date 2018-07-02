<?php namespace Btybug\Uploads\Http\Controllers;

use App\Http\Controllers\Controller;
use Btybug\btybug\Models\Painter\Painter;
use Btybug\btybug\Models\Universal\Paginator;
use Btybug\btybug\Services\CmsItemUploader;
use Btybug\Resources\Models\Validation as validateUpl;
use BtyBugHook\Blog\Repository\PostsRepository;
use Illuminate\Http\Request;
use function PHPSTORM_META\type;
use Resources;
use View;


class UnitsController extends Controller
{

    private $helpers = null;

    private $up;

    private $tp;

    private $types;

    private $upload;

    public function __construct (validateUpl $validateUpl)
    {
        $this->upload = new CmsItemUploader('units');
        $this->validateUpl = new $validateUpl;
        $this->up = config('paths.ui_elements_uplaod');
        $this->tp = config('paths.units_path');
        //$this->unitTypes = $this->types = @json_decode(File::get(config('paths.unit_path') . 'configTypes.json'), 1)['types'];
    }

    public function getIndex (Request $request)
    {
        $units = Painter::all()->paginate(4, 4, 'bty-pagination-2');
        $all_unit = Painter::all()->get();

        return view("uploads::gears.units.index", compact(['units', 'test', 'all_unit']));
    }

    public function getIndexFromPost (Request $request)
    {
        $units = json_decode($request->arr, true);
        if (! count($units)) {
            $all_unit = Painter::all()->get();
            $units = Painter::all()->paginate(4, 4, 'bty-pagination-2');
        } else {
            $units = Painter::makeUnits($units);
            $all_unit = $units->get();
            $units = $units->paginate(4, 4, 'bty-pagination-2');
        }

        return \Response::json(View::make('uploads::gears.units._partials.unit_variations', compact(["units", "all_unit"]))->render());
    }

    public function getFrontend (Request $request)
    {
        $units = Painter::all()->paginate(4, 4, 'bty-pagination-2');
        $all_unit = Painter::all()->get();

        return view("uploads::gears.units.index", compact(['units', 'test', 'all_unit']));
    }

    public function getFrontendFromPost (Request $request)
    {
        $units = json_decode($request->arr, true);
        if (! count($units)) {
            $all_unit = Painter::all()->get();
            $units = Painter::all()->paginate(4, 4, 'bty-pagination-2');
        } else {
            $units = Painter::makeUnits($units);
            $all_unit = $units->get();
            $units = $units->paginate(4, 4, 'bty-pagination-2');
        }

        return \Response::json(View::make('uploads::gears.units._partials.unit_variations', compact(["units", "all_unit"]))->render());
    }

    public function filterUnits (Request $request)
    {
        $date_from = $request->date_from;
        $date_to = $request->date_to;

        $author = $request->author;
        $tag = $request->tag;

        $units = Painter::all();
        if ($date_from || $date_to) {
            $units = $units->whereDate($date_from, $date_to);
        }
        if ($author) {
            $units = $units->where("author", "like", $author);
        }
        if ($tag) {
            $units = $units->whereTag($tag);
        }
        $all_unit = $units->get();
        $units = $units->paginate(4, 4, 'bty-pagination-2');
        $html = View::make('uploads::gears.units._partials.unit_variations', compact(['units', 'all_unit']))->render();

        return \Response::json(['html' => $html, 'error' => false]);
    }

    public function getUnitVariations ($slug)
    {
        $variations = Painter::find($slug)->variations()->all();
        $unit = $variations->getModel();
        if (! count($variations)) return redirect()->back();

        return view('uploads::gears.units.variations', compact(['variations', 'unit']));
    }

    public function postUnitWithType (Request $request)
    {
        $main_type = $request->get('main_type');
        $general_type = $request->get('type', null);

        if ($general_type) {
            $ui_units = Painter::all()->where('main_type', $main_type)->where('type', $general_type)->get();
        } else {
            $ui_units = Painter::all()->where('type', $main_type)->get();
        }

        $html = View::make('resources::units._partials.list_cube', compact(['ui_units']))->render();

        return \Response::json(['html' => $html, 'error' => false]);
    }

    public function postUnitVariations (Request $request, $slug)
    {
        $ui = Painter::find($slug);
        if (! $ui) return redirect()->back();
        $ui->variations()->makeVariation($request->except('_token', 'ui_slug'))->save();

        return redirect()->back();
    }

    public function postUploadUnit (Request $request)
    {
        return $this->upload->run($request, 'frontend');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postDeleteVariation (Request $request)
    {
        $result = false;
        if ($request->slug) {
            $result = Painter::find($request->slug)->variations()->deleteVariation($request->slug);
        }

        return redirect()->back()->with("message", "Variation was deleted");
    }

    public function postDelete (Request $request)
    {
        $slug = $request->get('slug');
        $unit = Painter::find($slug);
        if ($unit) {
            $deleted = $unit->delete();

            return \Response::json(['success' => $deleted, 'url' => url('/admin/uploads/gears/units')]);
        }
    }

    public function createVariationForUnit ($slug)
    {
        $unit = Painter::find($slug);
        $variation = $unit->variations()->createVariation([]);

        return redirect()->route('uploads_settings', $variation->id);
    }

    public function getSettings ($slug)
    {
        if ($slug) {
            $view = Painter::renderLivePreview($slug, 'frontend');

            return $view ? $view : abort('404');
        } else {
            abort('404');
        }
    }

    public function unitPreview ($id)
    {
        $slug = explode('.', $id);
        $ui = Painter::find($slug[0]);
        $variation = $ui->variations()->findVariation($id);
        if (! $variation) return redirect()->back();

        $ifrem = [];
        $settings = (isset($variation->settings) && $variation->settings) ? $variation->settings : [];

        $ifrem['body'] = url('/admin/uploads/gears/settings-iframe', $id);
        $ifrem['settings'] = url('/admin/uploads/gears/settings-iframe', $id) . '/settings';

        return view('uploads::gears.preview', compact(['ui', 'id', 'ifrem', 'settings']));

    }

    public function unitPreviewIframe ($id, $type = null)
    {
        $slug = explode('.', $id);
        $ui = Painter::find($slug[0]);
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

    public function htmlPreviewIframe ($id, $type = null)
    {
        $slug = explode('.', $id);
        $ui = Painter::find($slug[0]);
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

        return view('uploads::gears.units._partials.html_preview', compact(['htmlBody', 'htmlSettings', 'settings', 'settings_json', 'id', 'ui']));
    }

    public function postSettings (Request $request)
    {
        $output = Painter::saveSettings($request->id, $request->itemname, $request->except(['_token', 'itemname']), $request->save);

        return response()->json([
            'error' => $output ? false : true,
            'url'   => $output ? url('/admin/uploads/gears/settings/' . $output['slug']) : false,
            'html'  => $output ? $output['html'] : false,
            'slug'  => $output['slug']
        ]);
    }

    public function postOptions(Request $request)
    {
        $model = Painter::find($request->bb_slug);
        if ($model) {
            $settings = $request->except('key','type');
            $data = $request->only('key', 'type');
            $htmlSettings = $model->renderSettings(compact('settings','data'));
            $preview = \View('uploads::gears.units._partials.right_box', compact(['htmlSettings', 'settings']))->with('id', $request->get('bb_variation'))->render();

            return response()->json([
                'html'  => $preview,
                'error' => false
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }

    public function getDefaultVariation ($id)
    {
        $data = explode('.', $id);
        $unit = Painter::find($data[0]);

        if (! empty($data) && $unit) {
            foreach ($unit->variations()->all() as $variation) {
                $variation->setAttributes('default', 0);
                $variation->save();
            }

            $variation = Painter::findVariation($id);
            $variation->setAttributes('default', 1);
            $variation->save();

            return redirect()->back()->with('message', 'New Default variation is ' . $variation->title);
        }

        return redirect()->back();
    }

    public function getMakeDefault ($slug)
    {
        $units = Painter::all()->where('type', '=', 'fields')->get();
        if (count($units)) {
            foreach ($units as $unit) {
                if ($unit->slug == $slug) {
                    $default = $unit->title;
                    $unit->setAttributes('default', 1);
                } else {
                    $unit->setAttributes('default', 0);
                }
                $unit->save();
            }

            return redirect()->back()->with('message', 'New Default Unit is ' . $default);
        }

        return redirect()->back();
    }

    public function removePainter ()
    {
        Painter::removePainterJson();

        return redirect()->back()->with("success", "Units was optimized successfully");
    }
}



