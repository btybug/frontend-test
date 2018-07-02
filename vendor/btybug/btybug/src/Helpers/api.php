<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 7/18/17
 * Time: 5:23 PM
 */
function module_path($path = '')
{
    return app()->basePath() . (DS . 'vendor' . DS . 'btybug') . ($path ? DS . $path : $path);
}

function BBaddShortcode($key, $function)
{
    $codes = \Config::get('shortcode.extra', []);
    array_push($codes, [$key => $function]);
    \Config::set('shortcode.extra', $codes);
}

function BBGetAdminLoginUrl()
{
    $adminPagesReopsitory = new \Btybug\Console\Repository\AdminPagesRepository();
    $adminLoginPage = $adminPagesReopsitory->findBy('slug', 'admin-login');

    return $adminLoginPage ? $adminLoginPage->url : '/admin/login';

}


function BBCheckMemberAccessEnabled()
{
    $reg = BBCheckRegistrationEnabled();
    if ($reg) {
        $settings = \Btybug\btybug\Models\Settings::where('settingkey', 'enable_member_access')->first();
        if ($settings) {
            return ($settings->val == "1");
        }
    }

    return false;
}

function BBCheckRegistrationEnabled()
{
    $settings = \Btybug\btybug\Models\Settings::where('settingkey', 'enable_registration')->first();
    if ($settings) {
        return ($settings->val) ? true : false;
    }

    return false;
}


function BBheader()
{
    $tpl = \Btybug\btybug\Models\Settings::where('section', 'setting_system')->where('settingkey', 'header_tpl')->first();
    if ($tpl and !empty($tpl->val)) {
        return BBRenderTpl($tpl->val);
    }
}

function BBRenderTpl($variation_id, $on_empty = null)
{
    $slug = explode('.', $variation_id);

    if (isset($slug[0]) && isset($slug[1])) {
        $widget_id = $slug[0];
        $variationID = $slug[1];
        $widget = \Btybug\btybug\Models\Painter\Painter::find($widget_id);
        if (!is_null($widget)) {
            $variation = $widget->variations()->find($variation_id);
            if (!is_null($variation)) {
                $section = '';//$widget->section();
                $settings = $variation->settings;
                if ($widget->have_settings && !$settings) {
                    return 'Settings are empty';
                }

                return $widget->render(compact(['variation', 'section', 'settings']));
            }
        }

        return 'Wrong widget';
    }

    return $on_empty;
}

function BBRenderPageSections($layout, $settings = [], $main_view = null)
{
    if (!$layout) $layout = '';
    $content_layout = \Btybug\btybug\Models\ContentLayouts\ContentLayouts::find($layout);
    if (!is_null($content_layout)) {
        return $content_layout->render($settings);
    }

    return false;
}

function BBRenderFrontLayout($page)
{
    if ($page->parent && $page->page_layout_inheritance) {
        $settings = ($page->parent->page_layout_settings && !is_array($page->parent->page_layout_settings)) ? json_decode($page->parent->page_layout_settings, true) : [];
        $settings["_page"] = $page;
        return BBRenderPageSections($page->parent->page_layout, $settings);
    } else {
        $settings = ($page->page_layout_settings && !is_array($page->page_layout_settings)) ? json_decode($page->page_layout_settings, true) : [];
        $settings["_page"] = $page;
        return BBRenderPageSections($page->page_layout, $settings);
    }
}

function BBgetFrontPage($idOrSlug)
{
    $forntPageRepository = new \Btybug\Console\Repository\FrontPagesRepository();

    return $forntPageRepository->model()->where('id', $idOrSlug)->orWhere('slug', $idOrSlug)->first();
}

function BBRenderPageBody($slug, $data = [], $main_view = null)
{
    $section = \Btybug\btybug\Models\ContentLayouts\ContentLayouts::renderPageBody($slug, $data);

    return $section;
}

function BBdiv($key, $html, array $array = [])
{

    $atributes = ' ';
    $value = '';
    $array['class'] = $array['class'] . " BBdivs";
    if (count($array)) {
        foreach ($array as $k => $v) {
            if ($k != 'model') {
                $atributes .= "$k=\"$v\"";
            }

        }
    }
    if (isset($array['model'])) {
        $model = $array['model'];
        if (is_string($model)) {
            $value = $model;
        } else {
            if (is_object($model)) {
                $model = $model->toArray();
            }

            if (isset($model[$key])) {
                $value = $model[$key];
            }
        }

    }
    $array = '';
    if (strpos($key, '[]')) {
        $array = 'data-array="true"';
    }
    $renderedUnit = BBRenderUnits($value);

    return '<div data-action="unit"' . ' data-key="' . $key . '" ' . $atributes . ' >' . (($renderedUnit) ? $renderedUnit : $html) . '</div><input class="bb-button-realted-hidden-input" type="hidden" ' . $array . ' value="' . $value . '" data-name="' . $key . '" name="' . $key . '">';
}

function BBDiv2($key, $tag, $html, $array = [])
{
    $atributes = ' ';
    $value = '';
    $array['class'] = $array['class'] . " BBdivs";
    $array['data-type'] = $tag;
    if (count($array)) {
        foreach ($array as $k => $v) {
            if ($k != 'model') {
                $atributes .= "$k=\"$v\"";
            }
        }
    }
    if (isset($array['model'])) {
        $model = $array['model'];
        if (is_string($model)) {
            $value = $model;
        } else {
            if (is_object($model)) {
                $model = $model->toArray();
            }

            if (isset($model[$key])) {
                $value = $model[$key];
            }
        }
    }
    $hiddenName = isset($array['data-name-prefix']) ? $array['data-name-prefix'] . '[' . $key . ']' : $key;
    $array = '';
    if (strpos($key, '[]')) {
        $array = 'data-array="true"';
    }
    $data_key = str_replace('[]', '', $key);

    $renderedUnit = BBRenderUnits($value);

    return '<div data-action="unit"' . ' data-key="' . $data_key . '" ' . $atributes . ' >' . (($renderedUnit) ? $renderedUnit : $html) . '</div><input class="bb-button-realted-hidden-input" type="hidden" ' . $array . ' value="' . $value . '" data-name="' . $key . '" name="' . $key . '">';
}

function BBRenderSections($variation_id, $source = [])
{
    if (is_array($variation_id)) {
        $variation_id = $variation_id['id'];
    }
    $slug = explode('.', $variation_id);
    if (isset($slug[0]) && isset($slug[1])) {
        $section_id = $slug[0];
        $section = \Btybug\btybug\Models\Templates\Sections::find($section_id);
        if (!is_null($section)) {
            $variation = $section->findVariation($variation_id);
            if (!is_null($variation)) {
                $settings = $variation->settings;
                if ($section->have_settings && !$settings) {
                    $settings = [];
                }

                return $section->render(compact(['variation', 'settings', 'source']));
            }
        }

        return false;
    }
}

function BBfooter()
{
    $tpl = \Btybug\btybug\Models\Settings::where('section', 'setting_system')->where('settingkey', 'footer_tpl')->first();
    if ($tpl and !empty($tpl->val)) {
        return BBRenderTpl($tpl->val);
    }
}

function BBRenderBackTpl($variation_id, $on_empty = null)
{
    $slug = explode('.', $variation_id);
    if (isset($slug[0]) && isset($slug[1])) {
        $widget_id = $slug[0];
        $variationID = $slug[1];

        $widget = \Btybug\btybug\Models\Painter\Painter::find($widget_id);
        if (!is_null($widget)) {
            $variation = $widget->variations()->find($variation_id);
            if (!is_null($variation)) {
                $section = '';//$widget->section();
                $settings = $variation->settings;
                if ($widget->have_settings && !$settings) {
                    return 'Settings are empty';
                }

                return $widget->render(compact(['variation', 'section', 'settings']));
            }
        }

        return 'Wrong widget';
    }

    return $on_empty;
}

function BBleftBar()
{
    $tpl = \Btybug\btybug\Models\Settings::where('section', 'setting_system')->where('settingkey', 'backend_left_bar')->first();
//    dd($tpl);
    if ($tpl and !empty($tpl->val)) {
        return BBRenderBackTpl($tpl->val);
    }
}

function BBheaderBack()
{
    $page = \Btybug\btybug\Services\RenderService::getPageByURL();

    if ($page) {
        $settingsRepo = new \Btybug\btybug\Repositories\AdminsettingRepository();
        $settings = $settingsRepo->findBy('section', 'backend_site_settings');

        if ($settings && $settings->val) $data = json_decode($settings->val, true);
        if (isset($data['header_unit']))
            return BBRenderUnits($data['header_unit']);
    }
}

function BBfooterBack()
{
    $page = \Btybug\btybug\Services\RenderService::getPageByURL();

    if ($page && $page->footer) {
        $settingsRepo = new \Btybug\btybug\Repositories\AdminsettingRepository();
        $settings = $settingsRepo->findBy('section', 'backend_site_settings');
        if ($settings && $settings->val) $data = json_decode($settings->val, true);

        if (isset($data['footer_unit']))
            return BBRenderUnits($data['footer_unit']);
    }
}

function main_content($settings = null)
{
    $page = \Btybug\btybug\Services\RenderService::getFrontPageByURL();
    $pageModel = ($page) ?? ((\Request::route()->parameter('param')) ? BBgetFrontPage(\Request::route()->parameter('param')) : issetReturn($settings, '_page'));
    if ($pageModel) {
        if ($pageModel->type == 'custom' && isset($settings['live_preview_action'])) {
            return BBRenderUnits(issetReturn($settings, 'main_unit', $pageModel->template), ['_page' => $pageModel]);
        } else {
            if ($pageModel->content_type == "editor") {
                echo $pageModel->main_content;
            } else {
                return BBRenderUnits($pageModel->template, ['_page' => $pageModel]);
            }
        }
    } else {
        return BBRenderUnits(issetReturn($settings, 'main_unit'));
    }
}

