@extends("admin.layout")
@section("title","修改GM資料")
@section("content")
<div class="container py-3">
    <form method="post" action="../update">
        <input type="hidden" name="id" value="{{ $gm->id }}">
        {{ csrf_field() }}
        <h3>修改GM資料
        </h3>
        <div class="row mt-3">
            <label class="col-1 col-form-label text-right">GM暱稱</label>
            <div class="col-4">
                <input type="text" class="form-control" name="title" id="title" value="{{ $gm->title }}" required
                    maxlength="10">
            </div>
        </div>
        <div class="row mt-3">
            <label class="col-1 col-form-label text-right">簡介</label>
            <div class="col-4">
                <textarea class="form-control" rows="4" cols="50" name="content" id="content"
                    required>{{ $gm->content }}</textarea>
            </div>
        </div>
        <div class="row mt-3">
            <label class="col-1 col-form-label text-right">擅長系統</label>
            <div class="col-4">
                <textarea class="form-control" rows="4" cols="50" name="gm_system" id="gm_system"
                    required>{{ $gm->gm_system }}</textarea>
            </div>
        </div>
        <div class="row mt-3">
            <label class="col-1 col-form-label text-right">圖片</label>
            <div class="col-4">
                <input type="file" class="form-control" name="picture" required>
            </div>
            @if (!empty($gm->picture))
            <div class="mt-3">
                <a href="/images/intro/{{ $gm->picture }}" data-lightbox="image" data-title="{{ $gm->picture }}">
                    <img src="/images/intro/{{ $gm->picture }}" width="80">
                </a>
            </div>
            @endif
        </div>
        <div class="text-center mt-3">
            <button class="btn btn-primary" name="submit">確 定</button>　
            <a href="/admin/gm/list" class="btn btn-secondary">回上頁</a>
        </div>
    </form>
</div>
@endsection