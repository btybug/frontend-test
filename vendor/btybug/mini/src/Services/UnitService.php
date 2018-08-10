<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 07.07.2018
 * Time: 20:31
 */

namespace Btybug\Mini\Services;


use Btybug\btybug\Models\Painter\Painter;
use Btybug\Console\Repository\FrontPagesRepository;
use Btybug\Mini\Model\MiniPainter;
use Btybug\Mini\Model\MiniSuperPainter;
use Illuminate\Http\Request;

class UnitService
{
    private $unitModel = null;
    private $painter;
    private $user_painter;

    public function __construct(
        MiniSuperPainter $painter
    )
    {
        $this->painter = $painter;
    }

    public function getUnit($units, $slug = null)
    {
        if ($slug) {
            $this->unitModel = $this->painter->where('slug', $slug)->first();
        } else {
            if (count($units)) {
                $this->unitModel = array_first($units);
            }
        }

        return $this->unitModel;
    }
    public function getUserUnit($units, $slug = null)
    {
        if ($slug) {
            $this->unitModel = MiniPainter::where('slug', $slug)->first();
        } else {
            if (count($units)) {
                $this->unitModel = array_first($units);
            }
        }

        return $this->unitModel;
    }
}