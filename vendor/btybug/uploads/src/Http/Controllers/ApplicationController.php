<?php
/**
 * Copyright (c) 2017. All rights Reserved BtyBug TEAM
 */

namespace Btybug\Uploads\Http\Controllers;


use Btybug\Uploads\Repository\FormBuilderRepository;
use Btybug\Uploads\Services\AppsService;
use Btybug\btybug\Helpers\helpers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Symfony\Component\Console\Tests\Input\StringInput;

class ApplicationController extends Controller
{
    private $formBuilderRepository;

    public function __construct(FormBuilderRepository $formBuilderRepository)
    {
        $this->formBuilderRepository = $formBuilderRepository;
    }

    public function getIndex ()
    {
        $allData = $this->formBuilderRepository->getAll();

        return view('uploads::applications.index')->with('allData',$allData);
    }

    public function getFormBuilder ()
    {
        return view('uploads::applications.formBuilder');
    }

    public function saveBuildedForm (Request $request)
    {
        $data = $request->except('_token');
        $this->formBuilderRepository->create([
            'title' => $data['formName'],
            'description' => $data['formDescription'],
            'json_data' => $data['body'],
        ]);
        return \Response::json(['error' => false,'url' => route('application_index')]);
    }

    public function editFormField($id = null){
        $allData = $this->formBuilderRepository->getAll();
        if ($id){
            $editableData = $this->formBuilderRepository->find($id);
        }
        return view('uploads::applications.index')->with(['editableData' => $editableData,'allData' => $allData]);
    }

    public function deleteFormField($id = null){
        if ($id){
            $this->formBuilderRepository->delete($id);
        }

        return back();
    }

}