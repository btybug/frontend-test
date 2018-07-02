<?php
/**
 * Copyright (c) 2017. All rights Reserved BtyBug TEAM
 */

namespace Btybug\Framework\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PhpJsonParser;
use Btybug\Framework\Models\TableCss;
use Btybug\Framework\Models\TableStyles;
use Illuminate\Http\Request;
use Btybug\Framework\Repository\VersionsRepository;
use Btybug\Framework\Services\SettingsService;
use Btybug\btybug\Repositories\AdminsettingRepository;

/**
 * Class SystemController
 * @package App\Modules\Settings\Http\Controllers
 */
class CssController extends Controller
{
    public function getIndex(Request $request, $type = "buttons")
    {
        $path = base_path('public'.DS.'dinamiccss');
        $directories = PhpJsonParser::getFoldersWithChildrens($path);
        $slug = $request->get('type',$type);
        return view('framework::css.list', compact(['slug','directories']));
    }
    public function saveStyle(Request $request){
        $path = base_path('public'.DS.'dinamiccss');
        $type = $request->type;
        $full_style = $request->full_style;
        $general_name = explode(".",explode("<",explode(" ",explode("{",$full_style)[0])[0])[0])[1];
        $table_css = TableCss::getByName($type);
        if(!$table_css){
            abort(404);
        }
        $new_style = new TableStyles();
        $new_style->table_css_id = $table_css->id;
        $new_style->classname = $general_name;
        $new_style->styles = $full_style;
        if($new_style->save()){
            $generated = PhpJsonParser::generateCssFile($path,$type,$table_css);
        }
        return redirect()->back()->with("success","Style was saved successfully");
    }
    public function EditStyle(Request $request){
        $path = base_path('public'.DS.'dinamiccss');
        $type = $request->type;
        $changed_style = $request->changed_style;
        $table_css = TableCss::getByName($type);
        $id = $request->style_id;

        $table_styles = TableStyles::where("id",$id)->update([
            "styles" => json_encode($changed_style)
        ]);

        if($table_styles){
            PhpJsonParser::generateCssFile($path,$type,$table_css);
            return redirect()->back()->with("success","Style was saved successfully");
        }
        return redirect()->back()->with("error","Something went wrong");
    }
    public function saveStyleWithHtml(Request $request){
        $path = base_path('public'.DS.'dinamiccss');
        $slug = $request->type;
        $html = $request->file_html;
        $filename = PhpJsonParser::generateSlug($request->filename);
        $data = TableCss::where("slug",$slug)->first();
        if(!$data){
            abort(404);
        }
        $data->slug = $filename;
        $data->html = $html;
        if($data->save()){
            $file = PhpJsonParser::getFileByName($slug,$path);
            $to = str_replace($file->getFilename(),$filename.".".$file->getExtension(),$file->getPathname());
            \File::move($file->getPathname(),$to);
            return redirect()->to(route("get_content")."?type=".$filename);
        }
    }
    public function createFolder(){
        $path = base_path('public'.DS.'dinamiccss');
        $new_folder_name = "new_".str_random(4).rand(111,999);
        $full_path = $path.DS.$new_folder_name;
        mkdir($full_path,0777);
        return response()->json(["dirname" => $new_folder_name]);
    }
    public function createFile($dirname){
        $path = base_path('public'.DS.'dinamiccss'.DS.$dirname);
        $file_name = "new_".str_random(4).rand(111,999);
        $full_path = $path.DS.$file_name.".css";
        if (!\File::exists($full_path)){
            \File::put($full_path,'');
            $insert = new TableCss();
            $insert->slug = $file_name;
            $insert->save();
        }else{
            return response()->json(["error" => 1]);
        }
        return response()->json(["error" => 0,"filename" => $file_name]);
    }
    public function getContent(Request $request, $type = "icons"){
        $path = base_path('public'.DS.'dinamiccss');
        $directories = PhpJsonParser::getFoldersWithChildrens($path);
        $slug = $request->get('type',$type);
        $style_from_db = TableCss::where("slug",$slug)->first();
        return view('framework::css.list_for_css_files', compact(['slug','directories','style_from_db']));
    }
    public function removeDir(Request $request){
        $dirname = $request->dirname;
        $path = base_path('public'.DS.'dinamiccss'.DS.$dirname);
        $removed = \File::deleteDirectory($path);
        if($removed){
            return response()->json(["error" => 0]);
        }
        return response()->json(["error" => 1]);
    }
    public function removeFile(Request $request){
        $path = base_path('public'.DS.'dinamiccss');
        $filename = $request->filename;
        $file = PhpJsonParser::getFileByName($filename,$path);
        if($file){
            \File::delete($file->getPathname());
            TableCss::where("slug",$filename)->delete();
            return response()->json(["error" => 0]);
        }
        return response()->json(["error" => 1]);
    }
    public function resetFile(Request $request){
        $path = base_path('public'.DS.'dinamiccss');
        $slug = $request->slug;
        $table_css = TableCss::getByName($slug);
        if(!$table_css){
            abort(404);
        }
        TableStyles::where("table_css_id",$table_css->id)->delete();
        TableCss::where("slug",$slug)->update([
            "html" => null
        ]);
        PhpJsonParser::generateCssFile($path,$slug,$table_css);
        return response()->json(["error" => 0]);
    }
    public function removeClass(Request $request){
        $path = base_path('public'.DS.'dinamiccss');
        $slug = $request->slug;
        $table_css = TableCss::getByName($slug);
        $id = $request->id;

        $deleted = TableStyles::where("id",$id)->delete();
        if($deleted){
            PhpJsonParser::generateCssFile($path,$slug,$table_css);
            return response()->json(["error"=>0]);
        }
        return response()->json(["error"=>1]);
    }
    public function renameGroup(Request $request){
        $path = base_path('public'.DS.'dinamiccss');
        $old_name = $request->old_name;
        $new_name = $request->new_name;
        $dir = PhpJsonParser::renameFolder($old_name,$new_name,$path);
        if ($dir){
            return response()->json(["error"=>0,"data" => ["old_name"=>$old_name,"new_name" => $new_name]]);
        }
        return response()->json(["error"=>1]);
    }





