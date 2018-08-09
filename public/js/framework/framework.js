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
    let elm = $this;
    var realElm = null;
    if (elm.width()) {
      let temp = $this.prop("outerHTML");
      temp = $(temp);
      temp[0].removeAttribute("dnd-placeholder");
      if (temp[0].classList.length === 1) {
        temp.removeAttr("class");
      } else {
        temp.removeClass("ui-droppable");
      }
      realElm = $this;
      framework.codeWallet.forEach((item, index) => {
        if (item.prop("outerHTML") === temp.prop("outerHTML")) {
          $(".preview-area-selected").attr("data-index", index);
        }
      });
    } else {
      document
        .querySelector(".preview-area")
        .querySelectorAll("*")
        .forEach(item => {
          let newItem = $(item).prop("outerHTML");
          newItem = removeDnDAtrbutes($(newItem));

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
    var index = Number($this.closest("[data-index]").attr("data-index")),
      nodeCode = this.codeWallet[index];
    return nodeCode[0].outerHTML;
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
        let prevItemIndex = ui.item.prev().data("index");
        let currentItemIndex = ui.item.data("index");
        if (prevItemIndex) {
          let prevItemHtml = framework.codeWallet[prevItemIndex];
          let currentItemHtml = framework.codeWallet[currentItemIndex];
          let noEditFullCode = codeEditor.getValue();
          let y =
            prevItemHtml.prop("outerHTML") + currentItemHtml.prop("outerHTML");
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
          dropFinshed = true;
        } else {
          let currentItemHtml = framework.codeWallet[currentItemIndex];
          let noEditFullCode = codeEditor.getValue();

          let editFullCode = noEditFullCode.replace(
            framework.codeWallet[currentItemIndex].prop("outerHTML"),
            ""
          );
          let finalEditCode = currentItemHtml.prop("outerHTML") + editFullCode;
          fullCode = finalEditCode;
          framework.parseNewCodeToAll(finalEditCode);
          dropFinshed = true;
        }
      }
    });
    $(".item-container").droppable({
      accept: ".item-container",
      classes: {
        // "ui-droppable-active": "ui-state-active",
        "ui-droppable-hover": "ui-state-hover"
      },
      drop: function(e, ui) {
        var dropped = ui.draggable;
        var droppedOn = $(this);
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
      var treeList = framework.nodeTreeGenerator(
        $("<wrap>" + fullCode + "</wrap>")
      );
      $(".tree-list").html(treeList);
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
        var treeList = framework.nodeTreeGenerator(
          $("<wrap>" + codeContent + "</wrap>")
        );

        $(".tree-list").html(treeList);

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
                greedy: true,
                classes: {
                  "ui-droppable-hover": "ui-state-hover"
                },
                drop: function(event, ui) {
                  let remAttrElement = removeDnDAtrbutes($(this));
                  remAttrElement = $(remAttrElement);
                  let htmlElement = remAttrElement.prop("outerHTML");
                  let code = codeEditor.getValue();

                  remAttrElement.append(
                    `<${ui.draggable.text()}>Text</${ui.draggable.text()}>`
                  );

                  var newCode = code.replace(
                    htmlElement,
                    remAttrElement.prop("outerHTML")
                  );

                  codeEditor.setValue(newCode);
                  codeEditor.clearSelection();
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
        var treeList = framework.nodeTreeGenerator(
          $("<wrap>" + codeContent + "</wrap>")
        );

        $(".tree-list").html(treeList);

        // Live render
        var codeValue = phpFullCodeEditor.getValue().toString() + "\n";
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
          var codeValue = phpFullCodeEditor.getValue().toString() + "\n";
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

jsPanel.create({
  theme: "primary",
  container: "#containerForJsPanel",
  headerTitle: "Html items",
  position: "center-top 0 58",
  contentSize: { width: "450px", height: "auto" },
  content: htmlElments.join(""),
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
