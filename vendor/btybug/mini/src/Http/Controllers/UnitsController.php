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
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;
use Storage;
use ZipArchive;
use File;

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
        $file = $request->file;
        $foo = $file->getClientOriginalExtension();
        if ($foo === 'zip'){
                $filenamenoext = 'unit'.uniqid();
                $filenamewithext = $filenamenoext.'.'.$foo;
                $newfolder = $filenamenoext;
                $storagePath = storage_path('zip').DS.$newfolder;
                File::makeDirectory($storagePath, 0777, true, true);
                $newFile = $file->move($storagePath,$filenamewithext);
                 $zip = new ZipArchive();
                 $zip->open($newFile);
                 $zip->extractTo($storagePath);
                 $zip->close();
                    $json = File::get($storagePath.DS.'config.json');
                    $json = json_decode($json);
                    $slug = $json->slug;
                    $exist_folder = scandir(public_path('../vendor/btybug/mini/src/Resources/Units'));
                    if (in_array($slug,$exist_folder))
                    {
                        $slug = $slug.'.'.uniqid();
                        $json->slug = $slug;
                        $json->folder = $slug;
                        $path = explode('/',$json->path);
                        $k = count($path)-1;
                        $path[$k] = $slug;
                        $path = implode('/',$path);
                        $json->path = $path;
                        $json->title = $slug;

                    }

                        $publicPath = public_path('../vendor/btybug/mini/src/Resources/Units').DS.$slug;
                        $json = json_encode($json);
                        File::put($storagePath.DS.'config.json',$json);
                        File::makeDirectory($publicPath);
                        File::copyDirectory($storagePath,$publicPath);
                        File::deleteDirectory($storagePath);
                        File::delete($publicPath.DS.$filenamewithext);
                        File::delete(storage_path('app').DS.'minipainter.json');

                return back()->with('message','Unit uploaded successfully');
        }else{
                return back()->with('message','Please upload .ZIP archived file');
        }


    }

}