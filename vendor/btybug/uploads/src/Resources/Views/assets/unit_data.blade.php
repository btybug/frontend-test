@extends('btybug::layouts.mTabs',['index'=>'upload_assets'])
@section('tab')
    @inject('home','Btybug\btybug\Models\Home')
    <div class="col-md-8">
        <table class="table table-borderd m-t-20">
            <thead>
            <tr>
                <th>Unit</th>
                <th>Js Path</th>
                <th>Page</th>
            </tr>
            </thead>
            <tbody>
            @if(count($units))
                @foreach($units as $name => $unit)
                    <tr>
                        <td>{{ $name }}</td>
                        <td>
                            path
                        </td>
                        <td>
                            {!! count($unit) !!}
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3">No Results</td>
                </tr>
            @endif
            {{--@foreach($pages as $page)--}}
            {{--@php--}}
            {{--$a=$home->render($page->url,[],true,$page);--}}
            {{--$units = \Config::get('units',[]);--}}
            {{--@endphp--}}

            {{--@if(count($units))--}}
            {{--@foreach($units as $unit)--}}
            {{--<tr>--}}
            {{--<td>{!! $page->title !!}</td>--}}
            {{--<td>--}}
            {{--<p>Unit: {!! $unit['unit']->title !!}</p>--}}
            {{--<p>Variation: {!!$unit['variation']->title !!}</p>--}}
            {{--</td>--}}
            {{--</tr>--}}
            {{--@endforeach--}}
            {{--@php--}}
            {{--\Config::set('units',[]);--}}
            {{--@endphp--}}
            {{--@endif--}}

            {{--@endforeach--}}
            </tbody>
        </table>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    panel
                </h4>
            </div>
            <div class="panel-body">

            </div>
        </div>
    </div>

@stop

@section('CSS')
@stop

@section('JS')
@stop