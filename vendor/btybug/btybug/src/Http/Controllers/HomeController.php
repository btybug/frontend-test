<?php

namespace Btybug\btybug\Http\Controllers;

use Btybug\btybug\Models\Painter\Painter;
use Btybug\btybug\Models\Routes;
use Illuminate\Http\Request;
use Btybug\btybug\Models\ContentLayouts\ContentLayouts;
use Btybug\btybug\Models\Home;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{


    /**
     * @var Home
     */
    private $homemodel;

    /**
     * HomeController constructor.
     *
     * @param page $page
     */
    public function __construct(Home $homemodel)
    {
        $this->homemodel = $homemodel;
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function pages(Request $request)
    {
        $url = $request->path();
        $settings = $request->all();

        //TODO: settings if live preview pass as argument  settings = $request->all()
        return $this->homemodel->render($url, $settings);
    }

    public function blog_pages(Request $request)
    {
        $settings = [];
        $url = $request->route()->uri();

        return $this->homemodel->render($url, $settings);
    }

//    public function unitStyles($slug, $path)
    public function unitStyles($css)
    {
        $stylePaths = session()->get('custom.styles', []);
        $contentArray = [];
        $content = '';
        foreach ($stylePaths as $path) {
            if (\File::exists($path)) {
                $file = \File::get($path);
                $contentArray[md5($file)] = $file;
            }
        }
        foreach ($contentArray as $style) {
            $content .= "\r\n" . $style;
        }
        session()->forget('custom.styles');
        $response = \Response::make($content);
        $response->header('Content-Type', 'text/css');

        $response->header('Cache-Control', 'max-age=31104000');
        return $response;
    }

    public function unitScripts($js)
    {
        $scriptPaths = \Session::get('custom.scripts', []);
        $contentArray = [];
        $content = '';
//        $notFound="\r\n".'/*'."\r\n";
        foreach ($scriptPaths as $path) {
            if (\File::exists($path)) {
                $file = \File::get($path);
                $key = md5($file);
                $contentArray[$key] = $file;
                $content .= $contentArray[$key];
            } else {
                //$content=$path."\r\n";
                //  $notFound.=$path."\r\n";
            }
        }
//        $notFound.='*/';

        \Session::forget('custom.scripts');
        $response = \Response::make($content);
        $response->header('Content-Type', 'application/javascript', false);

        $response->header('Cache-Control', 'max-age=31536000');

        return $response;
    }

    public function unitImg($slug, $path)
    {

        $unit = ContentLayouts::find($slug);
        if (!$unit) $unit = Painter::find($slug);
        if (!\File::exists($unit->getPath() . DS . $path)) abort(500);
        $file = \File::get($unit->getPath() . DS . $path);
        $response = \Response::make($file);
        $response->header('Cache-Control', 'max-age=31104000');

        return $response;
    }

    public function pagesOptimize()
    {
//        $package = new Plugins();
//        $package->plugins();
//        $plugins = $package->getPlugins();
//        $package->modules();
//        $modules = $package->getPlugins();
//
//        $data = array_merge($modules,$plugins);
        $plugins = [
            'btybug/uploads',
            'btybug/console',
            'btybug/user',
            'btybug/frontsite',
            'btybug/framework',
            "btybug.plugins/studios",
            "btybug.hook/blog",
            "gevorg/usermanagment",
        ];

//        dd($plugins);
        foreach ($plugins as $slug) {
            $t = Routes::registerPages($slug);
            var_dump($t);
        }
    }

    public function mySites()
    {
        return view('btybug::mysites.index');
    }
    public function media()
    {
        return view('btybug::media.index');
    }
    public function drive()
    {
        return view('btybug::media.drive');
    }
    public function settings()
    {
        return view('btybug::media.settings');
    }

    public function create()
    {
        return view('btybug::create.index');
    }
}