<!doctype html>
<html lang="en">
    <head>
        @include('back.theme.head')

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
