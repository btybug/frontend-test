@extends('btybug::layouts.mTabs',['index'=>'role_membership'])
@section('tab')
    <div class="row">
        <div class="col-sm-12">
            <a class="btn btn-primary pull-right" href="{{route('user_membership_create')}}">Create New</a>
        </div>

        <div class="col-sm-12">
            <div class="box-info full">
                <h2><strong>List All</strong> Membership</h2>
                <div class="table-responsive">
                    <table class="table table-hover datatable">
                        <thead>
                        <tr>
                            <th>Icon</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($memberships as $membership)
                            <tr>
                                <td>
                                    <div style="max-width: 100px;overflow: hidden;height: 50px;">
                                        @if($membership->icon)
                                            <img src="{!! $membership->icon !!}" width="50"/>
                                        @else
                                            No Icon
                                        @endif
                                    </div>
                                </td>
                                <td>{!! $membership->name !!}</td>
                                <td>{!! $membership->slug !!}</td>
                                <td>
                                    <a data-href="{!! url('/admin/users/memberships/delete') !!}"
                                       data-key="{!! $membership->id !!}" data-type="Membership {{ $membership->name }}"
                                       class="delete-button btn btn-danger"><i
                                                class="fa fa-trash-o f-s-14 "></i></a>

                                    <a href="{{ route('user_membership_edit', $membership->id) }}"
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
    @include('btybug::_partials.delete_modal')
@stop
