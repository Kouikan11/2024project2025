@extends("admin.layout")
@section("title","GM管理")
@section("content")
<link rel="stylesheet" href="/admin/css/lightbox.min.css">
<script src="/admin/js/lightbox.min.js"></script>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>GM管理</h3>
                <a href="add" class="btn btn-primary">新增</a>　
                <a href="javascript:doDelete('list')" class="btn btn-danger">刪除</a>
            </div>
            <form id="list" method="post" action="/admin/gm/delete">
                {{ csrf_field() }}
                <table class="table table-border border border-dark">
                    <tr class="table-warning">
                        <th class="col-1 text-center border border-dark">
                            <input type="checkbox" class="form-check-input border border-dark" id="all">
                        </th>
                        <th class="col-1 text-center border border-dark">姓名</th>
                        <th class="col-2 text-center border border-dark">圖檔</th>
                        <th class="col-4 text-center border border-dark">簡介</th>
                        <th class="col-3 text-center border border-dark">擅長系統</th>
                        <th class="col-1 text-center border border-dark">修改</th>
                    </tr>
                    @foreach($list as $data)
                    <tr>
                        <td class="text-center align-middle border border-dark">
                            <input type="checkbox" name="id[]" class="chk form-check-input border border-dark"
                                value="{{ $data->id }}">
                        </td>
                        <td class="text-center align-middle border border-dark">{{ $data->title }}</td>
                        <td class="text-center align-middle border border-dark">
                            @if (!empty($data->picture))
                            <a href="/images/intro/{{ $data->picture }}" data-lightbox="image"
                                data-title="{{ $data->title }}">
                                <img src="/images/intro/{{ $data->picture }}" width="80">
                            </a>
                            @endif
                        </td>
                        <td class="text-center align-middle border border-dark">{{ $data->content }}</td>
                        <td class="text-center align-middle border border-dark">{{ $data->gm_system }}</td>
                        <td class="text-center align-middle border border-dark">
                            <a href="edit/{{ $data->id }}" class="btn btn-success">修改</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </form>
        </div>
    </div>
</div>
@endsection