function BBgetPageLayout()
{

    $route = \Request::route();
    if ($route) {
        if (isset($_GET['pl_live_settings']) && $_GET['pl_live_settings'] == 'page_live') {
            $layoutID = $_GET['pl'];
            $layout = \Btybug\btybug\Models\ContentLayouts\ContentLayouts::findVariation($layoutID);
            if (!$layout) return \Btybug\btybug\Models\ContentLayouts\ContentLayouts::defaultPageSection();
            $data = explode('.', $layoutID);
            $layout = \Btybug\btybug\Models\ContentLayouts\ContentLayouts::find($data[0]);
            dd(1);

            return 'ContentLayouts.' . $layout->folder . '.' . $layout->layout;
        }
    }

    $page = \Btybug\btybug\Services\RenderService::getPageByURL();
    $data = [];
    if ($page->layout_id) {
        $slug = explode('.', $page->layout_id);
        $layout = \Btybug\btybug\Models\ContentLayouts\ContentLayouts::find($slug[0]);
        if ($layout) return 'ContentLayouts.' . $layout->folder . '.' . $layout->layout;
    } else {
        $settingsRepo = new \Btybug\btybug\Repositories\AdminsettingRepository();
        $settings = $settingsRepo->findBy('section', 'backend_site_settings');
        if ($settings && $settings->val) $data = json_decode($settings->val, true);

        if (isset($data['backend_page_section']) && $data['backend_page_section']) {
            $slug = explode('.', $data['backend_page_section']);

            $layout = \Btybug\btybug\Models\ContentLayouts\ContentLayouts::find($slug[0]);
            if ($layout) return 'ContentLayouts.' . $layout->folder . '.' . $layout->layout;
        }
    }
}

function BBgetPageLayoutSettings()
{
    $page = \Btybug\btybug\Services\RenderService::getPageByURL();
    if (isset($_GET['pl_live_settings']) && $_GET['pl_live_settings'] == 'page_live') {
        $data = $_GET;
        $AdminPagesRepo = new \Btybug\Console\Repository\AdminPagesRepository();
        $live_page = $AdminPagesRepo->find($data['page_id']);
        if ($live_page) {
            if ($live_page->settings && isset($_GET['variation'])) {
                $page_settings = json_decode($live_page->settings, true);
                if (!empty($page_settings)) $data = array_merge($page_settings, $data);
            } else {
                $layout = \Btybug\btybug\Models\ContentLayouts\ContentLayouts::findVariation($data['pl']);
                if ($layout) $data = array_merge($layout->settings, $data);
            }
        } else {
            $layout = \Btybug\btybug\Models\ContentLayouts\ContentLayouts::findVariation($data['pl']);
            if ($layout) $data = array_merge($layout->settings, $data);
        }

        return $data;
    }

    if ($page) {
        $data = [];
        if ($page->settings && $page->layout_id) {
            $data = json_decode($page->settings, true);

            $layout = \Btybug\btybug\Models\ContentLayouts\ContentLayouts::findVariation($page->layout_id);
            if ($layout) {
                $mainSettings = array_merge($data, $layout->settings);
                $json = '<input type="hidden" id="page_layout_settings_json" data-json=' . json_encode($mainSettings, true) . '>';
                echo $json;

                return $mainSettings;
            }
        } else {
            $settingsRepo = new \Btybug\btybug\Repositories\AdminsettingRepository();
            $settings = $settingsRepo->findBy('section', 'backend_settings');
            if ($settings && $settings->val) $data = json_decode($settings->val, true);

            if (isset($data['backend_page_section']) && $data['backend_page_section']) {
                $layout = \Btybug\btybug\Models\ContentLayouts\ContentLayouts::findVariation($data['backend_page_section']);
                if ($layout) {
                    $mainSettings = array_merge($data, $layout->settings);
                    $json = '<input type="hidden" id="page_layout_settings_json" data-json=' . json_encode($mainSettings, true) . '>';
                    echo $json;

                    return $mainSettings;
                }
            }
        }
    }

    return ['options' => [], 'json' => json_encode([], true)];
}

//TODO Transver in Hooks package
function BBscriptsHook()
{
    $codes = \Config::get('scripts', []);
    $scripts = '';
    foreach ($codes as $key => $value) {
        $scripts .= HTML::script($value['url'], isset($value['attributes']) ? $value['attributes'] : []);
    }
    return $scripts;
}

function BBextraHtml()
{
    $codes = \Config::get('extraHtml', []);
    $html = '';
    foreach ($codes as $key => $value) {
        $html .= $value;
    }
    return $html;
}

//TODO Transver in Framework api.php
function BBFrameworkJs()
{
    return \Btybug\Framework\Models\Framework::activeJs();
}

if (!function_exists('BBGetUserName')) {
    /**
     * @param null $id
     * @return mixed|null|string
     */
    function BBGetUserName($id = null)
    {
        if ($id) {
            if ($user = \App\User::find($id)) {
                if (!isset($user->profile)) {
                    return $user->username;
                }

                return ($user->profile->first_name || $user->profile->last_name) ?
                    $user->profile->first_name . ' ' . $user->profile->last_name : $user->username;
            }
        } else {
            if (Auth::check()) {
                if (!isset(Auth::user()->profile)) {
                    return Auth::user()->username;
                }

                return (Auth::user()->profile->first_name || Auth::user()->profile->last_name) ? Auth::user()->profile->first_name . ' ' . Auth::user()->profile->last_name : Auth::user()->username;
            }
        }

        return null;
    }
}

function BBAdminMenu($html = true)
{

    // Get json file
    $menu_array = \Config::get('admin_menus');
    if (!$menu_array) {
        $menu_json_file = file_get_contents(base_path('resources/menus/admin/1.json'));
        $menu_array = json_decode($menu_json_file, true);
    }

    return ($html) ? BBAdminMenuWalker($menu_array) : $menu_array;
}

function BBAdminMenuWalker($menu_array)
{

    $menu = '';
    if (is_array($menu_array)) {
        $menu = '<ul id="menu-content" class="menu-content collapse out">';

        foreach ($menu_array as $key => $item) {
            $link = 'javascript:void(0)';
            $icon = (isset($item['icon'])) ? $item['icon'] : 'fa fa-share-square-o';
            if (isset($item['custom-link'])) {
                $link = $item['custom-link'];
            }

            $menu .=
                '<li  data-toggle="collapse" data-target="#id' . $key . '" class="collapsed">' .
                '<a href="javascript:void(0)"><i class="' . $icon . '"></i>' . $item['title'];
            if (isset($item['children']) and is_array($item['children'])) {
                $menu .= '<span class="pull-right arrow fa fa-arrow-left"></span>';
            }
            $menu .= '</a>';

            $menu .= '</li>';
            $menu .= '</ul>';
            if (isset($item['children']) and is_array($item['children'])) {
                $menu .= '   <ul class="sub-menu collapse" id="id' . $key . '">';
                foreach ($item['children'] as $child) {
                    $menu .=
                        ' <li class="clearfix">' .
                        ' <a href="' . $child['custom-link'] . '">' . $child['title'] .
                        ' </a>' .
                        ' </li>';
                }
                $menu .= '   </ul>';
            }

        }

    }


    return $menu;
}

function BBgetSiteLogo()
{
    $settingRepo = new Btybug\btybug\Repositories\AdminsettingRepository();
    $logo = $settingRepo->getSettings('setting_system', 'site_logo');
    if (!$logo) return '';

    return url('public/images/logo', $logo->val);
}

function BBgetSiteName()
{
    $settingRepo = new Btybug\btybug\Repositories\AdminsettingRepository();
    $name = $settingRepo->getSettings('setting_system', 'site_name');

    return $name->val;
}

function BBRenderUnits($variation_id, $source = [], $data = null)
{
    $field = null;
    $cheked = null;
    $slug = explode('.', $variation_id);

    if (isset($slug[0]) && isset($slug[1])) {
        $widget_id = $slug[0];
        $variationID = $slug[1];

        $unit = \Btybug\btybug\Models\Painter\Painter::find($widget_id);
        if (!is_null($unit)) {
            $variation = $unit->variations(false)->find($variation_id);
            if (!is_null($variation)) {
                $settings = $variation->settings;

                if ($unit->have_settings && !$settings) {
                    $settings = [];
                }

                $liveSettings = $source;
                if (count($liveSettings) && is_array($liveSettings) && is_array($settings)) {
                    array_filter($settings, function ($value) {
                        return $value !== '';
                    });

                    array_filter($liveSettings, function ($value) {
                        return $value !== '';
                    });
                    $settings = array_merge($settings, $liveSettings);
                }

                return $unit->render(compact(['variation', 'settings', 'source', 'field', 'cheked', 'data']));
            }
        }

        return 'Wrong Unit';
    }
}

//TODO transver in Avatar
function plugins_path($path = null)
{
    return rtrim(base_path(config('avatar.plugins.path') . DS . $path), '/');
}

//TODO transver in Manage
function hierarchyAdminPagesListFull($data, $parent = true, $icon = true, $id = 0)
{
    $output = '';
    // Loop through items
    if ($data) {
        foreach ($data as $item) {
            $children = $item->childs;
            $output .= '<li data-id="' . $item->id . '" data-type="' . $item->type . '">';
            $title = 'core';
            $output .= '<div class="listinginfo bb-menu-item">';
            switch ($item->type) {
                case  "custom" :
                    $title = 'custom';
                    $output .= '<div class="lsitingbutton bb-menu-item-title" style="background: #36e0a0; !important">';
                    break;
                case  "a_special" :
                    $title = 'special custom';
                    $output .= '<div class="lsitingbutton bb-menu-item-title" style="background: #ffea00; !important">';
                    break;
                case  "plugin" :
                    $title = 'plugin';
                    $output .= '<div class="lsitingbutton bb-menu-item-title" style="background: #e0223c;  !important">';
                    break;
                default:
                    $output .= '<div class="lsitingbutton bb-menu-item-title" style="background: #00c7e0;  !important">';
                    break;
            }
            $output .= '<span class="listingtitle">' . $item->title . ' - ' . $title . '</span>';
            $settings = json_decode($item->settings, true);
            if (isset($settings['edit_url'])) {
                $output .= '<a href="' . url($settings['edit_url']) . '" class="btn"><i class="fa fa-cog fa-spin pull-right"></i></a>';
            } else {
                if ($item->type == 'a_special') {
                    $output .= '<a href="' . url('/admin/front-site/structure/front-pages/special-settings', $item->id) . '" class="pull-right"><i class="fa fa-pencil"></i></a>';
                } else {
                    $output .= '<a href="' . url('/admin/front-site/structure/front-pages/settings', $item->id) . '" class="pull-right"><i class="fa fa-pencil"></i></a>';
                }
            }

            if ($item->type == 'custom' || $item->type == 'a_special') {
                $output .= '<a data-href="' . url('/admin/front-site/structure/front-pages/delete') . '" data-key="' . $item->id . '" data-type="Page ' . $item->title . '" style="cursor: pointer;"  class="delete-button pull-right trashBtn"><i class="fa fa-trash"></i></a>';
            }
//        $output .= '<a data-toggle="collapse" data-pagecolid="' . $item->id . '" data-parent="#accordion' . $item->id . '" href="#collapseOne' . $item->id . '" aria-expanded="true" aria-controls="collapseOne" class="link_name collapsed">';
//        $output .= $item->title;
//        $output .= '</a>';
            $output .= '</div>';
            $output .= '</div>';
            /* Actions */
            /* Actions END */
            if (count($children)) {
                $output .= '<ol>';
                $output .= hierarchyAdminPagesListFull($children, false, $icon, 0);
                $output .= '</ol>';
            }

//        $output .= '</li>';
            // If this is the top parent
            $output .= '</li>';
        }
    }

    // Return data tree
    return $output;
}

