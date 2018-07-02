<div id="settings_div111">
    <div class="form-group my_rows1">
        <h3 for="newcontainer" class="col-sm-4 labelTitle">Images</h3>
        <div class="col-sm-10 ">
           <div class="col-md-12 slider-box div_for_append">
               @if(isset($settings['images']))
                   @foreach($settings['images'] as $key => $image)
                       <div data-id="{{ $key }}">
                           <label>Image {{ $key }}</label>
                           <input type="text" name="images[{{ $key }}]" data-id="{{ $key }}" value="{{ $image }}" class="form-control" />
                           <a href="javascript:void(0)" class="btn btn-info remove_image" data-id="{{ $key }}"><i class="fa fa-remove"></i></a>
                       </div>
                   @endforeach
               @endif
           </div>
            <div class="col-md-12 custom_margin_top_8">
                <a href="javascript:void(0)" class="btn btn-info add_image"><i class="fa fa-plus"></i></a>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        $('body').delegate(".remove_image",'click',function(){
            $(this).parent().remove();
        });

        $("body").on('click','.add_image', function () {
            var data_key = $('.div_for_append div:last-child input').data('id') + 1;

            var append = '<div data-id="'+data_key+'">'+
                '<label>Image '+ data_key +'</label>'+
                '<input type="text" name="images['+ data_key +']" data-id="'+ data_key +'" class="form-control" />'+
                '<a href="javascript:void(0)" class="btn btn-info remove_image" data-id="'+ data_key +'"><i class="fa fa-remove"></i></a>'+
                '</div>';
            $(".div_for_append").append(append);
        })
    })
</script>



