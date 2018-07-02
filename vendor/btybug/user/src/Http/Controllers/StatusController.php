<?php
/**
 * Created by PhpStorm.
 * User: Ara Arakelyan
 * Date: 6/13/2017
 * Time: 11:58 AM
 */

namespace Btybug\User\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Btybug\User\Http\Requests\Status\CreateStatusRequest;
use Btybug\User\Http\Requests\Status\EditStatusRequest;
use Btybug\User\Repository\StatusRepository;

class StatusController extends Controller
{
    public $statusRepository;

    public function __construct(StatusRepository $statusRepository)
    {
        $this->$statusRepository = $statusRepository;
    }


    public function getIndex()
    {
        $statuses = $this->statusRepository->getAll();
        return view('users::status.index', compact(['statuses']));
    }

    public function getCreate()
    {
        return view('users::status.create');
    }

    public function postCreate(CreateStatusRequest $request)
    {
        $requestData = $request->except('_token');
        $this->statusRepository->create($requestData);
        return redirect('/admin/users/roles/statuses')->with('message', 'Status has been created successfully');
    }

    public function getEdit(Request $request)
    {
        $status = $this->statusRepository->find($request->id);
        if (!$status) {
            abort(404);
        }
        return view('users::status.edit', compact('status'));
    }

    public function postEdit(EditStatusRequest $request)
    {
        $status = $this->statusRepository->find($request->id);
        if (!$status) {
            abort(404);
        }
        $requestData = $request->except('_token');
        $this->statusRepository->update($request->id, $requestData);
        return redirect('/admin/users/roles/statuses')->with('message', 'Status has been updated successfully');
    }

    public function postDelete(Request $request)
    {
        $status = $this->statusRepository->findOneByMultiple([
            'id' => $request->slug,
            'is_core' => 0
        ]);
        $success = $status && $this->statusRepository->delete($status->id) ? true : false;
        return \Response::json(['success' => $success]);
    }

}