<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>نظرات من</title>
    <style>
        body {
            font-family: dubai;
            direction: rtl;
            text-align: right;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
        }

        th,
        td {
            text-align: left;
            padding: 16px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .LongText {
            display: block;
            width: 100px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        a {
            text-decoration: none;
            color: inherit;
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
            font-size: 15px;
            font-weight: 500;
            margin-right: 5px
        }

        .thumbupo {
            color: #17a2b8
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
    <br>
    <h1 style="text-align: center">نظرات من</h1>



    @if($comments->isEmpty())

    <h3 style="text-align: center;">نظری ثبت نشده است!</h3>

    @endif


    <div class="container justify-content-center mt-5 border-left border-right">
        @foreach ($comments as $comment)

        <div class="d-flex justify-content-center py-2 zoom">
            <div class="second py-2 px-2"> <span class="text1">نظر: {{$comment->comment}}</span>
                <div class="d-flex justify-content-between py-1 pt-2">
                    <div><span class="text2"><a href="{{route('room',$comment->room_id)}}">نام اتاق: {{$comment->RoomName($comment->room_id)}}</a></span></div>
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