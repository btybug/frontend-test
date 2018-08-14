var codeEditor,
  phpCodeEditor,
  phpNodeCodeEditor,
  phpFullCodeEditor,
  nodeCode,
  selectedAttr,
  functionSelectedItem,
  fullCode;
var nodeChanger = true;
var dropFinshed = false;
var connectCheckr = false;

var framework = {
  globalIndex: 0,

  // Code wallet
  codeWallet: [],

  // Current Node code
  currentNodeCode: "",
  // All html tags
  allHtmlTags: [
    "a",
    "abbr",
    "address",
    "area",
    "article",
    "aside",
    "audio",
    "b",
    "base",
    "bdi",
    "bdo",
    "blockquote",
    "body",
    "br",
    "button",
    "canvas",
    "caption",
    "cite",
    "code",
    "col",
    "colgroup",
    "data",
    "datalist",
    "dd",
    "del",
    "details",
    "dfn",
    "dialog",
    "div",
    "dl",
    "dt",
    "em",
    "embed",
    "fieldset",
    "figcaption",
    "figure",
    "footer",
    "form",
    "h1",
    "h2",
    "h3",
    "h4",
    "h5",
    "h6",
    "head",
    "header",
    "hgroup",
    "hr",
    "html",
    "i",
    "iframe",
    "img",
    "input",
    "ins",
    "kbd",
    "keygen",
    "label",
    "legend",
    "li",
    "link",
    "main",
    "map",
    "mark",
    "math",
    "menu",
    "menuitem",
    "meta",
    "meter",
    "nav",
    "noscript",
    "object",
    "ol",
    "optgroup",
    "option",
    "output",
    "p",
    "param",
    "picture",
    "pre",
    "progress",
    "q",
    "rb",
    "rp",
    "rt",
    "rtc",
    "ruby",
    "s",
    "samp",
    "script",
    "section",
    "select",
    "slot",
    "small",
    "source",
    "span",
    "strong",
    "style",
    "sub",
    "summary",
    "sup",
    "svg",
    "table",
    "tbody",
    "td",
    "template",
    "textarea",
    "tfoot",
    "th",
    "thead",
    "time",
    "title",
    "tr",
    "track",
    "u",
    "ul",
    "var",
    "video",
    "wbr"
  ],

  // Generate node tree
  nodeTreeGenerator: function(node) {
    var nodeEl = node[0];
    var output = "";

    if (nodeEl.tagName !== "WRAP") {
      output +=
        '<li class="item-container" data-index="' + this.globalIndex + '">';
      output +=
        '<div class="node-content">' +
        nodeEl.tagName +
        this.parseTemplate("controls") +
        "</div>";
    }

    this.codeWallet.push(node);

    // Increase index
    this.globalIndex++;

    if (node.children().length > 0) {
      if (nodeEl.tagName !== "WRAP") {
        output += "<ul class='sortable-list'>";
      }

      node.children().each(function() {
        output += framework.nodeTreeGenerator($(this));
      });

      if (nodeEl.tagName !== "WRAP") {
        output += "</ul>";
      }
    }

    if (nodeEl.tagName !== "WRAP") {
      output += "</li>";
    }

    return output;
  },

  nodeTreeGeneratorForFunctions: function(node) {
    var nodeEl = node[0];
    var output = "";

    if (nodeEl.tagName !== "WRAP") {
      output +=
        '<li class="item-container" data-index="' + this.globalIndex + '">';
      output += '<div class="node-content">' + nodeEl.tagName + "</div>";
    }

    this.codeWallet.push(node);

    // Increase index
    this.globalIndex++;

    if (node.children().length > 0) {
      if (nodeEl.tagName !== "WRAP") {
        output += "<ul class='sortable-list'>";
      }

      node.children().each(function() {
        output += framework.nodeTreeGeneratorForFunctions($(this));
      });

      if (nodeEl.tagName !== "WRAP") {
        output += "</ul>";
      }
    }

    if (nodeEl.tagName !== "WRAP") {
      output += "</li>";
    }

    return output;
  },

  makePreviewElement: function($this) {
    console.log($this);
    var elm = $this;
    var realElm = null;
    if (elm.width()) {
      let temp = removeDnDAtrbutesInLayers($($this));
      realElm = $this;
      framework.codeWallet.forEach((item, index) => {
        let newItem = removeDnDAtrbutesInLayers(item);
        if (newItem.outerHTML === temp.outerHTML) {
          console.log(index);
          let id = "j-node-" + index;
          $(".preview-area-selected").attr("id", `j-node-${index}`);
        }
      });
    } else {
      document
        .querySelector(".preview-area")
        .querySelectorAll("*")
        .forEach(item => {
          let newItem = $(item).prop("outerHTML");
          newItem = removeDnDAtrbutesInLayers($(newItem));
          if (
            $(newItem)
              .prop("outerHTML")
              .trim() === elm.prop("outerHTML")
          ) {
            realElm = $(item);
          }
        });
    }
    let elmPostionData = {
      top: realElm.offset().top,
      left: realElm.offset().left,
      width: realElm.width(),
      height: realElm.height() < "25" ? "30px" : realElm.height()
    };
    $(".preview-area-selected")
      .css(elmPostionData)
      .addClass("displayToggle");
  },
  // Parse templates
  parseTemplate: function(template, variables) {
    var templateHTML = $("#bbt-" + template).html();
    $.each(variables, function(key, value) {
      key = "{" + key + "}";
      templateHTML = templateHTML.replace(new RegExp(key, "gm"), value);
    });

    return templateHTML;
  },
  parseNewCodeToAll: function(newCode) {
    phpFullCodeEditor.setValue(newCode);
    phpFullCodeEditor.clearSelection();
    codeEditor.setValue(newCode);
    codeEditor.clearSelection();
  },

  parseHtmlTagesToOption: function(elm, tags) {
    let newTags = tags.map(
      item => `<option data-tag="${item}">${item}</option>`
    );
    elm.append(newTags);
  },

  // Get node code editor value
  getNodeCodeValue: function($this) {
    try {
      var index =
        parseInt(
          $this
            .closest("li")
            .attr("id")
            .match(/(\d+)$/)[0]
        ) - 1;
    } catch (error) {
      var index = parseInt(
        $(".preview-area-selected")
          .attr("id")
          .match(/(\d+)$/)[0]
      );
    }
    console.log(index);
    var nodeCode = framework.codeWallet[index];
    let editCode = removeDnDAtrbutesInLayers(nodeCode);
    console.log(editCode);
    return editCode.outerHTML;
  },
  hideAllContentElements() {
    framework.hideElement($(".contetnFiledValue"));
    framework.hideElement($(".contentStatic"));
    framework.hideElement($(".contentFunctions"));
    // framework.hideElement($("#php-node-code-editor"));
  },
  // Generate inserted code list of content and attributes
  generateInsertedList: function() {
    var nodeCode = phpNodeCodeEditor.getValue(),
      nodeCodeEl = $(nodeCode),
      list = "",
      firstContainerEl;
    if (nodeCodeEl.text()) {
      list +=
        '<div class="inserted-item" data-item="content" data-attr="content" bb-click="handleNodeItemClick"> Content <div class="controls"><input type="checkbox" class="style-checkbox"  > <a href="#" bb-click="removeNodeContent"><i class="fas fa-trash"></i></a> </div> </div>';
    }

    if (nodeCode.indexOf("@foreach") !== -1) {
      list +=
        '<div class="inserted-item" data-item="loop" bb-click="handleNodeItemClick"> Loop: foreach <div class="controls"> <a href="#" bb-click="removeNodeLoop"><i class="fas fa-trash"></i></a> </div> </div>';
    }

    nodeCodeEl.each(function(i, containerNodeElCode) {
      if (containerNodeElCode.tagName)
        return (firstContainerEl = nodeCodeEl[i]);
    });

    if (firstContainerEl) {
      $.each(firstContainerEl.attributes, function() {
        list +=
          '<div class="inserted-item" data-item="attribute" data-attr="' +
          this.name +
          '" bb-click="handleNodeItemClick"> Attribute: ' +
          this.name +
          '<div class="controls"> <input type="checkbox" class="style-checkbox"  > <a href="#" bb-click="removeNodeAttr" data-attr="' +
          this.name +
          '"> <i class="fas fa-trash"></i></a> </div> </div>';
      });
    }

    $(".inserted-code").html(list);
  },
  // Click events
  clickEvents: {
    editPHPCode: function($this) {
      framework.hideAllContentElements();
      nodeChanger = false;
      nodeCode = null;
      let code = codeEditor.getValue();
      // Get last saved code
      nodeCode = framework.getNodeCodeValue($this);
      framework.makePreviewElement($(nodeCode));
      console.log(nodeCode);
      phpNodeCodeEditor.setValue(nodeCode);
      phpNodeCodeEditor.clearSelection();
      $("#current-node-text")
        .text($(nodeCode)[0].nodeName)
        .attr("data-selected-index", $this.closest("li").data("index"));
      framework.currentNodeCode = nodeCode;

      framework.showElement($(".inserted-code"));

      // Hide all panels
      framework.hideElement($(".hidable-panel"));
      framework.hideElement($('[bb-click="nodePHPCodeSave"]'));

      $(".openCSSEditor").trigger("click");

      framework.generateInsertedList();
      nodeChanger = true;
    },
    removePHPCode: function($this) {
      let code = codeEditor.getValue();
      let nodeCode = framework.getNodeCodeValue($this);
      let newCode = code.replace(nodeCode, "");
      framework.parseNewCodeToAll(newCode);
    },
    removeHtmlElement: function($this) {
      var nodeCode = framework.getNodeCodeValue($this),
        mainCode = codeEditor.getValue();
      let newCode = mainCode.replace(nodeCode, "");
      framework.parseNewCodeToAll(newCode);
    },
    nodePHPCodeSave: function() {
      var nodeCode = framework.currentNodeCode,
        modifiedCode = phpNodeCodeEditor.getValue(),
        mainCode = codeEditor.getValue(),
        newCode;

      newCode = mainCode.replace(nodeCode, modifiedCode);
      codeEditor.setValue(style_html(newCode));
      codeEditor.clearSelection();
    },
    addHtmlTag: function($this) {
      let tagName = $this.prev().val();
      let tag = `<${tagName}></${tagName}>`;
      let code = codeEditor.getValue();
      let newCode = code.concat(tag);
      framework.parseNewCodeToAll(newCode);
    },
    nodePHPCodeLoop: function($this) {
      var currentNodeCode = phpNodeCodeEditor.getValue(),
        modifiedCode;

      modifiedCode = '<!--|@foreach([""] as $item)|-->\n';
      modifiedCode += currentNodeCode + "\n";
      modifiedCode += "<!--|@endforeach|-->";

      phpNodeCodeEditor.setValue(style_html(modifiedCode));
      phpNodeCodeEditor.clearSelection();

      framework.generateInsertedList();

      $('[data-item="loop"]').trigger("click");

      framework.hideElement($this);
    },
    btnStaticOpen: function() {
      selectedAttr = $(".inserted-item.active").data("attr");
      selectedAttr == "content" ? "text()" : selectedAttr;
      framework.hideAllContentElements();
      framework.showElement($(".contentStatic"));
      framework.showElement($(".staticDynamic"));
      let elm = $(nodeCode);
      if (selectedAttr === "content") {
        $("#staticInput").val(elm.text());
      } else {
        $("#staticInput").val(elm.attr(selectedAttr));
      }
      framework.showElement($("#php-node-code-editor"));
      framework.showElement($('[bb-click="nodePHPCodeSave"]'));
    },
    btnFieldValueOpen: function() {
      framework.hideAllContentElements();
      var filedsOptions = null;
      framework.showElement($(".contetnFiledValue"));
      if (jsonForSend) {
        filedsOptions = jsonForSend.components.map(item => {
          return `<option data-id="${item.id}">${item.label}</option>`;
        });
      } else {
        filedsOptions = `<option>Add options from options tab<option>`;
      }

      $("#formioSelect").append(filedsOptions.toString());
    },
    btnFunctionOpen: function() {
      framework.hideAllContentElements();
      framework.showElement($(".contentFunctions"));
    },
    addCode: function() {
      var codeToInsert = "",
        whereToInsert = $(".node-code-position").val(),
        nodeCode = phpNodeCodeEditor.getValue(),
        modifiedCode,
        customAttr = $("#custom-attribute").val();
      var nodeCodeEl = $(nodeCode);
      if (whereToInsert === "Attributes") {
        if (!customAttr) return;
        whereToInsert = customAttr;
      }
      let leftValues = document.querySelectorAll(".inserted-item");
      var hasContent = false;
      leftValues.forEach(item => {
        if (item) {
          if (item.getAttribute("data-attr") === "content") {
            hasContent = true;
          }
        }
      });
      if (hasContent && whereToInsert === "Content") {
        return;
      }
      if (whereToInsert === "content") {
        nodeCodeEl.html(codeToInsert);
      } else {
        nodeCodeEl.attr(whereToInsert, codeToInsert);
      }

      modifiedCode = nodeCodeEl[0].outerHTML;

      phpNodeCodeEditor.setValue(he.decode(modifiedCode));
      phpNodeCodeEditor.clearSelection();

      framework.generateInsertedList();
    },
    removeNodeAttr: function($this) {
      var nodeCode = phpNodeCodeEditor.getValue(),
        nodeCodeEl = $(nodeCode),
        modifiedCode;

      nodeCodeEl.removeAttr($this.data("attr"));

      modifiedCode = nodeCodeEl[0].outerHTML;

      phpNodeCodeEditor.setValue(he.decode(modifiedCode));
      phpNodeCodeEditor.clearSelection();
      phpFullCodeEditor.setValue(he.decode(modifiedCode));
      phpFullCodeEditor.clearSelection();
      codeEditor.setValue(he.decode(modifiedCode));
      codeEditor.clearSelection();
      framework.generateInsertedList();
    },
    removeNodeContent: function($this) {
      var nodeCode = phpNodeCodeEditor.getValue(),
        nodeCodeEl = $(nodeCode),
        modifiedCode;
      nodeCodeEl.html("");
      modifiedCode = nodeCodeEl[0].outerHTML;

      phpNodeCodeEditor.setValue(he.decode(modifiedCode));
      phpNodeCodeEditor.clearSelection();

      framework.generateInsertedList();
    },
    tabsItemClick: function($this) {
      switch ($this.text().trim()) {
        // case "Options":

        //   break;
        // case "Full Code":
        //   break;
        case "Functions":
          $(".visualCodeEditorToggle").show();
          framework.showElement($(".function-tab"));
          $(".buttons-layers").hide();
          $(".footer-editor").hide();
          $(".jsPanel").removeClass("displayToggle");
          setTimeout(function() {
            $("#preview").addClass("active show");
          }, 500);

          break;
        // case "Styles":
        //   break;
        case "Preview":
          $(".footer-editor").show();
          $(".visualCodeEditorToggle").show();
          // $(".content-width").removeClass("col-12");
          $(".buttons-layers").show();
          $(".visualCodeEditorToggle").hide();
          framework.hideElement($(".function-tab"));

          break;

        default:
          framework.hideElement($(".function-tab"));

          $(".buttons-layers").hide();
          $(".footer-editor").hide();
          $(".jsPanel").removeClass("displayToggle");
          $(".visualCodeEditorToggle").attr(
            "style",
            "display: none !important"
          );
          // $(".content-width").addClass("col-12");
          break;
      }
    },
    functionInputValueChanger: function($this) {
      if ($this.prev().attr("readonly")) {
        $this.prev().attr("readonly", false);
        $this.html(`<i class="fa fa-save"></i>`);
      } else {
        $this.prev().attr("readonly", true);
        $this.html(`<i class="fa fa-edit"></i>`);
      }
    },
    functionInputValueRemover: function($this) {
      $this.parent().remove();
    },
    functionSelectInput: function($this) {
      $(".function-tab-item-options").empty();
      $(".function-section-selecters").html(
        `<i class="far fa-check-circle"></i>`
      );
      $this.html(`<i class="fas fa-check-circle"></i>`);
      framework.showElement($(".function-tab-options"));
    },
    addFunctionSectionItem: function() {
      let elm = `<div> <input class="form-control"  value="${Date.now()}" readonly><div class="buttons"><button bb-click="functionInputValueChanger" class="btn btn-alert btn-warning"><i class="fa fa-edit"></i></button><button bb-click="functionInputValueRemover" class="btn btn-danger btn-alert"><i class="fa fa-remove"></i></button><button bb-click="functionSelectInput" class="btn btn-alert function-section-selecters btn-success"><i class="fa fa-check-circle"></i></button></div>  <div>`;
      $(".function-tab-item-section").prepend(elm);
    },
    functionSelectOptionInput: function($this) {
      $(".function-options-selecters").html(
        `<i class="far fa-check-circle"></i>`
      );
      $this.html(`<i class="fas fa-check-circle"></i>`);
      framework.showElement($(".function-tab-connections"));
      $(".function-tab-item-connections").empty();
      // 222
      let html = `<div class="d-flex justify-content-between align-items-center p-3 font-weight-bold"><p>${
        $this
          .parent()
          .parent()
          .children()[0].value
      } ${
        functionSelectedItem
          ? `Connected to ${functionSelectedItem}`
          : "not connected"
      }  </p> <button class="btn btn-primary" bb-click="functionConnectSelecter">${
        functionSelectedItem ? "Change conection" : "Connect"
      }</button></div>
        ${
          functionSelectedItem
            ? ""
            : `<ol>
          <li>Click on connect</li>
          <li>Select one of the layers</li>
          <li>Select attribute</li>
          <li>Click to add</li>
        <ol>`
        }
      `;
      $(".function-tab-item-connections").append(html);
    },
    functionConnectSelecter: function() {
      connectCheckr = true;
      var treeList = framework.nodeTreeGeneratorForFunctions(
        $("<wrap>" + codeEditor.getValue() + "</wrap>")
      );
      $(".tree-list-functions")
        .html(treeList)
        .addClass("list-height");
    },
    functionConnectItemSelecter: function($this) {},
    addFunctionOptionsItem: function($this) {
      let elm = `<div> <input  value="${Date.now()}" class="form-control" readonly><div class="buttons"> <button bb-click="functionInputValueChanger" class="btn btn-alert btn-warning"><i class="fa fa-edit"></i></button><button bb-click="functionInputValueRemover" class="btn btn-alert btn-danger"><i class="fa fa-remove"></i></button><button bb-click="functionSelectOptionInput" class="btn btn-alert function-options-selecters btn-success"><i class="fa fa-check-circle"></i></button> </div><div>`;
      $(".function-tab-item-options").prepend(elm);
      0;
    },
    handleNodeItemClick: function($this) {
      // Hobo
      framework.hideAllContentElements();
      framework.showElement($("#php-node-code-editor"));

      $(".inserted-item").removeClass("active");
      $this.addClass("active");

      var itemType = $this.data("item"),
        itemAttr = $this.data("attr");
      // Hide all panels
      framework.hideElement($(".hidable-panel"));
      framework.hideElement($('[bb-click="nodePHPCodeSave"]'));
      // Content & non class attribute
      if (itemAttr === "content") {
        framework.showElement($("#test3"));
        framework.showElement($("#php-node-code-editor"));
      } else if (itemAttr !== "class") {
        framework.showElement($("#test3"));
        framework.showElement($("#php-node-code-editor"));
        framework.showElement($('[bb-click="nodePHPCodeSave"]'));
      } else {
        framework.hideElement($("#test3"));
        framework.showElement($("#php-node-code-editor"));
        framework.showElement($("#bb-css-studio"));

        cssStudio.init(framework.currentNodeCode, {
          cssOutputSelector: "#bbcc-custom-style",
          parentSelector: ".preview-area",
          singleNode: true
        });
      }
    },
    mainPHPCodeEdit: function($this) {
      // Get last saved code
      var lastSavedCode = framework.localGet("mainPHPCode");
      if (lastSavedCode) phpCodeEditor.setValue(lastSavedCode);
      phpCodeEditor.clearSelection();

      framework.hideElement($this);
      framework.hideElement($(".tree-container"));
      framework.showElement($(".code-editor-area"));
      framework.showElement($("[bb-click=mainPHPCodeDiscard]"));
      framework.showElement($("[bb-click=mainPHPCodeSave]"));
    },
    mainPHPCodeDiscard: function($this) {
      // Get last saved code
      var lastSavedCode = framework.localGet("mainPHPCode");

      // Clear value
      if (lastSavedCode) phpCodeEditor.setValue(lastSavedCode);
      phpCodeEditor.clearSelection();

      // Show/Hide Buttons
      framework.showElement($("[bb-click=mainPHPCodeEdit]"));
      framework.hideElement($("[bb-click=mainPHPCodeDiscard]"));
      framework.hideElement($("[bb-click=mainPHPCodeSave]"));

      // Show tree & Hide Editor
      setTimeout(function() {
        framework.showElement($(".tree-container"));
        framework.hideElement($(".code-editor-area"));
      });
    },
    mainPHPCodeSave: function($this) {
      // Save code
      var currentCode = phpCodeEditor.getValue();
      framework.localSave("mainPHPCode", currentCode);

      codeEditor.getSession()._emit("change", {
        start: { row: 0, column: 0 },
        end: { row: 0, column: 0 },
        action: "insert",
        lines: []
      });

      // Show/Hide Buttons
      framework.showElement($("[bb-click=mainPHPCodeEdit]"));
      framework.hideElement($("[bb-click=mainPHPCodeDiscard]"));
      framework.hideElement($("[bb-click=mainPHPCodeSave]"));

      // Show tree & Hide Editor
      setTimeout(function() {
        framework.showElement($(".tree-container"));
        framework.hideElement($(".code-editor-area"));
      });
    },
    openCSSEditor: function($this) {
      $(".style-studio-container").animate(
        {
          height: 200
        },
        300,
        function() {
          $(".bb-css-studio").addClass("no-active");
          framework.showElement($(".closeCSSEditor"));
          framework.hideElement($(".openCSSEditor"));

          var index = $this.closest("li").data("index");
          if (index) {
            $(".bbs-field-selectors li:eq( " + index + " )").trigger("click");
          }
        }
      );
    },
    closeCSSEditor: function($this) {
      $(".bb-css-studio").removeClass("no-active");
      $(".style-studio-container").animate(
        {
          height: 0
        },
        300,
        function() {
          framework.showElement($(".openCSSEditor"));
          framework.hideElement($(".closeCSSEditor"));
        }
      );
    }
  },

  // Show
  showElement: function(element) {
    element.removeAttr("hidden");
  },

  // Hide
  hideElement: function(element) {
    element.attr("hidden", true);
  },

  // Save data in localstorage
  localSave: function(key, data) {
    localStorage.setItem(key, data);
  },

  // Get data from localstorage
  localGet: function(key) {
    localStorage.getItem(key);
  }
};

