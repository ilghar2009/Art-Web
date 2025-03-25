<!doctype html>
<html lang="en">
    @yield('top-head')
    <head>
        @include('back.theme.head')

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
