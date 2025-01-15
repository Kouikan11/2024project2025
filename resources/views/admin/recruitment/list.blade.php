@extends("admin.layout")
@section("title","招募管理")
@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>招募管理</h3>
                <a href="add" class="btn btn-primary">新增</a>　
                <a href="javascript:doDelete('list')" class="btn btn-danger">刪除</a>
            </div>
            <form id="list" method="post" action="/admin/recruitment/delete">
                {{ csrf_field() }}
                <table class="table table-border border border-dark">
                    <tr class="table-warning">
                        <th class="text-center border border-dark" style="width: 50px;">
                            <input type="checkbox" class="form-check-input border border-dark" id="all">
                        </th>
                        <th class="col-1 text-center border border-dark">申請時間</th>
                        <th class="col-1 text-center border border-dark">申請人(帳號)</th>
                        <th class="col-1 text-center border border-dark">系統</th>
                        <th class="col-1 text-center border border-dark">模組</th>
                        <th class="col-1 text-center border border-dark">等級</th>
                        <th class="col-1 text-center border border-dark">招募人數</th>
                        <th class="col-1 text-center border border-dark">簡介</th>
                        <th class="col-1 text-center border border-dark">預約時間</th>
                        <th class="col-1 text-center border border-dark">GM</th>
                        <th class="col-1 text-center border border-dark">申請進度</th>
                        <th class="col-1 text-center border border-dark">參加團員</th>
                        <th class="col-1 text-center border border-dark">修改</th>
                    </tr>
                    @foreach($recruitments as $data)
                    <tr>
                        <td class="text-center align-middle border border-dark" style="width: 50px;">
                            <input type="checkbox" name="id[]" class="chk form-check-input border border-dark"
                                value="{{ $data->id }}">
                        </td>
                        <td class="text-center align-middle border border-dark">{{ $data->createTime }}</td>
                        <td class="text-center align-middle border border-dark">
                            {{ $data->nickName }}</br>{{ $data->address }}
                        </td>
                        <td class="text-center align-middle border border-dark">{{ $data->system }}</td>
                        <td class="text-center align-middle border border-dark">{{ $data->module }}</td>
                        <td class="text-center align-middle border border-dark">{{ $data->level }}</td>
                        <td class="text-center align-middle border border-dark">{{ $data->nuOfMember }}</td>
                        <td class="text-center align-middle border border-dark">
                            <div class="content" style="width: 150px; height: 150px;overflow:scroll">
                                <p>{{ $data->content }}</p>
                            </div>
                        </td>
                        <th class="col-1 text-center border border-dark">{{ $data->dateTime }}</br>{{ $data->timeSlot }}
                        </th>
                        <td class="text-center align-middle border border-dark">{{ $data->gm }}</td>
                        <td class="text-center align-middle border border-dark">{{ $data->process }}</td>
                        <td class="text-center align-middle border border-dark">
                            @foreach($data->users as $user)
                            {{ $user->nickName }}<br>
                            @endforeach
                        </td>
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