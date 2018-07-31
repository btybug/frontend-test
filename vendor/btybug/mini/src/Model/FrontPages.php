<?php
namespace Btybug\Mini\Model;


use Btybug\btybug\Http\Controller;
use Btybug\FrontSite\Models\FrontendPage;
use Illuminate\Http\Request;

class FrontPages
{
    private $username;

    public function render($url, $settings = [], $view = false, $page = null)
    {
        if (!$page) {
            $page = FrontendPage::where('url', $url)->orWhere('url', "/" . $url)->first();
        }
        if ($page) {
            $settings['_page'] = $page;
            $settings['main_content'] = $page->main_content;
            $settings['content_type'] = $page->content_type;
            $settings['template'] = $page->template;
            $this->username = $page->author->username;
            $this->setConfigs();
            if (!$view) {
                return view('multisite::layouts.front_pages', compact('page', 'settings'));
            }

            $html = \View::make('multisite::layouts.front_pages', compact('page', 'settings'))->render();
            return $html;
        }

        abort(404);
    }

    private function setConfigs()
    {
        \Config::set('miniunits_config_path',"app" . DS . "multisite" . DS . $this->username . DS . "Resources". DS . "Units" . DS . "painter.json");
        \Config::set('miniunits_storage_path',"app" . DS . "multisite" . DS . $this->username . DS . "Resources". DS . "Units");

        \Config::set('minilayouts_config_path',"app" . DS . "multisite" . DS . $this->username . DS . "Resources". DS . "Views" . DS . "ContentLayouts" . DS . "layout.json");
        \Config::set('minilayouts_storage_path',"app" . DS . "multisite" . DS . $this->username . DS . "Resources". DS . "Views" . DS . "ContentLayouts");
    }
}