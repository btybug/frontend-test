<?php

namespace Btybug\Uploads\Repository;

use Btybug\btybug\Repositories\GeneralRepository;
use Btybug\Uploads\Models\VersionProfiles;

class VersionProfilesRepository extends GeneralRepository
{

    public function updateWhere ($id, $condition = "=", $data)
    {
        return $this->model()->where('id', $condition, $id)->update($data);
    }

    public function model ()
    {
        return new VersionProfiles();
    }

    public function getByExcept (string $attribute, string $value, string $except, string $exceptValue)
    {
        return $this->model()->where($attribute, $value)->where($except, '!=', $exceptValue)->get();
    }

    public function wherePluck (string $attribute, string $attrVal, string $key, string $value)
    {
        return $this->model->where($attribute, $attrVal)->pluck($key, $value);
    }
}