function BBGetTables()
{
    $tables = \DB::select('SHOW TABLES');
    $data = [];
    if (count($tables)) {
        foreach ($tables as $values) {
            foreach ($values as $value) {
                $data[$value] = $value;
            }
        }
    }

    return $data;
}

function BBGetTableColumn($table = null)
{
    $data = [];
    if ($table && \Schema::hasTable($table)) {
        $colums = \DB::select('SHOW COLUMNS FROM ' . $table);
        if (count($colums)) {
            foreach ($colums as $values) {
                $data[array_first($values)] = array_first($values);
            }
        }
    }

    return $data;
}

function BBGetTableColumnData($table = null, $column = null)
{
    $data = [];
    if ($table && \Schema::hasTable($table)) {
        $colums = \DB::select('SELECT ' . $column . ' FROM ' . $table);
        if (count($colums)) {
            foreach ($colums as $v) {
                $data[$v->$column] = $v->$column;
            }
        }
    }

    return $data;
}

function BBfindTableColumnData($table, $column, $id)
{
    if (!$column || !$id) return null;
    $row = DB::table($table)->find($id);
    return ($row) ? $row->$column : null;
}

function BBbutton($action, $key, $text, array $array = [])
{
    $route = Request::route();
    if ($action == 'main_body' && $route->uri() == "admin/manage/structure/front-pages/page-preview/{id}") {
        $param = $route->parameter('id');
        $page = \Btybug\FrontSite\Models\FrontendPage::find($param);
        if ($page) {
            if ($page->type != "custom" && $page->type != "tags")
                return false;
        }
    }

    $atributes = ' ';
    $value = '';
    $array['class'] = $array['class'] . " BBbuttons";
    if (count($array)) {
        foreach ($array as $k => $v) {
            if ($k != 'model') {
                $atributes .= "$k=\"$v\"";
            }
        }
    }
    if (isset($array['model'])) {
        $model = $array['model'];
        if (is_string($model)) {
            $value = $model;
        } else {
            if (is_object($model)) {
                $model = $model->toArray();
            }

            if (isset($model[$key])) {
                $value = $model[$key];
            }
        }
    }
    $hiddenName = isset($array['data-name-prefix']) ? $array['data-name-prefix'] . '[' . $key . ']' : $key;
    $array = '';
    if (strpos($key, '[]')) {
        $array = 'data-array="true"';
    }
    $data_key = str_replace('[]', '', $key);

    return '<button type="button" data-action=' . $action . ' data-key="' . $data_key . '" ' . $atributes . ' >'
        . $text . '</button><input class="bb-button-realted-hidden-input" type="hidden" '
        . $array . ' value="' . $value . '" data-name="' . $data_key . '" name="' . $hiddenName . '">';
}

function BBcustomize($type, $key, $tag, $text, $structure, $array = [])
{
    $atributes = ' ';
    $value = '';
    $array['class'] = "BBcustomize";
    $array['data-type'] = $tag;
    if (count($array)) {
        foreach ($array as $k => $v) {
            if ($k != 'model') {
                $atributes .= "$k=\"$v\"";
            }
        }
    }
    if (isset($array['model'])) {
        $model = $array['model'];
        if (is_string($model)) {
            $value = $model;
        } else {
            if (is_object($model)) {
                $model = $model->toArray();
            }

            if (isset($model[$key])) {
                $value = $model[$key];
            }
        }
    }
    $hiddenName = isset($array['data-name-prefix']) ? $array['data-name-prefix'] . '[' . $key . ']' : $key;
    $array = '';
    if (strpos($key, '[]')) {
        $array = 'data-array="true"';
    }
    $data_key = str_replace('[]', '', $key);
    $html = View::make('btybug::bbcustomize', compact('type', 'data_key', 'atributes', 'text', 'array', 'value', 'hiddenName', 'structure'))->render();

    return $html;
}

function BBbutton2($type, $key, $tag, $text, $array = [], $getData = [])
{
    $atributes = ' ';
    $value = '';
    $array['class'] = "BBbuttons";
    $array['data-type'] = $tag;
    if (count($array)) {
        foreach ($array as $k => $v) {
            if ($k != 'model') {
                $atributes .= "$k=\"$v\"";
            }
        }
    }
    if (isset($array['model'])) {
        $model = $array['model'];
        if (is_string($model)) {
            $value = $model;
        } else {
            if (is_object($model)) {
                $model = $model->toArray();
            }

            if (isset($model[$key])) {
                $value = $model[$key];
            }
        }
    }
    $hiddenName = isset($array['data-name-prefix']) ? $array['data-name-prefix'] . '[' . $key . ']' : $key;
    $array = '';
    if (strpos($key, '[]')) {
        $array = 'data-array="true"';
    }
    $data_key = str_replace('[]', '', $key);
    $html = View::make('btybug::bbbutton', compact('type', 'data_key', 'atributes', 'text', 'array', 'value', 'hiddenName', 'getData'))->render();

    return $html;
}

function BBstyles()
{

    $html = View::make('btybug::bbstyles')->render();

    return $html;
}

function BBgetDateFormat($date, $format = null)
{
    if (!$date) null;

    if (!is_numeric($date))
        $date = strtotime($date);

    if ($format) {
        return date($format, $date);
    }

    $settings = DB::table('settings')->where('section', 'setting_system')->where(
        'settingkey',
        'date_format'
    )->first();

    if ($settings) {
        if (strpos($settings->val, '%') !== false) {
            return (strftime($settings->val, $date)) ? strftime($settings->val, $date) : date('m/d/Y', $date);
        } else {
            return date($settings->val, $date);
        }
    }

    return date('m/d/Y', $date);
}

/**
 * @param $time
 * @return bool|string
 */
function BBgetTimeFormat($time)
{
    if (!$time) null;

    $settings = \DB::table('settings')->where('section', 'setting_system')->where(
        'settingkey',
        'time_format'
    )->first();

    if ($settings) {
        if ($settings->val == 'seconds') {
            return date("H:i:s", strtotime($time));
        }

        if ($settings->val == '12hrs') {
            // 24-hour time to 12-hour time
            return date("g:i a", strtotime($time));
        }
    }

    return date("H:i", strtotime($time));
}

function BBField($data)
{
    $fieldHtml = '';
    if (isset($data['slug'])) {
        $fieldRepo = new \Btybug\Console\Repository\FieldsRepository();
        $field = $fieldRepo->findBy('slug', $data['slug']);
        if ($field) {
            $field_html = null;
            switch ($field->field_html) {
                case 'default':
                    $defaultFieldHtml = \DB::table('settings')->where('section', 'setting_system')
                        ->where('settingkey', 'default_field_html')->first();
                    $variationId = $defaultFieldHtml->val;
                    $field_html = \Btybug\btybug\Models\Painter\Painter::findByVariation($variationId);
                    break;
                case 'custom':
                    $field_html = \Btybug\btybug\Models\Painter\Painter::findByVariation($field->custom_html);
                    break;
            }

            if (isset($data['html']) && $data['html'] == 'no') {
                $fieldHtml = BBRenderUnits($field->unit, $field->toArray());
            } else {
                if ($field_html) {
                    $fieldHtml = $field_html->render(['settings' => $field->toArray()]);
                } else {
                    $fieldHtml = BBRenderUnits($field->unit, $field->toArray());
                }
            }

        }
    }

    return $fieldHtml;
}

function BBFieldHidden($data)
{
    $fieldHtml = '';
    if (isset($data['slug'])) {
        $fieldRepo = new \Btybug\Console\Repository\FieldsRepository();
        $field = $fieldRepo->findBy('slug', $data['slug']);
        if ($field) {
            $name = $field->table_name . "_" . $field->column_name;
            $fieldHtml = "<input type='hidden' name='" . $name . "' value='" . $field->default_value . "' />";
        }
    }

    return $fieldHtml;
}

function BBMasterFormsList()
{
    $forms = new \Btybug\Console\Repository\FormsRepository();

    return $forms->getByTypeNewPluck()->toArray();
}

/**
 * @param null $id
 * @return URL|null|string
 */
function BBGetUserCover($id = null)
{
    if ($id) {
        $userRepository = new \Btybug\User\Repository\UserRepository();
        if ($user = $userRepository->find($id)) {
            return ($user->profile->cover) ? url($user->profile->cover) : '/resources/assets/images/profile.jpg';
        }
    } else {
        if (Auth::check()) {
            return (Auth::user()->profile->cover) ? url(Auth::user()->profile->cover) : '/resources/assets/images/profile.jpg';
        }
    }

    return null;
}

//TODO transver in User
function BBGetUserRole($id = null)
{
    if ($id) {
        $userRepository = new \Btybug\User\Repository\UserRepository();
        if ($user = $userRepository->find($id)) {
            return ($user->role->name);
        }
    } else {
        if (Auth::check()) {
            return (Auth::user()->role->name);
        }
    }

    return null;
}

function BBGetAllValidations()
{
    return \Config::get('validations');
}

function issetReturn($array, $item, $default = null)
{

    if (is_array($array)) {
        if (isset($array[$item]) && $array[$item] != "") {
            return $array[$item];
        }
    }

    return $default;
}


/**
 * @param null $id
 * @return mixed|null|string
 */
//TODO transver in USER
function BBGetUser($id = null, $column = 'username')
{
    if ($id) {
        $userRepo = new \Btybug\User\Repository\UserRepository();
        $user = $userRepo->find($id);
        if ($user) {
            if (isset($user->$column)) {
                return $user->$column;
            } elseif (isset($user->profile)) {
                if (isset($user->profile->$column))
                    return $user->profile->$column;
            }
        }
    } else {
        if (Auth::check()) {
            if (isset(Auth::user()->$column)) {
                return Auth::user()->$column;
            } elseif (isset(Auth::user()->profile)) {
                if (isset(Auth::user()->profile->$column))
                    return Auth::user()->profile->$column;
            }
        }
    }

    return null;
}

