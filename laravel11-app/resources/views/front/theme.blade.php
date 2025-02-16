<!doctype html>
<html lang="en">
    <head>
        @include('front.theme.head')

        @yield('head')
    </head>

    <body>

        @include('front.theme.header')

        @yield('body')

        @include('front.theme.footer')

        <script src="/assets/js/jquery.js"></script>

        @yield('script')

    </body>
</html>
