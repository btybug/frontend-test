<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 29.03.2018
 * Time: 16:54
 */

namespace Btybug\Console\Http\Controllers\API;


use Btybug\Console\Repository\OauthClientProductsRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class OauthClientProductsController extends Controller
{
    public function onOff(Request $request,OauthClientProductsRepository $repository)
    {
        $result= $repository->onOff($request->get('client_id'),$request->get('product_id'));
        return response()->json(['error'=>!(bool)$result,'data'=>$result]);
    }
}