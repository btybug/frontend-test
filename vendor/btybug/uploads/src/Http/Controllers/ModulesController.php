<?php
/**
 * Copyright (c) 2017.
 * *
 *  * Created by PhpStorm.
 *  * User: Edo
 *  * Date: 10/3/2016
 *  * Time: 10:44 PM
 *
 */

namespace Btybug\Uploads\Http\Controllers;

use Btybug\btybug\Services\RenderService;
use Btybug\Console\Repository\AdminPagesRepository;
use Btybug\Uploads\Repository\Plugins;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Symfony\Component\Console\Tests\Input\StringInput;

class ModulesController extends Controller
{
    public function getChilds ()
    {
        return view('uploads::index');
    }

    public function getIndex ()
    {
        return view('uploads::Modules.index');
    }

    public function getCoreModules (Request $request)
    {

        $selected = null;
        $packages = new Plugins();
        $packages->modules();
        $plugins = $packages->getPlugins();
        if ($request->p && isset($plugins[$request->p])) {
            $selected = $packages->find($plugins[$request->p]['name']);
        } elseif ($request->p && ! isset($plugins[$request->p])) {
            abort('404');
        } elseif (! $request->p && ! isset($plugins[$request->p])) {
            foreach ($plugins as $key => $plugin) {
                $selected = $packages->find($key);
                continue;
            }
        }

        $storage = $packages->getStorage();
        $enabled = true;
        if (isset($selected->name) && isset($storage[$selected->name])) {
            $enabled = false;
        }

        return view('uploads::Modules.core', compact('plugins', 'selected', 'enabled'));
    }

    public function getExplore (
        $repository,
        $package,
        AdminPagesRepository $adminPagesRepository
    )
    {
        $plugins = new Plugins();
        $plugins->modules();
        $plugin = $plugins->find($repository . '/' . $package);
        $tables = $plugin->tablse();
        $units = $plugin->units();

        $units = $adminPagesRepository->PagesByModulesParent($plugin);

        return view('uploads::Explores.index', compact('plugin', 'units', 'pages', 'tables'));
    }

    public function getExplorePlugins (
        $repository,
        $package,
        AdminPagesRepository $adminPagesRepository
    )
    {
        $plugins = new Plugins();
        $plugins->plugins();
        $plugin = $plugins->find($repository . '/' . $package);
        $tables = $plugin->tablse();
        $units = $plugin->units();
        $pages = $adminPagesRepository->PagesByModulesParent($plugin);

//        dd($plugin, $tables,$pages);

        return view('uploads::Explores.index', compact('plugin', 'units', 'pages', 'tables'));
    }

    public function getUpdateCms ()
    {
        $url = url();
        self::rrmdir(__DIR__ . '/../../../../../../vendor');
        header("Location:$url");
    }

    public static function rrmdir ($dir)
    {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (is_dir($dir . "/" . $object))
                        rrmdir($dir . "/" . $object);
                    else
                        unlink($dir . "/" . $object);
                }
            }
            rmdir($dir);
        }
    }
}