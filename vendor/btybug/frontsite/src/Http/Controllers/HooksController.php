<?php

namespace Btybug\FrontSite\Http\Controllers;

use App\Http\Controllers\Controller;
use Btybug\btybug\Repositories\HookRepository;
use Illuminate\Http\Request;


/**
 * Class HooksController
 * @package Btybug\FrontSite\Http\Controllers
 */
class HooksController extends Controller
{
    /**
     * @param HookRepository $hookRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex(
        HookRepository $hookRepository
    )
    {
        $hooks = $hookRepository->getAll();

        return view('manage::frontend.hooks.index', compact(["hooks"]));
    }

    public function getEdit(
        $id,
        HookRepository $hookRepository
    )
    {
        $hook = $hookRepository->findOrFail($id);
        return view('manage::frontend.hooks.edit', compact(["hook"]));
    }

    public function create(HookRepository $hookRepository)
    {
        $hook = $hookRepository->model();
        return view('manage::frontend.hooks.create', compact(["hook"]));
    }

    public function createSave(HookRepository $hookRepository, Request $request)
    {
        $data = $request->except("_token");
        $create = $hookRepository->saveHook($data);
        return redirect()->route('frontsite_hooks_index');
    }

    public function saveEdit($id, HookRepository $hookRepository, Request $request)
    {
        $data = $request->except("_token");
        $update = $hookRepository->update($id, $data);
        return redirect()->route('frontsite_hooks_index');
    }

    public function remove($id, HookRepository $hookRepository)
    {
        $hook = $hookRepository->delete($id);
        return redirect()->route('frontsite_hooks_index');
    }

    public function renderBbButton(Request $request)
    {
        $repl = $request->id;
        $html = $html = \View::make('manage::frontend.hooks._partials.hook_tpl', compact('repl'))->render();
        return response()->json(["html" => $html]);
    }
}