function BBGetUserAvatar($id = null)
{
    if ($id) {
        $userRepo = new \Btybug\User\Repository\UserRepository();
        $user = $userRepo->find($id);
        if ($user && $user->avatar) {
            return url($user->avatar);
        }
    } else {
        if (Auth::check()) {
            if (Auth::user()->avatar) {
                return url(Auth::user()->avatar);
            }
        }
    }

    return url('public/images/avatar.png');
}

//TODO transver in Console
function hierarchyAdminPagesListWithModuleName($data, $moduleCh = null, $icon = true, $roleSlug = null, $checkbox = false)
{
    $plugins = new \Avatar\Avatar\Repositories\Plugins();
    $plugins->modules();
    $modules = $plugins->getPlugins()->toArray();
    $plugins->plugins();
    $extras = $plugins->getPlugins()->toArray();
    $modules = array_merge($extras, (array)$modules);
    $adminRepo = new \Btybug\Console\Repository\AdminPagesRepository();
    $output = "";
    if (count($data)) {
        foreach ($data as $module) {
            if ($moduleCh == null or $moduleCh->namespace == $module->module_id) {
                if (!$module->module_id) {
                    if ($checkbox === true) {
                        $output .= hierarchyAdminPagesListPermissions($adminRepo->main(), true, $icon, $roleSlug);
                    } else {
                        if ($roleSlug == null) {
                            $output .= hierarchyAdminPagesListFull($adminRepo->main(), true, $icon, 0);
                        } else {
                            $output .= hierarchyAdminPagesList($adminRepo->main(), true, $icon, 0, $roleSlug);
                        }
                    }
                } else {
                    $plugins->modules();
                    $value = $plugins->find($module->module_id);
                    if (!$value) {
                        $plugins->plugins();
                        $value = $plugins->find($module->module_id);
                    }
                    if ($value) {
                        if ($checkbox === true) {
                            $output .= hierarchyAdminPagesListPermissions($adminRepo->PagesByModulesParent($value), true, $icon, $roleSlug);
                        } else {
                            if ($roleSlug == null) {
                                $output .= hierarchyAdminPagesListFull($adminRepo->PagesByModulesParent($value), true, $icon, 0);
                            } else {
                                $output .= hierarchyAdminPagesList($adminRepo->PagesByModulesParent($value), true, $icon, 0, $roleSlug);
                            }
                        }
                    }
                }
            }
        }
    }

    return $output;
}

//TODO transver in Console
function hierarchyAdminPagesList($data, $parent = true, $icon = true, $id = 0, $roleSlug = null)
{//dd($roleSlug);
    $children = [];
    $output = ' <ul id="accordion" class="panel-group" data-nav-drag="" role="tablist" aria-multiselectable="true">';

    // Loop through items
    foreach ($data as $item) {//dd($roleSlug);
        if (\Btybug\Console\Services\StructureService::checkAccess($item->id, $roleSlug)) {
            if ($parent) {
                $output .= '<li data-id="' . $item->id . '" data-drag="' . $item->title . '" id="headingOne' . $item->id . '" data-details=\'\' data-name="' . $item->title . '"  data-url=' . $item->url . ' ';

                if (count($item->childs)) {
                    $output .= 'data-child="' . $item->id . '" ';
                }
                $output .= 'class="panel panel-default page_col">';

            } else {
                $output .= '<li data-id="' . $item->id . '" data-details=\'\' data-name="' . $item->title . '" data-url=' . $item->url . ' class="panel panel-default list_items page_col">';
            }

            $output .= '<div class="panel-heading" role="tab" id="headingOne" >';
            $output .= '<h4 class="panel-title">';
            if (count($item->childs)) {
                $output .= '<i class="childitem fa fa-object-group" data-drop="unit"></i>';
            }
            $output .= '<a data-toggle="collapse" data-pagecolid="' . $item->id . '" data-parent="#accordion' . $item->id . '" href="#collapseOne' . $item->id . '" aria-expanded="true" aria-controls="collapseOne" class="link_name collapsed">';
            $output .= $item->title;
            $output .= '</a>';
            $output .= '</h4>';
            $output .= '</div>';
            /* Actions */
            /* Actions END */

            if (count($item->childs)) {
                $output .= '<ul id="collapseOne' . $item->id . '" class="panel-collapse collapse"  role="tabpanel" aria-labelledby="headingOne' . $item->id . '">';
                $output .= '<div class="panel-body">';
                $children = $item->childs;
                $output .= hierarchyAdminPagesList($children, false, $icon, 0, $roleSlug);
                $output .= '</div>';
                $output .= '</ul>';
            }

            $output .= '</li>';
        }
        // If this is the top parent

    }

    $output .= '</ul>';

    // Return data tree
    return $output;
}

//TODO transver in Console
function hierarchyAdminPagesListPermissions($data, $parent = true, $icon = true, $role, $checkbox = false)
{
    $children = [];
    $output = ' <ul class="panel-group" role="tablist" aria-multiselectable="true">';
    // Loop through items
    foreach ($data as $item) {//dd($roleSlug);
        if ($parent) {
            $output .= '<li data-id="' . $item->id . '" class="panel panel-default page_col">';
        } else {
            $output .= '<li data-id="' . $item->id . '" class="panel panel-default list_items page_col">';
        }

        $output .= '<div class="panel-heading" role="tab" id="headingOne" >';
        $output .= '<h4 class="panel-title">';
        $output .= '<a data-toggle="collapse" data-pagecolid="' . $item->id . '" data-parent="#accordion' . $item->id . '" href="#collapseOne' . $item->id . '" aria-expanded="true" aria-controls="collapseOne" class="link_name collapsed">';
        $output .= $item->title;

        if ($role->id === 1) {
            $output .= '<span class="pull-right" style="color:#1fec7e;">All Access</span>';
        } else {
            $permissionRepo = new \Btybug\User\Repository\PermissionRoleRepository();
            if ($item->parent) {
                $parentPerm = \Btybug\Console\Services\StructureService::AdminPagesParentPermissionWithRole($item->id, $role->id);
                if ($parentPerm) {
                    $isChecked = $permissionRepo->getBackendPagesWithRoleAndPage($role->id, $item->id);
                    $output .= "<span class=\"pull-right\">" . Form::checkbox("permission[$role->id][$item->id]", 1, ($isChecked) ? "checked" : null, ['class' => 'show-child-perm', 'data-module' => $item->module_id, 'data-pageid' => $item->id, 'data-roleid' => $role->id, 'data-page-type' => 'back', 'style' => 'left:0;']) . "</span>";
                } else {
                    $output .= '<span class="pull-right" style="color:#ec0e0a;">No Access <i class="fa fa-minus-square"></i></span>';
                }
            } else {
                $isChecked = $permissionRepo->getBackendPagesWithRoleAndPage($role->id, $item->id);
                $output .= "<span class=\"pull-right\">" . Form::checkbox("permission[$role->id][$item->id]", 1, ($isChecked) ? "checked" : null, ['class' => 'show-child-perm', 'data-module' => $item->module_id, 'data-pageid' => $item->id, 'data-roleid' => $role->id, 'data-page-type' => 'back', 'style' => 'left:0;']) . "</span>";
            }
        }

        $output .= '</a>';
        $output .= '</h4>';
        $output .= '</div>';
        /* Actions */
        /* Actions END */
        if (count($item->childs)) {
            $output .= '<ul id="collapseOne' . $item->id . '" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">';
            $output .= '<div class="panel-body">';
            $children = $item->childs;
            $output .= hierarchyAdminPagesListPermissions($children, false, $icon, $role);
            $output .= '</div>';
            $output .= '</ul>';
        }
        $output .= '</li>';
        // If this is the top parent
    }
    $output .= '</ul>';

    // Return data tree
    return $output;
}

//TODO transver in Manage
function hierarchyAdminPagesListHierarchy($data, $parent = true, $icon = true, $id = 0, $module = false)
{
    $output = '';
    // Loop through items
    if ($data) {
        foreach ($data as $item) {
            if ($module && $module != $item->module_id) return false;
            $children = $item->childs;

            if ($parent) {
                $output .= ' <ol class="pagelisting">';
            } else {
                $output .= ' <ol class="pagelisting" style="display: none;">';
            }
            $output .= '<li data-id="' . $item->id . '">';
            $output .= '<div class="listinginfo">';
            $output .= '<div class="lsitingbutton">';
            $output .= '<a href="' . url('/admin/console/structure/pages/settings', $item->id) . '" class="btn"><i class="fa fa-pencil"></i></a>';
//            if ($item->type == 'custom') {
//                $output .= '<a href="' . url('/admin/manage/frontend/pages/new', $item->id) . '" class="btn"><i class="fa fa-plus"></i></a>';
//                $output .= '<a data-href="' . url('/admin/manage/frontend/pages/delete') . '" data-key="' . $item->id . '" data-type="Page ' . $item->title . '"  class="delete-button btn trashBtn"><i class="fa fa-trash"></i></a>';
//            }
//        $output .= '<a data-toggle="collapse" data-pagecolid="' . $item->id . '" data-parent="#accordion' . $item->id . '" href="#collapseOne' . $item->id . '" aria-expanded="true" aria-controls="collapseOne" class="link_name collapsed">';
//        $output .= $item->title;
//        $output .= '</a>';
            $output .= '</div>';
            $output .= '<button class="btn btn-collapse" type="button" data-caction="collapse">';
            if (count($children)) {
                $output .= '<i class="fa fa-plus" data-collapse="' . $item->id . '" aria-hidden="true"></i>';
            }
            $output .= '</button>';

            $output .= '<span class="listingtitle">' . $item->title . '</span>';
            $output .= '</div>';
            /* Actions */
            /* Actions END */
            if (count($children)) {
                $output .= hierarchyAdminPagesListHierarchy($children, false, $icon, 0);
            }

//        $output .= '</li>';
            // If this is the top parent
            $output .= '</li>';
            $output .= '</ol>';
        }
    }

    // Return data tree
    return $output;
}

//function BBlinkFonts()
//{
//    $helper = new \Btybug\btybug\Helpers\helpers();
//    $fonts = $helper->getFontList();
//    $links = '';
//    if (count($fonts)) {
//        foreach ($fonts as $font) {
//            if (isset($font["items"]['config']))
//                $links .= "<link href='/resources/assets/fonts/" . $font['folder'] . "/" . $font['items']['config']->css . ".css' rel='stylesheet' />";
//        }
//    }
//
//    return $links;
//}
//TODO:find the right direction for this function
function BBgetUnitAttr($id, $key)
{
    $section = \Btybug\btybug\Models\Painter\Painter::findByVariation($id);
    if ($section) return $section->{$key};

    return false;

}

