@extends('btybug::layouts.mTabs',['index'=>'mini_assets'])
@section('tab')
    <div class="ui-2_col">
        <div class="settings-button">
            <button class="btn btn-md btn-warning create-page">Create Page</button>
        </div>
        <div class="row">
            <div class="col-md-3 col-xs-12">
                <div class="left-menu">
                    <ul>
                        @foreach($pages as $page)
                        <li>
                            <span>{!! $page->title !!}</span>
                            <div class="button">
                                <button class="btn btn-sm btn-success">Disable</button>
                                <button class="btn btn-sm btn-warning"><i class="fa fa-trash"></i></button>
                            </div>
                        </li>
                            @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-xs-12">
                <div class="display-area">

                    <div class="right-iframe">

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('resources::assests.magicModal')
    <template id="create-page-form-template">
        <form class="form-horizontal" id="create-page-form">
            <div class="form-group">
                <label for="page_title" class="control-label col-xs-4">Title</label>
                <div class="col-xs-8">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-bullhorn"></i>
                        </div>
                        <input id="page_title" name="title" placeholder="About us" type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="page_url" class="control-label col-xs-4">Url</label>
                <div class="col-xs-8">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-link"></i>
                        </div>
                        <input id="page_url" name="url" placeholder="about-us" type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="select" class="control-label col-xs-4">Select</label>
                <div class="col-xs-8">
                    <select id="select" name="status" class="select form-control">
                        <option value="draft">Draft</option>
                        <option value="published">Published</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="page_url" class="control-label col-xs-4"></label>
                <div class="col-xs-8">
                    <div class="input-group">
                        {!! BBbutton2('unit','template','minicms','Select Page Template') !!}
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xs-offset-4 col-xs-8">
                    <button  id="siteSubmit" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
    </template>
@stop
@section('CSS')
    <style>
        .ui-2_col {
            margin-top: 30px;
        }

        .ui-2_col .left-menu ul {
            border-right: 1px solid #c5c5c5;
            background-color: #3e81a5;
            padding-top: 20px !important;
            height: calc(100vh - 154px);
            overflow-x: auto;
        }

        .ui-2_col .left-menu li {
            background: #0000004f;
            width: 95%;
            height: 60px;
            margin-bottom: 11px;
            box-shadow: -4px 4px 5px 0 #00000073;
            margin-left: 11px;
            cursor: pointer;
            color: white;
            display: flex;
            justify-content: space-between;
            transition: 0.5s ease;
        }

        .ui-2_col .left-menu li > span {
            align-self: center;
            margin-left: 10px;
            font-size: 16px;
        }

        .ui-2_col .left-menu .button {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .ui-2_col .left-menu .button button {
            margin-right: 5px;
        }

        .ui-2_col .left-menu li:hover {
            background: rgba(0, 0, 0, 0.48);
        }
        .ui-2_col .settings-button{
            margin-bottom:10px;
        }
    </style>
@stop

@section("JS")
    {!! HTML::script("public/js/UiElements/bb_styles.js?v.5") !!}
<script>
  $(".create-page").click(function() {
      let form = $('#create-page-form-template').html();
      $(".right-iframe").append(form)

    $("body").on("click", "#siteSubmit", function(e){
        e.preventDefault()
        let data = $('body').find('form#create-page-form').serialize();
        $.ajax({
      type: "post",
      datatype: "json",
      url: '/admin/mini/assets/create-page',
      data: data,
      headers: {
        'X-CSRF-TOKEN': $("input[name='_token']").val()
      },
      success: function (data) {
        //   window.location.replace(data.url);
            location.reload();
      }
    });
    })  
  })
</script>

@stop