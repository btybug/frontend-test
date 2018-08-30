<div class="name-icon">
    <div class="span"><span>{{$user->username}}</span></div>
    <div class="icon">
        <div class="share-number">
            <i class="fas fa-share"></i>
            <div class="number"><i>207</i></div>
        </div>
        <a href="" class="comment-icon"><i class="far fa-comment-alt"></i></a>
        <a href="" class="fav-icon"><i class="far fa-heart"></i></a>
        <a href="" class="dawn-icon"><i class="fas fa-caret-down"></i></a>
    </div>
</div>
<div class="wed-developer">
    <span class="align-self-center">{{issetReturn($user,'proffesion','No Proffesion')}}</span>
    <img src="/public/images/uk-flag.jpg" alt="flag">
</div>
<div class="content-image">
    <div class="info-photo d-flex flex-wrap">
        <div class="col-lg-6 p-0">
            <div class="photo">
                <img src="/public/images/{{$user->avatar}}" alt="">
            </div>
        </div>
        <div class="col-lg-6 p-0">
            <div class="info">
                <div class="content d-flex">
                    <p>
                        <q class="qoutes"></q>
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>