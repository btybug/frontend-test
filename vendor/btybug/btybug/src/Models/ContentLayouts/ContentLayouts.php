<?php namespace Btybug\btybug\Models\ContentLayouts;

use Btybug\btybug\Models\Painter\BasePainter;
use Btybug\btybug\Models\Universal\VariationAccess;
use Btybug\btybug\Repositories\AdminsettingRepository;
use Btybug\btybug\Repositories\HookRepository;
use Btybug\FrontSite\Models\FrontendPage;
use File;

/**
 * Class ContentLayouts
 * @package Btybug\btybug\Models\ContentLayouts
 */
class ContentLayouts extends BasePainter implements VariationAccess
{
    use autoinclude;
    /**
     * /**
     * @var string
     */
    protected $dir;
    /**
     * @var string
     */
    protected $mdir;
    /**
     * @var
     */
    protected $attributes;


    public function getStoragePath()
    {
        return config('painter.ContentLayouts');
    }

    /**
     * @return mixed
     */
    public function getConfigPath()
    {
        return storage_path(config('painter.LAYOUT'));
    }

    public function scopeFindByVariation($id)
    {
        $slug = explode('.', $id);
        $tpl = self::find($slug[0]);

        return $tpl;
    }

    public function scopeFind(string $slug)
    {
        $path = $this->getItemConfigJsonPath($slug);
        return $this->makeItem($path);
    }

    public function scopeRenderLivePreview(string $slug)
    {
        dd(2);
        $ui = $model = $this->findByVariation($slug);

        if (!$ui) {
            return false;
        }
        $variation = $ui->variations(false)->find($slug);

        $settings = [];
        if (count($variation->settings) > 0) {
            $settings = $variation->settings;
        }

        $body = url('/admin/uploads/gears/settings-iframe', $slug);
        $dataSettings = url('/admin/uploads/gears/settings-iframe', $slug) . '/settings';
        $data['body'] = $body;
        $data['settings'] = $dataSettings;
        dd(1);
        return view('uploads::gears.units.preview', compact(['model', "ui", 'data', 'settings', 'variation']));
    }

    /**
     * @return string
     */
    public static function defaultPageSection()
    {
        $active = self::active();
        return 'ContentLayouts.' . $active->folder . '.' . $active->layout;
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        $method = 'scope' . ucfirst($name);
        $_this = new static;
        if (method_exists($_this, $method)
            && is_callable(array($_this, $method))
        ) {
            return call_user_func_array([$_this, 'scope' . ucfirst($name)], $arguments);
        }
    }

    /**
     * @return \Illuminate\Support\Collection
     */

    public static function renderPageBody($id, $settings = [])
    {
        if (File::exists(storage_path('pages_body' . DS . $id . '.json'))) {
            $file = json_decode(File::get(storage_path('pages_body' . DS . $id . '.json')), true);
            $body = self::findByVariation($file['id']);
            $settings = array_merge($settings, $file);
            if ($body) {
                return $body->render($settings);
            }
        }
        return null;
    }

    /**
     * @param $slug
     * @return \Illuminate\Support\Collection|null
     */

    /**
     * @param $id
     * @return null
     */
    public static function findByVariation($id)
    {
        $slug = explode('.', $id);
        $layout = self::find($slug[0]);
        if ($layout) {
            return $layout;
        } else {
            return null;
        }
    }

    /**
     * @param $slug
     * @return mixed
     */
    public static function renderLivePreview($slug, $settings = [])
    {
        $variation = self::findVariation($slug);

        $data['view'] = "uploads::gears.page_sections.live_preview.settings";
        $data['request'] = $settings;
        if ($variation) {
            $data['variation'] = $variation;
            return self::findByVariation($slug)->renderSettings($data);
        } else if (self::find($slug)) {
            if (!$variation) {
                $variation = self::find($slug)->variations(false)->find($slug);
            }
            $data['variation'] = $variation;
            return self::find($slug)->renderSettings($data);
        }
    }

