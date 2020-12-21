<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="서일대학교 캠퍼스타운">
    <meta name="subject" content="서일대학교 캠퍼스타운">
    <meta name="keywords" content="서일대학교,서일대학교 캠퍼스타운,캠퍼스타운">
    <meta name="generator" content="laravel">
    <meta name="author" content="제작자">
    <meta name="copyright" content="서일대학교">
    <meta name="publisher" content="서일대학교 캠퍼스타운">
    <meta name="other Agent" content="공란">
    <meta name="classification" content="캠퍼스타운">
    <meta name="reply-to(email)" content="dev@kspark.link">
    <meta name="location" content="서일대학교">
    <meta name="distribution" content="박경서">
    <meta name="robots" content="all">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ config('app.name') }} - @yield('title')">
    <meta property="og:description" content="서일대학교 캠퍼스타운">
    <meta property="og:image" content="{{ asset('images/og-image.ico') }}">
    <meta property="og:url" content="{{ env('APP_URL') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}@yield('title')</title>    
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/show.css')}}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.4.2/sweetalert2.min.css" />
    <style>
            .footer{ margin-top: 5rem; background: #2b3141; box-shadow: 0px 0px 0px 1px #d4d4d4 inset; }
            /* 우측하단 바로 올라가기 내려가기 버튼 */
            .remotecon{ position: fixed; bottom: 0; right: 0; z-index: 1049; }
            .remote_item{ position: relative; float: left; width: 3rem; height: 3rem; margin-left: .2rem; border-top-left-radius: .25rem; border-top-right-radius: .25rem; background-color: rgba(33, 33, 33, .7); font-size: 2.5rem; text-align: center; color: #fff; cursor: pointer; }
            .fa-caret-up{top: 5px;right: 11px;position: absolute;}
            .fa-caret-down{position: absolute;top: 5px;right: 11px;}
            .footer p {
                color: #fff;
            }
            .footer span {
                color: #fff;
            }
            .footer div {
                color: #fff;
            }
    </style>
    @yield('style')
</head>

<body>
    <div id="app">
        {{-- @include('layouts.header') --}}
        <header>
            <div id="wrapper">
                <div id="header_top">
                    <div id="header">
                        <div class="header">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('education.scn')}}">교육/세미나</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('notice.scn')}}">공지사항</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('shop.scn')}}">상설매장 U&Shop</a>
                                </li>
                                {{-- <li class="nav-item">

                                </li> --}}
                                <li> 
                                    <a class="nav-link" href="{{ url('/') }}">
                                        {{-- Smart Jungnang <br>Seoil CampusTown --}}
                                        <img class="logo-text" src="{{ asset('logo.png') }}" alt="" srcset="">
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('news.scn')}}">최근소식</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('map.scn')}}">서일 캠퍼스타운</a>
                                </li>
                                <li class="nav-item">
                                    {{-- <a class="nav-link" href="{{ url('map.scn')}}">캠퍼스타운 서일청춘길</a> --}}
                                </li>
                                @guest
                                    
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        @if (Auth::user()->auth == 9) 
                                            <a class="dropdown-item" href="{{ url('admin/dashboard') }}">{{ __('관리') }}</a>
                                        @endif
                                            <a class="dropdown-item" href="{{ route('auth.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                            <ul class="navbar-nav m_header">
                                <div class="row justify-content-center">
                                    <a href="{{ url('/') }}">
                                        <img class="logo-text" src="{{ asset('logo.png') }}" alt="" srcset="">
                                    </a>
                                </div>
                            </ul>
                            <div id="mySidebar" class="sidebar">
                                <div class="sider_new">
                                    <div id="menu_v" class="menu_v">
                                        <div class="m_menu_box">
                                            <h3>MAIN MENU</h3>
                                            <ul class="m_menu">
                                                <li><a class="nav-link" href="{{ url('education.scn')}}">교육/세미나</a></li>
                                                <li><a class="nav-link" href="{{ url('notice.scn')}}">공지사항</a></li>
                                                <li><a class="nav-link" href="{{ url('shop.scn')}}">상설매장 U&Shop</a></li>
                                                <li><a class="nav-link" href="{{ url('news.scn')}}">최근소식</a></li>
                                                <li><a class="nav-link" href="{{ url('map.scn')}}">서일 캠퍼스타운</a></li>
                                            </ul>
                                        </div>
                                        @guest
                                        @else
                                        <div class="m_menu_box">
                                            <h3>SUB MENU</h3>
                                            <ul class="m_menu">
                                                {{-- <li>
                                                    <a href="{{ url('login.scn') }}">{{ __('로그인') }}</a>
                                                </li> --}}
                                                <li>
                                                    <a href="{{ url('mypage.scn') }}">{{ Auth::user()->name }}</a>
                                                </li>
                                                    @if (Auth::user()->auth == 9) 
                                                    <li><a href="{{ url('admin/dashboard') }}">{{ __('관리') }}</a></li>
                                                    @endif
                                                    <li>
                                                        <a href="{{ route('auth.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                                    </li>
                                                    <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                        @endguest
                                    </div>
                                </div>
                                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="xi-close"></i></a>
                            </div>
                        </div>
                        <button class="openbtn" onclick="openNav()"><i class="xi-bars"></i></button>
                    </div>
                </div>
            </div>
        </header>
        <main>
            @yield('content')
        </main>
        {{-- @include('layouts.footer') --}}
        <style>
            .footer {
                background: #233152;
            }
        </style>
        <div class="footer">
            <div class="footer_zone">
                <span class="f_logo">
                    <div class="row">
                        {{-- <div class="col-md-2 col-xs-4"> --}}
                            {{-- <a href="http://hm.seoil.ac.kr/" target="_blank" title="새창"> --}}
                                <img src="{{ asset('storage/images/seoil-ac-kr.png') }}" alt="서일대학교" id="seoilClick">
                            {{-- </a>  --}}
                        {{-- </div>
                        <div class="col-md-2 col-xs-5 pr-3"> --}}
                            {{-- <a href="http://brand.seoul.go.kr/front/index.do" target="_blank" title="새창"> --}}
                                <img src="{{ asset('storage/images/brand-seoul-go-kr.png') }}" alt="I-LOVE-SEOUL" id="seoulClick">
                            {{-- </a> --}}
                        {{-- </div>
                        <div class="col-md-2 col-xs-3"> --}}
                            {{-- <a href="http://jungnang.go.kr" target="_blank" title="새창"> --}}
                                <img src="{{ asset('storage/images/jungnang-go-kr.png') }}" alt="중랑구" class="f_logo1" id="jungnangClick">
                            {{-- </a> --}}
                        {{-- </div>                                     --}}
                    </div>
                </span>
                <div class="f_txt">
                    <p>
                        <strong>02192 서울특별시 중랑구 용마산로 90길 28 TEL 02.490.7300  COPYRIGHTⓒ2019 SEOIL UNIVERSITY ALL RIGHT RESERVED</strong>
                    </p>
                    <p>Copyright SEOIL</p>
                    <p><a href="{{ url('private.scn') }}">개인정보처리방침</a></p>
                </div>
            </div>
        </div>
        <div class="remotecon">
            <div class="remote_item" onclick="top_btn()">
                {{-- <i class="xi-bars"> --}}
                    <i class="fas fa-sort-up" style="margin-top: 13px;"></i>
                    {{-- <i class="fas fa-caret-up"></i> --}}
            </div>
            <div class="remote_item" onclick="bottom_btn()">
                {{-- <i class="fas fa-caret-down"></i> --}}
                <i class="fas fa-sort-down" style="margin-bottom: 30px;"></i>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/app.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('js/index.js') }}"></script>
    <script type="text/javascript" src="{{ asset('fontawesome/js/all.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('fontawesome/js/fontawesome.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.4.2/sweetalert2.min.js"></script>
    {{-- <script type="text/javascript" src="{{ asset('fontawesome/js/all.min.js') }}"></script> --}}
    @yield('script')
    <script>
        $(function() {
            $("#seoilClick").click(function() {
                window.open("http://www.seoil.ac.kr");
            });
        });

        $(function() {
            $("#seoulClick").click(function() {
                window.open("http://brand.seoul.go.kr/");
            });
        });

        $(function() {
            $("#jungnangClick").click(function() {
                window.open("http://jungnang.go.kr");
            });
        });
    </script>
</body>

</html>