function BBgetLayoutAttr($id, $key)
{
    $section = \Btybug\btybug\Models\ContentLayouts\ContentLayouts::findByVariation($id);
    if ($section) return $section->{$key};

    return false;

}

//TODO: move to console module
function BBRegisterAdminPages($module, $title = null, $url, $layout = null, $parent = 0)
{

    $adminPagesRepo = new \Btybug\Console\Repository\AdminPagesRepository();
    if (!$title) $title = $module . ' page title';

    if (substr($url, 0, 6) != "/admin" && substr($url, 0, 5) != "admin") {
        $adminstr = "/admin";
        if (substr($url, 0, 1) != "/") $adminstr = $adminstr . "/";
        $url = $adminstr . $url;
    }

    $page = $adminPagesRepo->create([
        'module_id' => $module,
        'title' => $title,
        'url' => $url,
        'permission' => BBmakeUrlPermission($url),
        'slug' => uniqid(),
        'layout_id' => null,
        'is_default' => 0,
        'parent_id' => $parent
    ]);

    return $page;
}

function BBmakeUrlPermission($url, $sinbol = '.')
{
    if (!$url) return false;
    $url = str_replace('/', $sinbol, $url);
    $url = parametazor($url);
    if (isset($url[0]) && $url[0] == '.') {
        $url = substr($url, 1);
    }

    return $url;
}

function parametazor($url)
{
    preg_match('/{(.*?)}/', $url, $matches);
    if (count($matches)) {
        $url = str_replace($matches[0], 'code_1941', $url);
        preg_match('/{(.*?)}/', $url, $matches2);
        $url = parametazor($url);
    }
    $url = str_replace('code_1941', '{param}', $url);

    return $url;
}

function modules_path($path = '')
{
    return app()->basePath('vendor' . DS . 'btybug') . ($path ? DS . $path : $path);
}

function BBCheckLoginEnabled()
{
    $settings = \Btybug\btybug\Models\Settings::where('settingkey', 'enable_login')->first();
    if ($settings) {
        return ($settings->val) ? true : false;
    }

    return false;
}

function BBrenderPageContent($settings)
{
    if (!isset($settings['content_type'])) return null;
    if ($settings['content_type'] == 'template') {
        return BBRenderUnits($settings['template']);
    }
    if ($settings['content_type'] == 'editor') {
        return $settings['main_content'];
    }

    return 'Main Content';
}

function BBstyle($path, $unit = null)
{
    if ($unit) {
        $actives = \Config::get('units_css', []);
        $key = $unit->getSlug();
        if (!isset($actives[$key])) $actives[$key] = [];
        $actives[$key][] = $path;
        \Config::set('units_css', $actives);
    }
    $styles = [];
    if (\Session::has('custom.styles')) {
        $styles = \Session::get('custom.styles', []);
    }
    $styles[md5($path)] = $path;

    \Session::put('custom.styles', $styles);
}


function BBGiveMe($type, $data = null, $index = null)
{
    $type = strtolower($type);
    switch ($type) {
        case 'array':
            return \Btybug\btybug\Models\BBGiveMe::GiveArray($data);
            break;
        case 'string':
            return \Btybug\btybug\Models\BBGiveMe::GiveString($data);
            break;
        case 'int':
            return \Btybug\btybug\Models\BBGiveMe::GiveNumber($data, $index);
            break;
        default:
            print "Enter valid argument!";

    }
}

function recursiveItems($menus, $i = 0, $data = [])
{
    if (count($menus)) {
        $menu = $menus[$i];
        $data[$i] = $menu;

        if (isset($menu['dynamic']) && $menu['dynamic']) {
            $pageRepositroy = new \Btybug\Console\Repository\FrontPagesRepository();
            $page = $pageRepositroy->find($menu['id']);
            if ($page && count($page->childs)) {
                $data[$i]['children'] = recursivePageChild($page->childs, 0, $page->childs->toArray());
            }
        } else {
            if (isset($menu['children']) && count($menu['children'])) {
                $data[$i]['children'] = recursiveItems($menu['children'], 0, $data[$i]['children']);
            }
        }

        $i = $i + 1;
        if ($i != count($menus)) {
            $data = recursiveItems($menus, $i, $data);
        }

        return $data;
    }
}

function recursivePageChild($data, $i = 0, $result = [])
{
    if (count($data)) {
        $item = $data[$i];
        $result[$i] = [
            'id' => $item->id,
            'title' => $item->title,
            'url' => $item->url,
            'icon' => null,
            'children' => $item->childs->toArray()
        ];

        if (count($item->childs)) {
            $result[$i]['children'] = recursivePageChild($item->childs, 0, $result[$i]['children']);
        }

        $i = $i + 1;
        if ($i != count($data)) {
            $result = recursivePageChild($data, $i, $result);
        }

        return $result;
    }
}

function BBGetMenu($id)
{
    $menuRepo = new \Btybug\btybug\Repositories\MenuRepository();
    $menu = $menuRepo->find($id);
    $data = json_decode($menu->json_data, true);
    if (!$data) return null;
    $result = recursiveItems($data);

    return $result;
}


function hierarchyFrontendPagesListWithModuleName($data, $moduleCh = null, $icon = true, $membershipSlug = null, $checkbox = false)
{
    $plugins = new \Btybug\Uploads\Repository\Plugins();
    $plugins->modules();
    $modules = $plugins->getPlugins()->toArray();
    $plugins->plugins();
    $extras = $plugins->getPlugins()->toArray();
    $modules = array_merge($extras, (array)$modules);

    $output = "";
    if (count($data)) {
        foreach ($data as $module) {
            if ($moduleCh == null or $moduleCh->slug == $module->module_id) {
                $frontPageRepo = new \Btybug\Console\Repository\FrontPagesRepository();
                if (!$module->module_id) {
                    if ($checkbox === true) {

                        $output .= hierarchyFrontendPagesListPermissions($frontPageRepo->getMain(), true, $icon, $membershipSlug);
                    } else {

                        if ($membershipSlug == null) {
                            $output .= hierarchyAdminPagesListFull($frontPageRepo->getMain(), true, $icon, 0);
                        } else {
                            $output .= hierarchyFrontPagesList($frontPageRepo->getMain(), true, $icon, 0, $membershipSlug);
                        }
                    }
                } else {
                    $plugins->modules();
                    $value = $plugins->find($module->module_id);
                    if (!$value) {
                        $plugins->plugins();
                        $value = $plugins->find($module->module_id);
                    }
                    if ($value) {
                        if ($checkbox === true) {
                            $output .= hierarchyFrontendPagesListPermissions($frontPageRepo->PagesByModulesParent($value), true, $icon, $roleSlug);
                        } else {
                            if ($membershipSlug == null) {
                                $output .= hierarchyAdminPagesListFull($frontPageRepo->PagesByModulesParent($value), true, $icon, 0);
                            } else {
                                $output .= hierarchyFrontPagesList($frontPageRepo->PagesByModulesParent($value), true, $icon, 0, $membershipSlug);
                            }
                        }
                    }
                }
            }
        }
    }

    return $output;
}


function hierarchyFrontPagesList($data, $parent = true, $icon = true, $id = 0, $roleSlug = null)
{
    $children = [];
    $output = ' <ul id="accordion" class="panel-group" data-nav-drag="" role="tablist" aria-multiselectable="true">';
    // Loop through items
    foreach ($data as $item) {//dd($roleSlug);
        if (\Btybug\FrontSite\Services\FrontendPageService::checkAccess($item->id, $roleSlug)) {
            if ($parent) {
                $output .= '<li data-id="' . $item->id . '" data-drag="' . $item->title . '" id="headingOne' . $item->id . '" data-details=\'\' data-name="' . $item->title . '"  data-url=' . $item->url . ' ';

                if (count($item->childs)) {
                    $output .= 'data-child="' . $item->id . '" ';
                }
                $output .= 'class="panel panel-default page_col">';

            } else {
                $output .= '<li data-id="' . $item->id . '" data-details=\'\' data-name="' . $item->title . '" data-url=' . $item->url . ' class="panel panel-default list_items page_col">';
            }

            $output .= '<div class="panel-heading" role="tab" id="headingOne" >';
            $output .= '<h4 class="panel-title">';
            if (count($item->childs)) {
                $output .= '<i class="childitem fa fa-object-group" data-drop="unit"></i>';
            }
            $output .= '<a data-toggle="collapse" data-pagecolid="' . $item->id . '" data-parent="#accordion' . $item->id . '" href="#collapseOne' . $item->id . '" aria-expanded="true" aria-controls="collapseOne" class="link_name collapsed">';
            $output .= $item->title;
            $output .= '</a>';
            $output .= '</h4>';
            $output .= '</div>';
            /* Actions */
            /* Actions END */
            if (count($item->childs)) {
                $output .= '<ul id="collapseOne' . $item->id . '" class="panel-collapse collapse"  role="tabpanel" aria-labelledby="headingOne' . $item->id . '">';
                $output .= '<div class="panel-body">';
                $children = $item->childs;
                $output .= hierarchyFrontPagesList($children, false, $icon, 0, $roleSlug);
                $output .= '</div>';
                $output .= '</ul>';
            }
            $output .= '</li>';
        }
    }
    $output .= '</ul>';

    // Return data tree
    return $output;
}

