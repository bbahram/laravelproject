<!DOCTYPE html>
<html>
    <title>ویرایش کاربر</title>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        text-align: right;
        direction: rtl;
        font-family: dubai;
    }

    * {
        box-sizing: border-box
    }

    /* Full-width input fields */
    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }

    input[type=text]:focus,
    input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }

    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }

    /* Set a style for all buttons */
    button:not(.tablinks) {
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }

    button:hover {
        opacity: 1;
    }

    /* Extra styles for the cancel button */
    .cancelbtn {
        padding: 14px 20px;
        background-color: #f44336;
    }

    /* Float cancel and signup buttons and add an equal width */
    .cancelbtn,
    .signupbtn {
        float: left;
        width: 50%;
    }

    /* Add padding to container elements */
    .container {
        padding: 16px;
    }

    /* Clear floats */
    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }

    /* Change styles for cancel button and signup button on extra small screens */
    @media screen and (max-width: 300px) {

        .cancelbtn,
        .signupbtn {
            width: 100%;
        }
    }
    .resize {
        width: 40%;
        height: 95%;
        position: absolute;
        top: 50%;
        left: 50%;
        -moz-transform: translateX(-50%) translateY(-50%);
        -webkit-transform: translateX(-50%) translateY(-50%);
        transform: translateX(-50%) translateY(-50%);
    }
</style>

<body>

    <div id="User" class="tabcontent resize">
        <form method="POST" action={{route('userUpdate',$user->id)}} style="border:1px solid #ccc">

            @csrf
            <div class="container">
                <div style="text-align: center">
                    <h1>تغییر اطلاعات کاربر</h1>
                    <p>فرم زیر را تکمیل کنید.</p>
                </div>
                <hr>

                <label for="name"><b>نام کاربر</b></label>
                <input type="text" placeholder="نام اتاق را وارد کنید." name="name" value="{{$user->name}}"  >

                <label for="email"><b>ایمیل</b></label>
                <input type="text" placeholder="توضیحات را وارد کنید." name="email" value="{{$user->email}}" >

                <label for="password"><b>رمز عبور</b></label>
                <input type="password" placeholder="رمز عبور خود را وارد کنید." name="password">

                <label for="psw-repeat"><b>تکرار رمز عبور</b></label>
                <input type="password" placeholder="رمز عبور خود را تکرار کنید." name="psw-repeat">

                <div class="clearfix">
                    <button type="submit" class="signupbtn">ثبت</button>
                    <a href="/"><button type="button" class="cancelbtn">خانه</button></a>
                </div>
            </div>
        </form>
    </div>






</body>

</html>