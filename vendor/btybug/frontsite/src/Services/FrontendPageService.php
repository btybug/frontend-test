<?php
/**
 * Created by PhpStorm.
 * User: Arakelyan
 * Date: 01-Aug-17
 * Time: 13:59
 */

namespace Btybug\FrontSite\Services;


use Btybug\btybug\Models\ContentLayouts\ContentLayouts;
use Btybug\btybug\Repositories\AdminsettingRepository;
use Btybug\btybug\Services\GeneralService;
use Btybug\Console\Repository\FrontPagesRepository;
use Btybug\FrontSite\Models\FrontendPage;
use Btybug\User\Repository\PermissionRoleRepository;
use Illuminate\Http\Request;

class FrontendPageService extends GeneralService
{
    private static $frontPages;
    private $frontPagesRepository;
    private $settingsRepository;
    private $permissionRoleRepository;
    private $ext = [
        'html',
        'php',
        'blade.php',
    ];

    public function __construct (
        FrontPagesRepository $frontPagesRepository,
        AdminsettingRepository $settingsRepository,
        PermissionRoleRepository $permissionRoleRepository
    )
    {
        self::$frontPages = $this->frontPagesRepository = $frontPagesRepository;
        $this->settingsRepository = $settingsRepository;
        $this->permissionRoleRepository = $permissionRoleRepository;
    }

    public static function checkAccess ($page_id, $user)
    {
        $frontPages = new FrontPagesRepository();
        $page = $frontPages->find($page_id);
        $memberships = $user->memberships;

        if ($page && $memberships) {
            if (! $page->memberships) return true;

            $checkMembership = array_diff($page->memberships, $memberships);
            if (count($checkMembership) == 0) return true;
        }

        return false;
    }

    public static function FrontPagesParentPermissionWithRole ($page_id, $role_id)
    {
        $page = new FrontPagesRepository();
        $result = $page->find($page_id);

        return $result->parent->permission_role()->where('role_id', $role_id)->first();

    }

    public static function register (array $data)
    {
        if (
            isset($data['module_id'])
            && isset($data['url'])
        ) {
            $pageRepo = new FrontPagesRepository();
            if (isset($data['slug'])) {
                if (isset($data['prefix'])) {
                    $page = $pageRepo->findOneByMultiple(['slug' => $data['slug'], 'url' => $data['prefix'] . '/' . $data['url']]);
                } else {
                    $page = $pageRepo->findOneByMultiple(['slug' => $data['slug'], 'url' => $data['url']]);
                }
            } else {
                if (isset($data['prefix'])) {
                    $page = $pageRepo->findBy('url', $data['prefix'] . '/' . $data['url']);
                } else {
                    $page = $pageRepo->findBy('url', $data['url']);
                }
            }

            if ($page) return false;

            $frontPageRepo = new FrontPagesRepository();

            return $frontPageRepo->create([
                'user_id'              => \Auth::id(),
                'module_id'            => (isset($data['module_id'])) ? $data['module_id'] : null,
                'title'                => (isset($data['title'])) ? $data['title'] : "New Page",
                'slug'                 => (isset($data['slug'])) ? $data['slug'] : uniqid(),
                'header'               => (isset($data['header'])) ? $data['header'] : 0,
                'footer'               => (isset($data['footer'])) ? $data['footer'] : 0,
                'status'               => (isset($data['status'])) ? $data['status'] : "published",
                'page_access'          => (isset($data['page_access'])) ? $data['page_access'] : 1,
                'page_layout'          => null,
                'page_layout_settings' => null,
                'url'                  => (isset($data['prefix'])) ? $data['prefix'] . '/' . $data['url'] : $data['url'],
                'parent_id'            => (isset($data['parent_id'])) ? $data['parent_id'] : null,
                'type'                 => 'plugin',
                'content_type'         => (isset($data['content_type'])) ? $data['content_type'] : 'editor',
                'settings'             => (isset($data['settings'])) ? json_encode($data['settings'], true) : null
            ]);
        }
    }

    public static function getFirstParent ($page)
    {
        if ($page) {
            return \DB::select('SELECT T2.* FROM (SELECT @r AS _id,(SELECT @r := parent_id FROM frontend_pages WHERE id = _id) AS parent_id, @l := @l + 1 AS lvl FROM (SELECT @r := ' . $page->id . ', @l := 0) vars, frontend_pages m WHERE @r <> 0) T1 JOIN frontend_pages T2 ON T1._id = T2.id ORDER BY T1.lvl DESC;');
        }

        return [];
    }