$(function() {
  // Init html elements

  framework.parseHtmlTagesToOption($("#custom-layer"), framework.allHtmlTags);
  // Init code editors
  codeEditor = ace.edit("code-editor");
  codeEditor.setTheme("ace/theme/monokai");
  codeEditor.session.setMode("ace/mode/php");
  codeEditor.getSession().setUseWrapMode(true);
  codeEditor.$blockScrolling = Infinity;

  phpNodeCodeEditor = ace.edit("php-node-code-editor");
  phpNodeCodeEditor.setTheme("ace/theme/monokai");
  phpNodeCodeEditor.session.setMode("ace/mode/php");
  phpNodeCodeEditor.setReadOnly(true);
  phpNodeCodeEditor.getSession().setUseWrapMode(true);
  phpNodeCodeEditor.$blockScrolling = Infinity;

  phpFullCodeEditor = ace.edit("full-code-editor");
  phpFullCodeEditor.setTheme("ace/theme/monokai");
  phpFullCodeEditor.session.setMode("ace/mode/php");
  //   phpFullCodeEditor.setReadOnly(true);
  phpFullCodeEditor.getSession().setUseWrapMode(true);
  phpFullCodeEditor.$blockScrolling = Infinity;
  phpFullCodeEditor.clearSelection();

  // Listen to code change
  var test = true;
  function droppableforSort() {
    $(".sortable-list").sortable({
      connectWith: ".sortable-list",
      stop: function(event, ui) {
        if (!dropFinshed) {
          let prevItemIndex = ui.item.prev().data("index");
          let currentItemIndex = ui.item.data("index");
          if (prevItemIndex) {
            let prevItemHtml = framework.codeWallet[prevItemIndex];
            let currentItemHtml = framework.codeWallet[currentItemIndex];
            let noEditFullCode = codeEditor.getValue();
            let y =
              prevItemHtml.prop("outerHTML") +
              currentItemHtml.prop("outerHTML");
            let editFullCode = noEditFullCode.replace(
              framework.codeWallet[currentItemIndex].prop("outerHTML"),
              ""
            );
            let finalEditCode = editFullCode.replace(
              prevItemHtml.prop("outerHTML"),
              y
            );
            fullCode = finalEditCode;
            framework.parseNewCodeToAll(finalEditCode);
          } else {
            let currentItemHtml = framework.codeWallet[currentItemIndex];
            let noEditFullCode = codeEditor.getValue();

            let editFullCode = noEditFullCode.replace(
              framework.codeWallet[currentItemIndex].prop("outerHTML"),
              ""
            );
            let finalEditCode =
              currentItemHtml.prop("outerHTML") + editFullCode;
            fullCode = finalEditCode;
            framework.parseNewCodeToAll(finalEditCode);
          }
          dropFinshed = true;
        }
      }
    });
    $(".item-container").droppable({
      accept: ".item-container",
      greedy: true,
      classes: {
        // "ui-droppable-active": "ui-state-active",
        "ui-droppable-hover": "ui-state-hover"
      },
      drop: function(e, ui) {
        let dropped = ui.draggable;
        let droppedOn = $(this);
        let droppedIndex = dropped.data("index");
        let droppedOnIndex = droppedOn.data("index");
        let elementToAppend = framework.codeWallet[droppedOnIndex];
        let element = framework.codeWallet[droppedIndex];
        let noEditFullCode = codeEditor.getValue();
        let x = elementToAppend.prop("outerHTML");
        let y = $(x).html($(x).html() + element.prop("outerHTML"));

        let editFullCode = noEditFullCode.replace(
          framework.codeWallet[droppedIndex].prop("outerHTML"),
          ""
        );
        let finalEditCode = editFullCode.replace(
          elementToAppend.prop("outerHTML"),
          y.prop("outerHTML")
        );
        fullCode = finalEditCode;
        framework.parseNewCodeToAll(finalEditCode);
        dropFinshed = true;
      }
    });
  }

  codeEditor.session.on("change", function() {
    if (dropFinshed) {
      // let code = codeEditor.getValue();
      framework.codeWallet = [];
      framework.globalIndex = 0;
      generateDOMTree();

      // var treeList = framework.nodeTreeGenerator(
      //   $("<wrap>" + fullCode + "</wrap>")
      // );
      // $(".tree-list").html(treeList);
      droppableforSort();
      dropFinshed = false;
    }
    if (test) {
      test = false;
      setTimeout(function() {
        // Reset code wallet & global index
        framework.codeWallet = [];
        framework.globalIndex = 0;
        var codeContent = codeEditor.getValue();
        generateDOMTree();

        // var treeList = framework.nodeTreeGenerator(
        //   $("<wrap>" + codeContent + "</wrap>")
        // );

        // $(".tree-list").html(treeList);

        // HObo

        droppableforSort();

        // Live render
        var codeValue = codeEditor.getValue().toString();

        codeValue = codeValue.replace(/<!--\|/g, "");
        codeValue = codeValue.replace(/\|-->/g, "");
        let newCodeValue = $(codeValue);
        var tempppp = "";
        classAddRecus(newCodeValue);

        $.each(newCodeValue, function(key, value) {
          if ($(newCodeValue[key]).prop("outerHTML") !== undefined) {
            tempppp += $(newCodeValue[key]).prop("outerHTML");
          }
        });
        phpFullCodeEditor.setValue(codeValue);
        phpFullCodeEditor.clearSelection();

        var data = { html: tempppp };
        test = true;

        $.ajax({
          url: $("#renderUrl").val(),
          type: "POST",
          data: data,
          headers: {
            "X-CSRF-TOKEN": $("input[name='_token']").val()
          },
          success: function(data) {
            if (!data.error) {
              $(".preview-area").html(data.html);

              // Init CSS Studio
              $("#bb-css-studio").html("");
              $("[dnd-placeholder]").droppable({
                accept: ".dnd-html-item",
                greedy: true,
                classes: {
                  // "ui-droppable": "highlight",
                  "ui-droppable-hover": "ankap-mi-ban"
                },
                drop: function(event, ui) {
                  let remAttrElement = removeDnDAtrbutes($(this));
                  remAttrElement = $(remAttrElement);
                  let htmlElement = remAttrElement.prop("outerHTML");

                  let code = codeEditor.getValue();
                  if (
                    ui.draggable
                      .parent()
                      .parent()
                      .hasClass("components-tab")
                  ) {
                    remAttrElement.append(ui.draggable.next().html());
                  } else {
                    remAttrElement.append(
                      `<${ui.draggable.text()}>Text</${ui.draggable.text()}>`
                    );
                  }

                  if ($(htmlElement).html() === $(code).html()) {
                    codeEditor.setValue(remAttrElement.prop("outerHTML"));
                  } else {
                    var newCode = code.replace(
                      htmlElement,
                      remAttrElement.prop("outerHTML")
                    );

                    codeEditor.setValue(newCode);
                    codeEditor.clearSelection();
                  }
                }
              });

              setTimeout(function() {
                framework.showElement($(".openCSSEditor"));
              }, 300);
            }
          }
        });
      });
    }
  });

  phpFullCodeEditor.session.on("change", function() {
    if (test) {
      test = false;
      setTimeout(function() {
        // Reset code wallet & global index
        framework.codeWallet = [];
        framework.globalIndex = 0;
        var codeContent = phpFullCodeEditor.getValue();
        // var treeList = framework.nodeTreeGenerator(
        //   $("<wrap>" + codeContent + "</wrap>")
        // );
        generateDOMTree();
        // $(".tree-list").html(treeList);

        // Live render
        var codeValue = phpFullCodeEditor.getValue().toString();
        //  + codeContent.toString();
        codeValue = codeValue.replace(/<!--\|/g, "");
        codeValue = codeValue.replace(/\|-->/g, "");
        codeEditor.setValue(codeValue);
        codeEditor.clearSelection();

        var data = { html: codeValue };
        test = true;

        $.ajax({
          url: $("#renderUrl").val(),
          type: "POST",
          data: data,
          headers: {
            "X-CSRF-TOKEN": $("input[name='_token']").val()
          },
          success: function(data) {
            if (!data.error) {
              $(".preview-area").html(data.html);

              // Init CSS Studio
              $("#bb-css-studio").html("");

              // $('.closeCSSEditor').trigger('click');
              setTimeout(function() {
                framework.showElement($(".openCSSEditor"));
              }, 300);
            }
          }
        });
      });
    }
  });

  $("#staticInput").keyup(function() {
    if (nodeChanger) {
      var modifiedCode = phpNodeCodeEditor.getValue(),
        mainCode = codeEditor.getValue(),
        newCode;
      if (nodeCode) {
        var nodeElement = $(modifiedCode);
        if (selectedAttr === "content") {
          nodeElement.text($(this).val());
        } else {
          nodeElement.attr(selectedAttr, $(this).val());
        }
        var nodeString = nodeElement.prop("outerHTML");
        newCode = mainCode.replace(nodeCode, nodeString);
        nodeCode = nodeString;

        codeEditor.setValue(style_html(newCode));
        codeEditor.clearSelection();
        phpNodeCodeEditor.setValue(style_html(nodeString));
        phpNodeCodeEditor.clearSelection();
        phpFullCodeEditor.setValue(style_html(newCode));
        phpFullCodeEditor.clearSelection();

        setTimeout(function() {
          framework.globalIndex = 0;
          var codeValue = phpFullCodeEditor.getValue().toString();
          codeValue = codeValue.replace(/<!--\|/g, "");
          codeValue = codeValue.replace(/\|-->/g, "");
          var data = { html: codeValue };
          $.ajax({
            url: $("#renderUrl").val(),
            type: "POST",
            data: data,
            headers: {
              "X-CSRF-TOKEN": $("input[name='_token']").val()
            },
            success: function(data) {
              if (!data.error) {
                $(".preview-area").html(data.html);
                // Init CSS Studio
                $("#bb-css-studio").html("");
                // $('.closeCSSEditor').trigger('click');
                setTimeout(function() {
                  framework.showElement($(".openCSSEditor"));
                }, 300);
              }
            }
          });
        });
        // });
      } else {
        nodeCode = framework.currentNodeCode;
      }
    }
  });
  // Make edit on element
  $("body").on("click", ".preview-area", function(e) {
    if (!$(e.target).hasClass("preview-area")) {
      framework.makePreviewElement($(e.target));
    } else {
      $(".preview-area-selected")
        .attr("style", "")
        .removeClass("displayToggle");
    }
  });

  // Apply demo code
  //   codeEditor.setValue(style_html($("#demo-html").html()));
  //   codeEditor.clearSelection();

  $("body").on("click", ".style-checkbox", function(e) {
    e.stopPropagation();
  });

  $("body").on("change", ".style-checkbox", function(e) {
    $("#styles-area").empty();
    $(".inserted-item").each((index, item) => {
      let elm = $(item)
        .find(".style-checkbox:checked")
        .closest(".inserted-item")
        .clone();
      let elmText = elm.text();
      elm.empty();
      elm.text(elmText);
      elm.appendTo("#styles-area");
    });
  });

  $("body").on("click", ".tree-list-functions", function(e) {
    let currentElement = e.target;
    if ($(currentElement).hasClass("node-content")) {
      let attributes =
        framework.codeWallet[
          currentElement.closest("[data-index]").getAttribute("data-index")
        ][0].attributes;
      var list = "";
      if (attributes.length) {
        $.each(attributes, function() {
          list += `<div class="functions-attributes" data-element="${
            e.target.textContent
          }"         
          data-item="attribute" data-attr="${this.name}" > Attribute: ${
            this.name
          }</div>`;
        });
      } else {
        list += "<div>This element don't have any attributes</div>";
      }
      $(currentElement)
        .children()
        .remove();
      $(currentElement).append(
        `<div class="main-function-attributes">${list}</div>`
      );
    }
  });

  $("body").on("click", ".functions-attributes", function(e) {
    functionSelectedItem =
      e.target.getAttribute("data-element") + ">" + e.target.textContent.trim();
    $(".function-options-selecters").click();
    $(".tree-list-functions").empty();
  });
  // Listen to click events
  $("body").on("click", "[bb-click]", function(e) {
    e.preventDefault();
    var clickEvent = $(this).attr("bb-click");
    framework.clickEvents[clickEvent]($(this));
  });

  // Node code position change event
  $(".node-code-position").change(function() {
    if ($(this).val() === "Attributes") {
      framework.showElement($(".custom-attribute"));
    } else {
      framework.hideElement($(".custom-attribute"));
    }
  });

  // Search code API
  $("#search-code").easyAutocomplete({
    url: ajaxUrl.frameworkUrl + "bb-functions/get-bb-fn-list",
    ajaxSettings: {
      type: "POST",
      headers: {
        "X-CSRF-TOKEN": $("input[name='_token']").val()
      }
    },

    getValue: function(element) {
      return element.value;
    },

    list: {
      onChooseEvent: function() {
        var selectedData = $("#search-code").getSelectedItemData();
        phpCodeEditor.session.insert(
          phpCodeEditor.getCursorPosition(),
          selectedData.value
        );
      }
    },

    theme: "square"
  });
});

