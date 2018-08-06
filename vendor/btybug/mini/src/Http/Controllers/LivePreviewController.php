<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 09.07.2018
 * Time: 14:39
 */

namespace Btybug\Mini\Http\Controllers;


use Btybug\btybug\Models\ContentLayouts\ContentLayouts;
use Btybug\btybug\Models\Settings;
use Btybug\Console\Repository\FrontPagesRepository;
use Btybug\Mini\Model\MiniSuperLayouts;
use Illuminate\Http\Request;

class LivePreviewController extends MiniController
{

    public function getIngex($id, FrontPagesRepository $repository, Request $request)
    {
        $this->ennable($request);
        $page = $this->user->frontPages()->find($id);
        $layout = $page->page_layout;
        if (!$layout){
            $layout = Settings::where('section', 'minicms')->where('settingkey', 'default_layout')->select('val AS page_layout')->first()->page_layout;
        }
        $slug = $request->get('variations',$layout);
        if (!$slug || !strpos($slug,'.default')) $slug = $layout . '.default';
        $inherit = $request->get('inherit', $page->page_layout_inheritance);
        if ($inherit) {
            $parent = $page->parent;
            if ($parent) {
                $page->page_layout_settings = $parent->page_layout_settings;
                $page->page_layout = $parent->page_layout;
                $slug = $parent->page_layout;
            }
        }
        $page->page_layout_inheritance = $inherit;
        $settings =(@json_decode($page->page_layout_settings, true)) ? json_decode($page->page_layout_settings, true) : [];
        $settings['main_unit'] = $request->get('main_unit',$page->template);
        if ($slug) {
            $view = MiniSuperLayouts::renderPageLivePreview($slug, $settings, $page);
            return $view ? $view : abort('404');
        } else {
            abort('404');
        }
    }
    public function postPageSectionSettings(Request $request,$page_id,FrontPagesRepository $repository)
    {
        if($request->save){
            $slug = explode('.', $request->slug);
            $page=$repository->find($page_id);
            if(! $request->inherit){
                $page->page_layout=$slug[0];
                $page->page_layout_settings=json_encode($request->all(),true);
            }
            $page->page_layout_inheritance = $request->inherit;

            $page->save();
        }
        $output = MiniSuperLayouts::savePageSectionSettings($request->slug, $request->itemname, $request->except(['_token', 'itemname']), null);
        return response()->json([
            'url' => ($request->save) ? url()->previous() : false,
            'html' => isset($output['data']) ? $output['data'] : false
        ]);
    }
}