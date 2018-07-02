<?php

namespace Btybug\btybug\Models\Universal;

/**
 * Created by PhpStorm.
 * User: menq
 * Date: 14.12.2017
 * Time: 20:02
 */
use ArrayAccess;
use Countable;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use IteratorAggregate;
use Illuminate\Support\Collection;
use JsonSerializable;


class Paginator implements ArrayAccess, Countable, IteratorAggregate, Arrayable, JsonSerializable, Jsonable
{
    protected $items = [];
    /**
     * @var array
     */
    protected $paginator = [];
    /**
     * @var int|mixed
     */
    protected $page = 1;
    /**
     * @var
     */
    protected $limit;
    /**
     * @var
     */
    protected $links_count;
    /**
     * @var
     */
    protected $list_class;
    /**
     * @var int
     */
    protected $total;

    /**
     * Paginator constructor.
     * @param $limit
     * @param $links_count
     * @param $list_class
     * @param $items
     */
    public function __construct($limit, $links_count, $list_class, $items)
    {
        $this->limit = $limit;
        $this->links_count = $links_count;
        $this->list_class = $list_class;
        $this->page = \Request::get('page', 1);
        $this->total = count($items);
        $array = [];
        foreach ($items as $item) {
            $array[] = $item;
        }
        $needles = $this->itemsCleaner($array);
        $this->items = $needles instanceof Collection ? $needles : Collection::make($needles);
    }

    /**
     * @return int|mixed
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @return mixed
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @return mixed
     */
    public function getLinksCount()
    {
        return $this->links_count;
    }

    /**
     * @return mixed
     */
    public function getListClass()
    {
        return $this->list_class;
    }

    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param int $limit
     * @param int $links_count
     * @param string $list_class
     * @return $this
     */
    public function paginate($limit = 5, $links_count = 5, $list_class = 'bty-pagination-2')
    {

        $this->limit = $limit;
        $this->links_count = $links_count;
        $this->list_class = $list_class;
        $this->total = count($this->storage) ? range(1, count($this->storage)) : [];
        // $this->items = $this->storage instanceof Collection ? $this->storage : Collection::make($this->storage);
        $page = \Request::get('page');
        return $this;
    }

    /**
     * @return string
     */
    public function links()
    {
        $paginator = $this;
        return \View::make('btybug::_partials.paginator', compact('paginator'))->render();
    }

    /**
     * @param $items
     * @return array
     */
    public function itemsCleaner($items)
    {
        $groups = array_chunk($items, $this->limit);
        return isset($groups[$this->page - 1]) ? $groups[$this->page - 1] : [];
    }

    /**
     * @param mixed $key
     * @return bool
     */
    public function offsetExists($key)
    {
        return $this->items->has($key);
    }

    /**
     * Get the item at the given offset.
     *
     * @param  mixed $key
     * @return mixed
     */
    public function offsetGet($key)
    {
        return $this->items->get($key);
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
        $this->items->put($key, $value);
    }

    /**
     * Unset the item at the given key.
     *
     * @param  mixed $key
     * @return void
     */
    public function offsetUnset($key)
    {
        $this->items->forget($key);
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
     * @return array|Collection|static
     */
    public function toArray()
    {
        return $this->items;
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function toJson($options = 0)
    {
        return json_encode($this->jsonSerialize(), $options);
    }
}