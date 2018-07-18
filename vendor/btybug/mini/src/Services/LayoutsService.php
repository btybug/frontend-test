<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 07.07.2018
 * Time: 20:31
 */

namespace Btybug\Mini\Services;


use Btybug\btybug\Models\ContentLayouts\ContentLayouts;

class LayoutsService
{
    private $layoutModel = null;
    private $painter;

    public function __construct(
        ContentLayouts $contentLayouts
    )
    {
        $this->contentLayouts = $contentLayouts;
    }

    public function getUnit($layouts, $slug = null)
    {
        if ($slug) {
            $this->layoutModel = $this->contentLayouts->whereTag('minicms')->where('slug', $slug)->first();
        } else {
            if (count($layouts)) {
                $this->unitModel = array_first($layouts);
            }
        }

        return $this->layoutModel;
    }
}