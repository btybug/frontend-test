<?php
/**
 * Created by PhpStorm.
 * User: Arakelyan
 * Date: 31-Jul-17
 * Time: 18:11
 */

namespace Btybug\FrontSite\Services;

use Btybug\btybug\Services\GeneralService;
use Btybug\Console\Repository\FrontPagesRepository;
use Btybug\FrontSite\Repository\ClassifierItemPageRepository;
use Btybug\FrontSite\Repository\ClassifierItemRepository;
use Btybug\FrontSite\Repository\ClassifierRepository;

class ClassifierService extends GeneralService
{
    private $classifierRepository;
    private $classifierItemRepository;
    private $classifierItemPageRepository;
    private $frontPagesRepository;
    const CLASSIFY_PREFIX = 'f';

    public function __construct (
        ClassifierRepository $classifierRepository,
        ClassifierItemRepository $classifierItemRepository,
        ClassifierItemPageRepository $classifierItemPageRepository,
        FrontPagesRepository $frontPagesRepository
    )
    {
        $this->classifierRepository = $classifierRepository;
        $this->classifierItemRepository = $classifierItemRepository;
        $this->classifierItemPageRepository = $classifierItemPageRepository;
        $this->frontPagesRepository = $frontPagesRepository;

    }

    public function save (array $data)
    {
        $response = $this->classifierRepository->create($data + ['id' => uniqid()]);
        //was generated main page
//        if($response) {
//            $this->generateFrontPage($response);
//        }
        return ($response) ? $response->id : null;
    }

    public function delete ($id)
    {
        $deleted = false;
        $response = $this->classifierRepository->findBy('id', $id);
        if ($response) $deleted = $response->delete();

        return $deleted;
    }

    public function getClassifierPageRelations (int $pageId)
    {
        return $this->classifierItemPageRepository
            ->model()
            ->where('front_page_id', $pageId)
            ->groupBy('classifier_id')
            ->get();
    }

    public function classifierItems ()
    {
        return $this->classifierRepository
            ->model()
            ->classifierItem()
            ->pluck('title', 'id')
            ->toArray();
    }

    public function generateItems ($id, $data)
    {
        $model = $this->classifierRepository->findBy('id', $id);
        if ($model && $data) {
            $this->cleanItems($model->id);
            $this->addItems(json_decode($data, true), 0, $model->id);
        }
    }

    private function cleanItems ($classifier_id)
    {
        $this->classifierItemRepository->deleteByCondition('classifier_id', $classifier_id);
    }

    private function addItems ($data, $parent, $classifier_id, $i = 0)
    {
        if (count($data)) {
            $item = $data[$i];
            $new = $this->classifierItemRepository->create([
                'id'            => $item['id'],
                'title'         => $item['title'],
                'icon'          => $item['icon'],
                'parent_id'     => $parent,
                'classifier_id' => $classifier_id,
                'image'   => $item['image'],
                'description'       => $item['description']
            ]);

//            ($new->informative) ? $this->generateFrontPage($new,"informative") : $this->deletePage($new,"informative");

            if (isset($item['children']) && $new) {
                $this->addItems($item['children'], $new->id, $classifier_id, 0);
            }

            $i++;
            if (isset($data[$i])) {
                $this->addItems($data, $parent, $classifier_id, $i);
            }
        }
    }

    public function loadItems ($id, bool $json = false, array $columns = ['*'])
    {
        $data = $this->classifierItemRepository->model()->select($columns)->
        with('children')
            ->where('parent_id', 0)
            ->where('classifier_id', $id)
            ->get();

        return ($json) ? json_encode($data, true) : $data;
    }

    public function generateFrontPage ($classify,$classify_type = null)
    {
        $prefix = "/".self::CLASSIFY_PREFIX."/";
        if($classify->parent_id){
            $parentPage = $this->frontPagesRepository->findBy('slug', $classify->parent_id);
            if($parentPage) $prefix = $parentPage->url .'/';
        }

        if(! $classify->parent_id && isset($classify->classifier_id)){
            $parentPage = $this->frontPagesRepository->findBy('slug', $classify->classifier_id);
            if($parentPage) $prefix = $parentPage->url .'/';
        }

        $slug = $classify->id;
        $title = $classify->title;
        $url = $prefix.str_slug($classify->title);
        if($classify_type) {
            $slug = $slug.".".$classify_type;
            $title = $title." ".$classify_type;
        }
        $editPage = $this->frontPagesRepository->findBy('slug', $slug);
        if($editPage){
            $editPage->update([
                'title' => $title,
                'url' => $url,
                'user_id' => \Auth::id(),
                'parent_id' => (isset($parentPage) && $parentPage) ? $parentPage->id : null
            ]);
        }else{
            $this->frontPagesRepository->create([
                'title' => $title,
                'slug' => $slug,
                'url' => $url,
                'user_id' => \Auth::id(),
                'status' => "published",
                'type' => "core",
                'content_type' => "template",
                'parent_id' => (isset($parentPage) && $parentPage) ? $parentPage->id : null
            ]);
        }
    }

    public function deletePage ($classify,$classify_type)
    {
        $page = $this->frontPagesRepository->findBy('slug', $classify->id.".".$classify_type);
        if($page) $page->delete();
    }
}