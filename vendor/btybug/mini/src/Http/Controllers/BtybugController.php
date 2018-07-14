<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 05.07.2018
 * Time: 21:28
 */

namespace Btybug\Mini\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

 class BtybugController extends MiniController
{
     protected $cms;
     protected $user;

     public function cv(Request $request)
     {
         $this->ennable($request);
         return $this->cms->BtyCv();
     }

     public function jobs(Request $request)
     {
         $this->ennable($request);
         return $this->cms->BtyJobs();
     }

     public function market(Request $request)
     {
         $this->ennable($request);
         return $this->cms->BtyMarket();
     }

     public function blog(Request $request)
     {
         $this->ennable($request);
         return $this->cms->BtyBlog();
     }
}