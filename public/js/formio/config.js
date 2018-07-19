var subJSON = document.getElementById("subjson");
var jsonForSend = null;
var editData = {};
if (document.querySelector("#formJson") !== null) {
  let formJsonData = JSON.parse(document.querySelector("#formJson").value);
  editData = JSON.parse(formJsonData.json_data);
  console.log(formJsonData);
  document.querySelector(".form-name").value = formJsonData.title;
  document.querySelector(".form-description").value = formJsonData.description;
}

var builder = Formio.builder(document.getElementById("builder"), editData, {
  builder: {
    basic: false,
    advanced: false,
    data: false,
    custom: {
      title: "Custom Fields",
      weight: 10,
      components: {
        firstName: {
          title: "First Test",
          key: "firstName",
          icon: "fa fa-terminal",
          schema: {
            label: "First Name",
            type: "textfield",
            key: "firstName",
            input: true
          }
        },
        lastName: {
          title: "Last Name",
          key: "lastName",
          icon: "fa fa-terminal",
          schema: {
            label: "Last Name",
            type: "textfield",
            key: "lastName",
            input: true
          }
        },
        email: {
          title: "Email",
          key: "email",
          icon: "fa fa-at",
          schema: {
            label: "Email",
            type: "email",
            key: "email",
            input: true
          }
        },
        phoneNumber: {
          title: "Mobile Phone",
          key: "mobilePhone",
          icon: "fa fa-phone-square",
          schema: {
            label: "Mobile Phone",
            type: "phoneNumber",
            key: "mobilePhone",
            input: true
          }
        }
      }
    },
    layout: {
      components: {}
    },
    advanced: {
      components: {}
    },
    data: {
      components: {}
    },
    basic: {
      components: {}
    }
  }
}).then(function(builder) {
  var jsonElement = document.getElementById("json"); // Data full
  var formElement = document.getElementById("formio"); // full form
  builder.on("saveComponent", function() {
    var schema = builder.schema;
    console.log(schema);
    jsonForSend = schema;
    jsonElement.innerHTML = "";
    formElement.innerHTML = "";
    jsonElement.appendChild(
      document.createTextNode(JSON.stringify(schema, null, 4))
    );
    Formio.createForm(formElement, schema).then(onForm);
  });

  builder.on("editComponent", function(event) {
    console.log("editComponent", event);
  });

  builder.on("updateComponent", function(event) {
    jsonElement.innerHTML = "";
    jsonElement.appendChild(
      document.createTextNode(JSON.stringify(builder.schema, null, 4))
    );
  });
  console.log(3243124);
  builder.on("deleteComponent", function(event) {
    jsonElement.innerHTML = "";
    jsonElement.appendChild(
      document.createTextNode(JSON.stringify(builder.schema, null, 4))
    );
  });

  Formio.createForm(formElement, builder.schema).then(onForm);
  let btn2 = `<div class="btn btn-xxs btn-danger component-settings-button component-settings-add-style"><i class="glyphicon glyphicon-remove"></i></div>`;
  $(".component-btn-group").append(btn2);
});

var onForm = function(form) {
  form.on("change", function() {
    subJSON.innerHTML = ""; // Subjson result
    subJSON.appendChild(
      document.createTextNode(JSON.stringify(form.submission, null, 4))
    );
  });
};

// $("body").on("click", ".component-settings-button-edit", function () {
//   let navTabs = $(".nav-tabs")
//   let tabContent = $(".tab-content")
//   let element = `<li class="nav-item" role="presentation"><a class="nav-link add-style"  href="#style">Style</a></li>`
//   navTabs.append(element)
//   let tabPannel = `<div role="tabpanel" class="tab-pane" id="style"><input  type="text" class="form-control" placeholder="Class Name"> <i class="fa fa-plus add-input-style"></i> <i class="fa fa-minus remove-input-style"></i> <input class="form-control mr-2"  class="input-styles" type="text"> </div>`
//   tabContent.append(tabPannel)
//   document.querySelectorAll(".nav-link").forEach(item => item.addEventListener("click", function () {
//     let styleElement = document.querySelector(".add-style")
//     styleElement.classList.remove("active")
//     styleElement.parentNode.classList.remove("active")
//     $("#style").hide()

//   }))
//   document.querySelector(".add-style").addEventListener("click", function () {
//     $(".tab-content > .active").empty()
//     $(".nav-tabs > .active").removeClass("active")
//     $(".nav-tabs > .active > a").removeClass("active")
//     this.classList.add("active")
//     this.parentNode.classList.add("active")
//     $("#style").show()

