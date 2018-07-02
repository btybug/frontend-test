<?php
/**
 * Copyright (c) 2017.
 * *
 *  * Created by PhpStorm.
 *  * User: Edo
 *  * Date: 10/3/2016
 *  * Time: 10:44 PM
 *
 */

namespace Btybug\Console\Http\Controllers;

use App\Http\Controllers\Controller;
use Btybug\Console\Services\FieldService;
use Illuminate\Http\Request;

class FieldTypesController extends Controller
{
    public function getIndex()
    {
        return view('console::structure.field_types.index');
    }
}
