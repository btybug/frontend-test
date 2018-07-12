@extends( 'btybug::layouts.admin' )
@section ('content')
<div class="bb-form-header">
        <div class="row">
            <div class="col-md-4">
                <label>Form name</label>
                {!! Form::text('name',null,['class' => 'form-name', 'placeholder' => 'Form Name']) !!}
            </div>
            <div class="col-md-8">
                <button type="submit" class="form-save pull-right saveForm" bb-click="saveHTML">Save</button>
                <button type="button" class="panel-trigger pull-right" data-toggle="modal" data-target="#settingsModal">
                    Settings
                </button>
            </div>
        </div>
    </div>
    @if(isset($editableData))
        <textarea class="hidden">{{$editableData}}</textarea>
    @endif
    <div class="bb-form-sub-header">
        <div class="row">
            <div class="col-md-12">
                <label>Form description</label>
                {!! Form::textarea('description',null,['class' => 'form-description', 'placeholder' => 'Form Description']) !!}
            </div>
        </div>
    </div>
    <div class="bb-form-header">
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="panel-trigger pull-right add-unit" bb-click="openFieldsWindow">Add fields</button>
                <button type="button" class="panel-trigger pull-right" bb-click="openStudioWindow"
                        data-main="global">Styling
                </button>
                <button type="button" class="panel-trigger pull-right" bb-click="openLogicModal" data-toggle="modal"
                        data-target="#logicModal">Logic
                </button>

                <button type="button" class="panel-trigger pull-right" bb-click="openLayoutWindow">Layout</button>
                <button type="button" class="panel-trigger pull-right" bb-click="openPanelWindow">Panel</button>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="margin-top: 60px;">
    <!-- <div class="text-right" style="margin-bottom: 25px;">
      <button class="btn btn-primary add-unit"> Add unit</button>
      <button class="btn btn-primary saveForm"> Save</button>
    </div> -->

    <div class="row formBuilderShow">
      <div class="col-sm-12">
        <h3 class="text-center text-muted" style="display: none">The
          <a href="https://github.com/formio/formio.js" target="_blank">Form Builder</a> allows you to build a
          <select class="form-control" id="form-select" style="display: inline-block; width: 150px;">
            <option value="form">Form</option>
            <option value="wizard">Wizard</option>
            <option value="pdf">PDF</option>
          </select>
        </h3>
        <div class="well" style="background-color: #fdfdfd;">
          <div id="builder"></div>
        </div>
      </div>
      <div class="col-sm-4" style="display: none">
        <h3 class="text-center text-muted">as JSON Schema</h3>
        <div class="well jsonviewer">
          <pre id="json"></pre>
        </div>
      </div>
    </div>
    <div class="row" style="display: none">
      <div class="col-sm-8 col-sm-offset-2">
        <h3 class="text-center text-muted">which
          <a href="https://github.com/formio/ngFormio" target="_blank">Renders as a Form</a> in your Application</h3>
        <div id="formio" class="well"></div>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="row" style="display: none">
      <div class="col-sm-8 col-sm-offset-2">
        <h3 class="text-center text-muted">which creates a Submission JSON</h3>
        <div class="well jsonviewer">
          <pre id="subjson"></pre>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>







  </div>
  </div>
  </div>
@stop

@section( 'Footer' )
    <div class="bb-node-action-size"></div>
    <div class="bb-node-action-menu">
        <i class="fa fa-arrows-h bb-node-move" bb-click="toggleResize"></i>
        <i class="fa fa-trash bb-node-delete" bb-click="deleteActiveField"></i>
        <i class="fa fa-paint-brush bb-node-edit" bb-click="openStudioWindow"></i>
    </div>
@stop

@section( 'CSS' )
    {!! HTML::style("public/css/formio/formio.full.min.css") !!}
    {!! HTML::style("public/css/formio/bootstrap.vertical-tabs.min.css") !!}
    {!! Html::style("public/css/form-builder/form-builder.css?m=m") !!}

    <style>
        .formcomponents {
      float: right;
      /* display: none; */
      transform: translateX(+100px);
      opacity: 0;
      transition: all cubic-bezier(0.68, -0.55, 0.265, 1.55) 0.4s
    }

    .displayToggle {
      transform: translateX(0);
      opacity: 1;

      /* display: block !important; */
    }

    .accordion panel-group {
      margin-top: 15px !important;
    }

    .panel-default {
      border-color: #fff;
    }

    .panel-default>.panel-heading {
      border-color: #fff;
      background: #e6e6e6;
    }

    .builder-group-button {
      background: none;
      color: #000
    }

    .formcomponents .formcomponent {
      padding: 15px 20px;
      background-color: #607d8b;
    }
    </style>
@stop


@section( 'JS' )

    {!! HTML::script("public/js/formio/buttons.js") !!}
    {!! HTML::script("public/js/formio/formio.full.min.js") !!}
    <script>
    var subJSON = document.getElementById('subjson');
    var builder = new Formio.FormBuilder(document.getElementById("builder"), {
      display: 'form',
      components: []
    }, {
        baseUrl: 'https://examples.form.io'
      });

    var onForm = function (form) {
      form.on('change', function () {
        subJSON.innerHTML = ''; // Subjson result
        subJSON.appendChild(document.createTextNode(JSON.stringify(form.submission, null, 4)));
      });
    };
    var jsonForSend = null
    var setDisplay = function (display) {
      builder.setDisplay(display).then(function (instance) {
        var jsonElement = document.getElementById('json'); // Data full
        var formElement = document.getElementById('formio'); // full form
        instance.on('saveComponent', function (event) {
            var schema = instance.schema;
            jsonForSend  = JSON.stringify(schema, null, 4)
          jsonElement.innerHTML = '';
          formElement.innerHTML = '';
          jsonElement.appendChild(document.createTextNode(JSON.stringify(schema, null, 4)));
          Formio.createForm(formElement, schema).then(onForm);
        });

        instance.on('editComponent', function (event) {
          console.log('editComponent', event);
        });

        instance.on('updateComponent', function (event) {
          jsonElement.innerHTML = '';
          jsonElement.appendChild(document.createTextNode(JSON.stringify(instance.schema, null, 4)));
        });

        instance.on('deleteComponent', function (event) {
          jsonElement.innerHTML = '';
          jsonElement.appendChild(document.createTextNode(JSON.stringify(instance.schema, null, 4)));
        });

        Formio.createForm(formElement, instance.schema).then(onForm);
      });
    };

    // Handle the form selection.
    // var formSelect = document.getElementById('form-select');
    // formSelect.addEventListener("change", function () {
    //   setDisplay(this.value);
    // });
    document.querySelector(".add-unit").addEventListener("click", function () {
      let components = document.querySelector(".formcomponents")
      components.classList.toggle("displayToggle")
      this.textContent = components.classList.contains("displayToggle") ? "Close" : "Add unit"
    })
    document.querySelector(".saveForm").addEventListener("click", function () {
      let formName = document.querySelector(".form-name").value
      let formDescription = document.querySelector(".form-description").value
      console.log( jsonForSend)
      if (formName.trim().length === 0  && formDescription.trim().length === 0) {
          alert("formName & formDescription filesds is requried")
      } else if (formName.trim().length === 0) {
        alert("formName filed  is requried")
      }else if(formDescription.trim().length === 0) {
        alert("formDescription filed is requried")
      }else {
          let obj = {
              formName: formName,
              formDescription: formDescription,
              body: jsonForSend 
          }
          $.ajax({
            type: "post",
            datatype: "json",
            url: '{{ route('application_form_save') }}',
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
    setDisplay('form');
    </script>
@stop