    public static function renderPageLivePreview($slug, $settings = [], $page)
    {
        $variation = self::findVariation($slug);
        $data['page'] = $page;
        $data['view'] = "uploads::gears.page_sections.live_preview.page_settings";
        $data['request'] = $settings;
        if ($variation) {
            $data['variation'] = $variation;
            $layout = self::findByVariation($slug);
            $data['variations'] = $layout->variations(false)->all()->getItems();
            return $layout->renderSettings($data);
        } else if (self::find($slug)) {
            if (!$variation) {
                $layout = self::find($slug);
                $data['variations'] = $layout->variations(false)->all()->getItems();
                $variation = $layout->variations(false)->find($slug);
            }
            $data['variation'] = $variation;
            return self::find($slug)->renderSettings($data);
        }else{
            $adminsettingRepository = new AdminsettingRepository();
            $model = $adminsettingRepository->getSystemSettings();
            if(isset($model['page_layout'])){
                $slug= $model['page_layout'];
                $variation = self::findVariation($slug);
                if ($variation) {
                    $data['variation'] = $variation;
                    $layout = self::findByVariation($slug);
                    $data['variations'] = $layout->variations(false)->all()->getItems();
                    return $layout->renderSettings($data);
                }
            }
        }
    }

    /**
     * @param $id
     * @return null
     */
    public static function findVariation($id)
    {
        $layout = new self();
        if($contentLayout = $layout->findByVariation($id)){
            return $contentLayout->variations(false)->find($id);

        }
        return null;
    }

    /**
     * @param $slug
     * @param null $title
     * @param $data
     * @param null $isSave
     * @return array|bool
     */
    public static function savePageSectionSettings($slug, $title = NULL, $data, $isSave = NULL)
    {
        if ($isSave && $isSave == 'save') {

            // $variation = new static();
            $tpl = self::findByVariation($slug);
            $existingVariation = $variation = $tpl->variations(false)->find($slug);
            $main_unit = null;
            if (isset($data['main_unit'])) {
                $main_unit = $data['main_unit'];
            }
            $dataToInsert = [
                'title' => $title,
                'settings' => $data
            ];
            if (!$existingVariation) {
                $variation = new ContentLayoutVariations($tpl);
                if ($tpl->autoinclude) {
                    $variation = $tpl->makeAutoIncludeVariation(null, $dataToInsert);

                } else {
                    $variationID = explode('.', $slug);
                    if (isset($variationID[1])) {
                        $pageID = explode('_', $variationID[1]);
                        $dataToInsert['used_in'] = end($pageID);
                    }
                    $variation = $variation->createVariation($dataToInsert, issetReturn($variationID, 1, null), (isset($variationID[1])) ? true : false);
                }
            } else {
                FrontendPage::where('page_layout', $slug)->update(['content_type' => 'template', 'template' => $main_unit]);
                $existingVariation->setAttributes('title', $title);
                $existingVariation->setAttributes('settings', $dataToInsert['settings']);
                $variation = $existingVariation;
            }

            if (isset($data['save_us'])) {
                $variation->removeAttributes('hidden');
                $variation->removeAttributes('used_in');
                if ($new = $variation->copy()) {
                    return ['id' => $new->id];
                }
            }

            if ($variation->save()) {
                return ['id' => $variation->id];
            }
        } else {
            if (isset($data['copy_data'])) {
                $tpl = self::findByVariation($data['variation_id']);
                $variation = $tpl->variations(false)->find($data['variation_id']);

                if ($tpl && $variation) {
                    $settingsData = $variation->settings;
                    $settingsData['variation'] = $variation;
                    return ['data' => $tpl->renderLive($settingsData)];
                }
            } else {
                $tpl = self::findByVariation($slug);
                $variation = self::findVariation($slug);
                $data['variation'] = $variation;
                $data['live_preview_action'] = true;
                return ['data' => $tpl->renderLive($data)];
            }
        }

        return false;
    }

    public static function deleteVariation($id)
    {
        self::findByVariation($id)->variations(false)->deleteVariation($id);
        $slug = explode('.', $id);
        $tpl = self::find($slug[0]);
        return ContentLayoutVariations::delete($id, $tpl);
    }

    /**
     * @return array|bool
     */
    public function delete()
    {
        $mainConfigFilePath = storage_path('app' . DS . 'page_sections.json');
        if (\File::exists($mainConfigFilePath)) {
            $mainConfigFile = \File::get(storage_path('app' . DS . 'page_sections.json'));
            $mainConfigFileDecoded = json_decode($mainConfigFile, true);
            if ($mainConfigFileDecoded) {
                if (array_key_exists($this->slug, $mainConfigFileDecoded)
                    && isset($mainConfigFileDecoded[$this->slug]['slug'])
                    && $mainConfigFileDecoded[$this->slug]['slug'] == $this->slug) {
                    unset($mainConfigFileDecoded[$this->slug]);
                    $editedMainConfigFileEncoded = json_encode($mainConfigFileDecoded);
                    if (\File::put($mainConfigFilePath, $editedMainConfigFileEncoded)) {
                        return \File::deleteDirectory($this->path);
                    }
                }
            }
        }
        return false;
    }

