<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 04.07.2018
 * Time: 20:57
 */

namespace Btybug\Mini;


use Btybug\FrontSite\Models\FrontendPage;
use Btybug\FrontSite\Repository\SocialProfileRepository;
use Btybug\Mini\Model\MiniSuperLayouts;
use Btybug\Mini\Model\MiniSuperPainter;
use Btybug\Mini\Repositories\MinicmsPagesRepository;

class Generator
{
    private $tree = [
        'Providers' => ['ModuleServiceProvider'],
        'Resources' => ['Views' => [
            '_partials' => ['sidebar.blade', 'header.blade'],
            'account' => [
                'formBuilder.blade',
                'formrender.blade',
                'forms.blade',
                'settings.blade',
                'inputs.blade',
                'general.blade'
            ],
            'btybug' => [
                'blog.blade',
                'cv.blade',
                'jobs.blade',
                'market.blade'
            ],
            'communications' => [
                'create_message.blade',
                'messages.blade',
                'notifications.blade',
                'reviews.blade',
                'view_message.blade',
            ],
            'extra' => [
                '_partials' => [
                    'view.blade'
                    ],
                'gears.blade',
                'layouts.blade',
                'widgets.blade',
                'plugin_settings.blade',
                'plugins.blade',
            ],
            'media' => [
                'drive.blade',
                'settings.blade'
            ],
            'mysite' => [
                'pages.blade',
                'settings.blade',
                'special.blade'
            ],
            'layouts' => [
                'app.blade',
                'mTabs.blade'
            ],
            'pages' => [
                '_partials' => ['view.blade'],
                'content.blade',
                'edit.blade',
                'lists.blade',
            ],
            'plugins' => [
                'lists.blade',
                'settings.blade',
            ], 'preferences' => [
                'lists.blade'
            ],
            'account.blade',
        ]],
        'Main',
    ];
    private $storage;
    private $root;
    private $user_id;
    private $name;
    private $user;
    const DEFAULT_VALUE = 'default';

    public function __construct()
    {
        $this->storage = storage_path('minicms');
        $this->root = app_path('multisite');

    }

    public function make($name)
    {

        $this->name = $name->username;
        $this->user_id = $name->id;
        $this->user = $name;
        $this->root = $this->root . DS . $this->name;
        \File::makeDirectory($this->root);
        $this->makeSocialProfile();
        $this->rekursiveMakeCms($this->tree, $this->root);
        $this->makePages();
        $this->makeLayouts();
        $this->makeUnits();
    }

    public function makeSocialProfile()
    {
        $repo = new SocialProfileRepository();
        $repo->create(['user_id'=>$this->user_id]);
    }

    public function rekursiveMakeCms($array, $root, $path = null)
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $dir = $path . DS . $key;
                \File::makeDirectory($root . $dir);
                $this->rekursiveMakeCms($value, $root, $dir);
            } else {
                $content = str_replace('{username}', $this->name, \File::get($this->storage . $path . DS . $value . '.stub'));
                \File::put($root . DS . $path . DS . $value . '.php', $content);
            }
        }
    }

    public function makePages()
    {
        $minicmsPagesRepository = new MinicmsPagesRepository();
        $corePages = $minicmsPagesRepository->findAllByMultiple(['status' => 'published', 'memberships' => 'free']);
        $newPages = [];

        foreach ($corePages as $corePage) {
            if ($corePage->status == 'published') {
                $url = ($corePage->url == null or $corePage->url == '/') ? '/' . $this->user->site_url : '/' . $this->user->site_url . '/' . $corePage->url;
                $newPages[] = [
                    'title' => $corePage->title,
                    'url' => $url,
                    'user_id' => $this->user_id,
                    'status' => 'published',
                    'page_access' => 0,
                    'slug' => str_slug($corePage->title . $this->user_id),
                    'type' => 'core',
                    'render_method' => true,
                    'content_type' => 'template',
                    'template' => $corePage->template,
                    'module_id' => 'btybug/mini',
                    'page_layout' => $corePage->page_layout,
                    'header' => $corePage->header,
                    'header_unit' => $corePage->header_unit,
                    'tags' => $corePage->tags,
                    'css_type' => self::DEFAULT_VALUE,
                    'js_type' => self::DEFAULT_VALUE
                ];
            }
        }
        if (count($newPages)) {
            FrontendPage::insert($newPages);
        }
    }

    public function makeUnits()
    {
        $unitPath = $this->root . DS . 'Resources';
        $unitClass = new MiniSuperPainter();
        $units = $unitClass->all()->get();
        $paths = [];
        foreach ($units as $unit) {
            if (isset($unit->status) && $unit->status == 'published') {
                $paths[$unit->slug] = base_path($unit->path);
            }
        }
        if (!\File::isDirectory($unitPath . DS . 'Units')) {
            \File::makeDirectory($unitPath . DS . 'Units');
        }

        $content = json_encode($paths);
        file_put_contents($unitPath . DS . 'Units' . DS . 'painter.json', $content);
    }

    public function makeLayouts()
    {
        $unitPath = $this->root . DS . 'Resources' . DS . 'Views';
        $layoutClass = new MiniSuperLayouts();
        $layouts = $layoutClass->all()->get();
        $paths = [];

        foreach ($layouts as $layout) {
            $paths[$layout->slug] = base_path($layout->path);
        }
        if (!\File::isDirectory($unitPath . DS . 'ContentLayouts')) {
            \File::makeDirectory($unitPath . DS . 'ContentLayouts');
        }

        $content = json_encode($paths);
        file_put_contents($unitPath . DS . 'ContentLayouts' . DS . 'layout.json', $content);
    }
}