var elm = "";
$("body").on("click", ".media-modal-open", function () {
    $("#mysettingsModal").addClass("in");
    elm = $(this).attr("data-id");
    console.log(elm);
});
$("body").on("click", ".media-modal-close", function () {
    console.log($(this));
    $(this)
        .closest(".modal")
        .removeClass("in");
});

$("body").on("click", ".media-select", function() {
  let location = document.querySelector("#path-location");
  document.querySelector(`#${elm}`).value = "public/" + location.value;
  let temp = (document.querySelector(
    `#tmp_${elm}`
  ).value = location.getAttribute("data-small-image"));
    let temp2 = (document.querySelector(
        `.tmp_${elm}`
    ).src = "/" + location.getAttribute("data-small-image"));
  console.log(temp);
  $(this)
    .closest(".modal")
    .removeClass("in");
  savesettingevent();
});
