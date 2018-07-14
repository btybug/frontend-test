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

class MiniPainter extends Painter
{
    public function __construct()
    {
        parent::__construct();
        $this->config_path = config('miniunits_config_path');
        $this->base_path = config('miniunits_storage_path');
    }

    public function getPath()
    {
        return base_path($this->path);
    }
}