<?php

$parentsArray = [];
if(isset($page) && $page){
    $parentsArray = \Btybug\FrontSite\Services\FrontendPageService::getFirstParent($page);
}

?>

<div class="col-md-12">
    <div class="{{isset($settings["style"]) ? $settings["style"] : 'bty-breadcrumb-3'}}">
        <ul>
            <li><a href="/">Home</a></li>
            @if($parentsArray)
                @foreach($parentsArray as $parent)
                    @if($parent->url != "home")
                            <li><a href="{{$parent->url}}">{{$parent->title}}</a></li>
                    @endif
                @endforeach
            @endif
        </ul>
    </div>
</div>

{!! BBstyle($_this->path.DS.'css'.DS.'styles.css',$_this) !!}