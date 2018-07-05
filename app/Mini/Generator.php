<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 04.07.2018
 * Time: 20:57
 */

namespace App\Mini;


class Generator
{
    private $tree = [
        'Providers' => ['ModuleServiceProvider'],
        'Resources' => ['Views' => [
            '_partials' => ['sidebar.blade'],
            'layouts' => ['app.blade'],
            'pages' => ['lists.blade'],
            'account.blade',
        ]],
        'Main',
    ];
    private $storage;
    private $root;
    private $name;

    public function __construct()
    {
        $this->storage = storage_path('minicms');
        $this->root = app_path('multisite');

    }

    public function make($name)
    {
        $this->name = $name;
        $this->root = $this->root . DS . $this->name;
        \File::makeDirectory($this->root);
        $this->rekursiveMakeCms($this->tree, $this->root);
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
}