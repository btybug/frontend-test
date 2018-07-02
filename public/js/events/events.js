$(function () {

    // Ajax function shorthand
    function ajax(url, data, callback) {
        $.ajax({
            type: "post",
            datatype: "json",
            url: url,
            data: data,
            headers: {
                'X-CSRF-TOKEN': $("input[name='_token']").val()
            },
            success: function (data) {
                if (callback) {
                    callback(data);
                }

                return data;
            }
        });
    }

    // Parse inline template
    function parseTemplate(template, variables) {
        var templateHTML = $('#' + template).html();
        $.each(variables, function (i, variable) {
            var key = Object.keys(variable)[0];
            var value = Object.values(variable)[0];

            templateHTML = templateHTML.replace(new RegExp(key, "gm"), value);
        });

        return templateHTML;
    }

    // Fields parser
    var fieldsParser = {
        formGroup: function (d, name) {
            var formGroup = $('<div class="form-group" />');
            var field = '';
            var label = $('<label>');
            if (d.label) {
                label.append(d.label);
            }

            if (d.type) {
                if (fieldsParser[d.type]) {
                    field = fieldsParser[d.type](d, name);
                }
            }
            formGroup.append(label);
            formGroup.append(field);
            return formGroup;
        },
        select2: function (d, name) {
            var fieldHTML = $('<select name="' + name + '"  class="form-control " data-select2="select2' + name + '" multiple></select>');
            var values = d.value;
            values = values.split(',');
            if (d.data) {
                $.each(d.data, function (key, val) {
                    var options = $('<option value="' + key + '">' + val + '</option>');
                    if (values.indexOf(key) > -1) {
                        options.attr('selected', 'selected');
                    }
                    fieldHTML.append(options);
                })
            }

            return fieldHTML;
        },
        select: function (d, name) {
            var fieldHTML = $('<select name="' + name + '" class="form-control" data-value=""></select>');
            var values = d.value;
            values = values.split(',');
            if (d.data) {
                $.each(d.data, function (key, val) {
                    var options = $('<option value="' + key + '">' + val + '</option>');
                    if (values.indexOf(key) > -1) {
                        options.attr('selected', 'selected');
                    }
                    fieldHTML.append(options);

                })
            }

            return fieldHTML;
        },
        text: function (d, name) {
            var fieldHTML = $('<input type="text" name="' + name + '" class="form-control" value="' + d.value + '" >');
            return fieldHTML;
        },
        textarea: function (d, name) {
            var fieldHTML = '<textarea class="form-control" name="' + name + '" >' + d.value + '</textarea>';
            return fieldHTML;
        },
        radio: function (d, name) {
            var fieldHTML = '<label><input type="radio" name="optradio">Option 1</label>';
            if (d.data) {
                fieldHTML = '';
                $.each(d.data, function (key, val) {
                    if (key === d.value) {
                        fieldHTML += '<label class="radio-inline"><input type="radio" value="' + key + '" name="' + name + '" checked="checked">' + val + '</label>'
                    } else {
                        fieldHTML += '<label class="radio-inline"><input type="radio" value="' + key + '" name="' + name + '">' + val + '</label>'
                    }
                })
            }
            return fieldHTML
        },
        checkbox: function (d, name) {
            var fieldHTML = '<label class="checkbox-inline"><input type="checkbox" value="">Option 1</label>';
            var values = d.value;
            if (d.data) {
                fieldHTML = '';
                $.each(d.data, function (key, val) {
                    if (values.indexOf(key) > -1) {
                        fieldHTML += '<label class="checkbox-inline"><input type="checkbox" value="' + key + '" name="' + name + key + '"  checked="checked">' + val + '</label>'
                    } else {
                        fieldHTML += '<label class="checkbox-inline"><input type="checkbox" value="' + key + '" name="' + name + key + '" >' + val + '</label>'
                    }
                })
            }
            return fieldHTML

        },
        buttons: function (d) {

            var fieldHTML = '<button class="btn btn-success" type="button" data-btnclick="saveevent">Save</button> <button class="btn btn-warning" type="button" data-btnclick="cleartab" data-id="' + d.ids + '">Clean</button> <button class="btn btn-danger" type="button" data-btnclick="removetab" data-id="' + d.ids + '">Disconect</button>';
            return fieldHTML;
        }
    };

    // Builder object
    var eventBuilder = {
        currentEvent: '',
        json: {},
        updateJSON: function (key, value) {
            eventBuilder.json[key] = value;
            $('#export-json').val(JSON.stringify(eventBuilder.json));
        },
        fixSerializedArray: function (serializedArray) {
            var outputObject = {};
            $.each(serializedArray, function (i, item) {
                var name = item.name
                outputObject[name] = item.value;
            });

            return outputObject;
        },
        // Update JSON with form data
        updateFormData: function (){
            eventBuilder.json[eventBuilder.currentEvent] = {};

            $('#event-connections>.panel').each(function (){
                var nameSpace = $(this).attr("data-namespace");
                var form = $(this).find('[data-form]');
                // noinspection JSAnnotator
                Object.assign(eventBuilder.json[eventBuilder.currentEvent], {
                    [nameSpace]: eventBuilder.fixSerializedArray(form.serializeArray())
                });
            });

            eventBuilder.updateJSON(eventBuilder.currentEvent, eventBuilder.json[eventBuilder.currentEvent]);
        }
    };

    // Click events
    var clickEvents = {
        // Select event
        selectEvent: function ($this) {
            if (!$this.is('.active')) {

                // Show add buttons
                $('[data-title]').show();

                // Show actions panel
                $('[data-panelevent="functions"]').removeClass("hide");

                // Clean connections panel
                $('#event-connections').html("");

                // Activate item
                $this.closest('.list-group').find('button').removeClass('active');
                $this.addClass('active');

                // Update json
                eventBuilder.json = {};
                eventBuilder.currentEvent = $this.data('value');

                eventBuilder.updateJSON($this.data('value'), {});

                ajax('/admin/front-site/event/get-event-function-relations', {
                    event_namespace: $this.data('value')
                }, function (response){
                    var eventConnections = $('#event-connections');

                    $.each(response.tabs, function (index, tab) {
                        var select2 = {};

                        var currentID = $('#event-connections>.panel').length + 1;
                        var formHTML = $('<form data-form="' + currentID + '" />');

                        $.each(tab.form, function (key, val) {
                            formHTML.append(fieldsParser.formGroup(val, key));
                            if (val.type === 'select2') {
                                select2[key] = val;
                            }
                        });

                        var template = parseTemplate('action-template', [
                            {'{id}'        : currentID},
                            {'{content}'   : formHTML.get(0).outerHTML},
                            {'{title}'     : tab.name},
                            {'{namespace}' : tab.namespace}
                        ]);

                        eventConnections.append(template);

                        // Hide add button
                        var buttonSpace = tab.namespace.replace(/\\+/g, "\\\\");
                        $('[data-value="' + buttonSpace + '"]').hide();

                        // Update JSON
                        eventBuilder.updateFormData();

                        // Increase counter badge
                        $('.events-list-group>.list-group-item.active>.badge').text(currentID);
                    });
                });
            }
        },
        // Add action to event
        addAction: function ($this) {
            var nameSpace = $this.attr("data-value");
            ajax('/admin/front-site/event/get-function-data', {
                namespace: nameSpace
            }, function (response) {
                var eventConnections = $('#event-connections');
                var currentID = $('#event-connections>.panel').length + 1;

                var formHTML = $('<form data-form="' + currentID + '" />');
                var select2 = {};
                $.each(response.data, function (key, val) {
                    formHTML.append(fieldsParser.formGroup(val, key));
                    if (val.type === 'select2') {
                        select2[key] = val;
                    }
                });

                var template = parseTemplate('action-template', [
                    {'{id}'        : currentID},
                    {'{content}'   : formHTML.get(0).outerHTML},
                    {'{title}'     : $this.attr('data-title')},
                    {'{namespace}' : nameSpace}
                ]);

                eventConnections.append(template);

                // Hide add button
                $this.hide();

                // Increase counter badge
                $('.events-list-group>.list-group-item.active>.badge').text(currentID);

                // Update JSON
                eventBuilder.updateFormData();
            });
        },
        // Remove Action
        removeAction: function ($this) {
            var title = $this.data("title");
            $('[data-title="' + title + '"]').show();
            $this.closest('.panel').remove();
            var currentID = $('#event-connections>.panel').length;

            // Decrease counter badge
            $('.events-list-group>.list-group-item.active>.badge').text(currentID);

            // Update JSON
            eventBuilder.updateFormData();
        },
        // Save Event
        saveEvent: function ($this) {
            $this.find('i').removeClass("hide");
            ajax('/admin/front-site/event/save-event-function-relations', {
                data: JSON.stringify(eventBuilder.json)
            }, function (){
                $this.find('i').addClass("hide");
            });
        }
    };

    // Catch events
    $('body')
        // Click events
        .on('click', '[bb-click]', function (e) {
            e.preventDefault();

            var targets = $(this).attr('bb-click');
            if (clickEvents[targets]) {
                clickEvents[targets]($(this), e);
            }
        })
        // On form changes
        .on('change', 'input, select, textarea', function (e) {
            // Update JSON
            eventBuilder.updateFormData();
        });


});
