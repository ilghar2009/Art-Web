<!doctype html>
<html lang="en">
    @yield('top-head')
    <head>
        @include('back.theme.head')


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
