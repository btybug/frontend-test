<?php

namespace Btybug\Framework\Repository;

use Btybug\btybug\Repositories\GeneralRepository;
use Btybug\Framework\Models\DynamicComponentCss;
use Btybug\Framework\Models\Versions;

class DynamicComponentRepository extends GeneralRepository
{
    public function updateWhere($id, $condition = "=", $data)
    {
        return $this->model()->where('id', $condition, $id)->update($data);
    }
    protected function model()
    {
        return new DynamicComponentCss();
    }

    public function updateWithAttribute($attr, $condition = "=", $value, $data)
    {
        return $this->model->where($attr, $condition, $value)->update($data);
    }
    public function getByName($name){
        return $this->model->where("slug",$name)->first();
    }

    public function where($attr, $condition = "=", $value){
        return $this->model->where($attr, $condition, $value);
    }
}