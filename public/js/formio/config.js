var subJSON = document.getElementById('subjson');
var jsonForSend = null
var editData = {}
if (document.querySelector("#formJson") !== null) {
  let formJsonData = JSON.parse(document.querySelector("#formJson").value)
  editData = JSON.parse(formJsonData.json_data)
  console.log(formJsonData)
  document.querySelector(".form-name").value = formJsonData.title
  document.querySelector(".form-description").value = formJsonData.description

}
// var editData = document.querySelector("#formJson") !== null ? JSON.parse(JSON.parse(document.querySelector("#formJson").value).json_data) : {}
var builder = Formio.builder(document.getElementById('builder'), editData, {
  builder: {
    basic: false,
    advanced: false,
    data: false,
    custom: {
      title: 'User Fields',
      weight: 10,
      components: {
        firstName: {
          title: 'First Name',
          key: 'firstName',
          icon: 'fa fa-terminal',
          schema: {
            label: 'First Name',
            type: 'textfield',
            key: 'firstName',
            input: true
          }
        },
        lastName: {
          title: 'Last Name',
          key: 'lastName',
          icon: 'fa fa-terminal',
          schema: {
            label: 'Last Name',
            type: 'textfield',
            key: 'lastName',
            input: true
          }
        },
        email: {
          title: 'Email',
          key: 'email',
          icon: 'fa fa-at',
          schema: {
            label: 'Email',
            type: 'email',
            key: 'email',
            input: true
          }
        },
        phoneNumber: {
          title: 'Mobile Phone',
          key: 'mobilePhone',
          icon: 'fa fa-phone-square',
          schema: {
            label: 'Mobile Phone',
            type: 'phoneNumber',
            key: 'mobilePhone',
            input: true
          }
        }
      }
    },
    layout: {
      components: {
      }
    },
    advanced: {
      components: {
      }
    },
    data: {
      components: {
      }
    },
    basic: {
      components: {
      }
    }
  }
}).then(function (builder) {
  var jsonElement = document.getElementById('json'); // Data full
  var formElement = document.getElementById('formio'); // full form
  builder.on('saveComponent', function () {
    var schema = builder.schema;
    console.log(schema)
    jsonForSend = schema
    jsonElement.innerHTML = '';
    formElement.innerHTML = '';
    jsonElement.appendChild(document.createTextNode(JSON.stringify(schema, null, 4)));
    Formio.createForm(formElement, schema).then(onForm);
  });

  builder.on('editComponent', function (event) {
    console.log('editComponent', event);
  });

  builder.on('updateComponent', function (event) {
    jsonElement.innerHTML = '';
    jsonElement.appendChild(document.createTextNode(JSON.stringify(builder.schema, null, 4)));
  });

  builder.on('deleteComponent', function (event) {
    jsonElement.innerHTML = '';
    jsonElement.appendChild(document.createTextNode(JSON.stringify(builder.schema, null, 4)));
  });

  Formio.createForm(formElement, builder.schema).then(onForm);

});

var onForm = function (form) {
  form.on('change', function () {
    subJSON.innerHTML = ''; // Subjson result
    subJSON.appendChild(document.createTextNode(JSON.stringify(form.submission, null, 4)));
  });
};

document.querySelector(".add-unit").addEventListener("click", function () {
  let components = document.querySelector(".formcomponents")
  components.classList.toggle("displayToggle")
  this.textContent = components.classList.contains("displayToggle") ? "Close" : "Add unit"
})
document.querySelector(".saveForm").addEventListener("click", function () {
  let formName = document.querySelector(".form-name").value
  let formDescription = document.querySelector(".form-description").value
  console.log(jsonForSend)
  if (formName.trim().length === 0 && formDescription.trim().length === 0) {
    alert("formName & formDescription filesds is requried")
  } else if (formName.trim().length === 0) {
    alert("formName filed  is requried")
  } else if (formDescription.trim().length === 0) {
    alert("formDescription filed is requried")
  } else if (jsonForSend === null || jsonForSend == "undefined") {
    alert("Data is empty")
  } else {
    let editDataID = document.querySelector("#formJson") !== null ? JSON.parse(document.querySelector("#formJson").value).id : null

    let obj = {
      formName: formName,
      formDescription: formDescription,
      body: JSON.stringify(jsonForSend),
      id: editDataID
    }
    $.ajax({
      type: "post",
      datatype: "json",
      url: '/admin/uploads/application/save-builder-form',
      data: obj,
      headers: {
        'X-CSRF-TOKEN': $("input[name='_token']").val()
      },
      success: function (data) {
        if (!data.error) {
          window.location.replace(data.url);
        }
      }
    });
  }
})


// console.log(JSON.parse(JSON.parse(document.querySelector("#formJson").value).json_data)) 
