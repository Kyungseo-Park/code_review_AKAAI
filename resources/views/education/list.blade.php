@extends('layouts.app')

@section('title', ' - 교육/세미나')

@section('content')
<style>
    #list_type {
    height: 100%;
    text-align: right;
}
#tester_grid {
    padding-top: 1rem;
}
#project_list .list-item {
    padding: 1.5rem 15px;
    border-bottom: 1px solid #cecece;
    cursor: pointer;
}
#tester_grid .list-item {
    margin-bottom: 1rem;
    cursor: pointer;
}
.contents {
    padding-bottom: 1rem;
    border-bottom: 1px solid #bdbdbd;
}
.img_area > img {
    width: 100%;
    height: 100%;
    border: 1px solid #cecece;
}
#tester_grid .img_area {
    padding: .5rem;
    position: relative;
    border: 1px solid #cecece;
}
.mask {
    width: calc(100% - 30px);
    height: 100%;
    position: absolute;
    top: 0;
    bottom: 0;
    margin: auto 0;
}
#tester_grid .mask {
    width: 100%;
    left: 0;
    right: 0;
}
.mask.end {
    height: 100%;
    background-position: center;
    background-repeat:no-repeat;
    background-size:100%;
    background-color: rgba(0, 0, 0, .6);
    background-image: url(../../img/post_end.png);
}
#tester_grid {
    display: none;
}
#project_list.mask.end {
    border-radius: .25rem;
}
.list-item:hover .mask:not(.end) {
    border: 4px solid #007bff;
}
.list-item:hover .t_title {
    text-decoration: underline;
}
#project_list .info{
    position: relative;
    height: 100%;
}
#tester_grid .info{
    padding-top: .75rem;
}
@media (max-width: 768px) {
    #project_list.info {
        padding-left: 0;
    }
}
@media (max-width: 576px) {
    .hits {
        display: none;
    }
}
.t_title {
    font-weight: 600;
    word-break: keep-all;
    height: 48px;
    font-weight: 500;
    word-break: keep-all;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
}
.goal_date {
    white-space: nowrap;
    font-size: .8rem;
}

.hit{
    font-size: 0.7em;
}

.sub-header {
    width: 100%;
    min-height: 220px;
    max-height: 220px;
    background-size: cover;
    font-weight: 300;
    padding: 60px 0 64px;
    background-color: #f0f3f8;
}

.wrap-container {
    text-align: center;
    margin: 0 auto;
}

.gt-relative {
    position: relative;
}

.sub-header h3, .sub-header h4 {
    font-size: 42px;
}
.sub-header p {
    margin: 3px 0 0;
    font-size: 18px;
}

.notice-list-head {
    margin: 80px 0 20px;
}
.gt-float-right {
    float: right;
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
                <h3>교육/세미나</h3>
                <p>새로운 서비스를 접해보세요</p>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5" id="project_list">
    <div class="row">
        <div class="col-md-10 col-12">
            @foreach ($educationList as $education)
            <a href="{{ route('education.show.scn', ['id' => $education->id] ) }}">
                <div class="list-item col-12" onclick="">
                        <div class="row">
                        <div class="img_area col-lg-3 col-md-4 col-6 p-1 m-0">
                            <img src="{{ $education->thumbnail }}" alt="{{ $education->subtitle }}">
                        </div>
                        <div class="info col-lg-9 col-md-8 col-6 p-1 m-0">
                            <div class="t_title">
                                <span>{{ $education->title }}</span><br>
                            </div>
                            
                            <div class="progress_date">
                                접수기간 : {{ explode(" ",$education->start_date)[0] }} ~ {{ explode(" ",$education->end_date)[0] }}
                                <p class="hit">조회수 : {{ $education->number_of_hits }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        {{$educationList->links() }}
    </div>
</div>
@endsection
