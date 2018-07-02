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

use App\Http\Controllers\Controller;
use Btybug\btybug\Helpers\helpers;
use Btybug\Uploads\Repository\AssetsRepository;
use Btybug\Uploads\Repository\VersionProfilesRepository;
use Btybug\Uploads\Services\VersionProfilesService;
use Illuminate\Http\Request;
use Btybug\Uploads\Repository\VersionsRepository;
use Btybug\Uploads\Services\VersionsService;

/**
 * Class ModulesController
 * @package Btybug\Modules\Http\Controllers
 */
class AssetProfilesController extends Controller
{
    /**
     * @var helpers
     */
    public $helper;

    public function __construct ()
    {
        $this->helper = new helpers();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex ()
    {
        return view('uploads::profiles.index');
    }

    public function getJs (
        VersionProfilesRepository $versionsRepository,
        VersionProfilesService $versionsService
    )
    {
        $plugins = $versionsRepository->getBy('type', 'js');

        return view('uploads::profiles.js', compact(['plugins']));
    }

    public function getCss (
        VersionProfilesRepository $versionsRepository,
        VersionProfilesService $versionsService
    )
    {
        $plugins = $versionsRepository->getBy('type', 'css');

        return view('uploads::profiles.css', compact(['plugins']));
    }

    public function getJsCreate (
        VersionsRepository $versionsRepository,
        VersionsService $versionsService,
        AssetsRepository $assetsRepository
    )
    {
        $model = null;
        $plugins = $versionsRepository->getJS();
        $mains = $versionsRepository->getJQuery();
        $assets = $assetsRepository->getWithGroupBy();

        return view('uploads::profiles.create_js', compact(['plugins', 'model', 'mains', 'assets']));
    }

    public function postJsCreate (
        Request $request,
        VersionProfilesRepository $profilesRepository,
        VersionProfilesService $profilesService
    )
    {
        $data = $request->except('_token');
        $data['user_id'] = \Auth::id();
        $data['type'] = 'js';
        $data['files'] = json_decode($data['files'],true);
        $profile = $profilesRepository->create($data);
        $profilesService->generateJS($profile);

        return \Response::json(['error' => false,'url' => route('uploads_assets_profiles_js')]);
    }

    public function postCssCreate (
        Request $request,
        VersionProfilesRepository $profilesRepository,
        VersionProfilesService $profilesService
    )
    {
        $data = $request->except('_token', 'main', 'files');
        if ($request->get('files')) {
            $data['files'] = array_prepend($request->get('files'), $request->get('main'));
        } else {
            $data['files'] = $request->get('main');
        }
        $data['user_id'] = \Auth::id();
        $profile = $profilesRepository->create($data);
        $profilesService->generateCSS($profile);
        return redirect()->route('uploads_assets_profiles_css');
    }

    public function getCssCreate (
        VersionsRepository $versionsRepository,
        VersionsService $versionsService
    )
    {
        $model = null;
        $plugins = $versionsRepository->getCss();
        $mains = $versionsRepository->getFrameworks();

        return view('uploads::profiles.create_css', compact(['plugins', 'model', 'mains']));
    }

    public function getJsEdit (
        $id,
        Request $request,
        VersionProfilesRepository $profilesRepository,
        VersionsRepository $versionsRepository,
        AssetsRepository $assetsRepository
    )
    {
        $model = $profilesRepository->findOrFail($id);
        $plugins = $versionsRepository->getJS();
        $mains = $versionsRepository->getJQuery();
        $assets = $assetsRepository->getWithGroupBy();

        return view('uploads::profiles.create_js', compact(['plugins', 'model', 'mains', 'assets']));
    }

    public function getCssEdit (
        $id,
        Request $request,
        VersionProfilesRepository $profilesRepository,
        VersionsRepository $versionsRepository
    )
    {
        $model = $profilesRepository->findOrFail($id);
        $plugins = $versionsRepository->getCss();
        $mains = $versionsRepository->getFrameworks();

        return view('uploads::profiles.create_css', compact(['plugins', 'model', 'mains']));
    }

    public function postCssEdit (
        $id,
        Request $request,
        VersionProfilesRepository $profilesRepository,
        VersionProfilesService $profilesService
    )
    {
        $data = $request->except('_token', 'main', 'files');
        if ($request->get('files')) {
            $data['files'] = array_prepend($request->get('files'), $request->get('main'));
        } else {
            $data['files'][] = $request->get('main');
        }
        $model = $profilesRepository->findOrFail($id);
        $profilesService->removeFile($model->hint_path);
        $updated = $profilesRepository->update($id, $data);
        $profilesService->generateCSS($updated);

        return redirect()->route('uploads_assets_profiles_css');
    }

    public function postJsEdit (
        $id,
        Request $request,
        VersionProfilesRepository $profilesRepository,
        VersionProfilesService $profilesService
    )
    {
        $data = $request->except('_token');
        $model = $profilesRepository->findOrFail($id);
        $profilesService->removeFile($model->hint_path);
        $data['files'] = json_decode($data['files'],true);
        $updated = $profilesRepository->update($id, $data);
        $profilesService->generateJS($updated);

        return \Response::json(['error' => false,'url' => route('uploads_assets_profiles_js')]);
    }

    public function delete (
        Request $request,
        VersionProfilesRepository $profilesRepository,
        VersionProfilesService $profilesService
    )
    {
        $data = $profilesRepository->findOrFail($request->get('slug'));
        if ($data->structured_by) abort(404);
        $profilesService->removeFile($data->hint_path);
        $profilesRepository->delete($request->get('slug'));

        return \Response::json(['success' => true, 'url' => url('/admin/uploads/profiles/' . $data->type)]);
    }

    public function postGetAssets(
        Request $request,
        VersionsRepository $versionsRepository
    )
    {
        $result = $versionsRepository->getByWhereInId($request->get('files',[]));
        return $result;
    }

    public function getOptimized(Request $request)
    {
        try{
            BBpageAssetsOptimise();
        }catch (\Exception $exception ){
            return redirect()->back()->with('error',$exception->getMessage());
        }

        return redirect()->back()->with('message','successfully optimized');
    }
}

