var elm = "";
$("body").on("click", ".media-modal-open", function () {
    $("#mysettingsModal").addClass("in");
    console.log($(this).closest("#media-main-box").find(".bb-media-data-id"))
    elm = $(this).closest("#media-main-box").find(".bb-media-data-id").attr("data-id");
});
$("body").on("click", ".media-modal-close", function () {
    console.log($(this));
    $(this)
        .closest(".modal")
        .removeClass("in");
});

$("body").on("click", ".media-select", function() {
  let location = document.querySelector("#path-location");

  document.querySelector(`#${elm}`) ?  document.querySelector(`#${elm}`).value = "public/" + location.value : null
  document.querySelector('.image-main') ? document.querySelector('.image-main').src = "public/" + location.value : null
  document.querySelector('.image-tmp') ? document.querySelector('.image-tmp').value = location.getAttribute("data-small-image") : null
  document.querySelector(`.image-tmp`) ? document.querySelector(`.image-tmp`).src = location.getAttribute("data-small-image") : null
  $(this)
    .closest(".modal")
    .removeClass("in");
  savesettingevent();
});
