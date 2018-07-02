<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 12.12.2017
 * Time: 15:35
 */

namespace Btybug\btybug\Models\Painter;

use Btybug\btybug\Models\Universal\Paginator;
use Btybug\btybug\Models\Universal\VariationAccess;
use Btybug\btybug\Models\Universal\Variations;
use Illuminate\Support\Collection;
use Mockery\Exception;
use phpDocumentor\Reflection\File;
use View;

abstract class BasePainter implements PainterInterface, VariationAccess
{


    /**
     * @var
     */
    protected $config_path;
    /**
     * @var
     */
    protected $base_path;
    /**
     * @var array
     */
    protected $attributes = [];
    /**
     * @var array
     */
    protected $original = [];
    /**
     * @var null
     */
    protected $storage = null;

    /**
     * @var string
     */
    public $name_of_json = 'config.json';

    /**
     * BasePainter constructor.
     */
    public function __construct()
    {
        $this->config_path = $this->getConfigPath();
        $this->base_path = $this->getStoragePath();
        $this->makeConfigJson();
    }

    /**
     * @return mixed
     */
    abstract function getConfigPath();

    /**
     * @param $id
     * @return mixed
     */
    abstract function scopeFindByVariation($id);

    /**
     * @return mixed
     */
    abstract function getStoragePath();

    /**
     * @param string $slug
     * @return mixed
     */
    abstract function scopeRenderLivePreview(string $slug);

    /**
     * @return mixed
     */
    abstract function scopeRenderSettings();

    /**
     * @param array $variables
     * @return mixed
     */
    abstract function scopeRenderLive(array $variables = []);

    /**
     * @return array|bool
     */
    public function toArray()
    {
        if (isset($this->attributes)) return $this->attributes;
        return false;
    }

    /**
     * @return $this|mixed
     * @throws \Error
     */
    public function scopeAll()
    {
        $all = [];
        // $path = $this->base_path; // TODO: this is right way
        $paths = $this->base_path; // TODO: this should be removed
        if (count($paths)) {
            foreach ($paths as $path) {
                $units = \File::directories(base_path($path));

                if (!count($units)) $this->throwError("There is no unit found");
                foreach ($units as $key => $unit) {
                    $full_path = $unit . DS . $this->name_of_json;
                    $obj = new static();
                    $is_true = $obj->validateWithReturn($full_path);
                    $test[$full_path] = $is_true;
                    if ($is_true) {
                        $all[] = $obj->makeItem($full_path);
                    }
                }
            }
        }
        $this->storage = $all;
        return $this;
    }

    /**
     * @param bool $hidden
     * @return Variations
     */
    public function scopeVariations(bool $hidden = true)
    {

        return new Variations($this, $hidden);
    }

    /**
     * @param string $slug
     * @return BasePainter|mixed|null
     */
    public function scopeFind(string $slug)
    {
        $path = $this->getItemConfigJsonPath($slug);
        return $this->makeItem($path);
    }

    /**
     * @param $path
     * @return $this|null
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function makeItem($path)
    {
        $is_valis = $this->validate($path);
        if ($is_valis) {
            $config = json_decode(\File::get($path), true);
            $this->attributes = $config;
            $this->original = $config;
            return $this;
        }
        return null;
    }

    /**
     * @param $data
     * @return $this|null
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function scopeMakeUnits($data)
    {
        if (count($data)) {
            $all = [];
            foreach ($data as $key => $unit) {
                $full_path = $this->getPath() . DS . $unit['path'] . DS . $this->name_of_json;
                $obj = new static();
                $is_true = $obj->validateWithReturn($full_path);
                if ($is_true) {
                    $all[$key] = $obj->makeItem($full_path);
                }
            }
            $this->storage = $all;
            return $this;
        }
        return null;
    }


    /**
     * @param array ...$args
     * @return Collection|mixed
     * @throws \Error
     */
    public function scopeGetAllByTagName(...$args)
    {
        $all_by_tag_name = [];
        if (count($args)) {
            $units = $this->scopeAll();
            foreach ($units as $key => $unit) {
                foreach ($args as $keyy => $tagname) {
                    if (isset($unit->attributes['tags']) && $unit->attributes['tags'][0] == $tagname) {
                        $all_by_tag_name[$key] = $unit;
                    }
                }
            }
        } else {
            $this->throwError("Empty arguments");
        }
        return collect($all_by_tag_name);
    }

