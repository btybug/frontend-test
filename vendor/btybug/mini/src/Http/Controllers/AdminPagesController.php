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


class AdminPagesController extends Controller
{
    public function assetsPages (MinicmsPagesRepository $pagesRepository)
    {
        $pages = $pagesRepository->getAll();

        return view('multisite::admin.assets.pages', compact('pages'));

    }

    public function createPage (Request $request, MinicmsPagesRepository $pagesRepository)
    {
        $data = $request->except('_token');
        return $pagesRepository->create($data);
    }
}