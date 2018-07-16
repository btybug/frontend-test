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
use Illuminate\Http\Request;

class UnitService
{
    private $unitModel = null;

    public function getUnit ($units, $slug = null)
    {
        if($slug){
            $this->unitModel = Painter::whereTag('minicms')->where('slug',$slug)->first();
        }else{
            if(count($units)){
                $this->unitModel = array_first($units);
            }
        }

        return $this->unitModel;
    }
}