var unitArray = [
    {value: 'px', title: 'px'},
    {value: 'em', title: 'em'},
    {value: '%', title: '%'}
];

var cssStudio = {

    properties: {},

    // Where to output css
    cssOutputSelector: '',

    // Parent selector
    parentSelector: '',

    // Load template
    loadTemplate: function (template) {
        return $('#bbt-' + template).html();
    },

    // Parse inline template
    parseTemplate: function (template, variables) {
        var templateHTML = $('#bbt-' + template).html();
        $.each(variables, function (key, value) {
            key = "{" + key + "}";
            templateHTML = templateHTML.replace(new RegExp(key, "gm"), value);
        });

        return templateHTML;
    },

    // Get properties array
    getProperties: function () {
        var $this = this;
        $.getJSON(ajaxLinks.baseUrl + '/public/js/form-builder/studio.json', function (jsonProperties) {
            $this.buildEditorList(jsonProperties);
            $this.properties = jsonProperties;
        });
    },

    // Render field type
    renderField: function (field) {
        var fieldTemplate = this.loadTemplate(field.type),
            buildOptions = '';

        if (field.options === "unitArray") field.options = unitArray;

        if (field.type === "dropdown") {
            buildOptions = '';

            if (field.options && field.options.length > 0) {
                $.each(field.options, function (i, option) {
                    buildOptions += '<option value="' + option.value + '">' + option.title + '</option>';
                });

                fieldTemplate = fieldTemplate.replace(/{options}/g, buildOptions);
            }
        }

        if (field.type === "toggle") {
            buildOptions = '';
            if (field.options && field.options.length > 0) {
                $.each(field.options, function (i, option) {
                    if (option.icon) option.title = '<i class="' + option.title + '"></i>';
                    buildOptions += '<label class="form-check-label">' + '<input class="form-check-input" type="radio" name="' + field.css + '" value="' + option.value + '">' + option.title + '</label>';
                });

                fieldTemplate = fieldTemplate.replace(/{options}/g, buildOptions);
            }
        }

        if (field.hasUnit) {
            field.hasUnit.css = field.css + "-unit";
            var unitTemplate = cssStudio.renderField(field.hasUnit);
            unitTemplate = unitTemplate.replace(/{name}/g, field.css + "-unit");

            fieldTemplate += '<div class="bb-unit">' + unitTemplate + '</div>';
        }

        return fieldTemplate;
    },

    // Click events
    clickEvents: {
        // Toggle open and close groups
        toggleOpen: function ($this) {
            // Hide all lists
            $('.bbs-properties-list').hide();

            // Show clicked list
            $this.parent('.bbs-property-group').find('.bbs-properties-list').show();

            // Activate
            $(".bbs-property-group h3").removeClass("active");
            $this.addClass("active");

            // Mark active selector
            var activeSelector = $('.bbs-field-selectors.active').data("selector");
            $(activeSelector).addClass("active-selector");
        },
        // Set active node selector
        setActiveSelector: function ($this) {
            $('.bbs-field-selectors').find('.active').removeClass('active');
            $this.addClass("active");

            // Assign default values
            cssStudio.assignDefaultValues();

            // Remove non active layer
            $('#bb-css-studio').removeClass("no-active");
        }
    },

    // Build editor list
    buildEditorList: function (properties) {
        var $this = this,
            groupsHTML = '',
            activeElement = $('.bbs-field-selectors>li.active');

        var activeSelector = $('.bbs-field-selectors>li').first().data("selector") + " " + activeElement.data("selector");

        if ($('.bbs-field-selectors>li').first().data("selector") === activeElement.data("selector")) {
            activeSelector = activeElement.data("selector");
        }

        var listTemplate = this.parseTemplate('editor-list', {
            element: activeElement.text().trim(),
            selector: activeSelector,
            selectorParent: cssStudio.parentSelector
        });

        // Get unique selectors
        var selectors = cssStudio.selectors,
            uniqueSelectors = [];

        selectors = $.unique(selectors);
        $.each(selectors, function (i, selector) {
            uniqueSelectors.push({
                nodeSelector: selector
            });
        });

        var compiledTemplate = Handlebars.compile(listTemplate);
        listTemplate = compiledTemplate({
            selectors: uniqueSelectors
        });

        // Group
        $.each(properties, function (i, propertyGroup) {
            var groupTemplate = $this.parseTemplate('properties-container', {
                    title: propertyGroup.title
                }),

                fieldsHTML = '';

            // Field container
            $.each(propertyGroup.fields, function (i, field) {
                var fieldTemplate = $this.parseTemplate('property-container', {
                    label: field.title,
                    id: field.css
                });

                // Field HTML
                if (field.type && $this.loadTemplate(field.type)) {
                    var fieldTypeTemplate = $this.renderField(field);
                    fieldTypeTemplate = fieldTypeTemplate.replace(/{id}/g, field.css);
                    fieldTypeTemplate = fieldTypeTemplate.replace(/{name}/g, field.css);

                    fieldTemplate = fieldTemplate.replace(/{field}/g, fieldTypeTemplate);

                    fieldsHTML += fieldTemplate;
                }
            });

            groupTemplate = groupTemplate.replace(/{properties}/g, fieldsHTML);

            groupsHTML += groupTemplate;
        });

        listTemplate = listTemplate.replace(/{groups}/g, groupsHTML);

        $('#bb-css-studio').html(listTemplate);

        // Init fields JS actions
        this.fieldsJSActions();

        // Assign default values
        this.assignDefaultValues();

        // Tags input
        $('.element-classes').tagsinput({
            tagClass: 'badge badge-dark'
        });
    },

    // CSS JSON Object
    CSSJSON: {},

    // Check if rule has unit
    hasUnit: function (cssPropertyName) {
        var unit = false;
        $.each(cssStudio.properties, function (index, group) {
            $.each(group.fields, function (index, rule) {
                if (cssPropertyName === rule.css) {
                    unit = $('[textboxname="' + cssPropertyName + '-unit"]').val();
                }
            });
        });

        return unit;
    },

    // Update CSS
    updateCSS: function (property, value) {
        var activeSelector = $('.bbs-field-selectors>.active').data("selector");

        if (!cssStudio.CSSJSON[activeSelector]) cssStudio.CSSJSON[activeSelector] = {};

        cssStudio.CSSJSON[activeSelector][property] = value;

        var cssString = "";

        $.each(cssStudio.CSSJSON, function (selector, cssJSON) {
            cssString += selector + " {\n";

            for (var cssPropertyName in cssJSON) {
                var ruleValue = cssJSON[cssPropertyName];

                var unitValue = cssStudio.hasUnit(cssPropertyName);
                if (unitValue) ruleValue = ruleValue + unitValue;

                if (cssPropertyName.indexOf("-unit") === -1) {
                    cssString += "\t" + cssPropertyName + ": " + ruleValue + ";\n";
                }
            }

            cssString += "}\n";
        });

        $(cssStudio.cssOutputSelector).text(cssString);
    },

    // Assign default values
    assignDefaultValues: function () {
        var activeSelector = $('.bbs-field-selectors>.active').data("selector"),
            cssJSON = this.properties;

        $.each(cssJSON, function (index, group) {
            $.each(group.fields, function (index, field) {
                var cssValue = $(activeSelector).css(field.css);
                // $('.bbs-editor-list').find('[name='+field.css+']').val(cssValue);
            });
        });
    },

    // Fields JS Actions
    fieldsJSActions: function () {
        var updateCSS = this.updateCSS;

        // Combo box field
        easyloader.load(['combobox', 'menu'], function () {
            $('.bbs-combobox').combobox({
                onChange: function (value) {
                    var property = $(this).attr("textboxname");
                    updateCSS(property, value);
                }
            });
        });

        // Number
        easyloader.load('numberspinner', function () {
            $('.bbs-number').numberspinner({
                onChange: function (value) {
                    var property = $(this).attr("textboxname");
                    updateCSS(property, value);
                }
            });
        });

        // Color
        $('.bbs-color').minicolors({
            format: 'rgb',
            opacity: true,
            change: function (value) {
                var property = $(this).attr("name");
                updateCSS(property, value);
            }
        });

        // Toggle
        $('.bbs-toggle').each(function () {
            $(this).toggleInput(function ($this) {
                var property = $this.attr("name");
                updateCSS(property, $('[name=' + property + ']:checked').val());
            });
        })
    },

    // Extract selectors
    selectors: [],
    extractSelectors: function (selector, exclude, singleNode) {
        var $this = this;

        if (singleNode) {
            var nodeSelector = $this.generateSelector(selector.get(0));
            $this.selectors.push(nodeSelector);
        } else {
            selector.children().each(function () {
                var node = $(this)[0];
                var nodeSelector = $this.generateSelector(node);

                $this.selectors.push(nodeSelector);

                if ($(this).children().length > 0) {
                    $this.extractSelectors($(this));
                }
            });
        }

        return this.selectors;
    },

    // Generate selector
    generateSelector: function (node) {
        var nodeSelector = node.tagName.toLowerCase();

        if ($(this).attr("id")) {
            nodeSelector += '#' + $(this).attr("id");
        } else {
            if ($(this).attr("class")) {
                var classes = $(this).attr("class"),
                    ignoredClasses = ["ui-droppable", "ui-sortable-handle", "ui-sortable"];

                $.each(ignoredClasses, function (i, ignoredClass) {
                    classes = classes.replace(ignoredClass, "");
                });

                classes = classes.trim();
                classes = classes.split(" ");
                classes = classes.join(".");

                nodeSelector += '.' + classes;
            }
        }

        return nodeSelector;
    },

    // Init CSS Studio
    init: function (selector, options) {
        var $this = this;

        // Reset
        cssStudio.selectors = [];

        var defaultOptions = {
            exclude: [],
            cssOutputSelector: '',
            parentSelector: '',
            showSelectorPanel: false,
            singleNode: false
        };

        var settings = $.extend({}, defaultOptions, options);

        // Set css output selectors
        this.cssOutputSelector = settings.cssOutputSelector;

        // Set parent selector
        this.parentSelector = settings.parentSelector;

        this.getProperties();

        // Extract selectors
        this.extractSelectors($(selector), settings.exclude, settings.singleNode);

        // Selector panel state
        if (settings.showSelectorPanel) {
            setTimeout(function () {
                $('.bbs-field-selectors').removeAttr("hidden");
                $('.bbs-properties-list').css("width", 'calc(100% - 560px)');
            });
        }

        if (settings.singleNode) {
            setTimeout(function () {
                $('.bbs-field-selectors li').first().trigger("click");
            }, 200);
        }

        // Events
        $('#bb-css-studio')
            .off("click")
            .on('click', '[bbs-click]', function (e) {
                e.preventDefault();
                var event = $(this).attr('bbs-click');
                $this.clickEvents[event]($(this), e);
            });
    }
};
