<?php

namespace Btybug\FrontSite\Services;

use Btybug\btybug\Services\GeneralService;
use Btybug\FrontSite\Repository\ScoreRepository;
use Btybug\FrontSite\Repository\TagsRepository;
use Btybug\FrontSite\Repository\BugTagsRepository;
use Btybug\User\Repository\UserRepository;

class ScoreService extends GeneralService
{
    public $tagsRepository;
    public $userRepository;
    public $scoreRepository;

  public function __construct(
      TagsRepository $tagsRepository,
      UserRepository $userRepository,
      ScoreRepository $scoreRepository
  )
  {
      $this->tagsRepository = $tagsRepository;
      $this->userRepository = $userRepository;
      $this->scoreRepository = $scoreRepository;
  }

    public function doScore($symbol,$bugs_id)
    {
        $number = $symbol . '1';
        $user = $this->userRepository->find(\Auth::id());
        $result = $this->scoreRepository->updateOrCreate(['user_id' => $user->id,'bugs_id' => $bugs_id],['ip_address'=> get_client_ip(),'like_or_dislike' => $number]);

        if($result){
            $bugs = $user->bugits()->orderBy('created_at', 'DESC')->get();
            $html = \View::make('manage::frontend.pages._partials.bug_render', compact(['user','bugs']))->render();

            return \Response::json(['error' => false,'html' =>$html]);
        }else{
            return \Response::json(['error' => true,'message' =>"Unable to do score !!!"]);
        }
    }
}
