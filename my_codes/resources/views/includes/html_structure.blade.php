<!DOCTYPE html>
<html dir="rtl" lang="fa">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="@section('icon') {{ asset('/images/icons/' . env('APP_ICON')) }} @show">
    <title>@section('title') {{ env('APP_NAME') }} @show</title>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <style>
        @font-face {
            font-family: "Yekan";
            src: url(main_files/styles/fonts/Yekan.eot);
            src: url(main_files/styles/fonts/Yekan.eot?#iefix) format("embedded-opentype"),
                url(main_files/styles/fonts/Yekan.woff) format("woff"),
                url(main_files/styles/fonts/Yekan.ttf) format("truetype"),
                url(main_files/styles/fonts/Yekan.svg#BYekan) format("svg");
            font-weight: normal;
            font-style: normal
        }

        * {
            font-family: Yekan, Tahoma;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>

<body>
    @include('includes.header')
    @yield('content')
    @include('includes.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
