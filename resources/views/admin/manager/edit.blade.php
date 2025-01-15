@extends("admin.layout")
@section("title","修改管理者")
@section("content")
<script>
function checkManager() {
    //先清除msg的訊息
    $("#msg").html("");
    //取得userId的值
    var userId = $("#userId").val();
    var oldUserId = "{{ $manager->userId }}";
    if (userId != oldUserId) {
        $.ajax({
            //到後端的網址
            url: "/admin/manager/hasManager",
            //傳送的方法為post
            type: "post",
            data: {
                //左邊的uderId是後端要接收的名稱，右邊的userId是設定給左邊的值
                userId: userId,
                oldUserId: oldUserId,
                //權杖，表示由自己網站發出的請求
                _token: "{{ csrf_token() }}"
            },
            success: function(msg) {
                //trim():去除空白
                if (msg.trim() == "exist") {
                    $("#msg").html("<font color='red'>帳號已存在</font>");
                    //將焦點移回userId輸入框
                    $("#userId").focus();
                }
            }
        });
    }
}
</script>
<div class="container">
    <div class="row">
        <form method="post" action="../update">
            <input type="hidden" name="id" value="{{ $manager->id}}">
            {{ csrf_field() }}
            <h3>修改管理者資料</h3>
            <div class="row mt-3">
                <label class="col-1 col-form-label text-right">帳號</label>
                <div class="col-4">
                    <input type="text" class="form-control" name="userId" id="userId" required autofocus
                        onblur="checkManager()" maxlength="10" value="{{ $manager->userId }}" onblur="checkManager()">
                </div>
                <div class="col-4">
                    <div id="msg"></div>
                </div>
            </div>
            <div class="row mt-3">
                <label class="col-1 col-form-label text-right">密碼</label>
                <div class="col-4">
                    <input type="password" class="form-control" name="pwd" required>
                </div>
            </div>
            <div class="card-body text-center mt-3">
                <button class="btn btn-primary" name="submit">確 定</button>　
                <a href="/admin/manager/list" class="btn btn-secondary">回上頁</a>
            </div>
        </form>
    </div>
</div>
@endsection