<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('fontend/style.css') }}" rel="stylesheet" type="text/css"/>
        <title>Login User</title>
</head>
<body>
        <div class="top"></div>
        <div class="left">
            <h3>Hello {{Auth::user()->username}}</h3><br>
            <ul>
                <li><a href="{{ route('sinhvien.infStudent') }}">Manage information</a></li>
                <li><a href="{{ route('sinhvien.listusersSV') }}">Lit of users</a></li>
                <li><a href="{{ route('sinhvien.exercise') }}">Exercise</a></li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </div>
        <div class="right">
            @yield('content')
        </div>
</body>
</html>