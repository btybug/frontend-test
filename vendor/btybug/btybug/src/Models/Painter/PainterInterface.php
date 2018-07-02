<?php
/**
 * Created by PhpStorm.
 * User: hook
 * Date: 12/11/2017
 * Time: 11:58 PM
 */

namespace Btybug\btybug\Models\Painter;


use Illuminate\Contracts\Support\Arrayable;

interface PainterInterface extends Arrayable
{
    /**
     * @return mixed
     */
    public function scopeAll();

    /**
     * @param string $slug
     * @return mixed
     */
    public function scopeFind(string $slug);

    /**
     * @param array ...$args
     * @return mixed
     */
    public function scopeGetAllByTagName(...$args);

    /**
     * @param array $array
     * @return mixed
     */
    public function scopeSave(array $array);

    /**
     * @return mixed
     */

    public function scopeWhere(string $arg1, string $condition, string $arg3);

    /**
     * @return mixed
     */
    public function scopeGet();

    /**
     * @param array $settings
     * @return mixed
     */
    public function scopeRender(array $settings);

    /**
     * @return mixed
     */
    public function scopeFirst();

    /**
     * @param string $tag
     * @return mixed
     */
    public function scopeSortByTag(string $tag);
}