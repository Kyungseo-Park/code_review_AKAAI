@extends('layouts.app')

@section('title', ' - 최근소식')

@section('style')
<style>
/* hr 태그 */
.hr-gray { float: left; width: 100%; border-top: 1px solid rgba(0, 0, 0, .3); }
/* // hr 태그 */

/* 썸네일 이미지 */
#thumbnail { position: relative; width: 100%; }
#thumbnail img { width: 100%; }
/* // 썸네일 이미지 */


/* 하단 컨텐츠 */
#project_content img { max-width: 725px; width: 100% }
#project_content iframe { max-width: 725px; max-height: 430px; width: 100%; }
#project_info { padding: 0 1.25rem; margin-bottom: 1.5rem; }

.product-info-title { font-size: .9rem; color: #1AAB8A; }
.project-item { margin-top: 3rem; }
.project-item p { font-size: .9rem; margin-top: 1rem; }
.project-item-title { font-weight: 600; float: left; width: 5rem; }
/* // 하단 컨텐츠 */
/* 상단 컨텐츠 */
#project_header { padding: 2rem 4rem; border-bottom: 1px solid rgba(0, 0, 0, .3); margin-bottom: 2rem; }
#project_title { width: 100%; text-align: center; font-size: 1.8em; font-weight: 500; word-break: keep-all; }
#project_info th { border-top: none; text-align: center; word-break: keep-all;}
#project_info_name { border-top: 1px solid rgba(0, 0, 0, .3); padding-top: 1rem; padding-bottom: 1rem; }
#project-item-name { word-break: keep-all; width: calc(100% - 5rem); float: left; }
#necessary { float: left; }

@media (max-width: 473px) {
    #slider { opacity: 0; display: table-column; }
}


@media(max-width: 460px) {
    #project_title { font-size: 1.5em; }
    #project_header { padding: 1rem 1.2rem; }
}

/* // 상단 컨텐츠  */
.form-control[readonly] { background-color: inherit; }
.form-control[type="radio"],
.form-control[type="checkbox"],
.input.center { height: 1rem; margin: calc((38px - 1rem) / 2) 0; }

/* 폼 */
.input-group-text { background-color: white; text-align: inherit; white-space: normal; word-break: keep-all; }

/* 접수하기 */
.btn-project-action{  margin-top: -1rem; background: #1AAB8A; color: #fff; border: none; position: relative; height: 40px; font-size: 1em; padding: 0 2em; cursor: pointer; transition: 800ms ease all; outline: none; }
.btn-project-action:hover{ background:#fff; color:#1AAB8A; }
.btn-project-action:before,.btn-project-action:after{ content:''; position:absolute; top:0; right:0; height:2px; width:0; background: #1AAB8A; transition:400ms ease all; }
.btn-project-action:after{ right:inherit; top:inherit; left:0; bottom:0; }
.btn-project-action:hover:before,.btn-project-action:hover:after{ width:100%; transition:800ms ease all; }
/* // 접수하기 */

/* 접수 취소하기 */
.btn-project-cencel{ display: none; margin-top: -1rem; background: rgb(235, 91, 81); color: #fff; border: none; position: relative; height: 40px; font-size: 1em; padding: 0 2em; cursor: pointer; transition: 800ms ease all; outline: none; }
.btn-project-cencel:hover{
background:#fff;
color:rgb(235, 91, 81);
}
.btn-project-cencel:before,.btn-project-cencel:after{
content:'';
position:absolute;
top:0;
right:0;
height:2px;
width:0;
background: rgb(235, 91, 81);
transition:400ms ease all;
}
.btn-project-cencel:after{
right:inherit;
top:inherit;
left:0;
bottom:0;
}
.btn-project-cencel:hover:before,.btn-project-cencel:hover:after{
width:100%;
transition:800ms ease all;
}
/* // 접수 취소하기  */
/* 신청 마감 버튼 */
.btn-project-end{
margin-top: -1rem;
background-color: #343a40;
border: none;
position: relative;
height: 40px;
font-size: 1em;
padding: 0 2em;
cursor: pointer;
transition: 800ms ease all;
outline: none;
color: #fff;
border-color: #343a40;
}
.btn-project-end:hover{
background-color: #4f91d3;
}

/* // 신청 마감 버튼 */
/* 접수 완료 버튼 */
.btn-form-submit{
margin-top: -1rem;
background: rgb(47, 159, 211);
color: #fff;
border: none;
position: relative;
height: 40px;
font-size: 1em;
padding: 0 2em;
cursor: pointer;
transition: 800ms ease all;
outline: none;
}
.btn-form-submit:hover{
background:#fff;
color:rgb(47, 159, 211);
}
.btn-form-submit:before,.btn-form-submit:after{
content:'';
position:absolute;
top:0;
right:0;
height:2px;
width:0;
background: rgb(47, 159, 211);
transition:400ms ease all;
}
.btn-form-submit:after{
right:inherit;
top:inherit;
left:0;
bottom:0;
}
.btn-form-submit:hover:before,.btn-form-submit:hover:after{
width:100%;
transition:800ms ease all;
}
/* //접수 완료 */

/* 접수자 확인 */
.btn-project-user{
margin-top: -1rem;
background: rgb(47, 159, 211);
color: #fff;
border: none;
position: relative;
height: 40px;
font-size: 1em;
padding: 0 2em;
cursor: pointer;
transition: 800ms ease all;
outline: none;
}
.btn-project-user:hover{
background:#fff;
color:rgb(47, 159, 211);
}
/* // 접수자 확인 */

/* 제출 폼 */
#form_container{
display: none;
}
/* //제출 폼 */

/* 폼 제목 */
.form-action-title{
font-size: 1.25rem;
text-align: center;
/* color: #1AAB8A; */
font-family: 'Mukta', sans-serif;
font-weight: bold;
}
/* // 폼 제목 */
.project-item-title{
font-size:17.5px;    
}
.project-item-name{
font-size:17.5px;
}  
@media (max-width: 991px) {
.thumbnail{
margin-bottom: 2rem;
}
}
</style>
    
@endsection
@section('content')
<div class="container">
    <!-- 프로젝트 큰제목? -->
    <div id="project_header">
        <div id="project_title"> {{ $news->title}}</div>
    </div>
    <!-- // 프로젝트 큰제목? -->

    <!-- 상단 내용 -->
    <div id="top_content">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 thumbnail" id="thumbnail">
                <img src="{{ asset($news->thumbnail) }}">
            </div>
            <div class="col-lg-6 col-sm-12 col-sm-12 col-12" id="project_info">
                <div style="border-top: 1px solid rgba(0, 0, 0, .3);padding-top: 1rem;">
                    <span class="project-item-title">제목</span>
                    <span class="project-item-name">
                        {{ $news->title }}
                    </span>
                </div>
                <hr class="hr-gray">
                <div id="necessary">
                    <span class="project-item-title">등록일</span>
                    <span class="project-item-name">
                        {{ explode(' ',$news->created_at)[0] }}
                    </span>
                </div>
                <hr class="hr-gray">
                <div id="necessary">
                    <span class="project-item-title">작성자</span>
                    <span class="project-item-name">관리자</span>
                </div>
                <hr class="hr-gray">
                <div id="necessary">
                    <span class="project-item-title">조회수</span>
                    <span class="project-item-name">
                        {{ $news->hits }}
                    </span>
                </div>
                <hr class="hr-gray">
                <div id="necessary">
                    <span class="project-item-title">첨부파일</span>
                    @if (isset($news->uploadfile))
                    <a href="{{ asset($news->uploadfile) }}" target="_blank">
                        <span class="project-item-name">{{ $news->filename }}</span>
                    </a>
                    @else
                    <span class="project-item-name">없음</span>
                    @endif
                </div>
                <hr class="hr-gray">
            </div>
        </div>
    </div>
    <!-- // 사용자 버튼 -->
</div>
<div class="container" id="project_content">
    <div class="row justify-content-center">
        <div class="col-10">
            <div cass="text-center product-info">
                <div class="project-item" id="mission_name">
                    {!! $news->body !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-end">
        <a href="{{ url('news.scn') }}">
            <button class="btn btn-dark m-3">목록으로</button>
        </a>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table table-view">
                <tbody>
                    <tr>
                        <td scope="row">
                            @if ($nextPost == NULL)
                            <span>다음 게시물이 없습니다.</span>
                            @else
                            <a href="{{ route('news.show.scn', ['id' => $nextPost->id] ) }}">
                                <span>다음 게시물 : {{ $nextPost->title }}</span>
                            </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">
                            @if ($previousPost == NULL)
                            <span>이전 게시물이 없습니다.</span>
                            @else
                            <a href="{{ route('news.show.scn', ['id' => $previousPost->id] ) }}">
                                <span>이전 게시물 : {{ $previousPost->title }}</span>
                            </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection