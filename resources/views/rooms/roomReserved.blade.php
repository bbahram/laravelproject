<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: dubai;
            direction: rtl;
            text-align: right;
        }

        /* Float four columns side by side */
        .column {
            float: right;
            width: 25%;
            padding: 10px;
        }

        /* Remove extra left and right margins, due to padding */
        .row {
            margin: 0 -5px;
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

        a {
            text-decoration: none;
            color: inherit;
        }




        input[type=text] {
            text-align: center;
            width: 130px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: white;
            background-image: url('searchicon.png');
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
        }

        input[type=text]:focus {
            width: 100%;
        }





        form.example input[type=text] {
            padding: 10px;
            font-size: 17px;
            border: 1px solid grey;
            float: left;
            width: 80%;
            background: #f1f1f1;
        }

        form.example button {
            float: left;
            width: 20%;
            padding: 10px;
            background: #2196F3;
            color: white;
            font-size: 17px;
            border: 1px solid grey;
            border-left: none;
            cursor: pointer;
        }

        form.example button:hover {
            background: #0b7dda;
        }

        form.example::after {
            content: "";
            clear: both;
            display: table;
        }
    </style>
</head>

<body>


    <h1 style="text-align: center;"><a href="/">خانه</a></h1>
    <h3 style="text-align: center;"><a href={{route("rooms")}}>همه ی اتاق ها</a></h3>




    <form class="example" action="{{route('roomsSearch')}}" style="margin:auto;max-width:300px">
        <input type="text" placeholder="جست و جو" name="search">
        <button type="submit"><i class="fa fa-search"></i></button>
    </form>

    <br>

    @if($rooms->isEmpty())

    <h1 style="text-align: center;">نتیجه ای یافت نشد!</h1>

    @else

    <div class="row">
        @foreach ($rooms as $room)
        <div class="column">
            <div class="card">
                <h3><a href="{{route('room',$room->id)}}">نام: {{$room->name}}</a></h3>
                <p class="LongText"><b>توضیحات: </b>{{$room->description}}</p>
                <p class="LongText"><b>آدرس: </b>{{$room->address}}</p>
                <p class="LongText"><b>میانگین امتیازات: </b>{{$room->AverageScore($room->id)}}</p>
                @if((auth()->check() && auth()->user()->role == "admin")
                || (auth()->check() && auth()->user()->role == "provider" && auth()->user()->id==$room->provider_id))
                <p><a href="{{route('roomEdit',$room->id)}}">ویرایش</a></p>
                <p><a href="{{route('roomDelete',$room->id)}}"
                        onclick="return confirm('آیتم مورد نظر حذف شود؟');">حذف</a></p>
                @endif
                @if(auth()->check() && auth()->user()->role == "customer")
                @if(auth()->user()->id!=$room->customer_id)
                <p><a href="{{route('roomReserve',$room->id)}}">رزرو</a></p>
                @else
                <p><a href="{{route('roomCancel',$room->id)}}">لغو رزرو</a></p>
                @endif
                @endif
            </div>
        </div>
        @endforeach
    </div>
    @endif






</body>

</html>