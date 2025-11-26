<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ثبت نام</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/assets/img/favicon.png" rel="icon">
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <style>
    @font-face {
      font-family: "parastoo";
      src: url("/assets/fonts/parastoo-font-v1.0.0-alpha5/web/Farsi-Digits/Parastoo-Bold-FD.woff") format("woff"),
      url("/assets/fonts/parastoo-font-v1.0.0-alpha5/web/Farsi-Digits/Parastoo-Bold-FD.ttf") format("truetype");
      font-weight: normal;
      font-style: normal;
    }
    body{
      font-family: 'parastoo', sans-serif !important;
    }


    li{
      color:darkred;
    }

  </style>
</head>

<body dir="rtl">

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">ساخت اکانت جدید</h5>
                    <p class="text-center small">مشخصات شخصی خود را برای ایجاد حساب وارد کنید:</p>
                  </div>

                  <form class="row g-3 needs-validation" action="{{route('back.register')}}" method="post">

                    @csrf

                    <div class="col-12">
                      <label for="yourName" class="form-label">نام</label>
                      <input type="text" name="name" class="form-control" id="yourName" value="{{old('name')}}" required>
                      <div class="invalid-feedback">لطفا نام خود را وارد کنید.</div>

                      @error('name')
                        <li>{{$message}}</li>
                      @enderror

                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">ایمیل</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" value="{{old('email')}}" required>
                      <div class="invalid-feedback">لطفا آدرس ایمیل خود را وارد کنید</div>

                      @error('email')
                        <li>{{$message}}</li>
                      @enderror

                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">رمز عبور</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">رمز عبور خود را وارد کنید</div>

                      @error('password')
                        <li>{{$message}}</li>
                      @enderror

                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">ثبت نام</button>
                    </div>

                    <div class="col-12">
                      <p class="small mb-0">در حال حاضر یک حساب کاربری دارید؟<a href="{{route('login')}}" style="text-decoration: none;">ورود</a></p>
                      <p><a href="{{route('front.index')}}" style="color:#000; text-decoration: none;">صفحه اصلی</a></p>
                    </div>

                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>

      </section>

    </div>

  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="/assets/vendor/echarts/echarts.min.js"></script>
  <script src="/assets/vendor/quill/quill.js"></script>
  <script src="/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>

</body>

</html>