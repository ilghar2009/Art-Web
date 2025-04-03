<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نمایش دسته‌بندی</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            direction: rtl;
            text-align: right;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: auto;
        }
        .header {
            background: #333;
            color: white;
            text-align: center;
            padding: 15px 0;
            font-size: 24px;
        }
        .category-image {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            display: block;
            margin: 20px 0;
        }
        .description {
            font-size: 18px;
            line-height: 1.6;
        }
        .comments {
            margin-top: 40px;
        }
        .comment-box {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
        }
        .comment {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }
    </style>
</head>
<body>
<div class="header">عنوان دسته‌بندی</div>
<div class="container">
    <img src="{{$image}}" alt="تصویر دسته‌بندی" class="category-image">
    <p class="description">{{$description}}</p>

    <div class="comments">
        <h3>نظرات کاربران</h3>
        <div class="comment">نظر ۱: متن نظر کاربر...</div>
        <div class="comment">نظر ۲: متن نظر کاربر...</div>
        <textarea class="comment-box" placeholder="نظر خود را بنویسید..."></textarea>
        <button>ارسال نظر</button>
    </div>
</div>
</body>
</html>