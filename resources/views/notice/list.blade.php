@extends('layouts.app')

@section('title', ' - 공지사항')

@section('content')
<style>
.sub-header { width: 100%; min-height: 220px; max-height: 220px; background-size: cover; font-weight: 300; padding: 60px 0 64px; background-color: #f0f3f8; }
.wrap-container { text-align: center; margin: 0 auto; }
.gt-relative { position: relative;}
.sub-header h3, .sub-header h4 { font-size: 42px;}
.sub-header p { margin: 3px 0 0; font-size: 18px;}
.gt-relative { position: relative; }
.notice-list-head { margin: 20px ;}
.gt-float-right {float: right; }
.img_area > img { width: 100%;}
.container{ padding-top: 15px;}
.gt-input { width:65%;}
.gt-button{width: 30%;}
tr th{font-size: 0.8em;}
tr td{font-size: 0.8em;}
.notice-mobile{ display: none; }
@media(max-width:768px){
    .notice-pc{ display: none;}
    .notice-mobile{ display: inline; }
    .notice-mobile-ul{ padding-left: 5px; padding-right: 5px; }
    .notice-mobile-ul{list-style: none; border: 1px solid #ccc!important; padding: 10px 10px 10px 10px; border-radius: 5px; box-sizing: inherit;}
    .ulp-4{ margin-bottom:0px;}
}
@media (max-width: 473px) {
  .sub-header { 
      min-height: 145px;
      padding: 30px 0 34px;
  }
}
</style>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="sub-header">
            <div class="wrap-container gt-relative">
                <h3>공지사항</h3>
                <p>서비스 안내와 공지, 신규 서비스에 대한 소식을<br> 전해드립니다.</p>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12 col-12">
            {{-- <section class="notice-list-head gt-clearfix">
                <form class="gt-float-right" name="form1" method="get">
                    <input type="hidden" name="page" value="1">
                    <div class="search-wrap">
                        <input type="text" placeholder="검색어를 입력해 주세요." id="value" name="value" value=""
                            class="gt-input gt-search-common gt-hide" autofocus>
                        <button type="submit" class="gt-button">
                            <span>검색</span><i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
            </section> --}}
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12 col-12">
            <div class="notice-pc">
            <!-- ------------------------------------ -->
            <!-- PC VIEW -->
                <table class="table table-hover board">
                    <thead>
                        <tr>
                            <th width="3%" scope="col">#</th>
                            <th width="30%" scope="col">제목</th>
                            <th width="13%" scope="col">작성자</th>
                            <th width="12%" scope="col">등록일</th>
                            <th width="10%" scope="col">조회수</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($noticeList as $notice)
                        <tr>
                            <td class="link_td">{{ $notice->id }}</td>
                            <td class="link_td">
                                <a href="{{ route('notice.show.scn', ['id' => $notice->id] ) }}">
                                    {{ $notice->title }}
                                </a>
                            </td>
                            <td class="link_td">
                                {{ $notice->getUserId ? $notice->getUserId->name : "관리자" }}
                            </td>
                            <td class="link_td">
                                {{ $notice->created_at }}
                            </td>
                            <td class="link_td">
                            {{ $notice->hits }}    
                            
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- ------------------------------------ -->
            <div class="notice-mobile">
            {{-- 
                모바일 VIEW
                -----------------------------------------
                하단 지울시 모바일 쿼리문 안됨 
            --}}
            @foreach ($noticeList as $notice)
            <ul class="notice-mobile-ul">
                <li class="notice-mobile-li">
                    <p class="title-moblie ulp-4">
                        <a href="{{ route('notice.show.scn', ['id' => $notice->id] ) }}">
                             제목 :  {{ $notice->title }}
                        </a>
                    </p>
                    <p class="writer-moblie ulp-4"> 작성자 : 릴레이션 </p>
                    <p class="set-moblie ulp-4"> 등록일 : 
                        {{-- {{ explode(' ',$notice->created_at) }} --}}
                    </p>
                    <p class="hit-moblie ulp-4"> 조회수 : 
                        {{ $notice->hits }}
                    </p>
                </li>
            </ul>
            @endforeach        
            </div>
        </div>
    </div>
</div>
@endsection
