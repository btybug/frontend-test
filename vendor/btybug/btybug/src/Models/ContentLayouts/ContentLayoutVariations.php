<?php
/**
 * Created by PhpStorm.
 * User: Comp1
 * Date: 1/27/2017
 * Time: 3:24 PM
 */

namespace Btybug\btybug\Models\ContentLayouts;

use Btybug\btybug\Models\Universal\Variations;
use File;

/**
 * Class ContentLayoutVariations
 * @package Btybug\btybug\Models\ContentLayouts
 */
class ContentLayoutVariations extends Variations
{
    public static function delete($id, $tpl)
    {
        $vPath = $tpl->path . DS . $tpl->variationPath . 'variations' . DS . $id . '.json';
        if (File::exists($vPath)) return File::delete($vPath);
        return false;
    }

    /**
     * @return mixed|null
     */
    public function makeInActiveVariation()
    {
        $data = $this->attributes;
        $data['active'] = false;
        $this->attributes = $data;
        return $this;
    }
}