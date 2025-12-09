<?php
use \Illuminate\Support\Facades\Auth;
?>
<!doctype html>
<html lang="en">
<head>
    @include('front.theme.head')

{{--    font for title and head --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Playwrite+NO:wght@100..400&display=swap" rel="stylesheet">
{{-- another --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Playwrite+NO:wght@100..400&display=swap" rel="stylesheet">

    @yield('head')

    <style>
        #header {
           font-family: "Playfair Display", serif;
           font-optical-sizing: auto;
           font-weight: 600;
           font-style: normal;
       }

        body{
            font-family: 'Playfair Display', serif;
            direction: ltr;
            font-optical-sizing: auto;
            font-weight: 600;
            font-style: normal;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Playwrite NO', cursive;
            font-optical-sizing: auto;
            font-weight: 700;
            font-style: normal;
        }

        *{
            text-decoration: none;
        }

        a{
            text-decoration:none;
        }

        p{
        }
    </style>
</head>

<body class="index-page" dir="ltr">
    @include('front.theme.header')

    @yield('body')

    @include('front.theme.script')
    @yield('script')
</body>

</html>
