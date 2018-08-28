$(document).ready(function() {
  var templateHashtag,
    templateAt,
    templateSign,
    templateYoutube,
    templateImages,
    templateMusic,
    templateGif,
    templateLocation;
  templateHashtag = $("#hidden-template-hashtag").html();
  templateAt = $("#hidden-template-at").html();
  templateSign = $("#hidden-template-sign").html();
  templateYoutube = $("#hidden-template-youtube").html();
  templateImages = $("#hidden-template-images").html();
  templateMusic = $("#hidden-template-music").html();
  templateGif = $("#hidden-template-gif").html();
  templateLocation = $("#hidden-template-location").html();

  $("body").on(
    "click",
    ".quick_bug .main-bug .bottom .icons ul",
    templateAdded
  );
  function templateAdded(e) {
    e.preventDefault();
    if (!$(e.target).hasClass("list-inline")) {
      var targetLink = e.target.closest("a");
      var targetClass = targetLink.className;
      var added_costom_template = $("#added_costom_template");
      switch (targetClass) {
        case "hashtag-link active":
          $(added_costom_template).append(templateHashtag);
          targetLink.classList.remove("active");
          $(".tags_bug_custom").tagsinput();
          break;
        case "at-link active":
          $(added_costom_template).append(templateAt);
          targetLink.classList.remove("active");
          console.log(11111);
          var citynames = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace("name"),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch: {
              url: "/getusers",
              filter: function(list) {
                return $.map(list, function(item) {
                  console.log(item);
                  return { name: item.username };
                });
              }
            }
          });
          citynames.initialize();
          console.log($(".mention-friends"));
          $(".mention-friends").tagsinput({
            maxTags: 3,
            typeaheadjs: {
              name: "citynames",
              displayKey: "name",
              valueKey: "name",
              source: citynames.ttAdapter()
            }
          });

          break;
        case "sign-link active":
          $(added_costom_template).append(templateSign);
          targetLink.classList.remove("active");
          break;
        case "youtube-link active":
          $(added_costom_template).append(templateYoutube);
          targetLink.classList.remove("active");
          break;
        case "images-link active":
          $(added_costom_template).append(templateImages);
          targetLink.classList.remove("active");
          break;
        case "music-link active":
          $(added_costom_template).append(templateMusic);
          targetLink.classList.remove("active");
          break;
        case "gif-link active":
          $(added_costom_template).append(templateGif);
          targetLink.classList.remove("active");
          break;
        case "location-link active":
          $(added_costom_template).append(templateLocation);
          targetLink.classList.remove("active");
          initAutocomplete();
          break;
        default:
          return;
      }
    }
  }

  $("body").on(
    "click",
    ".quick_bug .main-bug .main-content .form-group .del-icon",
    function(e) {
      e.preventDefault();
      var classDel = $(this).data("delgroup");
      switch (classDel) {
        case "del-hashtag":
          $("body")
            .find(".hashtag-link")[0]
            .classList.add("active");
          break;
        case "del-at":
          $("body")
            .find(".at-link")[0]
            .classList.add("active");
          break;
        case "del-sign":
          $("body")
            .find(".sign-link")[0]
            .classList.add("active");
          break;
        case "del-youtube":
          $("body")
            .find(".youtube-link")[0]
            .classList.add("active");
          break;
        case "del-images":
          $("body")
            .find(".images-link")[0]
            .classList.add("active");
          break;
        case "del-music":
          $("body")
            .find(".music-link")[0]
            .classList.add("active");
          break;
        case "del-star":
          $("body")
            .find(".gif-link")[0]
            .classList.add("active");
          break;
        case "del-location":
          $("body")
            .find(".location-link")[0]
            .classList.add("active");
          break;
        default:
          return;
      }

      $(this)
        .closest(".form-group")[0]
        .remove();
    }
  );
  $(window).scroll(function() {
    var sticky = $(".profile-sticky .ux-tabs"),
      scroll = $(window).scrollTop();

    if (scroll >= 95) sticky.addClass("fixed-sticky");
    else sticky.removeClass("fixed-sticky");
  });

  var window_width = $(window).width();
  $(window).on("resize", function() {
    var win = $(this); //this = window
    // yourHeader = $('#top-navigation').height();
    window_width = win.width();
    if ($(this).scrollTop() >= yourHeader) {
      // StickyTop();
    } else {
      // StickyDown()
    }
    // console.log($(this).scrollTop());
    // console.log(yourHeader);
  });

  $("body").on("click", ".navbar-brand", function() {
    $(this)
      .closest("#header")
      .find(".head-left-menu")
      .toggleClass("active");
  });
  $("body").on("click", ".head-left-menu .close", function() {
    $(this)
      .closest(".head-left-menu")
      .removeClass("active");
  });

  var yourHeader = $("#top-navigation").height();

  $(window).scroll(function() {
    yourHeader = $("#top-navigation").height();
    if ($(this).scrollTop() >= yourHeader) {
      StickyTop();
    } else {
      StickyDown();
    }
  });

  // Get the navbar
  var navbarSticky = document.querySelector(".profile-sticky .ux-tabs");
  // var topnavigation = document.querySelector("#top-navigation");

  // Get the offset position of the navbar
  //        var sticky = navbar.offsetTop;
  var sticky = navbarSticky ? navbarSticky.offsetTop : 0;

  // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
  function StickyTop() {
    recalculateTabs();

    if ($(".profile-sticky ul.ux-tabs__dropdown-items li").length < 1) {
      $(".profile-sticky .ux-tabs__headers")
        .parent()
        .removeClass("col-10")
        .css({ width: "100%" });
      $(".profile-sticky .ux-tabs__headers").css({ display: "flex" });
      $(".profile-sticky .ux-tabs__headers > li").css({ flex: "auto" });
    } else {
      $(".profile-sticky .ux-tabs__headers  >li:first-of-type").removeAttr(
        "style"
      );
    }
    // topnavigation.classList.add("sticky");
  }

  function StickyDown() {
    recalculateTabs();
    // topnavigation.classList.remove("sticky");
    if ($(".profile-sticky ul.ux-tabs__dropdown-items li").length < 1) {
      $(".profile-sticky .ux-tabs__headers")
        .parent()
        .addClass("col-10")
        .removeAttr("style");
      $(".profile-sticky .ux-tabs__headers").removeAttr("style");
      $(".profile-sticky .ux-tabs__headers > li").removeAttr("style");
    } else {
      if (
        $(".profile-sticky .ux-tabs__headers > li:not(:hidden)").length == 1
      ) {
        $(".profile-sticky .ux-tabs__headers > li:first-of-type").css({
          width: "100%"
        });
      } else {
        $(".profile-sticky .ux-tabs__headers > li:first-of-type").removeAttr(
          "style"
        );
      }
    }
  }

  function myFunction() {}

  // Monsieur, high level idea for eUI to improve ux-tabs component.
  // Could be applied to angular component with some tricks.

  const headers = document.querySelectorAll(".profile-sticky .ux-tabs__header");
  const dropdown = document.querySelector(".profile-sticky .ux-tabs__dropdown");
  // const dropdownCount = document.querySelector('.ux-tabs__dropdown-count');
  const dropdownItems = document.querySelector(
    ".profile-sticky .ux-tabs__dropdown-items"
  );

  dropdown.addEventListener("click", function() {
    dropdownItems.classList.toggle("ux-u-d-block");
  });

  function recalculateTabs() {
    let hiddenTabs = [];
    headers.forEach(h => {
      h.style.display = ""; // by default its block for divs

      // all tabs which are floated, should not be visible on main bar
      if (h.offsetTop > 0) {
        h.style.display = "none";
        hiddenTabs.push(h);
      }

      // show dropdown only if there are some tabs not fitting on the screen monsieur !
      dropdownItems.innerHTML = "";
      // dropdownCount.innerHTML = hiddenTabs.length;
      dropdown.style.visibility = hiddenTabs.length > 0 ? "visible" : "hidden";

      // populate dropdown with names of hidden tabs.
      hiddenTabs.forEach(tabName => {
        const li = document.createElement("li");
        // let classNameOrignal = tabName.className.split(' ')
        // classNameOrignal.forEach(item => li.classList.add(item))
        li.classList.contains("ux-tabs__header")
          ? li.classList.remove("ux-tabs__header")
          : null;

        li.innerHTML = tabName.innerHTML;
        li.classList.add("ux-tabs__dropdown-item");
        dropdownItems.appendChild(li);
      });
    });
  }

  // we might debounce here monsieur, some browsers shoot events like crazy during resize.
  window.addEventListener("resize", recalculateTabs, true);
  recalculateTabs();

  if ($(".profile-sticky .ux-tabs__headers > li:not(:hidden)").length == 1) {
    $(".profile-sticky .ux-tabs__headers > li:first-of-type").css({
      width: "100%"
    });
  } else {
    $(".profile-sticky .ux-tabs__headers > li:first-of-type").removeAttr(
      "style"
    );
  }
});

