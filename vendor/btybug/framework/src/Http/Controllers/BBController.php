<?php

namespace Btybug\Framework\Http\Controllers;


use Btybug\btybug\Http\Controller;
use Illuminate\Http\Request;

class BBController extends Controller
{
    public function getIndex()
    {
        return view('framework::bb_functions.index');
    }

    public function getFunctionsList(Request $request)
    {
        $functions = BBallFunctions();
        $list = [];
        if(count($functions)){
            foreach ($functions as $key => $value){
                $list[] = [
                	"key" => $key,
	                "value" => $value['fn']
                ];
            }
        }

        return \Response::json($list);
    }

    public function getOptions(Request $request)
    {
        $data = BBallFunctions();
        if(isset($data[$request->slug])){
            $function = $data[$request->slug];
            $option_view = \View($function['view'])->render();
            return \Response::json(['error' => false,'data'=> $function,'html' => $option_view]);
        }

        return \Response::json(['error' => true,'message' => 'BB function not found']);
    }

}