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

        if (!$request->id){
            $this->formBuilderRepository->create([
                'title' => $data['formName'],
                'description' => $data['formDescription'],
                'json_data' => $data['body'],
            ]);
        }else{
            $this->formBuilderRepository->update($request->id,[
                'title' => $data['formName'],
                'description' => $data['formDescription'],
                'json_data' => $data['body'],
            ]);
        }


        return \Response::json(['error' => false,'url' => route('application_index')]);
    }


    public function editFormField($id = null){

        $editableData = $this->formBuilderRepository->findOrFail($id);

        return view('uploads::applications.formBuilder')->with('editableData', $editableData);
    }

    public function deleteFormField($id = null){
        if ($id){
            $this->formBuilderRepository->delete($id);
        }

        return back();
    }

    public function renderFormView (){

    }

}