$("body").on("click", ".add-icon", function() {
  let html = `<div class="d-flex">
    <div class="col-sm-11 pl-0">
        <div class="input-group mb-2">
            <div class="input-group-append blue-cl">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><i class="fas fa-globe-asia"></i></button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">
                        <i class="fab fa-facebook-f icon-blue"></i>
                        <span class="name">Facebook</span>
                    </a>
                    <a class="dropdown-item active" href="#">
                        <i class="fab fa-twitter icon-green"></i>
                        <span class="name">Twitter</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fab fa-yahoo icon-purple"></i>
                        <span class="name">Yahoo</span>
                    </a>

                    <a class="dropdown-item" href="#">
                        <i class="fab fa-google icon-red"></i>
                        <span class="name">Google</span>
                    </a>
                </div>
            </div>
            <input class="form-control" placeholder="Profile URL" aria-label="Text input with dropdown button"
                   name="social_media[]" type="text">
            <div class="input-group-append blue-cl">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><i class="fas fa-globe-asia"></i></button>
                <div class="dropdown-menu" x-placement="bottom-start"
                     style="position: absolute; transform: translate3d(395px, 54px, 0px); top: 0px; left: 0px; will-change: transform;">
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-globe-asia icon-blue"></i>
                        <span class="name">Public</span>
                    </a>
                    <a class="dropdown-item active" href="#">
                        <i class="fas fa-user-friends icon-green"></i>
                        <span class="name">Members</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-user-friends icon-purple"></i>
                        <span class="name">All Members</span>
                    </a>

                    <a class="dropdown-item" href="#">
                        <i class="fas fa-lock icon-red"></i>
                        <span class="name">Only Me</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-1 pl-0 align-self-center">
        <div class="col-sm-1 pl-0 align-self-end socialmedia-add">
            <span class="remove-social-media-input"><i class="fas fa-minus"></i></span>
        </div>
    </div>
</div>

`;

  $(".social-medias-links").prepend(html);
});

$("body").on("click", ".remove-social-media-input", function() {
  $(this)
    .closest(".d-flex")
    .remove();
});
