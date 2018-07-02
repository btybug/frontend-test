<?php

namespace Btybug\Console\Http\Controllers;

use App\Http\Controllers\Controller;
use Btybug\Console\Models\QueryBuilder;
use Illuminate\Http\Request;

class FunctionsController extends Controller
{

    public function getIndex()
    {
        $path = storage_path('app'.DS.'generated_functions.json');
        $functions = [];
        if(\File::exists($path)){
            $functions = json_decode(\File::get($path),true);
        }

        return view('console::functions.index',compact('functions'));
    }


    public function getCreate()
    {
        $model = null;
        return view('console::functions.create',compact('model'));
    }

    public function postCreate (Request $request)
    {
        $data = $request->except('_token');
        if($data['name'] == ''){
            return redirect()->back()->with('message','Function name required');
        }

        $path = storage_path('app'.DS.'generated_functions.json');
        $functions = [];
        if(\File::exists($path)){
            $functions = json_decode(\File::get($path),true);
        }
        $queryBuilder = new QueryBuilder();
        $data['query'] = $queryBuilder->make($data);
        $functions[str_slug($data['name'])] = $data;
        \File::put($path, json_encode($functions, true));

        return redirect()->route('fn_list')->with('message','Function created');
    }

    public function getEdit($key,Request $request)
    {
        $path = storage_path('app'.DS.'generated_functions.json');
        $functions = [];
        if(\File::exists($path)){
            $functions = json_decode(\File::get($path),true);
        }

        if(! isset($functions[$key])) return redirect()->route('fn_list');

        $model = $functions[$key];

        return view('console::functions.create',compact('model','key'));
    }

    public function postEdit($key,Request $request)
    {
        $data = $request->except('_token');
        $path = storage_path('app'.DS.'generated_functions.json');
        $functions = [];
        if(\File::exists($path)){
            $functions = json_decode(\File::get($path),true);
        }

        if(! isset($functions[$key])) return redirect()->route('fn_list');

        $queryBuilder = new QueryBuilder();
        $data['query'] = $queryBuilder->make($data);
        $functions[$key] = $data;
        \File::put($path, json_encode($functions, true));

        return redirect()->route('fn_list')->with('message','Function updated');
    }

    public function postOptions(Request $request)
    {
        $table = $request->get('table_name');
        $slug = $request->get('slug');
        $new_slug = $request->get('new_slug');

        $html = \View('console::functions._partials.options',compact('table','slug','new_slug'))->render();

        return \Response::json(['error' => false,'html' => $html]);
    }

    public function postInside(Request $request)
    {
        $table = $request->get('table_name');
        $slug = $request->get('slug');
        $new_slug = $request->get('new_slug');

        $html = \View('console::functions._partials.inside',compact('table','slug','new_slug'))->render();

        return \Response::json(['error' => false,'html' => $html]);
    }

    public function postSpecific (Request $request)
    {
        $model = null;
        $table = $request->get('table_name');
        $columns = BBGetTableColumn($table);
        $show_name = 'id';
        if(isset($columns['name'])){
            $show_name = 'name';
        }elseif (isset($columns['title'])){
            $show_name = 'title';
        }elseif (isset($columns['slug'])){
            $show_name = 'slug';
        }elseif (isset($columns['username'])){
            $show_name = 'username';
        }

        $data = \DB::table($table)->select($table.'.*',
            \DB::raw("CONCAT($table.id,'-',$table.$show_name) AS show_name")
        )->pluck('show_name','id');
        $data = array_filter( $data->toArray());

        if($request->get('key')){
            $path = storage_path('app'.DS.'generated_functions.json');
            $functions = [];
            if(\File::exists($path)){
                $functions = json_decode(\File::get($path),true);
                if(isset($functions[$request->get('key')])){
                    $model = $functions[$request->get('key')];
                }
            }
        }

        $html = \View('console::functions._partials.specific',compact('data','model'))->render();

        return \Response::json(['error' => false,'html' => $html]);
    }

    public function postFiltered (Request $request)
    {
        $model = null;
        $table = $request->get('table_name');
        $columns = BBGetTableColumn($table);
        $key = $request->get('key');

        $path = storage_path('app'.DS.'generated_functions.json');
        $functions = [];
        if(\File::exists($path)){
            $functions = json_decode(\File::get($path),true);
            if(isset($functions[$key])){
                $model = $functions[$key];
            }
        }

        $slug = uniqid();
        $new_slug = uniqid('inside');
        $html = \View('console::functions._partials.options',compact('table','data','model','slug','new_slug'))->render();

        return \Response::json(['error' => false,'html' => $html]);
    }

    public function delete(
        Request $request
    )
    {
        $path = storage_path('app'.DS.'generated_functions.json');
        $functions = [];
        if(\File::exists($path)){
            $functions = json_decode(\File::get($path),true);

            if(isset($functions[$request->get('slug')])){
                unset($functions[$request->get('slug')]);
                \File::put($path, json_encode($functions,true));
            }
        }

        return \Response::json(['success' => true, 'url' => url('/admin/console/functions')]);
    }

    public function postGetResult (
        Request $request
    )
    {
        $data = $request->except('_token');

        $queryBuilder = new QueryBuilder();
        try{
            $query = $queryBuilder->make($data);
        }catch (\Exception $exception){
            return \Response::json(['error' => true,'query' => 'Something wrong in query, try again ']);
        }

        $out = BBGetTableColumn($data['table']);
        $columns = array();
        foreach ($out as $column => $relativeValue) {
            // Add this column name
            $columns[] = array(
                "title"=>$column,
                "data"=>$column
            );
        }

        $result = \DB::select($query);

        return \Response::json(['error' => false,'query' => $query, 'columns' => $columns,'data' => $result]);
    }

    public function postOperator(Request $request)
    {
        $type = $request->get('type');
        $table = $request->get('table_name');
        $slug = $request->get('slug');
        $new_slug = $request->get('new_slug');
        $column = $request->get('column');

        $html = \View("console::functions._partials.operators.$type",compact('table','slug','new_slug','column'))->render();

        return \Response::json(['error' => false,'html' => $html]);
    }
}