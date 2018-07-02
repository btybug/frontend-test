jQuery(function ($){

    // Icon picker
    var $focusedIconInput;

    register_draggable();

    cleanLevelClasses();

    $('.icp-auto').iconpicker();

    $(window).scroll(function() {
        if($focusedIconInput !== null){
            repositionMenu();
        }
    });

    // Switch button
    $(".bb-switch").bootstrapSwitch({
        onText: "Show",
        offText: "Hide",
        size: "mini",
        onColor: "success",
        offColor: "danger"
    });

    // Sortable menu area
    $('ol.bb-menu-area').nestedSortable({
        items: 'li',
        isTree: true,
        change: function () {
            cleanLevelClasses();
        },
        receive: function () {
            cleanLevelClasses();
            autoSave();
        },
        stop: function(event, ui) {
            if ($(ui.item).closest('ol').parent('li').hasClass("no-nest")) {
                $("ol.bb-menu-area").sortable("cancel");
            }
            autoSave();
        }
    });

    $('.bb-menu-save').click(function (){
        autoSave();
    });

    $('.bb-menu-settings').click(function (){
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

    $('.bb-sortable-static:not(.bb-sortable-group)>li').each(function (){
        var $this = $(this);

        var title = $this.find('.bb-menu-item-title>span').text();
        $this.attr("data-title",$this.data('title'));
        $this.attr("data-icon", $this.data('icon'));
        $this.attr("data-url", $this.data('url'));
        $this.attr("data-dynamic", $this.data('dynamic'));

        $this.find('.menu-item-title').val(title);
    });

    $('body')
        .on("focus",'input.icp', function (){
            $focusedIconInput = $(this);
            repositionMenu();
        })
        .on('blur', 'input.icp', function (){

        })
        .on('iconpickerSelected', '.icp-auto', function (e) {
            var icon = e.iconpickerValue;
            $focusedIconInput.closest('.bb-menu-item').find('.bb-menu-item-title>i').attr('class', 'fa ' + icon);
            $focusedIconInput.closest('li').attr('data-icon', icon);
            $focusedIconInput.val(icon);
            $focusedIconInput = null;
            $('.iconpicker-container').hide();
        })
        .on('input', '.menu-item-title', function () {
            var value = $(this).val();
            $(this).closest('.bb-menu-item').find('.bb-menu-item-title>span').text(value);
            $(this).closest('li').attr('data-title', value);
        })
        .on('change', '.menu-item-dynamic', function () {
            var value = 0;
            if (this.checked){
                value = 1;
            }
            $(this).closest('li').attr('data-dynamic', value);
        })
        .on('click', '.bb-menu-collapse', function () {
            var $this = $(this);
            var body = $this.closest('.bb-menu-item').find('.bb-menu-item-body');
            var bodyGroup = $this.closest('li').find('.bb-menu-group-body');
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
        .on('click', '.bb-menu-delete', function () {
            var $this = $(this);
            var item = $this.closest('li');

            item.slideUp(function () {
                $(this).remove();
                autoSave();
            });
        })
        .on('click', '#add-frontend-page', function (){
            var $this = $(this);
            var item = $this.closest('li[data-id]').clone();
            $('.bb-menu-area').append(item).ready(function () {
                cleanLevelClasses();
                autoSave();
            });
        })
        .on('click', '#add-custom-link', function () {
            var linkCount = $('#menu-item-link .bb-sortable-static li').length + 1;
            var $newItem = $('<li>', {
                'id': 'menu-item-' + linkCount,
                'class': 'level-' + linkCount + 'ui-draggable ui-draggable-handle',
                'data-id': linkCount,
                'data-title': 'customlink' + linkCount,
                'data-icon': 'fa-align-justify',
                'data-url': '/'
            }).append(
                "<div class='bb-menu-item'>\
                    <div class='bb-menu-item-title'>\
                        <i></i>\
                        <span>" + "custonlink" + linkCount + "</span>\
                        <div class='bb-menu-actions pull-right'>\
                            <a href='javascript:' class='bb-menu-delete'>\
                                <i class='fa fa-close'></i>\
                            </a>\
                            <a href='javascript:' class='bb-menu-collapse'>\
                                <i class='fa fa-caret-down'></i>\
                            </a>\
                        </div>\
                    </div>\
                    <div class='bb-menu-item-body'>\
                        <div class='bb-menu-form'>\
                            <div class='row'>\
                                <div class='col-md-4'>\
                                    <div class='form-group'>\
                                        <label>Icon</label>\
                                        <input type='text' data-placement='right' class='form-control input-sm icp'>\
                                    </div>\
                                </div>\
                                <div class='col-md-8'>\
                                    <div class='form-group'><label>Item Title</label>\
                                        <input type='text' value='"+ "custonlink" + linkCount +"' class='form-control input-sm menu-item-title'>\
                                    </div>\
                                </div>\
                            </div>\
                            <div class='row'>\
                                <div class='col-md-6'>\
                                    <div class='form-group'>\
                                        <label>Item URL</label>\
                                        <input type='text' value='/' class='form-control input-sm item-url'>\
                                    </div>\
                                </div>\
                                <div class='col-md-6'>\
                                    <div class='form-group'>\
                                        <label>Display Roles</label>\
                                        <select name='display_roles' class='form-control input-sm'>\
                                            <option value>All Visitors</option>\
                                            <option value>Members Only</option>\
                                            <option value>Guests Only</option>\
                                            <option value='specific'>Specific Roles</option>\
                                        </select>\
                                    </div>\
                                </div>\
                            </div>\
                            <div class='form-group specific hide'>\
                                <label>Select Roles</label>\
                                <select multiple=' class='form-control input-sm' name='roles[]'>\
                                    <option value='superadmin'>superadmin</option>\
                                    <option value='admin'>administrator</option>\
                                    <option value='Staff'>staff</option>\
                                    <option value='sdgr'>drth</option>\
                                    <option value='xxxxxxxx'>xxxxxxxxxxx</option>\
                                </select>\
                            </div>\
                        </div>\
                    </div>\
                </div>"
            );
            $('#menu-item-link .panel-body ol').append($newItem);
            register_draggable();
        })
        .on('change', '[name=display_roles]', function (){
            var specific = $(this).closest('.bb-menu-form').find('.specific');
            var others = $(this).closest('.bb-menu-form').find('.bb-other-visitors-panel');
            var value = $(this).val();

            if(value === 'specific'){
                specific.removeClass('hide');
                others.removeClass('hide');
                $('[name=selected_roles]').trigger('click');
            }else{
                others.addClass('hide');

                if(value !== "all"){
                    others.removeClass('hide');
                }

                specific.addClass('hide');
            }
        })
        .on('click', '[name=selected_roles]', function (){
            var $this = $(this);
            var notSelected = $this.find('option:not(:selected)');
            var rolesOptions = $('.bb-menu-roles-options');
            var optionsHTML = "";

            rolesOptions.html('');

            $(notSelected).each(function (i, name){
                var template = $('#option_template').html();
                template = template.replace('[name]', $(this).val());
                optionsHTML += template;
            });

            rolesOptions.html(optionsHTML);
        })
        // Role list and functions
        .on('click', '.bb-roles-list>.list-group-item .bb-role-hide-others', function (){
            var $this = $(this),
                $element = $this.closest(".list-group-item");

            $('.bb-roles-list>.list-group-item').each(function (){
                $(this)
                    .attr("data-display", "hide")
                    .find("i.fa-circle").removeClass("text-success").addClass("text-danger");
            });

            $element
                .attr("data-display", "show")
                .find("i.fa-circle").addClass("text-success").removeClass("text-danger");
        })
        .on('switchChange.bootstrapSwitch', '.bb-roles-list>.list-group-item .bb-role-toggle', function(event, state) {
            var $this = $(this),
                $element = $this.closest(".list-group-item");

            $('.what-to-show-panel').addClass("hide");
            $('.bb-roles-list>.list-group-item').removeClass("active");

            if(state === true){
                $element.attr("data-display", "show");
            }else{
                $element.attr("data-display", "hide");
            }
        })
        .on('click', '.bb-roles-list>.list-group-item', function (){
            var checked = $(this).find('[type=checkbox].bb-role-toggle:not(:checked)').val();
            $('.bb-roles-list>.list-group-item').removeClass("active");

            if(checked){
                var role = $(this).data("role");
                $(this).addClass("active");

                $('.what-to-show-panel').addClass("hide");
                $('.what-to-show-panel[data-for='+role+']').removeClass("hide");
            }

        })
        .on('change', '.what-to-show-panel select', function (){
            var value = $(this).val();
            var $panel = $(this).closest(".what-to-show-panel");

            $panel.find('[data-render]').addClass("hide");
            $panel.find('[data-render='+value+']').removeClass("hide");
        })
        .on('input', '#bb-role-filter', function (){
            var $this = $(this),
                filter = $this.val().toUpperCase();

            $('.bb-roles-list>.list-group-item').each(function (){
                if($(this).attr("data-title").toUpperCase().indexOf(filter) > -1){
                    $(this).removeClass("hide");
                }else{
                    $(this).addClass("hide");
                }
            });
        })
        .on('click', '.bb-bulk-roles', function (){
            var action = $(this).data("bulk"), display;

            $('.what-to-show-panel').addClass("hide");
            $('.bb-roles-list>.list-group-item').removeClass("active");

            if(action === "hide"){
                display = "hide";
            }
            else if(action === "show" || action === "members"){
                display = "show";
            }

            $('.bb-roles-list>.list-group-item').each(function (){
                $(this).attr("data-display", display);
                if(display === "show") $(this).find('[type=checkbox].bb-role-toggle').bootstrapSwitch('state', true);
                if(display === "hide") $(this).find('[type=checkbox].bb-role-toggle').bootstrapSwitch('state', false);
            });

            if(action === "members"){
                $('.bb-roles-list>.list-group-item[data-role=guests]').attr("data-display", "hide");
                $('.bb-roles-list>.list-group-item[data-role=guests]').find('[type=checkbox].bb-role-toggle').bootstrapSwitch('state', false);
            }

        });
    


    
    function cleanLevelClasses() {
        $('ol.bb-menu-area li').removeClass(function (index, className) {
            return (className.match(/(^|\s)level-\S+/g) || []).join(' ');
        });
    }

    function autoSave() {
        var ret = [];

        $('ol.bb-menu-area').children('li').each(function () {
            var level = _recursiveItems(this);
            ret.push(level);
        });

        $("#log").text(JSON.stringify(ret));

        function _recursiveItems(item) {
            var id = $(item).attr("data-id"),
                currentItem;

            var data = {
                id: $(item).attr('data-id'),
                icon: $(item).attr('data-icon'),
                title: $(item).attr('data-title'),
                url: $(item).attr('data-url'),
                dynamic: $(item).attr('data-dynamic')
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

    // Draggable items
    function register_draggable() {
        $('.bb-sortable-static > li .bb-menu-group-body li').draggable({
            revert: "invalid",
            connectToSortable: '.bb-menu-area',
            helper: "clone",
            start: function (event, ui) {
                var $newItem = $(ui.helper).find('> .menu-item-children').remove();

                return $newItem;
            },
            stop: function (event, ui) {
                $(ui.helper).css({ 'height': 'auto' });
            }
        });
    }

    function repositionMenu() {
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
});
