@extends('front.app')
@section('title', '登入')
@section('content')
<style>
/* 設定基本樣式 */
.register {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px;
}

.loginblock {
    border-radius: 50px;
    width: 400px;
    height: auto;
    background-color: #C79E69;
    margin: 55px;
    padding: 30px;
    box-sizing: border-box;
}

main {
    margin-top: 84px;
}

.content {
    color: #7E0137;
}

input[type="text"],
input[type="password"] {
    border: none;
    border-bottom: 1px solid #7E0137;
    background-color: transparent;
    outline: none;
    width: 200px;
    margin-bottom: 20px;
}

input[type="submit"] {
    background-color: #967462;
    color: #ffffff;
    margin-top: 30px;
    padding: 10px;
    border-radius: 20px;
    width: 100px;
    height: 50px;
    border: none;
    box-shadow: 2px 5px 8px rgba(0, 0, 0, 0.2);
    text-shadow: 1px 5px 5px rgba(0, 0, 0, 0.3);
}

tr {
    height: 70px;
}

td {
    font-size: 25px;
}

/* 小螢幕的樣式 */
@media (max-width: 1700px) {
    .loginblock {
        padding: 20px;
        width: 50%;
    }

    input[type="text"],
    input[type="password"] {
        max-width: 60%;
    }

    input[type="submit"] {
        max-width: 100%;
    }

    .content h1 {
        font-size: 24px;
    }

    td {
        font-size: 20px;
    }

    main {
        margin-top: 120px;
    }
}

@media (max-width: 480px) {
    .loginblock {
        width: 90%;
        padding: 20px;
    }

    .content h1 {
        font-size: 20px;
    }

    td {
        font-size: 18px;
    }

    input[type="submit"] {
        max-width: 90%;
    }
}
</style>

<div class="register">
    <div class="loginblock">
        <div class="content" align="center">
            <h1 style="font-weight: bold; margin: 20px;">登入</h1>
            <div style="margin-top: 70px;">
                <form action="/doLogin" method="POST">
                    {{ csrf_field() }}
                    <table style="width: 100%;">
                        <tr>
                            <td align="center">帳號</td>
                            <td align="center">
                                <input type="text" id="address" name="address" class="form-control"
                                    value="{{ old('address') }}" placeholder="" autocomplete="off">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td align="center">密碼</td>
                            <td align="center">
                                <input type="password" id="password" name="password" class="form-control">
                            </td>
                        </tr>
                        @if ($errors->has('error'))
                        <div class="text-danger">
                            <b>{{ $errors->first('error') }}</b>
                        </div>
                        @endif
                    </table>
                    <div style="margin-right: 20px;">
                        <div style="text-align: right;">
                            <a href="/register">
                                <font style="color: #7E0137;">➤註冊會員</font>
                            </a>
                        </div>
                        <div style="text-align: right;">
                            <a href="/forget">
                                <font style="color: #7E0137;">➤忘記密碼</font>
                            </a>
                        </div>
                    </div>
                    <input type="submit" value="登入">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection