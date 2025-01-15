<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="ie=edge, chrome=1">
    <meta name="description" content="專案">
    <link rel="preload" as="script" href="/public/js/script.min.js">
    <link rel="preload" as="style" href="/css/layout.min.css">
    <link rel="preload" as="image" href="/images/map.svg">
    <link rel="stylesheet" type="text/css" href="/css/index.min.css">
    <link rel="stylesheet" type="text/css" href="/css/menu.min.css">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/layout.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;500;700&amp;display=swap"
        rel="stylesheet">
    <title>全端網頁專題</title>
    <style>
    main {
        margin-top: 45px;
        /* 根據導覽列的高度調整 */
    }

    .thetime {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 60px;
        padding: 20px;
        flex-direction: row;
        gap: 50px;
        place-items: center;
    }

    .right-content {
        display: flex;
        /* 使用flexbox布局 */
        flex-direction: column;
        /* 設置子元素從上到下排列 */
        height: 100%;
        /* 父元素的高度設為100% */
        align-items: flex-start;
        justify-content: flex-start;
        /* 子元素分佈在父元素的上下兩端 */
        margin-top: 20px;
        place-items: center;
    }

    .timetitle {
        margin-bottom: 100px;
    }

    /* 標題和按鈕樣式 */
    .timetitle h3 {
        font-size: 1.5rem;
        margin-bottom: 10px;
    }

    .timebtn input {
        background-color: #7E0137;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 30px;
        cursor: pointer;
    }

    .timebtn input:hover {
        background-color: #990045;
        /* 增加 hover 效果 */
    }

    .iftimebtn {
        background-color: #7E0137;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 30px;
        cursor: pointer;
    }

    .iftimebtn input:hover {
        background-color: #990045;
        /* 增加 hover 效果 */
    }

    /* 響應式樣式 */
    @media (max-width: 700px) {
        .thetime {
            flex-direction: column;
            align-items: center;
        }

        .right-content {
            align-items: center;
            margin-top: 20px;
        }

        iframe {
            width: 100%;
            height: 300px;
        }

        .timetitle h3 {
            text-align: center;
            font-size: 1.2rem;
        }

        .timebtn input {
            width: 100%;
            max-width: 200px;
        }
    }

    .more {
        text-align: right;
        /* 將文字內容對齊到右邊 */
    }


    .ban-container {
        position: relative;
        overflow: hidden;
        height: 200px;
    }

    .ban-images {
        display: flex;
        transition: transform 1s ease;
    }

    .ban-images img {
        width: 100%;
        height: 200px;
    }

    .prev,
    .next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: transparent;
        /* 去掉背景色 */
        color: white;
        border: none;
        padding: 10px;
        font-size: 30px;
        /* 設置較大字型，顯示清晰的箭頭 */
        cursor: pointer;
    }

    .prev {
        left: 10px;
    }

    .next {
        right: 10px;
    }

    .prev:hover,
    .next:hover {
        background-color: rgba(0, 0, 0, 0.3);
        /* hover 效果 */
        border-radius: 50px
    }

    #cards-wrapper {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 380px;
        overflow: hidden;
    }

    .cards-container {
        display: flex;
        gap: 20px;
        width: 100%;
        height: 100%;
        overflow-x: auto;
        overflow-y: hidden;
        /* 隱藏垂直滾動條 */
        scroll-behavior: smooth;
        scroll-snap-type: x mandatory;
        /* 提供平滑滾動效果 */
        padding: 10px;
    }

    .card1 {
        width: 25vh;
        /* 卡片寬度根據視窗寬度調整 */
        height: 35vh;
        padding: 2em;
        border: 1px solid #ddd;
        box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
        flex: 0 0 auto;
        border-radius: 30px;
        background-color: #ffffff;
        overflow: hidden;
        /* 隱藏溢出內容 */
        scroll-snap-align: center;
        /* 卡片居中對齊 */
        box-sizing: border-box;
        /* 包括邊框和內邊距 */
        transition: transform 0.3s, box-shadow 0.3s, filter 0.3s;
        cursor: pointer;
        box-sizing: border-box;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card1:hover {
        transform: scale(1.03);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        opacity: 3;
        filter: brightness(1.1);
    }

    .cardtext {
        font-size: 1em;
        /* 文字大小基於卡片 */
    }

    .cards-container::-webkit-scrollbar {
        height: 8px;
        /* 控制滾動條高度 */
    }

    .cards-container::-webkit-scrollbar-thumb {
        background: #ccc;
        border-radius: 4px;
    }

    /* 僅在螢幕寬度較小時縮小卡片 */
    @media (max-width: 768px) {
        .card1 {
            width: 200px;
            /* 小螢幕時調整卡片寬度 */
            height: 250px;
            /* 小螢幕時調整卡片高度 */
        }
    }

    @media (max-width: 480px) {
        .card1 {
            width: 150px;
            /* 更小螢幕時進一步調整卡片寬度 */
            height: 200px;
            /* 更小螢幕時調整卡片高度 */
        }
    }

    /* 基本的按鈕樣式 */
    .trpgbtn {
        padding: 15px 30px;
        font-size: 16px;
        border: 2px solid transparent;
        border-radius: 30px;
        background-color: #7E0137;
        /* 初始顏色 */
        color: white;
        cursor: pointer;
        transition: all 0.3s ease;
        /* 變色時加上過渡效果 */
        margin-bottom: 30px;
    }

    /* 滑鼠懸停效果 */
    .trpgbtn:hover {
        background-color: #990045;
        /* 滑鼠懸停時的顏色 */
        border-color: #990045;
        /* 邊框顏色改變 */
    }

    /* 響應式設計：適應不同螢幕尺寸 */
    @media (max-width: 600px) {
        .trpgbtn {
            font-size: 14px;
            /* 手機螢幕上字體縮小 */
            padding: 12px 25px;
            /* 按鈕內距調整 */
        }
    }

    @media (max-width: 400px) {
        .trpgbtn {
            font-size: 12px;
            /* 超小螢幕時字體再縮小 */
            padding: 10px 20px;
            /* 進一步調整按鈕大小 */
        }
    }

    /* 基本樣式調整 */
    form {
        width: 300px;
    }

    /* 在小螢幕上調整輸入框大小 */
    @media (max-width: 768px) {
        .footer-inner {
            flex-direction: column;
            align-items: center;
        }

        .left {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            width: 100%;
        }

        form input,
        form textarea {
            width: 100%;
        }

        form input[type="text"],
        form input[type="email"] {
            font-size: 16px;
            margin-bottom: 10px;
        }

        form textarea {
            font-size: 16px;
        }
    }

    /* 在更大的螢幕上顯示更寬的欄位 */
    @media (min-width: 769px) {
        .footer-inner {
            display: flex;
            justify-content: space-between;
        }

        .left {
            text-align: left;
        }

        form input[type="text"],
        form input[type="email"],
        form textarea {
            font-size: 18px;
        }
    }

    /* 基本樣式調整 */
    .footer-line {
        background-color: #024135;
        transition: all 0.3s ease;
        /* 過渡效果 */
        height: 30vh;
    }

    /* 響應式設計 */
    @media (max-width: 768px) {
        .footer-inner {
            flex-direction: column;
            align-items: center;
        }

        .footer-line {
            width: 100%;
            height: 1px;
            /* 改為橫線 */
        }

        .left,
        .right {
            text-align: center;
            margin-bottom: 20px;
        }

        form input[type="text"],
        form input[type="email"],
        form textarea {
            width: 100%;
            /* 調整寬度以適應小螢幕 */
        }
    }
    </style>
    <script>
    let currentIndex = 0;
    const images = document.querySelectorAll('.ban-images img');
    const totalImages = images.length;

    // 自動切換圖片
    function autoSlide() {
        currentIndex = (currentIndex + 1) % totalImages; // 循環顯示圖片
        updateCarousel();
    }

    // 更新輪播顯示
    function updateCarousel() {
        const carousel = document.querySelector('.ban-images');
        carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
    }

    // 手動切換圖片
    document.querySelector('.prev').addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + totalImages) % totalImages; // 上一張
        updateCarousel();
    });

    document.querySelector('.next').addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % totalImages; // 下一張
        updateCarousel();
    });

    // 設定每5秒自動切換
    setInterval(autoSlide, 5000);

    document.addEventListener('DOMContentLoaded', () => {
        const cardsContainer = document.querySelector('.cards-container');
        const prevBtn = document.querySelector('.carousel-control-prev');
        const nextBtn = document.querySelector('.carousel-control-next');

        // 檢查是否需要顯示箭頭
        function toggleArrows() {
            const isScrollable = cardsContainer.scrollWidth > cardsContainer.clientWidth;
            prevBtn.style.display = isScrollable ? 'block' : 'none';
            nextBtn.style.display = isScrollable ? 'block' : 'none';
        }

        // 點擊箭頭滾動
        prevBtn.addEventListener('click', () => {
            cardsContainer.scrollLeft -= 300; // 向左滾動 300px
        });

        nextBtn.addEventListener('click', () => {
            cardsContainer.scrollLeft += 300; // 向右滾動 300px
        });

        // 當視窗大小改變時重新檢查
        window.addEventListener('resize', toggleArrows);

        // 初始檢查
        toggleArrows();
    });

    const card = document.querySelector('.card1');
    const cardText = document.querySelector('.cardtext');

    function adjustTextSize() {
        const cardWidth = card.offsetWidth;
        cardText.style.fontSize = (cardWidth * 0.05) + 'px'; // 調整文字大小比例
    }

    window.addEventListener('resize', adjustTextSize);
    adjustTextSize(); // 初始化
    </script>

