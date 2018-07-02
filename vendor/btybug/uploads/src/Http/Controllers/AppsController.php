<?php
/**
 * Copyright (c) 2017. All rights Reserved BtyBug TEAM
 */

/**
 * Created by PhpStorm.
 * User: menq
 * Date: 8/15/17
 * Time: 2:43 PM
 */

namespace Btybug\Uploads\Http\Controllers;


use Btybug\Uploads\Repository\AppProductRepository;
use Btybug\Uploads\Repository\AppRepository;
use Btybug\Uploads\Repository\Plugins;
use Btybug\Uploads\Services\AppsService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Symfony\Component\Console\Tests\Input\StringInput;

class AppsController extends Controller
{
    public function getIndex ()
    {
        return view('uploads::Apps.index');
    }

    public function getCoreApps (
        Request $request,
        AppRepository $appRepository
    )
    {
        $selected = null;
        $products = [];
        $apps = $appRepository->getAll();
        if ($request->p) {
            $selected = $appRepository->find($request->p);
            $products = $selected->products;
        }

        if (! $selected) {
            $selected = $appRepository->first();
            $products = $selected->products;
        }

        return view('uploads::Apps.core', compact('apps', 'selected', 'products'));
    }

    public function postCreateProduct (
        Request $request,
        AppsService $appsService
    )
    {
        $appsService->createProduct($request->get('id'), $request->get('name'));

        return redirect()->back();
    }

    public function getEditCore (
        AppProductRepository $appProductRepository,
        AppsService $appsService,
        $param = null
    )
    {
        $model = $appProductRepository->findOrFail($param);
        $product = $appsService->getForEdit($model);

        return view('uploads::Apps.edit', compact('product', 'model'));
    }

    public function postEditCore (
        Request $request,
        AppProductRepository $appProductRepository,
        $param = null
    )
    {
        $product = $appProductRepository->findOrFail($param);

        $appProductRepository->update($param, $request->only('name', 'status', 'description') + [
                'json_data' => $request->except('name', 'status', 'description', '_token')
            ]);

        return redirect()->back();
    }

    public function getExtra (Request $request)
    {

        $selected = null;
        $packages = new Plugins();
        $packages->appPlugins();
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

        return view('uploads::Apps.core', compact('plugins', 'selected', 'enabled'));
    }

    public function delete (
        Request $request,
        AppProductRepository $appProductRepository
    )
    {
        $data = $appProductRepository->findOrFail($request->get('slug'));
        $response = $appProductRepository->delete($request->get('slug'));

        return \Response::json(['success' => true, 'url' => url(route('core_apps'))]);
    }
}