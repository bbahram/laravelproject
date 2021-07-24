<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        a{
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>

<body>

    <h1 style="text-align: center;"><a href="/">خانه</a></h1>
    <table>
        <tr>
            <td>نام</td>
            <td>توضیحات</td>
            <td></td>
        </tr>
        @foreach ($comments as $comment)
        <tr>
            <td>{{$comment->name}}</td>
            <td class="LongText">{{$comment->description}}</td>
            <td>{{$comment->active}}</td>
            <td><a href="{{route('commentEdit',$comment->id)}}">ویرایش</a></td>
            <td><a href="{{route('commentDelete',$comment->id)}}" onclick="return confirm('آیتم مورد نظر حذف شود؟');">حذف</a>
            </td>
        </tr>
        @endforeach
    </table>

</body>

</html>