function hierarchyFrontendPagesListPermissions($data, $parent = true, $icon = true, $membership, $checkbox = false)
{
    $children = [];
    $output = ' <ul class="panel-group" role="tablist" aria-multiselectable="true">';
    // Loop through items
    foreach ($data as $item) {//dd($roleSlug);
        if ($parent) {
            $output .= '<li data-id="' . $item->id . '" class="panel panel-default page_col">';
        } else {
            $output .= '<li data-id="' . $item->id . '" class="panel panel-default list_items page_col">';
        }

        $output .= '<div class="panel-heading" role="tab" id="headingOne" >';
        $output .= '<h4 class="panel-title">';
        $output .= '<a data-toggle="collapse" data-pagecolid="' . $item->id . '" data-parent="#accordion' . $item->id . '" href="#collapseOne' . $item->id . '" aria-expanded="true" aria-controls="collapseOne" class="link_name collapsed">';
        $output .= $item->title;
        $permissionRepo = new \Btybug\User\Repository\PermissionRoleRepository();
        if ($item->parent) {
            $parentPerm = \Btybug\FrontSite\Services\FrontendPageService::FrontPagesParentPermissionWithRole($item->id, $membership->id);
            if ($parentPerm) {
                $isChecked = $permissionRepo->getFrontPagesWithRoleAndPage($membership->id, $item->id);
                $output .= "<span class=\"pull-right\">" . Form::checkbox("permission[$membership->id][$item->id]", 1, ($isChecked) ? "checked" : null, ['class' => 'show-child-perm', 'data-module' => $item->module_id, 'data-pageid' => $item->id, 'data-roleid' => $membership->id, 'data-page-type' => 'front', 'style' => 'left:0;']) . "</span>";
            } else {
                $output .= '<span class="pull-right" style="color:#ec0e0a;">No Access <i class="fa fa-minus-square"></i></span>';
            }
        } else {
            $isChecked = $permissionRepo->getFrontPagesWithRoleAndPage($membership->id, $item->id);
            $output .= "<span class=\"pull-right\">" . Form::checkbox("permission[$membership->id][$item->id]", 1, ($isChecked) ? "checked" : null, ['class' => 'show-child-perm', 'data-module' => $item->module_id, 'data-pageid' => $item->id, 'data-roleid' => $membership->id, 'data-page-type' => 'front', 'style' => 'left:0;']) . "</span>";
        }

        $output .= '</a>';
        $output .= '</h4>';
        $output .= '</div>';
        /* Actions */
        /* Actions END */

        if (count($item->childs)) {
            $output .= '<ul id="collapseOne' . $item->id . '" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">';
            $output .= '<div class="panel-body">';
            $children = $item->childs;
            $output .= hierarchyFrontendPagesListPermissions($children, false, $icon, $membership);
            $output .= '</div>';
            $output .= '</ul>';
        }

        $output .= '</li>';
        // If this is the top parent

    }

    $output .= '</ul>';

    // Return data tree
    return $output;
}

function BBRenderArea($settings, $key)
{
    if (isset($settings[$key]['content_type'])) {
        if ($settings[$key]['content_type'] == 'template') {
            return BBRenderUnits($settings[$key][$key]);
        } else {
            echo $settings[$key]['editor'];
        }
    }
}

$_PLUGIN_PROVIDERS = [];
function addProvider($provider, $options = [], $force = false)
{
    global $_PLUGIN_PROVIDERS;
    $providers = isset($_PLUGIN_PROVIDERS['pluginProviders']) ? $_PLUGIN_PROVIDERS['pluginProviders'] : [];
    $providers[$provider] = compact('options', 'force');
    $_PLUGIN_PROVIDERS['pluginProviders'] = $providers;
}

function BBrenderHook($id)
{
    $hookRepository = new \Btybug\btybug\Repositories\HookRepository();
    $html = $hookRepository->render($id);

    return $html;
}

function has_setting($settings, $setting, $compare = false)
{

    if (!isset($settings[$setting])) return false;
    if ($compare) {
        if ($settings[$setting] != $compare) return false;
    }

    return true;
}

function get_settings($settings, $setting, $default = '')
{

    if (has_setting($settings, $setting)) {
        return $settings[$setting];
    }

    return $default;
}

function form_render($attr)
{
    $formRepo = new \Btybug\Console\Repository\FormsRepository();
    $form = $formRepo->findByIdOrSlug(issetReturn($attr, 'id', issetReturn($attr, 'slug', null)));

    if ($form) {
        return \Btybug\Console\Services\FormService::renderFormBlade($form, $attr);
    }
}

function field_render($attr)
{
    if (count($attr)) {
        $fieldRepo = new \Btybug\Console\Repository\FieldsRepository();
        if (isset($attr['id'])) {
            $field = $fieldRepo->findBy('id', $attr['id']);
        }

        if ($field) {
            return \Btybug\Console\Services\FieldService::getFieldHtml($field);
        }
    }
}

function get_field_by_slug($slug)
{
    $fieldRepo = new \Btybug\Console\Repository\FieldsRepository();
    $field = $fieldRepo->findBy('slug', $slug);

    return ($field) ? $field->id : null;
}

function register_frontend_page(array $data)
{
    return \Btybug\FrontSite\Services\FrontendPageService::register(
        $data
    );
}

function renderPagesInMenu($data, $parent = true, $i = 0, $children = true)
{
    $roles = new \Btybug\User\Repository\RoleRepository();
    $output = '';
    // Loop through items
    foreach ($data as $item) {
        if ($parent) {
            $output .= '<li data-id="' . $item->module_id . '" id="menu-item-front" class="no-nest">';
            $output .= '<div class="panel panel-default">';
            $output .= '<div class="bb-menu-item-title">';
            $output .= '<i></i>';
            $output .= '<strong>' . ucfirst($item->title) . ' Module Pages</strong>';
            $output .= '<div class="bb-menu-actions pull-right">';
            $output .= '<a href="javascript:" class="bb-menu-delete"> <i class="fa fa-close"></i></a>';
            $output .= '<a href="javascript:" class="bb-menu-collapse expand group-expander"> <i class="fa fa-caret-up"></i></a>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '<div class="panel-body bb-menu-group-body">';
            $output .= '<ol class="bb-sortable-static">';
        } else {
            if ($item->parent->parent == null) $i = 0;

            $output .= '<li data-id="' . $item->id . '" id="menu-item-' . $item->id . '" class="level-' . $i . '">';
            $output .= '<div class="bb-menu-item">';
            $output .= '<div class="bb-menu-item-title">';
            $output .= '<i></i><span>' . $item->title . '</span>';
            $output .= '<div class="bb-menu-actions pull-right">';
            $output .= '<a href="javascript:" class="bb-menu-delete"><i class="fa fa-close"></i></a>';
            $output .= '<a href="javascript:" class="bb-menu-collapse"><i class="fa fa-caret-down"></i></a>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '<div class="bb-menu-item-body">';
            $output .= '<div class="bb-menu-form">';
            $output .= '<div class="row">';
            $output .= '<div class="col-md-4">';
            $output .= '<div class="form-group">';
            $output .= '<label>Icon</label>';
            $output .= '<input type="text" data-placement="right" class="form-control input-sm icp readonly">';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '<div class="col-md-8">';
            $output .= '<div class="form-group">';
            $output .= '<label>Item Title</label>';
            $output .= '<input type="text" value="' . $item->title . '" class="form-control input-sm menu-item-title">';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '<div class="row">';
            $output .= '<div class="col-md-6">';
            $output .= '<div class="form-group">';
            $output .= '<label>Item URL</label>';
            $output .= '<input type="text" value="' . $item->url . '" class="form-control input-sm item-url" readonly>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '<div class="col-md-6">';
            $output .= '<div class="form-group">';
            $output .= '<label>Display Roles</label>';
            $output .= '<select name="display_roles" class="form-control input-sm">';
            $output .= '<option value="">All Visitors</option>';
            $output .= '<option value="">Members Only</option>';
            $output .= '<option value="">Guests Only</option>';
            $output .= '<option value="specific">Specific Roles</option>';
            $output .= '</select>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '<div class="form-group specific hide">';
            $output .= '<label>Select Roles</label>';
            $output .= Form::select('roles[]', $roles->pluck('slug', 'name'), null, ['multiple' => true, 'class' => 'form-control input-sm']);
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</li>';
        }

        if (count($item->childs)) {
            $output .= renderPagesInMenu($item->childs, false, $i = $i + 1, $children);
        }

        if ($parent) {
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</li>';
        }
    }

    // Return data tree
    return $output;
}

function get_pages_menu_array($data, $i = 0, $array = [])
{
    $array[$i]['title'] = $data[$i]['title'];
    $array[$i]['custom-link'] = $data[$i]['url'];
    $array[$i]['icon'] = $data[$i]['page_icon'];
    $children = $data[$i]->childs;
    if (count($children)) {
        $array[$i]['children'] = get_pages_menu_array($children);
    }
    $i++;
    if (isset($data[$i])) {
        $array = get_pages_menu_array($data, $i, $array);
    }

    return $array;
}

function renderSavedPagesInMenu($data, $parent = true, $i = 0)
{
    $roles = new \Btybug\User\Repository\RoleRepository();
    $output = '';
//    dd($data);
    // Loop through items
    foreach ($data as $item) {
        if ($parent) {
            $output .= '<li data-id="' . $item->module_id . '" id="menu-item-front" class="no-nest">';
            $output .= '<div class="panel panel-default">';
            $output .= '<div class="bb-menu-item-title">';
            $output .= '<i></i>';
            $output .= '<strong>' . ucfirst($item->title) . ' Module Pages</strong>';
            $output .= '<div class="bb-menu-actions pull-right">';
            $output .= '<a href="javascript:" class="bb-menu-delete"> <i class="fa fa-close"></i></a>';
            $output .= '<a href="javascript:" class="bb-menu-collapse expand group-expander"> <i class="fa fa-caret-up"></i></a>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '<div class="panel-body bb-menu-group-body">';
            $output .= '<ol class="bb-sortable-static">';
        } else {
//            if($item->parent->parent == null) $i = 0;

            $output .= '<li data-id="' . $item['id'] . '" data-title="' . $item['title'] . '" data-icon="' . $item['icon'] . '" data-url="' . $item['url'] . '" data-dynamic="' . (isset($item['dynamic']) ?? null) . '">';
            $output .= '<div class="bb-menu-item">';
            $output .= '<div class="bb-menu-item-title">';
            $output .= '<i></i><span>' . $item['title'] . '</span>';
            $output .= '<div class="bb-menu-actions pull-right">';
            $output .= '<a href="javascript:" class="bb-menu-delete"><i class="fa fa-close"></i></a>';
            $output .= '<a href="javascript:" class="bb-menu-collapse"><i class="fa fa-caret-down"></i></a>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '<div class="bb-menu-item-body">';
            $output .= '<div class="bb-menu-form">';
            $output .= '<div class="row">';
            $output .= '<div class="col-md-4">';
            $output .= '<div class="form-group">';
            $output .= '<label>Icon</label>';
            $output .= '<input type="text" value="' . $item['icon'] . '" data-placement="right" class="form-control input-sm icp readonly">';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '<div class="col-md-8">';
            $output .= '<div class="form-group">';
            $output .= '<label>Item Title</label>';
            $output .= '<input type="text" value="' . $item['title'] . '" class="form-control input-sm menu-item-title">';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';

            $output .= '<div class="row">';
            $output .= '<div class="col-md-12">';
            $output .= '<div class="form-group">';
            $output .= '<label>* make this dynamic</label>';

            if (isset($item["dynamic"]) && $item["dynamic"]) {
                $output .= '<input type="checkbox" value="1" checked="checked" class="input-sm menu-item-dynamic">';
            } else {
                $output .= '<input type="checkbox" value="1"  class="input-sm menu-item-dynamic">';
            }
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';

            $output .= '<div class="row">';
            $output .= '<div class="col-md-6">';
            $output .= '<div class="form-group">';
            $output .= '<label>Item URL</label>';
            $output .= '<input type="text" value="' . $item['url'] . '" class="form-control input-sm item-url" readonly>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '<div class="col-md-6">';
            $output .= '<div class="form-group">';
            $output .= '<label>Display Roles</label>';
            $output .= '<select name="display_roles" class="form-control input-sm">';
            $output .= '<option value="">All Visitors</option>';
            $output .= '<option value="">Members Only</option>';
            $output .= '<option value="">Guests Only</option>';
            $output .= '<option value="specific">Specific Roles</option>';
            $output .= '</select>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '<div class="form-group specific hide">';
            $output .= '<label>Select Roles</label>';
            $output .= Form::select('roles[]', $roles->pluck('slug', 'name'), null, ['multiple' => true, 'class' => 'form-control input-sm']);
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
            if (isset($item['children'])) {
                $output .= '<ol>';
                $output .= renderSavedPagesInMenu($item['children'], false, $i + 1);
                $output .= '</ol>';
            }
            $output .= '</li>';
        }


        if ($parent) {
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</li>';
        }
    }

    // Return data tree
    return $output;
}


