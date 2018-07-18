<?php

namespace Btybug\FrontSite\Http\Controllers;

use App\Http\Controllers\Controller;
use Btybug\btybug\Repositories\HookRepository;
use Btybug\FrontSite\Repository\TagsRepository;
use Illuminate\Http\Request;


/**
 * Class HooksController
 * @package Btybug\FrontSite\Http\Controllers
 */
class TagsController extends Controller
{
    private $tagsRepository;

    public function __construct (
        TagsRepository $tagsRepository
    )
    {
        $this->tagsRepository = $tagsRepository;
    }

    public function getTags()
    {
        $tags = $this->tagsRepository->pluck('name', 'name')->toArray();

        return $tags;
    }

}