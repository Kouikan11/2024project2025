@extends('front.app');
@section('title', '玩法介紹')
@section('content')
<style>
.floating-image {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.floating-image:hover {
    transform: translateY(-10px);
    /* 上浮10px */
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    /* 增加陰影效果 */
}
</style>

<div class="gw pt-lg-1">
    <label class="recordLabel">什麼是TRPG?</label>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-7">
            <img src="/images/intro/trpg_intro2.jpg" width="100%" height="flex" alt="trpgIntro" style="margin: 10px;"
                class="shadow mt-1 p-1 floating-image">
        </div>
        <div class="col-sm-12 col-md-12 col-lg-5">
            <p style="margin: 20px;">　　桌上角色扮演遊戲（Tabletop Role-Playing Game，簡稱TRPG）是一種由玩家在桌面上進行的互動性故事遊戲。
                遊戲的核心在於玩家扮演各種虛構角色，並根據遊戲規則與敘事進程，共同創建一個故事，讓玩家在想像和創意中進行冒險。</p>
            <p style="margin: 20px;">　通常由一位「遊戲主持人」（Game Master，簡稱GM）主導，設計世界背景、故事情節、並扮演非玩家角色（NPC），提供玩家互動的情境。
                玩家則根據自己創建的角色背景、技能和個性，做出選擇並推動故事發展。當角色進行某些行動時，會透過擲骰子來決定結果，
                骰子的數值與角色的能力值相結合，決定行動是否成功。</p>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-5">
                <p style="margin: 20px;">　　TRPG的魅力在於其極大的自由度，玩家可以選擇探索世界、解決謎題、與其他角色互動，甚至改變故事的走向。它不僅考驗玩家的策略與決策能力，
                    還能激發合作與創意，因為整個遊戲的進行依賴於集體的敘事與角色扮演。</p>

                <p style="margin: 20px;">　　常見的TRPG系統包括《龍與地下城》（Dungeons & Dragons）、《克蘇魯的呼喚》（The Call of
                    Cthulhu）等，每個系統擁有自己獨特的規則和世界觀。
                    無論是初學者還是老手，都能在TRPG的世界中找到樂趣，享受創造與探索的無限可能。</p>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-7">
                <img src="/images/intro/trpg_intro3.jpg" width="100%" height="flex" alt="trpgIntro"
                    style="margin: 10px;" class="shadow mt-1 p-1 floating-image">
            </div>
        </div>
    </div>
    @endsection