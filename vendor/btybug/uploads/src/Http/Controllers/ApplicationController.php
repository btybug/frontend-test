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
        return view('uploads::applications.index');
    }

    public function getFormBuilder ()
    {
        return view('uploads::applications.formBuilder');
    }

    public function saveBuildedForm (Request $request)
    {
        $title = $request->formName;
        $description = $request->formDescription;
        $jsonData  = $request->body;
        $this->formBuilderRepository->model()->title = $title;
        $this->formBuilderRepository->model()->description = $description;
        $this->formBuilderRepository->model()->json_data = $jsonData;
        $this->formBuilderRepository->model()->save();
        $data = $this->formBuilderRepository->model()->getAll();
        return view('uploads::applications.index');
    }
}