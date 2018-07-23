<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 04.07.2018
 * Time: 20:57
 */

namespace Btybug\Mini;


use Btybug\btybug\Models\Painter\Painter;
use Btybug\FrontSite\Models\FrontendPage;
use Btybug\Mini\Model\MiniPages;
use Btybug\Mini\Model\MiniSuperPainter;
use Btybug\Mini\Repositories\MinicmsPagesRepository;

class Generator
{
    private $tree = [
        'Providers' => ['ModuleServiceProvider'],
        'Resources' => ['Views' => [
            '_partials' => ['sidebar.blade', 'header.blade'],
            'account' => ['settings.blade', 'general.blade'],
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
                '_partials' => ['view.blade'],
                'gears.blade',
                'plugin_settings.blade',
                'plugins.blade',
            ],
            'media' => ['drive.blade', 'settings.blade'],
            'mysite' => ['pages.blade', 'settings.blade', 'special.blade'],
            'layouts' => ['app.blade'],
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

    public function __construct()
    {
        $this->storage = storage_path('minicms');
        $this->root = app_path('multisite');

    }

    public function make($name)
    {

        $this->name = $name->username;
        $this->user_id = $name->id;
        $this->root = $this->root . DS . $this->name;
        \File::makeDirectory($this->root);
        $this->rekursiveMakeCms($this->tree, $this->root);
        $this->makePages();
        $this->makeUnits();
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
//        if (isset($array[$i]) && is_array($array[$i])) {
//            \File::makeDirectory($root . DS . $this->name);
//            $this->rekursiveMakeCms($array[$i],0,$root . DS . $this->name);
//
//            $i++;
//            $this->rekursiveMakeCms($array,$i,$root);
//        }
    }

    public function makePages()
    {
        $minicmsPagesRepository = new MinicmsPagesRepository();
        $corePages = $minicmsPagesRepository->findAllByMultiple(['status' => 'published', 'memberships' => 'free']);
        $newPages = [];

        foreach ($corePages as $corePage) {
            if ($corePage->template) {
                $painters = MiniSuperPainter::whereTag($corePage->template)->get();
                $teplate = null;
                if (count($painters)) {
                    $teplate = $painters[0]->slug . '.default';
                    $newPages[] = [
                        'title' => $corePage->title,
                        'url' => '/' . $this->name . '/' . $corePage->url,
                        'user_id' => $this->user_id,
                        'status' => 'published',
                        'page_access' => 0,
                        'slug' => str_slug($corePage->title . $this->user_id),
                        'type' => 'core',
                        'content_type' => 'template',
                        'page_layout' => 'front_layout_with_2_8_2_col',
                        'template' => $teplate
                    ];
                }
            }

        }
        if (count($newPages)) {
            FrontendPage::insert($newPages);
        }
    }

    public function makeUnits(): void
    {
        $unitPath = $this->root . DS . 'Resources';
        $unitClass = new MiniSuperPainter();
        $units = $unitClass->all()->get();
        $paths = [];

        foreach ($units as $unit) {
            $paths[] = base_path($unit->path);
        }
        if (!\File::isDirectory($unitPath . DS . 'Units')) {
            \File::makeDirectory($unitPath . DS . 'Units');
        }
        
        $content = json_encode($paths);
        file_put_contents($unitPath . DS . 'Units' . DS . 'painter.json', $content);
    }
}