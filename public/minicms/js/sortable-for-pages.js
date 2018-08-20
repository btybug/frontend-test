$(".bb-menu-area")
  .sortable({
    cursor: "move",
    revert: true,
    stop: function(e, ui) {
      let sorted = $(".bb-menu-area").sortable("toArray");

      $.ajax({
        url: "/my-account/my-site/btybug/pages/sorting",
        dataType: "json",
        type: "POST",
        data: { data: sorted },
        headers: {
          "X-CSRF-TOKEN": $("input[name='_token']").val()
        },
        success: function(data) {},
        error: function(data) {
          console.log(data);
        }
      });
    }
  })
  .find(".Item[class~=ui-sortable-helper]")
  .on("transitionend", function(e) {
    $(this).css("transform", "rotate(0deg)");
  });
$(".bb-menu-area").disableSelection();
//       $("body").on('click','.delete_page',function () {
//           var id = $(this).data('id');
//           $.ajax({
//               url: '{!! route('mini_my_site_btybug_pages_delete') !!}',
//               dataType: 'json',
//               type: 'POST',
//               data: {id: id},
//               headers: {
//                   'X-CSRF-TOKEN': $("input[name='_token']").val()
//               },
//               success: function(data){
//                   if(! data.error){
//                       console.log(data)
//                   }
//               }
//           });
//       });
//   </script>
//  {{-- {!! HTML::script('public/js/create_pages.js') !!}
//   {!! HTML::script('public/js/admin_pages.js') !!}
//   {!! HTML::script('public/js/menus.js') !!}
//   <script>
//       $(document).ready(function () {
//           $("body").on('click','.show-page',function () {
//               var id = $(this).data('id');
//               $.ajax({
//                   url: '{!! route('mini_page_show') !!}',
//                   dataType: 'json',
//                   type: 'POST',
//                   data: {id: id},
//                   headers: {
//                       'X-CSRF-TOKEN': $("input[name='_token']").val()
//                   },
//                   success: function(data){
//                       if(! data.error){
//                           console.log(data)
//                           $(".view-box").html(data.response.html);
//                       }
//                   }
//               });
//           });

//           let items = $(".Item")

//       });
//   </script>--}}
//   <script>
//       $('#nav-pages-tab').addClass('active');
//   </script>
