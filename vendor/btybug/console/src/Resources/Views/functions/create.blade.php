@extends('btybug::layouts.admin')
@section('content')
    {!! Form::model($model,[]) !!}
    @if($model)
        {!! Form::hidden('key',$key,['id' => 'fn-key']) !!}
    @endif
    <div class="bb-form-header">
        <div class="row">
            <div class="col-md-4">
                <label>Function name</label>
                {!! Form::text('name',null,['class' => 'form-name', 'placeholder' => 'Fn Name']) !!}
            </div>
            <div class="col-md-8">
                <button type="submit" class="form-save pull-right" bb-click="saveHTML">Save</button>
            </div>
        </div>
    </div>
    <div class="bb-form-sub-header">
        <div class="row">
            <div class="col-md-6">
                <label>Function description</label>
                {!! Form::textarea('description',null,['class' => 'form-description', 'placeholder' => 'Fn Description']) !!}
            </div>
            <div class="col-md-6 code-here">
                code here
            </div>
        </div>
    </div>

    <div class="row m-b-10">
        <h3>Create Function</h3>

        <div class="col-md-12">
            <div class="form-group">
                <label>
                    Select Table
                </label>
                {!! Form::select('table',['' => 'Select'] + BBGetTables(),null,['class' => 'form-control custom_table']) !!}
            </div>
            <div class="form-group">
                <label>
                    Select Row
                </label>
                {!! Form::select('row',['' => 'Select'] +
                ['specific' => 'specific row / rows','filtered' => 'Filtered row / rows'],null,['class' => 'form-control custom_row']) !!}
            </div>
            <div class="filtered hide">
                <div class="form-group">
                    <div class="options-box">
                        <div class="cust-group append_here">

                        </div>
                        <a href="javascript:void(0)" class="btn btn-md btn-info cust-btn pull-right add_new_field"><i
                                    class=" fa fa-plus"></i></a>
                    </div>
                </div>
                <div class="clearfix"></div>
                {{--<div class="form-group number-box">--}}
                {{--<label>--}}
                {{--How Many number of row you want ?--}}
                {{--</label>--}}
                {{--{!! Form::number('count',null,['class' => 'form-control','min' => 1]) !!}--}}
                {{--</div>--}}
            </div>
            <div class="specific hide">

            </div>
            <div class="form-group">
                <a href="javascript:void(0)" class="btn btn-primary pull-right get-result">Get Result</a>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
    <div class="col-md-12 table-div">
    </div>
@stop
@section('CSS')
    {!! Html::style("public/css/form-builder/form-builder.css?m=m") !!}
    {!! HTML::style("public/css/bty.css") !!}
    {!! HTML::style("public/css/select2/select2.min.css") !!}

    <style>
        .cust-group .custom_removable_general_parent > .form-group {
            box-shadow: 0 0 4px #ccc;
            padding: 20px 0;
            background-color: #5b737f;
            color: white;
        }

        .select2 {
            width: 100% !important;
        }

        .m-10 {
            margin: 10px 0;
        }

        .m-b-10 {
            margin-bottom: 10px;
        }

        .cust-group .form-control {
            background-color: #78909c;
            border-color: #78909c;
            color: #ffffff;
        }

        .cust-btn {
            color: #fff !important;
            background-color: #e4d700 !important;;
            border-color: #e4d700 !important;;
        }

        .code-here {
            height: 60px;
            margin-top: 5px;
            border: 1px solid;
            padding: 5px;
        }
    </style>
