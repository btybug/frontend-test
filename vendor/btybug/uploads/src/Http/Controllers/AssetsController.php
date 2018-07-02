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
use Btybug\btybug\Repositories\AdminsettingRepository;
use Btybug\Console\Repository\FrontPagesRepository;
use Btybug\Framework\Http\Requests\ChangeVersionRequest;
use Btybug\Framework\Http\Requests\GenerateJSRequest;
use Btybug\Framework\Http\Requests\MakeActiveVersionRequest;
use Btybug\Framework\Http\Requests\UpdateJsRequest;
use Btybug\Framework\Http\Requests\UploadCssRequest;
use Btybug\Framework\Http\Requests\UploadJsRequest;
use Btybug\Uploads\Repository\AssetsRepository;
use Btybug\Uploads\Repository\UnitsRepository;
use Btybug\Uploads\Repository\VersionsRepository;
use Btybug\Uploads\Services\VersionsService;
use Illuminate\Http\Request;

/**
 * Class ModulesController
 * @package Btybug\Modules\Http\Controllers
 */
class AssetsController extends Controller
{
    /**
     * @var helpers
     */
    public $helper;
    /**
     * @var Module
     */
    protected $modules;

    /**
     * ModulesController constructor.
     * @param Module $module
     * @param Upload $upload
     * @param validateUpl $v
     */
    public function __construct ()
    {
        $this->helper = new helpers();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex ()
    {
        return view('uploads::assets.index');
    }

    public function getJs (
        VersionsRepository $versionsRepository,
        VersionsService $versionsService
    )
    {
        $plugins = $versionsRepository->getJS();
        $mains = $versionsRepository->getJquery();

        return view('uploads::assets.js', compact(['plugins', 'mains']));
    }

    public function postUploadJs (
        UploadJsRequest $request,
        VersionsService $versionsService
    )
    {
        $versionsService->makeVersion($request);

        return redirect()->back()->with('message', 'File uploaded successfully');
    }

    public function postCss (
        UploadCssRequest $request,
        VersionsService $versionsService
    )
    {
        $versionsService->makeCss($request);

        return redirect()->back()->with('message', 'File uploaded successfully');
    }

    public function postUploadVersion (
        UpdateJsRequest $request,
        VersionsService $versionsService
    )
    {
        if ($request->get('type') == 'jquery') {
            $versionsService->updateJQueryVersion($request);
        } else {
            $versionsService->updateVersion($request);
        }

        return redirect()->back()->with('message', 'File uploaded successfully');
    }

    public function getVersions (
        Request $request,
        VersionsRepository $versionsRepository
    )
    {
        if (gettype($request->get("id")) == "string") {
            $data = $versionsRepository->getBy('name', $request->get('name'));
        } else {
            $data = $versionsRepository->getByExcept('name', $request->get('name'), 'id', $request->get('id'));
        }

        $html = view('uploads::assets._partials.versions', compact(['data']))->render();

        return \Response::json(['error' => false, 'html' => $html]);
    }

    public function getActiveVersions (
        Request $request,
        VersionsRepository $versionsRepository
    )
    {
        $data = $versionsRepository->getByExcept('type', "js", 'active', 0);
        $section = $request->get('section');
        $html = view('uploads::assets._partials.active_versions', compact(['data', 'section']))->render();

        return \Response::json(['error' => false, 'html' => $html]);
    }

    public function postChangeVersion (
        ChangeVersionRequest $request,
        VersionsService $versionsService
    )
    {
        $versionsService->changeVersion($request->id);

        return redirect()->back()->with('message', 'version activated');
    }

    public function postMakeActive (
        MakeActiveVersionRequest $request,
        VersionsService $versionsService
    )
    {
        $versionsService->makeActive($request->id);

        return redirect()->back()->with('message', 'version activated');
    }

    public function getCss (
        VersionsRepository $versionsRepository
    )
    {
        $frameworks = $versionsRepository->getFrameworks();
        $plugins = $versionsRepository->getCss();

        return view('uploads::assets.css', compact(['plugins', 'frameworks']));
    }

    public function getProfiles (
        VersionsRepository $versionsRepository
    )
    {
        $plugins = $versionsRepository->getBy('type', 'js');

        return view('uploads::assets.profiles', compact(['plugins']));
    }

    public function getFonts (
        VersionsRepository $versionsRepository
    )
    {
        $plugins = $versionsRepository->getBy('type', 'js');

        return view('uploads::assets.fonts', compact(['plugins']));
    }

    public function postGenerateMainJs (
        GenerateJSRequest $request,
        VersionsService $versionsService
    )
    {
        $data = $request->all();
        $versionsService->generateJS($data);

        return back()->with('message', 'JS generated successfully');
    }

    public function postUpdateLink (
        MakeActiveVersionRequest $request,
        VersionsService $versionsService
    )
    {
        $data = $request->all();
        $versionsService->updateLink($data);

        return back()->with('message', 'Link updated successfully');
    }

    public function delete (
        Request $request,
        VersionsRepository $versionsRepository,
        VersionsService $versionsService
    )
    {
        $data = $versionsRepository->findOrFail($request->get('slug'));
        $response = $versionsService->delete($data);

        return \Response::json(['success' => true, 'url' => url('/admin/uploads/assets/js')]);
    }

    public function getCode (
        Request $request,
        VersionsRepository $versionsRepository,
        VersionsService $versionsService
    )
    {
        $version = $versionsRepository->find($request->get('id'));
        if ($version) {
            $code = $versionsService->getContent($version);

            return \Response::json(['success' => true, 'code' => $code]);
        }

        return \Response::json(['success' => false, 'message' => 'Not Found']);
    }

    public function postSaveCode (
        Request $request,
        VersionsRepository $versionsRepository,
        VersionsService $versionsService
    )
    {
        $version = $versionsRepository->find($request->get('id'));
        if ($version) {
            $code = $versionsService->updateContent($version, $request->get('code'));
        }

        return redirect()->back();
    }

    public function getUnitData (
        FrontPagesRepository $frontPagesRepository,
        UnitsRepository $unitsRepository
    )
    {
        $pages = $frontPagesRepository->getAll();
        $units = $unitsRepository->getWithGroupBy();
//        BBpageAssetsOptimise();
//        dd(array_first($units)[0]);
        return view('uploads::assets.unit_data', compact(['pages', 'units']));
    }
}