    /**
     * @return mixed
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param array $attributes
     * @return array
     */
    public function setAttributes($key, $value)
    {
        $attributes = $this->attributes;
        $attributes[$key] = $value;
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * @return mixed|null
     */
    public function save()
    {
        $attributes = $this->attributes;
        $attributes = json_encode($attributes, true);
        File::put($this->path . '/config.json', $attributes);
        return $this;
    }

    /**
     * @param $name
     * @return bool
     */
    public function __get($name)
    {
        $result = isset($this->toArray()[$name]) ? $this->toArray()[$name] : false;
        return $result;
    }

    /**
     * @return bool
     */
    public function toArray()
    {
        if (isset($this->attributes)) return $this->attributes;
        return false;
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        $method = 'scope' . ucfirst($name);
        if (method_exists($this, $method)
            && is_callable(array($this, $method))
        ) {
            return call_user_func_array([$this, $method], $arguments);
        }
    }

    /**
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        $result = isset($this->toArray()[$name]) ? true : false;
        return $result;
    }

    /**
     * @return mixed
     */


    /**
     * @param $slug
     * @return mixed
     */
    public function getPluginLayouts($slug)
    {

        $json_data = json_decode(File::get($this->mdir), true);
        return $json_data;
    }

    public function scopeStyle($path)
    {
        return \Html::style('units/styles/' . $this->self_type . '/' . $this->slug . '/' . $path);
    }

    public function scopeScript($path)
    {
        return \Html::script('units/scripts/' . $this->self_type . '/' . $this->slug . '/' . $path);
    }

    public function addTag($tag)
    {
        $this->tags[] = $tag;
        return $this;
    }

    public function removeTag($tag)
    {
        if (is_array($this->tags)) {
            $index = array_search($tag, $this->tags);
            if ($index) {
                unset($this->tags[$index]);
            }
        }

    }

    protected function scopeMakeVariation($setteings = [])
    {
        $variation = new ContentLayoutVariations();
        return $variation->createVariation($this, $setteings);
    }

    /**
     * @param $type
     * @return \Illuminate\Support\Collection
     */
    public function scopeFindByType($type)
    {
        $result = [];
        foreach ($this->scopeAll() as $plugin) {
            if ($plugin->type == $type) {
                $result[] = $plugin;
            }
        }
        return collect($result);

    }

    /**
     * @param array $variables
     * @param array $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function scopeRenderSettings(array $variables = [], array $data = [])
    {
        $variation = $variables['variation'];
        $variations = isset($variables['variations']) ? $variables['variations'] : null;
        $page = isset($variables['page']) ? $variables['page'] : null;
        $settings = ($variation) ? $variation->toArray() : $variation;

        if ($settings) {
            if (isset($variables['request'])) {
                $settings = array_merge($settings['settings'], $variables['request']);
            } else {
                $settings = $settings['settings'];
            }
        }else{
            if (isset($variables['request'])) {
                $settings = $variables['request'];
            }
        }
        $slug = $this->folder;
        $layout = ($this->example) ? $this->example : $this->layout;
        $setting = isset($this->settings['file']) ? $this->settings['file'] : NULL;
        $json = json_encode($settings, true);
        $settingsHtml = "ContentLayouts.$slug.$setting";
        $model = $this;
        $usedIn = (isset($variation['used_in'])) ? BBgetFrontPage($variation['used_in']) : null;
        if ($this->autoinclude) {
            $html = $this->getAutoInclude()->getRender($settings, "ContentLayouts.$slug");
        } else {
            $html = \View::make("ContentLayouts.$slug.$layout")->with(['settings' => $settings, '_this' => $this, 'variation' => $variables['variation'],'page' => $page])->render();
        }
        return view($variables['view'], compact(['model', 'settingsHtml', 'json', 'html', 'page', 'settings', 'data', 'variation', 'usedIn', 'variations']));
    }

    /**
     * @param array $variables
     * @return string
     */
    public function scopeRenderLive(array $variables = [])
    {
        $slug = $this->folder;
        $layout = ($this->example) ? $this->example : $this->layout;
        $variation = issetReturn($variables, 'variation', null);
        $html = \View::make("ContentLayouts.$slug.$layout")->with(['settings' => $variables, '_this' => $this, 'variation' => $variation])->render();
        return $html;
    }

    public function scopeRender(array $variables = [])
    {
        $slug = $this->folder;
        if ($this->autoinclude) return $this->getAutoInclude()->getRender($variables, "ContentLayouts.$slug");
        $html = \View::make("ContentLayouts.$slug.$this->layout")->with(['settings' => $variables, '_this' => $this])->render();
        return $html;
    }

    public function scopeRenderPagePanel($page)
    {
        $slug = $this->folder;
        if ($this->autoinclude) return $this->getAutoInclude()->getRender($page, "ContentLayouts.$slug");
        if (!\View::exists("ContentLayouts.$slug.$this->panel")) return "View not found";
        $html = \View::make("ContentLayouts.$slug.$this->panel")->with(['page' => $page, '_this' => $this])->render();
        return $html;
    }

    /**
     * @param $key
     * @param null $value
     * @return array
     */
    public function scopePluck($key, $value = null)
    {

        $lusts = array();
        foreach ($this->scopeAll() as $template) {
            $lusts[$template->toArray()[$key]] = $template->toArray()[$value];
        }
        return $lusts;

    }

    /**
     * @param $slug
     * @return mixed|null
     */
    public function scopeActive()
    {
        foreach ($this->scopeAll() as $pageSection) {
            if ($pageSection->active) {
                return $pageSection;
            }
        }
        return null;
    }

    public function scopeMakeInActive()
    {
        $data = $this->attributes;
        $data['active'] = false;
        $this->attributes = $data;
        return $this;
    }

    /**
     * @param $slug
     * @return mixed|null
     */
    public function scopeActiveVariation($slug = null)
    {
        if (!$slug) {
            $slug = $this->slug;
        }
        foreach (self::findByVariation($slug)->variations(false) as $variation) {
            if ($variation->active) {
                return $variation;
            }
        }
        return null;
    }

    public function scopeUsedInVariations($slug = null)
    {
        if (!$slug) {
            $slug = $this->slug;
        }
        $data = array();
        foreach (self::find($slug)->variations(false)->all() as $variation) {
            if ($variation->used_in) {
                $data[] = $variation;
            }
        }
        return $data;
    }

    public function scopeGetPageLayout($page, $hide_top = false)
    {
        $layout = self::findByVariation($page->page_layout);
        if ($layout) {
            return $layout->getPageLayoutWidget($page, $hide_top);
        }
        return $this->getPageLayoutWidget($page, $hide_top);

    }

    public function scopeGetPageLayoutHook($page, $hide_top = false)
    {
        $layout = self::findByVariation($page->page_layout);
        if ($layout) {
            return $layout->getPageLayoutWidgetHook($page, $hide_top);
        }
        return $this->getPageLayoutWidgetHook($page, $hide_top);
    }

    public function scopeGetAdminPageLayout($page, $hide_top = false)
    {
        $layout = self::findByVariation($page->layout_id);
        if ($layout) {
            return $layout->getAdminPageLayoutWidget($page, $hide_top);
        }
        return $this->getAdminPageLayoutWidget($page, $hide_top);

    }

    public function scopeGetPageLayoutPlaceholders($page, $hide_top = false)
    {
        $layout = self::findByVariation($page->page_layout);
        if ($layout) {
            return $layout->getPagePlaceholders($page, $hide_top);
        }
        return $this->getPagePlaceholders($page, $hide_top);
    }

    protected function getPagePlaceholders($page, $hide_top = false)
    {
        $_this = $this;
        return \View::make('btybug::_partials.placeholders', compact(['_this', 'page', 'hide_top']))->render();
    }

    protected function getPageLayoutWidget($page, $hide_top = false)
    {
        $_this = null;
        if (isset($this->placeholders)) {
            $_this = $this;
        }

        $enabledSelectLayout = true;
        if ($page->parent) {
            $settings = ($page->parent->settings) ? json_decode($page->parent->settings, true) : null;
            if ($settings && isset($settings['children']['enable_layout'])) {
                $enabledSelectLayout = $settings['children']['enable_layout'];
            }
        }

        return \View::make('btybug::_partials.layout', compact(['_this', 'page', 'hide_top', 'enabledSelectLayout']))->render();
    }

    protected function getPageLayoutWidgetHook($page, $hide_top = false)
    {
        $hooks = HookRepository::get()->pluck("name", "id");

        $_this = null;
        if (isset($this->placeholders)) {
            $_this = $this;
        }

        $enabledSelectLayout = true;
        if ($page->parent) {
            $settings = ($page->parent->settings) ? json_decode($page->parent->settings, true) : null;
            if ($settings && isset($settings['children']['enable_layout'])) {
                $enabledSelectLayout = $settings['children']['enable_layout'];
            }
        }
        //return \View::make('btybug::_partials.layout', compact(['_this', 'page', 'hide_top', 'enabledSelectLayout']))->render();
        return \View::make('btybug::_partials.page_hooks', compact(['_this', 'page', 'hooks', 'hide_top', 'enabledSelectLayout']))->render();
    }

    protected function getAdminPageLayoutWidget($page, $hide_top = false)
    {
        $_this = null;
        if (isset($this->placeholders)) {
            $_this = $this;
        }
        return \View::make('btybug::_partials.core_layout', compact(['_this', 'page', 'hide_top']))->render();
    }

    public function scopeGetDefaultLayoutPlaceholders($system)
    {
        if (!isset($system['page_layout'])) {
            return $this->getDefaultPlaceholders();
        }

        $layout = self::findByVariation($system['page_layout']);
        if ($layout) {
            if (isset($system['placeholders'])) {
                $system['placeholders'] = json_decode($system['placeholders'], true);
            }
            return $layout->getDefaultPlaceholders($system);
        }
        return $this->getDefaultPlaceholders();
    }

    protected function getDefaultPlaceholders($system = null)
    {
        $_this = null;
        if (isset($this->placeholders)) {
            $_this = $this;
        }
        return \View::make('btybug::_partials.default_placeholders', compact('_this', 'system'))->render();
    }

    public function scopeGetBackendDefaultLayoutPlaceholders($system)
    {
        if (!isset($system['backend_page_section'])) return $this->getBackendDefaultPlaceholders();
        $layout = self::findByVariation($system['backend_page_section']);
        if ($layout) {
            return $layout->getBackendDefaultPlaceholders($system);
        }

        return $this->getBackendDefaultPlaceholders();
    }

    protected function getBackendDefaultPlaceholders($system = null)
    {
        $_this = null;
        if (isset($this->placeholders)) {
            $_this = $this;
        }
        return \View::make('btybug::_partials.backend_default_placeholders', compact('_this', 'system'))->render();
    }

    public function scopeGetAdminPageLayoutPlaceholders($page, $hide_top = false)
    {
        $layout = self::findByVariation($page->layout_id);
        if ($layout) {
            return $layout->getAdminPagePlaceholders($page, $hide_top);
        }
        return $this->getAdminPagePlaceholders($page, $hide_top);
    }

    protected function getAdminPagePlaceholders($page = null)
    {
        $_this = $this;
        return \View::make('btybug::_partials.admin_placeholders', compact(['_this', 'page', 'hide_top']))->render();
    }

    public function scopeGetPageLayoutHooks($page)
    {
        if ($page->page_layout) {
            $layout = self::findByVariation($page->page_layout)->variations()->find($page->page_layout);
            if ($layout) {
                $html = \View::make('btybug::_partials.page_hooks', compact('layout'));
                return $html;
            }
        }
        return null;
    }

    public function scopeGetChildrenPageLayout($page)
    {
        if (!$page->parent_id) {
            $settings = ($page->settings) ? json_decode($page->settings, true) : null;
            $layout = null;
            if ($settings) {
                if (isset($settings['children']['page_layout'])) {
                    $layout = self::findByVariation($page->page_layout);
                }
            }

            return \View::make('btybug::_partials.children_layout', compact('layout', 'page', 'settings'));
        }
    }

    public function getViewFile()
    {
        return $this->layout ? $this->layout : 'tpl';
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function getPath()
    {
        return base_path($this->path);
    }

    public function scopeRemoveLayoutJson()
    {
        $path = $this->getConfigPath();
        return \File::delete($path);
    }
}