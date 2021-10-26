<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .hero {
            height: 100%;
            width: 100%;
            background-image: url("/images/background.jpg");
            background-position: center;
            background-size: cover;
            position: absolute;
        }

        .form-box {
            width: 380px;
            height: 480px;
            position: relative;
            margin: 6% auto;
            background: #fff;
            padding: 5px;
            overflow: hidden;
        }

        .button-box {
            width: 220px;
            margin: 35px auto;
            position: relative;
            box-shadow: 0 0 20px 9px #ff61241f;
            border-radius: 30px;
        }

        .loggle-btn {
            padding: 10px 30px;
            cursor: pointer;
            background: transparent;
            border: 0;
            outline: none;
            position: relative;
        }

        .btn {
            top: 0;
            left: 0;
            position: absolute;
            width: 110px;
            height: 100%;
            background: linear-gradient(to right, #ff105f, #ffad06);
            border-radius: 30px;
            transition: .5s;
        }

        .input-group {
            top: 100px;
            position: absolute;
            width: 280px;
            transition: .5s;
        }

        .input-field {
            width: 100%;
            padding: 10px 0;
            margin: 5px 0;
            border-left: 0;
            border-top: 0;
            border-right: 0;
            border-bottom: 1px solid #999;
            outline: none;
            background: transparent;
        }

        .submit-btn {
            width: 85%;
            padding: 10px 30px;
            cursor: pointer;
            display: block;
            margin: auto;
            background: linear-gradient(to right, #ff105f, #ffad06);
            border: 0;
            outline: none;
            border-radius: 30px;
        }

        .chech-box {
            margin: 30px 10px 30px 0;
        }

        span {
            color: #777;
            font-size: 12px;
            bottom: 68px;
            position: absolute;
            font-family: Arial, Helvetica, sans-serif;
        }

        #login {
            left: 50px;
        }

        #register {
            left: 450px;
        }
    </style>


</head>

<body>
    @include('sweetalert::alert')
    <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn" class="btn"></div>
                <button type="button" class="loggle-btn" onclick="login()">Login</button>
                <a herf="{{route('register')}}">
                <button type="button" class="loggle-btn" onclick="register()">
                Register</button></a>
            </div>
            <form action="{{ route('authenticate') }}" method="post" class="input-group" id="login">
                @csrf
                <input type="text" name="email" class="input-field" placeholder="Email id" required>
                <input type="text" name="password" class="input-field" placeholder="Enter password" required>
                <input type="checkbox" class="chech-box"><span>Remember Password</span>
                <button type="submit" class="submit-btn">Login</button>
                @error('credentials')
                <div class="warn" align="center">{{ $message}}</div>
                @enderror
            </form>
            <form action="{{ route('register') }}" method="post" class="input-group" id="register">
                @csrf
                <table border="0" cellpadding="0" cellspacing="">
                    <input type="text" name="email"class="input-field" placeholder="Email id" required>
                    <input type="text" name="name"class="input-field" placeholder="User name" required>
                    <input type="password" name="password"class="input-field" placeholder="Enter password" required>
                    <button type="submit" class="submit-btn">Register</button>
                    @error('credentials')
                    <div class="warn" align="center">{{ $message}}</div>
                    @enderror
                </table>
            </form>
        </div>
        <script>
                var x = document.getElementById("login");
                var y = document.getElementById("register");
                var z = document.getElementById("btn");

                function register() {
                    x.style.left = "-400px"
                    y.style.left = "50px"
                    z.style.left = "110px"
                }
                function login() {
                    x.style.left = "50px"
                    y.style.left = "450px"
                    z.style.left = "0px"
                }
        </script>
    </div>
</body>

</html>