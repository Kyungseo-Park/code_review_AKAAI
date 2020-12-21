@extends('layouts.app')

@section('title', ' - 글제목 추가해야함')

@section('style')
<link rel="stylesheet" href="{{ asset('css/education.css') }}">
@endsection

@section('content')

<div class="container">
    <!-- 프로젝트 큰제목? -->
    <div id="project_header">
        <div id="project_title">{{ $education->title }}</div>
    </div>
    <!-- // 프로젝트 큰제목? -->

    <!-- 상단 내용 -->
    <div id="top_content">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 thumbnail" id="thumbnail">
                <img src="{{ asset($education->thumbnail) }}">
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 thumbnail" id="project_info">
                <div id="project_info_name">
                    <div class="project-item-title">제목</div>
                    <div id="project-item-name"> {{ $education->subtitle }} </div>
                </div>
                <hr class="hr-gray">
                <table id="project_info" class="table table-striped">
                    <thead>
                        <tr>
                            <th>모집기간</th>
                            <th>신청인원<span id="slider">/</span>모집인원</th>
                            <th>모집종료</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td>
                            @if (strtotime($education->end_date) > time())
                                D-{{ date("d", strtotime($education->end_date) - time()) }}
                            @else
                                모집기간이 지났습니다.
                            @endif
                            </td>
                            <td>
                                {{ $education->getEducationId->count() }}/{{ $education->recruitment_personnel }}
                            </td>
                            <td>
                                {{ date("Y-m-d", strtotime($education->end_date)) }} 
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- // 상단 내용 끝 -->
    <!-- 사용자 버튼 -->
    <div class="container text-right">
        @if ($education->end_date > date('Y-m-d H:i:S',time()))
        @guest
            <button class="btn-project-action" id="btn_action_id" data-toggle="modal" data-target="#exampleModal">신청하기</button>
        @else
            @if (Auth::user()->getReceiptId)
                <button class="btn-project-action" id="btn_action_id">신청성공</button>
            @else
                <button class="btn-project-action" id="btn_action_id" data-toggle="modal" data-target="#exampleModal">신청하기</button>
            @endif   
        @endguest
        
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">접수 : {{ $education->title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form id="form_action">
                        @csrf
                        <input type="hidden" name="project_page" id="project_page" value="{{ $education->id }}">
                        <div class="input-group mb-3 mt-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">이름</span>
                            </div>
                            @guest
                                <input type="name" class="form-control" name="form_name" id="form_name">
                            @else
                                <input type="name" class="form-control" name="form_name" id="form_name" value="{{ Auth::user()->name }}">
                            @endguest
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">연락처</span>
                            </div>
                            @guest
                                <input type="text" class="form-control" name="form_call" id="form_call">
                            @else
                                <input type="text" class="form-control" name="form_call" id="form_call" value="{{ Auth::user()->tel }}">
                            @endguest
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">이메일</span>
                            </div>
                            @guest
                                <input type="email" class="form-control" name="form_email" id="form_email">
                            @else
                                <input type="email" class="form-control" name="form_email" id="form_email" value="{{ Auth::user()->email }}">
                            @endguest
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">소속</span>
                            </div>
                            @guest
                                <input type="text" class="form-control" name="form_class" id="form_class">
                            @else
                                <input type="text" class="form-control" name="form_class" id="form_class" value="{{ Auth::user()->class }}">
                            @endguest
                        </div>
                        @if (isset($education->filename))
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">파일</span>
                                </div>
                                <input type="file" class="form-control" name="uploadFile" id="form_file">
                            </div>
                        @endif
                        <div class="text-right">
                            <button class="btn-form-submit" id="brn_form_submit">접수하기</button>
                            <input type="button" class="btn-project-cencel" data-dismiss="modal"  value="닫기">
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
            
        @else
            <button class="btn-project-end">마감</button>
        @endif
        
    </div>
    <!-- // 사용자 버튼 -->
    <hr class="hr-gray">
    
    @if (($education->start_date < time()) && ($education->end_date < time()))
    
    @endif
    <div class="container text-start" id="project_content">
        <div class="text-start product-info">
            <div class="project-item" id="mission_name">
                {!! $education->body !!}
            </div>
        </div>
    </div>
</div>
@endsection



@section('script')
<script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/education.js') }}"></script>
@endsection