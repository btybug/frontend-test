$(document).ready(function () {
  var slider_width = $('.right-side').width();
  let buttonValue = $(".add-unit-btn").html()
  $('.add-unit-btn').click(function () {

    if ($(this).css("margin-right") == slider_width + "px" && !$(this).is(':animated')) {
      $('.right-side,.add-unit-btn').animate({ "margin-right": '-=' + slider_width });
      $(this).html(buttonValue)
      $(".save-unit").remove()
    }
    else {
      if (!$(this).is(':animated'))//perevent double click to double margin
      {
        $('.right-side,.add-unit-btn').animate({ "margin-right": '+=' + slider_width });
        $(this).html("Close")
        let button = $(`<button type="button" class="btn btn-outline-dark btn-lg save-unit" style="float: left">Save</button>`)
        $(this).parent().append(button)
      }
    }
  });

  $(".right-side, #droppable").sortable();
  $(".right-side, #droppable").droppable({
    accept: ".item-container",
    drop: function (e, ui) {
      var dropped = ui.draggable;
      var droppedOn = $(this);
      $(this).append(dropped.clone().removeAttr('style').removeClass("item-container").addClass("item"));
      dropped.remove();
    }
  });

  $("#droppable").droppable({
    accept: ".item",
    drop: function (e, ui) {
      var dropped = ui.draggable;
      var droppedOn = $(this);
      $(this).append(dropped.clone().removeAttr('style').removeClass("item").addClass("item-container"));
      dropped.remove();
    }
  });

});     