function renderFrontPagesInMenu($data, $parent = true, $i = 0, $children = true)
{
    $roles = new \Btybug\User\Repository\RoleRepository();
    $output = '';
    // Loop through items
    foreach ($data as $item) {
        $output .= '<li data-id="' . $item->id . '" id="menu-item-' . $item->id . '" class="level-' . $i . '" 
        data-title="' . $item->title . '" data-icon="fa-align-justify" data-url="' . $item->url . '">';
        $output .= '<div class="bb-menu-item">';
        $output .= '<div class="bb-menu-item-title">';
        $output .= '<i></i><span>' . $item->title . '</span>';
        $output .= '<div class="bb-menu-actions pull-right">';
        $output .= '<a href="javascript:" class="bb-menu-delete"><i class="fa fa-close"></i></a>';
        $output .= '<a href="javascript:" class="bb-menu-collapse"><i class="fa fa-caret-down"></i></a>';
        $output .= '</div>';
        $output .= '</div>';
        $output .= '<div class="bb-menu-item-body">';
        $output .= '<div class="bb-menu-form">';
        $output .= '<div class="row">';
        $output .= '<div class="col-md-4">';
        $output .= '<div class="form-group">';
        $output .= '<label>Icon</label>';
        $output .= '<input type="text" data-placement="right" class="form-control input-sm icp">';
        $output .= '</div>';
        $output .= '</div>';
        $output .= '<div class="col-md-8">';
        $output .= '<div class="form-group">';
        $output .= '<label>Item Title</label>';
        $output .= '<input type="text" value="' . $item->title . '" class="form-control input-sm menu-item-title">';
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</div>';

        $output .= '<div class="row">';
        $output .= '<div class="col-md-12">';
        $output .= '<div class="form-group">';
        $output .= '<label>* make this dynamic</label>';

        if (isset($item["dynamic"]) && $item["dynamic"]) {
            $output .= '<input type="checkbox" value="1" checked="checked" class="input-sm menu-item-dynamic">';
        } else {
            $output .= '<input type="checkbox" value="1"  class="input-sm menu-item-dynamic">';
        }
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</div>';

        $output .= '<div class="row">';
        $output .= '<div class="col-md-6">';
        $output .= '<div class="form-group">';
        $output .= '<label>Item URL</label>';
        $output .= '<input type="text" value="' . $item->url . '" class="form-control input-sm item-url" readonly>';
        $output .= '</div>';
        $output .= '</div>';
        $output .= '<div class="col-md-6">';
        $output .= '<div class="form-group">';
        $output .= '<label>Display Roles</label>';
        $output .= '<select name="display_roles" class="form-control input-sm">';
        $output .= '<option value="">All Visitors</option>';
        $output .= '<option value="">Members Only</option>';
        $output .= '<option value="">Guests Only</option>';
        $output .= '<option value="specific">Specific Roles</option>';
        $output .= '</select>';
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</div>';
        $output .= '<div class="form-group specific hide">';
        $output .= '<label>Select Roles</label>';
        $output .= Form::select('roles[]', $roles->pluck('slug', 'name'), null, ['multiple' => true, 'class' => 'form-control input-sm']);
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</div>';

        if (count($item->childs)) {
//	        dd($item->childs);
            $output .= '<ul class="menu-item-children">' . renderFrontPagesInMenu($item->childs, false, $i + 1, $children) . '</ul>';
        }
        $output .= '</li>';

    }

    // Return data tree
    return $output;
}

function recursive_hook_menus()
{
}

function get_classifier_items($classify_id)
{
    $classifyRepo = new \Btybug\FrontSite\Repository\ClassifierRepository();
    $classify = $classifyRepo->findby('id', $classify_id);

    return ($classify) ? $classify->classifierItem : [];
}

function get_classifiers($array = false)
{
    $classifyRepo = new \Btybug\FrontSite\Repository\ClassifierRepository();
    $classifiers = $classifyRepo->pluck('title', 'id');

    return ($array) ? $classifiers->toArray() : $classifiers;
}

function get_field_data($field)
{
    if ($field && count($field['json_data'])) {
        switch ($field['data_source']) {
            case "related" :
                if (isset($field['json_data']['data_source_table_name']) && isset($field['json_data']['data_source_columns'])) {
                    $table = $field['json_data']['data_source_table_name'];
                    $column = $field['json_data']['data_source_columns'];
                    if (\Schema::hasColumn($table, $column)) {
                        $result = \DB::table($table)->pluck($column, 'id');

                        return (count($result)) ? $result->toArray() : [];
                    }
                }
                break;
            case "manual" :
                if (isset($field['json_data']['manual']) && $field['json_data']['manual']) {
                    return (count(explode(',', $field['json_data']['manual']))) ? explode(',', $field['json_data']['manual']) : [];
                }
                break;
        }
    }

    return null;
}

function print_field_name($field)
{
    return $field['table_name'] . '_' . $field['column_name'];
}

//TODO: make this for plugins
function register_form()
{

}

// Extract ajax data
function ajaxExtract($data)
{
    $return = [];
    foreach ($data as $datum) {
        $return[$datum['name']] = $datum['value'];
    }

    return $return;
}

function get_frontend_pages_pluck($is_array = false)
{
    $pageRepository = new \Btybug\Console\Repository\FrontPagesRepository();
    $page = $pageRepository->pluck('title', 'id');

    return ($is_array) ? $page->toArray() : $page;
}

function getDinamicStyle($filename)
{
    $styles = \App\Http\Controllers\PhpJsonParser::getClasses(base_path('public/dinamiccss/' . $filename . '.css'));

    return $styles;
}

function BBmakeCssClasses($filename)
{
    $parser = new \App\Http\Controllers\PhpJsonParser();
    $parser->makeCssClasses(base_path('public/dinamiccss/' . $filename . '.css'));

    return $parser;
}

function getDinamicStyleDemo($filename)
{
    $styles = \App\Http\Controllers\PhpJsonParser::getClassesForDemo(base_path('public/dinamiccss/' . $filename . '.css'));

    return $styles;
}

function getDinamicStyleForCssFileDemo($filename, $table_name)
{
    $styles = \App\Http\Controllers\PhpJsonParser::getClassesCssFileDemo($filename, $table_name);

    return $styles;
}

function useDinamicStyle($filename)
{
    return '<link href="' . asset('public/dinamiccss/' . $filename . '.css?v=' . rand(111, 999)) . '" rel="stylesheet">';
}

function useDinamicStyleByPath($path, $main)
{
    $arr = explode(DS, $path);
    $filename = $arr[count($arr) - 1];
    $foldername = $arr[count($arr) - 2];

    return '<link href="' . asset($main . DS . $foldername . DS . $filename . '?v=' . rand(111, 999)) . '" rel="stylesheet">';
}

function BBregistreApi($name, $edit_url, $data = [])
{
    $data['edit_url'] = $edit_url;
    $data['name'] = $name;
    $setting = new \Btybug\btybug\Repositories\AdminsettingRepository();

    return $setting->createOrUpdateToJson($data, 'out_side_api', md5($name));
}

function BBgetAllAegistreApi()
{
    $setting = new \Btybug\btybug\Repositories\AdminsettingRepository();

    return $setting->getAllSettingsBySection('out_side_api');
}

function BBeditApisettings($name, array $data)
{
    $settingRepository = new \Btybug\btybug\Repositories\AdminsettingRepository();
    $setting = $settingRepository->getSettings('out_side_api', md5($name));
    if ($setting) {
        $settingData = json_decode($setting->val, true);
        $data['name'] = $settingData['name'];
        $data['edit_url'] = $settingData['edit_url'];
        $setting->val = json_encode($data, true);

        return $setting->save();
    }

    return false;
}

function BBgetApiSettings($name)
{
    $settingRepository = new \Btybug\btybug\Repositories\AdminsettingRepository();

    return $settingRepository->getSettings('out_side_api', md5($name));
}

function getCmsConnectionByID($id)
{
    $repository = new \Btybug\FrontSite\Repository\CmsConnectionsRepository();

    return ($id) ? $repository->find($id) : null;
}

function BBgetContentLayoutVariationsPluck($layout)
{
    $variations = $layout->variations()->all();
    $data = [];
    if (count($variations)) {
        foreach ($variations as $variation) {
            $data[$variation->id] = $variation->title;
        }
    }

    return $data;
}

function BBeditor()
{
//    BBscript(public_path('js/tinymice/tinymce.min.js'));
//    BBscript(public_path('js/editor.js'));
    return '<textarea name=\'test\' class=\'cms_editor\'></textarea>';
}

