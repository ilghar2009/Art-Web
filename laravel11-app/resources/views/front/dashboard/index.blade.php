<!doctype html>
<html lang="fa">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>داشبورد کاربران</title>
        <meta name="description" content="">
        <meta name="keywords" content="">

        <!-- Favicons -->

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- plugins:css -->
        <link rel="stylesheet" href="/assets/vendors/feather/feather.css">
        <link rel="stylesheet" href="/assets/vendors/ti-icons/css/themify-icons.css">
        <link rel="stylesheet" href="/assets/vendors/css/vendor.bundle.base.css">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
        <link rel="stylesheet" href="/assets/vendors/ti-icons/css/themify-icons.css">
        <link rel="stylesheet" type="text/css" href="/assets/js/select.dataTables.min.css">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="/assets/css/vertical-layout-light/style.css">
        <!-- endinject -->
        <link rel="shortcut icon" href="/assets/images/favicon.png" />


        {{--new--}}
        <!-- endinject -->
        <!-- Plugin css for gallery.create or edit page -->
        <link rel="stylesheet" href="/assets/vendors/select2/select2.min.css">
        <link rel="stylesheet" href="/assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">


{{--        fonts--}}

        <link rel="stylesheet" href="/assets/fonts/Vazirmatn-font-face">
        <link rel="stylesheet" href="/assets/fonts/Vazirmatn-Variable-font-face.css">

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

            .error{
                color:darkred;
                padding:5px 0 0 0;
            }
        </style>

    </head>

    <body dir="ltr">
        <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">

            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="{{route('front.index')}}">خانه</a>
                <a class="navbar-brand brand-logo-mini" href="{{route('front.index')}}"><img src="/assets/images/logo-mini.svg" alt="logo"/></a>
            </div>

            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">

                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>

                <ul class="navbar-nav mr-lg-2">

                    <li class="nav-item nav-search d-none d-lg-block">

                        <div class="input-group">

                            <div class="input-group-prepend hover-cursor" id="navbar-search-icon">

                                <span class="input-group-text" id="search">
                                  <i class="icon-search"></i>
                                </span>

                            </div>

                            <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">

                        </div>
                    </li>
                </ul>

                <ul class="navbar-nav navbar-nav-right">

                    <li class="nav-item nav-profile dropdown">

                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            @if(Auth::user()?->image)
                                <img src="{{Auth::user()?->image}}" alt="profile" style="width: 48px; height: 48px; border-radius: 50%; object-fit: cover;"/>
                            @else
                                <i class="ti-user"></i>
                            @endif
                        </a>

                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">

                            <a class="dropdown-item" href="{{route('logout')}}">
                                <i class="ti-power-off text-primary"></i>
                                خروج از اکانت
                            </a>

                        </div>

                    </li>

                </ul>

                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>

            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <div class="theme-setting-wrapper">
                <div id="settings-trigger"><i class="ti-settings"></i></div>

                <div id="theme-settings" class="settings-panel">

                    <i class="settings-close ti-close"></i>

                    <p class="settings-heading">SIDEBAR SKINS</p>

                    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                        <div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>

                    <p class="settings-heading mt-2">HEADER SKINS</p>

                    <div class="color-tiles mx-0 px-4">
                        <div class="tiles success"></div>
                        <div class="tiles warning"></div>
                        <div class="tiles danger"></div>
                        <div class="tiles info"></div>
                        <div class="tiles dark"></div>
                        <div class="tiles default"></div>
                    </div>

                </div>
            </div>

            <div id="right-sidebar" class="settings-panel">

                <i class="settings-close ti-close"></i>

                <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">

                    <li class="nav-item">
                        <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
                    </li>

                </ul>

                <div class="tab-content" id="setting-content">
                    <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
                        <div class="add-items d-flex px-3 mb-0">
                            <form class="form w-100">
                                <div class="form-group d-flex">
                                    <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                                    <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                                </div>
                            </form>
                        </div>

                        <div class="list-wrapper px-3">
                            <ul class="d-flex flex-column-reverse todo-list">

                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Team review meeting at 3.00 PM
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>

                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Prepare for presentation
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>

                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Resolve all the low priority tickets due today
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>

                                <li class="completed">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" checked>
                                            Schedule meeting for next week
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>

                                <li class="completed">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" checked>
                                            Project review
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>

                            </ul>
                        </div>

                        <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>

                        <div class="events pt-4 px-3">
                            <div class="wrapper d-flex mb-2">
                                <i class="ti-control-record text-primary mr-2"></i>
                                <span>Feb 11 2018</span>
                            </div>
                            <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
                            <p class="text-gray mb-0">The total number of sessions</p>
                        </div>

                        <div class="events pt-4 px-3">
                            <div class="wrapper d-flex mb-2">
                                <i class="ti-control-record text-primary mr-2"></i>
                                <span>Feb 7 2018</span>
                            </div>
                            <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
                            <p class="text-gray mb-0 ">Call Sarah Graves</p>
                        </div>
                    </div>
                    <!-- To do section tab ends -->
                    <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                        <div class="d-flex align-items-center justify-content-between border-bottom">
                            <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
                            <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
                        </div>
                        <ul class="chat-list">
                            <li class="list active">
                                <div class="profile"><img src="/assets/images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                                <div class="info">
                                    <p>Thomas Douglas</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">19 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="/assets/images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                                <div class="info">
                                    <div class="wrapper d-flex">
                                        <p>Catherine</p>
                                    </div>
                                    <p>Away</p>
                                </div>
                                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                                <small class="text-muted my-auto">23 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="/assets/images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                                <div class="info">
                                    <p>Daniel Russell</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">14 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="/assets/images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                                <div class="info">
                                    <p>James Richardson</p>
                                    <p>Away</p>
                                </div>
                                <small class="text-muted my-auto">2 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="/assets/images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                                <div class="info">
                                    <p>Madeline Kennedy</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">5 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="/assets/images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                                <div class="info">
                                    <p>Sarah Graves</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">47 min</small>
                            </li>
                        </ul>
                    </div>
                    <!-- chat tab ends -->
                </div>
            </div>
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('front.dashboard')}}">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">داشبورد</span>
                        </a>
                    </li>

