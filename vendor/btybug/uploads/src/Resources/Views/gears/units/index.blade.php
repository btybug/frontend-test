@extends('btybug::layouts.mTabs',['index'=>'upload_gears'])
@section('tab')
    <div class="row">
        @if(Session::has('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="col-md-12">
            <button class="btn btn-info btn-sm pull-right btnUploadWidgets m-r-15 m-b-15" type="button"
                    data-toggle="modal"
                    data-target="#uploadfile">
                <i class="fa fa-cloud-upload module_upload_icon"></i> <span class="upload_module_text">Upload</span>
            </button>
            <a href="{{route('remove-painter')}}" class="btn btn-warning pull-right custom_button_styles">Optimize
                units</a>
        </div>
    </div>
    <div class="col-md-4 ">
        <form class="form-inline custom_filter-tables" method="post" id="filter-tables">
            {!! csrf_field() !!}
            <div class="bty-filter-tab bty-filter-blue">
                <h1>Filters</h1>
                <ul>
                    <li>
                        <input type="checkbox">
                        <i></i>
                        <h2>Date</h2>
                        <div>
                            <div class="calendar">
                                <span><i class="glyphicon glyphicon-calendar"></i></span>
                                <input type="text" placeholder="From" class="date date_from custom_input_for_datepicker"
                                       name="date_from">
                                <span> - </span>
                                <input type="text" placeholder="To" class="date date_to custom_input_for_datepicker"
                                       name="date_to">
                                <span><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>

                        </div>
                    </li>
                    <li>
                        <input type="checkbox">
                        <i></i>
                        <h2>Persons</h2>
                        <div class="custom_text_align_center">
                            <input type="text" placeholder="Author" class="custom_input_text author" name="author">
                        </div>
                    </li>
                    <li>
                        <input type="checkbox">
                        <i></i>
                        <h2>Files Tags</h2>
                        <div class="custom_text_align_center">
                            <input type="text" class="custom_input_text tag" placeholder="Tag" name="tag">
                        </div>
                    </li>
                </ul>
            </div>
        </form>
    </div>
    <div class="col-md-8 custom_html_for_filter">
        @include('uploads::gears.units._partials.unit_variations')
    </div>
    <div class="clearfix"></div>
    {{--<div class="loadding"><em class="loadImg"></em></div>
    {!! $units->links() !!}--}}

    <div class="modal fade" id="uploadfile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Upload</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['url'=>'/admin/uploads/gears/upload','class'=>'dropzone', 'id'=>'my-awesome-dropzone']) !!}
                    {!! Form::hidden('data_type','files',['id'=>"dropzone_hiiden_data"]) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    @include('btybug::_partials.delete_modal')
@stop
@section('CSS')
    {!! HTML::style('public/css/new-store.css') !!}
    {!! HTML::style('public/js/bootstrap-select/css/bootstrap-select.min.css') !!}
@stop
@section('JS')
    {!! HTML::script('public/js/dropzone/js/dropzone.js') !!}

    {!! BBscript('public/js/custom_plugin.js') !!}
    {!! BBscript('public/js/bootstrap-select/js/bootstrap-select.min.js') !!}
    <script>
        Dropzone.options.myAwesomeDropzone = {
            init: function () {
                this.on("success", function (file) {
//                            location.reload();
                });
            }
        };

        function confirm_delete(data) {
            var r = confirm("Are you sure !!!");
            if (r == true) {
                var slug = $(data).data('slug');
                $.ajax({
                    url: '/admin/uploads/gears/delete',
                    data: {
                        slug: slug
                    }, headers: {
                        'X-CSRF-TOKEN': $("input[name='_token']").val()
                    },
                    dataType: 'json',
                    success: function (data) {
                        location.reload();
                    },
                    type: 'POST'
                });
            }
        }

        $(document).ready(function () {
            $('body').on("change", ".select-type", function () {
                var val = $(this).val();
                var url = window.location.pathname + "?type=" + val;

                window.location = url;
            });

            $('.rightButtons a').click(function (e) {
                e.preventDefault();
                $(this).addClass('active').siblings().removeClass('active');
            });

            $('.btnListView').click(function (e) {
                e.preventDefault();
                $('#viewType').addClass('listView');
            });

            $('.btnGridView').click(function (e) {
                e.preventDefault();
                $('#viewType').removeClass('listView');
            });


            $('.selectpicker').selectpicker();

            var p = "{!! $_GET['p'] or null !!}";

            if (p.length) {
                $("a[main-type=" + p + "]").click();
            }
        });

        // function for filters
        $('.custom_filter-tables :input').doFilter(function () {
            var that = $('.custom_filter-tables');

            if ($(this).attr('type') == 'checkbox') {
                return false;
            }
            $('.custom_html_for_filter').addClass('custom_style_for_loading').html('<img src="{{url("public/images/load.gif")}}" alt="" class="custom_hidden_loading">');
            $.ajax({
                type: 'POST',
                url: "{{ route('filter-units') }}",
                data: that.serialize(),
                success: function (data) {
                    $('.custom_html_for_filter').removeClass('custom_style_for_loading').html(data.html);
                }
            });
        }, 500);
    </script>
@stop