function BBgetFrontPagesPanels($page, $poss = 'front')
{
    $panels = Config::get($poss . '_page_edit_widget', []);
    foreach ($panels as $panel) {
        foreach ($panel as $key => $data) {
            switch ($data['id']) {
                case "panel_info":
                    if ($page->panel_info) {
                        BBrenderPanel($data['view'], $key, $page);
                    }
                    break;
                case "panel_header_footer":
                    if ($page->panel_header_footer) {
                        BBrenderPanel($data['view'], $key, $page);
                    }
                    break;
                case "panel_main_content":
                    if ($page->panel_main_content) {
                        BBrenderPanel($data['view'], $key, $page);
                    }
                    break;
                case "panel_assets":
                    if ($page->panel_assets) {
                        BBrenderPanel($data['view'], $key, $page);
                    }
                    break;
                default:
                    if (!in_array($data['id'], ['panel_info', 'panel_header_footer', 'panel_main_content', 'panel_assets'])) {
                        BBrenderPanel($data['view'], $key, $page);
                    }
                    break;
            }
        }
    }
}

function BBrenderPanel($view, $title, $page)
{
    echo ' <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 page-data p-20">
 <div class="panel panel-default custompanel m-t-20"><div class="panel-heading">' . $title . '</div>
 <div class="panel-body">' .
        View::make($view, compact('page'))->render()
        . '
            </div>
            </div>
            </div>';
}

function BBgetProfile($id, $type = 'js', $render = false)
{
    $profileRepository = new \Btybug\Uploads\Repository\VersionProfilesRepository();
    $profile = $profileRepository->findOneByMultiple(['id' => $id, 'type' => $type]);
    if ($profile) {
        if ($render) {
            if (\File::exists("public/" . $profile->hint_path)) {
                if ($type == 'js') {
                    return Html::script("public/" . $profile->hint_path);
                } else {
                    return Html::style("public/" . $profile->hint_path);
                }
            }
        } else {
            return $profile;
        }
    }
}

function BBlinkAssets($data, $type = 'js')
{
    $assets = '';
    if (count($data)) {
        foreach ($data as $url) {
            if ($type == 'js') {
                $assets .= Html::script($url);
            } else {
                $assets .= Html::style($url);
            }
        }
    }

    return $assets;
}

function BBRegisterProfile($name, $file_path, $type)
{
    $profileRepository = new \Btybug\Uploads\Repository\VersionProfilesRepository();
    $profile = $profileRepository->create([
        'name' => $name,
        'hint_path' => $file_path,
        'type' => $type,
        'structured_by' => true,
        'user_id' => Auth::id(),
    ]);

    return $profile;
}

function BBmakePabeCss($page)
{
    $stylePaths = session()->get('custom.styles', []);
    $contentArray = [];
    $content = '';
    foreach ($stylePaths as $path) {
        if (\File::exists($path)) {
            $file = \File::get($path);
            $contentArray[md5($file)] = $file;
        }
    }
    foreach ($contentArray as $style) {
        $content .= "\r\n" . $style;
    }
    session()->forget('custom.styles');
    if (File::exists(public_path('css' . DS . 'pages' . DS . str_replace(' ', '-', $page->title) . '.css'))) {
        $old = File::get(public_path('css' . DS . 'pages' . DS . str_replace(' ', '-', $page->title) . '.css'));
        if (md5($old) == md5($content)) return;
    }
    File::put(public_path('css' . DS . 'pages' . DS . str_replace(' ', '-', $page->title) . '.css'), $content);
}

function BBmakePabeJs($page)
{
    $stylePaths = session()->get('custom.scripts', []);
    $contentArray = [];
    $content = '';
    foreach ($stylePaths as $path) {
        if (\File::exists($path)) {
            $file = \File::get($path);
            $contentArray[md5($file)] = $file;
        }
    }
    foreach ($contentArray as $style) {
        $content .= "\r\n" . $style;
    }
    session()->forget('custom.scripts');
    if (File::exists(public_path('js' . DS . 'pages' . DS . str_replace(' ', '-', $page->title) . '.js'))) {
        $old = File::get(public_path('js' . DS . 'pages' . DS . str_replace(' ', '-', $page->title) . '.js'));
        if (md5($old) == md5($content)) return;
    }
    File::put(public_path('js' . DS . 'pages' . DS . str_replace(' ', '-', $page->title) . '.js'), $content);
}

function get_filename_from_path($path, $delimiter = '\\')
{
    $exploded = explode($delimiter, $path);

    return end($exploded);
}

function BBmargeJs()
{
    $path = public_path('js' . DS . 'pages');
    $files = File::allFiles($path);
    $content = '';
    foreach ($files as $file) {
        $content .= "\r\n";
        $content .= (File::get($file));
    };
    File::put(public_path('js' . DS . 'cms_main.js'), $content);
}

function BBscript($path, $unit = null)
{
    if ($unit) {
        $actives = \Config::get('units_js', []);
        $key = $unit->getSlug();
        if (!isset($actives[$key])) $actives[$key] = [];
        $actives[$key][] = $path;
        \Config::set('units_js', $actives);
    }


    $scripts = [];
    if (\Session::has('custom.scripts')) {
        $scripts = \Session::get('custom.scripts', []);
    }
    $scripts[md5($path)] = $path;
    \Session::put('custom.scripts', $scripts);
}

function BBpageAssetsOptimise()
{
    $home = new \Btybug\btybug\Models\Home();
    $frontPagesRepository = new \Btybug\Console\Repository\FrontPagesRepository();
    $unitsRepository = new \Btybug\Uploads\Repository\UnitsRepository();
    $assetRepository = new \Btybug\Uploads\Repository\AssetsRepository();
    $pages = $frontPagesRepository->getAll();
    $collection = [];
    foreach ($pages as $page) {
        $a = $home->render($page->url, [], true, $page);
        $units = \Config::get('units', []);
        $activesJs = \Config::get('units_js', []);
        $activesCss = \Config::get('units_css', []);

        foreach ($units as $unit) {
            $slug = $unit['unit']->slug;
            $variation_id = $unit['variation']->id;
            $unitsRepository->updateOrCreate(['page_id' => $page->id, 'slug' => $slug, 'variation_id' => $variation_id], []);
            if (isset($activesJs[$slug]) && is_array($activesJs[$slug])) {
                foreach ($activesJs[$slug] as $js) {
                    $unitModel = $unitsRepository->findOneByMultiple(['page_id' => $page->id, 'slug' => $slug, 'variation_id' => $variation_id]);
                    $assetRepository->updateOrCreate(['unit_id' => $unitModel->id, 'path' => $js], ['type' => 'js']);
                }
            }
            if (isset($activesCss[$slug]) && is_array($activesCss[$slug])) {
                foreach ($activesCss[$slug] as $css) {
                    $unitModel = $unitsRepository->findOneByMultiple(['page_id' => $page->id, 'slug' => $slug, 'variation_id' => $variation_id]);
                    $assetRepository->updateOrCreate(['unit_id' => $unitModel->id, 'path' => $css], ['type' => 'css']);
                }
            }
        }

    }
}

function BBgetVersion($id, $col = "name")
{
    $versionRepositroy = new \Btybug\Uploads\Repository\VersionsRepository();
    $v = $versionRepositroy->find($id);

    return ($v) ? $v->$col : null;
}

function BBgetProfileAssets($id, $type = 'js', $section = 'headerJs')
{
    if ($id == false) {
        $adminsettingRepository = new \Btybug\btybug\Repositories\AdminsettingRepository();
        $model = $adminsettingRepository->getVersionsSettings('versions', 'frontend');
        $id = issetReturn($model, 'js_data');
    }

    $profileRepository = new \Btybug\Uploads\Repository\VersionProfilesRepository();
    $profile = $profileRepository->findOneByMultiple(['id' => $id, 'type' => $type]);
    $result = '';
    if ($profile) {
        $assets = $profile->files;
        if (isset($assets[$section]) && count($assets[$section])) {
            foreach ($assets[$section] as $item) {
                $path = str_after($item['path'], 'public_html');
                $path = str_after($path, 'public');
                if (!starts_with($path, '/resources')) $path = 'public' . DS . $path;
                if ($type == 'js') {
                    if ($item['type'] == 'link') {
                        $result .= Html::script($item['path']) . "\r\n";
                    } else {
                        $result .= Html::script($path) . "\r\n";
//                        if (\File::exists($item['path'])) {
//                            try {
//                                $result .= "<script>" . \File::get($item['path']) . "</script> \r\n";
//                            } catch (\Exception $e) {
////                               dd($item,$e->getMessage());
//                            }
//                        }
                    }
                } else {
                    if ($item['type'] == 'link') {
                        $result .= Html::style($item['path']) . "\r\n";
                    } else {
                        if (\File::exists($item['path'])) {
                            $result .= "<style>" . \File::get($item['path']) . "</style> \r\n";
                        }
                    }
                }
            }
        }

        return $result;
    }
}

function BBgetTable($table)
{
    return DB::table($table);
}

function BBgetLayoutAttribute($id, $attribute = 'title')
{
    $layout = \Btybug\btybug\Models\ContentLayouts\ContentLayouts::find($id);

    return ($layout) ? $layout->$attribute : 'No Layout';
}

function BBmediaButton($name, $model = null, $text = 'Open Media')
{
    static $a = 0;
    if (!$a) {
        \Eventy::action('my.scripts', ['url' => '//cdnjs.cloudflare.com/ajax/libs/require.js/2.3.5/require.min.js', 'attributes' => ['data-main' => url('public/elFinder/main.default.js')]]);
        \Eventy::action('my.scripts', ['url' => url('public/elFinder/elfinder.js')]);
        \Eventy::action('my.scripts', ['url' => url('public/elFinder/media_button.js')]);
        $modalHtml = View::make('media::_partials.modal')->render();
        \Eventy::action('my.extraHtml', $modalHtml);
    }
    $a++;
    $value = '';
    $value_tmp = '';
    if ($model) {
        if (is_object($model) && isset($model->$name)) {
            $value = 'value=' . $model->$name;
            $prop = "tmp_" . $name;
            if (isset($model->$prop))
                $value_tmp = 'value=' . $model["tmp_" . $name];
        }
        if (is_array($model) && isset($model[$name])) {
            $value = 'value=' . $model[$name];
            if (isset($model["tmp_" . $name]))
                $value_tmp = 'value=' . $model["tmp_" . $name];
        }
    }
//    return "<button type='button' class='btn btn-info btn-md btnsettingsModal media-modal-open' data-id='".$name.'-'.$a."'>Open Media</button><input type='hidden' $value id='".$name.'-'.$a."' name='$name'>";
    return View::make('media::drive.galery',compact('a','value','value_tmp','name'))->render();
}

function BBgetUsersPluck()
{
    $repository = new \Btybug\User\Repository\UserRepository();

    return $repository->pluck('username', 'id')->toArray();
}

