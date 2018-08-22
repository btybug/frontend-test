<?php

namespace Btybug\FrontSite\Services;

use Btybug\btybug\Services\GeneralService;
use Btybug\FrontSite\Repository\TagsRepository;

class TagsService extends GeneralService
{
    public $tagsRepository;

    public function __construct(
        TagsRepository $tagsRepository
    )
    {
        $this->tagsRepository = $tagsRepository;
    }

    public function tagsSave($data)
    {
        $data = explode(',', $data);
        if (count($data)) {
            foreach ($data as $tag) {
                $this->tagsRepository->create(['name' => $tag, 'type' => 'minicms']);
            }
        }
    }

}
