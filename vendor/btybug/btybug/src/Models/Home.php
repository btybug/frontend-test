<?php
/**
 * Created by PhpStorm.
 * User: Sahak/Edo
 * Date: 8/17/2016
 * Time: 10:43 AM
 */

namespace Btybug\btybug\Models;

//use Btybug\btybug\Helpers\helpers;
use Assets;
use Btybug\FrontSite\Models\FrontendPage;
use Illuminate\Support\Facades\View;

/**
 * @property Page page
 */
class Home
{

    /**
     * Home constructor.
     *
     * @param Page $page
     */
    public function __construct()
    {
//        $this->helpers = new helpers;
    }


    /**
     * @param $url
     * @param array $settings
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function render($url, $settings = [], $view = false, $page = null)
    {
        if (!$page) {
            $page = FrontendPage::where('url', $url)->orWhere('url', "/" . $url)->first();

        }
        if ($page->content_type == 'special') return view('btybug::app', compact('page'));
        if ($page->type == 'a_special') return view('btybug::a_special', compact('page'));
        if ($page) {
            if (!isset($settings['pl_live_settings'])) {
                if ($page->status == 'draft' && !$view)
                    abort(404);
                if (BBCheckMemberAccessEnabled() && $page->url != "/") {
                     return view('frontend.login', compact('page', 'settings'));
                }
                $parentPage = $page->parent;
                if ($parentPage && $page->page_layout == null) {
                    if ($parentPage->settings) {
                        $parentSettings = json_decode($parentPage->settings, true);
                        if (isset($parentSettings['children']['page_layout'])) {
                            $page->page_layout = $parentSettings['children']['page_layout'];
                        }

                        if (isset($parentSettings['children_page_layout_settings'])) {
                            $settings = array_merge($settings, $parentSettings['children_page_layout_settings']);
                        }
                    }
                } else {
                    if (is_array($page->page_layout_settings)) {
                        $settings = array_merge($settings, $page->page_layout_settings);
                    }
                }


                $page_settings = json_decode($page->settings, true);
                if (!is_array($page_settings)) {
                    $page_settings = [];
                }
                $settings = array_merge($settings, $page_settings);
            }
            $settings['_page'] = $page;
            $settings['main_content'] = $page->main_content;
            $settings['content_type'] = $page->content_type;
            $settings['template'] = $page->template;
            if (!$view) {
                return view('btybug::front_pages', compact('page', 'settings'));
            }

            $html = View::make('btybug::front_pages', compact('page', 'settings'))->render();
            return $html;
        }

        abort(404);
    }
}