@stop
@section('JS')
    {!! HTML::script("public/js/select2/select2.full.min.js") !!}
    {!! Html::script('public/js/DataTables/datatables.js') !!}
    <script>
        $('document').ready(function () {
            function initdatepicker() {
                // $( ".datepickerRange" ).datepicker({
                //     dateFormat: 'dd-mm-yy',
                //     prevText:'',
                //     nextText:'',
                //     minDate: 0,
                //     maxDate: "+1M",
                //     showOn: "button",
                //     buttonImage: divadatepicker.image_url+"/calendar.jpeg",
                //     buttonImageOnly: true
                // });
                $(".date-expression").datepicker({
                    dateFormat: 'dd-mm-yy',
                    prevText: '',
                    nextText: '',
                    changeMonth: true,
                    changeYear: true
                });
            }

            initdatepicker();

            function Generator() {
            }

            Generator.prototype.rand = Math.floor(Math.random() * 26) + Date.now();
            Generator.prototype.getId = function () {
                return this.rand++;
            };
            var idGen = new Generator();

            var sendAjax = function sendAjax(at, type) {
                $.ajax({
                    type: "post",
                    url: "{!! url('/admin/console/functions/get-by-operator') !!}",
                    cache: false,
                    datatype: "json",
                    data: {
                        table_name: $('.custom_table').val(),
                        type: type,
                        slug: $(at).data('slug'),
                        new_slug: $(at).data('new-slug'),
                        column: $(at).closest(".removable_parent").find(".column-field").val()
                    },
                    headers: {
                        'X-CSRF-TOKEN': $("[name=_token]").val()
                    },
                    success: function (data) {
                        if (!data.error) {
                            $(at).closest(".removable_parent").find(".expression-place").html(data.html);
                            initdatepicker();
                            if (type == 'in') {
                                $(".select2-box").select2();
                            }
                        }
                    }
                });
            }

            var operators = {
                equal: function (at) {
                    sendAjax(at, 'equal');
                },
                not_equal: function (at) {
                    this.equal(at);
                },
                more: function (at) {
                    this.equal(at);
                },
                less: function (at) {
                    this.equal(at);
                },
                more_and_equal: function (at) {
                    this.equal(at);
                },
                less_and_equal: function (at) {
                    this.equal(at);
                },
                contains: function (at) {
                    this.equal(at);
                },
                not_contains: function (at) {
                    this.equal(at);
                },
                in: function (at) {
                    sendAjax(at, 'in');
                },
                not_in: function (at) {
                    this.in(at);
                },
                between: function (at) {
                    sendAjax(at, 'between');
                },
                not_between: function (at) {
                    this.between(at);
                },
                between_date: function (at) {
                    sendAjax(at, 'between_date');
                },
                not_between_date: function (at) {
                    this.between_date(at);
                },
                single_date: function (at) {
                    sendAjax(at, 'single_date');
                },
                is_null: function (at) {
                    $(at).closest(".removable_parent").find(".expression-place").html('');
                },
                not_is_null: function (at) {
                    this.is_null(at);
                }
            };

            $("body").on('change', '.select-operator', function () {
                var value = $(this).val();
                if ($.isFunction(operators[value])) {
                    operators[value](this);
                }
            });

            var fn_events = {
                specific: function () {
                    var table_name = $(".custom_table").val();
                    var key = $('#fn-key').val();
                    $.ajax({
                        type: "post",
                        url: "{!! url('/admin/console/functions/specific') !!}",
                        cache: false,
                        datatype: "json",
                        data: {
                            table_name: table_name,
                            key: key
                        },
                        headers: {
                            'X-CSRF-TOKEN': $("[name=_token]").val()
                        },
                        success: function (data) {
                            if (!data.error) {
                                $(".specific").html(data.html);
                                $(".specific-select").select2();
                                $(".specific").removeClass("hide");
                                $(".specific").addClass("show");
                            }
                        }
                    });
                    this.revertFiltered();
                },
                filtered: function () {
                    var key = $('#fn-key').val();
                    var table_name = $(".custom_table").val();
                    $(".append_here").html('');
                    if (key) {
                        $.ajax({
                            type: "post",
                            url: "{!! url('/admin/console/functions/filtered') !!}",
                            cache: false,
                            datatype: "json",
                            data: {
                                table_name: table_name,
                                key: key
                            },
                            headers: {
                                'X-CSRF-TOKEN': $("[name=_token]").val()
                            },
                            success: function (data) {
                                if (!data.error) {
                                    $(".append_here").html(data.html);
                                    $(".select2-box").select2();
                                    initdatepicker();
                                }
                            }
                        });
                    }

                    $(".filtered").removeClass("hide");
                    $(".filtered").addClass("show");
                    this.revertSpecific()
                },
                revertSpecific: function () {
                    $(".specific").removeClass("show");
                    $(".specific").addClass("hide");
                },
                revertFiltered: function () {
                    $(".filtered").removeClass("show");
                    $(".filtered").addClass("hide");
                },
                revert: function () {
                    this.revertFiltered();
                    this.revertSpecific();
                    $(".table-div").empty();
                    $(".code-here").empty();
                }
            };

            $("body").on("change", ".custom_row", function () {
                var table_name = $(".custom_table").val();
                if (table_name !== '') {
                    var row = $(this).val();
                    if ($.isFunction(fn_events[row])) {
                        fn_events[row]();
                    } else {
                        fn_events.revert();
                    }
                }
            });

            $("body").on("change", ".custom_table", function () {
                var table_name = $(this).val();
                $(".table-div").empty();
                $(".code-here").empty();
                if (table_name !== '') {
                    var row = $(".custom_row").val();
                    if ($.isFunction(fn_events[row])) {
                        fn_events[row]();
                    } else {
                        fn_events.revert();
                    }
                } else {
                    fn_events.revert();
                    $(".append_here").html('');
                }
            });

            $("body").delegate(".add_new_field", "click", function () {
                var table_name = $(".custom_table").val();
                if (table_name) {
                    $.ajax({
                        type: "post",
                        url: "{!! url('/admin/console/functions/options') !!}",
                        cache: false,
                        datatype: "json",
                        data: {
                            table_name: table_name,
                            slug: idGen.getId(),
                            new_slug: idGen.getId()
                        },
                        headers: {
                            'X-CSRF-TOKEN': $("[name=_token]").val()
                        },
                        success: function (data) {
                            if (!data.error) {
                                $(".append_here").append(data.html);
                            }
                        }
                    });
                }
            });

            $("body").delegate(".add_new_inside", "click", function () {
                var table_name = $(".custom_table").val();
                var slug = $(this).data('slug');
                var appendBox = $(this).parents().eq(1).find('.inside-conditions');
                if (table_name) {
                    $.ajax({
                        type: "post",
                        url: "{!! url('/admin/console/functions/inside') !!}",
                        cache: false,
                        datatype: "json",
                        data: {
                            table_name: table_name,
                            slug: slug,
                            new_slug: idGen.getId()
                        },
                        headers: {
                            'X-CSRF-TOKEN': $("[name=_token]").val()
                        },
                        success: function (data) {
                            if (!data.error) {
                                appendBox.append(data.html);
                            }
                        }
                    });
                }
            });

            $("body").delegate(".remove_this_field", "click", function () {
                return $(this).closest(".removable_parent").remove();
            });
            $("body").on("click", ".custom_general_remove", function () {
                return $(this).closest(".custom_removable_general_parent").remove();
            });

            var row_value = $('.custom_row').val();
            if ($.isFunction(fn_events[row_value])) {
                fn_events[row_value]();
            }

            $('body').on('click', '.get-result', function () {
                var data = $("form").serialize();
                $.ajax({
                    type: "post",
                    url: "{!! url('/admin/console/functions/get-result') !!}",
                    cache: false,
                    datatype: "json",
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': $("[name=_token]").val()
                    },
                    success: function (data) {
                        if (!data.error) {
                            $(".code-here").html(data.query);
                            $(".table-div").empty();

                            var tableHeaders;
                            $.each(data.columns, function (i, val) {
                                tableHeaders += "<th>" + val + "</th>";
                            });
                            $(".table-div").append('<table id="result-table" class="display table table-striped table-bordered" cellspacing="0" width="100%"><thead><tr>' + tableHeaders + '</tr></thead></table>');
                            //$("#tableDiv").find("table thead tr").append(tableHeaders);

                            $('#result-table').dataTable({
                                columns: data.columns,
                                data: data.data
                            });
                        } else {
                            $(".code-here").html(data.query);
                            $(".table-div").empty();
                        }
                    }
                });
            });


        });
    </script>
@stop