function classAddRecus(data, index = 0, elementIndex = 1) {
  $(data[index]).attr("dnd-placeholder", elementIndex);

  if ($(data[index]).children().length) {
    classAddRecus($(data[index]).children(), 0, (elementIndex += 1));
  }
  index++;
  if ($(data[index]).length) {
    classAddRecus(data, index, (elementIndex += 1));
  } else {
    return;
  }
}

function removeDnDAtrbutes($this, index = 0) {
  $this = $($this);
  let temp = $this.prop("outerHTML");
  temp = $(temp);
  temp[0].removeAttribute("dnd-placeholder");

  if (temp[0].classList.length === 1) {
    temp.removeAttr("class");
  } else {
    temp.removeClass("ui-droppable ui-droppable-active");
    if (temp[0].classList.length === 1) {
      temp.removeAttr("class");
    }
  }
  temp.find("*").removeAttr("dnd-placeholder");
  $.each(temp.find("*"), function(index, item) {
    item = $(item);
    // item.removeAttr("class");

    if (item[0].classList.length === 1) {
      item.removeAttr("class");
    } else {
      item.removeClass("ui-droppable ui-droppable-active");
      if (item[0].classList.length === 0) {
        item.removeAttr("class");
      }
    }
  });

  return temp.prop("outerHTML");
}

