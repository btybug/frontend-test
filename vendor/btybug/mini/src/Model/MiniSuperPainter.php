<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 07.07.2018
 * Time: 20:31
 */

namespace Btybug\Mini\Model;

use Btybug\btybug\Models\Painter\BasePainter;

class MiniSuperPainter extends BasePainter
{
    public function __construct()
    {

        $this->base_path = 'vendor' . DS . 'btybug' . DS . 'mini' . DS . 'src' . DS . 'Resources' . DS . 'Units';
        $this->config_path = storage_path('app' . DS . 'minipainter.json');
        parent::__construct();

    }

    public function getPath()
    {
        return base_path($this->path);
    }

    public function scopeAll()
    {
        $all = [];
        $path = $this->base_path; // TODO: this should be removed
        $units = \File::directories(base_path($path));
        if (count($units)) {
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

        $this->storage = $all;
        return $this;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function scopeFindByVariation($id)
    {
        $slug = explode('.', $id);
        $tpl = self::find($slug[0]);

        return $tpl;
    }

    /**
     * @param string $slug
     * @return bool|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function scopeRenderLivePreview(string $slug)
    {

        $ui = $model = $this->findByVariation($slug);
        if (!$ui) {
            return false;
        }
        $variation = $ui->variations(false)->find($slug);
        $settings = $variation->settings;
        $data['body'] = url('/admin/uploads/gears/settings-iframe', $slug);
        $data['settings'] = url('/admin/uploads/gears/settings-iframe', $slug) . '/settings';
        return view('uploads::gears.units.preview', compact(['model', "ui", 'data', 'settings', 'variation']));
    }

    /**
     * @param null $variables
     * @return bool|mixed|string
     */
    public function scopeRenderSettings($variables = null, $data = [])
    {
        $path = $this->getPath();
        $variables['tplPath'] = $path;
        $variables['_this'] = $this;
        $slug = $this->getSlug();

        $is_wrong = $this->validateSettings('settings.blade.php');

        if ($is_wrong) {
            return $is_wrong;
        }

        \View::addLocation($path);
        \View::addNamespace("$slug", $path);

        return \View::make("$slug::settings")->with($variables)->with($data)->render();
    }

    /**
     * @param array $variables
     * @return mixed|string
     * @throws \Error
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function scopeRenderLive(array $variables = [])
    {

        $slug = $this->getSlug();
        $path = $this->getPath();
        \View::addLocation($path);
        \View::addNamespace("$slug", $path);

        if ($this->autoinclude) {
            return $this->getAutoInclude()->render($variables['variation']->toArray(), "$slug::");
        }
        if ($this->example) {
            $tpl = $this->example;
        } elseif ($this->main_file) {
            $tpl = str_replace(".blade.php", "", $this->main_file);
            if (isset($variables['view_name'])) {
                $tpl = $variables['view_name'];
            }
        } else {
            $tpl = "tpl";
        }
        $this->path = $path;
        return \View::make("$slug::$tpl")->with($variables)->with(['tplPath' => $path, '_this' => $this])->render();
    }

    /**
     * @return string
     */


    /**
     * @return bool
     */
    public function scopeRemovePainterJson()
    {
        $path = $this->getConfigPath();
        return \File::delete($path);
    }

    public function setAttributes($key, $value)
    {
        $this->attributes[$key] = $value;
        return $this;
    }

}