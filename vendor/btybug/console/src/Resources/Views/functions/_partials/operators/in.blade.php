@php
    $inData = [];
    if(isset($inside["column"])){
        $inData = BBGetTableColumnData($table,$inside['column']);
    }elseif($column){
        $inData = BBGetTableColumnData($table,$column);
    }
@endphp

{!! Form::select("conditions[$slug][$new_slug][expression][]",
    $inData,
    (isset($inside["expression"])) ? $inside['expression'] : null,['class' => 'form-control select2-box','multiple' => true]) !!}