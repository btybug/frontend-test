<?php

namespace Btybug\Uploads\Http\Controllers;

use Btybug\Console\Models\QueryBuilder;
use Btybug\Uploads\Repository\AppProductRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Symfony\Component\Console\Tests\Input\StringInput;

class GeneralApiController extends Controller
{
    public function getCustomized (
        Request $request,
        AppProductRepository $appProductRepository,
        QueryBuilder $builder
    )
    {
        $token = $request->get('token');
        $product = $appProductRepository->findBy('token', $token);

        try {
            $query = $builder->make($product->json_data);
            $result = \DB::select($query);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => 'Something wrong in query, try again',
                'error'   => true
            ], 200);
        }

        return response()->json([
            'data'  => $result,
            'error' => false
        ], 200);
    }
}