let htmlElments = framework.allHtmlTags.map(
  item => `<p class="dnd-html-item">${item}</p>`
);

let htmlJsPanel = `<ul class="nav nav-tabs" role="tablist">
<li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#elements" role="tab" aria-controls="home" aria-selected="true">HTML Elements</a>
</li>
<li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#fields" role="tab" aria-controls="profile" aria-selected="false">Fields</a>
</li>
</ul>
<div class="tab-content">
<div role="tabpanel" class="tab-pane active" id="elements">
  ${htmlElments.join("")}
</div>
<div role="tabpanel" class="tab-pane components-tab" id="fields">
  <div><p class="dnd-html-item">Jumporton</p> <span class="fileds-components" style="display: none">
  <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1>Bootstrap Tutorial</h1> 
    <p>Bootstrap is the most popular HTML, CSS...</p> 
  </div>
</div>
  </span> </div> 
</div>
</div>
`;

let htmlJsPanelContent = ``;

jsPanel.create({
  theme: "primary",
  container: "#containerForJsPanel",
  headerTitle: "Html items",
  position: "center-top 0 58",
  contentSize: { width: "450px", height: "auto" },
  content: htmlJsPanel,
  callback: function() {
    this.content.style.padding = "20px";
  },
  onbeforeclose: function() {
    return false;
  }
});

