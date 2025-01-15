@extends("admin.layout")
@section("title","修改會員資料")
@section("content")
<div class="container py-3">
    <form method="post" action="../update">
        <input type="hidden" name="id" value="{{ $user->id }}">
        {{ csrf_field() }}
        <h3>修改會員資料</h3>
        <div class="row mt-3">
            <label class="col-1 col-form-label text-right">姓名</label>
            <div class="col-4">
                <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" required>
            </div>
        </div>
        <div class="row mt-3">
            <label class="col-1 col-form-label text-right">暱稱</label>
            <div class="col-4">
                <input type="text" class="form-control" name="nickName" id="nickName" value="{{ $user->nickName }}"
                    required>
            </div>
        </div>
        <div class="row mt-3">
            <label class="col-1 col-form-label text-right">社群軟體</label>
            <div class="col-4">
                <input type="radio" name="socialMedia" value="LINE" @if($user->socialMedia == 'LINE') checked
                @endif>LINE
                <input type="radio" name="socialMedia" value="Discord" @if($user->socialMedia == 'Discord') checked
                @endif>Discord
                <input type="radio" name="socialMedia" value="Facebook" @if($user->socialMedia == 'Facebook') checked
                @endif>Facebook
                <input type="radio" name="socialMedia" value="Instagram" @if($user->socialMedia == 'Instagram') checked
                @endif>Instagram
            </div>
        </div>
        <div class="row mt-3">
            <label class="col-1 col-form-label text-right">社群帳號</label>
            <div class="col-4">
                <input type="text" class="form-control" name="smAddress" id="smAddress" value="{{ $user->smAddress }}"
                    required>
            </div>
        </div>
        <div class="row mt-3">
            <label class="col-1 col-form-label text-right">信箱</label>
            <div class="col-4">
                <input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}" required>
            </div>
        </div>
        <div class="row mt-3">
            <label class="col-1 col-form-label text-right">手機號碼</label>
            <div class="col-4">
                <input type="text" class="form-control" name="phoneNb" id="phoneNb" value="{{ $user->phoneNb }}"
                    required>
            </div>
        </div>
        <div class="row mt-3">
            <label class="col-1 col-form-label text-right">帳號</label>
            <div class="col-4">
                <input type="text" class="form-control" name="address" id="address" required maxlength="10" value="{{ $user->address }}" readonly>
            </div>
            <div class="col-4">
                (不可變更)
            </div>
        </div>
        <div class="row mt-3">
            <label class="col-1 col-form-label text-right">密碼</label>
            <div class="col-4">
                <input type="password" class="form-control" name="password" id="password" value="{{ $user->password }}"
                    required>
            </div>
        </div>
        <div class="text-center mt-3">
            <button class="btn btn-primary" name="submit">確 定</button>　
            <a href="/admin/user/list" class="btn btn-secondary">回上頁</a>
        </div>
    </form>
</div>
@endsection