    /**
     * @param array $array
     * @return $this|mixed
     */
    public function scopeSave(array $array)
    {
        $config = $this->config_path;
        \File::put($config, json_encode($array, true));
        return $this;
    }

    /**
     * @param string $arg1
     * @param string $condition
     * @param string|null $arg3
     * @return $this|mixed
     * @throws \Error
     */
    public function scopeWhere(string $arg1, string $condition, string $arg3 = null)
    {
        $result = [];
        if (is_null($this->storage)) {
            $this->scopeAll();
        }
        $all = $this->storage;
        if (is_null($arg3)) {
            $arg3 = $condition;
            $condition = '=';
        }
        foreach ($all as $key => $unit) {
            $config = $unit->attributes;
            $is_condition_true = false;
            if (isset($config[$arg1])) {
                $is_condition_true = $this->defineCondition($condition, $config[$arg1], $arg3);
            }
            if ($is_condition_true) {
                $result[] = $unit;
            }
        }
        $this->storage = collect($result);
        return $this;
    }

    /**
     * @param string|null $from
     * @param string|null $to
     * @return $this
     * @throws \Error
     */
    public function scopeWhereDate(string $from = null, string $to = null)
    {
        if (!$from && !$to) {
            return $this;
        }
        if (is_null($this->storage)) {
            $this->scopeAll();
        }
        $arr = $this->storage;

        $carbon = new \Carbon\Carbon();
        $format = 'Y-m-d';
        $filtered = [];

        if (!$from || !$to) {
            foreach ($arr as $unit) {
                if (!$from) {
                    $dateTo = strtotime($to);
                    $filtered = $this->where('created_at', '<', $dateTo)->get();
                } else {
                    $dateFrom = strtotime($from);
                    $filtered = $this->where('created_at', '>', $dateFrom)->get();
                }
            }
        } else {
            $dateFrom = $carbon::parse($from)->format($format); // at first change datepicker format
            $dateTo = $carbon::parse($to)->format($format);

            $dateFrom = $carbon::createFromFormat($format, $dateFrom); // and parse string to date object
            $dateTo = $carbon::createFromFormat($format, $dateTo);

            $filtered = array_filter($arr, function ($value) use ($dateFrom, $dateTo, $carbon, $format) {

                if (array_key_exists('created_at', $value->toArray())) {
                    $dateInArray = BBgetDateFormat($value->created_at, "Y-m-d");
                    return $carbon::createFromFormat($format, $dateInArray)->between($dateFrom, $dateTo);
                }
                return false;
            });
        }

        $this->storage = collect($filtered);
        return $this;
    }

    /**
     * @param string $tagg
     * @return $this
     * @throws \Error
     */
    public function scopeWhereTag(string $tagg)
    {
        if (is_null($this->storage)) {
            $this->scopeAll();
        }
        $arr = $this->storage;
        $filtered = [];
        foreach ($arr as $unit) {
            $tags = $unit->tags;
            if ($tags) {
                foreach ($tags as $tag) {
                    if (str_contains(strtolower($tag), strtolower($tagg))) {
                        $filtered[] = $unit;
                    }
                }
            }
        }
        $this->storage = collect($filtered);
        return $this;
    }

    /**
     * @return Collection|mixed
     */
    public function scopeGet()
    {
        return collect($this->storage);
    }

    /**
     * @return null
     */
    public function scopeFirst()
    {
        if (count($this->storage) > 0) {
            return $this->storage[0];
        }
        return null;
    }

    /**
     * @param string $tag
     * @return Collection
     */
    public function scopeSortByTag(string $tag)
    {
        $units = $this->get();
        $result = [];
        foreach ($units as $unit) {
            if (isset($unit->tags) && array_search($tag, $unit->tags) > -1) {
                $result[] = $unit;
            }
        }
        return collect($result);
    }

