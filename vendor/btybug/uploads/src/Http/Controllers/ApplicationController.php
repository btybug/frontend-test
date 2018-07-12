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


    public function getFormBuilder (Request $request)
    {
        $title = $request->title;
        $description = $request->description;
        $jsonData  = $request->jsonData;
        $formBuilderRepository->model()->title = $title;
        $formBuilderRepository->model()->description = $description;
        $formBuilderRepository->model()->json_data = $jsonData;
        $data = ['title'=> $title,'description'=> $description,'jsonData' => $jsonData];
        return view('uploads::applications.index',$data);
    }
}