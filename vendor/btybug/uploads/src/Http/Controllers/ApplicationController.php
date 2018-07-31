<?php
/**
 * Copyright (c) 2017. All rights Reserved BtyBug TEAM
 */

namespace Btybug\Uploads\Http\Controllers;


use Btybug\Uploads\Repository\FormBuilderRepository;
use Btybug\Uploads\Repository\StudiosReposiory;
use Btybug\Uploads\Repository\UnitStudioRepository;
use Btybug\Uploads\Services\AppsService;
use Btybug\btybug\Helpers\helpers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Symfony\Component\Console\Tests\Input\StringInput;

class ApplicationController extends Controller
{
    private $formBuilderRepository;
    private $studioRepository;
    private $unitStudioRepository;
    private $data = [];

    public function __construct(
        FormBuilderRepository $formBuilderRepository,
        StudiosReposiory $studiosReposiory,
        UnitStudioRepository $unitStudioRepository
    )
    {
        $this->formBuilderRepository = $formBuilderRepository;
        $this->studioRepository = $studiosReposiory;
        $this->unitStudioRepository = $unitStudioRepository;
    }

    public function getIndex ($slug = null)
    {
        $studiosData = $this->studioRepository->getAll();
        $unitdata = $this->unitStudioRepository->getAll();
        if ($slug && $slug == 'formbuilder'){
            $conditions = ['type' => null];
            $this->data = $this->formBuilderRepository->findAllByMultiple($conditions);
            return view('uploads::applications.index')->with(['allData' => $this->data,'studiosData' => $studiosData,'slug' => $slug]);

        }elseif ($slug && $slug == 'unitstudio'){
            return view('uploads::applications.index')->with(['unitData' => $unitdata,'slug' => $slug,'studiosData' => $studiosData]);
        }
        return view('uploads::applications.index')->with(['studiosData' => $studiosData,'slug' => $slug]);

    }

    public function getFormBuilder ()
    {
        return view('uploads::applications.formBuilder');
    }

    public function saveBuildedForm (Request $request)
    {

       if(!$request->formTarget){
           $data = $request->except('_token');

           if (!$request->id){
               $this->formBuilderRepository->create([
                   'title' => $data['formName'],
                   'description' => $data['formDescription'],
                   'form_json' => $data['body'],
                   'type' => null
               ]);
           }else{
               $this->formBuilderRepository->update($request->id,[
                   'title' => $data['formName'],
                   'description' => $data['formDescription'],
                   'form_json' => $data['body'],
                   'type' => null
               ]);
           }
           $routeSlug = 'formbuilder';

           return \Response::json(['error' => false,'url' => route('application_index',$routeSlug)]);
       }else{
           $data = $request->except('_token');
           if (!$request->id){
               $this->formBuilderRepository->create([
                   'title' => $data['formName'],
                   'description' => $data['formDescription'],
                   'form_json' => $data['body'],
                   'type' => 'user_settings'
               ]);
           }else{
               $this->formBuilderRepository->update($request->id,[
                   'title' => $data['formName'],
                   'description' => $data['formDescription'],
                   'form_json' => $data['body'],
                   'type' => null
               ]);
           }


           return \Response::json(['error' => false,'url' => route('mini_admin_assets_forms')]);

       }

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

    public function renderFormView ($id = null){
        $editableData = $this->formBuilderRepository->findOrFail($id);
        return view('uploads::applications.formRender')->with('editableData', $editableData);
    }


    //////////////////////////////////////////// UNITS //////////////////////////////////////////////////////

    public function getUnitStudio()
    {
        return view('uploads::applications.unitstudio.studio');
    }


    public function saveUnitStudio(Request $request){
        try{
            $this->unitStudioRepository->create($request->all());
        }catch (\Exception $exception){
            return \Response::json(['error' => true,'message' => $exception->getMessage()]);
        }

       return \Response::json(['error' => false,'message' => 'unit created successfully !!!']);
    }


    public function editUnitStudio($id = null){
        $data = $this->unitStudioRepository->findOrFail($id);

        return view('uploads::applications.unitstudio.studio')->with('allData',$data);
    }

    public function editUnitStudioChanges(Request $request){
        $id=$request->exist;
        $data = $request->except('exist');
        try{
            $this->unitStudioRepository->update($id,$data);
        }catch (\Exception $exception){
            return \Response::json(['error' => true,'message' => $exception->getMessage()]);
        }

        return \Response::json(['error' => false,'message' => 'unit updated successfully !!!']);

    }

    public function deleteUnitStudio($id = null){
        if ($id){
            $this->unitStudioRepository->delete($id);
        }
        return back();
    }


    public function viewRenderUnitStudio($id = null)
    {
        $unitStudiData = $this->unitStudioRepository->findOrFail($id);
        return view('uploads::applications.unitstudio.studio')->with('allData',$unitStudiData);
    }


}