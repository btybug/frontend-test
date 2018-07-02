<?php

namespace Btybug\Console\Services;

use Btybug\btybug\Services\GeneralService;
use Btybug\Console\Repository\ColumnsRepository;
use Btybug\Console\Repository\FieldsRepository;
use Btybug\Console\Repository\FormEntriesRepository;
use Btybug\Console\Repository\FormFieldsRepository;
use Btybug\Console\Repository\FormsRepository;


class ColumnService extends GeneralService
{

    public $formsRepository,$formFieldsRepository,$fieldsRepository,$entries,$columns;

    public function __construct(
        FormsRepository $formsRepository,
        FormFieldsRepository $formFieldsRepository,
        FieldsRepository $fieldsRepository,
        FormEntriesRepository $entriesRepository,
        ColumnsRepository $columnsRepository
    )
    {
        $this->formsRepository = $formsRepository;
        $this->formFieldsRepository = $formFieldsRepository;
        $this->fieldsRepository = $fieldsRepository;
        $this->entries = $entriesRepository;
        $this->columns = $columnsRepository;
    }

    public static function columnExists(string $table,string $column)
    {
        $col = new ColumnsRepository();
        return $col->findOneByMultiple(['db_table' => $table,'table_column' => $column]);
    }

}