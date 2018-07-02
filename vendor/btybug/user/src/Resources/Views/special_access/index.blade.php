@extends('btybug::layouts.mTabs',['index'=>'role_membership'])
@section('tab')
    <div class="row">
        <div class="col-sm-12">
            <div class="box-info full">
                <h2>Special Access</h2>
                <div class="col-sm-12">
                    <a class="btn btn-primary pull-right" href="javascript:void(0)" data-toggle="modal"
                       data-target="#specialModal">Create New</a>
                </div>
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover datatable">
                            <thead>
                            <tr>
                                <th>Tag Name</th>
                                <th>Tag Slug</th>
                                <th>Tag Description</th>
                                <th>Blog</th>
                                <th>Product title</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($specials as $special)
                                <tr>
                                    <td>{!! $special->name !!}</td>
                                    <td>{!! $special->slug !!}</td>
                                    <td>{!! $special->description !!}</td>
                                    <td>{!! $special->blog !!}</td>
                                    <td>{!! $special->product !!}</td>
                                    <td>
                                        <a data-href=""
                                           data-key="{!! $special->id !!}" data-type="Special {{ $special->name }}"
                                           class="delete-button btn btn-danger"><i
                                                    class="fa fa-trash-o f-s-14 "></i></a>

                                        <a href=""
                                           class="btn btn-info edit-class">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="specialModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                   Add new
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['class' => 'form-horizontal','url' => url(route('user_special_access_create_post'))]) !!}
                    <div class="row">
                        <div class="form-group m-l-0 m-r-0">
                            <label for="name" class="col-sm-4 ">Tag name</label>
                            <div class="col-sm-8">
                                {!! Form::text('name',null ,['class' =>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group m-l-0 m-r-0">
                            <label for="slug" class="col-sm-4 ">Tag slug</label>
                            <div class="col-sm-8">
                                {!! Form::text('slug',null ,['class' =>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group m-l-0 m-r-0">
                            <label for="description" class="col-sm-4 ">Tag description</label>
                            <div class="col-sm-8">
                                {!! Form::textarea('description',null ,['class' =>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group m-l-0 m-r-0">
                            <label for="success_message" class="col-sm-4 ">Select blog</label>
                            <div class="col-sm-8">
                                {!! Form::select('blog',[''=> 'Select Blog'] + $blogs,null,['class' => 'form-control select-blog']) !!}
                            </div>
                        </div>

                        <div class="form-group m-l-0 m-r-0 hide products-box">
                            <label for="success_message" class="col-sm-4 ">Select Product</label>
                            <div class="col-sm-8">
                                {!! Form::select('product',[],null,['class' => 'form-control select-product']) !!}
                            </div>
                        </div>

                        <div class="form-group m-l-0 m-r-0 hide products-box">
                            {!! Form::submit('Add',['class' => 'btn btn-primary pull-right']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    @include('btybug::_partials.delete_modal')
@stop

@section( 'JS' )
    <script>
        $(document).ready(function () {
            $("body").on('change','.select-blog',function () {
                var id = $(this).val();

                $.ajax({
                    type: 'POST',
                    url: "{!! route('user_special_access_get_products') !!}",
                    data: {id:id},
                    headers: {
                        'X-CSRF-TOKEN': $("input[name='_token']").val()
                    },
                    dataType: 'json',
                    success: function (data) {
                        if (! data.error) {
                            var option = ''
                            $('.select-product').empty()
                            $.each(data.data, function (k, v) {
                                option += '<option value="' + v.id + '">' + v.title + '</option>';
                            })

                            $('.select-product').append(option);
                            $('.products-box').removeClass('hide')
                        }else{
                            $('.select-product').empty();
                            $('.products-box').addClass('hide');
                        }
                    }
                });
            })
        })
    </script>
@stop
