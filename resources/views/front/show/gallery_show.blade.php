<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gallery: {{$title}}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <style>
        .header {
            background: linear-gradient(#0a0f14, #000000, #00000b);
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



        /* تنظیمات تصاویر در اندازه بزرگتر */
        @media (min-width: 1025px) {
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

        /* استایل گالری تصاویر */
        .image-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); /* نمایش در چندین ستون */
            gap: 20px; /* فاصله بین تصاویر */
            justify-items: center; /* ترازبندی تصاویر */
            padding: 20px;
        }

        /* استایل هر کارت تصویر */
        .image-card {
            position: relative;
            width: 100%;
            max-width: 300px;
            border-radius: 15px; /* گوشه‌های گرد */
            overflow: hidden; /* جلوگیری از بیرون زدن محتوا */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* سایه زیبا */
            background-color: #fff; /* پس‌زمینه سفید */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        /* استایل تصویر */
        .responsive-image {
            width: 100%;
            height: auto;
            object-fit: cover;
            display: block;
        }

        /* دکمه‌ها */
        .button-container {
            display: flex;
            justify-content: space-around;
            padding: 10px;
            position: absolute;
            bottom: 10px;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.5); /* پس‌زمینه نیمه‌شفاف */
            border-radius: 0 0 15px 15px;
        }

        button {
            background-color: #4CAF50; /* رنگ دکمه‌ها */
            border: none;
            color: white;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        /* رنگ دکمه‌ها هنگام hover */
        button:hover {
            background-color: #45a049;
        }

        /* دکمه حذف */
        .delete-btn {
            background-color: #f44336; /* رنگ قرمز برای حذف */
        }

        /* تغییر رنگ دکمه حذف هنگام hover */
        .delete-btn:hover {
            background-color: #e53935;
        }

        /* انیمیشن برای بزرگ شدن تصویر هنگام hover */
        .image-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3); /* سایه تیره‌تر */
        }

        /* Image preview in modal */
        .modal-body img {
            width: 100%;
            height: auto;
            max-height: 90vh;  /* Ensure the image doesn't overflow vertically */
        }

        /* Optional: add styles for prev/next buttons */
        .modal-footer button {
            font-size: 18px;
        }



    </style>
</head>
<body dir="ltr">
<header class="header">
    <h3>{{$title}}</h3>
    <nav>
        <a href="{{route('front.index')}}">Home</a>
        @if($user = Auth::user())
            <a href="@if($user->role == true){{route('back.index')}} @else {{route('front.dashboard')}}@endif">{{$user->name}}</a>
        @else
            <a href="{{route('register')}}">sign in/up</a>
        @endif
    </nav>
</header>

