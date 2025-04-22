<?php
use \Illuminate\Support\Facades\Auth;
?>
<!doctype html>
<html lang="fn">
<head>
    @include('front.theme.head')

    <link rel="stylesheet" href="/assets/fonts/Vazirmatn-font-face">
    <link rel="stylesheet" href="/assets/fonts/Vazirmatn-Variable-font-face.css">

    @yield('head')

    <style>
        @font-face {
            font-family: 'Byekan';
            src: url('/assets/fonts/384.Font.Farsi/BYekan.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        body{
            font-family: 'Vazir', sans-serif;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Byekan', sans-serif;
        }

        *{
            text-decoration: none;
        }

        a{
            text-decoration:none;
        }

        p{
            font-family: 'Vazir', sans-serif;
            font-weight: bold; /* استفاده از نسخه بولد فونت */
        }
    </style>
</head>

<body class="index-page" dir="rtl">
    @include('front.theme.header')

    @yield('body')

    @include('front.theme.script')
    @yield('script')
</body>

</html>
