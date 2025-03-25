<?php
use \Illuminate\Support\Facades\Auth;
?>
<!doctype html>
<html lang="fn">
<head>
    @include('front.theme.head')

    @yield('head')

    <style>
        @font-face {
            font-family: "nazanin";
            src: url("/assets/fonts/BNazanin.ttf") format("truetype"),
            url("/assets/fonts/BNaznnBd.ttf") format("truetype");
            font-weight: normal;
            font-style: normal;
        }
        body{
            font-family: 'nazanin', sans-serif !important;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'nazanin', sans-serif !important;
            font-weight: bold; /* استفاده از نسخه بولد فونت */
        }
    </style>
</head>

<body class="index-page">
    @include('front.theme.header')

    @yield('body')

    @include('front.theme.script')
    @yield('script')
</body>

</html>
