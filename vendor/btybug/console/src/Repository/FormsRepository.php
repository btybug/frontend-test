<?php
/**
 * Created by PhpStorm.
 * User: Edo
 * Date: 8/8/2016
 * Time: 1:31 PM
 */

namespace Btybug\Console\Repository;

use Btybug\btybug\Repositories\GeneralRepository;
use Btybug\Console\Models\Forms;

/**
 * Class FormsRepository
 * @package Btybug\Console\Repository
 */
class FormsRepository extends GeneralRepository
{

    /**
     * @param $slug
     */
    public function getNewCoreFormsBySlug($slug, string $created_by = 'core')
    {
        return $this->model()->where('type', 'new')->where('created_by', $created_by)->where('id', $slug)->first();
    }

    /**
     * @return Forms
     */
    public function model()
    {
        return new Forms();
    }

    public function getByTypeNewPluck()
    {
        return $this->model()->where('type', 'new')->pluck('name', 'slug');
    }

    public function findByIdOrSlug($data)
    {
        return $this->model()->where('id', $data)->orWhere('slug', $data)->first();
    }

    public function getFormsByFieldType($fields_type, array $created_by = ['*'], $pluck = false, $type = null)
    {
        $query = $this->model()->where('fields_type', $fields_type)->where(function ($query) use ($created_by) {
            if (count($created_by) && count(array_diff($created_by, ['*'])) == 0) {
                return $query;
            } else {
                return $query->whereIn('created_by', $created_by);
            }
        });

        if ($type) {
            $query = $query->where('type', $type);
        }

        return ($pluck) ?
            (count($query->pluck('name', 'slug')) ? $query->pluck('name', 'slug')->toArray() : $query->pluck('name', 'slug')->toArray())
            : $query->get();
    }

    public function formFields($id)
    {
        return $this->model()->find($id)->form_fields;
    }
}