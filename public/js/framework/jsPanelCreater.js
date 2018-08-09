jsPanel.create({
  theme: "primary",
  container: "#containerForJsPanel",
  headerTitle: "my panel #1",
  position: "center-top 0 58",
  contentSize: { width: "450px", height: "250px" },
  content: `  <div class="tree-container full-code-editor" >
              <div id="full-code-editor"></div>
          </div>`,
  callback: function() {
    this.content.style.padding = "20px";
  },
  onbeforeclose: function() {
    return false;
  }
});

jsPanel.create({
  theme: "primary",
  container: "#containerForJsPanel",
  headerTitle: "my panel #1",
  position: "center-top 0 58",
  contentSize: { width: "auto", height: "500px" },
  content: `    <div class="tree-container tree-view-container" style="opacity: 1; transform: translateX(0); display: block;">
              <ul class="tree-list sortable-list"></ul>
          </div>`,
  callback: function() {
    this.content.style.padding = "20px";
  },
  onbeforeclose: function() {
    return false;
  }
});

jsPanel.create({
  theme: "primary",
  container: "#containerForJsPanel",
  headerTitle: "my panel #1",
  position: "center-top 0 58",
  contentSize: { width: "auto", height: "auto" },
  content: `  <div class="tree-container createAssets-container" style="opacity: 1; transform: translateX(0); display: block;">
              <div class="assets-area col-12">
                  <div class="card mb-3">
                      <div class="d-flex justify-content-between panel card-header">
                          <a data-toggle="collapse" href="#collapseExampleJs" role="button" aria-expanded="false" aria-controls="collapseExampleJs">
                              <i class="fas fa-arrow-circle-down"></i> Js
                          </a>

                          <div class="button">
                              <button class="btn btn-sm btn-warning create-new-asset-input"><i class="fas fa-link"></i></button>
                              <label class="btn btn-sm btn-primary "> <input type="file" name="myFile" hidden><i class="fas fa-file"> </i></label>
                              
                          </div>
                      </div>

                          <div class="collapse studio-js" data-asset="studio-js" id="collapseExampleJs">
                              <div class="card-body">
                                  <div class="d-flex justify-content-between inside-panel mb-2">
                                      <div class="assets-item">
                                          <input type="text" class="form-control w-90 asset-input">
                                      </div>
                                      <div class="delete-opt">
                                          <button class="btn btn-sm btn-danger remove-asset-input"><i class="fas fa-times"></i></button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                  </div>

                  <div class="card mb-3">
                      <div class="d-flex justify-content-between panel card-header">
                          <a data-toggle="collapse" href="#collapseExampleCss" role="button" aria-expanded="false" aria-controls="collapseExampleCss">
                              <i class="fas fa-arrow-circle-down"></i> CSS
                          </a>

                          <div class="button">
                              <button class="btn btn-sm btn-warning"><i class="fas fa-link"></i></button>
                              <button class="btn btn-sm btn-primary create-new-asset-input"><i class="fas fa-file"></i></button>
                          </div>
                      </div>

                      <div class="collapse studio-css"  data-asset="studio-css" id="collapseExampleCss">
                          <div class="card-body">
                              <div class="d-flex justify-content-between inside-panel mb-2">
                                  <div class="assets-item">
                                      <input type="text" class="form-control w-90 asset-input">
                                  </div>
                                  <div class="delete-opt">
                                      <button class="btn btn-sm btn-danger remove-asset-input"><i class="fas fa-times"></i></button>
                                  </div>
                              </div>
                              
                          </div>
                      </div>
                  </div>

                  <div class="card mb-3">
                      <div class="d-flex justify-content-between panel card-header">
                          <a data-toggle="collapse" href="#collapseExampleImages" role="button" aria-expanded="false" aria-controls="collapseExampleImages">
                              <i class="fas fa-arrow-circle-down"></i> Images
                          </a>

                          <div class="button">
                              <button class="btn btn-sm btn-warning"><i class="fas fa-link"></i></button>
                              <button class="btn btn-sm btn-primary create-new-asset-input"><i class="fas fa-file"></i></button>
                          </div>
                      </div>

                      <div class="collapse" data-asset="studio-images" id="collapseExampleImages">
                          <div class="card-body">
                              <div class="d-flex justify-content-between inside-panel mb-2">
                                  <div class="assets-item">
                                      <input type="text" class="form-control w-90 asset-input">
                                  </div>
                                  <div class="delete-opt">
                                      <button class="btn btn-sm btn-danger remove-asset-input"><i class="fas fa-times"></i></button>
                                  </div>
                              </div>
                              
                          </div>
                      </div>
                  </div>

              </div>
          </div>`,
  callback: function() {
    this.content.style.padding = "20px";
  },
  onbeforeclose: function() {
    return false;
  }
});

$(".showLayers, .createHtml, .createAssets, .add-html-items").click(function() {
  switch (
    $(this)
      .text()
      .trim()
  ) {
    case "Layers":
      $("#jsPanel-2").addClass("displayToggle");
      break;
    case "HTML":
      $("#jsPanel-1").addClass("displayToggle");
      break;
    case "Assets":
      $("#jsPanel-3").addClass("displayToggle");
      break;
    case "Add item":
      $("#jsPanel-4").addClass("displayToggle");
      break;
    default:
      break;
  }
});

$("body").on("click", ".jsPanel-btn-close", function(e) {
  e.preventDefault();
  $(this)
    .closest(".jsPanel")
    .removeClass("displayToggle");
});

$("body").on("click", ".jsPanel-btn-maximize", function(e) {
  e.preventDefault();
  $(this)
    .closest(".jsPanel")
    .find(".jsPanel-content")
    .css({ height: "100%" });
  $(this)
    .closest(".jsPanel")
    .addClass("w-100 h-100");
});

$("body").on("click", ".jsPanel-btn-normalize", function(e) {
  e.preventDefault();
  $(this)
    .closest(".jsPanel")
    .removeClass("w-100 h-100");
});