$(".dnd-html-item").draggable({
  revert: true
});

function generateDOMTree() {
  DOMCounter = 0;

  var code = codeEditor.getValue();
  var tempDiv = document.createElement("div");
  tempDiv.innerHTML = codeEditor.getValue();
  code = tempDiv;
  // Protect grouped elements
  // code.find("[grouped]").each(function() {
  //   $(this)
  //     .find("*")
  //     .each(function() {
  //       $(this).attr("protected", true);
  //     });
  // });

  // Remove placeholder
  // code.find(".bb-placeholder-area").removeClass("bb-placeholder-area");

  // Generate tree
  // bb-main-wrapper
  var DOMTree = DOMtoJSON(code);
  var layersTree = $("#tree-container");
  // Clean tree if exists
  if ($.jstree.reference(layersTree)) {
    layersTree.jstree(true).settings.core.data = DOMTree;
    layersTree.jstree(true).refresh();
    return;
  }

  layersTree
    .jstree({
      core: {
        animation: 0,
        check_callback: true,
        themes: { stripes: true },
        data: DOMTree
      },
      plugins: ["wholerow", "noclose", "dnd"]
    })
    .bind("move_node.jstree", function(e, data) {
      let parentId =
        data.parent !== "#" ? parseInt(data.parent.match(/(\d+)$/)[0]) : 0;
      let nodeId = parseInt(data.node.id.match(/(\d+)$/)[0]);
      let code = codeEditor.getValue();

      if (parentId !== 0) {
        let elementToAppend = removeDnDAtrbutesInLayers(
          framework.codeWallet[parentId - 1]
        );
        let elementNode = removeDnDAtrbutesInLayers(
          framework.codeWallet[nodeId - 1]
        );
        if (data.old_parent !== data.parent) {
          if (data.parent === "j-node-1") {
            framework.parseNewCodeToAll(code);
          } else {
            let elementToAppendHtml = elementToAppend.outerHTML.replace(
              elementNode.outerHTML,
              ""
            );
            let newElementToAppend = elementToAppend.outerHTML.replace(
              elementNode.outerHTML,
              ""
            );

            newElementToAppend = $(newElementToAppend)[0];
            newElementToAppend.appendChild(elementNode);
            let elementToAppendNewHtml = newElementToAppend.outerHTML;
            let newCode = code.replace(elementNode.outerHTML, "");

            let finalCode = newCode.replace(
              elementToAppendHtml,
              elementToAppendNewHtml
            );
            framework.parseNewCodeToAll(finalCode);
          }
        } else {
          let newCode = "";
          let firstIndex = code.indexOf(elementToAppend.outerHTML);
          let secondIndex = code.indexOf(elementNode.outerHTML);
          let oldElementIndex = parseInt(
            $($(`#${data.parent}`).children()[3])
              .children()
              .each(function(index, item) {
                let indexElm = parseInt(item.id.match(/(\d+)$/)[0]);
                let elm = removeDnDAtrbutesInLayers(
                  framework.codeWallet[indexElm - 1]
                );
                let elmHtml = elm.outerHTML;
                newCode += elmHtml + "\n";
              })
          );
          if (parentId === 1) {
            framework.parseNewCodeToAll(newCode);
          } else {
            let newHtml = $(elementToAppend.outerHTML).empty();
            newHtml.append(newCode);
            // elementToAppend.innerHTML = newCode;

            let finalCode = code.replace(
              elementToAppend.outerHTML,
              newHtml[0].outerHTML
            );
            framework.parseNewCodeToAll(finalCode);
          }
        }
      } else {
        framework.parseNewCodeToAll(code);
      }
    })

    .on("select_node.jstree", function(e, data) {
      // // Activate node
      // var domNode = code.find('[data-bb-id="' + data.node.original.bbID + '"]');
      // activateNode(domNode);
      // Node breadcrumb
      // generateNodeBreadCrumb(data);
    });
}

