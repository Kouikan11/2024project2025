<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge, chrome=1">
    <meta name="description" content="">
    <link rel="preload" as="script" href="/js/script.min.js">
    <link rel="preload" as="style" href="/css/layput.min.css">
    <link rel="preload" as="image" href="/images/map.svg">
    <link rel="stylesheet" type="text/css" href="/css/menu.min.css">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/layout.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.15.3/dist/sweetalert2.all.min.js
        "></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.15.3/dist/sweetalert2.min.css
" rel="stylesheet">
    <title>@yield('title')</title>
</head>

<body>
    @if (Session::has('message'))
    <script>
    Swal.fire("{{ Session::get('message') }}");
    </script>
    @endif
    <div id="page" style="background-color:#EEDFD0;">
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
                                    <li><a class="dropdown-item" href="/intro_system">遊戲系統介紹</a></li>
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
                            <li class="nav-item">
                                @if(session()->has('id'))
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
            <!--container-->
        </header>
        <main class="gw">
            <article class="gw pos-r pb-5">
                <section class="container px-xl-3 px-lg-4 px-sm-5 px-xs-4">
                    @yield('content')
                </section>
            </article>
        </main>

        <footer>
            <div style="text-align: center;width: 100%; margin:10px">
                <h4 style="color: #024135;">聯絡我們</h4>
            </div>
            <div class="footer-inner d-flex align-items-center">
                <div class="left container px-xl-3 px-xs-4r pos-r text-end font">
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
                </div>
            </div>
        </footer>

        <!--<a href="#page" id="top" class="icon-arrow-simplr-top"></a>-->
    </div>
    <!--page-->

    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="/js/script.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script>
    function doAttend(event) {
        event.preventDefault();
        Swal.fire({
            title: "參加招募",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "是的！我要參加!"
        }).then((result) => {
            if (result.isConfirmed) {
                event.target.closest("form").submit();
            }
        });
    }
    </script>
</body>

</html>