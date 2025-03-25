<?php
use \Illuminate\Support\Facades\Auth;
?>
<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="{{route('front.index')}}" class="logo d-flex align-items-center me-auto me-xl-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.webp" alt=""> -->
            <h1 class="sitename">EasyFolio</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="#hero" class="active">خانه</a></li>
                <li><a href="#category" style="">دسته بندی</a></li>
                <li><a href="#about">درباره ی ما</a></li>
                <li><a href="#gallery">گالری</a></li>
                @php
                    if(Auth::user()?->role == true)
                        $route = 'back.index';
                    else
                        $route = 'front.index';
                @endphp

                @if(!$user = Auth::user())
                    <li><a href="{{route('register')}}">ورود/ ثبت نام</a></li>
                @else
                    <li>
                        <a href="{{route($route)}}">
                            سلام {{$user->name}}
                        </a>
                    </li>
                @endif

            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <div class="header-social-links">
            <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>

    </div>
</header>
