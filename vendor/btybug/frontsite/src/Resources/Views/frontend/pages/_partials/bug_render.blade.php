<div class="all-content">
    <div class="daily">
     <span>
         <img src="/public/images/girl2.png" alt="">
         <span style="margin-left: 20px">{!! $user->display_name !!}</span></span>
        <div><span style="margin-right: 40px; letter-spacing: 1px"><i class="fas fa-calendar-alt"  style="padding-right: 10px"></i> Daily</span>
            <i class="fas fa-caret-down"></i></div>
    </div>
    <div class="pm">
        <span>Yesterday At 06:17 PM</span>
        <i class="fas fa-thumbtack"></i>
    </div>
    <div class="text">
        <p>
           {{ issetReturn($data,'bug','no message') }}
        </p>
    </div>
    <div class="button1 d-flex align-items-center">
        <i class="fas fa-at"></i>
        @if(isset($data['tags']))
            @foreach($data as $item)
                <button type="button" class="btn btn-primary">{{$item}}</button>
                <button type="button" class="btn btn-primary">Jack Wilth</button>
                <button type="button" class="btn btn-primary">Rania Dewell</button>
                <button type="button" class="btn btn-primary">...</button>
            @endforeach
        @endif
    </div>
    <div class="button2 d-flex align-items-center">
        <i class="fas fa-hashtag"></i>
        <button type="button" class="btn btn-primary">Friendship</button>
        <button type="button" class="btn btn-primary">Friends</button>
        <button type="button" class="btn btn-primary">Love</button>
    </div>
    <div class="img-friend">
        <img src="/public/images/layer12.jpg" alt="">
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