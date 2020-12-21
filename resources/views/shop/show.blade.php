@extends('layouts.app')

@section('title', ' - 최근소식')

@section('style')
    
@endsection
@section('content')
<div class="container">
    <!-- 프로젝트 큰제목? -->
    <div id="project_header">
        <div id="project_title"> {{ $shop->title}}</div>
    </div>
    <!-- // 프로젝트 큰제목? -->

    <!-- 상단 내용 -->
    <div id="top_content">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 thumbnail" id="thumbnail">
                <img src="{{ asset($shop->thumbnail) }}">
                @if($shop->href != NULL)
                <div class="text-center">
                    <span class="h6">
                        <a href="{{ $shop->href }}" target="_blank">바로가기</a>
                    </span>
                </div>
                @endif
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 thumbnail" id="project_info">
                <div style="border-top: 1px solid rgba(0, 0, 0, .3);padding-top: 1rem;">
                    <span class="project-item-title">제목</span>
                    <span class="project-item-name">
                        {{ $shop->title }}
                    </span>
                </div>
                <hr class="hr-gray">
                <div id="necessary">
                    <span class="project-item-title">등록일</span>
                    <span class="project-item-name">
                        {{ explode(' ',$shop->created_at)[0] }}
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
                        {{ $shop->hits }}
                    </span>
                </div>
                <hr class="hr-gray">
                <div id="necessary">
                    <span class="project-item-title">첨부파일</span>
                    @if (isset($shop->uploadfile))
                    <a href="{{ asset($shop->uploadfile) }}" target="_blank">
                        <span class="project-item-name">{{ $shop->filename }}</span>
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
    <div class="row">
        <div class="col-12">
            <div cass="text-center product-info">
                <div class="project-item" id="mission_name">
                    {!! $shop->body !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-end">
        <a href="{{ url('shop.scn') }}">
            <button class="btn btn-dark m-3">목록으로</button>
        </a>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <table class="table table-view">
                <tbody>
                    <tr>
                        <td scope="row">
                            @if ($nextPost == NULL)
                            <span>다음 게시물이 없습니다.</span>
                            @else
                            <a href="{{ route('ushop.show.scn', ['id' => $nextPost->id] ) }}">
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
                            <a href="{{ route('ushop.show.scn', ['id' => $previousPost->id] ) }}">
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
