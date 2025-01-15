@extends('front.app')
@section('title', '忘記密碼')
@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Email Send Using PHPMailer - webappfix.com</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    </head>
<style>
/* 基本樣式設定 */
.register {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px;
    margin: 50px;
}

.loginblock {
    border-radius: 50px;
    width: 100%;
    max-width: 500px;
    height: auto;
    background-color: #C79E69;
    margin: 100px;
    padding: 30px;
    box-sizing: border-box;
}

.content {
    color: #7E0137;
}

input[type="text"],
input[type="email"] {
    border: none;
    border-bottom: 1px solid #7E0137;
    background-color: transparent;
    outline: none;
    width: 100%;
    max-width: 250px;
    margin-bottom: 20px;
}

input[type="submit"] {
    background-color: #967462;
    color: #ffffff;
    margin-top: 30px;
    padding: 10px;
    border-radius: 30px;
    width: 100%;
    max-width: 150px;
    height: 50px;
    border: none;
    box-shadow: 2px 5px 8px rgba(0, 0, 0, 0.2);
    text-shadow: 1px 5px 5px rgba(0, 0, 0, 0.3);
}

td {
    font-size: 20px;
}

/* 小螢幕的樣式調整 */
@media (max-width: 768px) {
    .loginblock {
        padding: 20px;
        width: 90%;
    }

    input[type="text"],
    input[type="email"] {
        max-width: 100%;
    }

    input[type="submit"] {
        max-width: 100%;
    }

    .content h1 {
        font-size: 24px;
    }

    td {
        font-size: 18px;
    }
}

/* 更小的螢幕尺寸調整 */
@media (max-width: 480px) {
    .loginblock {
        padding: 20px;
        width: 90%;
    }

    .content h1 {
        font-size: 20px;
    }

    td {
        font-size: 16px;
    }

    input[type="submit"] {
        max-width: 90%;
    }
}
</style>

<form action="{{ route('forgetsubmit') }}" method="post" enctype="multipart/form-data">
    <div class="register">
        <div class="loginblock">
            <div class="content" align="center">
                <h1 style="font-weight: bold; margin: 20px;">忘記密碼</h1>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success  alert-dismissible">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger  alert-dismissible">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <div style="margin-top: 120px;">
                    @csrf
                    <table style="width: 100%; margin-left: 20px;">
                        <tr>
                            <td align="center">信箱</td>
                            <td align="center">
                                <input type="text" name="email">
                            </td>
                        </tr>
                    </table>
                </div>
                <div style="margin-right: 20px;">
                    <div style="text-align: right; margin-top: 20px;">
                        <a href="/login">
                            <font style="color: #7E0137;">➤返回登入</font>
                        </a>
                    </div>
                    <div style="text-align: right;">
                        <a href="/register">
                            <font style="color: #7E0137;">➤前往註冊</font>
                        </a>
                    </div>
                </div>
                <input type="submit" class="forgetsubmit" value="寄出驗證信">
            </div>
        </div>
    </div>
</form>

@endsection
