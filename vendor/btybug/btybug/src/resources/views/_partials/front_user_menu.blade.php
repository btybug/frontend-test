<div class="col-10 nopadding ">
    <div class="stick-flex">
        <div class="sticky-user">
            <div class="img">
                <img src="/public/images/girl-cover.jpg" alt="girl">
            </div>
            <div class="info d-flex align-items-center">
                <h2>{!! $active !!}</h2>
            </div>
        </div>
        <ul class="ux-tabs__headers">
            @foreach($items as $key=>$item)
            <li class="ux-tabs__header @if($item['title']==$active) active @endif">
                <a href="{!! url($item['url']) !!}"
                   class="hvr-sweep-to-bottom d-flex justify-content-center align-items-center w-100"><i
                            class="fas fa-clipboard"></i>
                    <span>{!! $item['title'] !!}</span>
                </a>
            </li>
            @endforeach
        </ul>
        <ul class="list-inline " style="display: inline-block">
            <li class="list-inline-item add" id="add-new-page"><a  href="{!! route('mini_media_drive') !!}">
                    <span class="icon"><i class="fas fa-plus"></i></span>
                    <span class="name">New Page</span></a>
            </li>
        </ul>
    </div>

</div>
<div class="col-2 nopadding">
    <div class="ux-tabs__dropdown">
        <span class="icon"><i class="far fa-clone"></i></span>
        <span class="more">More</span>
        <i class="fas fa-angle-down"></i>

        <ul class="ux-tabs__dropdown-items">
            <li class="ux-tabs__dropdown-item">Item 1</li>
        </ul>
    </div>
</div>