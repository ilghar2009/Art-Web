<!doctype html>
<html lang="en">
<head>
    @include('theme.head')
    @yield('head')
</head>
<body>
    @include('theme.header')

    @yield('body')

    <script>
        @yield('script')
    </script>
</body>
</html>
