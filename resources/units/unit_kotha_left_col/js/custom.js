(function () {
    var token = '1362124742.3ad74ca.6df307b8ac184c2d830f6bd7c2ac5644',
        num_photos = 6;

    $.ajax({
        url: 'https://api.instagram.com/v1/users/self/media/recent',
        dataType: 'jsonp',
        type: 'GET',
        data: {access_token: token, count: num_photos},
        success: function(data){
//    console.log(data);
            for( x in data.data ){
                $('#rudr_instafeed').append('<li class="single-instagram"><img src="'+data.data[x].images.low_resolution.url+'"></li>');
            }
        },
        error: function(data){
            console.log(data);
        }
    });
})();

