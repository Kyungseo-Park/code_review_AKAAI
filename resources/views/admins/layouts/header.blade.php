<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-school"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SCN 관리자</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>서일캠퍼스타운</span></a>
    </li>

    <!-- Divider -->
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        화면관리
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThumbnail"
            aria-expanded="true" aria-controls="collapseThumbnail">
            <i class="fas fa-fw fa-wrench"></i>
            <span>썸네일 설정</span>
        </a>
        <div id="collapseThumbnail" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">썸네일 설정:</h6>
                <a class="collapse-item" href="{{ route('admin.thumbnail') }}">썸네일</a>
                <a class="collapse-item" href="{{ route('admin.thumbnail.delete') }}">삭제 목록</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        글 관리 
    </div>

    <!-- 교육 세미나 -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEducation"
            aria-expanded="true" aria-controls="collapseEducation">
            <i class="fas fa-fw fa-wrench"></i>
            <span>교육 세미나</span>
        </a>
        <div id="collapseEducation" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">교육 세미나:</h6>
                <a class="collapse-item" href="{{ route('admin.education.list') }}">글 목록</a>
                <a class="collapse-item" href="{{ route('admin.education.create') }}">글 추가</a>
                <a class="collapse-item" href="{{ route('admin.education.delete') }}">삭제 목록</a>
            </div>
        </div>
    </li>

    <!-- 공지사항 -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNotice" aria-expanded="true"
            aria-controls="collapseNotice">
            <i class="fas fa-fw fa-cog"></i>
            <span>공지사항</span>
        </a>
        <div id="collapseNotice" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">공지사항:</h6>
                <a class="collapse-item" href="{{ route('admin.notice.list') }}">글 목록</a>
                <a class="collapse-item" href="{{ route('admin.notice.create') }}">글 추가</a>
                <a class="collapse-item" href="{{ route('admin.notice.delete') }}">삭제 목록</a>
            </div>
        </div>
    </li>

    <!-- 상설매장 -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseShop"
            aria-expanded="true" aria-controls="collapseShop">
            <i class="fas fa-fw fa-wrench"></i>
            <span>상설매장</span>
        </a>
        <div id="collapseShop" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">상설매장 U&Shop:</h6>
                <a class="collapse-item" href="{{ route('admin.shop.list') }}">글 목록</a>
                <a class="collapse-item" href="{{ route('admin.shop.create') }}">글 추가</a>
                <a class="collapse-item" href="{{ route('admin.shop.delete') }}">삭제 목록</a>
            </div>
        </div>
    </li>

    <!-- 최근소식 -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNews"
            aria-expanded="true" aria-controls="collapseNews">
            <i class="fas fa-fw fa-wrench"></i>
            <span>최근소식</span>
        </a>
        <div id="collapseNews" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">최근소식:</h6>
                <a class="collapse-item" href="{{ route('admin.news.list') }}">글 목록</a>
                <a class="collapse-item" href="{{ route('admin.news.create') }}">글 추가</a>
                <a class="collapse-item" href="{{ route('admin.news.delete') }}">삭제 목록</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        회원관리
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.user')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>회원관리</span>
        </a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.log') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>로그관리</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
