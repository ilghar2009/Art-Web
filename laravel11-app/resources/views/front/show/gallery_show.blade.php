<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> گالری {{$title}}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: center;
        }
        .gallery-item {
            position: relative;
            max-width: 600px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }
        .gallery-item img {
            width: 100%;
            height: auto;
            display: block;
        }
    </style>
{{--  comment  --}}
    <style>
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
        }
        textarea::placeholder {
            color: #bbb;
        }
        button {
            background: linear-gradient(45deg, #4e54c8, #8f94fb);
            border: none;
            padding: 8px 16px;
            font-weight: bold;
            border-radius: 6px;
            transition: background 0.3s ease-in-out, transform 0.2s ease-in-out;
            width: auto;
        }
        button:hover {
            background: linear-gradient(45deg, #8f94fb, #4e54c8);
            transform: scale(1.05);
        }
        .card p {
            color: #ddd;
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
    <div class="gallery-container">
        @foreach($images as $image)
            <div class="gallery-item">
                <img src="{{$image['url']}}" alt="Gallery Image">
                @if($user?->role)
                    <div class="gallery-actions text-center mt-2">
                        <h5>@if($image['role']) اصلی @else فرعی @endif</h5>
                        <a class="btn btn-danger" href="{{route('gallery.destroy.image', $image['id'])}}">حذف</a>
                        <a class="btn btn-success" href="{{route('gallery.edit.image', $image['id'])}}">ویرایش</a>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>

<div style="width:80%; text-align:center; background-color:#000; margin:10px auto; border-radius:25px; color:#fff; padding:15px;">
    <p style="text-align: justify; padding:10px; font-size:1.1em; line-height:1.6;">{{$description}}</p>
    <a href="{{route('like',$id)}}" style="color:#fff; text-decoration:none; font-weight:bold; display:block; margin-top:10px;">
        ❤️ {{$likes_count}} نفر این گالری را دوست داشتند
    </a>
    @if($error = session('error'))
        <p style="color:darkred">{{$error['error']}}</p>
    @endif
</div>

@if(isset($comments))
    <div class="comments-section mt-4">
        @foreach($comments as $comment)
            <div class="card p-3 mt-3 shadow-sm border-0 rounded">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="user d-flex flex-row align-items-center">
                        <span>
                            <small class="font-weight-bold text-primary">{{$comment['name']}}</small>
                            @if(isset($comment['reply']))
                                @php
                                    $reply = $comment['reply'];
                                @endphp
                                <small class="font-weight-bold text-secondary"> ➜ {{$reply['name']??null}}</small>
                            @endif
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
                    <div class="icons align-items-center text-warning">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-check-circle-o check-icon"></i>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

<div class="card p-3 mt-4 border-0 shadow-sm rounded" style="max-width: 700px; margin: auto; margin-bottom: 10px;">
    <h5 class="mb-3">چطور فکر می‌کنید؟</h5>
    <form method="POST" action="{{ route('comment.store') }}">
        @csrf
        <input type="hidden" name="reply_id" id="reply_id" value="">
        <input type="hidden" name="id" value="{{$id}}">
        <input type="hidden" name="type" value="gallery">
        <textarea name="text" class="form-control mb-2" id="comment-text" placeholder="نظر شما برای ما بسیار ارزشمند است." rows="3"></textarea>
        <button type="submit" class="btn btn-primary">ارسال</button>
    </form>
</div>

<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" class="img-fluid" style="max-height: 80vh;">
            </div>
            <div class="modal-footer justify-content-between">
                <button class="btn btn-secondary" id="prevImage">قبلی</button>
                <button class="btn btn-secondary" id="nextImage">بعدی</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let images = [];
        let currentIndex = 0;

        document.querySelectorAll(".gallery-item img").forEach((img, index) => {
            images.push(img.src);
            img.addEventListener("click", function () {
                currentIndex = index;
                document.getElementById("modalImage").src = images[currentIndex];
                let modal = new bootstrap.Modal(document.getElementById("imageModal"));
                modal.show();
            });
        });

        document.getElementById("prevImage").addEventListener("click", function () {
            if (currentIndex > 0) {
                currentIndex--;
                document.getElementById("modalImage").src = images[currentIndex];
            }
        });

        document.getElementById("nextImage").addEventListener("click", function () {
            if (currentIndex < images.length - 1) {
                currentIndex++;
                document.getElementById("modalImage").src = images[currentIndex];
            }
        });
    });
</script>
{{--comments--}}
<script>
    document.querySelectorAll('.reply-btn').forEach(button => {
        button.addEventListener('click', function() {
            let replyId = this.getAttribute('data-id');
            let replyName = this.getAttribute('data-name');
            document.getElementById('reply_id').value = replyId;
            let commentText = document.getElementById('comment-text');
            commentText.value = `@${replyName} `;
            commentText.focus();
        });
    });
</script>
</body>
</html>
