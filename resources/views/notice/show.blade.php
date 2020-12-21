@extends('layouts.app')
@section('title', ' - 글제목 추가해야함')


@section('style')
<style>
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
.nt-title{
    float:left;
}
.nt-time{
    float:right; text-align:right;
}
.nt-writer{
    float:left;
}
.nt-hits{
    float:right;
    text-align:right;
}
@media(max-width:448px){
.nt-title{
    float:none;
    font-size:12px;
}
.nt-time{
    float:none;
    font-size:12px;
}
.nt-writer{
    float:none;
    font-size:12px;
}
.nt-hits{
    float:none;
    font-size:12px;
}
.th-title{
    font-size:12px;
    padding: 1.1rem;
}
.th-user{
    font-size:12px;
    padding: 1.1rem;
}
.th-title{
    padding: 1.1rem;
}
.th-title{
    padding: 1.1rem;
}
.th-user td{
    padding: 1.1rem;
}
.th-user th{
    padding: 1.1rem;
}
.content-box{
    font-size: 14px;
}
}
</style>
@endsection




@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-sm-12">
            <table class="table table-view">
                <tbody>
                    <tr id="mb_notice_tr_title">
                        <th class="th-title">
                            <span>제목</span>
                        </th>
                        <td colspan="2">
                            <span class="nt-title">{{ $notice->title }}</span>
                            <span class="nt-time">
                                {{ date("Y-m-d", strtotime($notice->created_at)) }}
                            </span>
                        </td>
                    </tr>
                    <tr id="mb_notice_tr_user_name">
                        <th class="th-user" scope="row">
                            <span>작성자</span>
                        </th>
                        <td>
                            <span class="nt-writer">{{ $notice->getUserId ? $notice->getUserId->name : "관리자" }}</span>
                        </td>
                        <td>
                            <span class="nt-hits">조회수 :{{ $notice->hits }}</span>
                        </td>
                    </tr>
                    @if (isset($notice->uploadfile))
                    <tr id="mb_notice_tr_files">
                        <th scope="row">
                            <span>첨부파일</span>
                        </th>
                        <td colspan="2">
                            <a href="{{ asset($notice->uploadfile) }}" target="_blank">
                                <span class="nt-files">{{$notice->filename}}</span>
                            </a>
                        </td>
                    </tr>
                    @endif                 
                    <tr id="mb_notice_tr_content">
                        <td class="content-box text-start" colspan="3">
                            <div id="summernote">
                                {!! $notice->body !!}
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-sm-12">
            <table class="table table-view">
                <tbody>
                    <tr>
                        <td scope="row">
                        @if ($nextPost == NULL)
                        <span>다음 게시물이 없습니다.</span>
                        @else
                        <a href="{{ route('notice.show.scn', ['id' => $nextPost->id] ) }}">
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
                            <a href="{{ route('notice.show.scn', ['id' => $previousPost->id] ) }}">
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




@section('script')

@endsection