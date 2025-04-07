<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>گالری {{$title}}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <style>
        .header {
            background: linear-gradient(135deg, #6c7ae0, #4a56e2);
            color: white;
            text-align: center;
            padding: 20px 0;
            font-family: 'Georgia', serif;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .header a {
            color: white;
            text-decoration: none;
            padding: 5px;
        }

        .header a:hover {
            color: rgba(255, 255, 255, 0.79);
            transition: 1s;
        }

        .gallery-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 15px;
            justify-content: center;
            padding: 20px;
        }

        .gallery-item {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            background: white;
            padding: 10px;
            transition: transform 0.2s ease-in-out;
        }

        .gallery-item img {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 10px;
            transition: transform 0.2s ease-in-out;
        }

        .gallery-item img:hover {
            transform: scale(1.1);
        }

        .gallery-item:hover {
            transform: scale(1.05);
        }

        /* Modal for large image display */
        .modal-body img {
            width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
            border-radius: 10px;
        }

        /* Comments Section */
        .comments-section {
            max-width: 750px;
            margin: auto;
        }

        .card {
            background: #1e1e2f;
            color: #fff;
            border-radius: 12px;
            padding: 15px;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            margin-bottom: 10px;
        }

        .card:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.1);
        }

        .user small {
            font-size: 14px;
            font-weight: bold;
        }

        .reply-btn {
            cursor: pointer;
            font-weight: bold;
            transition: color 0.2s ease-in-out;
        }

        .reply-btn:hover {
            color: #00d4ff;
        }

        .icons i {
            margin-left: 5px;
            cursor: pointer;
            transition: transform 0.2s ease-in-out;
        }

        .icons i:hover {
            transform: scale(1.2);
            color: #ffdd57;
        }

        textarea {
            background: #2a2a3b;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
            min-height: 80px;
            resize: vertical;
        }

        textarea::placeholder {
            color: #bbb;
        }

        .card p {
            color: #ddd;
        }

        .description-section {
            max-width: 750px;
            margin: auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            margin-top: 30px;
        }

        /* ریسپانسیو برای موبایل */
        @media (max-width: 767px) {
            .gallery-container {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                gap: 10px;
            }

            .gallery-item {
                padding: 5px;
            }

            .comments-section {
                padding: 10px;
            }

            .footer {
                font-size: 14px;
            }

            .comment-form input, .comment-form textarea {
                width: 100%;
            }

            .description-section {
                padding: 15px;
            }
        }

        /* ریسپانسیو برای تبلت */
        @media (max-width: 1024px) {
            .gallery-container {
                grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
                gap: 12px;
            }

            .comment-form input, .comment-form textarea {
                width: 100%;
            }

            .description-section {
                padding: 18px;
            }
        }

        /* نمایش بزرگتر عکس‌ها در سایزهای بزرگتر */
        @media (min-width: 1025px) {
            .gallery-item img {
                width: 100%;
                height: 400px; /* تغییر اندازه برای نمایش بزرگتر */
                object-fit: cover;
            }
        }

        /* فوتر زیبا */
        .footer {
            background-color: #343a40;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            margin-top: 30px;
            font-size: 16px;
            border-radius: 8px;
        }

        .footer a {
            color: #00d4ff;
            text-decoration: none;
        }

        .footer a:hover {
            color: #ffdd57;
        }

        .gallery-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); /* برای نمایش تعداد مناسب ستون‌ها */
            gap: 15px;
            justify-content: center;
            padding: 20px;
        }

        /* تنظیمات تصاویر در اندازه بزرگتر */
        @media (min-width: 1025px) {
            .gallery-container {
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); /* تعداد ستون‌ها را برای صفحات بزرگتر افزایش می‌دهیم */
            }
            .gallery-item img {
                width: 100%;
                max-height: 400px; /* حداکثر ارتفاع تصاویر */
                object-fit: contain; /* اجازه می‌دهد تصویر به‌درستی در کادر نمایش داده شود */
            }
        }
        #comment-text{
            color:#fff;
            background-color:#2a2a3b;
            outline:none;
            border:none;
            margin-bottom:10px;
        }
        #comment-text:hover{
            border:1px solid #fff;
        }
        #comment-text::placeholder{
            color:#fff
        }

        .box:hover {
            box-shadow:5px 5px 5px #000000ba;
        }

        .box{
            margin:auto;
            margin-bottom:5px;
        }

    </style>
</head>
<body dir="rtl">
<header class="header">
    <h3>{{$title}}</h3>
    <nav>
        <a href="{{route('front.index')}}">خانه</a>
        @if($user = Auth::user())
            <a href="@if($user->role){{route('back.index')}}@endif">{{$user->name}}</a>
        @else
            <a href="{{route('register')}}">ورود / ثبت نام</a>
        @endif
    </nav>
</header>

