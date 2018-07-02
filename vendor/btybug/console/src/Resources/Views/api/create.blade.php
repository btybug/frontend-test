@extends('btybug::layouts.admin')
@section('content')
    <div class="bb-form-header">
        <div class="row">
            <div class="col-md-3">
                <label>Name</label>
                {!! Form::text('name',null,['class' => 'form-name', 'placeholder' => 'name']) !!}
            </div>
            <div class="col-md-3">
                <label>Description</label>
                {!! Form::text('description',null,['class' => 'form-name', 'placeholder' => 'description']) !!}
            </div>
            <div class="col-md-6">
                <button type="submit" class="form-save pull-right">Save</button>
            </div>
        </div>
    </div>
    <div class="append_here">
        <div class="parent">
            <div class="form-group box col-md-11">
                <div class="col-md-6">
                    <label for="table_name" class="col-md-4">Table Name</label>
                    <div class="col-md-8">
                        {!! Form::select("table_name",['' => 'Select'] + BBGetTables(),null,["class"=>"form-control"]) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="permission" class="col-md-4">Permissions</label>
                    <div class="col-md-8">
                        {!! Form::select("permission",[0=>"create",1=>"delete",2=>"update"],null,["class"=>"form-control select2","multiple"=>"multiple"]) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="text-right head-btn">
        <button class="btn btn-sm btn-info add_new"><i class=" fa fa-plus"></i></button>
    </div>
@stop
<script type="template" id="get_for_append">
    <div class="parent">
        <div class="form-group box col-md-11">
            <div class="col-md-6">
                <label for="table_name" class="col-md-4">Table Name</label>
                <div class="col-md-8">
                    {!! Form::select("table_name",['' => 'Select'] + BBGetTables(),null,["class"=>"form-control"]) !!}
                </div>
            </div>
            <div class="col-md-6">
                <label for="permission" class="col-md-4">Permissions</label>
                <div class="col-md-8">
                    {!! Form::select("permission",[0=>"create",1=>"delete",2=>"update"],null,["class"=>"form-control select2_{repl}","multiple"=>"multiple"]) !!}
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-1">
            <button class="btn btn-sm btn-danger remove_item"><i class=" fa fa-minus"></i></button>
        </div>
        <div class="clearfix"></div>
    </div>
</script>
@section('CSS')
    {!! Html::style("public/css/form-builder/form-builder.css") !!}
    {!! HTML::style("public/css/select2/select2.min.css") !!}
    <style>
        .box {
            box-shadow: 0 0 4px #555555;
            padding: 15px;
        }

        .append_here {
            margin-top: 15px;
        }
    </style>
@stop
@section('JS')
    {!! HTML::script("public/js/select2/select2.full.min.js") !!}
    <script>
        window.onload = function () {
            $(".select2").select2();

            function IDGenerator() {

                this.length = 8;
                this.timestamp = +new Date;

                var _getRandomInt = function (min, max) {
                    return Math.floor(Math.random() * (max - min + 1)) + min;
                };

                this.generate = function () {
                    var ts = this.timestamp.toString();
                    var parts = ts.split("").reverse();
                    var id = "";

                    for (var i = 0; i < this.length; ++i) {
                        var index = _getRandomInt(0, parts.length - 1);
                        id += parts[index];
                    }

                    return id;
                }


            }

            var idGen = new IDGenerator();

            $("body").delegate(".add_new", "click", function () {
                var uniq = idGen.generate();
                var html = $("#get_for_append").html();
                html = html.replace("{repl}", uniq);

                $(".append_here").append(html);
                return $(".select2_" + uniq).select2();
            });
            $("body").on("click", ".remove_item", function () {
                return $(this).parent().parent().remove();
            });
        };
    </script>
@stop
