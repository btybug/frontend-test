@if(count($bugs))
    @foreach($bugs as $val)
        <div class="all-content">
            <div class="daily">
             <span>
                 @if($user->site_image)
                    <img src="{!! url($user->site_image) !!}" alt="">
                 @else
                     <img src="/public/images/girl2.png" alt="">
                 @endif

                 <span style="margin-left: 20px">{{$val->display_name}}</span></span>
                <div><span style="margin-right: 40px; letter-spacing: 1px"><i class="fas fa-calendar-alt"  style="padding-right: 10px"></i> Daily</span>
                    <i class="fas fa-caret-down"></i></div>
            </div>
            <div class="pm">
                <span>{{ BBgetDateFormat(date("Y-m-d h:i:sa")) }}</span>
                <i class="fas fa-thumbtack"></i>
            </div>
            <div class="text">
                <p>
                    @if(isset($val->bugit))
                        {{ $val->bugit}}
                    @endif
                </p>
            </div>
            <div class="button1 d-flex align-items-center">
                @if(isset($val->mention_friends))
                    <i class="fas fa-at"></i>
                    <button type="button" class="btn btn-primary">{{$val->mention_friends}}</button>
                @endif
            </div>
            <div class="button2 d-flex align-items-center">
                @if(isset($val->tags))
                    <i class="fas fa-hashtag"></i>
                    @php
                        $tags = array();
                        $tags = explode(',',$val->tags)
                    @endphp
                @foreach($tags as $item)
                        <button type="button" class="btn btn-primary">{{$item}}</button>
                @endforeach

                @endif
            </div>
            <div class="img-friend">
                @if(isset($val->site_image))
                    <img src="{!! url($val->site_image) !!}" alt="image url">
                @endif
            </div>
            <div class="container-fluid foot">
                <div class="row">
                    <div class="col-md-4">
                        <i class="far fa-comment-alt" style="color: #cb473b"></i>
                        <span style="margin-left: 30px">Comment</span>
                        <span style="margin-left: 30px">63</span>
                    </div>
                    <div class="col-md-1 d-flex justify-content-center">
                        <i class="fas fa-plus" style="color: #6ebf69"></i>
                    </div>
                    <div class="col-md-2 d-flex justify-content-center">
                        <span style="color: #3488b0">125,850</span>
                    </div>
                    <div class="col-md-1 d-flex justify-content-center">
                        <i class="fas fa-minus" style="color: #d45f3a"></i>
                    </div>
                    <div class="col-md-4 d-flex justify-content-end">
                        <i class="fas fa-bug" style="color: #5db96d; margin-right: 30px"></i>
                        <span>Rebug</span>
                        <span style="margin-left: 30px">190</span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif