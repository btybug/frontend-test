<?php
/**
 * Created by PhpStorm.
 * User: Edo
 * Date: 8/8/2016
 * Time: 1:31 PM
 */

namespace Btybug\Console\Repository;

use Btybug\btybug\Repositories\GeneralRepository;
use Btybug\Console\Models\Fields;

/**
 * Class FieldsRepository
 * @package Btybug\Console\Repository
 */
class FieldsRepository extends GeneralRepository
{

    const ACTIVE = 1;
    const INACTIVE = 0;

    public function getByTableNameAndActive($table_name)
    {
        return $this->model()->where('table_name', $table_name)->where('status', self::ACTIVE)->get();
    }

    /**
     * @return Fields
     */
    public function model()
    {
        return new Fields();
    }

    public function getByTableNameActiveAndAvailablity($table_name)
    {
        return $this->model()->where('table_name', $table_name)->where('status', self::ACTIVE)->where('available_for_users', '!=', 0)->get();
    }

    public function getByTableAndCol($table,$column)
    {
        return $this->model()->where('table_name', $table)->where('column_name', $column)->get();
    }

    public function findByTableAndCol($table,$column)
    {
        return $this->model()->where('table_name', $table)->where('column_name', $column)->first();
    }

    public function updateField($table,$column_old,$column)
    {
        return $this->model()->where('table_name', $table)
            ->where('column_name', $column_old)
            ->update(['column_name' => $column,'name' => ucwords(str_replace("_"," ",$column))]);
    }

    public function findByTableAndColAndDelete($table,$column)
    {
        $field = $this->findByTableAndCol($table,$column);
        if($field) $field->delete();
    }

    public function getWhereNotExists($table,$existings)
    {
        $data = ($existings) ? json_decode($existings,true) : [];
        return $this->model()->where('table_name', $table)->where('column_name','!=','id')
            ->whereNotIn('id', $data)->get();
    }

    public function getWithTableAndStatusWhereNoAvailableUsers($fields_type)
    {
        return $this->model()->where('table_name', $fields_type)->where('status', self::ACTIVE)->where('available_for_users', '!=', self::INACTIVE)->get()->toArray();
    }
}