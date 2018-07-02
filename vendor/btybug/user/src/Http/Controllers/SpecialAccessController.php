<?php

namespace Btybug\User\Http\Controllers;


use App\Http\Controllers\Controller;
use Btybug\User\Repository\SpecialAccessRepository;
use BtyBugHook\Membership\Repository\BlogRepository;
use Illuminate\Http\Request;

class SpecialAccessController extends Controller
{
    private $blogRepository,$specialAccessRepo;

    public function __construct (
        BlogRepository $blogRepository,
        SpecialAccessRepository $specialAccessRepository
    )
    {
        $this->blogRepository = $blogRepository;
        $this->specialAccessRepo = $specialAccessRepository;
    }

    public function getIndex()
    {
        $blogs = $this->blogRepository->pluckByCondition(['status'=>true],'title','id')->toArray();
        $specials = $this->specialAccessRepo->getAll();
        return view('users::special_access.index', compact(['blogs','specials']));
    }

    public function postProducts (Request $request)
    {
        $id = $request->get('id');

        if($id){
            $blog = $this->blogRepository->find($id);

            if($blog){
                $data = \DB::table(str_replace('-', '_', $blog->slug))->get();
                return \Response::json(['error' => false,'data' => $data]);
            }
        }


        return \Response::json(['error' => true,'message' => 'blog not found']);
    }

    public function postCreate (Request $request)
    {
        $this->specialAccessRepo->create($request->except('__token'));

        return redirect()->back();
    }
}