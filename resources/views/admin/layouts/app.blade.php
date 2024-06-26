
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">

</head>
<style>
    .label-spe {
        font-weight: bold;
    }
</style>
<body style="background: #ededed">

@include('admin.layouts.header')

<div class="col-12 d-flex mt-5">
    <div class="col-2">
        @include('admin.layouts.sidebar')
    </div>
    <div class="col-10">
        @yield('content')
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css" rel="stylesheet">

@yield('custom_js')
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });

    //for slug
    function path() {
        var title = $("#title").val() ?? $("#name").val();
        title = title.toLowerCase();
        title = title.replace(/ı/g, "i")
        title = title.replace(/ğ/g, "g")
        title = title.replace(/ü/g, "u")
        title = title.replace(/ş/g, "s")
        title = title.replace(/ö/g, "o")
        title = title.replace(/ç/g, "c")
        title = title.replace(/İ/g, "I")
        title = title.replace(/Ğ/g, "G")
        title = title.replace(/Ü/g, "U")
        title = title.replace(/Ş/g, "S")
        title = title.replace(/Ö/g, "O")
        title = title.replace(/Ç/g, "C")
        title = title.replace(/ /g, "_")
        title = title.replace(/[^a-zA-Z0-9_]/g, "");

        $("#slug").val(title);
    }
</script>
</body>
</html>
