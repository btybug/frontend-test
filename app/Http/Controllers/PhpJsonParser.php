<?php
/**
 * Created by PhpStorm.
 * User: hook
 * Date: 1/18/2018
 * Time: 5:55 AM
 */

namespace App\Http\Controllers;


use Btybug\Framework\Models\DynamicComponentCss;
use Btybug\Framework\Models\TableCss;

class PhpJsonParser
{
    public $data;
    public $desc;

    public static function getClasses($path)
    {
        $file = \File::get($path);

        // preg_match_all('/([a-z0-9]\.?.*?)\s?\{/', $file, $matches);
        preg_match_all('/(?<=\.)((?!:hover).)*(?=.{)/', $file, $matches);

        preg_match_all('/(?<=\/\*).+(?=\*\/)/', $file, $match);

        $array=[];

        if (count($matches[0])) {
            $array=  self::toArray($matches[0], $match[0]);
        }

        return $array;
    }

    public function makeCssClasses($path)
    {
        $file = \File::get($path);
        preg_match_all('/(?<=\.)((?!:hover).)*(?=.{)/', $file, $matches);
        preg_match_all('/(?<=\/\*).+(?=\*\/)/', $file, $match);
        $this->data = $matches[0];
        $this->desc = $match[0];

        return $this;
    }

    public static function toArray($data, $desc = [])
    {
        $array = [];
        foreach ($data as $key => $item) {
            if (isset($desc[$key])) {
                $array[$item]= $desc[$key];
            } else {
                $array[$item] = $item;
            }
        }
        return $array;
    }

    public function collect()
    {
        $array = [];
        foreach ($this->data as $key => $item) {
            $array[$item] = isset($desc[$key]) ? $this->desc[$key] : $item;
        }
        return collect($array);
    }

    public static function getClassesForDemo($path)
    {
        $file = \File::get($path);

        // preg_match_all('/([a-z0-9]\.?.*?)\s?\{/', $file, $matches);
        preg_match_all('/(?<=\.)((?!:hover).)*(?=.{)/', $file, $matches);

        preg_match_all('/(?<!:hover \{)(?<=\{)(.*?)(?=\})/s', $file, $match);

        $html = '';

        if (count($matches[0])) {
            $html = self::renderHtmlForDemo($matches[0], $match[0]);
        }

        return $html;
    }

    public static function getClassesCssFileDemo($filename, $table_name)
    {
        switch ($table_name) {
            case "table_css":
                $file = TableCss::where("slug", $filename)->with("styles")->first();
                break;
            case "dynamic_component_css":
                $file = DynamicComponentCss::where("slug", $filename)->with("styles")->first();
                break;
            default:
                $file = null;
        }

        return $file;
    }

    public static function renderHtmlForDemo($data, $codes)
    {
        $str = '';
        foreach ($data as $key => $item) {
            $str .= "<div class='col-md-12'><div class='col-md-4'><img src='" . asset("public/images/default.jpg") . "' class='" . $item . " custom_div_width'></div><div class='col-md-8'><h5>" . $item . "</h5><textarea class='code_textarea form-control' readonly>" . $item . "{" . $codes[$key] . "}</textarea></div></div>";
        }
        return $str;
    }

    public static function checkAndCreate($path)
    {
        if (\File::exists($path)) {
            return true;
        }
        return \File::makeDirectory($path);
    }

    public static function getFoldersWithChildrens($path)
    {
        self::checkAndCreate($path);
        $dirs = \File::directories($path);
        $arr = [];
        if (count($dirs)) {
            foreach ($dirs as $key => $dir) {
                $name = explode(DS, $dir);
                $name = $name[count($name) - 1];
                $arr[$key]["dirname"] = $name;
                $arr[$key]["children"] = \File::allFiles($dir);
                $arr[$key]["children_dirs"] = PhpJsonParser::getFoldersWithChildrens($path . DS . $name);
            }
        }
        return $arr;
    }

    public static function getFileByName($filename, $path)
    {
        $dirs = \File::directories($path);
        if (count($dirs)) {
            foreach ($dirs as $key => $dir) {
                $all = \File::allFiles($dir);
                foreach ($all as $file) {
                    $basename = $file->getBasename();
                    if ($basename === $filename . ".css") {
                        return $file;
                    }
                }
            }
            return null;
        }
    }

    public static function renameFolder($old_name, $new_name, $path)
    {
        $dirs = \File::directories($path);
        if (count($dirs)) {
            foreach ($dirs as $key => $dir) {
                $original = \File::name($dir);
                if ($original === $old_name) {
                    $should_be_renamed = $path . DS . $new_name;
                    return \File::move($dir, $should_be_renamed);
                }
            }
        }
    }

    public static function renderName($original_name)
    {
        foreach ($original_name as $ind => $to_up) {
            $name[$ind] = ucfirst($to_up);
        }
        $name = implode(' ', $name);
        return $name;
    }

    public static function generateSlug($name)
    {
        $name = explode(" ", $name);
        foreach ($name as $ind => $to_lo) {
            $name[$ind] = lcfirst($to_lo);
        }
        $name = implode('_', $name);
        return $name;
    }

    public static function generateCssFile($path, $type, $data)
    {
        $file = self::getFileByName($type, $path);
        //$data =  TableCss::where("slug",$type)->with("styles")->first();
        $styles = $data->styles;
        $str = "";
        if (count($styles)) {
            foreach ($styles as $style) {
                $str .= $style->styles;
            }
        }
        if ($file) {
            return \File::put($file->getPathname(), $str);
        }
        return null;
    }

}