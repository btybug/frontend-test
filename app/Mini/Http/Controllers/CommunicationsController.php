<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 05.07.2018
 * Time: 21:28
 */

namespace App\Mini\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

 class CommunicationsController extends MiniController
{
     protected $cms;
     protected $user;

     public function messages(Request $request)
     {
         $this->ennable($request);
         return $this->cms->CCMessages();
     }

     public function createMessages(Request $request)
     {
         $this->ennable($request);
         return $this->cms->CCMessageCreate();
     }

     public function viewMessage($id,Request $request)
     {
         $this->ennable($request);
         return $this->cms->CCMessageView($id);
     }

     public function notifications(Request $request)
     {
         $this->ennable($request);
         return $this->cms->CCNotifications();
     }

     public function reviews(Request $request)
     {
         $this->ennable($request);
         return $this->cms->CCReviews();
     }
}