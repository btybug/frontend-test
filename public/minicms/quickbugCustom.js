$(document).ready(function() {
  $(".bugit").on("click", function(e) {
    e.preventDefault();
    var form = $("#bugit_form").serialize();
    $.ajax({
      type: "POST",
      url: "/profiles/social/bugit",
      datatype: "json",
      data: form,
      headers: {
        "X-CSRF-TOKEN": $("input[name='_token']").val()
      },
      cache: false,
      success: function(data) {
        if (!data.error) {
          $(".bugsContent").html(data.html);
        }
      }
    });
  });
});

$(function() {
  $("body").on("keyup", ".search-youtube", function(e) {
    $(".youtube-videos-list").show();

    e.preventDefault();
    // prepare the request
    var request = gapi.client.youtube.search.list({
      part: "snippet",
      type: "video",
      q: encodeURIComponent($(".search-youtube").val()).replace(/%20/g, "+"),
      maxResults: 25,
      order: "viewCount",
      publishedAfter: "2015-01-01T00:00:00Z"
    });
    // execute the request
    request.execute(function(response) {
      var results = response.result;
      $(".youtube-videos-list").empty();
      $.each(results.items, function(index, item) {
        $(".youtube-videos-list").append(
          youtubeHtml(
            item.id.videoId,
            item.snippet.thumbnails.default.url,
            item.snippet.title,
            item.snippet.description,
            item.snippet.channelTitle
          )
        );
      });
    });
  });
});

function youtubeHtml(id, imgUrl, title, description, author) {
  return `<div class="youtube-videos-list-item bg-secondary text-white" id="${id}">
  <div class="row">
  <div class="col-sm-2">
  <img src="${imgUrl}" alt="${title}">
  </div>
  <div class="col-sm-10">
  <h4 class="youtube-videos-list-item-title">${title}</h4>
  <div>
  <span>Posted by: ${author}</span>
</div>
  </div>
  </div>

<div class="mb-2 p-2 bg-dark">
  <p>${description}</p>
</div>

</div>`;
}

function init() {
  gapi.client.setApiKey("AIzaSyCVyIau4tPD0XGRT6ANMUfhYzdv6G79SI0");
  gapi.client.load("youtube", "v3", function() {
    // yt api is ready
  });
}

$("body").on("click", ".youtube-videos-list-item-title", function() {
  let elm = $(this).closest(".youtube-videos-list-item");
  let id = elm.attr("id");
  console.log(id);
  console.log($(this));
  $("#youtube-video-key").val(id);
  $(".search-youtube").val($(this).text());
  $(".youtube-videos-list").empty();
  $(".youtube-videos-list").append(elm);
});
$("body").on("keyup", ".giphy-search", function() {
  $(".giphy-container").empty();

  let inputValue = $(this).val();

  // Create the API URL
  var publicKey = "PEsm8KVG94eHrL2Ol9hOueIVoiFDamQg"; // Public API Key
  var limit = "25"; // Limit API to 10 gifs
  var queryURL =
    "http://api.giphy.com/v1/gifs/search?q=" +
    inputValue +
    "&limit=" +
    limit +
    "&api_key=" +
    publicKey;
  //console.log(queryURL);

  // Creates AJAX call for the specific animal button being clicked
  $.ajax({ url: queryURL, method: "GET" }).done(function(response) {
    console.log(response);
    // Loop through the JSON output to collect each Animal Object
    for (var i = 0; i < response.data.length; i++) {
      // Collect the animal gif URLs
      var currentStillURL = response.data[i].images.fixed_height_still.url; // still image
      var currentMovingURL = response.data[i].images.fixed_height.url; // moving image

      // Collect the animal gif Ratings
      var currentTitle = response.data[i].title;

      // Create a Div to house Gif and Rating
      var currentGifDiv = $("<div>");
      currentGifDiv.addClass("gif_container"); // Added a class
      currentGifDiv.attr("data-name", "unclicked"); // Added a Data Attributed for clicked

      // Append Rating to current gif
      var currentGifTitle = $("<h4>");
      currentGifTitle.text(currentTitle);
      currentGifTitle.addClass("gif_title");
      currentGifDiv.append(currentGifTitle);

      // Append Still Image
      var currentGifImage = $("<img>");
      currentGifImage.addClass("still_gif"); // Added a class for still gif
      currentGifImage.attr("src", currentStillURL);
      currentGifDiv.append(currentGifImage);

      // Append Moving Gif Image
      var currentGif = $("<img>");
      currentGif.addClass("moving_gif"); // Added a class for animated gif
      currentGif.attr("src", currentMovingURL);
      currentGif.hide(); // Hide the moving gif
      currentGifDiv.append(currentGif);
      currentGifDiv.attr("data-id", response.data[i].id);
      currentGifDiv.attr("data-title", currentTitle);
      currentGifDiv.attr("data-url", currentMovingURL);
      // Append current Div to the DOM
      $(".giphy-container").append(currentGifDiv);
    }
  });
});

$("body").on("click", ".gif_title", function() {
  let elm = $(this).closest(".gif_container");
  console.log("elm");
  console.log(elm);
  // console.log(object);
  // console.log($(this))
  console.log("elmid");
  console.log(elm.data("id"));
  $("#giphy-id").val(elm.data("id"));
  $("#giphy-title").val(elm.data("title"));
  $("#giphy-url").val(elm.data("url"));
  $(".giphy-search").val($(this).text());
  $(".giphy-container").empty();
  $(".giphy-container").append(elm);
});
$("body").on("mousemove", ".still_gif", function() {
  console.log($(this).next());
  $(this)
    .next()
    .attr("style", "display: block !important");
  $(this).attr("style", "display: none !important");
});
$("body").on("mouseleave", ".moving_gif", function() {
  console.log($(this).prev());
  $(this)
    .prev()
    .attr("style", "display: block !important");
  $(this).attr("style", "display: none !important");
});
