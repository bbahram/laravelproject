<!DOCTYPE html>
<html>

<head>
    <title>کاربران</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: dubai;
            direction: rtl;
            text-align: right;
        }

        .row {
            display: flex;
            margin-left: -5px;
            margin-right: -5px;
        }

        .column {
            flex: 50%;
            padding: 5px;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
        }

        th,
        td {
            text-align: center;
            padding: 16px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        a{
            text-decoration: none;
            color: inherit;
        }
        .header{
            background-color: #aee8f7;
        }
    </style>
</head>

<body>


    <h1 style="text-align: center;"><a href="/">خانه</a></h1>

    <div class="row">
        <div class="column">
            <table>
                <tr class="header">
                    <td></td>
                    <td>فراهم کننده ها</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>نام</td>
                    <td>ایمیل</td>
                    <td></td>
                    <td></td>
                </tr>
                @foreach ($users as $user)
                @if($user->role == "provider")
                <tr>
                    <td>{{$user->name}}</td>
                    <td class="LongText">{{$user->email}}</td>
                    <td><a href="{{route('userEdit',$user->id)}}">ویرایش</a></td>
                    <td><a href="{{route('userDelete',$user->id)}}"
                            onclick="return confirm('آیتم مورد نظر حذف شود؟');">حذف</a>
                    </td>
                </tr>
                @endif
                @endforeach
            </table>
        </div>
        <div class="column">
            <table>
                <tr class="header">
                    <td></td>
                    <td>مشتری ها</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>نام</td>
                    <td>ایمیل</td>
                    <td></td>
                    <td></td>
                </tr>
                @foreach ($users as $user)
                @if($user->role == "customer")
                <tr>
                    <td>{{$user->name}}</td>
                    <td class="LongText">{{$user->email}}</td>
                    <td><a href="{{route('userEdit',$user->id)}}">ویرایش</a></td>
                    <td><a href="{{route('userDelete',$user->id)}}"
                            onclick="return confirm('آیتم مورد نظر حذف شود؟');">حذف</a>
                    </td>
                </tr>
                @endif
                @endforeach
            </table>
        </div>
        <div class="column">
            <table>
                <tr class="header">
                    <td></td>
                    <td>ادمین ها</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>نام</td>
                    <td>ایمیل</td>
                    <td></td>
                    <td></td>
                </tr>
                @foreach ($users as $user)
                @if($user->role == "admin")
                <tr>
                    <td>{{$user->name}}</td>
                    <td class="LongText">{{$user->email}}</td>
                    <td><a href="{{route('userEdit',$user->id)}}">ویرایش</a></td>
                    <td><a href="{{route('userDelete',$user->id)}}"
                            onclick="return confirm('آیتم مورد نظر حذف شود؟');">حذف</a>
                    </td>
                </tr>
                @endif
                @endforeach
            </table>
        </div>
    </div>

</body>

</html>