//   })
// })

// $("body").on("click", ".add-input-style", function () {
//   $("")
// })

document.querySelector(".add-unit").addEventListener("click", function() {
  let components = document.querySelector(".formcomponents");
  components.classList.toggle("displayToggle");
  this.textContent = components.classList.contains("displayToggle")
    ? "Close"
    : "Add unit";
});

document
  .querySelector(".add-custom-filed")
  .addEventListener("click", function() {
    $(".add-filed-modal").trigger();
    // let components = document.querySelector(".formcomponents")
    // components.classList.toggle("displayToggle")
    // this.textContent = components.classList.contains("displayToggle") ? "Close" : "Add unit"
  });

document.querySelector(".saveForm").addEventListener("click", function() {
  let formName = document.querySelector(".form-name").value;
  let formDescription = document.querySelector(".form-description").value;
  console.log(jsonForSend);
  if (formName.trim().length === 0 && formDescription.trim().length === 0) {
    alert("formName & formDescription filesds is requried");
  } else if (formName.trim().length === 0) {
    alert("formName filed  is requried");
  } else if (formDescription.trim().length === 0) {
    alert("formDescription filed is requried");
  } else if (jsonForSend === null || jsonForSend == "undefined") {
    alert("Data is empty");
  } else {
    let editDataID =
      document.querySelector("#formJson") !== null
        ? JSON.parse(document.querySelector("#formJson").value).id
        : null;

    let obj = {
      formName: formName,
      formDescription: formDescription,
      body: JSON.stringify(jsonForSend),
      id: editDataID
    };
    $.ajax({
      type: "post",
      datatype: "json",
      url: "/admin/uploads/application/save-builder-form",
      data: obj,
      headers: {
        "X-CSRF-TOKEN": $("input[name='_token']").val()
      },
      success: function(data) {
        if (!data.error) {
          window.location.replace(data.url);
        }
      }
    });
  }
});

$("body").on("click", ".component-settings-add-style", function() {
  console.log(11121);
});

function objToString(obj) {
  var str = "";
  for (var p in obj) {
    if (obj.hasOwnProperty(p)) {
      str += p + " " + obj[p] + "\n";
    }
  }
  return str;
}
function makeid() {
  var text = "";
  var possible =
    "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
  for (var i = 0; i < 10; i++)
    text += possible.charAt(Math.floor(Math.random() * possible.length));
  return text;
}

function customStyle() {
  let customCSS = "";
  _.each(this.component.style, (value, key) => {
    if (value !== "") {
      customCSS += `${key}:${value};`;
    }
  });
  return customCSS;
}

$(document).ready(function() {
  let cssClass = `custom-${makeid()}`;
  var css = {
      [`.${cssClass}`]: ""
    },
    head = document.head || document.getElementsByTagName("head")[0],
    style = document.createElement("style");
  style.type = "text/css";
  style.id = "test1";

  count = 0;
  head.appendChild(style);
  $("body").on("click", ".btn-up", function() {
    if (
      $(".component-preview")
        .children()[0]
        .attributes.class.value.indexOf("custom") === -1
    ) {
      style.appendChild(document.createTextNode(objToString(css)));
      $($(".formio-component-customClass").children()[1]).val(cssClass);
      $(".formio-component-hideLabel")
        .children()
        .children()[0]
        .click();
      $(".formio-component-hideLabel")
        .children()
        .children()[0]
        .click();
    }
    css[`.${cssClass}`] = `{margin: ${count}px}`;
    count++;
    $("#test1").html(objToString(css));
  });
  $("body").on("click", ".btn-down", function() {
    if (
      $(".component-preview")
        .children()[0]
        .attributes.class.value.indexOf("custom") === -1
    ) {
      style.appendChild(document.createTextNode(objToString(css)));
      $($(".formio-component-customClass").children()[1]).val(cssClass);
      $(".formio-component-hideLabel")
        .children()
        .children()[0]
        .click();
      $(".formio-component-hideLabel")
        .children()
        .children()[0]
        .click();
    }
    css[`.${cssClass}`] = `{margin: ${count}px}`;
    count--;
    $("#test1").html(objToString(css));
  });
});

$("#form-tab").click(function() {
  $(".visualCodeEditorToggle").css({ display: "none" });
});
