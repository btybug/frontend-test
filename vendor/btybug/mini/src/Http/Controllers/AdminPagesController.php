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
}