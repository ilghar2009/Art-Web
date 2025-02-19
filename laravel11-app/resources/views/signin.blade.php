<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Sign up Page</title>
    </head>

    <link rel="stylesheet" href="/assets/css/signin.css">

    <body>

        <div class="m">
            <form class="form" action="{{route('register')}}" method="post">
                @csrf
                <h2>Sign up</h2>
                <input type="hidden" name="role" value="sign">
                <input type="text" name="name" placeholder="Enter your Name..."><br>
                <input type="text" name="email" placeholder="Enter your Phone Email..."><br>
                <input  type="password" id="pass" name="password" placeholder="Enter your Password..."><br>
                <input type="submit" value="sign up">
                <a href="{{route('home')}}">Go Home</a>
                <a href="{{route('login')}}">login</a><br>
                <a><img id="show" style="background-color:#fff; border-radius: 10px;" src="/assets/picture/hide.png" alt="" width="30" height="30"></a>
            </form>
        </div>

        <script src="/assets/js/jquery.js"></script>

        <script>
            $(document).ready(function(){
                $("#show").click(function (){
                    $("#pass").attr("type", "text");
                })
            });
        </script>
    </body>
</html>
