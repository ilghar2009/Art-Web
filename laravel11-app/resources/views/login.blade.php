<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login Page</title>

        <link rel="stylesheet" href="/assets/css/login.css">
    </head>
    <body>

        <div class="m">
            <form class="form" action="auth.php" method="post">
                <h2>Login</h2>
                <input type="hidden" name="role" value="login">
                <input type="text" id="name" class="name" name="mobile" placeholder="Enter your Phone Number..."><br>
                <input type="password" id="password" name="password" placeholder="Enter your Password..."><br>
                <input type="submit" value="log in">
                <a href="index.php">Go Home</a>
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
