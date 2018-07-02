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
                $img='<div class="img-box"><img src="'.$image.'" class="img-responsive img-fluid" alt=""></div>';
                echo $img;
            }
            if(isset($settings[$item]) && $settings[$item]=='style_name'){
                $title=' <h4>'.$title.'</h4>';
                echo $title;
            }
            if(isset($settings[$item]) && $settings[$item]=='style_rating'){
                $rating='  <div class="star-rating">
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
                $price='<p class="item-price"><b>$'.head($matches).'</b></p>';
                echo $price;
            }
            if(isset($settings[$item]) && $settings[$item]=='style_cart'){
                $button='<a href="#" class="btn btn-primary ok">Add to Cart</a>';
                echo $button;
            }
    }
    ?>
    <style type="text/css">
        body {
            background: #e2eaef;
            font-family: "Open Sans", sans-serif;
        }
    </style>

    @if(isset($product)&&count($product)>0)
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
                        <!-- Carousel indicators -->
                        <ol class="carousel-indicators">
                            @foreach(array_chunk($product,4) as $key=>$setting)
                                <li data-target="#myCarousel" data-slide-to="{{$key}}" class="{{$key==0?'active':''}}"></li>
                            @endforeach
                        </ol>
                        <!-- Wrapper for carousel items -->
                        <div class="carousel-inner">
                            @foreach(array_chunk($product,4) as $key=>$setting)
                                <div class="item carousel-item {{$key==0?'active':''}}">
                                    <div class="row">
                                        @foreach ($setting as $value)
                                            <div class="col-sm-3">
                                                <div class="thumb-wrapper">
                                                            <?php includeContent('first_item',$settings,$value->image,$value->title,$value->price);?>
                                                    <div class="thumb-content">
                                                            <?php includeContent('second_item',$settings,$value->image,$value->title,$value->price);?>
                                                            <?php includeContent('third_item',$settings,$value->image,$value->title,$value->price);?>
                                                            <?php includeContent('forth_item',$settings,$value->image,$value->title,$value->price);?>
                                                            <?php includeContent('fifth_item',$settings,$value->image,$value->title,$value->price);?>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- Carousel controls -->
                        <a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <script type="text/javascript">
        $(document).ready(function(){
            $(".wish-icon i").click(function(){
                $(this).toggleClass("fa-heart fa-heart-o");
            });
        });
    </script>