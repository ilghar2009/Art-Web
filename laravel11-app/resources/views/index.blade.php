@extends('theme.theme')

@section('head')
    <title>art_web</title>
@endsection

@section('body')
  <main class="main">

      <!-- slider -->
      <div id="slider">
          <figure>
              <img src="/assets/img/portfolio/portfolio-1.webp">
              <img src="/assets/img/portfolio/portfolio-10.webp">
              <img src="/assets/img/portfolio/portfolio-10.webp">
          </figure>
      </div>

      <!-- category -->
      <section id="portfolio" class="portfolio section">

          <!-- Section Title -->
          <div class="container section-title" data-aos="fade-up">
              <h2>دسته بندی ها</h2>
              <div class="title-shape">
                  <svg viewBox="0 0 200 20" xmlns="http://www.w3.org/2000/svg">
                      <path d="M 0,10 C 40,0 60,20 100,10 C 140,0 160,20 200,10" fill="none" stroke="currentColor" stroke-width="2"></path>
                  </svg>
              </div>
              <p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur vel illum qui dolorem</p>
          </div><!-- End Section Title -->

          <div class="container" data-aos="fade-up" data-aos-delay="100">

              <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                  <div class="row g-4 isotope-container" data-aos="fade-up" data-aos-delay="300">

                        @foreach($categories as $category)

                          <div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-web">

                              <div class="portfolio-card">

                                  <div class="portfolio-image">
                                      <img src="{{$category->image}}" class="img-fluid" alt="" loading="lazy">
                                      <div class="portfolio-overlay">
                                          <div class="portfolio-actions">
                                              <a href="{{$category->image}}" class="glightbox preview-link" data-gallery="portfolio-gallery-web"><i class="bi bi-eye"></i></a>
                                              <a href="{{route('category.show', $category->category_id)}}" class="details-link"><i class="bi bi-arrow-right"></i></a>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="portfolio-content">
                                      <span class="category">:دسته بندی</span>
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
      <section id="portfolio" class="portfolio section">

          <!-- Section Title -->
          <div class="container section-title" data-aos="fade-up">
              <h2>گالری</h2>
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
                          <li data-filter="*" class="filter-active">All Work</li>
                          <li data-filter=".filter-web">Web Design</li>
                          <li data-filter=".filter-graphics">Graphics</li>
                          <li data-filter=".filter-motion">Motion</li>
                          <li data-filter=".filter-brand">Branding</li>
                      </ul>
                  </div>

                  <div class="row g-4 isotope-container" data-aos="fade-up" data-aos-delay="300">

                      <div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-web">
                          <div class="portfolio-card">
                              <div class="portfolio-image">
                                  <img src="/assets/img/portfolio/portfolio-1.webp" class="img-fluid" alt="" loading="lazy">

                                  <div class="portfolio-overlay">

                                      <div class="portfolio-actions">

