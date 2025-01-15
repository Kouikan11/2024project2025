@extends("admin.layout")
@section("title","新增GM")
@section("content")
<div class="container py-3">
    <form method="post" action="insert" enctype="multipart/form-data">
        <!--要上傳檔案一定要加enctype-->
        {{ csrf_field() }}
        <h3>新增GM</h3>
        <div class="row mt-3">
            <label class="col-1 col-form-label text-right">GM暱稱</label>
            <div class="col-4">
                <input type="text" class="form-control" name="title" id="title" required maxlength="10">
            </div>
        </div>
        <div class="row mt-3">
            <label class="col-1 col-form-label text-right">簡介</label>
            <div class="col-4">
                <textarea class="form-control" rows="4" cols="50" name="content" id="content" required></textarea>
            </div>
        </div>
        <div class="row mt-3">
            <label class="col-1 col-form-label text-right">擅長系統</label>
            <div class="col-4">
                <textarea class="form-control" rows="4" cols="50" name="gm_system" id="gm_system" required></textarea>
            </div>
        </div>
        <div class="row mt-3">
            <label class="col-1 col-form-label text-right">圖片</label>
            <div class="col-4">
                <input type="file" class="form-control" name="picture" required>
            </div>
        </div>
        <div class="text-center mt-3">
            <button class="btn btn-primary" name="submit">確 定</button>　　
            <a href="/admin/gm/list" class="btn btn-secondary">回上頁</a>
        </div>
    </form>
</div>
@endsection