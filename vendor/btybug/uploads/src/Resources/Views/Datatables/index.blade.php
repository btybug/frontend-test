@extends('btybug::layouts.admin')
@section('content')
    {!! Form::model($settings) !!}
    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 ">
        <div class="left-check-table row">

            <div>
                {!! Form::checkbox('settings[autoFill]',1,isset($settings['autoFill']),['class'=>'bty-input-radio-7','id'=>'bty-checklefttab-1']) !!}
                <label for="bty-checklefttab-1">AutoFill</label>
            </div>
            <div>
                {!! Form::checkbox('settings[button]',1,isset($settings['button']),['class'=>'bty-input-radio-7 sub-left-more','id'=>'bty-checklefttab-2']) !!}
                <label for="bty-checklefttab-2">Buttons</label>
                <div class="sub-checkbox-left">
                    <div>
                        {!! Form::checkbox('settings[buttons][colvis]',1,isset($settings['buttons']['colvis']),['class'=>'bty-input-radio-7','id'=>'bty-checklefttab-2-0']) !!}
                        <label for="bty-checklefttab-2-0">Column visibility</label>
                    </div>
                    <div>
                        {!! Form::checkbox('settings[buttons][copy]',1,isset($settings['buttons']['copy']),['class'=>'bty-input-radio-7','id'=>'bty-checklefttab-2-1']) !!}
                        <label for="bty-checklefttab-2-1">Copy</label>
                    </div>
                    <div>
                        {!! Form::checkbox('settings[buttons][excel]',1,isset($settings['buttons']['excel']),['class'=>'bty-input-radio-7','id'=>'bty-checklefttab-2-2']) !!}
                        <label for="bty-checklefttab-2-2">Excel</label>
                    </div>
                    <div>
                        {!! Form::checkbox('settings[buttons][pdf]',1,isset($settings['buttons']['pdf']),['class'=>'bty-input-radio-7','id'=>'bty-checklefttab-2-3']) !!}
                        <label for="bty-checklefttab-2-3">PDF</label>
                    </div>
                    <div>
                        {!! Form::checkbox('settings[buttons][print]',1,isset($settings['buttons']['print']),['class'=>'bty-input-radio-7','id'=>'bty-checklefttab-2-4']) !!}
                        <label for="bty-checklefttab-2-4">Print</label>
                    </div>
                </div>
            </div>
            <div>
                {!! Form::checkbox('settings[colReorder]',1,isset($settings['colReorder']),['class'=>'bty-input-radio-7','id'=>'bty-checklefttab-3']) !!}
                <label for="bty-checklefttab-3">ColReorder</label>
            </div>
            <div>
                <input type="checkbox" class="bty-input-radio-7" id="bty-checklefttab-4" value="FixedColumns-3.2.4">
                <label for="bty-checklefttab-4">FixedColumns</label>
            </div>
            <div>
                <input type="checkbox" class="bty-input-radio-7 sub-left-more" id="bty-checklefttab-5"
                       value="FixedHeader-3.1.3">
                <label for="bty-checklefttab-5">FixedHeader</label>
                <div class="sub-checkbox-left">
                    <div class="bty-numberleft-sub">
                        <input type="number" class="" value="5">
                        <label>Count</label>
                    </div>
                    <div class="bty-numberleft-sub">
                        <input type="number" class="" value="5">
                        <label>Count</label>
                    </div>
                </div>
            </div>
            <div>
                <input type="checkbox" class="bty-input-radio-7" id="bty-checklefttab-6" value="KeyTable-2.3.2">
                <label for="bty-checklefttab-6">KeyTable</label>
            </div>
            <div>
                <input type="checkbox" class="bty-input-radio-7" id="bty-checklefttab-7" value="Responsive-2.2.1">
                <label for="bty-checklefttab-7">Responsive</label>
            </div>
            <div>
                <input type="checkbox" class="bty-input-radio-7" id="bty-checklefttab-8" value="RowGroup-1.0.2">
                <label for="bty-checklefttab-8">RowGroup</label>
            </div>
            <div>
                <input type="checkbox" class="bty-input-radio-7" id="bty-checklefttab-9" value="RowReorder">
                <label for="bty-checklefttab-9">RowReorder-1.2.3</label>
            </div>
            <div>
                <input type="checkbox" class="bty-input-radio-7" id="bty-checklefttab-10" value="Scroller-1.4.3">
                <label for="bty-checklefttab-10">Scroller</label>
            </div>
            <div>
                <input type="checkbox" class="bty-input-radio-7" id="bty-checklefttab-11" value="Select-1.2.4">
                <label for="bty-checklefttab-11">Select</label>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
        <table id="users-table" class="table table-striped table-bordered" cellspacing="0" width="500px">
            <thead>
            <tr>
                @foreach($columns as $column)
                    <th>{!! $column !!}</th>
            @endforeach
            </thead>
        </table>
    </div>
