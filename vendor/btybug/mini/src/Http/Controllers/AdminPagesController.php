<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 16.07.2018
 * Time: 20:57
 */

namespace Btybug\Mini\Http\Controllers;


use App\Http\Controllers\Controller;
use Btybug\Mini\Repositories\MinicmsPagesRepository;
use Illuminate\Http\Request;


class AdminPagesController extends Controller
{
    private $pageRepository;

    public function __construct(
        MinicmsPagesRepository $pagesRepository
    )
    {
        $this->pageRepository = $pagesRepository;
    }

    public function assetsPages()
    {
        $pages = $this->pageRepository->getAll();

        return view('multisite::admin.assets.pages', compact('pages'));
    }

    public function createPage(Request $request)
    {
        $data = $request->except('_token');
        return $this->pageRepository->create($data);
    }

    public function getPageEditForl(Request $request)
    {
        $model=$this->pageRepository->find($request->get('id'));
        $html=\View::make('multisite::admin.assets.page_edit_form',compact('model'))->render();
        return response()->json(['error'=>false,'html'=>$html]);
    }

    public function assetsGeneral()
    {
       return view('multisite::admin.assets.general') ;
    }
}