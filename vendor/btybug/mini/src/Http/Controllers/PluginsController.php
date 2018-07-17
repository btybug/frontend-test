<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 04.07.2018
 * Time: 14:25
 */

namespace Btybug\Mini\Http\Controllers;


use App\Http\Controllers\Controller;
use Btybug\Mini\Model\MiniPainter;
use Btybug\Mini\Services\PagesService;
use Btybug\Console\Repository\FrontPagesRepository;
use Illuminate\Http\Request;

class PluginsController extends MiniController
{
    public function getList(Request $request)
    {
        $this->ennable($request);
        return $this->cms->extraPlugins();
    }

    public function getSettings(Request $request)
    {
        $this->ennable($request);
        return $this->cms->pluginsSettings();
    }
}