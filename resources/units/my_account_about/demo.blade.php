<div class="col-md-9">
    <div class="profile-main">
        <div class="profile-about {{(isset($settings['style'])&& $settings['style'] ) ? $settings['style'] : 'demo-column'}}">
            <div class="about-head">
                <h3 class="@if(isset($settings['header_style'])&& $settings['header_style'])) {{$settings['header_style']}} @endif">
                    <i class="fa fa-user-o" aria-hidden="true"></i>
                    About me
                </h3>
                <p>
                    {{Auth::user()->about}}
                </p>
            </div>
            <div class="about-bottom col-md-6">
                <h3>User details</h3>
                <table>
                    <tbody>
                    <tr>
                        <td class="td-1 @if(isset($settings['detail_name_style'])&& $settings['detail_name_style'])) {{$settings['detail_name_style']}} @endif">First Name</td>
                        <td class="td-2">:</td>
                        <td class="td-3 @if(isset($settings['detail_style'])&& $settings['detail_style'])) {{$settings['detail_style']}} @endif">{{Auth::user()->f_name}}</td>
                    </tr>
                    <tr>
                        <td class="td-1 @if(isset($settings['detail_name_style'])&& $settings['detail_name_style'])) {{$settings['detail_name_style']}} @endif">Last Name</td>
                        <td class="td-2">:</td>
                        <td class="td-3 @if(isset($settings['detail_style'])&& $settings['detail_style'])) {{$settings['detail_style']}} @endif">{{Auth::user()->l_name}}</td>
                    </tr>
                    <tr>
                        <td class="td-1 @if(isset($settings['detail_name_style'])&& $settings['detail_name_style'])) {{$settings['detail_name_style']}} @endif">Address</td>
                        <td class="td-2">:</td>
                        <td class="td-3 @if(isset($settings['detail_style'])&& $settings['detail_style'])) {{$settings['detail_style']}} @endif">{{Auth::user()->address}}</td>
                    </tr>
                    <tr>
                        <td class="td-1 @if(isset($settings['detail_name_style'])&& $settings['detail_name_style'])) {{$settings['detail_name_style']}} @endif">Zip Code</td>
                        <td class="td-2">:</td>
                        <td class="td-3 @if(isset($settings['detail_style'])&& $settings['detail_style'])) {{$settings['detail_style']}} @endif">{{Auth::user()->post_code}}</td>
                    </tr>
                    <tr>
                        <td class="td-1 @if(isset($settings['detail_name_style'])&& $settings['detail_name_style'])) {{$settings['detail_name_style']}} @endif">Phone</td>
                        <td class="td-2">:</td>
                        <td class="td-3 @if(isset($settings['detail_style'])&& $settings['detail_style'])) {{$settings['detail_style']}} @endif">{{Auth::user()->phone_number}}</td>
                    </tr>
                    <tr>
                        <td class="td-1 @if(isset($settings['detail_name_style'])&& $settings['detail_name_style'])) {{$settings['detail_name_style']}} @endif">Email</td>
                        <td class="td-2">:</td>
                        <td class="td-3 @if(isset($settings['detail_style'])&& $settings['detail_style'])) {{$settings['detail_style']}} @endif">{{Auth::user()->email}}</td>
                    </tr>
                    <tr>
                        <td class="td-1 @if(isset($settings['detail_name_style'])&& $settings['detail_name_style'])) {{$settings['detail_name_style']}} @endif">Website</td>
                        <td class="td-2">:</td>
                        <td class="td-3 @if(isset($settings['detail_style'])&& $settings['detail_style'])) {{$settings['detail_style']}} @endif">{{Auth::user()->website}}</td>
                    </tr>

                    </tbody>
                </table>

            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

{!! BBstyle($_this->path.DS.'css'.DS.'style.css',$_this) !!}
{!! BBscript($_this->path.DS.'js'.DS.'custom.js',$_this) !!}
{!! useDinamicStyle('containers') !!}
{!! useDinamicStyle('texts') !!}