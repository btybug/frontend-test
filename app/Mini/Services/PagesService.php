<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 07.07.2018
 * Time: 20:31
 */

namespace App\Mini\Services;


use Illuminate\Http\Request;

class PagesService
{
    public function editPage(Request $request,$repository)
    {
        $page=$repository->findOrFail($request->id);
        if(\Auth::id()!=$page->user_id)abort(404);

        $data=$request->except('_token');
        foreach ($data as $key=>$value){
            if(is_null($value)){
                unset($data[$key]);
            }
        }
        $page->update($data);
    }
}