<div class="container mt-4">

    <!-- گالری -->

    <div class="image-gallery">

        @foreach($images as $image)

            <div class="image-card"  data-bs-toggle="modal" data-bs-target="#imageModal">

                <img src="{{$image['url']}}" alt="Gallery Image" class="responsive-image" onclick="openImageModal('{{$image['url']}}')">

                @if(Auth::user() and Auth::user()->role == true)
                    <div class="button-container">
                        <button class="update-btn"><a style="text-decoration: none; color:#fff;" href="{{route('gallery.edit.image', $image['id'])}}">update</a></button>
                        <button class="delete-btn"><a style="text-decoration:none; color:#fff;" href="{{route('gallery.destroy.image', $image['id'])}}">delete</a></button>
                    </div>
                @endif

            </div>

        @endforeach
        <!-- می‌توانید تعداد دلخواه از عکس‌ها رو اضافه کنید -->
    </div>


    <!-- توضیحات گالری -->
    <div class="description-section mt-4">
        <h4>{{$title}}</h4>
        <p>{{$description}}</p>

        @if(session('error') != null)
            @php
                $error = session('error')
            @endphp
        @endif

        <p><a href="{{route('like',$id)}}" class="@if(session('error') != null and $error['error'] !== 'You’ve already liked this gallery.') {{'bi bi-heart-fill'}} @else {{"bi bi-heart"}} @endif"></a> {{$likes_count}}</p>

        @if(session('error') != null)
            <p style="font-size:15px; color:#000;">{{$error['error']}}</p>
        @endif

    </div>

    <!-- Modal for image preview -->
    <div class="modal" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="modalImage" src="" alt="" class="img-fluid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="prevImage">before</button>
                    <button type="button" class="btn btn-secondary" id="nextImage">after</button>
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
                            <small class="reply-btn text-primary" data-id="{{ $comment['id'] }}" data-name="{{$comment['name']}}">Reply</small>
                            <span class="dots">• • •</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <!-- Comment form -->
    <div class="card p-3 mt-4 border-0 shadow-sm rounded" style="max-width: 700px; margin: auto;">
        <h5 class="mb-3">What do you think?</h5>
        <form method="POST" action="{{ route('comment.store') }}">
            @csrf
            <input type="hidden" name="reply_id" id="reply_id" value="">
            <input type="hidden" name="id" value="{{$id}}">
            <input type="hidden" name="type" value="gallery">
            <input type="text" id="reply" style="border:none; outline:none; background-color:#1e1e2f; color:#fff; margin:5px;" disabled>
            <label style=" margin:5px;"><button style="background-color:transparent; font-size:18px;  outline:none; color:red; border:none;" onclick="destroy()" type="button">Cancel</button></label>
            <textarea name="text" class="form-control mb-2" id="comment-text" placeholder="Write a comment…" rows="3"></textarea>
            <button type="submit" class="btn btn-primary" style="width: 20%;">Send</button>
        </form>
    </div>

    <div class="footer">
        <p>Created by <a href="https://github.com/{{'ilghar2009'}}" target="_blank">ilghar</a></p>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0-alpha1/js/bootstrap.bundle.min.js"></script>

    <script>
        function openImageModal(imageUrl) {
            var modalImage = document.getElementById('modalImage');
            modalImage.src = imageUrl;

            let currentImageIndex = 0;
            let images = @json($images); // آرایه‌ای از URL تصاویر از PHP

            function openImageModal(imageUrl) {
                const modalImage = document.getElementById('modalImage');
                modalImage.src = imageUrl;

                // پیدا کردن ایندکس تصویر در آرایه
                currentImageIndex = images.findIndex(image => image.url === imageUrl);
            }

            document.getElementById('prevImage').addEventListener('click', () => {
                if (currentImageIndex > 0) {
                    currentImageIndex--;
                    const prevImageUrl = images[currentImageIndex].url;
                    document.getElementById('modalImage').src = prevImageUrl;
                }
            });

            document.getElementById('nextImage').addEventListener('click', () => {
                if (currentImageIndex < images.length - 1) {
                    currentImageIndex++;
                    const nextImageUrl = images[currentImageIndex].url;
                    document.getElementById('modalImage').src = nextImageUrl;
                }
            });

        }
    </script>


    <script>
        let currentImageIndex = 0;
        const images = document.querySelectorAll('.gallery-image');
        const modalImage = document.getElementById('modalImage');
        const imageModal = new bootstrap.Modal(document.getElementById('imageModal'));
        const prevButton = document.getElementById('prevImage');
        const nextButton = document.getElementById('nextImage');

        // Open modal and show clicked image
        images.forEach((image, index) => {
            image.addEventListener('click', () => {
                currentImageIndex = index;
                modalImage.src = image.src;
                imageModal.show();
            });
        });


        // Function to change image (previous and next)
        prevButton.addEventListener('click', () => {
            currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
            modalImage.src = images[currentImageIndex].src;
        });

        nextButton.addEventListener('click', () => {
            currentImageIndex = (currentImageIndex + 1) % images.length;
            modalImage.src = images[currentImageIndex].src;
        });


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
