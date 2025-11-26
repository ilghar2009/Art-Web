<?php
use \Illuminate\Support\Facades\Auth;
?>
<!doctype html>
<html lang="fn">
<head>
    @include('theme.head')

    @yield('head')

    <style>
        @font-face {
            font-family: "parastoo";
            src: url("/assets/fonts/parastoo-font-v1.0.0-alpha5/web/Farsi-Digits/Parastoo-Bold-FD.woff") format("woff"),
            url("/assets/fonts/parastoo-font-v1.0.0-alpha5/web/Farsi-Digits/Parastoo-Bold-FD.ttf") format("truetype");
            font-weight: normal;
            font-style: normal;
        }
        body{
            font-family: 'parastoo', sans-serif !important;
        }
    </style>
</head>

<body class="index-page">
    @include('theme.header')

    @yield('body')

    @include('theme.script')
</body>

</html>
