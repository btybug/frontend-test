$(".bb-media-main-image").val()
  ? $(".image-main").attr("src", $(".bb-media-main-image").val())
  : null;
$(".bb-media-tmp-image").val()
  ? $(".image-tmp").attr("src", $(".bb-media-tmp-image").val())
  : null;

var elm = "";
$("body").on("click", ".media-modal-open", function() {
  $("#mysettingsModal").addClass("in");
  console.log(
    $(this)
      .closest("#media-main-box")
      .find(".bb-media-data-id")
  );
  elm = $(this)
    .closest("#media-main-box")
    .find(".bb-media-data-id")
    .attr("data-id");
});
$("body").on("click", ".media-modal-close", function() {
  console.log($(this));
  $(this)
    .closest(".modal")
    .removeClass("in");
});

$("body").on("click", ".media-select", function() {
  let path = document.querySelector("#path-location");

  document.querySelector(`#${elm}`)
    ? (document.querySelector(`#${elm}`).value = path.value)
    : null;
  document.querySelector(".image-main")
    ? (document.querySelector(".image-main").src =
        document.querySelector("#user-media-url-relative").value +
        "/" +
        path.value)
    : null;
  document.querySelector(".image-tmp")
    ? (document.querySelector(".image-tmp").value = path.getAttribute(
        "data-small-image"
      ))
    : null;
  document.querySelector(`.image-tmp`)
    ? (document.querySelector(`.image-tmp`).src = path.getAttribute(
        "data-small-image"
      ))
    : null;
  console.log(location.pathname == "/profiles/social/quick-bugs");
  if (location.pathname == "/profiles/social/quick-bugs") {
    console.log(111);
    if (path.getAttribute("data-small-image-all-tmb")) {
      console.log(11111);
      $(".list-upload_img").empty();
      let images = path.getAttribute("data-small-image-all-tmb").split(",");
      console.log(images);
      images.forEach((item, index) => {
        let html = `<li data-big-image-id="${
          document.querySelector(".bb-media-main-image").value.split(",")[index]
        }" class="list-inline-item">
        <img src="${item}" alt="">
        <span class="del delete-tmb-image"><i class="fas fa-times"></i></span>
    </li>`;
        $(".list-upload_img").append(html);
      });
    }
  }

  $(this)
    .closest(".modal")
    .removeClass("in");
  // savesettingevent();
});

$("body").on("click", ".delete-tmb-image", function() {
  let parent = $(this).parent();
  let bigImage = parent.data("big-image-id");
  let newBigImages = document
    .querySelector(".bb-media-main-image")
    .value.split(",")
    .filter(item => item !== bigImage);
  document.querySelector(".bb-media-main-image").value = newBigImages.join();
  parent.remove();
});