@stop

@section('JS')
    @foreach($extensions['js'] as $script)
        {!! Html::script($script) !!}
    @endforeach
    <script>
        $(function () {
            $('form').on('change', 'input[type=checkbox]', function () {
                $('form').submit();
            });
            $('#users-table').DataTable({

                {!! $extensions['json'] !!}
                ajax: '{!! route('dynamic_datatable',$table) !!}',

                columns: [
                        @foreach($columns as $column)
                    {
                        data: '{!! $column !!}', name: '{!! $column !!}'
                    },
                    @endforeach
                ]
            });
        });
    </script>
@stop
@section('CSS')
    @foreach($extensions['css'] as $style)
        {!! Html::style($style) !!}
    @endforeach
    <style>
        .left-check-table {
            margin-top: 75px !important;
            background-color: #28282c;
            color: #d4d4d4;
        }

        .left-check-table > div {
            border-bottom: 1px solid #8a8a8a;
            padding: 14px 10px;
            transition: 0.4s ease;
        }

        .left-check-table > div:hover {
            background-color: #499bc761;
            border-bottom: 1px solid #fff;
        }

        .left-check-table .bty-input-radio-7 + label:before {
            top: 1px;
            border: 1px solid #fff;
            background: none;
            box-shadow: none;
        }

        .left-check-table .bty-input-radio-7:checked + label:before {
            background-color: #499bc7;
        }

        .left-check-table .sub-checkbox-left {
            margin-left: 26px;
            display: none;
        }

        .left-check-table .sub-checkbox-left > div {
            border-bottom: 1px solid #8a8a8a;
            padding: 5px;
        }

        .left-check-table .sub-checkbox-left > div:last-child {
            border: none;
        }

        .left-check-table .sub-left-more:checked + label + .sub-checkbox-left {
            display: block;
        }

        .left-check-table .sub-checkbox-left .bty-numberleft-sub {
            display: flex;
        }

        .left-check-table .sub-checkbox-left .bty-numberleft-sub > input {
            width: 40%;
            margin-right: 8px;
            background-color: #28282d;
            color: #ccc;
            border: 1px solid #ccc;
            border-radius: 4px;
            position: relative;
            height: 24px;
            padding: 0 0 0 5px;
        }

        .left-check-table .sub-checkbox-left .bty-numberleft-sub > input:focus {
            outline: none;
        }

        .left-check-table .sub-checkbox-left .bty-numberleft-sub > label {
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
        }

        .left-check-table .sub-checkbox-left .bty-numberleft-sub > input::-webkit-inner-spin-button,
        .left-check-table .sub-checkbox-left .bty-numberleft-sub > input::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .left-check-table .sub-checkbox-left .bty-numberleft-sub > input:focus::-webkit-inner-spin-button,
        .left-check-table .sub-checkbox-left .bty-numberleft-sub > input:focus::-webkit-outer-spin-button,
        .left-check-table .sub-checkbox-left .bty-numberleft-sub > input:hover::-webkit-inner-spin-button,
        .left-check-table .sub-checkbox-left .bty-numberleft-sub > input:hover::-webkit-outer-spin-button {
            -webkit-appearance: inner-spin-button;
            height: 100%;
            position: absolute;
            right: 0;
        }

    </style>
@stop