    public function saveSettings (
        Request $request
    )
    {
        $page = $this->frontPagesRepository->findOrFail($request->id);
        $attributes = $page->getAttributes();
        $requestData = $request->except('_token', 'roles');
        $data = [];
        foreach ($attributes as $key => $value) {
            if (isset($requestData[$key])) {
                $data[$key] = $requestData[$key];
            }
        }
        $children = $request->only('children', 'children_page_layout_settings');
        if (count($children)) $data['settings'] = json_encode($children, true);

        $this->frontPagesRepository->update($page->id, $data);

        if ($request->get('page_access') && $request->roles)
            $this->permissionRoleRepository->optimizePageRoles($page, explode(',', $request->roles), 'front');

        if ($request->file('main_content')) {
            $extension = $request->file('main_content')->getClientOriginalExtension(); // getting image extension
            if (in_array($extension, $this->ext)) {
                $full_name = $request->file('main_content')->getClientOriginalName();
                $name = str_replace("." . $extension, "", $full_name);
                \File::cleanDirectory(config('paths.samples') . '/' . $page->id);
                $request->file('main_content')->move(config('paths.samples') . '/' . $page->id . '/', $full_name);

                $this->frontPagesRepository->update($page->id, [
                    'main_content' => config('paths.samples') . '/' . $page->id . '/' . $full_name
                ]);
            }
        }

//        $this->savePageMainContent($page);
        return $page;
    }

    public function savePageMainContent (FrontendPage $page)
    {
        if ($page->content_type == 'template' && $page->page_layout) {
            $variation = ContentLayouts::findVariation($page->page_layout);
            if ($variation) {
                $variation->main_unit = $page->template;
                $variation->save();
            }
        }
    }

    public function saveSpecialSettings (
        Request $request
    )
    {
        $page = $this->frontPagesRepository->findOrFail($request->id);
        $attributes = $page->getAttributes();
        $requestData = $request->except('_token');
        $data = [];
        foreach ($attributes as $key => $value) {
            if (isset($requestData[$key])) {
                $data[$key] = $requestData[$key];
            }
        }

        $this->frontPagesRepository->update($page->id, $data);
        if ($request->file('main_content')) {
            $extension = $request->file('main_content')->getClientOriginalExtension(); // getting image extension
            if (in_array($extension, $this->ext)) {
                $full_name = $request->file('main_content')->getClientOriginalName();
                $name = str_replace("." . $extension, "", $full_name);
                \File::cleanDirectory(config('paths.samples') . '/' . $page->id);
                $request->file('main_content')->move(config('paths.samples') . '/' . $page->id . '/', $full_name);

                $this->frontPagesRepository->update($page->id, [
                    'main_content' => config('paths.samples') . '/' . $page->id . '/' . $full_name
                ]);
            }
        }

        return $page;
    }

    public function saveGeneralSettings (
        Request $request
    )
    {
        $page = $this->frontPagesRepository->findOrFail($request->id);
        $this->frontPagesRepository->update($page->id, [
            'title'          => $request->get('title'),
            'url'            => $request->get('url'),
            'status'         => $request->get('status'),
            'page_access'    => $request->get('page_access'),
            'memberships'    => $request->get('memberships', null),
            'special_access' => $request->get('special_access', null)
        ]);

        return $page;
    }

    public function addNewPage (int $parentID = null, $type = 'custom')
    {
        $parent = null;
        if ($parentID) {
            $parent = $this->frontPagesRepository->find($parentID);
            if (! $parent) {
                return false;
            }
        }
        $header_enabled = $this->settingsRepository->findBy('settingkey', 'header_enabled');
        $footer_enabled = $this->settingsRepository->findBy('settingkey', 'footer_enabled');
//        $defaultPageLayout = $this->settingsRepository->findBy('settingkey', 'page_layout');
//        $defaultPageLayoutSettings = $this->settingsRepository->findBy('settingkey', 'placeholders');
        $slug = uniqid();
        $new = $this->frontPagesRepository->create([
            'user_id'     => \Auth::id(),
            'title'       => 'New Page',
            'slug'        => $slug,
            'header'      => ($header_enabled) ? $header_enabled->val : 0,
            'footer'      => ($footer_enabled) ? $footer_enabled->val : 0,
            'url'         => '',
            'page_access' => ZERO,
            'parent_id'   => ($parent) ? $parent->id : null,
            'type'        => $type
        ]);
        $this->frontPagesRepository->update($new->id, [
            'url' => '/new-page(' . $new->id . ')',
        ]);

        return $new;
    }

    public function getPlaceholdersInUrl ($pageLayoutSettings = [])
    {
        if ($pageLayoutSettings) {
            return http_build_query($pageLayoutSettings);
        }
    }

    public function sort (array $data)
    {
        $child = $this->frontPagesRepository->find($data['item']);

        if ($child && $child->type == 'custom') {
            $parent = null;
            if ($data['parent']) {
                $parent = $this->frontPagesRepository->find($data['parent']);
            }
            $result = $this->frontPagesRepository->update($child->id, ['parent_id' => ($parent) ? $parent->id : null]);
            if ($result) return true;
        }

        return false;
    }
}