<?php
$product = [];
if (isset($settings["blog"]) && !count($product)) {
    $table = $settings["blog"];
    $slug = implode("_", explode("-", $table));
    if (\Schema::hasTable($slug)) {
        $product = DB::table($slug)->select("*")->get();
        $product = collect($product)->toArray();
    }
}
function includeContent($item,$settings,$image,$title,$price){
    if (isset($settings[$item]) && $settings[$item]=='style_image' ){
        $img=' <div class="img-box">
                     <a href="#"><img alt="Product image" src="'.$image.'" class="img-responsive center-block" style="height: 180px;width: 170px"></a>
                 </div>';
        echo $img;
    }
    if(isset($settings[$item]) && $settings[$item]=='style_name'){
        $title=' <h4 class="text-center">'.$title.'</h4>';
        echo $title;
    }
    if(isset($settings[$item]) && $settings[$item]=='style_rating'){
        $rating='  <div class="star-rating text-center">
                                <ul class="list-inline">
                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                </ul>
                            </div>';
        echo $rating;
    }
    if(isset($settings[$item]) && $settings[$item]=='style_price'){
        preg_match('!\d+!', $price, $matches);
        $price='<h5 class="text-center"><p class="item-price"><b>$'.head($matches).'</b></p></h5>';
        echo $price;
    }
    if(isset($settings[$item]) && $settings[$item]=='style_cart'){
        $button='<div class="text-center add-cart"><a href="#" class="btn btn-primary ok">Add to Cart</a></div>';
        echo $button;
    }
}
?>

@if(isset($product)&&count($product)>0)
    <section class="bty-slider">
        <div class="container">
            <div class="owl-carousel owl-theme slider-carousel custom">
                    @foreach($product as $key => $value)
                        <div class="item">
                            <div class="">
                                <?php includeContent('first_item',$settings,$value->image,$value->title,$value->price);?>
                                <?php includeContent('second_item',$settings,$value->image,$value->title,$value->price);?>
                                <?php includeContent('third_item',$settings,$value->image,$value->title,$value->price);?>
                                <?php includeContent('forth_item',$settings,$value->image,$value->title,$value->price);?>
                                <?php includeContent('fifth_item',$settings,$value->image,$value->title,$value->price);?>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </section>

<script type="text/javascript">
    $(document).ready(function() {
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items: 4,
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 5000
        });
        $('.play').on('click', function() {
            owl.trigger('play.owl.autoplay', [1000])
        });
        $('.stop').on('click', function() {
            owl.trigger('stop.owl.autoplay')
        })
    })
</script>
@endif
