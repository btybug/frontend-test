<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 07.07.2018
 * Time: 20:31
 */

namespace App\Mini\Services;


use Btybug\Console\Repository\FrontPagesRepository;
use Illuminate\Http\Request;

class PagesService
{
    private $pagesRepositroy;

    public function __construct(
        FrontPagesRepository $frontPagesRepository
    )
    {
        $this->pagesRepositroy = $frontPagesRepository;
    }

    public function editPage(Request $request)
    {
        $page = $this->pagesRepositroy->findOrFail($request->id);
        if(\Auth::id()!=$page->user_id)abort(404);

        $data=$request->except('_token');
        foreach ($data as $key=>$value){
            if(is_null($value)){
                unset($data[$key]);
            }
        }
        $page->update($data);
    }

    public function saveSort($data){
        foreach ($data as $sorting => $id ){
            $this->pagesRepositroy->updatePageSort($id,\Auth::id(),$sorting);
        }
    }
}