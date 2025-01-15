@extends("admin.layout")
@section("title","管理者管理")
@section("content")
<link rel="stylesheet" href="/admin/css/lightbox.min.css">
<script src="/admin/js/lightbox.min.js"></script>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>管理者管理</h3>
                <a href="add" class="btn btn-primary">新增</a>　
                <a href="javascript:doDelete('list')" class="btn btn-danger">刪除</a>
            </div>
            <form id="list" method="post" action="/admin/manager/delete">
                {{ csrf_field() }}
                <table class="table table-border border border-dark">
                    <tr class="table-warning">
                        <th class="col-1 text-center border border-dark">
                            <input type="checkbox" class="form-check-input border border-dark" id="all">
                        </th>
                        <th class="col-3 text-center border border-dark">帳號</th>
                        <th class="col-3 text-center border border-dark">密碼</th>
                        <th class="col-2 text-center border border-dark">修改</th>
                    </tr>
                    @foreach($list as $manager)
                    <tr>
                        <td class="text-center align-middle border border-dark">
                            <input type="checkbox" name="id[]" class="chk form-check-input border border-dark"
                                value="{{ $manager->id }}">
                        </td>
                        <td class="text-center align-middle border border-dark">{{ $manager->userId }}</td>
                        <td class="text-center align-middle border border-dark">******</td>
                        <td class="text-center align-middle border border-dark">
                            <a href="edit/{{ $manager->id }}" class="btn btn-success">修改</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </form>
        </div>
    </div>
</div>
@endsection
