@extends("front.app")
@section("title", "註冊")
@section("content")
<style>
    /* 基本樣式設定 */
    .register {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
    }

    .loginblock {
        border-radius: 50px;
        width: 100%;
        max-width: 750px;
        height: auto;
        background-color: #C79E69;
        margin: 50px;
        padding: 30px;
        box-sizing: border-box;
    }

    .content {
        color: #7E0137;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        border: none;
        border-bottom: 1px solid #7E0137;
        background-color: transparent;
        outline: none;
        width: 100%;
        max-width: 300px;
        margin-bottom: 20px;
    }

    tr {
        height: 70px;
    }

    input[type="submit"] {
        background-color: #967462;
        color: #ffffff;
        margin: 30px;
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
        font-size: 25px;
    }

    /* 小螢幕的樣式調整 */
    @media (max-width: 768px) {
        .loginblock {
            padding: 20px;
            width: 90%;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            max-width: 100%;
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
    }

    @media (max-width: 480px) {
        .loginblock {
            padding: 20px;
            width: 90%;
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

<form action="/doRegister" method="post">
    <div class="register">
        <div class="loginblock">
            <div class="content" align="center">
                <div>
                    <h1 style="font-weight: bold; margin: 20px;">註冊</h1>
                </div>
                <table style="width: 100%; margin-left: 30px;">
                    <tr>
                        <td align="center">姓名</td>
                        <td align="center">
                            <input type="text" name="name" value="{{ old('address') }}" placeholder="請輸入真實姓名" required>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">帳號</td>
                        <td align="center">
                            <input type="text" name="address" value="{{ old('address') }}" placeholder="帳號註冊後將無法修改" required>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">密碼</td>
                        <td align="center">
                            <input type="password" name="password" value="{{ old('address') }}" placeholder="密碼最短4字英文或數字" required>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">暱稱</td>
                        <td align="center">
                            <input type="text" name="nickName" value="{{ old('address') }}" placeholder="交流之暱稱" required>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">社群</td>
                        <td align="center">
                            <input type="radio" name="smAddress" value="LINE" required>LINE
                            <input type="radio" name="smAddress" value="Discord" required>Discord
                            <input type="radio" name="smAddress" value="Facebook" required>Facebook
                            <input type="radio" name="smAddress" value="Instagram" required>Instagram
                        </td>
                    </tr>
                    <tr>
                        <td align="center">社群帳號</td>
                        <td align="center">
                            <input type="text" name="socialMedia" value="{{ old('address') }}" placeholder="社群平台之帳號" required>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">聯絡信箱</td>
                        <td align="center">
                            <input type="email" name="email" value="{{ old('address') }}" placeholder="請輸入常用聯絡郵件" required>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">行動電話</td>
                        <td align="center">
                            <input type="text" name="phoneNb" value="{{ old('address') }}" placeholder="請輸入常用聯絡電話" required>
                        </td>
                    </tr>
                </table>
                @csrf
                <div class="error-messages">
                    @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div style="margin-right: 20px;">
                    <div style="text-align: right;">
                        <a href="/login">
                            <font style="color: #7E0137;">➤已有會員，返回登入</font>
                        </a>
                    </div>
                    <div style="text-align: right;">
                        <a href="/forget">
                            <font style="color: #7E0137;">➤已有會員，忘記密碼</font>
                        </a>
                    </div>
                </div>
                <input type="submit" value="創建帳戶">
            </div>
        </div>
    </div>
</form>

@endsection
