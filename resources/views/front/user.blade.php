@extends('front.app');
@section('title', '個人資料管理')
@section('content')
<style>
    .button2 {
        padding: 5px 10px;
        font-size: 16px;
        border: 2px solid transparent;
        border-radius: 30px;
        background-color: #7E0137;  /* 初始顏色 */
        color: white;
        cursor: pointer;
        transition: all 0.3s ease;  /* 變色時加上過渡效果 */
    }

    .button2:hover {
        background-color: #970a49;  /* 滑鼠懸停時的顏色 */
        border-color: #970a49;     /* 邊框顏色改變 */
    }
</style>
<div class="gw pt-1 ps-3">
    <div class="bgbox" style="padding: 40px;">
        @foreach($user as $data)
        <form method="post" action="/user/{{ $data->id }}">
            {{ csrf_field()}}
            <p style="font-size: 24pt; text-align:center">個人資料</p>
            <p>旅行者姓名：<input type="text" name="name" value="{{ $data->name }}" style="width:250px"></p>
            <p>暱　　　稱：<input type="text" name="nickName" value="{{ $data->nickName }}" style="width:250px"></p>
            <p>社　　　群：
                <input type="radio" name="socialMedia" value="LINE" @if($data->socialMedia == 'LINE') checked
                @endif>LINE
                <input type="radio" name="socialMedia" value="Discord" @if($data->socialMedia == 'Discord') checked
                @endif>Discord
                <input type="radio" name="socialMedia" value="Facebook" @if($data->socialMedia == 'Facebook') checked
                @endif>Facebook
                <input type="radio" name="socialMedia" value="Instagram" @if($data->socialMedia == 'Instagram') checked
                @endif>Instagram
            </p>
            <p>社 群 帳 號 ：<input type="text" name="smAddress" value="{{ $data->smAddress }}" style="width:250px"></p>
            <p>信　　　箱：<input type="text" name="email" value="{{ $data->email }}" style="width:250px"></p>
            <p>行 動 電 話 ：<input type="text" name="phoneNb" value="{{ $data->phoneNb }}" style="width:250px"></p>
            <p>帳　　　號：<input type="text" name="address" id="address" value="{{ $data->address }}" required style="width:250px" readonly>(不可變更)
            <p>密　　　碼：<input type="password" name="password" value="{{ $data->password }}" style="width:250px"></p>
            <div style="display: flex;justify-content: center;">
                <input type="submit" name="Submit" value="確認儲存" class="button2"
                    style="width: 120px; height: 50px; border: none;">
            </div>
            @endforeach
        </form>
    </div>
</div>
@endsection
