<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>خانه</title>

    <style>
        body {
            font-family: dubai;
            text-align: right;
            direction: rtl;
        }

        .vertical-center {
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            -ms-transform: translateX(-50%);
            transform: translateX(-50%);
        }
        form{
            padding-top: 5%;
            padding-right: 40%;
        }
    </style>
</head>

<body>


    <div class="vertical-center">

        @guest
        <a href="{{route('register')}}"><button type="button" class="btn btn-primary">ثبت نام</button></a>
        <a href="{{route('login')}}"><button type="button" class="btn btn-primary">ورود</button></a>
        @endguest
        @auth
        <a href="{{route('home')}}"><button type="button" class="btn btn-primary">پروفایل</button></a>
        @endauth
        @if(auth()->check() && auth()->user()->role == "admin")
        <a href="{{route('users')}}"><button type="button" class="btn btn-primary">کاربران</button></a>
        @endif
        <a href="{{route('rooms')}}"><button type="button" class="btn btn-primary">اتاق ها</button></a>
        @if(auth()->check() && auth()->user()->role == "provider")
        <a href="{{route('roomRegister')}}"><button type="button" class="btn btn-primary">ثبت اتاق جدید</button></a>
        @endif
        @auth
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">خروج</button>
        </form>
        @endauth

    </div>

</body>

</html>