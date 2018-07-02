<?php

namespace Btybug\User\Http\Controllers;


use App\Http\Controllers\Controller;
use Btybug\User\Repository\MembershipRepository;
use Btybug\User\Services\PermissionService;
use Illuminate\Http\Request;
use Btybug\User\Http\Requests\Membership\CreateMembershipRequest;

class MembershipController extends Controller
{
    private $membershipRepository;
    private $permissionService;

    public function __construct(MembershipRepository $membershipRepository, PermissionService $permissionService)
    {
        $this->membershipRepository = $membershipRepository;
        $this->permissionService = $permissionService;
    }

    public function getIndex()
    {
        $memberships = $this->membershipRepository->getAll();
        return view('users::membership.index', compact(['memberships']));
    }

    public function getCreate()
    {
        return view('users::membership.create');
    }

    public function postCreate(CreateMembershipRequest $request)
    {
        $data = $request->except('_token');
        $this->membershipRepository->create($data);
        return redirect()->route('user_membership_index')->with('message', 'Membership has been created successfully');
    }

    public function getEdit(Request $request,$id)
    {
        $membership = $this->membershipRepository->findOrFail($id);

        return view('users::membership.edit', compact('membership'));
    }

    public function postEdit(Request $request,$id)
    {
        $membership = $this->membershipRepository->findOrFail($id);

        $data = $request->except('_token');
        $rules = array_merge([
            'name' => 'required|max:100',
            'slug' => 'required|max:255|unique:memberships,slug,' . $membership->id . ",id",
        ]);
        $validator = \Validator::make($data, $rules);
        if ($validator->fails()) return redirect()->back()->with('errors', $validator->errors());

        $membership->update($data);
        return redirect()->route('user_membership_index')->with('message', 'Membership has been updated successfully');
    }

    public function postDelete(Request $request)
    {
        $result = false;
        if ($request->slug) {
            $result = $this->membershipRepository->deleteByCondition('id',$request->slug);
        }
        return \Response::json(['success' => $result]);
    }

    public function getPermissions($slug)
    {
        $role = Roles::where('slug', $slug)->first();

        if (!$role) abort(404);

        $dataFront = FrontendPage::where('parent_id', NULL)->groupBy("module_id")->get();

        return view("users::membership.permissions", compact(['role', 'dataFront', 'slug']));
    }

    public function postPermissions(Request $request)
    {
        $data = $request->except('_token');
        $html = $this->permissionService->membershipPermission($data);
        return \Response::json(['error' => false, 'html' => $html]);
    }
}