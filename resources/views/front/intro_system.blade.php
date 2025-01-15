@extends('front.app')
@section('title', '系統介紹')
@section('content')

<div class="gw pt-lg-1">
    <div class="introduction">
        <label class="recordLabel">遊戲系統介紹</label>
        <p class="recordP">每一個系統都是一個不同的世界觀，從魔法、精靈、矮人與巨龍的經典奇幻世界到民俗靈異本土故事，任君挑選
        </p>
        <div class="container">
            <div class="row">
                @foreach ($list as $data)
                <div class="card m-3" style="width: 20rem; background-color: #ffffff; cursor: pointer;">
                    <img class="card-img-top" src="/images/intro/{{ $data->picture }}" alt="Card image cap">
                    <div class="card-body">
                        <h3 class="card-title">{{ $data->title }}</h3>
                        <h5 class="card-title">{{ $data->subtitle }}</h5>
                        <div style="height: 180px; overflow-y:scroll;" class="scrollbar">
                            <p class="card-text">{{ $data->content }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- 新增的背景遮罩 -->
<div class="overlay"></div>

<!-- 新增的 JavaScript -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const cards = document.querySelectorAll(".card.m-3");
    const overlay = document.querySelector(".overlay");

    cards.forEach((card) => {
        card.addEventListener("click", function(event) {
            event.stopPropagation(); // 防止點擊卡片本身觸發背景的點擊事件
            card.classList.add("card-expanded");
            overlay.style.display = "block";

            // 動態調整文字區塊高度，確保內容完整呈現
            const cardText = card.querySelector(".card-text");
            if (cardText) {
                cardText.style.height = "auto";
                cardText.style.overflowY = "visible"; // 取消滾動條
            }
        });
    });

    // 點擊背景遮罩或空白區域時取消放大
    overlay.addEventListener("click", function() {
        const expandedCard = document.querySelector(".card-expanded");
        if (expandedCard) {
            expandedCard.classList.remove("card-expanded");

            // 還原滾動條設置
            const cardText = expandedCard.querySelector(".card-text");
            if (cardText) {
                cardText.style.height = "180px"; // 還原原本的高度
                cardText.style.overflowY = "hidden"; // 取消滾動條顯示
            }
        }
        overlay.style.display = "none";
    });
});
</script>

<!-- 新增的 CSS -->
<style>
/* 放大卡片的樣式 */
.card-expanded {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(1.5);
    z-index: 1050;
    /* 使卡片顯示在最上層 */
    transition: all 0.3s ease-in-out;
    width: 100rem;
    /* 放大後的寬度 */
    height: auto;
    /* 自適應高度 */
    box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.5);
}

/* 放大後固定文字的字體大小 */
.card-expanded .card-text {
    font-size: 10px;
    /* 固定字體大小 */
    line-height: 1.5;
    /* 調整行高 */
    height: auto;
    /* 取消高度限制 */
    overflow: visible;
    /* 取消滾動條 */
}

/* 背景遮罩樣式 */
.overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 1049;
    /* 在卡片下方但遮蓋背景 */
    display: none;
}

/* 還原卡片的文字區塊樣式 */
.card .card-text {
    height: 180px;
    /* 固定高度 */
    overflow-y: hidden;
    /* 隱藏滾動條 */
}
</style>

@endsection