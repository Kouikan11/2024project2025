@extends("admin.layout")
@section("title","新增招募")
@section("content")
<div class="container py-3">
    <form method="post" action="insert" enctype="multipart/form-data">
        <!--要上傳檔案一定要加enctype-->
        {{ csrf_field() }}
        <h3>新增招募</h3>
        <div class="row mt-3">
            <label class="col-1 col-form-label text-right">申請人</label>
            <div class="col-4">
                <input type="text" class="form-control" name="nickName" id="nickName" required>
            </div>
        </div>
        <div class="row mt-3">
            <label class="col-1 col-form-label text-right">申請人帳號</label>
            <div class="col-4">
                <input type="text" class="form-control" name="address" id="address" required>
            </div>
        </div>
        <div class="row mt-3">
            <label class="col-1 col-form-label text-right">系統</label>
            <div class="col-4">
                <input type="text" class="form-control" name="system" required>
            </div>
        </div>
        <div class="row mt-3">
            <label class="col-1 col-form-label text-right">模組</label>
            <div class="col-4">
                <input type="text" class="form-control" name="module" required>
            </div>
        </div>
        <div class="row mt-3">
            <label class="col-1 col-form-label text-right">招募人數</label>
            <div class="col-4">
                <input type="number" class="form-control" name="nuOfMember" id="nuOfMember" min="2" max="5" required>
            </div>
        </div>
        <div class="row mt-3">
            <label class="col-1 col-form-label text-right">等級</label>
            <div class="col-4">
                <input type="text" class="form-control" name="level">
            </div>
        </div>
        <div class="row mt-3">
            <label class="col-1 col-form-label text-right">預約日期</label>
            <div class="col-4">
                <input type="date" class="form-control" name="dateTime" id="dateTime" value="" required>
            </div>
        </div>
        <div class="row mt-3">
            <label class="col-1 col-form-label text-right">預約時段</label>
            <div class="col-4">
                <select size="1" name="timeSlot">
                    <option value="全天/13:00~21:00" selected>全天/13:00~21:00</option>
                    <option value="半天/13:00~18:00">半天/13:00~18:00</option>
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <label class="col-1 col-form-label text-right">簡介</label>
            <div class="col-4">
                <textarea class="form-control" rows="4" cols="50" name="content" id="content" maxlength="120" value=""
                    required></textarea>
            </div>
        </div>
        <div class="row mt-3">
            <label class="col-1 col-form-label text-right">GM</label>
            <div class="col-4">
                <input type="text" class="form-control" name="gm" required>
            </div>
        </div>
        <div class="row mt-3">
            <label class="col-1 col-form-label text-right">申請進度</label>
            <div class="col-4">
                <select size="1" name="process">
                    <option value="review" selected>審核中</option>
                    <option value="passed">已通過</option>
                    <option value="finished">已結團</option>
                </select>
            </div>
        </div>
        <div class="card-body text-center mt-3">
            <button class="btn btn-primary" name="submit">確 定</button>　
            <a href="/admin/recruitment/list" class="btn btn-secondary">回上頁</a>
        </div>
    </form>
</div>
@endsection
