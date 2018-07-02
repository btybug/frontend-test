<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 16.12.2017
 * Time: 20:07
 */

namespace Btybug\btybug\Models\Universal;


use File;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Collection;

class Variations implements \ArrayAccess, \Countable, \IteratorAggregate, Htmlable
{
    protected $path;
    protected $view;
    protected $attributes;
    protected $model;
    protected $items;
    protected $hidden;

    public function __construct($obj, $hidden = true)
    {

        $this->view = $obj->getViewFile();
        $this->model = $obj;
        $this->path = $obj->getVariationsPath();
        $this->hidden = $hidden;

    }

    public function render(array $additionalSettings = [])
    {
        $slug = $this->model->getSlug();
        $tpl = $this->view;
        $path = $this->model->getPath();
        \View::addLocation($this->model->getPath());
        \View::addNamespace($slug, $this->model->getPath());
        $variables = $this->mixer($additionalSettings);
        return \View::make("$slug::$tpl")->with('settings', $variables)->with('variation', $this)->with(['tplPath' => $path, '_this' => $this->model])->render();
    }

    private function mixer($liveSettings)
    {
        $settings = $this->attributes['settings'];
        if (count($liveSettings) && is_array($liveSettings) && is_array($settings)) {
            array_filter($settings, function ($value) {
                return $value !== '';
            });

            array_filter($liveSettings, function ($value) {
                return $value !== '';
            });
            $settings = array_merge($settings, $liveSettings);
        }

        return $settings;
    }

    public function toArray()
    {
        if (isset($this->attributes)) return $this->attributes;
        return false;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function all()
    {
        $vars = File::allFiles($this->path);
        $array = array();
        foreach ($vars as $var) {
            if (File::extension($var) == 'json') {
                $data = json_decode(File::get($var), true);
                if (isset($data['hidden']) && $this->hidden) continue;
                $all = new $this($this->model);
                $all->id = File::name($var);
                $all->path = $this->path . '/' . File::name($var) . '.json';
                $all->file = $var;
                $all->attributes = $data instanceof Collection ? $data : Collection::make($data);
                $all->original = $all->attributes;
                $all->updated_at = File::lastModified($var);
                $array[$data['id']] = $all;
            }
        }
        $this->items = collect($array);
        return $this;
    }

    public function default()
    {
        foreach ($this->all()->items as $variation) {

            if (strtolower($variation->title) == 'default') {
                return $variation;
            }
        }
    }

    public function find($id)
    {
        $variations = $this->all();
        return (isset($variations->items[$id])) ? $variations->items[$id] : null;
    }

    public function deleteVariation($id)
    {
        $var = $this->find($id);
        $this->unsetVar($var->path);
        return $this;
    }

    public function makeVariation(array $array, $slug = null, bool $hidden = false)
    {
        $rand_id = ($slug) ? $slug : uniqid();
        $id = $this->model->getSlug() . '.' . $rand_id;
        $path = $this->path . DS . $id . '.json';

        $this->path = $path;

        $variation_title = 'New variation_' . $rand_id;
        $settings = [];
        $arr = [];
        if (!isset($array['title'])) {
            $array['title'] = $variation_title;
        }
        if (isset($array["settings"])) {
            $settings = $array["settings"];
        }
        $arr['id'] = $id;
        if ($hidden) $arr['hidden'] = 1;
        $arr['title'] = $array['title'];
        $arr['settings'] = $settings;

        if (isset($array["used_in"])) {
            $arr['used_in'] = $array["used_in"];
        }
        $this->attributes = collect($arr);

        return $this;
    }

    public function createVariation(array $array, $slug = null, bool $hidden = false)
    {
        return $this->makeVariation($array, $slug, $hidden)->save();
    }

    public function setAttributes($key, $value)
    {
        $this->attributes[$key] = $value;
        return $this;
    }

    public function removeAttributes($key)
    {
        unset($this->attributes[$key]);
        return $this;
    }

    /**
     * @param mixed $key
     * @return bool
     */
    public function offsetExists($key)
    {
        return $this->attributes->has($key);
    }

    /**
     * Get the item at the given offset.
     *
     * @param  mixed $key
     * @return mixed
     */
    public function offsetGet($key)
    {
        return $this->attributes->get($key);
    }

    /**
     * Set the item at the given offset.
     *
     * @param  mixed $key
     * @param  mixed $value
     * @return void
     */
    public function offsetSet($key, $value)
    {
        $this->attributes->put($key, $value);
    }

    /**
     * Unset the item at the given key.
     *
     * @param  mixed $key
     * @return void
     */
    public function offsetUnset($key)
    {
        $this->attributes->forget($key);
    }

    /**
     * Get the number of items for the current page.
     *
     * @return int
     */
    public function count()
    {
        return $this->items->count();
    }

    public function copy()
    {
        $dublicate = $this->attributes->toArray();
        return $this->model
            ->variations()
            ->makeVariation($dublicate, null)
            ->save();
    }

    /**
     * Get an iterator for the items.
     *
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->items->all());
    }

    /**
     * Ged HTML for the current variation
     *
     * @return string|void
     */
    public function toHtml()
    {
        return $this->render();
    }


    /**
     * @param $name
     * @param $value
     * @return $this
     */

    public function __set($name, $value)
    {
        if (isset($this->attributes[$name])) {
            $this->attributes[$name] = $value;
            return $this;
        }
    }

    public function setSettings($name, $value)
    {
        $attr = $this->attributes->toArray();
        $attr['settings'][$name] = $value;
        $this->attributes = collect($attr);
        return $this;
    }

    public function __get($name)
    {
        $result = isset($this->attributes[$name]) ? $this->attributes[$name] : false;
        return $result;
    }

    public function unsetVar($path)
    {
        if (File::exists($path)) {
            return File::delete($path);
        }
        $this->throwError('File Does not found');
    }

    public function throwError($msg, $code = 404)
    {
        throw new \Error($msg, $code);
    }

    public function save()
    {
        File::put($this->path, json_encode($this->attributes->toArray(), true));
        return $this;
    }

    public function getModel()
    {
        return $this->model;
    }

}