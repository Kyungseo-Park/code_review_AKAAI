<link rel="stylesheet" href="{{ asset('css/header.css') }}">


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
                        <li class="nav-item">
                            <a href="{{ url('/') }}">
                                Smart Jungnang Seoil CampusTown
                                {{-- <img class="logo-text" src="{{ asset('logo.png') }}" alt="" srcset=""> --}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('news.scn')}}">최근소식</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('map.scn')}}">서일 캠퍼스타운</a>
                        </li>
                        @guest
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ url('login.scn') }}">{{ __('로그인') }}</a>
                            </li> --}}
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
                                {{-- <div class="m_menu_box">
                                    <h3>SUB MENU</h3>
                                    <ul class="m_menu">
                                    @guest
                                        <li>
                                            <a href="{{ url('login.scn') }}">{{ __('로그인') }}</a>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ url('mypage.scn') }}">{{ Auth::user()->name }}</a>
                                        </li>
                                            @if (Auth::user()->auth == 9) 
                                            <li><a href="{{ url('admin') }}">{{ __('관리') }}</a></li>
                                            @endif
                                            <li>
                                                <a href="{{ route('auth.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                            </li>
                                            <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    @endguest
                                    </ul>
                                </div> --}}
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