{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="{{route('front.reply')}}">--}}
{{--                            <i class="icon-paper menu-icon"></i>--}}
{{--                            <span class="menu-title">پاسخ ها</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">

                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">اطلاعات شما</h4>
                            <p class="card-description">
                                میتوانید آن ها را تغییر دهید.
                            </p>
                            <form class="forms-sample" action="{{route('user.update', Auth::user()->user_id)}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="exampleInputName1">نام</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name" disabled value="{{old('name')??Auth::user()->name}}">
                                    @error('name')
                                        <p class="error">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail3">ایمیل</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail3" placeholder="Email" value="{{old('email')??Auth::user()->email}}" disabled>

                                    @error('email')
                                        <p class="error">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword4">رمز</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword4" placeholder="Password" value="{{old('password')}}" disabled>

                                    @error('password')
                                        <p class="error">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>عکس پروفایل</label>
                                    <input type="file" name="image" class="file-upload-default" disabled>
                                    <div class="input-group col-xs-12">
                                        <input type="text" name="image" class="form-control file-upload-info" id="disabled" disabled placeholder="Upload Image" value="{{old('image')}}">
                                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>

                                        @error('image')
                                            <p class="error">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <button class="btn btn-light"  id="editButton" type="button">تغییر اطلاعات</button>
                                <button type="submit" class="btn btn-primary mr-2">ثبت</button>
                                <button class="btn btn-light">لغو</button>

                                @if(Auth::user()->image !== null)
                                    <a id="editButton" href="{{route('delete.profile')}}">حذف پروفایل</a>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>

                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">© 2025 [نام سایت مشتری] | طراحی و توسعه توسط ایلقار (ErixLar)</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- Plugin js for this page -->

        <!-- plugins:js -->
        <script src="/assets/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="/assets/vendors/chart.js/Chart.min.js"></script>
        <script src="/assets/vendors/datatables.net/jquery.dataTables.js"></script>
        <script src="/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
        <script src="/assets/js/dataTables.select.min.js"></script>

        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="/assets/js/off-canvas.js"></script>
        <script src="/assets/js/hoverable-collapse.js"></script>
        <script src="/assets/js/template.js"></script>
        <script src="/assets/js/settings.js"></script>
        <script src="/assets/js/todolist.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="/assets/js/dashboard.js"></script>
        <script src="/assets/js/Chart.roundedBarCharts.js"></script>


        <script src="/assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
        <script src="/assets/vendors/select2/select2.min.js"></script>

        <!-- Custom js for this page-->
        <script src="/assets/js/file-upload.js"></script>
        <script src="/assets/js/typeahead.js"></script>
        <script src="/assets/js/select2.js"></script>
        <!-- End custom js for this page-->
            <script>
                document.getElementById('editButton').addEventListener('click', function() {
                    document.querySelectorAll('input').forEach(function(input) {
                        if (input.id !== 'disabled') {  // به جز این یکی
                            input.disabled = false;
                        }
                    });
                });

            </script>
    </body>

</html>