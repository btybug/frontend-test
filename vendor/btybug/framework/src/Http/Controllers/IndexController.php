<?php

namespace Btybug\Framework\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Btybug\Framework\Http\Requests\ChangeVersionRequest;
use Btybug\Framework\Http\Requests\GenerateJSRequest;
use Btybug\Framework\Http\Requests\MakeActiveVersionRequest;
use Btybug\Framework\Http\Requests\UpdateJsRequest;
use Btybug\Framework\Http\Requests\UploadCssRequest;
use Btybug\Framework\Http\Requests\UploadJsRequest;
use Btybug\Framework\Repository\VersionsRepository;
use Btybug\Framework\Services\VersionsService;

/**
 * Class SystemController
 * @package App\Modules\Settings\Http\Controllers
 */
class IndexController extends Controller
{
    public function getIndex()
    {
        return view('framework::versions.index', compact(['versions']));
    }

    public function getJs(
        VersionsRepository $versionsRepository,
        VersionsService $versionsService
    )
    {
        $plugins = $versionsRepository->getJS();
        $jquery = $versionsService->getJqueryVersions();

        return view('framework::versions.assets.js', compact(['plugins','jquery']));
    }

    public function postUploadJs(
        UploadJsRequest $request,
        VersionsService $versionsService
    )
    {
        $versionsService->makeVersion($request);

        return redirect()->back()->with('message', 'File uploaded successfully');
    }

    public function postCss(
        UploadCssRequest $request,
        VersionsService $versionsService
    )
    {
        $versionsService->makeCss($request);

        return redirect()->back()->with('message', 'File uploaded successfully');
    }

    public function postUploadVersion(
        UpdateJsRequest $request,
        VersionsService $versionsService
    )
    {
        if($request->get('type') == 'jquery'){
            $versionsService->updateJQueryVersion($request);
        }else{
            $versionsService->updateVersion($request);
        }
        return redirect()->back()->with('message', 'File uploaded successfully');
    }

    public function getVersions(
        Request $request,
        VersionsRepository $versionsRepository
    )
    {
        if(gettype($request->get("id")) == "string"){
            $data = $versionsRepository->getBy('name', $request->get('name'));
        }else{
            $data = $versionsRepository->getByExcept('name', $request->get('name'), 'id', $request->get('id'));
        }

        $html = view('framework::versions._partials.versions', compact(['data']))->render();

        return \Response::json(['error' => false, 'html' => $html]);
    }

    public function getActiveVersions(
        Request $request,
        VersionsRepository $versionsRepository
    )
    {
        $data = $versionsRepository->getByExcept('type', "js", 'active', 0);
        $section = $request->get('section');
        $html = view('framework::versions._partials.active_versions', compact(['data', 'section']))->render();

        return \Response::json(['error' => false, 'html' => $html]);
    }

    public function postChangeVersion(
        ChangeVersionRequest $request,
        VersionsService $versionsService
    )
    {
        $versionsService->changeVersion($request->id);
        return redirect()->back()->with('message', 'version activated');
    }

    public function postMakeActive(
        MakeActiveVersionRequest $request,
        VersionsService $versionsService
    )
    {
        $versionsService->makeActive($request->id);

        return redirect()->back()->with('message', 'version activated');
    }

    public function getCss(
        VersionsRepository $versionsRepository
    )
    {
        $plugins = $versionsRepository->getCss();
        return view('framework::versions.assets.css', compact(['plugins']));
    }

    public function getProfiles(
        VersionsRepository $versionsRepository
    )
    {
        $plugins = $versionsRepository->getBy('type', 'js');
        return view('framework::versions.assets.profiles', compact(['plugins']));
    }

    public function getFonts(
        VersionsRepository $versionsRepository
    )
    {
        $plugins = $versionsRepository->getBy('type', 'js');
        return view('framework::versions.assets.fonts', compact(['plugins']));
    }

    public function postGenerateMainJs(
        GenerateJSRequest $request,
        VersionsService $versionsService
    )
    {
        $data = $request->all();
        $versionsService->generateJS($data);

        return back()->with('message', 'JS generated successfully');
    }

    public function postUpdateLink(
        MakeActiveVersionRequest $request,
        VersionsService $versionsService
    )
    {
        $data = $request->all();
        $versionsService->updateLink($data);

        return back()->with('message', 'Link updated successfully');
    }

    public function delete(
        Request $request,
        VersionsRepository $versionsRepository,
        VersionsService $versionsService
    )
    {
        $data = $versionsRepository->findOrFail($request->get('slug'));
        $response = $versionsService->delete($data);
        return \Response::json(['success' => true, 'url' => url('/admin/framework/js')]);
    }
}
