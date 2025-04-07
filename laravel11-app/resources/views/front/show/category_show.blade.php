<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>{{$title}} دسته‌بندی</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            direction: rtl;
            text-align: right;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            width: 80%;
            margin: auto;
        }
        .header {
            background: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
            font-size: 26px;
            position: relative;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            border-bottom: 2px solid #444;
        }
        .header a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-size: 18px;
            font-weight: bold;
        }
        .header a:hover {
            text-decoration: underline;
        }
        .header .user-info {
            position: absolute;
            top: 15px;
            left: 15px;
            display: flex;
            align-items: center;
        }
        .header .user-info img {
            border-radius: 50%;
            width: 35px;
            height: 35px;
            margin-left: 10px;
        }
        .category-image {
            width: 100%;
            max-width: 100%;
            max-height: 500px;
            height: auto;
            object-fit: contain;
            display: block;
            margin-top: 20px;
            border-radius: 10px;
            cursor: pointer;
            transition: transform 0.3s ease;
            margin-bottom: 20px;
        }
        .category-image:hover {
            transform: scale(1.05);
        }
        .description {
            font-size: 18px;
            line-height: 1.8;
            color: #555;
            margin-bottom: 30px;
        }
        button {
            padding: 10px 20px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        button:hover {
            background-color: #555;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 16px;
            color: #333;
            background-color: #333;
            color: white;
        }
        .footer a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }
        .footer a:hover {
            text-decoration: underline;
        }

        /* Media Queries for responsive design */
        @media (max-width: 768px) {
            .container {
                width: 90%;
            }
            .header {
                font-size: 20px;
            }
            .description {
                font-size: 16px;
            }
            .comments h3 {
                font-size: 18px;
            }
            .comment, .comment-box {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .category-image {
                max-height: 350px;
            }
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
            color: #fff;
        }
        .card p {
            color: #ddd;
        }
        #comment-text::placeholder{
            color:#fff;
        }
        #comment-text{
            border:none;
            outline: none;
        }
        #comment-text:hover{
            border:1px solid #fff;
        }

    </style>

</head>
<body>
<div class="header">
    <a href="{{route('front.index')}}">خانه</a>
    <span>{{$title}}</span>
    <div class="user-info">
        @if($user = Auth::user())
            <a href="@if($user->role){{route('back.index')}}@endif">{{$user->name}}</a>
        @else
            <a href="{{route('register')}}">ورود / ثبت نام</a>
        @endif
    </div>
</div>
<div class="container">
    <img src="{{$image}}" alt="تصویر دسته‌بندی" class="category-image" onclick="openImageModal()">
    <p class="description">{{$description}}</p>

    {{--    comments  --}}

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
            <input type="hidden" name="type" value="category">
            <input type="text" id="reply" style="border:none; outline:none; background-color:#1e1e2f; color:#fff; margin:5px;" disabled>
            <label class="destroy" style=" margin:5px;"><button id="destroy" style="background-color:transparent;  outline:none; color:red; border:none; font-size:18px;" onclick="destroy()" type="button">لغو</button></label>
            <textarea style="background: #2a2a3b; color: #fff;" name="text" class="form-control mb-2" id="comment-text" placeholder="نظر شما برای ما بسیار ارزشمند است." rows="3"></textarea>
            <button type="submit" class="btn btn-primary" style="width: 100%;">ارسال</button>
        </form>
    </div>
    {{--    end comments --}}

</div>

<!-- Modal for viewing the image in full size -->
<div id="imageModal" style="display:none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.8); justify-content: center; align-items: center;">
    <img src="{{$image}}" alt="تصویر دسته‌بندی" style="max-width: 90%; max-height: 90%; border-radius: 10px;">
    <button onclick="closeImageModal()" style="position: absolute; top: 20px; right: 20px; background-color: red; color: white; padding: 10px; border: none; border-radius: 5px; cursor: pointer;">بستن</button>
</div>

<div class="footer">
    <p>ساخته شده توسط <a href="https://github.com/{{'ilghar2009'}}" target="_blank">ایلقار ابراهیمی</a></p>
</div>

<script>
    function openImageModal() {
        document.getElementById("imageModal").style.display = "flex";
    }

    function closeImageModal() {
        document.getElementById("imageModal").style.display = "none";
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
