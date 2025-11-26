<!doctype html>
<html lang="en">
    @yield('top-head')
    <head>
        @include('back.theme.head')
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
        @yield('head')
    </head>

    <body class="sidebar-dark">

        <div class="container-scroller">

            @include('back.theme.header')
            <div class="container-fluid page-body-wrapper">
                @include('back.theme.left-menu')
                @yield('body')
            </div>
        </div>

        @include('back.theme.footer')

        @include('back.theme.script')
        @yield('script')
    </body>
</html>
