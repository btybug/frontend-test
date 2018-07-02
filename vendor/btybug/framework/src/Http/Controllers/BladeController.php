<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 19.03.2018
 * Time: 13:57
 */

namespace Btybug\Framework\Http\Controllers;


use Btybug\btybug\Http\Controller;
use Illuminate\Http\Request;

class BladeController extends Controller
{
    public function getIndex()
    {
        $qaq=0;
        BBGetUser(5,'name');
        return view('framework::blades.index');
    }

    public function getLiveRender(Request $request)
    {

//        $code = $request->get('code');
//        $settings = $request->except('code', '_token');
//        foreach ($settings as $key => $setting) {
//            $code = str_replace("[$key]", $setting, $code);
//        }
        $code=$request->get('html');
        \File::put(module_path('framework' . DS . 'src' . DS . 'Resources' . DS . 'Views' . DS . 'blades' . DS . 'autogen.blade.php'), $code);
        try{
            $html = \View::make('framework::blades.autogen')->render();
        }catch (\Exception $e){
            return \Response::json(['error'=>false,'html'=>$e->getMessage()]);
        }

        return \Response::json(['error'=>false,'html'=>$html]);
    }
}