    /**
     * @param array $settings
     * @return string
     */
    public function scopeRender(array $settings)
    {
        $slug = $this->getSlug();
        $path = $this->getPath();
        View::addLocation(($path));
        View::addNamespace("$slug", $path);
        $actives= \Config::get('units',[]);
        $actives[]=['unit'=>$this,'variation'=>$settings['variation']];
        \Config::set('units',collect($actives));
        if ($this->main_file) {
            $tpl = str_replace(".blade.php", "", $this->main_file);
            if (isset($settings['view_name'])) {
                $tpl = $settings['view_name'];
            }
        } else {
            $tpl = "tpl";
        }
        $this->path = $this->getPath();

        return View::make("$slug::$tpl")->with($settings)->with(['tplPath' => $path, '_this' => $this])->render();
    }

    /**
     * @return bool
     */
    public function makeConfigJson()
    {
        if (!\File::exists($this->config_path)) {
            \File::put($this->config_path, '{}');
            $this->scopeOptimize();
        }
        return true;
    }

    /**
     * @param string $slug
     * @param string|NULL $title
     * @param array $data
     * @param null $isSave
     * @return array|bool
     */
    public function scopeSaveSettings(string $slug, string $title = NULL, array $data, $isSave = NULL)
    {
        if ($isSave && $isSave == 'save') {
            $unit = $this->find($slug);
            $existingVariation = $this->variations(false)->find($slug);
            $dataToInsert = [
                'title' => $title,
                'settings' => $data
            ];
            if (!$existingVariation) {
                $unit->variations(false)->createVariation($dataToInsert);
            } else {
                $existingVariation->title = $title;
                $existingVariation->settings = $dataToInsert['settings'];
                $variation = $existingVariation;
            }
            if (!$variation->settings) {
                $variation->setAttributes('settings', []);
            }
            $settings = [];
            if (count($variation->settings) > 0) {
                $settings = $variation->settings;
            }

            if ($variation->save()) {
                return [
                    'html' => $unit->renderLive(['settings' => $settings, 'source' => BBGiveMe('array', 5), 'cheked' => 1]),
                    'slug' => $variation->id
                ];
            }
        } else {
            return [
                'html' => $this->findByVariation($slug)->renderLive(['settings' => $data]),
                'slug' => $slug
            ];
        }
        return false;
    }

    /**
     * @return array|mixed
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    private function getRegisters()
    {
        $get_content = @json_decode(\File::get($this->config_path), true);
        if ($get_content) {
            return $get_content;
        }
        return [];
    }

    /**
     * @param $unit_path
     * @return int
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    private function scopeRegistration($unit_path)
    {
        $full_path = $this->makePath($unit_path);
        $this->validate($full_path);

        $get_content = json_decode(\File::get($full_path), true);
        $this->validateSlugWithPath($get_content);

        $slug = $get_content["slug"];
        $path = $get_content["path"];

        $push_into_config = $this->getRegisters();
        $push_into_config[$slug] = $path;

        return \File::put($this->config_path, json_encode($push_into_config));

    }

    /**
     * @return bool
     * @throws \Error
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function scopeDelete()
    {
        $path = $this->makePathForRemove($this->attributes["path"]);

        if (\File::exists($path)) {
            $arr = json_decode(\File::get($this->config_path), true);
            unset($arr[$this->slug]);

            \File::put($this->config_path, json_encode($arr));

            return \File::deleteDirectory($path);
        }
        $this->throwError('Unit Does not found');
    }

    /**
     * @param $name
     * @return bool|mixed
     */
    public function __get($name)
    {
        $result = isset($this->toArray()[$name]) ? $this->toArray()[$name] : false;
        return $result;
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        $method = 'scope' . ucfirst($name);
        if (method_exists($this, $method)
            && is_callable(array($this, $method))
        ) {
            return call_user_func_array([$this, $method], $arguments);
        }
        throw new Exception("Method $name does not exist");
    }

    /**
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->toArray()[$name]);
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        $method = 'scope' . ucfirst($name);
        $_this = new static;
        if (method_exists($_this, $method) && is_callable(array($_this, $method))) {
            return call_user_func_array([$_this, $method], $arguments);
        } else {
            throw new \Error("Method $name does not exist");
        }
    }

    // make a path

    /**
     * @param $path
     * @return string
     */
    protected function makePath($path)
    {
        return $path . DS . $this->name_of_json;
    }

    // make a path for remove unit