<div class="container mt-4">

    <!-- گالری -->
    <div class="gallery-container mt-4">
        @foreach($images as $image)
            <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#imageModal" onclick="openImageModal('{{$image['url']}}')">
                <img src="{{$image['url']}}" alt="Gallery Image">
                @if(Auth::user()?->role == true)
                    <a class="box"  style="padding:10px; text-decoration:none; color:#fff; background-color:red; border-radius:15px;"
                        href="{{route('gallery.destroy.image', $image['id'])}}"
                    >
                        حذف
                    </a>

                    <a class="box" style="padding:10px; text-decoration:none; color:#fff; background-color:#28ed28; border-radius:15px;"
                        href="{{route('gallery.edit.image', $image['id'])}}"
                    >
                        بروزرسانی
                    </a>
                @endif
            </div>
        @endforeach
    </div>

    <!-- توضیحات گالری -->
    <div class="description-section mt-4">
        <h4>توضیحات گالری</h4>
        <p>در این گالری شما می‌توانید به مجموعه‌ای از نقاشی‌ها و هنرهای دستی مختلف نگاه کنید. هر تصویر داستانی خاص را روایت می‌کند و ما خوشحالیم که شما در این سفر هنری همراه ما هستید.</p>
        <p><a href="{{route('like',$id)}}" class="bi bi-heart"></a> {{$likes_count}}</p>
        @if(session('error') != null)
            @php $error = session('error') @endphp
            <p style="font-size:15px; color:#000;">{{$error['error']}}</p>
        @endif
    </div>

    <!-- Modal for image preview -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="" id="modalImage" alt="Large Image">
                    <div class="mt-2">
                        <button class="btn btn-secondary" id="prevImage" onclick="showPrevImage()">قبلی</button>
                        <button class="btn btn-secondary" id="nextImage" onclick="showNextImage()">بعدی</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(isset($comments))
        <!-- بخش نظرات -->
        <div class="comments-section mt-4">
            @foreach($comments as $comment)
                <div class="card p-3 mt-3 shadow-sm border-0 rounded">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="user d-flex flex-row align-items-center">
                    <span>

                        <small class="font-weight-bold text-primary">
                            {{
                                $comment['name']
                            }}

                                @if(isset($comment['reply']))
                                    @php $reply = $comment['reply']  @endphp

                                    @if(isset($reply['reply_name']))
                                        {{'@' . $reply['reply_name']}}
                                   @endif
                               @endif
                        </small>

                        <p class="m-0">{{$comment['text']}}</p>
                    </span>
                        </div>
                    </div>
                    <div class="action d-flex justify-content-between mt-2 align-items-center">
                        <div class="reply px-4">
                            <span class="dots">• • •</span>
                            <small class="reply-btn text-primary" data-id="{{ $comment['id'] }}" data-name="{{$comment['name']}}">پاسخ</small>
                            <span class="dots">• • •</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <!-- Comment form -->
    <div class="card p-3 mt-4 border-0 shadow-sm rounded" style="max-width: 700px; margin: auto;">
        <h5 class="mb-3">چطور فکر می‌کنید؟</h5>
        <form method="POST" action="{{ route('comment.store') }}">
            @csrf
            <input type="hidden" name="reply_id" id="reply_id" value="">
            <input type="hidden" name="id" value="{{$id}}">
            <input type="hidden" name="type" value="gallery">
            <input type="text" id="reply" style="border:none; outline:none; background-color:#1e1e2f; color:#fff; margin:5px;" disabled>
            <label style=" margin:5px;"><button style="background-color:transparent; font-size:18px;  outline:none; color:red; border:none;" onclick="destroy()" type="button">لغو</button></label>
            <textarea name="text" class="form-control mb-2" id="comment-text" placeholder="نظر شما برای ما بسیار ارزشمند است." rows="3"></textarea>
            <button type="submit" class="btn btn-primary" style="width: 20%;">ارسال</button>
        </form>
    </div>

    <div class="footer">
        <p>ساخته شده توسط <a href="https://github.com/{{'ilghar2009'}}" target="_blank">ایلقار ابراهیمی</a></p>
    </div>
</div>

    <script>
        let currentImageIndex = 0;
        let images = [];  // آرایه‌ای برای نگهداری URL تصاویر

        document.querySelectorAll('.gallery-item img').forEach((img, index) => {
            images.push(img.src);  // URL تمام تصاویر را در آرایه ذخیره می‌کنیم
            img.addEventListener('click', () => {
                currentImageIndex = index;  // ذخیره شماره تصویر
                showImageModal(images[currentImageIndex]);
            });
        });

        function openImageModal(imageUrl) {
            document.getElementById('modalImage').src = imageUrl;
        }

        function showPrevImage() {
            if (currentImageIndex > 0) {
                currentImageIndex--;
            } else {
                currentImageIndex = images.length - 1;
            }
            openImageModal(images[currentImageIndex]);
        }

        function showNextImage() {
            if (currentImageIndex < images.length - 1) {
                currentImageIndex++;
            } else {
                currentImageIndex = 0;
            }
            openImageModal(images[currentImageIndex]);
        }
    </script>

    <script>
        document.querySelectorAll('.reply-btn').forEach(button => {
            button.addEventListener('click', function() {
                let replyId = this.getAttribute('data-id');
                let replyName = this.getAttribute('data-name');
                document.getElementById('reply_id').value = replyId;
                let commentText = document.getElementById('reply');
                commentText.value = `@${replyName} `;
                commentText.focus();
            });
        });
    </script>

    <script>
        function destroy(){
            document.getElementById('reply_id').value = null;
            let commentText = document.getElementById('reply');
            commentText.value = "";
        }
    </script>

</body>
</html>
