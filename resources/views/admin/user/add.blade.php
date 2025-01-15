@extends("admin.layout")
@section("title","新增會員")
@section("content")
<script>
function checkUser() {
    $("#msg").html("");
    var address = $("#address").val();
    $.ajax({
        url: "/admin/user/checkUser",
        type: "post",
        data: {
            address: address,
            _token: "{{ csrf_token() }}"
        },
        success: function(msg) {
            if (msg.trim() == "exist") {
                $("#msg").html("<font color='red'>帳號已存在</font>");
                $("#address").focus();
            }
        }
    });
}
</script>
<div class="container py-3">
    <form method="post" action="insert" enctype="multipart/form-data">
        {{ csrf_field() }}
        <h3>新增會員資料</h3>
        <div class="row mt-3">
            <label class="col-1 col-form-label text-right">姓名</label>
            <div class="col-4">
                <input type="text" class="form-control" name="name" id="name" required>
            </div>
        </div>
        <div class="row mt-3">
            <label class="col-1 col-form-label text-right">暱稱</label>
            <div class="col-4">
                <input type="text" class="form-control" name="nickName" id="nickName" required>
            </div>
        </div>
        <div class="row mt-3">
            <label class="col-1 col-form-label text-right">社群軟體</label>
            <label class="col-4">
                <input type="radio" value="LINE" name="socialMedia" id="socialMedia" required>LINE
                <input type="radio" value="Discord" name="socialMedia" id="socialMedia" required>Discord
                <input type="radio" value="Facebook" name="socialMedia" id="socialMedia" required>Facebook
                <input type="radio" value="Instagram" name="socialMedia" id="socialMedia" required>Instagram
            </label>
        </div>
        <div class="row mt-3">
            <label class="col-1 col-form-label text-right">社群帳號</label>
            <div class="col-4">
                <input type="text" class="form-control" name="smAddress" id="smAddress" required>
            </div>
        </div>
        <div class="row mt-3">
            <label class="col-1 col-form-label text-right">信箱</label>
            <div class="col-4">
                <input type="text" class="form-control" name="email" id="email" required>
            </div>
        </div>
        <div class="row mt-3">
            <label class="col-1 col-form-label text-right">手機號碼</label>
            <div class="col-4">
                <input type="text" class="form-control" name="phoneNb" id="phoneNb" required>
            </div>
        </div>
        <div class="row mt-3">
            <label class="col-1 col-form-label text-right">帳號</label>
            <div class="col-4">
                <input type="text" class="form-control" name="address" id="address" required autofocus
                    onblur="checkUser()" maxlength="12">
            </div>
            <div class="col-4">
                <div id="msg"></div>
            </div>
        </div>
        <div class="row mt-3">
            <label class="col-1 col-form-label text-right">密碼</label>
            <div class="col-4">
                <input type="password" class="form-control" name="password" id="password" value="" required>
            </div>
        </div>
        <div class="card-body text-start mt-3">
            　　　　　<button class="btn btn-primary" name="submit">確 定</button>　
            <a href="/admin/user/list" class="btn btn-secondary">回上頁</a>
        </div>
    </form>
</div>
@endsection