    public function getComponent(Request $request, $type = "icons"){
        $path = base_path('public'.DS.'components');
        $directories = PhpJsonParser::getFoldersWithChildrens($path);
        $slug = $request->get('type',$type);
        $style_from_db = TableCss::where("slug",$slug)->first();
        return view('framework::css.list_for_component_files', compact(['slug','directories','style_from_db']));
    }
    public function saveStyleComponent(Request $request){
        $path = base_path('public'.DS.'components');
        $type = $request->type;
        $full_style = $request->full_style;
        $general_name = explode(".",explode("<",explode(" ",explode("{",$full_style)[0])[0])[0])[1];
        $table_css = TableCss::getByName($type);
        if(!$table_css){
            abort(404);
        }
        $new_style = new TableStyles();
        $new_style->table_css_id = $table_css->id;
        $new_style->classname = $general_name;
        $new_style->styles = $full_style;
        if($new_style->save()){
            $generated = PhpJsonParser::generateCssFile($path,$type,$table_css);
        }
        return redirect()->back()->with("success","Style was saved successfully");
    }
    public function saveStyleWithHtmlComponent(Request $request){
        $path = base_path('public'.DS.'components');
        $slug = $request->type;
        $html = $request->file_html;
        $filename = PhpJsonParser::generateSlug($request->filename);
        $data = TableCss::where("slug",$slug)->first();
        if(!$data){
            abort(404);
        }
        $data->slug = $filename;
        $data->html = $html;
        if($data->save()){
            $file = PhpJsonParser::getFileByName($slug,$path);
            $to = str_replace($file->getFilename(),$filename.".".$file->getExtension(),$file->getPathname());
            \File::move($file->getPathname(),$to);
            return redirect()->to(route("get_content_component")."?type=".$filename);
        }
    }
    public function createFolderComponent(){
        $path = base_path('public'.DS.'components');
        $new_folder_name = "new_".str_random(4).rand(111,999);
        $full_path = $path.DS.$new_folder_name;
        mkdir($full_path,0777);
        return response()->json(["dirname" => $new_folder_name]);
    }
    public function createFileComponent($dirname){
        $path = base_path('public'.DS.'components'.DS.$dirname);
        $file_name = "new_".str_random(4).rand(111,999);
        $full_path = $path.DS.$file_name.".css";
        if (!\File::exists($full_path)){
            \File::put($full_path,'');
            $insert = new TableCss();
            $insert->slug = $file_name;
            $insert->save();
        }else{
            return response()->json(["error" => 1]);
        }
        return response()->json(["error" => 0,"filename" => $file_name]);
    }
    public function removeDirComponent(Request $request){
        $dirname = $request->dirname;
        $path = base_path('public'.DS.'components'.DS.$dirname);
        $removed = \File::deleteDirectory($path);
        if($removed){
            return response()->json(["error" => 0]);
        }
        return response()->json(["error" => 1]);
    }
    public function removeFileComponent(Request $request){
        $path = base_path('public'.DS.'components');
        $filename = $request->filename;
        $file = PhpJsonParser::getFileByName($filename,$path);
        if($file){
            \File::delete($file->getPathname());
            TableCss::where("slug",$filename)->delete();
            return response()->json(["error" => 0]);
        }
        return response()->json(["error" => 1]);
    }
    public function resetFileComponent(Request $request){
        $path = base_path('public'.DS.'components');
        $slug = $request->slug;
        $table_css = TableCss::getByName($slug);
        if(!$table_css){
            abort(404);
        }
        TableStyles::where("table_css_id",$table_css->id)->delete();
        TableCss::where("slug",$slug)->update([
            "html" => null
        ]);
        PhpJsonParser::generateCssFile($path,$slug,$table_css);
        return response()->json(["error" => 0]);
    }
    public function removeClassComponent(Request $request){
        $path = base_path('public'.DS.'components');
        $slug = $request->slug;
        $table_css = TableCss::getByName($slug);
        $id = $request->id;

        $deleted = TableStyles::where("id",$id)->delete();
        if($deleted){
            PhpJsonParser::generateCssFile($path,$slug,$table_css);
            return response()->json(["error"=>0]);
        }
        return response()->json(["error"=>1]);
    }
    public function EditStyleComponent(Request $request){
        $path = base_path('public'.DS.'components');
        $type = $request->type;
        $changed_style = $request->changed_style;
        $table_css = TableCss::getByName($type);
        $id = $request->style_id;

        $table_styles = TableStyles::where("id",$id)->update([
            "styles" => json_encode($changed_style)
        ]);

        if($table_styles){
            PhpJsonParser::generateCssFile($path,$type,$table_css);
            return redirect()->back()->with("success","Style was saved successfully");
        }
        return redirect()->back()->with("error","Something went wrong");
    }
    public function renameGroupComponent(Request $request){
        $path = base_path('public'.DS.'components');
        $old_name = $request->old_name;
        $new_name = $request->new_name;
        $dir = PhpJsonParser::renameFolder($old_name,$new_name,$path);
        if ($dir){
            return response()->json(["error"=>0,"data" => ["old_name"=>$old_name,"new_name" => $new_name]]);
        }
        return response()->json(["error"=>1]);
    }

}
