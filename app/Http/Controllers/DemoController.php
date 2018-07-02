<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function demo(){
        return view("demo");
    }
    public function demo1(){
        return view("demo1");
    }
    public function demo2(){
        return view("demo2");
    }
    public function demo3(){
        return view("demo3");
    }
}