{{--                                          <a href="/assets/img/portfolio/portfolio-1.webp" class="glightbox preview-link" data-gallery="portfolio-gallery-web">--}}
                                          <a href="#" class="bi bi-heart"></a>
{{--                                          </a>--}}

                                          <a href="portfolio-details.html" class="details-link"><i class="bi bi-arrow-right"></i></a>
                                      </div>

                                  </div>
                              </div>
                          </div>
                      </div><!-- End Portfolio Item -->

                      <div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-graphics">
                          <div class="portfolio-card">
                              <div class="portfolio-image">
                                  <img src="/assets/img/portfolio/portfolio-10.webp" class="img-fluid" alt="" loading="lazy">
                                  <div class="portfolio-overlay">
                                      <div class="portfolio-actions">
                                          <a href="/assets/img/portfolio/portfolio-10.webp" class="glightbox preview-link" data-gallery="portfolio-gallery-graphics"><i class="bi bi-eye"></i></a>
                                          <a href="portfolio-details.html" class="details-link"><i class="bi bi-arrow-right"></i></a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div><!-- End Portfolio Item -->

                      <div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-motion">
                          <div class="portfolio-card">
                              <div class="portfolio-image">
                                  <img src="/assets/img/portfolio/portfolio-7.webp" class="img-fluid" alt="" loading="lazy">
                                  <div class="portfolio-overlay">
                                      <div class="portfolio-actions">
                                          <a href="/assets/img/portfolio/portfolio-7.webp" class="glightbox preview-link" data-gallery="portfolio-gallery-motion"><i class="bi bi-eye"></i></a>
                                          <a href="portfolio-details.html" class="details-link"><i class="bi bi-arrow-right"></i></a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div><!-- End Portfolio Item -->

                      <div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-brand">
                          <div class="portfolio-card">
                              <div class="portfolio-image">
                                  <img src="/assets/img/portfolio/portfolio-4.webp" class="img-fluid" alt="" loading="lazy">
                                  <div class="portfolio-overlay">
                                      <div class="portfolio-actions">
                                          <a href="/assets/img/portfolio/portfolio-4.webp" class="glightbox preview-link" data-gallery="portfolio-gallery-brand"><i class="bi bi-eye"></i></a>
                                          <a href="portfolio-details.html" class="details-link"><i class="bi bi-arrow-right"></i></a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div><!-- End Portfolio Item -->

                      <div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-web">
                          <div class="portfolio-card">
                              <div class="portfolio-image">
                                  <img src="/assets/img/portfolio/portfolio-2.webp" class="img-fluid" alt="" loading="lazy">
                                  <div class="portfolio-overlay">
                                      <div class="portfolio-actions">
                                          <a href="/assets/img/portfolio/portfolio-2.webp" class="glightbox preview-link" data-gallery="portfolio-gallery-web"><i class="bi bi-eye"></i></a>
                                          <a href="portfolio-details.html" class="details-link"><i class="bi bi-arrow-right"></i></a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div><!-- End Portfolio Item -->

                      <div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-graphics">
                          <div class="portfolio-card">
                              <div class="portfolio-image">
                                  <img src="/assets/img/portfolio/portfolio-11.webp" class="img-fluid" alt="" loading="lazy">
                                  <div class="portfolio-overlay">
                                      <div class="portfolio-actions">
                                          <a href="/assets/img/portfolio/portfolio-11.webp" class="glightbox preview-link" data-gallery="portfolio-gallery-graphics"><i class="bi bi-eye"></i></a>
                                          <a href="portfolio-details.html" class="details-link"><i class="bi bi-arrow-right"></i></a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div><!-- End Portfolio Item -->

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
            <path d="M 0,10 C 40,0 60,20 100,10 C 140,0 160,20 200,10" fill="none" stroke="currentColor" stroke-width="2"></path>
          </svg>
        </div>
        <p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur vel illum qui dolorem</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center">
          <div class="col-lg-6 position-relative" data-aos="fade-right" data-aos-delay="200">
            <div class="about-image">
              <img src="/assets/img/profile/profile-square-2.webp" alt="Profile Image" class="img-fluid rounded-4">
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
            <div class="about-content">
              <span class="subtitle">About Me</span>

              <h2>UI/UX Designer &amp; Web Developer</h2>

              <p class="lead mb-4">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>

              <p class="mb-4">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet</p>

              <div class="personal-info">
                <div class="row g-4">
                  <div class="col-6">
                    <div class="info-item">
                      <span class="label">Name</span>
                      <span class="value">Eliot Johnson</span>
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="info-item">
                      <span class="label">Phone</span>
                      <span class="value">+123 456 7890</span>
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="info-item">
                      <span class="label">Age</span>
                      <span class="value">26 Years</span>
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="info-item">
                      <span class="label">Email</span>
                      <span class="value">email@example.com</span>
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="info-item">
                      <span class="label">Occupation</span>
                      <span class="value">Lorem Engineer</span>
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="info-item">
                      <span class="label">Nationality</span>
                      <span class="value">Ipsum</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="signature mt-4">
                <div class="signature-image">
                  <img src="/assets/img/misc/signature-1.webp" alt="" class="img-fluid">
                </div>
                <div class="signature-info">
                  <h4>Eliot Johnson</h4>
                  <p>Adipiscing Elit, Lorem Ipsum</p>
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
        <p>© <span>Copyright</span> <strong class="px-1 sitename">EasyFolio</strong> <span>All Rights Reserved</span></p>
      </div>
      <div class="social-links d-flex justify-content-center">
        <a href=""><i class="bi bi-twitter-x"></i></a>
        <a href=""><i class="bi bi-facebook"></i></a>
        <a href=""><i class="bi bi-instagram"></i></a>
        <a href=""><i class="bi bi-linkedin"></i></a>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
@endsection
