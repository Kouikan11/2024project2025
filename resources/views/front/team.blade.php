@extends('front.app')
@section('title', '團隊招募')
@section('content')
<style>
    .card2 {
        border-radius: 50px;
    }

    .button3 {
        padding: 5px 10px;
        font-size: 16px;
        border: 2px solid transparent;
        border-radius: 30px;
        background-color: #7E0137;  /* 初始顏色 */
        color: white;
        cursor: pointer;
        transition: all 0.3s ease;  /* 變色時加上過渡效果 */
    }

    .button3:hover {
        background-color: #970a49;  /* 滑鼠懸停時的顏色 */
        border-color: #970a49;     /* 邊框顏色改變 */
    }
</style>
<div class="gw pt-1">
    <label class="recordLabel">團隊招募</label>
    <div class="container row ms-3" style="display: flex;justify-content: center;align-items: center; ">
        @foreach ($recruitments as $data)
        <div class="card2 m-3 align-self: start;">
            <div class="row">
                <div class="card-img-top text-center">
                    <div style="background-color: #3e4f3d; width: 100%; color:#fff;font-size:40pt;">
                        {{ $data->system }}
                    </div>
                    <div style="background-color: #3e4f3d; width: 100%; color:#fff;font-size:28pt;">
                        {{ $data->module }}
                    </div>
                    <div class="text-center mb-3"
                        style="background-color: #dccbbb; width: 100%; color:#3e4f3d;font-size:18pt;">
                        <p class="min=0 output='if(value<0)value=0'">
                            {{ $data->result }}</br>目前還剩餘{{ $data->remainingNo }}個名額</p>
                    </div>
                </div>
                <div class="p-4">
                    <ul style="font-size: 18px; text-align:left;line-height:0.8;">
                        <li>招募人：{{ $data->nickName }}</li></br>
                        <li>GM：{{ $data->gm }}</li></br>
                        <li>系統：{{ $data->system }}</li></br>
                        <li>模組：{{ $data->module }}</li></br>
                        <li>等級：{{ $data->level }}</li></br>
                        <li>招募人數：{{ $data->nuOfMember }}</li></br>
                        <li>時間：{{ $data->dateTime }}</br></br>　　　{{ $data->timeSlot }}</li></br>
                        <li style="line-height:24px;height:160px">簡介：</br>{{ $data->content }}</li></br>
                    </ul>

                    <form method="POST" action="/team">
                        {{ csrf_field() }}
                        <input type="hidden" name="recruitment_id" value="{{ $data->id }}">
                        <div style="display: flex;justify-content: center;">
                            <!-- 如果 remainingNo 不等於 0，顯示按鈕 -->
                            @if($data->remainingNo > 0)
                            <button type="button" id="attendForm" class="button3" onclick="doAttend(event)">
                                我要參加
                            </button>
                            @else
                            <!-- 如果 remainingNo 等於 0，不顯示按鈕 -->
                            <p style="font-size:16pt; color:red">名額已滿</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
