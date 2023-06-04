<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="/main/asset/css/mdb.rtl.min.css">
    <link rel="stylesheet" href="/main/asset/css/mdb.min.css.map">
{{--    <link rel="stylesheet" href="/main/asset/css/bootstrap.css.map">--}}
    <link rel="stylesheet" href="/main/asset/css/style.css">
    <link rel="stylesheet" href="/main/asset/css/fontiran.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">





</head>
<body>

@include('home.layout.header')
<div class="container">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (Session::has('msg'))
        <div class="alert col-12  alert-success alert-shade alert-dismissible fade show">
            <ul>
                <li>{{ Session::get('msg') }}</li>
            </ul>
        </div>
    @endif

    @yield('content')
</div>
@include('home.layout.footer')

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

<script src="/main/asset/js/mdb.min.js"></script>
<script src="/main/asset/js/mdb.min.js.map"></script>

<script src="/dashboard/ckeditor/ckeditor.js"></script>

<script>
    CKEDITOR.replace('editor', {
        language: 'fa',
        content: 'fa',
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>
    $(document).ready(function() {
        $('.js-example-theme-multiple').select2({
            theme: "classic"
        });
    });
</script>


<script>
    $(':radio').change(function() {
        console.log('New star rating: ' + this.value);
    });
</script>



</body>
</html>
