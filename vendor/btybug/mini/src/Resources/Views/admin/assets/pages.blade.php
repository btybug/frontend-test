@extends('btybug::layouts.mTabs',['index'=>'mini_assets'])
@section('tab')
    <div class="ui-2_col">
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
                    <div class="settings text-right">
                        <button class="btn btn-md btn-warning create-page">Create Page</button>
                    </div>
                    <div class="right-iframe">

                    </div>
                </div>
            </div>
        </div>
    </div>
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
    </style>
@stop

@section("JS")

<script>
  $(".create-page").click(function() {
      let form = ` <form>
    <input type="text" name="" class="form-control" placeholder="Enter site title" id="siteTitle">
    <input type="text" name="" class="form-control" placeholder="Enter site URL" id="siteUrl">
    <button id="siteSubmit" class="btn btn-submit" type="submit">Add site</button>
  </form>`
      $(".right-iframe").append(form)

    $("body").on("click", "#siteSubmit", function(e){
        e.preventDefault()
        let data = {
            siteTitle: $("#siteTitle").val(),
            siteUrl: $("#siteUrl").val()
        }
        $.ajax({
      type: "post",
      datatype: "json",
      url: '/admin/mini/assets/pages',
      data: data,
      headers: {
        'X-CSRF-TOKEN': $("input[name='_token']").val()
      },
      success: function (data) {
        if (!data.error) {
        //   window.location.replace(data.url);
        console.log("true")
        }
      }
    });
    })  
  })
</script>

@stop