
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gallery {{$title}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
    <meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
    <meta name="author" content="FREEHTML5.CO" />
{{--    comment  --}}
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
        <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

        <style>::-webkit-scrollbar {
                width: 8px;
            }
            /* Track */
            ::-webkit-scrollbar-track {
                background: #f1f1f1;
            }

            /* Handle */
            ::-webkit-scrollbar-thumb {
                background: #888;
            }

            /* Handle on hover */
            ::-webkit-scrollbar-thumb:hover {
                background: #555;
            } body {
                  background-color: #f7f6f6
              }

            .card {

                border: none;
                box-shadow: 5px 6px 6px 2px #e9ecef;
                border-radius: 4px;
            }


            .dots{

                height: 4px;
                width: 4px;
                margin-bottom: 2px;
                background-color: #bbb;
                border-radius: 50%;
                display: inline-block;
            }

            .badge{

                padding: 7px;
                padding-right: 9px;
                padding-left: 16px;
                box-shadow: 5px 6px 6px 2px #e9ecef;
            }

            .user-img{

                margin-top: 4px;
            }

            .check-icon{

                font-size: 17px;
                color: #c3bfbf;
                top: 1px;
                position: relative;
                margin-left: 3px;
            }

            .form-check-input{
                margin-top: 6px;
                margin-left: -24px !important;
                cursor: pointer;
            }


            .form-check-input:focus{
                box-shadow: none;
            }


            .icons i{

                margin-left: 8px;
            }
            .reply{

                margin-left: 12px;
            }

            .reply small{

                color: #b7b4b4;

            }


            .reply small:hover{

                color: green;
                cursor: pointer;

            }</style>
    <!--
      //////////////////////////////////////////////////////

      FREE HTML5 TEMPLATE
      DESIGNED & DEVELOPED by FREEHTML5.CO

      Website: 		http://freehtml5.co/
      Email: 			info@freehtml5.co
      Twitter: 		http://twitter.com/fh5co
      Facebook: 		https://www.facebook.com/fh5co

      //////////////////////////////////////////////////////
                   -->

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="favicon.ico">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700,900' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="/assets/css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="/assets/css/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <!-- Superfish -->
    <link rel="stylesheet" href="/assets/css/superfish.css">
    <!-- Flexslider  -->
    <link rel="stylesheet" href="/assets/css/flexslider.css">

    <link rel="stylesheet" href="/assets/css/style.css">

{{--    comment css & script      --}}


    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>


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
    </style>

    <!-- Modernizr JS -->
    <script src="/assets/js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="/assets/js/respond.min.js"></script>
    <![endif]-->

</head>

<body className='snippet-body'>

    <header id="fh5co-header" role="banner">
        <div class="container text-center">
            <div id="fh5co-logo">
                <h3>{{$title}}</h3>
            </div>
            <nav>
                <ul>
                    <li><a style="text-decoration: none" href="{{route('front.index')}}">خانه</a></li>
                    @if($user = \Illuminate\Support\Facades\Auth::user())
                        <li><a style="text-decoration: none" href="@if($user->role == true){{route('back.index')}} @endif">{{$user->name}}</a></li>
                    @else
                        <li><a style="text-decoration: none" href="{{route('register')}}">ورود / ثبت نام</a></li>
                    @endif
                </ul>
            </nav>
        </div>
    </header>
<!-- END #fh5co-header -->


    <div class="container-fluid pt70 pb70">
        <div id="fh5co-projects-feed" class="fh5co-projects-feed clearfix masonry">

            @foreach($images as $image)
                <div class="fh5co-project masonry-brick">
                    <a>
                        <img src="{{$image['url']}}" alt="Free HTML5 by FreeHTML5.co" style="max-width:500px; max-height:500px;">
                        @if($user?->role ==  true)
                            <h2  style="text-decoration: none; font-size:18px;">@if($image['role'] == true){{'اصلی'}} @else{{'فرعی'}} @endif</h2>

                            <a class="btn btn-danger" href="{{route('gallery.destroy.image', $image['id'])}}">Delete</a>
                            <a class="btn btn-success" style="margin-top:5px;" href="{{route('gallery.edit.image', $image['id'])}}">Update</a>
                        @endif
                    </a>
                </div>
            @endforeach

    <!--END .fh5co-projects-feed-->
        </div>

{{--    comment    --}}
        @if(isset($comments))
            @foreach($comments as $comment)
            <div class="card p-3">

                <div class="d-flex justify-content-between align-items-center">

                    <div class="user d-flex flex-row align-items-center">

                        <span>
                            <small class="font-weight-bold text-primary">{{$comment['name']}}</small>
                                @if($comment['reply'])
                                    <small class="font-weight-bold text-primary">{{$comment['reply']}}</small>
                                @endif
                            <small class="font-weight-bold">{{$comment->description}}</small>
                        </span>

                    </div>

                </div>


                <div class="action d-flex justify-content-between mt-2 align-items-center">

                    <div class="reply px-4">
                        <span class="dots"></span>
                        <small  class="reply-btn" data-id="{{ $comment->id }}" style="cursor: pointer; color: blue;">Reply</small>
                        <span class="dots"></span>
                    </div>

                    <div class="icons align-items-center">

                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-check-circle-o check-icon"></i>

                    </div>

                </div>

            </div>
        @endforeach
        @endif

        <div class="card p-3 mt-4" style="direction: rtl;">

            <h5>چه فکری می‌کنید؟</h5>

            <form method="POST" action="{{ route('comment.store') }}">
                @csrf
                <!-- فیلد مخفی برای ریپلای -->
                <input type="hidden" name="reply_id" id="reply_id" value="">
                <input type="hidden" name="gallery_id" value="{{$id}}">
                <input type="hidden" name="type" value="gallery">

                <textarea name="text" class="form-control mb-2" placeholder=" اینجا بنویسید..." value="{{old('text')}}}"></textarea>
                <button type="submit" class="btn btn-primary">ارسال</button>
            </form>

        </div>

    </div>
<!-- END .container-fluid -->

    <footer id="fh5co-footer" role="contentinfo">
        <div class="container-fluid">
            <div class="footer-content">
                <div class="copyright"><small>&copy; 2025 Present. All Rights Reserved. <br> <a href="https:/https://github.com/ilghar2009/">Ilghar Ebrahimi . IRE .</a> </small></div>
                <div class="social">
                    <a href="#"><i class="icon-facebook3"></i></a>
                    <a href="#"><i class="icon-instagram2"></i></a>
                    <a href="#"><i class="icon-linkedin2"></i></a>
                </div>
            </div>
        </div>
    </footer>
<!-- END #fh5co-footer -->

<!-- jQuery -->
    <script src="/assets/js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/assets/js/bootstrap.min.js"></script>
    <!-- masonry -->
    <script src="/assets/js/jquery.masonry.min.js"></script>
    <!-- MAIN JS -->
    <script src="/assets/js/main.js"></script>

        <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
        <script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');
            myLink.addEventListener('click', function(e) {
                e.preventDefault();
            });
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                document.querySelectorAll('.reply-btn').forEach(button => {
                    button.addEventListener('click', function () {
                        let commentId = this.getAttribute('data-id');
                        // وقتی روی ریپلای کلیک شد، آیدی کامنت به فیلد مخفی داده می‌شود
                        document.getElementById('reply_id').value = commentId;
                    });
                });
            });
        </script>

    </body>
</html>