function removeDnDAtrbutesInLayers($this) {
  $this = $($this);
  let temp = $this.prop("outerHTML");
  temp = $(temp);
  temp[0].removeAttribute("dnd-placeholder");
  temp[0].removeAttribute("data-bb-id");
  if (temp[0].classList.length === 1) {
    temp.removeAttr("class");
  } else {
    temp.removeClass("bb-placeholder-area");
    temp.removeClass("ui-droppable");
    if (temp[0].classList.length === 1) {
      temp.removeAttr("class");
    }
  }
  temp.find("*").removeAttr("data-bb-id");
  temp.find("*").removeAttr("dnd-placeholder");
  $.each(temp.find("*"), function(index, item) {
    item = $(item);
    if (item[0].classList.length === 1) {
      item.removeAttr("class");
    } else {
      item.removeClass("bb-placeholder-area");
      item.removeClass("ui-droppable");
      if (item[0].classList.length === 0) {
        item.removeAttr("class");
      }
    }
  });
  return temp[0];
}

function DOMtoJSON(node) {
  node = node || this;

  // DOM Counter
  DOMCounter++;
  framework.codeWallet.push(node);
  $(node).attr("data-bb-id", DOMCounter);

  var obj = {
    nodeType: node.nodeType,
    id: "j-node-" + DOMCounter
  };
  if (node.tagName) {
    obj.tagName = node.tagName.toLowerCase();
  }

  if (node.nodeName) {
    obj.nodeName = node.nodeName;
  }

  if (node.nodeValue) {
    obj.nodeValue = node.nodeValue;
  }

  var attrs = node.attributes;
  var nodeClass = "",
    nodeID = "";
  if (attrs) {
    var length = attrs.length;
    var arr = (obj.attributes = new Array(length));
    for (var i = 0; i < length; i++) {
      var attr = attrs[i];
      arr[i] = [attr.nodeName, attr.nodeValue];

      if (attr.nodeName === "class") nodeClass = attr.nodeValue;
      if (attr.nodeName === "id") nodeID = attr.nodeValue;
    }
  }

  var nodeIcon = "fa-eye";
  var nodeGroup = getNodeGroup(node);

  obj.icon = "fa " + nodeIcon;

  var nodeGroupID = nodeGroup + " #" + DOMCounter;

  // Add lock icon to protected elements
  if (typeof node.hasAttribute === "function") {
    if (node.hasAttribute("protected")) {
      nodeGroupID =
        '<i class="fa fa-lock mr-1"></i> ' + nodeGroup + " #" + DOMCounter;
    }
    var nodeGroupType = nodeGroup.toLowerCase().replace(" ", "-");

    if (nodeGroup !== "NODE") {
      nodeGroupID +=
        '<a href="#" bb-click="editPHPCode" class="bb-node-btn bb-node-edit" data-type="' +
        nodeGroupType +
        '" data-id="' +
        DOMCounter +
        '"><i class="fa fa-pencil"></i></a>';
    }
    if (nodeGroup !== "Wrapper" && !node.hasAttribute("protected")) {
      nodeGroupID +=
        '<a href="#" bb-click="removePHPCode" class="bb-node-btn bb-node-delete" data-id="' +
        DOMCounter +
        '"><i class="fa fa-trash"></i></a>';
    }

    if (
      nodeGroup === "Wrapper" ||
      nodeGroup === "Container" ||
      nodeGroup === "Row"
    ) {
      nodeGroupID +=
        '<a href="#" class="bb-node-btn bb-add-section" data-type="' +
        nodeGroup +
        '" data-id="' +
        DOMCounter +
        '"><i class="fa fa-plus"></i></a>';
    }
    nodeGroupID =
      '<span class="bb-node-' +
      nodeGroup.toLowerCase() +
      '">' +
      nodeGroupID +
      "</span>";

    obj.text = nodeGroupID;

    obj.bbID = DOMCounter;
    obj.state = {
      opened: true
    };
    // Check if children loop required
    var childNodes = node.childNodes;
    var childrenLoop = true;

    if (!childNodes || childNodes.length === 0) {
      $(node).addClass("bb-placeholder-area");
      childrenLoop = false;
    }

    if (nodeGroup === "Field") childrenLoop = false;
    // if(node.attributes["bb-group"]) childrenLoop = false;

    if (childrenLoop) {
      var cleanNodes = [];
      for (i = 0; i < childNodes.length; i++) {
        if (childNodes[i].nodeName !== "#text") {
          cleanNodes.push(childNodes[i]);
        }
      }

      length = cleanNodes.length;
      obj.children = [];
      for (let i = 0; i < length; i++) {
        var children = DOMtoJSON(cleanNodes[i]);
        obj.children.push(children);
      }
    }
    return obj;
  }
}