</head>

<body>
    <div id="page" class="bg-linear-primary pos-r container-fluid px-0">
        <div class="pos-ab w-100 pos-ab-b pos-ab-t pos-ab-l bg-cover bgpos-x-center bgpos-y-right"
            style="background-color: #A6BAAE"></div>
        <!--pos-ab-->
        <div class="pos-ab w-100 pos-ab-b pos-ab-t pos-ab-l pos-ab-y-e" style="background-color: #A6BAAE"></div>
        <!--pos-ab-->
        <div class="pos-ab w-100 h-100 pos-ab-t pos-ab-l pos-ab-y-s " style="background-color: #A6BAAE"></div>
        <!--pos-ab-->
        <input type="checkbox" id="m-ctrl" hidden="">
        <header>
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg navbar-light navmenu" style="background-color: #a6baae;">
                    <a class="navbar-brand" href="/"><img src="images/logo2.png" width="32" height="32"
                            class="d-inline-block align-top" alt=""><span class="h4 mx-1">旅行者之家</span></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="/intro" id="navbarDropdownMenuLink"
                                    role="button" data-toggle="dropdown" aria-expanded="false">
                                    TRPG須知
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item" href="/intro">玩法須知</a></li>
                                    <li><a class="dropdown-item" href="/intro_system">系統介紹</a></li>
                                    <li><a class="dropdown-item" href="/intro_gm">GM介紹</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="/team">團隊招募</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="/user" id="navbarDropdownMenuLink"
                                    role="button" data-toggle="dropdown" aria-expanded="false">
                                    旅行者專區
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item" href="/user">個人資料管理</a></li>
                                    <li><a class="dropdown-item" href="/recruitment">招募申請</a></li>
                                    <li><a class="dropdown-item" href="/record">旅行者日誌</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                @if(session()->has('address'))
                                <a class="nav-link" href="/logout" onclick="return confirm('您確定要登出嗎?')">
                                    登出
                                </a>
                                @else
                                <a class="nav-link" href="/login">登入</a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <div id="page" class="bg-linear-primary pos-r container-fluid px-0">
            <main style="background-color:#EEDFD0;" class="gw pt-lg-0 remove-bg">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item">
                            <a href="/intro"><img class="d-block w-100" src="/images/banner1.jpg" alt="First slide"></a>
                        </div>
                        <div class="carousel-item">
                            <a href="/intro_system"><img class="d-block w-100" src="/images/banner2.jpg"
                                    alt="Second slide"></a>
                        </div>
                        <div class="carousel-item active">
                            <a href="/team"><img class="d-block w-100" src="/images/banner3.jpg" alt="Third slide"></a>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"
                        style="width: 20%; height: 20%; margin-top: 20%;">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"
                        style="width: 20%; height: 20%; margin-top: 20%;">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="homecontent" align="center" style="margin-top: 30px;">
                    <h1>Hello！Players！</h1>
                    <h2>嗨
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-stars" viewBox="0 0 16 16">
                            <path
                                d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.73 1.73 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.73 1.73 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.73 1.73 0 0 0 3.407 2.31zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.16 1.16 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.16 1.16 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732z" />
                        </svg>歡迎各位旅行者的到訪！
                    </h2>
                    <hr style="border: 5px solid #967462; width: 500px">
                </div>
                <div class="content2" style="padding: 50px;">
                    <h1>
                        <svg xmlns="http://www.w3.org/2000/svg" style="margin: 10px;" width="30" height="30"
                            fill="currentColor" class="bi bi-flag-fill" viewBox="0 0 16 16">
                            <path
                                d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12 12 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A20 20 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a20 20 0 0 0 1.349-.476l.019-.007.004-.002h.001" />
                        </svg>冒險世界從何開始？
                    </h1>
                    <h3>首先，先找出自己想玩、會喜歡的、想體驗的遊戲系統！</h3>
                    <h5>喜歡角色扮演嗎？<br>想像自己是一名高貴的精靈穿梭在林間，尋找魔法的泉源；或是今天當一名邪惡的獸人，燒殺擄掠，把自詡正義的冒險者打得落花流水？或者用從來沒有人想過的另一種身分，展開最獨特的冒險旅程？
                    </h5>
                    <h5>還是喜歡鬥智鬥勇？<br>細細研讀每一條規則，通盤審視整個局面，精算每一步行動可帶來的最大收益，展現出運籌帷幄的能力？</h5>
                    <h5>又或者是被曲折的故事劇情所吸引？<br>想知道發生在1937年的偏遠小鎮發生了什麼神祕事件，到底是什麼力量在背後作祟；居住在山巒洞窟中的矮人們又是為什麼要離鄉背井流浪四方，而他們的旅程又會如何劃下句點？
                    </h5>
                    <h5>又也許其實什麼想法都沒有，只是想嘗試傳說中的經典遊戲，也可能是被朋友推坑很不情願的翻起規則書？</h5>
                    <h4>但無論你的喜好是什麼，廣大的TRPG世界一定能滿足你最狂野的想像！</h4>
                    <hr style="border: 5px solid #967462; width: 350px; margin: 30px;">
                    <h1>
                        <svg xmlns="http://www.w3.org/2000/svg" style="margin: 10px;" width="30" height="30"
                            fill="currentColor" class="bi bi-emoji-surprise" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                            <path
                                d="M7 5.5C7 6.328 6.552 7 6 7s-1-.672-1-1.5S5.448 4 6 4s1 .672 1 1.5m4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 4 10 4s1 .672 1 1.5M10 11a2 2 0 1 1-4 0 2 2 0 0 1 4 0" />
                        </svg>現在，你是誰？
                    </h1>
                    <h4>找出想玩的系統，了解它的背景與世界觀了嗎？接下來，創造出你的化身，正式進入這個世界吧！</h4>
                    <h4>如果碰上了選擇困難，不妨就從角色的故事開始想吧！這個角色如何出生？如何成長？人生的經驗是什麼？他會擁有什麼樣的精神、物品、能力？</h4>
                    <h4>他可能不會是最強的，但絕對是最有血有肉，最真實的！</h4>
                    <hr style="border: 5px solid #967462; width: 350px; margin: 30px;">
                    <h1>
                        <svg xmlns="http://www.w3.org/2000/svg" style="margin: 10px;" width="30" height="30"
                            fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4m.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2" />
                        </svg>遊戲開始！現在應該注意的是......
                    </h1>
                    <h4>
                        <ul>
                            <li>尊重、友善、包容在場的所有人，尊重每個人為行動所做出的決定，不要求別人依照你的想法行動。</li>
                            <li>給予其他人表現的機會，不要在別人正在進行行動的時候發出干擾或打斷。</li>
                            <li>為了遊戲的順利進行，妥善的運用時間，不要遲到或是在遊戲中輪到自己時才在那裡想半天。</li>
                        </ul>
                        總而言之，TRPG本是社交活動，那麼與他人良好的互動便是一門非常重要的學問！
                    </h4>
                </div>
                <div align="center">
                    <a href="/register"><button class="trpgbtn">準備好就加入我們吧！</button></a>
                </div>
                <hr style="border: 2px solid #967462;">
                <div class="therecruit">
                    <h3 style="padding: 30px; color: #967462;" align="center">
                        參加招募
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-feather" viewBox="0 0 16 16">
                            <path
                                d="M15.807.531c-.174-.177-.41-.289-.64-.363a3.8 3.8 0 0 0-.833-.15c-.62-.049-1.394 0-2.252.175C10.365.545 8.264 1.415 6.315 3.1S3.147 6.824 2.557 8.523c-.294.847-.44 1.634-.429 2.268.005.316.05.62.154.88q.025.061.056.122A68 68 0 0 0 .08 15.198a.53.53 0 0 0 .157.72.504.504 0 0 0 .705-.16 68 68 0 0 1 2.158-3.26c.285.141.616.195.958.182.513-.02 1.098-.188 1.723-.49 1.25-.605 2.744-1.787 4.303-3.642l1.518-1.55a.53.53 0 0 0 0-.739l-.729-.744 1.311.209a.5.5 0 0 0 .443-.15l.663-.684c.663-.68 1.292-1.325 1.763-1.892.314-.378.585-.752.754-1.107.163-.345.278-.773.112-1.188a.5.5 0 0 0-.112-.172M3.733 11.62C5.385 9.374 7.24 7.215 9.309 5.394l1.21 1.234-1.171 1.196-.027.03c-1.5 1.789-2.891 2.867-3.977 3.393-.544.263-.99.378-1.324.39a1.3 1.3 0 0 1-.287-.018Zm6.769-7.22c1.31-1.028 2.7-1.914 4.172-2.6a7 7 0 0 1-.4.523c-.442.533-1.028 1.134-1.681 1.804l-.51.524zm3.346-3.357C9.594 3.147 6.045 6.8 3.149 10.678c.007-.464.121-1.086.37-1.806.533-1.535 1.65-3.415 3.455-4.976 1.807-1.561 3.746-2.36 5.31-2.68a8 8 0 0 1 1.564-.173" />
                        </svg>
                    </h3>
                    <div id="cards-wrapper" class="carousel slide" data-bs-ride="carousel">
                        @if (!session()->has('address'))
                        <a href="/login">
                            <div class="cards-container">
                                @foreach ($index as $data)
                                <div class="card1">
                                    <div style="width: 100%; height: 100%;" align="center">
                                        <p class="cardtext" style="word-wrap: break-word; white-space: normal;">
                                            GM：{{ $data->gm }}</p>
                                        <p class="cardtext" style="word-wrap: break-word; white-space: normal;">
                                            系統：{{ $data->system }}</p>
                                        <p class="cardtext" style="word-wrap: break-word; white-space: normal;">
                                            模組：{{ $data->module }}</p>
                                        <p class="cardtext" style="word-wrap: break-word; white-space: normal;">
                                            時間：{{ $data->dateTime }}<br>{{ $data->timeSlot }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </a>
                        @else
                        <a href="/team">
                            <div class="cards-container">
                                @foreach ($index as $data)
                                <div class="card1">
                                    <div style="width: 100%; height: 100%;" align="center">
                                        <p class="cardtext" style="word-wrap: break-word; white-space: normal;">
                                            GM：{{ $data->gm }}</p>
                                        <p class="cardtext" style="word-wrap: break-word; white-space: normal;">
                                            系統：{{ $data->system }}</p>
                                        <p class="cardtext" style="word-wrap: break-word; white-space: normal;">
                                            模組：{{ $data->module }}</p>
                                        <p class="cardtext" style="word-wrap: break-word; white-space: normal;">
                                            時間：{{ $data->dateTime }}<br>{{ $data->timeSlot }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </a>
                        @endif
                    </div>
                    @if (!session()->has('address'))
                    <div class="more">
                        <a href="/login" style="color: #967462; padding:20px; display: inline-block;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-search-heart-fill" viewBox="0 0 16 16">
                                <path
                                    d="M6.5 13a6.47 6.47 0 0 0 3.845-1.258h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1A6.47 6.47 0 0 0 13 6.5 6.5 6.5 0 0 0 6.5 0a6.5 6.5 0 1 0 0 13m0-8.518c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018" />
                            </svg>More......</a>
                    </div>
                    @else
                    <div class="more">
                        <a href="/team" style="color: #967462; padding:20px; display: inline-block;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-search-heart-fill" viewBox="0 0 16 16">
                                <path
                                    d="M6.5 13a6.47 6.47 0 0 0 3.845-1.258h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1A6.47 6.47 0 0 0 13 6.5 6.5 6.5 0 0 0 6.5 0a6.5 6.5 0 1 0 0 13m0-8.518c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018" />
                            </svg>More......</a>
                    </div>
                    @endif
                    <hr style="border: 2px solid #967462;">
                </div>

                <div class="thetime">
                    <iframe
                        src="https://calendar.google.com/calendar/embed?src=zh-tw.taiwan%23holiday%40group.v.calendar.google.com&ctz=Asia%2FTaipei"
                        style="border: 0; width: 50%; height: 400px; frameborder: 0; scrolling: no;"></iframe>
                    <div class="right-content">
                        <div class="timetitle">
                            <h3 style="color: #967462;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-hand-index-thumb" viewBox="0 0 16 16">
                                    <path
                                        d="M6.75 1a.75.75 0 0 1 .75.75V8a.5.5 0 0 0 1 0V5.467l.086-.004c.317-.012.637-.008.816.027.134.027.294.096.448.182.077.042.15.147.15.314V8a.5.5 0 0 0 1 0V6.435l.106-.01c.316-.024.584-.01.708.04.118.046.3.207.486.43.081.096.15.19.2.259V8.5a.5.5 0 1 0 1 0v-1h.342a1 1 0 0 1 .995 1.1l-.271 2.715a2.5 2.5 0 0 1-.317.991l-1.395 2.442a.5.5 0 0 1-.434.252H6.118a.5.5 0 0 1-.447-.276l-1.232-2.465-2.512-4.185a.517.517 0 0 1 .809-.631l2.41 2.41A.5.5 0 0 0 6 9.5V1.75A.75.75 0 0 1 6.75 1M8.5 4.466V1.75a1.75 1.75 0 1 0-3.5 0v6.543L3.443 6.736A1.517 1.517 0 0 0 1.07 8.588l2.491 4.153 1.215 2.43A1.5 1.5 0 0 0 6.118 16h6.302a1.5 1.5 0 0 0 1.302-.756l1.395-2.441a3.5 3.5 0 0 0 .444-1.389l.271-2.715a2 2 0 0 0-1.99-2.199h-.581a5 5 0 0 0-.195-.248c-.191-.229-.51-.568-.88-.716-.364-.146-.846-.132-1.158-.108l-.132.012a1.26 1.26 0 0 0-.56-.642 2.6 2.6 0 0 0-.738-.288c-.31-.062-.739-.058-1.05-.046zm2.094 2.025" />
                                </svg>預約時間申請
                            </h3>
                        </div>
                        @if (!session()->has('address'))
                        <div class="timebtn">
                            <a href="/login"><input type="button" value="我要預約" class="iftimebtn"></a>
                        </div>
                        @else
                        <div class="timebtn">
                            <a href="/recruitment"><input type="button" value="我要預約" class="iftimebtn"></a>
                        </div>
                        @endif
                    </div>
                </div>
            </main>
        </div>
        <footer>
            <div style="text-align: center;width: 100%; margin:10px">
                <h4 style="color: #024135;">聯絡我們</h4>
            </div>
            <div class="footer-inner d-flex align-items-center">
                <div class="left container px-xl-3 px-xs-4r pos-r text-end font">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3640.034200848298!2d120.610123!3d24.170533300000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34693e048d342aa9%3A0x2b6f18a6783fa3b!2z5Yue5YuV6YOo5Yue5YuV5Yqb55m85bGV572y5Lit5b2w5oqV5YiG572y77yI6Ie65Lit6IG36KiT5bGA77yJ!5e0!3m2!1szh-TW!2stw!4v1736302989894!5m2!1szh-TW!2stw"
                        width="100%" height="300" style="border:0; margin: 10px;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe><br>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-telephone-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                    </svg><span style="font-size: 15px;">電話：0426876541</span><br>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                    </svg><span style="font-size: 15px;">地址：403 台中市西屯區福科路396號</span><br>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-clock-fill" viewBox="0 0 16 16">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />
                    </svg><span style="font-size: 15px;">營業時間：每週二至日 12:00~21:00(週一公休)</span>
                </div>

                <div class="footer-line"></div>
                <!--中間線-->

                <div class="right">
                    <a href="https://www.facebook.com/"><img style="width: 35px;height: 35px; margin: 10px;"
                            src="/images/index/Facebook.png"></a>
                    <a href="https://www.instagram.com/"><img style="width: 35px;height: 35px; margin: 10px;"
                            src="/images/index/Instagram.png"></a>
                    <form action="{{ route('submit.message') }}" method="post" style="margin-top: 10px;">
                        @csrf
                        <h6 style="color: #024135;">有任何建議或問題歡迎來信！</h6>
                        <div style="display: flex; flex-wrap: wrap; gap: 5px;">
                            <input type="text" name="qaname" placeholder="該如何稱呼您？"
                                style="flex: 1 1 150px; width:100px; height: 30px; font-size: 20px;" required>
                            <input type="email" name="qaemail" placeholder="請輸入您的電子郵件"
                                style="flex: 1 1 250px; width: 250px; height: 30px; font-size: 20px;" required>
                        </div>
                        <textarea name="qacontent" cols="30" rows="10" placeholder="請輸入您寶貴的建議或問題！"
                            style="width: 300px; height: 150px; font-size: 20px; margin-top: 10px;" required></textarea>
                        <input type="submit" value="傳送" name="qasubmit"
                            style="width: 80px; height: 30px; background-color: #024135; color: #ffffff; border-radius: 30px; border: none; font-size: 20px;">
                        @if(session('success'))
                        <p>{{ session('訊息已傳送！') }}</p>
                        @endif
                    </form>
                </div>
            </div>
        </footer>
    </div>
    <!--page-->

    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="/js/script.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>


</body>

</html>