jQuery(function ($) {

    // Icon picker
    var $focusedIconInput;
    $('.icp-auto').iconpicker();

    $(window).scroll(function () {
        if ($focusedIconInput !== null) {
            repositionMenu();
        }
    });

    var MainItems = $("#log_main").val();

    if (MainItems) {
        $('#bb-main-items').menuRenderer({
            JSONString: MainItems,
            itemTemplateSelector: '#classify-main-template'
        });

        saveMainItems();
    }

    // Save children
    $('.save-children').click(function () {
        var jsonData = $("#log").val(),
            parenItem = $('[name=main_id]').val();

        if (parenItem) {
            postAjax('/admin/front-site/structure/classify/generate-items', {
                id: parenItem,
                data: jsonData
            }, function (data) {
                //TODO: message
            });
        }
    });


    // Before opening modal
    $('.add-item-modal').click(function () {
        var dataTo = $(this).data("to");
        $('.add-item').addClass('hide');
        $('.add-item[data-to=' + dataTo + ']').removeClass('hide');
    });

    // Add item "Main + Child"
    $('.add-item').click(function () {
        var $this = $(this),
            list = $('#' + $this.data('to')),
            parentID = '#' + $this.data('parent-id');

        if ($this.data('to') === "bb-children-items") {
            itemTemplate = '<li>' + $('#classify-item-template').html() + '</li>';
        } else {
            itemTemplate = '<li>' + $('#classify-main-template').html() + '</li>';
        }

        itemTitle = $(parentID + ' [name=item_title]');
        itemIcon = $(parentID + ' [name=item_icon]');
        itemTemplate = itemTemplate.replace(new RegExp('{title}', 'g'), itemTitle.val());
        itemTemplate = itemTemplate.replace(new RegExp('{icon}', 'g'), itemIcon.val());

        // AJAX request to save in DB for main items
        if ($this.data('to') === "bb-main-items") {
            postAjax('/admin/front-site/structure/classify/create', {
                title: itemTitle.val(),
                icon: itemIcon.val()
            }, function (id) {
                itemTemplate = itemTemplate.replace(new RegExp('{id}', 'g'), id);
            });
        }
        // Add random IDs for children
        if ($this.data('to') === "bb-children-items") {
            image = $(parentID + ' [name=image]');
            description = $(parentID + ' [name=description]');
            var d = new Date();
            var n = d.valueOf();
            itemTemplate = itemTemplate.replace(new RegExp('{image}', 'g'), image.val());
            itemTemplate = itemTemplate.replace(new RegExp('{description}', 'g'),description.val());
            itemTemplate = itemTemplate.replace(new RegExp('{id}', 'g'), n);
        }

        list.append(itemTemplate);

        // Reset modal form
        itemTitle.val('');
        itemIcon.val('');

        // Auto savee
        if ($this.data('to') === "bb-main-items") {
            // Hide modal
            $('#addMainModal').modal('hide');
            saveMainItems();
        }
        if ($this.data('to') === "bb-children-items") {
            description.val('');
            image.val('');
            $('#addItemModal').modal('hide');
            autoSave();
        }

    });

    function repositionMenu() {
        if ($focusedIconInput) {
            var elementTop = $focusedIconInput.offset().top,
                elementLeft = $focusedIconInput.offset().left,
                windowTop = $(window).scrollTop(),
                actualTop = elementTop - windowTop,
                checker = $(window).height() - actualTop,

                iconContainer = $('.iconpicker-container'),
                iconContainerHeight = iconContainer.height(),
                cssTop = actualTop + 30;

            if (checker < actualTop) {
                cssTop = actualTop - iconContainerHeight;
            }

            iconContainer.css({
                top: cssTop,
                left: elementLeft
            });

            iconContainer.show();
        }
    }

    // Sortable main items
    $('#bb-main-items').sortable({
        helper: "clone",
        revert: "invalid",
        handle: '.bb-classify-drag-handler',
        stop: saveMainItems
    });

    // Nested Sortable children items
    $('#bb-children-items').nestedSortable({
        items: 'li',
        isTree: true,
        handle: '.bb-classify-drag-handler',
        change: function () {
            cleanLevelClasses();
        },
        receive: function () {
            cleanLevelClasses();
            autoSave();
        },
        stop: function (event, ui) {
            if ($(ui.item).closest('ol').parent('li').hasClass("no-nest")) {
                $("ol.bb-classify-area").sortable("cancel");
            }
            autoSave();
        }
    });

    cleanLevelClasses();

    function cleanLevelClasses() {
        $('ol.bb-classify-area li').removeClass(function (index, className) {
            return (className.match(/(^|\s)level-\S+/g) || []).join(' ');
        });
    }

    function saveMainItems() {
        var ret = [];

        $('#bb-main-items').children('li:not(.ui-sortable-placeholder):not(.ui-sortable-helper)').each(function () {

            var $this = $(this),
                $item = $this.find(".bb-classify-item").first();

            var data = {
                id: $item.attr('data-id'),
                icon: $item.attr('data-icon'),
                title: $item.attr('data-title')
            };

            ret.push(data);
        });

        $("#log_main").val(JSON.stringify(ret, null, 4));
    }

    function autoSave() {
        var ret = [];

        $('#bb-children-items').children('li').each(function () {
            var level = _recursiveItems(this);
            ret.push(level);
        });

        $("#log").val(JSON.stringify(ret, null, 4));

        function _recursiveItems(item) {
            var id = $(item).find('.bb-classify-item').first().attr("data-id"),
                currentItem;

            var $this = $(item),
                $item = $this.find(".bb-classify-item").first();

            var data = {
                id: $item.attr('data-id'),
                icon: $item.attr('data-icon'),
                title: $item.attr('data-title'),
                image: $item.attr('data-image'),
                description: $item.attr('data-description')
            };

            if (id) {
                currentItem = {
                    "id": id[2]
                };

                currentItem = $.extend({}, currentItem, data);

                if ($(item).children('ol').children('li').length > 0) {
                    currentItem.children = [];
                    $(item).children('ol').children('li').each(function () {
                        var level = _recursiveItems(this);
                        currentItem.children.push(level);
                    });
                }
                return currentItem;
            }
        }
    }

    $('.bb-classify-save').click(function () {
        autoSave();
    });

    $('.bb-classify-settings').click(function () {
        var $this = $(this);
        var body = $this.closest('.panel').find('.panel-body');

        if ($this.hasClass("expand")) {
            body.slideUp();
            $this.removeClass("expand");
        } else {
            body.slideDown();
            $this.addClass("expand");
        }
    });

    $('.bb-sortable-static .bb-classify-item-title').each(function () {
        var $this = $(this);

        $this.append(
            '<a href="javascript:" class="bb-add-to-menu pull-right">\n' +
            ' <i class="fa fa-plus"></i>\n' +
            '</a>'
        );
    });

    $('.bb-sortable-static:not(.bb-sortable-group)>li').each(function () {
        var $this = $(this);

        var title = $this.find('.bb-classify-item-title>span').text();
        $this.attr("data-title", title);
        $this.attr("data-icon", '');
        $this.attr("data-url", $this.find('.item-url').val());

        $this.find('.classify-item-title').val(title);
    });

    $('body')
        .on("focus", 'input.icp', function () {
            $focusedIconInput = $(this);
            repositionMenu();
        })
        .on('iconpickerSelected', '.icp-auto', function (e) {
            var icon = e.iconpickerValue;
            $focusedIconInput.closest('.bb-classify-item').find('.bb-classify-item-title>i').attr('class', 'fa ' + icon);
            $focusedIconInput.closest('.bb-classify-item').attr('data-icon', icon);
            $focusedIconInput.val(icon);
            $focusedIconInput = null;
            $('.iconpicker-container').hide();
            autoSave();
        })
        .on('input', '.classify-item-title', function () {
            var value = $(this).val();
            $(this).closest('.bb-classify-item').find('.bb-classify-item-title>span').text(value);
            $(this).closest('.bb-classify-item').attr('data-title', value);

            repositionMenu();
            autoSave();
        }).on('input', '.item_img', function () {
            var value = $(this).val();
            $(this).closest('.bb-classify-item').attr('data-image', value);

            repositionMenu();
            autoSave();
        })
        .on('keyup', ".classify-item-textarea", function () {
            var value = $(this).val();
            var name = $(this).attr('name');
            $(this).closest('.bb-classify-item').attr('data-' + name, value);

            repositionMenu();
            autoSave();
        }).on('change', "#bb-children-items input[type='checkbox']", function () {
            var name = $(this).attr('name');
            var value = $(this).closest('.bb-classify-item [name=' + name + ']:checked').val();
            if (value == undefined) value = "null";
            $(this).closest('.bb-classify-item').attr('data-' + name, value);
            repositionMenu();
            autoSave();
        })
        .on('click', '.bb-classify-collapse', function () {
            var $this = $(this);
            var body = $this.closest('.bb-classify-item').find('.bb-classify-item-body');
            var bodyGroup = $this.closest('li').find('.bb-classify-group-body');
            var icon = $this.find('i');

            if ($this.hasClass("expand")) {
                body.slideUp();
                bodyGroup.slideUp();
                $this.removeClass("expand");
                icon.addClass("fa-caret-down");
                icon.removeClass('fa-caret-up');
            } else {
                body.slideDown();
                bodyGroup.slideDown();
                $this.addClass("expand");
                icon.removeClass("fa-caret-down");
                icon.addClass('fa-caret-up');
            }
        })
        .on('click', '.bb-classify-delete', function () {
            var $this = $(this);
            var item = $this.closest('li');
            var classifyItem = $this.closest('.bb-classify-item');
            postAjax('/admin/front-site/structure/classify/delete', {id: classifyItem.attr('data-id')}, function (data) {
                if (data.success) {
                    item.slideUp(function () {
                        $(this).remove();
                        saveMainItems();
                    });
                } else {
                    alert("Classify not deleted!!!");
                }
            });
        }).on('click', '.bb-classify-item-delete', function () {
        var $this = $(this);
        var item = $this.closest('li');
        var classifyItem = $this.closest('.bb-classify-item');
        item.slideUp(function () {
            $(this).remove();
            autoSave();
        });
    })
        .on('click', '#bb-main-items>li .bb-classify-item-title', function () {
            var $this = $(this),
                item = $this.closest('.bb-classify-item'),
                mainItemID = item.attr("data-id"),
                childrenList = $('#bb-children-items');

            // Select ID
            $('[name=main_id]').val(mainItemID);

            // Show children
            $('#children-actions').removeClass("hide");

            $('.bb-classify-item-title').removeClass('active');
            $this.addClass("active");
            childrenList.html('');

            // Load children json
            var loadChildrenJSON = function (jsonString) {
                childrenList.menuRenderer({
                    JSONString: jsonString,
                    itemTemplateSelector: '#classify-item-template',
                    afterRender: function () {
                        autoSave();
                    }
                });
            };

            // AJAX request to get json for children
            postAjax('/admin/front-site/structure/classify/load-items', {id: mainItemID}, function (jsonString) {
                loadChildrenJSON(jsonString);
            });
        });
});
