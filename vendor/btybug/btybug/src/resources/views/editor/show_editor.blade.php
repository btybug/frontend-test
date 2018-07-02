{!! Form::textarea('main_content',null,['id' => 'main_content']) !!}

<script>
    tinymce.init({
        selector: '#main_content', // change this value according to your HTML
        height: 200,
        theme: 'modern',
        plugins: [
            'advlist anchor autolink autoresize autosave bbcode charmap code codesample colorpicker contextmenu directionality emoticons fullscreen hr image imagetools importcss insertdatetime legacyoutput link lists media nonbreaking noneditable pagebreak paste preview print save searchreplace spellchecker tabfocus table template textcolor textpattern visualblocks visualchars wordcount shortcodes',
        ],
        toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help shortcodes',
        image_advtab: true
    });
    <