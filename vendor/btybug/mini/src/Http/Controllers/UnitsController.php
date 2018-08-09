<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 05.07.2018
 * Time: 21:28
 */

namespace Btybug\Mini\Http\Controllers;


use App\Http\Controllers\Controller;
use Btybug\Mini\Model\MiniSuperPainter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;
use Storage;
use ZanySoft\Zip\Zip;

class UnitsController extends Controller
{
    protected $miniSuperPainter;
    public function __construct(MiniSuperPainter $miniSuperPainter)
    {
        $this->miniSuperPainter=$miniSuperPainter;
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

        return view('multisite::admin.assets.units._partials.unit_preview', compact(['htmlBody', 'htmlSettings', 'settings', 'settings_json', 'id', 'ui']));
    }
    public function postSettings (Request $request)
    {
        $output = MiniSuperPainter::saveSettings($request->id, $request->itemname, $request->except(['_token', 'itemname']), $request->save);

        return response()->json([
            'error' => $output ? false : true,
            'url'   => $output ? url('/admin/mini/assets/units/live/' . $output['slug']) : false,
            'html'  => $output ? $output['html'] : false,
            'slug'  => $output['slug']
        ]);
    }

    public function assetsCreateUnitVariation ($slug)
    {
        $layout = $this->miniSuperPainter->find($slug);
        if (! $layout) abort(404);
        $variation = $layout->makeVariation();
        return redirect()->route('mini_admin_assets_units_live', $variation->id);
    }
    public function UnitsVariationDelete($id = null)
    {
        dd($id);
    }
    public function UnitsVariationEdit($slug = null)
    {
        dd($slug);
        /*$variationname = substr($slug, strpos($slug, ".") + 1);
        $layout = $this->miniSuperPainter->find($slug);
        $variation = $this->miniSuperPainter->find($slug);
        $units = $this->painter->where('self_type', 'units')->get();*/
    }
    public function assetsUnitsAdd()
    {
        $units = $this->miniSuperPainter->where('self_type', 'units')->get();
        return view('multisite::admin.assets.units.uploadunit',compact('units'));
    }

    public function assetsUnitsAddupload(Request $request){
        //$name = $request->zip;
        $file = Input::file('zip');
        $foo = \File::extension($file);
        if ($foo === 'zip'){
            if ($file->isValid()) {
                $filename = 'unit'.$foo;
                Storage::disk('zip')->put($filename, $file);
                dd($filename);
            }

        }else{
            return back()->with('message','Please upload .ZIP archived file');
        }


    }
}