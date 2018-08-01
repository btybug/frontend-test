<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 04.07.2018
 * Time: 14:25
 */

namespace Btybug\Mini\Http\Controllers;


use App\Http\Controllers\Controller;
use Btybug\Mini\Generator;
use Btybug\Mini\Http\Requests\PageCreateRequest;
use Btybug\Mini\Model\MiniPainter;
use Btybug\Mini\Services\PagesService;
use Btybug\Console\Repository\FrontPagesRepository;
use Btybug\Uploads\Repository\FormBuilderRepository;
use Btybug\btybug\Models\Settings;
use Auth;
use Illuminate\Http\Request;

class ClientController extends MiniController
{
    private $formBuilderRepository;

    public function __construct(
        FormBuilderRepository $formBuilderRepository
    )
    {
        $this->formBuilderRepository = $formBuilderRepository;
    }

    public function account(Request $request)
    {
        $this->ennable($request);
        return $this->cms->run();
    }

    public function accountSettings(Request $request)
    {
        $conditions = ['type' => 'user_settings'];
        $user_forms = $this->formBuilderRepository->findAllByMultiple($conditions);
        $this->ennable($request);
        return $this->cms->accountSettings()->with('user_forms',$user_forms);
    }

    public function accountForms(Request $request)
    {
        $conditions = ['type' => 'user_settings','user_id' => Auth::user()->id];
        $user_forms = $this->formBuilderRepository->findAllByMultiple($conditions);
        $this->ennable($request);
        return $this->cms->accountForms()->with('user_forms',$user_forms);
    }


    public function accountGeneral(Request $request)
    {
        $this->ennable($request);
        return $this->cms->accountGeneral();
    }

    public function plugins(Request $request)
    {
        $this->ennable($request);
        return $this->cms->plugins();
    }

    public function pluginsSettings(Request $request)
    {
        $this->ennable($request);
        return $this->cms->pluginsSettings();
    }

    public function media(Request $request)
    {
        $this->ennable($request);
        return $this->cms->media();
    }

    public function mediaSettings(Request $request)
    {
        $this->ennable($request);
        return $this->cms->mediaSettings();
    }

    public function preferences(Request $request)
    {
        $this->ennable($request);
        return $this->cms->preferences();
    }

    public function extraPlugins(Request $request)
    {
        $this->ennable($request);
        return $this->cms->extraPlugins();
    }

    public function extraGears(Request $request)
    {
        $this->ennable($request);
        return $this->cms->extraGears();
    }

    public function editUserPage(Request $request, $id, PagesService $service, FrontPagesRepository $repository)
    {
        $service->editPage($request, $repository);
        return redirect()->back();
    }

    public function extraGearsOptimize(Request $request)
    {
        $this->ennable($request);
        MiniPainter::optimize();
        return redirect()->back();
    }

    public function extraPluginSettings(Request $request)
    {
        $this->ennable($request);
        return $this->cms->extraPluginSettings();
    }

    public function CreateForms(Request $request){
        $this->ennable($request);
        return $this->cms->accountFormBuilder();
    }

    public function FormsSave (Request $request){
            $data = $request->except('_token');
            if (!$request->id){
                $this->formBuilderRepository->create([
                    'title' => $data['formName'],
                    'description' => $data['formDescription'],
                    'form_json' => $data['body'],
                    'user_id' => Auth::user()->id,
                    'type' => 'user_settings'
                ]);
            }else{
                $this->formBuilderRepository->update($request->id,[
                    'title' => $data['formName'],
                    'description' => $data['formDescription'],
                    'form_json' => $data['body'],
                ]);
            }

            $this->ennable($request);
            return $this->cms->FormSave();
    }


    public function accountFormsEdit(Request $request,$id = null){
        $editableData = $this->formBuilderRepository->findOrFail($id);
        $this->ennable($request);
        return $this->cms->FormEdit($editableData);



    }

    public function accountFormsDelete(Request $request,$id = null){

        $this->formBuilderRepository->delete($id);
        return back();
    }

    public function accountFormsRender(Request $request,$id = null){
        $editableData = $this->formBuilderRepository->findOrFail($id);
        $this->ennable($request);
        return $this->cms->FormRender($editableData);
    }



}