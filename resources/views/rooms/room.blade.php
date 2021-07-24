<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>اتاق</title>
    <style>
        body {
            font-family: dubai;
            direction: rtl;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 16px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: inherit;
            padding-right: 5px;
        }

        .vertical-center {
            padding-top: 5%;
            padding-bottom: 5%;
            margin: 0;
            left: 50%;
            -ms-transform: translateX(-50%);
            transform: translateX(-50%);
        }






        .column {
            float: right;
            padding: 10px;
        }

        /* Remove extra left and right margins, due to padding */
        .row {
            margin: 0 100px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive columns */
        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
                display: block;
                margin-bottom: 20px;
            }
        }

        /* Style the counter cards */
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            padding: 16px;
            text-align: center;
            background-color: #d7f0f7;
            overflow: hidden;
        }












        .container {
            background-color: #eef2f5;
            width: 400px
        }

        .addtxt {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: center;
            font-size: 13px;
            width: 350px;
            background-color: #e5e8ed;
            font-weight: 500
        }

        .form-control:focus {
            color: #000
        }

        .second {
            width: 350px;
            background-color: white;
            border-radius: 4px;
            box-shadow: 10px 10px 5px #aaaaaa
        }

        .text1 {
            font-size: 15px;
            font-weight: 500;
            color: #56575b
        }

        .text2 {
            font-size: 15px;
            font-weight: 500;
            margin-left: 6px;
            color: #56575b
        }

        .text3 {
            font-size: 15px;
            font-weight: 500;
            margin-right: 4px;
            color: #828386
        }

        .text3o {
            color: #00a5f4
        }

        .text4 {
            font-size: 15px;
            font-weight: 500;
            color: #828386
        }

        .text4i {
            color: #00a5f4
        }

        .text4o {
            color: white
        }

        .thumbup {
            font-size: 13px;
            font-weight: 500;
            margin-right: 5px
        }

        .thumbupo {
            color: #17a2b8
        }

        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 30%;
            height: 30%;
            border-radius: 1%;
            padding: 15px 0;
        }
        
        .zoom {
            transition: transform .2s;
        }

        .zoom:hover {
            -webkit-transform: scale(1.2);
            -moz-transform: scale(1.2);
            -ms-transform: scale(1.2);
            -o-transform: scale(1.2);
            transform: scale(1.2);
        }
    </style>
</head>

<body>

    <h1 style="text-align: center;"><a href="/">خانه</a></h1>
    <h3 style="text-align: center;"><a href={{route("rooms")}}>اتاق ها</a></h3>

    <div class="row">
        <div class="column">
            <div class="card">
                <h3>نام: {{$room->name}}</h3>
                @if($room->image!=null)
                <img class="zoom" src={{url($room->image)}} alt="تصویر اتاق">
                @endif
                <p class="LongText"><b>توضیحات: </b>{{$room->description}}</p>
                <p class="LongText"><b>آدرس: </b>{{$room->address}}</p>
                <p class="LongText"><b>قیمت: </b>{{$room->price}} تومان</p>
                <p class="LongText"><b>میانگین امتیازات: </b>{{$room->AverageScore($room->id)}}</p>
                @if((auth()->check() && auth()->user()->role == "admin")
                || (auth()->check() && auth()->user()->role == "provider" && auth()->user()->id==$room->provider_id))
                <p><a href="{{route('roomEdit',$room->id)}}">ویرایش</a></p>
                <p><a href="{{route('roomDelete',$room->id)}}"
                        onclick="return confirm('آیتم مورد نظر حذف شود؟');">حذف</a></p>
                @endif
                @if(auth()->check() && auth()->user()->role == "customer")
                @if(auth()->user()->id!=$room->customer_id)
                @if($room->customer_id==null)
                <p><a href="{{route('roomReserve',$room->id)}}">رزرو</a></p>
                @endif
                @else
                <p><a href="{{route('roomCancel',$room->id)}}">لغو رزرو</a></p>
                @endif
                @endif
            </div>
        </div>
    </div>


    <br>
    <h1 style="text-align: center">نظرات</h1>

    @if($comments->isEmpty())
    <h3 style="text-align: center">نظری ثبت نشده است!</h3>
    @endif

    <div class="container justify-content-center mt-5 border-left border-right">
        @if(auth()->check() && auth()->user()->role == "customer" && $room->CommentChecker($room->id))
        <div style="text-align: center; padding: 10px 0">
            <a href="{{route('commentRegister',$room)}}"><button type="button" class="btn btn-primary">ثبت نظر و
                    پیشنهاد</button></a>
        </div>
        @endif

        @foreach ($comments as $comment)

        <div class="d-flex justify-content-center py-2 zoom">
            <div class="second py-2 px-2"> <span class="text1">نظر: {{$comment->comment}}</span>
                <div class="d-flex justify-content-between py-1 pt-2">
                    <div><span class="text2">نام کاربر: {{$comment->UserName($comment->customer_id)}}</span></div>
                    <div><span class="text3">امتیاز:</span><span class="thumbup"><i
                                class="fa fa-thumbs-o-up"></i></span><span class="text4">{{$comment->score}}</span>
                    </div>
                    @if((auth()->check() && auth()->user()->role == "admin")
                    || (auth()->check() && auth()->user()->role == "customer" &&
                    auth()->user()->id==$comment->customer_id))
                    <div><span class="text2">
                            <a href="{{route('commentEdit',$comment->id)}}">ویرایش</a></span>
                    </div>
                    <div><span class="text2"> <a href="{{route('commentDelete',$comment->id)}}"
                                onclick="return confirm('آیتم مورد نظر حذف شود؟');">حذف</a></span>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        @endforeach
    </div>  
    <br><br>
</body>

</html>