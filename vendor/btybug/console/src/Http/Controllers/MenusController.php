<?php namespace Btybug\Console\Http\Controllers;

use App\Http\Controllers\Controller;
use Btybug\btybug\Repositories\MenuRepository;
use Btybug\Console\Http\Requests\Structure\MenuCreateRequest;
use Btybug\Console\Http\Requests\Structure\MenuDeleteRequest;
use Btybug\Console\Http\Requests\Structure\MenuEditRequest;
use Btybug\Console\Repository\AdminPagesRepository;
use Btybug\Console\Services\StructureService;
use Btybug\User\Repository\RoleRepository;


class MenusController extends Controller
{
    public function getIndex(
        RoleRepository $roleRepository,
        MenuRepository $menuRepository
    )
    {
        $menus = $menuRepository->getWhereNotPlugins();
        $core_menus = \Config::get('admin_menus');
        return view('console::structure.menus.index', compact(['menus','core_menus']));
    }

    public function postCreate(
        MenuCreateRequest $request,
        MenuRepository $menuRepository
    )
    {
        $menuRepository->create([
            'name' => $request->name,
            'creator_id' => \Auth::id(),
            'type' => 'custom',
        ]);

        return back()->with('message', "menu successfully created");
    }

    public function postDelete(
        MenuDeleteRequest $request,
        MenuRepository $menuRepository
    )
    {
        $result = $menuRepository->findOrFail($request->slug);
        $success = $result->delete();
        return \Response::json(['success' => $success, 'url' => url('admin/console/structure/menus')]);
    }

    public function getEdit(
        $id, $slug,
        MenuRepository $menuRepository,
        AdminPagesRepository $adminPagesRepository,
        RoleRepository $roleRepository,
        StructureService $structureService
    )
    {
        $menu = $menuRepository->findOrFail($id);
        $pageGrouped = $adminPagesRepository->getGroupedWithModule();
        $roles = $roleRepository->getAllWithGuest();
        return view('console::structure.menus.edit', compact(['pageGrouped', 'menu', 'roles']));
    }

    public function getView(
        $id, $slug,
        MenuRepository $menuRepository,
        AdminPagesRepository $adminPagesRepository,
        RoleRepository $roleRepository,
        StructureService $structureService
    )
    {
        if($id==2){
            $menu = \Config::get('admin_menus',[]);
//            dd($menu);
            return view('console::structure.menus.hook_menus',compact('menu'));
        }
        if($slug=='hook'){
            $core_menus = \Config::get('admin_menus',[]);
            if(!isset($core_menus[$id]))abort(404);
            $menu=$core_menus[$id];
            return view('console::structure.menus.hook_menus',compact('menu'));
        }else{
            $children = true;
            $menu = $menuRepository->findOrFail($id);
            $page = $adminPagesRepository->first();
            $pageGrouped = $adminPagesRepository->getGroupedWithModule();
            $role = $roleRepository->findBy('slug', $slug);
            $data = $structureService->getMenuItems($menu, $role);
        }

        return view('console::structure.menus.view', compact(['pageGrouped', 'page', 'slug', 'children', 'data', 'menu']));
    }

    public function postEdit(
        $id, $slug,
        MenuEditRequest $request,
        StructureService $structureService,
        MenuRepository $menuRepository,
        RoleRepository $roleRepository
    )
    {
        $menu = $menuRepository->find($id);
        $role = $roleRepository->findBy('slug', $slug);
        $structureService->saveMenu($menu, $request);

        return redirect()->to('admin/console/structure/menus');
    }

}