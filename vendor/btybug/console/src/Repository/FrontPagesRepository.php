<?php
/**
 * Created by PhpStorm.
 * User: Sahak/Edo
 * Date: 8/8/2016
 * Time: 1:31 PM
 */

namespace Btybug\Console\Repository;

use Btybug\btybug\Repositories\GeneralRepository;
use Btybug\FrontSite\Models\FrontendPage;
use Btybug\User\Repository\RoleRepository;

/**
 * Class AdminPagesRepository
 * @package Btybug\Console\Repository
 */
class FrontPagesRepository extends GeneralRepository
{
    private $rolesPerm;

    /**
     * @return mixed
     */
    public function getGroupedWithModule()
    {
        return $this->model->where('parent_id', NULL)->get();
    }

    public function getCorePages()
    {
        return $this->model->where('parent_id', NULL)->where('module_id', NULL)->where('type','core')->get();
    }

    public function getPluginPages()
    {
        return $this->model->where('parent_id', NULL)->where('module_id','!=', NULL)->where('type','plugin')->get();
    }

    public function getMain()
    {
        return $this->model->where('parent_id', NULL)->get();
    }

    public function getRolesByPage(int $id, bool $imploded = true)
    {
        $page = $this->model->find($id);
        $pageRoles = [];
        if ($page) {
            $parent = $page->parent;
            if (count($page->permission_role)) {
                foreach ($page->permission_role as $perm) {
                    if ($parent) {
                        if ($parent->permission_role()->where('role_id', $perm->role->id)->first()) {
                            $pageRoles[] = $perm->role->slug;
                        }
                    } else {
                        $pageRoles[] = $perm->role->slug;
                    }
                }

                if ($imploded) {
                    return implode(',', $pageRoles);
                } else {
                    return $pageRoles;
                }
            }
        }
        if ($imploded) {
            return null;
        } else {
            return [];
        }
    }

    public function getRolesByParent(int $id, bool $imploded = true)
    {
        $page = $this->model->find($id);
        $pageRoles = [];
        if ($page) {
            $parent = $page->parent;
            $rolesPerm = new RoleRepository();
            $roles = $rolesPerm->getFrontRoles();
            if (count($roles)) {
                foreach ($roles as $role) {
                    if ($parent) {
                        if ($parent->permission_role->where('role_id', $role->id)->first()) {
                            $pageRoles[] = $role->slug;
                        }
                    } else {
                        $pageRoles[] = $role->slug;
                    }
                }

                if ($imploded) {
                    return implode(',', $pageRoles);
                } else {
                    return $pageRoles;
                }
            }
        }
        if ($imploded) {
            return null;
        } else {
            return [];
        }
    }

    public function PagesByModulesParent($module)
    {
        return self::model()->where('module_id', $module->slug)->where('parent_id', 0)->get();
    }

    public function updatePageSort($id,$user_id,$sorting)
    {
        return self::model()->where('id', $id)->where('user_id', $user_id)->update(['sorting' => $sorting]);
    }

    /**
     * @return FrontendPage
     */
    public function model()
    {
        return new FrontendPage();
    }
}