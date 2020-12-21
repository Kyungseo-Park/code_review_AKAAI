@extends('layouts.app')

@section('title', ' - 최근소식')

@section('style')
<style>
    /* 뉴스레이터 헤더 */
.sub-header {
    width: 100%;
    min-height: 220px;
    max-height: 220px;
    background-size: cover;
    font-weight: 300;
    padding: 60px 0 64px;
    background-color: #f0f3f8;
}

.sub-header h3, .sub-header h4 {
    font-size: 42px;
}
.sub-header p {
    margin: 3px 0 0;
    font-size: 18px;
}

.wrap-container {
    text-align: center;
    margin: 0 auto;
}

.gt-relative {
    position: relative;
}


/* 뉴스레이터 서치 */
.notice-list-head {
    margin: 80px 0 20px;
}

.gt-float-right {
    float: right;
}

/* 뉴스레이터 바디 */
.news-img {
    padding: .5rem;
    position: relative;
    border: 1px solid #cecece;
    margin-bottom: .5rem;
    
}
.news-img > img {
    width: 100%;
}

.container{
    padding-top: 15px;
}
.news-container-item{
    padding: 1.4rem;
}

.news-p{
    /* padding: 0px; */
    margin: 0px;
}

@media(min-width: 540px){
    .new_d_title{
        padding-top: 1rem;
    }
}

@media(max-width: 540px){
    .news-container-itme{
        padding-left: 15px;
        padding-right: 15px;
    }
}




/* text 슬라이드 */

.none{display:none}
/* #ticker{float:left;width:100px;} */
.navi{float:right;}
/* .block {border:2px solid #d81f25; padding:0 5px; height:20px; overflow:hidden; background:#fff; width:350px; font-family:Gulim; font-size:12px;float:left;} */
/* .block ul,
.block li {margin:0; padding:0; list-style:none;} */
/* .block li a {display:block; height:20px; line-height:20px; color:#555; text-decoration:none;} */
#title_3Slider{
    background-color : #f0f3f8;
}

@media (max-width: 473px) {
  .sub-header { 
      min-height: 145px;
      padding: 30px 0 34px;
  }
}
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="sub-header">
            <div class="wrap-container gt-relative">
                    <h3>최근소식</h3>
                    <p>새로운 소식을 빠르게 접해보세요</p>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-start">
        @foreach ($newsList as $news)
        <div class="news-container-item col-lg-6 col-md-12 col-sm-12 col-12">
            <a href="{{ route('news.show.scn', ['id' => $news->id] ) }}">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 news-img ">
                        @if ($news->thumbnail)
                            <img class='news_img' src="{{ asset($news->thumbnail) }}">
                        {{-- @elseif(strlen($image_l) > 2) 
                            기능 추가 해야함 
                            <img class='news_img' src={{ $image_l }}> --}}
                        @else
                            <img class='news_img' src="{{ asset('/uploads/news/123123.png') }}">
                        @endif
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 news-content ">
                        <div class="new_d_title">
                            <p class="news-p-title news-p">제목 : {{ $news->title }}
                        </div>
                        {{-- <div class="news-d-body">
                            <!-- <p class="news-p-body news-p">내용 : <?php echo (mb_substr($row['news_body'], 0, 15).'...') ?></p> -->
                        </div> --}}
                        <div class="news-d-dates">
                            <p class="news-p-date news-p">등록일 : {{ explode(' ', $news->created_at)[0] }}</p>
                        </div>
                        <div class="news-d-hit">
                            <p class="new-p-hit">조회수 : {{ $news->hits }}</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <div class="row justify-content-center">
        <ul class="pagination justify-content-center">
            {{ $newsList->links() }}
        </ul>
    </div>
</div>
@endsection


@section('script')

@endsection