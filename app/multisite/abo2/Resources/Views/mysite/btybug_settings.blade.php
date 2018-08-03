@extends('mini::layouts.app')
@extends('mini::layouts.mTabs',['index'=>'mini_my_site_btybug'])
@section('tab')
    <label>Select language</label>
    <select>
        <option>En</option>
        <option>Ru</option>
        <option>Am</option>
    </select>
@endsection
