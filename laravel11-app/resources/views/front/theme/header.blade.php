<?php
use \Illuminate\Support\Facades\Auth;
?>
<header id="header" class="header d-flex align-items-center sticky-top" style="background-color:transparent">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="{{route('front.index')}}" class="logo d-flex align-items-center me-auto me-xl-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.webp" alt=""> -->
            <h1 class="sitename">EasyFolio</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>

                <li class="dropdown"><a href="#category"><span>دسته بندی</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        @foreach($categories as $category)
                            <li><a href="{{route('show.category', $category?->category_id)}}">{{$category?->title}}</a></li>
                        @endforeach
                    </ul>
                </li>

                <li><a href="#about">درباره ی ما</a></li>
                <li><a href="#gallery">گالری</a></li>
                @php
                    if(Auth::user()?->role == true)
                        $route = 'back.index';
                    else
                        $route = 'front.dashboard';
                @endphp

                @if(!$user = Auth::user())
                    <li><a href="{{route('register')}}">ورود/ ثبت نام</a></li>
                @else
                    <li class="dropdown"><a href="#"><span> سلام {{$user->name}}</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>

                            @if($user->role == true)
                                <li><a href="{{route('back.index')}}">صفحه ادمین</a></li>
                            @endif

                            <li><a href="{{route('front.dashboard')}}">داشبورد کاربران</a></li>
                            <li><a href="{{route('logout')}}">خروج از اکانت</a></li>
                        </ul>
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
