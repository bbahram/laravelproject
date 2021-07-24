<!DOCTYPE html>
<html>
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

    /* Style the tab */
    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
    }

    /* Style the buttons inside the tab */
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
    }

    .tabcontent {
        animation: fadeEffect 1s;
        /* Fading effect takes 1 second */
    }

    /* Go from zero to full opacity */
    @keyframes fadeEffect {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }
</style>

<body>


    <div class="tab" style="direction:rtl;">
        <button class="tablinks" onclick="openCity(event, 'Admin')">ادمین</button>
        <button class="tablinks" onclick="openCity(event, 'Provider')">فراهم کننده</button>
        <button class="tablinks" id="defaultOpen" onclick="openCity(event, 'Customer')">مشتری</button>
    </div>





    <div id="Admin" class="tabcontent">
        <form method="POST" action="{{route('loginAdmin')}}" style="border:1px solid #ccc">

            @csrf
            <div class="container">
                <h1>ورود ادمین</h1>
                <p>فرم زیر را تکمیل کنید.</p>
                <hr>

                <label for="email"><b>ایمیل</b></label>
                <input type="text" placeholder="ایمیل خود را وارد کنید." name="email" required>

                <label for="psw"><b>رمز عبور</b></label>
                <input type="password" placeholder="رمز عبور خود را وارد کنید." name="psw" required>



                <div class="clearfix">
                    <button type="submit" class="signupbtn">ورود</button>
                    <a href="/"><button type="button" class="cancelbtn">خانه</button></a>
                </div>
            </div>
        </form>
    </div>



    <div id="Provider" class="tabcontent">
        <form method="POST" action='{{route('registerProvider')}}' style="border:1px solid #ccc">

            @csrf
            <div class="container">
                <h1>ورود فراهم کننده</h1>
                <p>فرم زیر را تکمیل کنید.</p>
                <hr>
                <label for="email"><b>ایمیل</b></label>
                <input type="text" placeholder="ایمیل خود را وارد کنید." name="email" required>

                <label for="password"><b>رمز عبور</b></label>
                <input type="password" placeholder="رمز عبور خود را وارد کنید." name="password" required>



                <div class="clearfix">
                    <button type="submit" class="signupbtn">ورود</button>
                    <a href="/"><button type="button" class="cancelbtn">خانه</button></a>
                </div>
            </div>
        </form>
    </div>




    <div id="Customer" class="tabcontent">
        <form method="POST" action="{{route('registerCustomer')}}" style="border:1px solid #ccc">

            @csrf
            <div class="container">
                <h1>ورود مشتری</h1>
                <p>فرم زیر را تکمیل کنید.</p>
                <hr>


                <label for="email"><b>ایمیل</b></label>
                <input type="text" placeholder="ایمیل خود را وارد کنید." name="email" required>

                <label for="password"><b>رمز عبور</b></label>
                <input type="password" placeholder="رمز عبور خود را وارد کنید." name="password" required>


                <div class="clearfix">
                    <button type="submit" class="signupbtn">ورود</button>
                    <a href="/"><button type="button" class="cancelbtn">خانه</button></a>
                </div>
            </div>
        </form>
    </div>





    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
        
        document.getElementById("defaultOpen").click();
    </script>


</body>

</html>