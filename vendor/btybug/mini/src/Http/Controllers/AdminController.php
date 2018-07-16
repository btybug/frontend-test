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
use Btybug\Uploads\Models\Units;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function getIndex()
    {
        return view('multisite::admin.index');
    }

    public function getSettings()
    {
        return view('multisite::admin.settings');
    }

    public function assetsUnits()
    {
       $units= Painter::whereTag('minicms')->get();
        return view('multisite::admin.assets.units')->with('units',$units);


    }
    public function assetsForms()
    {
        return view('multisite::admin.assets.forms');

    }
    public function assetsPages(MinicmsPagesRepository $pagesRepository)
    {
        $pages=$pagesRepository->getAll();
        return view('multisite::admin.assets.pages',compact('pages'));

    }
    public function assetsPlugins()
    {
        return view('multisite::admin.assets.plugins');

    }

    public function iframeRander($slug){
        return BBRenderUnits($slug);
    }

    public function createPage(Request $request,MinicmsPagesRepository $pagesRepository)
    {
        $data=$request->except('_token');
       return $pagesRepository->create($data);
    }


}