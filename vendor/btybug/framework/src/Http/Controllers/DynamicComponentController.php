<?php
/**
 * Copyright (c) 2017. All rights Reserved BtyBug TEAM
 */

namespace Btybug\Framework\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PhpJsonParser;
use Btybug\Framework\Models\DynamicComponentCss;
use Btybug\Framework\Models\DynamicComponentStyles;
use Btybug\Framework\Models\TableCss;
use Btybug\Framework\Models\TableStyles;
use Btybug\Framework\Repository\DynamicComponentRepository;
use Illuminate\Http\Request;
use Btybug\Framework\Repository\VersionsRepository;
use Btybug\Framework\Services\SettingsService;
use Btybug\btybug\Repositories\AdminsettingRepository;

/**
 * Class SystemController
 * @package App\Modules\Settings\Http\Controllers
 */
class DynamicComponentController extends Controller
{
    public function getComponent(Request $request, $type = "icons", DynamicComponentRepository $repository){
        $path = base_path('public'.DS.'dynamic_components');
        $directories = PhpJsonParser::getFoldersWithChildrens($path);
        $slug = $request->get('type',$type);

        $style_from_db = $repository->where("slug","=",$slug)->first();

        return view('framework::css.list_for_dynamic_component_files', compact(['slug','directories','style_from_db']));
    }
    public function saveStyleComponent(Request $request, DynamicComponentRepository $repository){
        $path = base_path('public'.DS.'dynamic_components');
        $type = $request->type;
        $full_style = $request->full_style;
        $general_name = explode(".",explode("<",explode(" ",explode("{",$full_style)[0])[0])[0])[1];
        $table_css = $repository->getByName($type);
        if(!$table_css){
            abort(404);
        }
        $new_style = new DynamicComponentStyles();
        $new_style->table_dynamic_component_id = $table_css->id;
        $new_style->classname = $general_name;
        $new_style->styles = $full_style;
        if($new_style->save()){
            $generated = PhpJsonParser::generateCssFile($path,$type,$table_css);
        }
        return redirect()->back()->with("success","Style was saved successfully");
    }
    public function saveStyleWithHtmlComponent(Request $request, DynamicComponentRepository $repository){
        $path = base_path('public'.DS.'dynamic_components');
        $slug = $request->type;
        $html = $request->file_html;
        $filename = PhpJsonParser::generateSlug($request->filename);
        $data = $repository->where("slug", "=", $slug)->first();
        if(!$data){
            abort(404);
        }
        $data->slug = $filename;
        $data->html = $html;
        if($data->save()){
            $file = PhpJsonParser::getFileByName($slug,$path);
            $to = str_replace($file->getFilename(),$filename.".".$file->getExtension(),$file->getPathname());
            \File::move($file->getPathname(),$to);
            return redirect()->to(route("get_content_component_dynamic")."?type=".$filename);
        }
    }
    public function createFolderComponent(){
        $path = base_path('public'.DS.'dynamic_components');
        $new_folder_name = "new_".str_random(4).rand(111,999);
        $full_path = $path.DS.$new_folder_name;
        mkdir($full_path,0777);
        return response()->json(["dirname" => $new_folder_name]);
    }
    public function createFileComponent($dirname){
        $path = base_path('public'.DS.'dynamic_components'.DS.$dirname);
        $file_name = "new_".str_random(4).rand(111,999);
        $full_path = $path.DS.$file_name.".css";
        if (!\File::exists($full_path)){
            \File::put($full_path,'');
            $insert = new DynamicComponentCss();
            $insert->slug = $file_name;
            $insert->save();
        }else{
            return response()->json(["error" => 1]);
        }
        return response()->json(["error" => 0,"filename" => $file_name]);
    }
    public function removeDirComponent(Request $request){
        $dirname = $request->dirname;
        $path = base_path('public'.DS.'dynamic_components'.DS.$dirname);
        $removed = \File::deleteDirectory($path);
        if($removed){
            return response()->json(["error" => 0]);
        }
        return response()->json(["error" => 1]);
    }
    public function removeFileComponent(Request $request, DynamicComponentRepository $repository){
        $path = base_path('public'.DS.'dynamic_components');
        $filename = $request->filename;
        $file = PhpJsonParser::getFileByName($filename,$path);
        if($file){
            \File::delete($file->getPathname());
            $repository->where("slug", "=", $filename)->delete();
            return response()->json(["error" => 0]);
        }
        return response()->json(["error" => 1]);
    }
    public function resetFileComponent(Request $request, DynamicComponentRepository $repository){
        $path = base_path('public'.DS.'dynamic_components');
        $slug = $request->slug;
        $table_css = $repository->getByName($slug);
        if(!$table_css){
            abort(404);
        }
        DynamicComponentStyles::where("table_dynamic_component_id",$table_css->id)->delete();
        $repository->where("slug", "=", $slug)->update([
            "html" => null
        ]);
        PhpJsonParser::generateCssFile($path,$slug,$table_css);
        return response()->json(["error" => 0]);
    }
    public function removeClassComponent(Request $request, DynamicComponentRepository $repository){
        $path = base_path('public'.DS.'dynamic_components');
        $slug = $request->slug;
        $id = $request->id;
        $table_css = $repository->getByName($slug);
        $deleted = DynamicComponentStyles::where("id",$id)->delete();
        if($deleted){
            PhpJsonParser::generateCssFile($path,$slug,$table_css);
            return response()->json(["error"=>0]);
        }
        return response()->json(["error"=>1]);
    }
    public function EditStyleComponent(Request $request,DynamicComponentRepository $repository){
        $path = base_path('public'.DS.'dynamic_components');
        $type = $request->type;
        $changed_style = $request->changed_style;
        $id = $request->style_id;
        $table_css = $repository->getByName($type);
        $table_styles = DynamicComponentStyles::where("id",$id)->update([
            "styles" => json_encode($changed_style)
        ]);

        if($table_styles){
            PhpJsonParser::generateCssFile($path,$type,$table_css);
            return redirect()->back()->with("success","Style was saved successfully");
        }
        return redirect()->back()->with("error","Something went wrong");
    }
    public function renameGroupComponent(Request $request){
        $path = base_path('public'.DS.'dynamic_components');
        $old_name = $request->old_name;
        $new_name = $request->new_name;
        $dir = PhpJsonParser::renameFolder($old_name,$new_name,$path);
        if ($dir){
            return response()->json(["error"=>0,"data" => ["old_name"=>$old_name,"new_name" => $new_name]]);
        }
        return response()->json(["error"=>1]);
    }
}
