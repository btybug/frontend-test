<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 07.07.2018
 * Time: 20:31
 */

namespace Btybug\Mini\Services;


use Btybug\Console\Repository\FrontPagesRepository;
use Btybug\Mini\Generator;
use Btybug\Mini\Repositories\MinicmsPagesRepository;
use Btybug\User\Repository\UserRepository;
use Illuminate\Http\Request;

class PagesService
{
    private $pagesRepositroy;
    private $minicmsPagesRepository;
    private $userRepository;

    public function __construct(
        FrontPagesRepository $frontPagesRepository,
        MinicmsPagesRepository $minicmsPagesRepository,
        UserRepository $userRepository
    )
    {
        $this->pagesRepositroy = $frontPagesRepository;
        $this->minicmsPagesRepository = $minicmsPagesRepository;
        $this->userRepository = $userRepository;
    }

    public function editPage(Request $request)
    {
        $page = $this->pagesRepositroy->findOrFail($request->id);
        if (\Auth::id() != $page->user_id) abort(404);

        $data = $request->except('_token');
        foreach ($data as $key => $value) {
            if (is_null($value)) {
                unset($data[$key]);
            }
        }
        $page->update($data);
    }

    public function saveSort($data)
    {
        foreach ($data as $sorting => $id) {
            $this->pagesRepositroy->updatePageSort($id, \Auth::id(), $sorting);
        }
    }

    public function create($data)
    {
        $data['page_layout'] = ($data['layout'] == 0) ? null : $data['page_layout'];
        $data['header_unit'] = ($data['header'] == 2) ? $data['header_unit'] : null;
        $page= $this->minicmsPagesRepository->create($data);
        if($page->status=='published'){
            $this->pageOptimize($page->id);
        }
        return $page;
    }

    public function pageOptimize(int $id)
    {
        $page = $this->minicmsPagesRepository->findOrFail($id);
        $users = $this->userRepository->findAllByMultiple(['role_id' => 0]);
        foreach ($users as $user) {
            if ($user->frontPages()->where('mini_page_id', $id)->exists()) {
                 $user->frontPages()->where('mini_page_id', $id)->update(['status'=>$page->status]);
            } else {
                 $this->clonePage($page, $user);
            };
        }
    }

    public function clonePage($corePage, $user)
    {
        $url = ($corePage->url == null or $corePage->url == '/') ? '/' . $user->username : '/' . $user->username . '/' . $corePage->url;
        $data = [
            'title' => $corePage->title,
            'url' => $url,
            'user_id' => $user->id,
            'status' => 'published',
            'page_access' => 0,
            'slug' => str_slug($corePage->title . $user->id),
            'type' => 'core',
            'render_method' => true,
            'content_type' => 'template',
            'template' => $corePage->template,
            'module_id' => 'btybug/mini',
            'page_layout' => $corePage->page_layout,
            'header' => $corePage->header,
            'header_unit' => $corePage->header_unit,
            'mini_page_id' => $corePage->id,
            'tags' => $corePage->tags,
            'css_type' => Generator::DEFAULT_VALUE,
            'js_type' => Generator::DEFAULT_VALUE
        ];
        return $this->pagesRepositroy->create($data);
    }

}