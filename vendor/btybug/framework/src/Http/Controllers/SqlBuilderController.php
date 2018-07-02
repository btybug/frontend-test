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

class SqlBuilderController extends Controller
{
    public function getIndex()
    {
        return view('framework::sql_builder.index');
    }

    public function getReact()
    {
        return view('framework::react.index');
    }

    public function getStudio()
    {
        return view('framework::studio.index');
    }

    public function renderSql(Request $request)
    {
        try{
            $result = \DB::select($request->get('query'));
        }catch (\Exception $exception){
            return response()->json([
                'error' => true,
                'message' =>  $exception->getMessage()
            ],500);
        }

        return response()->json([
            'error' => false,
            'data' =>  $result
        ],200);
    }


}