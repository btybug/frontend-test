<?php

namespace Btybug\FrontSite\Services;

use Btybug\btybug\Services\GeneralService;
use Btybug\FrontSite\Repository\TagsRepository;
use Btybug\FrontSite\Repository\BugTagsRepository;

class TagsService extends GeneralService
{
    public $tagsRepository;
    public $bugTagsRepository;

  public function __construct(
      TagsRepository $tagsRepository,
      BugTagsRepository $bugTagsRepository
  )
  {
      $this->tagsRepository = $tagsRepository;
      $this->bugTagsRepository = $bugTagsRepository;
  }

  public function tagsSave($data,$bugId)
  {
      if ($data)
      {
          $data = explode(',', $data);
          if (count($data))
          {
              foreach ($data as $tag)
              {
                  $tagged = $this->tagsRepository->create(['name' => $tag, 'type' => 'minicms']);
                  if ($tagged['id'])
                  {
                      $this->bugTagsRepository->create(['bug_id' => $bugId,'tag_id' => $tagged['id']]);
                  }else{
                      $isTagged = $this->tagsRepository->model()->where('name',$tag)->first();
                      $this->bugTagsRepository->create(['bug_id' => $bugId,'tag_id' => $isTagged->id]);
                  }

              }
          }
      }


  }

  public function tagIdGet($name = null)
  {
     return $id =  $tagged = $this->tagsRepository->model()->where('name',$name)->pluck('id');
  }
  public function bugIdGet($tagId = null)
  {
     return $this->bugTagsRepository->model()->where('tag_id',$tagId)->pluck('bug_id');
  }
}
