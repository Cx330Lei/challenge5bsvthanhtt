<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('fontend/style.css') }}" rel="stylesheet" type="text/css"/>
        <title>Login Form</title>
        <style>
        body {
                width: 100%;
                min-height: 100vh;
                background-position: center;
                background-size: cover;
                display: flex;
                justify-content: center;
                align-items: center;
                }
        </style>
</head>
<body>
        <div class="container">
                <form action="" method="POST" class="login-email">
                    @csrf
                        <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
                        <div class="input-group">
                                <input type="text" placeholder="Username" name="username" required>
                        </div>
                        <div class="input-group">
                                <input type="password" placeholder="Password" name="password" required>
                        </div>
                        <div class="input-group">
                                <button name="submit" class="btn">Login</button>
                        </div>
                </form>
        </div>
</body>
</html>