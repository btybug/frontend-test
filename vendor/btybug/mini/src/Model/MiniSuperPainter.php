<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 07.07.2018
 * Time: 20:31
 */

namespace Btybug\Mini\Model;

use Btybug\btybug\Models\Painter\Painter;
use Illuminate\Http\Request;

class MiniSuperPainter extends Painter
{
    public function __construct()
    {
        parent::__construct();

        $this->setStoragePath(['vendor'.DS.'btybug'.DS.'mini'.DS.'src'.DS.'Resources'.DS.'Units']);
        $this->setConfigPath(storage_path('app'.DS.'minipainter.json'));
    }

    public function getPath()
    {
        return base_path($this->path);
    }
}