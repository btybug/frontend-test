<?php

namespace Btybug\FrontSite\Services;

use Btybug\btybug\Services\GeneralService;
use Btybug\FrontSite\Repository\BugsRepository;
use Btybug\FrontSite\Repository\TagsRepository;


class SocialProfileService extends GeneralService
{
    public $tagsRepository;
    public $bugsRepository;

  public function __construct(
      TagsRepository $tagsRepository,
      BugsRepository $bugsRepository
  )
  {
      $this->tagsRepository = $tagsRepository;
      $this->bugsRepository = $bugsRepository;

  }

  public function bugsSave($data,$user)
  {
        $data['user_id'] = $user->user_id;
        unset($data['_token']);
        return $this->bugsRepository->create($data);
  }

  public function bugDelete($id = null)
  {
        $this->bugsRepository->delete($id);
  }


  public function getall($user)
  {
        $bugs = $this->bugsRepository->selectByuser($user);
        return $bugs;
  }
  public function getallById($bugId)
  {
        return $this->bugsRepository->model()->find($bugId);
  }
}
