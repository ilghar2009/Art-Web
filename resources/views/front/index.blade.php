@extends('front.theme.theme')

@section('head')

    <title>ArtWeb</title>

    <style>
        #galleryCarousel .carousel-inner {
            position: relative;
            width: 100%;
            height: 100vh; /* اندازه اسلایدر برابر ارتفاع صفحه */
            overflow: hidden;
        }

        #galleryCarousel .carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* تنظیم تصویر برای پوشش کامل اسلایدر */
        }

        body{
            font-size:18px;
        }

        @media (max-width: 1024px) {
            #galleryCarousel{
                height:70vh;
            }
        }

        @media (max-width: 767px) {
            #galleryCarousel{
                height:50vh;
            }
        }




    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('body')

    <main class="main">

    @if($galleries)

        <div id="galleryCarousel" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-inner">
                @php $i = 0; @endphp
                @foreach($galleries as $gallery)
                    <div class="carousel-item @if($i === 0) active @endif">
                        <a href="{{ route('show.gallery', $gallery->gallery_id) }}">
                            <img src="{{ $gallery->images?->image }}" class="d-block w-100" alt="Image {{ $gallery->description}}">
                        </a>
                    </div>
                    @php $i++ @endphp
                @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">before</span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">after</span>
            </button>

        </div>

    @endif


        <!-- category -->
        <section id="category" class="portfolio section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Category:</h2>
                <div class="title-shape">
                    <svg viewBox="0 0 200 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M 0,10 C 40,0 60,20 100,10 C 140,0 160,20 200,10" fill="none" stroke="currentColor"
                              stroke-width="2"></path>
                    </svg>
                </div>

            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                    <div class="row g-4 isotope-container" data-aos="fade-up" data-aos-delay="300">

                        @foreach($categories as $category)

                            <div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-web">

                                <div class="portfolio-card">

                                    <div class="portfolio-image">
                                        <img src="{{$category?->image}}" class="img-fluid" alt="" loading="lazy">
                                        <div class="portfolio-overlay">
                                            <div class="portfolio-actions">
                                                <a href="{{$category?->image}}" class="glightbox preview-link"
                                                   data-gallery="portfolio-gallery-web"><i class="bi bi-eye"></i></a>
                                                <a href="{{route('show.category', $category->category_id)}}"
                                                   class="details-link"><i class="bi bi-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="portfolio-content">
                                        <span class="category">category:</span>
                                        <h3>{{$category->title}}</h3>
                                        <p>{{$category->description}}</p>
                                    </div>

                                </div>
                            </div>

                        @endforeach

                    </div><!-- End Portfolio Container -->

                </div>

            </div>

        </section><!-- /Portfolio Section -->

        <!-- product -->
        <section id="gallery" class="portfolio section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Gallery</h2>
                <div class="title-shape">
                    <svg viewBox="0 0 200 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M 0,10 C 40,0 60,20 100,10 C 140,0 160,20 200,10" fill="none" stroke="currentColor" stroke-width="2"></path>
                    </svg>
                </div>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                    <div class="portfolio-filters-container" data-aos="fade-up" data-aos-delay="200">
                        <ul class="portfolio-filters isotope-filters">
                            <li data-filter="*" @if(!isset($active)) class="filter-active" @endif><a style="color:#000; text-decoration: none;" href="{{route('front.index')}}">all of categories</a></li>
                            @foreach($categories as $category)
                                <li data-filter=".filter-web" @if(isset($active) and $active == $category->category_id) class="filter-active" @endif value="{{$category->category_id}}"><a style="color:#000" href="{{route('search.gallery', $category->category_id)}}">{{$category?->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="row g-4 isotope-container" data-aos="fade-up" data-aos-delay="300">

                        @foreach($galleries as $gallery)
                            <div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-web">
                                <div class="portfolio-card">
                                    <div class="portfolio-image">
                                        <img src="{{$gallery->images?->image}}" class="img-fluid"
                                             alt="{{$gallery->title}}" loading="lazy">

                                        <div class="portfolio-overlay">

                                            <div class="portfolio-actions">

                                                @if(session('error') != null)
                                                    @php $error = session('error') @endphp
                                                @endif
                                                <a href="{{route('like',$gallery->gallery_id)}}" class="@if(session('error') != null and $error['gallery_id'] == $gallery->gallery_id and $error['error'] == 'You’ve already liked this gallery.') {{'bi bi-heart-fill'}} @else {{'bi bi-heart'}} @endif">{{$gallery->likes_count}}</a>

                                                <a href="{{route('show.gallery',$gallery->gallery_id)}}" class="details-link">
                                                    <i class="bi bi-arrow-right"></i>
                                                </a>
                                            </div>

                                        </div>
                                    </div>

                                    @if(session('error') !== null)
                                        @php
                                            $error = session('error');
                                        @endphp

                                        @if($error['gallery_id'] == $gallery->gallery_id)
                                            <div class="portfolio-content">
                                                <p style=" font-size: 15px; font-family:bold,serif;">{{$error['error']}}</p>
                                            </div>
                                        @endif

                                    @endif

                                </div>
                            </div><!-- End Portfolio Item -->
                        @endforeach
                    </div><!-- End Portfolio Container -->

                </div>

            </div>

        </section><!-- /Portfolio Section -->

        <!-- About Section -->
        <section id="about" class="about section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>About</h2>
                <div class="title-shape">
                    <svg viewBox="0 0 200 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M 0,10 C 40,0 60,20 100,10 C 140,0 160,20 200,10" fill="none" stroke="currentColor"
                              stroke-width="2"></path>
                    </svg>
                </div>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row align-items-center">
                    <div class="col-lg-6 position-relative" data-aos="fade-right" data-aos-delay="200">
                        <div class="about-image">
                            <img src="/assets/img/reaper_compressed.jpg" alt="Profile Image"
                                 class="img-fluid rounded-4">
                        </div>
                    </div>

                    <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                        <div class="about-content">
                            <span class="subtitle">About Me</span>

                            <h2>Backend Developer &amp; Web Developer</h2>

                            <p class="lead mb-4">Backend developer skilled in Laravel, API development, and database design, with experience building secure and clean backend systems. Motivated to learn, grow, and contribute in professional team environments.</p>

                            <div class="personal-info">
                                <div class="row g-4">
                                    <div class="col-6">
                                        <div class="info-item">
                                            <span class="label">Name</span>
                                            <span class="value">Ilghar</span>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="info-item">
                                            <span class="label">Age</span>
                                            <span class="value">16 Years</span>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="info-item">
                                            <span class="label">Email</span>
                                            <span class="value">ilghar09.88@example.com</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /About Section -->

    </main>

    <footer id="footer" class="footer">

        <div class="container">
            <div class="copyright text-center ">
                <p>© <span>Copyright</span> <strong class="px-1 sitename">ilghar ebrahimi</strong> <span>All Rights Reserved</span>
                </p>
            </div>
            <div class="social-links d-flex justify-content-center">
                <a href="https://x.com/ilghar09"><i class="bi bi-twitter-x"></i></a>
                <a href="https://t.me/ilghar_09"><i class="bi bi-telegram"></i></a>
                <a href="https://instagram.com/ilghar_09"><i class="bi bi-instagram"></i></a>
                <a href="https://www.linkedin.com/in/ilghar-ebrahimi-113559384/"><i class="bi bi-linkedin"></i></a>
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Created by Ilghar Ebrahimi . IRE .
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

    @section('script')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @endsection
@endsection
