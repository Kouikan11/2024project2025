@extends('front.app');
@section('title', 'GM介紹')
@section('content')
<style>
/* 設定翻轉效果 */
.flip-card {
    perspective: 1000px;
    /* 添加透視效果 */
}

.flip-card .card {
    transition: transform 1s;
    /* 設置過渡時間 */
    transform-style: preserve-3d;
    /* 使卡片保持3D效果 */
}

.flip-card:hover .card {
    transform: rotateY(360deg);
    /* 懸停時旋轉，實現翻轉效果 */
}

/* 保持卡片內部的內容顯示 */
.card-body {
    padding: 15px;
}

/* 可選：增加卡片的陰影和背景 */
.card {
    background-color: #ffffff;
    box-shadow: 0 5px 8px rgba(0, 0, 0, 0.3);
}
</style>
<div class="gw pt-lg-1">
    <div>
        <label class="recordLabel">GM介紹</label>
        <p class="recordP">「遊戲主持人」（Game Master，簡稱GM），負責設計世界背景、故事情節、並扮演非玩家角色（NPC），提供玩家互動的情境。
        <p>
            <center>
                <div class="container row mx-3">
                    @foreach ($list as $data)
                    <div class="flip-card m-3" style="width: 20rem;">
                        <div class="card">
                            <img class="card-img-top" src="/images/intro/{{ $data->picture }}" alt="Card image cap">
                            <div class="card-body">
                                <h3 class="card-title">{{ $data->title }}</h3>
                                <p>{{ $data->content }}</p>
                                <div class="dashed-line"></div>
                                <p>擅長的系統：</br>
                                    {{ $data->gm_system }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </center>
    </div>
</div>
@endsection