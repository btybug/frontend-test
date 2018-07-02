<?php
/**
 * Created by PhpStorm.
 * User: Edo
 * Date: 8/8/2016
 * Time: 1:31 PM
 */

namespace Btybug\Console\Repository;

use Btybug\btybug\Repositories\GeneralRepository;
use Btybug\Console\Models\FormRoles;
use Btybug\User\Repository\RoleRepository;

class FormRolesRepository extends GeneralRepository
{
    public function model()
    {
        return new FormRoles();
    }

    public function optimizeFormRoles($form, array $roles)
    {
        if (count($roles)) {
            $roleIDs = [];
            foreach ($roles as $role => $value) {
                $roleRepo = new RoleRepository();
                if ($r = $roleRepo->findBy('slug', $role)) {
                    $roleIDs[] = $r->id;
                }
            }

            $form->form_roles()->whereNotIn('role_id', $roleIDs)->delete();
            if (!empty($roleIDs)) {
                foreach ($roleIDs as $value) {
                    if (! $form->form_roles()->where('role_id', $value)->first()) {
                        $this->model->create(['form_id' => $form->id, 'role_id' => $value]);
                    }
                }
            }
        } else {
            $form->form_roles()->delete();
        }

        return $form->form_roles;
    }
}