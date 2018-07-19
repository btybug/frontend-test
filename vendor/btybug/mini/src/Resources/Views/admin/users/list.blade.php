@extends('btybug::layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 table-responsive p-0">
            <table class="table table-btybug">
                <thead>
                <tr class="bg-black text-white">
                    <th width="63" align="center">#</th>
                    <th width="178">Email</th>
                    <th width="194">Username</th>
                    <th width="162">Status</th>

                    <th width="125">Mini Cms Membership</th>
                    <th width="204">Joined date</th>
                    <th width="133">Options</th>
                </tr>
                </thead>
                <tbody>
                @if(count($users))
                    @foreach($users as $user)
                        <tr>
                            <td>
                                {{ $user->id }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>{{ $user->username }}

                            </td>
                            <td>
                                {{--<span class="td-active">active</span>--}}
                                {{--<span class="td-inactive">inactive</span>--}}
                                {{ $user->status }}
                            </td>


                            <td>
                                {!! 'N/A' !!}
                            </td>

                            <td>
                                {{ \Btybug\btybug\Helpers\helpers::formatDate($user->created_at) }}
                                <p>{{ \Btybug\btybug\Helpers\helpers::formatTime($user->created_at) }}</p>
                            </td>
                            <td>
                                {{--<a href="{!! route('user_edit',$user->id)!!}"--}}
                                       {{--class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>--}}
                                {{--<span class="m-r-5">--}}
                                    {{--<a data-href="{!! route('admin.users.delete') !!}"--}}
                                       {{--data-key="{!! $user->id !!}" data-type="User {{ $user->username }}"--}}
                                       {{--class="delete-button btn btn-danger btn-xs"><i--}}
                                                {{--class="fa fa-trash-o f-s-14 "></i></a>--}}
                                {{--</span>--}}

                                {{--<a href="{!! url('/admin/profile',$user->id)!!}" class="btn btn-primary btn-xs"><i--}}
                                                {{--class="fa fa-eye"></i></a>--}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                {!! $users->render() !!}
                @else
                    <tr>
                        <td class="text-center warning" colspan="9">
                            No users
                        </td>
                    </tr>
                    </tbody>
                @endif


            </table>

        </div>
    </div>
    @include('btybug::_partials.delete_modal')
@stop
@section('CSS')
    {!! HTML::style('public/css/backend_layouts_style.css') !!}
@stop
@section('JS')
@stop