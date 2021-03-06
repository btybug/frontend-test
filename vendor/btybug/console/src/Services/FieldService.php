<?php

namespace Btybug\Console\Services;

use Btybug\btybug\Services\GeneralService;
use Btybug\Console\Repository\FieldsRepository;
use Btybug\Console\Repository\FormEntriesRepository;
use Btybug\Console\Repository\FormFieldsRepository;
use Btybug\Console\Repository\FormsRepository;

/**
 * Class BackendService
 * @package Btybug\Console\Services
 */
class FieldService extends GeneralService
{
    const GET_AUTO = 3;
    public static $form_path = 'resources' . DS . 'views' . DS . 'forms' . DS;
    public static $form_file_ext = '.blade.php';
    public $slug, $conf, $formData, $fields, $form_type, $id, $collected, $fields_type, $required_fields, $formObject;
    private $form, $formFields, $fieldValidation, $fieldRepo, $entries;

    public function __construct(
        FormsRepository $formsRepository,
        FormFieldsRepository $formFieldsRepository,
        FieldValidationService $fieldValidationService,
        FieldsRepository $fieldsRepository,
        FormEntriesRepository $entriesRepository
    )
    {
        $this->form = $formsRepository;
        $this->formFields = $formFieldsRepository;
        $this->fieldValidation = $fieldValidationService;
        $this->fieldRepo = $fieldsRepository;
        $this->entries = $entriesRepository;
    }

    public static function checkField($table, $column)
    {
        $error = false;
        if (self::fieldExists($table,$column)) {
            $error = true;
        }

        return $error;
    }

    public static function getFieldID($table, $column)
    {
        $field = self::fieldExists($table,$column);
        return ($field) ? $field->id : NULL;
    }

    public static function fieldExists($table,$column)
    {
        $field = new FieldsRepository();
        return $field->findOneByMultiple(['table_name' => $table,'column_name' => $column]);
    }

    public function sycroniseColumnField($table,$column,$old_column = null)
    {

    }

    public function returnHtml($field)
    {
        if($field->type && $field->type == 'special'){
            return BBRenderUnits($field->default_value,['field_id' => $field->id]);
        }else{
            return  \view("blog::_partials.fields.".$field->type)->with('field',$field->toArray())->render();
        }
    }

    public static function getFieldHtml($field)
    {
        $fieldHtml = BBRenderUnits($field->unit,['field' => $field->toArray()]);
        return $fieldHtml;
    }

    public function fieldsJson($request)
    {
        if ($request->form_type == 'user') {
            $fieldJson = json_encode($this->fieldRepo->getWithTableAndStatusWhereNoAvailableUsers($request->fields_type));
        } else {
            $fieldJson = json_encode($this->fieldRepo->findAllByMultiple(['table_name' => $request->fields_type,'status' => $this->fieldRepo::ACTIVE])->toArray());
        }

        return $fieldJson;
    }

    public function getAvailableFields($fieldsType)
    {
        $success = false;
        $fields = [];
        if ($fieldsType) {
            $fields = $this->fieldRepo->getByTableNameAndActive($fieldsType)->toArray();
            $success = true;
        }

        return ['success' => $success, 'fields' => $fields];
    }
}