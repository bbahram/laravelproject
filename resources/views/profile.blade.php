<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>پروفایل</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body {
            font-family: dubai;
            direction: rtl;
            ;
        }

        .flip-card {
            background-color: transparent;
            width: 350px;
            height: 350px;
            perspective: 1000px;
        }

        .flip-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            text-align: center;
            transition: transform 0.6s;
            transform-style: preserve-3d;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        .flip-card:hover .flip-card-inner {
            transform: rotateY(180deg);
        }

        .flip-card-front,
        .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
        }

        .flip-card-front {
            background-color: #aee8f7;
            color: rgb(105, 105, 105);
        }

        .flip-card-back {
            background-color: #b5ead6;
            color: rgb(105, 105, 105);
            transform: rotateY(180deg);
        }

        .vertical-center {
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            -moz-transform: translateX(-50%) translateY(-50%);
            -webkit-transform: translateX(-50%) translateY(-50%);
            transform: translateX(-50%) translateY(-50%);
        }

        a {
            text-decoration: none;
            color: inherit;
        }
    </style>

</head>

<body>



    <div class="flip-card vertical-center">
        <div class="flip-card-inner">
            <div class="flip-card-front">
                <h3 style="padding-top: 30%">نام: {{auth()->user()->name}}</h3>
                <p>ایمیل: {{auth()->user()->email}}</p>
                @if(auth()->user()->role=='provider')
                <p>نقش: فراهم کننده</p>
                @elseif(auth()->user()->role=='admin')
                <p>نقش: ادمین</p>
                @else
                <p>نقش: مشتری</p>
                @endif
            </div>
            <div class="flip-card-back">
                <div style="padding-top: 30%">
                    @if(auth()->check() && auth()->user()->role == "admin")
                    <a href="{{route('users')}}"><button type="button" class="btn btn-primary">کاربران</button></a>
                    @endif
                    <a href="{{route('rooms')}}"><button type="button" class="btn btn-primary">اتاق ها</button></a>
                    @if(auth()->check() && auth()->user()->role == "customer")
                    <a href="{{route('roomReserved')}}"><button type="button" class="btn btn-primary">رزرو
                            ها</button></a>
                    <a href="{{route('myComments')}}"><button type="button" class="btn btn-primary">نظرات
                            من</button></a>
                    @endif
                    @if(auth()->check() && auth()->user()->role == "provider")
                    <a href="{{route('myRooms')}}"><button type="button" class="btn btn-primary">اتاق های
                            من</button></a>
                    <a href="{{route('roomRegister')}}"><button type="button" class="btn btn-primary">ثبت اتاق
                            جدید</button></a>
                    @endif
                </div>
                <p style="padding-top: 5%"><a href="{{route('userEdit',auth()->user()->id)}}">ویرایش</a></p>
                <p><a href="{{route('userDelete',auth()->user()->id)}}"
                        onclick="return confirm('آیتم مورد نظر حذف شود؟');">حذف</a></p>
                @auth
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">خروج</button>
                </form>
                @endauth
            </div>
        </div>
    </div>


</body>

</html>