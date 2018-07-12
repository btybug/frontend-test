// $(document).ready(function() {
// When the user scrolls the page, execute myFunction
window.onscroll = function() {
  myFunction();
};

// Get the navbar
var navbar = document.querySelector(".profile-responsive-tab");
var topnavigation = document.querySelector("#top-navigation");

// Get the offset position of the navbar
var sticky = navbar ? navbar.offsetTop : 0;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset >= sticky) {
    topnavigation.classList.add("sticky");
  } else {
    topnavigation.classList.remove("sticky");
  }
}

var $nav = $(".profile-responsive-tab");
var $btn = $(".profile-responsive-tab button");
var $vlinks = $(".profile-responsive-tab >div>ul:nth-of-type(1)");
var $hlinks = $(".profile-responsive-tab >div>ul:nth-of-type(2)");

var breaks = [];
var minWidth = 300;
let y = true;
function updateNav() {
  if (y) {
    $vlinks
      .children()
      .first()
      .prependTo($hlinks);
  }
  y = false;
  var test = 0;
  let x = document.querySelectorAll(".cd-side-navigation > .menuitem");
  x.forEach((item, i) => {
    if (i != x.length - 1) {
      test += item.offsetWidth;
      if (minWidth > item.offsetWidth) {
        minWidth = item.offsetWidth;
      }
    }
    // console.log(item);
  });

  console.log(minWidth, "min");
  console.log(test / $("#nav").children().length, "test");

  if (
    $vlinks.width() <
    $("#nav").children().length * (test / $("#nav").children().length)
  ) {
    breaks.push($vlinks.width());
    // Move item to the hidden list
    $vlinks
      .children()
      .first()
      .prependTo($hlinks);

    // Show the dropdown btn
    if ($btn.hasClass("hidden")) {
      $btn.removeClass("hidden");
    }

    // The visible list is not overflowing
  } else {
    // Move the item to the visible list
    console.log("ekav");
    $hlinks
      .children()
      .first()
      .appendTo($vlinks);
    breaks.pop();
    // Hide the dropdown btn if hidden list is empty
    if (breaks.length < 1) {
      $btn.addClass("hidden");
      $hlinks.addClass("hidden");
    }
  }

  // Keep counter updated
  $btn.attr("count", breaks.length);
  console.log(
    $vlinks.width() <
      $("#nav").children().length * (test / $("#nav").children().length)
  );
  // Recur if the visible list is still overflowing the nav
  if ($vlinks.width() < $("#nav").children().length * minWidth) {
    updateNav();
  }
}

$(window).resize(function() {
  updateNav();
});

$btn.on("click", function() {
  $hlinks.toggleClass("hidden");
});

updateNav();
// });
