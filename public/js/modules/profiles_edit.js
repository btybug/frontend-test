var sectionOfaddedItem;
$(document).ready(function () {

    $("body").on('input', '.profile-name', function () {
        var value = $(this).val();
        if (value != '' && value != undefined) {
            $("#js-name-change").html(value);
        } else {
            $("#js-name-change").html('new');
        }
    });

    $("body").on('click', '.js-add-assets', function (e) {

        var elementsHeaderId = []
        var elemntsHeader = document.querySelectorAll(".added-item").forEach(item => elementsHeaderId.push(item.getAttribute("data-id")))
        document.querySelectorAll("input[type='checkbox']").forEach(item => {
            item.checked = false
            item.disabled = false
            console.log(item.value)
            console.log(elementsHeaderId.includes(item.value))
            if (elementsHeaderId.includes(item.value)) {
                item.disabled = true
            }
        })
        console.log(elementsHeaderId)
        // var elementsFooterId = []
        // var elemntsHeader = document.querySelectorAll("#footer-js li").forEach(item => elementsHeaderId.push(item.getAttribute("data-id")))
        // document.querySelectorAll(".script-box input").forEach(item => elementsHeaderId.includes(item.value) ? item.setAttribute("disabled", true) : null)
        sectionOfaddedItem = $(this).parent().parent().next().attr('id');
        $("#uploadAssets").modal();
        console.log(e.target.className)
    });

    $("body").on('click', '.js-get-assets', function () {
        var data = $("#assetsForm").serialize();
        let checkbox = document.querySelectorAll(".script-box input:checked")
        if (checkbox.length > 0) {
            $.ajax({
                type: "post",
                url: document.querySelector("#script-box-url").value,
                cache: false,
                datatype: "json",
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $("[name=_token]").val()
                },
                success: function (data) {
                    for (let item of data) {
                        addAssetToDOM(item, sectionOfaddedItem);
                    }
                    $("#uploadAssets").modal('hide');
                }
            });
        }

    });

    $("body").on('click', '.js-btn-save', function () {
        var json_object = function () {
            return {
                path: $(this).attr('data-link'),
                id: $(this).attr('data-id'),
                type: $(this).attr('data-type')
            };
        }

        var json = JSON.stringify({
            headerJs: $('#header-js > li.list-group-item').map(json_object).get(),
            frontHeaderJs: $('#menus-list > li.list-group-item').map(json_object).get(),
            footerJs: $('#footer-js > li.list-group-item').map(json_object).get(),
            ignoreUnitsJs: $('#ignored-units-js > li.list-group-item').map(json_object).get()
        });

        $.ajax({
            type: "post",
            url: window.location.pathname,
            cache: false,
            datatype: "json",
            data: {
                name: $(".profile-name").val(),
                files: json
            },
            headers: {
                'X-CSRF-TOKEN': $("[name=_token]").val()
            },
            success: function (data) {
                if (!data.error) {
                    window.location.href = data.url;
                }
            }
        });
    });

    $("body").on("change", ".generate", function () {
        var id = $(this).data('id');
        var name = $(this).attr("name");
        var value = this.checked ? 1 : 0;
        $.ajax({
            type: "post",
            url: "{!! url('/admin/framework/generate-main-js') !!}",
            cache: false,
            datatype: "json",
            data: {
                id: id,
                name: name,
                value: value
            },
            headers: {
                'X-CSRF-TOKEN': $("[name=_token]").val()
            },
            success: function (data) {
                if (!data.error) {
                }
            }
        });
    });

    $("#header-js, #menus-list, #footer-js, #ignored-units-js").sortable({
        connectWith: ".connectedSortable",
        receive: function (event, ui) {
            if (ui.item.hasClass("panel")) {
                ui.sender.sortable("cancel");
            }
        }
    }).disableSelection();
});


$("body").on('click', '.glyphicon-trash', function () {
    $(this).parent().remove();

})


function addAssetToDOM(item, sectionOfaddedItem) {
    var $buttonDelete = $("<button>", {
        "class": "btn btn-xs btn-default pull-right",
        "type": "button"
    }).append('</span>').addClass('glyphicon glyphicon-trash')


    var $div = $("<li>", {
        "class": "list-group-item added-item",
        "data-name": item.file_name,
        "data-type": item.env ? 'link' : 'path',
        "data-link": item.path,
        "data-id": item.id
    }).text(item.name + '.js' + ' (asset: ' + (item.env ? 'link' : 'path') + ')').append($buttonDelete).prependTo('#' + sectionOfaddedItem);
}