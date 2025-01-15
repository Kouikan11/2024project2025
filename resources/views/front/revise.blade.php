@extends("front.app")
@section("title", "修改密碼")
@section("content")
<style>
    .register {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .loginblock {
        border-radius: 50px;
        width: 100%;
        max-width: 600px;
        height: 550px;
        background-color: #C79E69;
        margin: 60px;
        padding: 30px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    }

    .content {
        color: #7E0137;
    }

    input[type="text"] {
        border: none;          /* 隱藏所有邊框 */
        border-bottom: 1px solid #7E0137;  /* 顯示底部的黑色底線 */
        background-color: transparent; /* 設置背景為透明 */
        outline: none;         /* 移除聚焦時的外框 */
        width: 100%;
        max-width: 300px;
    }

    input[type="password"] {
        border: none;          /* 隱藏所有邊框 */
        border-bottom: 1px solid #7E0137;  /* 顯示底部的黑色底線 */
        background-color: transparent; /* 設置背景為透明 */
        outline: none;         /* 移除聚焦時的外框 */
        width: 100%;
        max-width: 300px;
    }

    input[type="submit"] {
        background-color: #967462;
        color: #ffffff;
        margin-top: 50px;
        padding: 10px;
        border-radius: 20px;
        width: 100%;
        max-width: 120px;
        height: 50px;
        border: none;  /* 移除外框 */
        box-shadow: 2px 5px 8px rgba(0, 0, 0, 0.2); /* 按鈕的陰影 */
        text-shadow: 1px 5px 5px rgba(0, 0, 0, 0.3); /* 文字的陰影 */
    }

    table {
        width: 100%;
        max-width: 450px;
        margin-left: 40px;
    }

    tr {
        height: 70px;
    }

    td {
        font-size: 18px;
        text-align: left;
        padding: 10px 0;
    }

    @media (max-width: 768px) {
        .loginblock {
            padding: 20px;
        }

        td {
            font-size: 16px;
        }

        input[type="submit"] {
            max-width: 100px;
        }
    }

    @media (max-width: 480px) {
        td {
            font-size: 14px;
        }

        input[type="text"] {
            max-width: 100%;
        }

        input[type="submit"] {
            height: 40px;
            max-width: 80px;
        }
    }
</style>
<form action="{{ route('password.reset') }}" method="post">
    <div class="register">
        <div class="loginblock">
            <div class="content" align="center">
                <h1 style="font-weight: bold; margin: 20px;">修改密碼</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div style="margin-top: 30px;">
                    @csrf
                    <table>
                        <tr>
                            <td align="center">帳號</td>
                            <td align="center">
                                <input type="text" name="address" id="address" class="form-control" required placeholder="請輸入您的帳號">
                            </td>
                        </tr>
                        <tr>
                            <td align="center">新密碼</td>
                            <td align="center">
                                <input type="password" name="password" id="password" class="form-control" required placeholder="請輸入欲重設的新密碼">
                            </td>
                        </tr>
                        <tr>
                            <td align="center">新密碼確認</td>
                            <td align="center">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required placeholder="再次輸入新密碼">
                            </td>
                        </tr>
                    </table>
                </div>
                <input type="submit" value="確認修改">
            </div>
        </div>
    </div>
</form>
@endsection
