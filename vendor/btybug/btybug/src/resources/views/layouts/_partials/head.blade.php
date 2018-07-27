<meta charset="utf-8"/>
<title>BB Admin Framework</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
{!! BBCss("backend")  !!}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

{!! HTML::style("public/css/cms.css?v=".rand(1111,99999)) !!}
{!! HTML::style("public/css/admin.css?v=".rand(1111,99999)) !!}
{!! HTML::style("public/js/DataTables/datatables.css") !!}
{!! HTML::style("public/js/DataTables/Buttons-1.5.1/css/buttons.bootstrap.css") !!}

<!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->
{!! getCss() !!}
<!-- ================== END PAGE LEVEL CSS STYLE ================== -->

{!! BBJs("backend") !!}
{!! HTML::script("public/js/jquery-2.1.4.min.js") !!}
{!! HTML::script("public/js/jquery-ui/jquery-ui.min.js") !!}
{!! HTML::script("public/js/helper.js") !!}