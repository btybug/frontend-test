<div class="modal fade bs-example-modal-lg" id="changeCode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Change Code</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => url(route('assets_save_code')),'id' => 'aceForm']) !!}
                {!! Form::hidden('id','',['id' => 'version_id']) !!}
                {!! Form::hidden('code',null,['id' => 'code_data']) !!}
                <div class="row ace-box">
                    <textarea id="editorCode" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="row">
                    {!! Form::submit('Save',['class' => 'btn btn-primary pull-right save-data']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<style>
    .ace_editor {
        height: 400px;
        width: 900px;
        flex: 1;
    }

    .set_border {
        border: 2px solid #FF0000;
    }

    .custom_inline_block {
        display: inline-block;
    }
</style>
@push('javascript')
    {!! HTML::script('public/js/ace-editor/ace.js') !!}
    <script>
        $(document).ready(function () {
            var editor_html = ace.edit("editorCode");
            editor_html.setTheme("ace/theme/monokai");


            $('body').on('click', '.save-data', function (e) {
                e.preventDefault();
                var space = $('#code_data');
                space.val(editor_html.getSession().getValue());

                var annot = editor_html.getSession().getAnnotations();
                for (var key in annot) {
                    if (annot.hasOwnProperty(key) && annot[key].type === 'error') {
                        return editor_html.setStyle("set_border");
                    }
                }

                $("#aceForm").submit();
            });

            $('body').on('click', '.edit-version', function () {
                var name = $(this).data('name');
                var id = $(this).data('id');
                var type = $(this).data('type');
                $.ajax({
                    type: "post",
                    url: "{!! url('/admin/uploads/assets/get-data') !!}",
                    cache: false,
                    datatype: "json",
                    data: {
                        id: id,
                        name: name
                    },
                    headers: {
                        'X-CSRF-TOKEN': $("[name=_token]").val()
                    },
                    success: function (data) {
                        if (!data.error) {
                            if (type == 'css' || type == 'framework') {
                                editor_html.session.setMode("ace/mode/css");
                            } else {
                                editor_html.session.setMode("ace/mode/javascript");
                            }
                            editor_html.setValue(data.code);
                            $('#version_id').val(id);
                            $('#changeCode').modal();
                        }
                    }
                });
            });
        })

    </script>
@endpush