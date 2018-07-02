<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 16.12.2017
 * Time: 23:23
 */

namespace Btybug\btybug\Models\Universal;


interface VariationAccess
{
    public function scopeVariations(bool $hidden);

    public function getVariationsPath();

    public function getViewFile();

    public function getSlug();

    public function getPath();
}