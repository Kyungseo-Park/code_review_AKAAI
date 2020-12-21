@extends('layouts.app')

@section('title', '')

@section('style')
<style>
    .carousel-item .img-fluid {
        width: 100%;
    }

    .carousel-item a {
        display: block;
        width: 100%;
    }
    
    .main-header{
        color: #100000;
        font-size:1.8rem;
    }

    .bd-hover {
        position: relative;
        background-color: #fff;
        box-shadow: 0 25px 35px 0 rgba(0, 0, 0, 0.05);
        height: 100%;
        padding: 5px;
        border: 1px solid #e5e5e5;
    }
    .list-item{
        padding: 10px;
    }
    .news-p-title{
        font-size: 1.25em;
        line-height: 1.375;
        font-weight: bold;
        width:100%; 
        overflow:hidden; 
        text-overflow:ellipsis; 
        white-space:nowrap;
    }
    .main-header-padding {
        padding-top: 1rem;
        margin-top: 50px;
        margin-bottom: 30px;
    }

    @media only screen and (max-width: 800px) {
        .main-header-padding{
            padding-top: 1rem;
            margin: 20px;
        }
    }
</style>
@endsection

@section('content')

{{-- 
    글자 아래고정하고 백그러운드컬러 100% 높이,넓이

--}}
<div class="container">
    <div class="row justify-content-center">
        <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="6000" style="width: 100%;">
            <ol class="carousel-indicators">
                @foreach ($mainThumbnailList as $mainThumbnail)
                <li data-target="#carousel" data-slide-to="{{$mainThumbnail->order}}"
                    class="{{ $mainThumbnailList[0] == $mainThumbnail ? 'active' : '' }}"></li>
                @endforeach
            </ol>
            <div id="my-carousel-bg" class="carousel-inner" role="listbox">
                @foreach ($mainThumbnailList as $mainThumbnail)
                <div class="carousel-item {{ $mainThumbnailList[0] == $mainThumbnail ? 'active' : '' }}">
                    <picture>
                        {{-- <source srcset="{{ asset($mainThumbnail->src_default)}}" media="(min-width: 1400px)" id="carousel-item-pc">
                        <source srcset="{{ asset($mainThumbnail->src_default)}}" media="(min-width: 769px)" id="carousel-item-tablet">
                        <source srcset="{{ asset($mainThumbnail->src_default)}}" media="(min-width: 577px)" id="carousel-item-molile"> --}}
                        <img srcset="{{ asset($mainThumbnail->src_default)}}" alt="{{ ($mainThumbnail->title) }}" id="carousel-item-default" class="d-block img-fluid">
                    </picture>
                    <div class="carousel-caption" id="carousel-background-default">
                        <div id="carousel-text-area">
                            {{-- <h2> {{ $mainThumbnail->title}}</h2>
                            <p> {{ $mainThumbnail->subtitle}}</p> --}}
                            <a href="{{ $mainThumbnail->href }}">
                                <span class="btn btn-outline-secondary">{{ $mainThumbnail->button }}</span>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
<hr>
<div class="container-fluid">
    <div class="container">
        <div class="row justify-content-center bg-light main-header-padding">
            <span class="main-header">교육/세미나</span>
        </div>
        <div class="row justify-content-start">
            @foreach ($educationList as $education)
            <div class="meeting-colspan col-lg-3 col-md-3 col-6 p-3">
                <div class="card" style="width: 100%;">
                    <a href="{{ url('education/'.$education->id) }}">
                        <img class="card-img-top" src="{{ asset( $education->thumbnail) }}" alt="Card image cap">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title project_title" style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{ $education->title }}</h5>
                        <p class="card-text" id="education-body" style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                            {{ str_replace('&nbsp;','',strip_tags($education->body)) }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<hr>
<div class="container-fluid">
    <div class="container">
        <div class="row justify-content-center bg-light main-header-padding">
            <span class="main-header">공지사항</span>
        </div>
        <div class="containerpy-3">
            <div class="row justify-content-center">
                <div class="col-12">
                    <table class="table table-hover">
                        <colgroup>
                            <col width="5%">
                            <col width="70%">
                            <col width="10%">
                            <col width="15%">
                        </colgroup>
                        @foreach ($noticeList as $notice)
                        <tr>
                            <td class="link_td">
                                {{$notice->id}}
                            </td>
                            <th class="link_td">
                                <a href="{{ route('notice.show.scn', ['id' => $notice->id]) }}">
                                    <span class="t_writer">{{$notice->title}}</span>
                                </a>
                            </th>
                            <td class="link_td">
                                <span class="table-span">
                                    {{ (explode(' ', $notice->created_at)[0]) }}
                                </span>
                            </td>
                            <td class="link_td">
                                <span class="table-span">
                                    {{ $notice->hits }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="row justify-content-center bg-light main-header-padding">
            <span class="main-header">U&Shop 상설매장</span>
        </div>
        <div class="row justify-content-start">
            @foreach ($shopList as $shop)
            <div class="list-item col-lg-4 col-md-4 col-12">
                <div class="bd-hover">
                    <a>
                        <div class="img_area">
                            <a href="{{ url('shop/'.$shop->id) }}">
                                <img srcset="{{$shop->thumbnail}}" alt="{{ $shop->title }}" class="d-block img-fluid">
                            </a>
                        </div>
                        <div class="bd-info">
                            <div class="new_d_title">
                                <p class="news-p-title news-p">{{ $shop->title }} </p>
                            </div>
                            <div class="news-d-dates">
                                <p class="news-p-date news-p">등록일 : {{ (explode(' ', $shop->created_at)[0]) }}
                                </p>
                            </div>
                            <div class="news-d-hit">
                                <p class="new-p-hit">조회수 : {{ $shop->hits }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="row justify-content-center bg-light main-header-padding">
            <span class="main-header">최근소식</span>
        </div>
        <div class="row justify-content-start">
            @foreach ($newsList as $news)
            <div class="list-item col-lg-4 col-md-4 col-12">
                <div class="bd-hover">
                    <div class="img_area">
                        <a href="{{ route('news.show.scn', ['id' => $news->id] ) }}">
                            <img class='"d-block img-fluid' src="{{ asset($news->thumbnail) }}">
                        </a>
                    </div>
                    <div class="bd-info">
                        <div class="new_d_title">
                            <p class="news-p-title news-p">{{ $news->title }} </p>
                        </div>
                        <div class="news-d-dates">
                            <div class="news-p text-right">
                                <span class="text-end">{{ (explode(' ', $news->created_at)[0]) }}</span><br>
                                <span class="new-p-hit">조회수 : {{ $news->hits }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="col-12">
            <div class="row justify-content-center main-header-padding">
                <span class="main-header">서일대 캠퍼스타운</span>
            </div>
        </div>
        <div class="col-12">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <p>청년이 창의적인 활동을 할 수 있는 문화 조성 및 공간을 마련하고,</p>
                </div>
                <div class="col-12 text-center">
                    <p>대학이 향유 하고 있는 첨단 자원의 지역 확장를 통한</p>
                </div>
                <div class="col-12 text-center">
                    <p>동반성장을 도모하여 지속가능한 성장을 유도하는 캠퍼스타운 운영체계를 구축하고자 합니다.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    h2 {
        text-decoration-line: underline;
        text-decoration-style: solid; 
        text-decoration-color: #e1dede;
    }
</style>


@section('script')

@endsection