    /**
     * @param $path
     * @return string
     */
    protected function makePathForRemove($path)
    {
        return $this->base_path . DS . $path;
    }

    /**
     * @param $slug
     * @return null|string
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function getItemConfigJsonPath($slug)
    {
        $config = $this->getRegisters();
        $slug = explode('.', $slug)[0];

        if (!isset($config[$slug])) {
            return null;
            //$this->throwError("Not Registered Item $slug !!!", 404);
        }

        return $this->makePath($config[$slug]);
    }

// validate if file exist

    /**
     * @param $path
     * @return bool
     */
    protected function validate($path)
    {
        if (!\File::exists($path)) {
            //$this->throwError('File does not found ' . $path, 404);
            return false;
        }
        return true;
    }

    // validate if file exist and return true or false

    /**
     * @param $path
     * @return bool
     */
    protected function validateWithReturn($path)
    {

        if (!\File::exists($path)) {
            return false;
        }
        return true;
    }

    // check if settings blade is undefined

    /**
     * @param $part
     * @return bool|string
     */
    protected function validateSettings($part)
    {
        //$path = $this->getPath() . DS . $part;
        $path = $this->path;
        if (!\File::exists($path)) {
            return "Undefined Settings Blade!";
        }
        return false;
    }

// if slug or path is invalid

    /**
     * @param $content
     * @return bool
     * @throws \Error
     */
    protected function validateSlugWithPath($content)
    {
        if (!isset($content["slug"])) {
            $this->throwError('Slug does not found', 404);
        }
        if (!isset($content["path"])) {
            $this->throwError('Path does not found', 404);
        }
        return true;
    }

    /**
     * @return $this
     * @throws \Error
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function getAutoInclude()
    {
        if (\File::exists($this->path . DS . 'auto_include.json')) {
            $this->setAttributes('partials', json_decode(\File::get($this->path . DS . 'auto_include.json'), true));
            return $this;
        }
        $this->throwError('Missing auto_include.json file in ' . $this->path . '!!!', 404);
    }


    /**
     * @param int $limit
     * @param int $links_count
     * @param string $list_class
     * @return Paginator
     */
    protected function scopePaginate($limit = 5, $links_count = 5, $list_class = 'bty-pagination-2')
    {
        $paginate = new Paginator($limit, $links_count, $list_class, $this->storage);
        return $paginate;
    }


    // function for error

    /**
     * @param $msg
     * @param int $code
     * @throws \Error
     */
    protected function throwError($msg, $code = 404)
    {
        throw new \Error($msg, $code);
    }

    // choose which condtion is was setted

    /**
     * @param $condition
     * @param $arg1
     * @param $arg2
     * @return bool
     * @throws \Error
     */
    protected function defineCondition($condition, $arg1, $arg2)
    {
        $bool = false;
        switch ($condition) {
            case ">":
                $bool = $arg1 > $arg2;
                break;
            case "<":
                $bool = $arg1 < $arg2;
                break;
            case "==":
            case "=":
                $bool = $arg1 == $arg2;
                break;
            case "<=":
                $bool = $arg1 <= $arg2;
                break;
            case ">=":
                $bool = $arg1 >= $arg2;
                break;
            case "like":
                $bool = str_contains(strtolower($arg1), strtolower($arg2));
                break;
            default:
                $this->throwError("Condition is not exist");
        }
        return $bool;
    }

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    protected function setAttributes($key, $value)
    {
        $this->attributes[$key] = $value;
        return $this;
    }

    /**
     * @return int
     * @throws \Error
     */
    protected function scopeOptimize()
    {
        $painters = $this->scopeAll()->get();
        $config = [];
        foreach ($painters as $painter) {
            $config[$painter->getSlug()] = $painter->getPath();
        }
        return \File::put($this->config_path, json_encode($config));
    }

    /**
     * @return string
     */
    public function getVariationsPath()
    {
        return $this->getPath() . DS . 'variations';
    }

    /**
     * @return bool|mixed|string
     */
    public function getViewFile()
    {
        return $this->view_name ? $this->view_name : 'tpl';
    }

    /**
     * @return bool|mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

//    public function getPath()
//    {
//        return base_path($this->base_path);
//    }
}