<?php
    if(isset($settings['post_id'])){
        $post = DB::table('posts')->where('id', $settings['post_id'])->first();
    }
?>
<div class="col-md-3">
    <div class="sidebar-top-post {{(isset($settings['ls_style'])&& $settings['ls_style'] ) ? $settings['ls_style'] : 'demo-column'}}">
        <div class="head">
            <h3 class="@if(isset($settings['header_style'])&& $settings['header_style']){{$settings['header_style']}}@endif">
                @if(isset($settings['header_text'])){{$settings['header_text']}}@else{{'Top Post'}}@endif</h3>
        </div>
        <div class="top-post">
            <div class="img">
                <img src="@if(isset($settings['post_id']) && $post->image){{$post->image}}@else{{'https://www.pixelstalk.net/wp-content/uploads/2016/10/Crazy-cap-wear-cute-doll-nice-photos.jpg'}}@endif" alt="">
            </div>
            <div class="post-info">
                <p class="title"><a href="#" class="@if(isset($settings['title_style'])&& $settings['title_style']){{$settings['title_style']}}@endif">@if(isset($settings['post_id'])){{$post->title}}@endif</a></p>
                <span class="cat">Category</span>
                <ul class="meta">
                    <li><span><i class="fa fa-cog"></i></span><span class="tag">Lorem Ipsum</span></li>
                    <li><span><i class="fa fa-cog"></i></span><span class="tag">Lorem</span></li>
                </ul>
                <hr>
                <div class="text">
                    <p class="@if(isset($settings['desc_style'])&& $settings['desc_style']){{$settings['desc_style']}}@endif">@if(isset($settings['post_id'])){{$post->description}}@endif</p>
                </div>
                <div class="button">
                    <a href="#">Get in touch</a>
                </div>
            </div>
        </div>
    </div>
</div>

{!! BBstyle($_this->path.DS.'css'.DS.'style.css') !!}
{!! useDinamicStyle('containers') !!}
{!! useDinamicStyle('texts') !!}