function getNodeGroup(node) {
  var nodeTag;
  if (node && node.tagName) {
    var nodeTag = node.tagName.toLowerCase();
  }

  var nodeGroup = nodeTag;

  if ($.inArray(nodeTag, ["button"]) !== -1) nodeGroup = "Button";
  if (
    $.inArray(nodeTag, ["h1", "h2", "h3", "h4", "h5", "h6", "span", "p"]) !== -1
  )
    nodeGroup = "Text";

  if ($.inArray(nodeTag, ["input"]) !== -1) {
    if (node.attributes.type) {
      var inputType = node.attributes.type.nodeValue;
      if ($.inArray(inputType, ["submit", "reset", "button"]) !== -1)
        nodeGroup = "Button";
    }
  }

  if (
    node &&
    node.attributes &&
    node.attributes.class &&
    node.attributes.class.nodeValue
  ) {
    var nodeClasses = node.attributes.class.nodeValue;
    if (nodeClasses.indexOf("row") !== -1) nodeGroup = "Row";
    if (nodeClasses.indexOf("col-") !== -1) nodeGroup = "Column";
    if (nodeClasses.indexOf("container") !== -1) nodeGroup = "Container";
    if (nodeClasses.indexOf("main-wrapper") !== -1) nodeGroup = "Wrapper";
  }

  if (node && node.attributes && node.attributes["data-field-id"])
    nodeGroup = "Field";

  return nodeGroup;
}
