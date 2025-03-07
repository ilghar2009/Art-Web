<?php
use \Illuminate\Support\Facades\Auth;
?>
<!doctype html>
<html lang="fn">
<head>
    @include('theme.head')

    @yield('head')
</head>

<body class="index-page">
    @include('theme.header')

    @yield('body')

    @include('theme.script')
</body>

</html>
