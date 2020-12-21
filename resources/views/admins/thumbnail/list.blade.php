@extends('admins.layouts.app')

@section('title', '썸네일 목록 - ')

@section('content')
<div class="container-fluid pt-5">
    {{-- 페이지 헤더 --}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">썸네일 목록</h1>
        {{-- 모달버튼 --}}
        <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
            data-target="#exampleModal">
            추가
        </button>
        {{-- 모달열기  --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">썸네일 추가</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate enctype="multipart/form-data"
                            action="{{ route('admin.thumbnail.create')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title">큰제목</label>
                                <input type="text" class="form-control" name="title" placeholder="큰제목" required>
                                <div class="invalid-feedback text-danger">
                                    * 큰제목
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="subtitle">작은제목</label>
                                <input type="text" class="form-control" name="subtitle" placeholder="작은제목" required>
                                <div class="invalid-feedback text-danger">
                                    * 소제목(내용 추가)
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="button">버튼 내용</label>
                                <input type="text" class="form-control" name="button" placeholder="버튼 내용" required>
                                <div class="invalid-feedback text-danger">
                                    * 버튼에 추가될 Text
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="src_default" class="text-black-50">이미지 src_default</label>
                                        <input type="file" name="src_img[]" class="form-control"
                                            accept=".jpg, .jpeg, .png, .gif" required multiple />
                                        <small>1200x600</small>
                                        <div class="invalid-feedback text-danger">
                                            src_default
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="order">순서</label>
                                <input type="number" class="form-control" name="order" minlength="1" required>
                                <div class="invalid-feedback text-danger">
                                    * 필수값
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="href">이동 url:</label>
                                <input type="text" class="form-control" name="href" required>
                                <div class="invalid-feedback text-danger">
                                    * 이동 URL
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- 리스트 --}}
    <div class="row">
        @foreach ($mainThumbnailList as $mainThumbnail)
        <div class="col-xl-6 col-md-6 mb-4 col-12">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col">
                            <div class="text-ms font-weight-bold text-dark text-uppercase mb-1">
                                {{ $mainThumbnail->title}}
                            </div>
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                {{ $mainThumbnail->subtitle}}</div>
                            <picture>
                                {{-- <source srcset="{{ asset($mainThumbnail->src_pc)}}" media="(min-width: 1400px)">
                                <source srcset="{{ asset($mainThumbnail->src_tablet)}}" media="(min-width: 769px)">
                                <source srcset="{{ asset($mainThumbnail->src_mobile)}}" media="(min-width: 577px)"> --}}
                                <img srcset="{{ asset($mainThumbnail->src_default)}}" alt="responsive image"
                                    class="d-block img-fluid">
                            </picture>
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-12 col-md-6">
                            <div class="h5 pt-4 font-weight-bold text-gray-800">
                                <a href="{{ $mainThumbnail->href }}" target="_blank" class="btn btn-info">{{ $mainThumbnail->button }}</a>
                            </div>
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                순위 : {{ $mainThumbnail->order == NULL ? '없음' :  $mainThumbnail->order }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="text-right">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">생성일 : {{ $mainThumbnail->created_at }}</div>
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">업데이트 : {{ $mainThumbnail->updated_at }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <a class="btn {{ $mainThumbnail->is_show == 0 ? 'btn-primary' : 'btn-danger' }} btn-sm btn-block text-white" href="{{ route('admin.thumbnail.state', ['id' => $mainThumbnail->id ]) }}">{{ $mainThumbnail->is_show == 0 ? '삭제 하기' : '공개 하기' }}</a>
                        <a data-toggle="modal" data-target="#thumbnail-update-{{$mainThumbnail->id}}" class="btn {{ $mainThumbnail->is_show == 0 ? 'btn-primary' : 'btn-danger' }} btn-sm btn-block text-white">수정</a>
                        <div class="modal fade" id="thumbnail-update-{{$mainThumbnail->id}}" tabindex="-1" role="dialog" aria-labelledby="thumbnail-update-{{$mainThumbnail->id}}Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="thumbnail-update-{{$mainThumbnail->id}}Label">썸네일 추가</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" novalidate enctype="multipart/form-data" action="{{ route('admin.thumbnail.update', ['id' => $mainThumbnail->id ]) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $mainThumbnail->id }}">
                                            <div class="form-group">
                                                <label for="title">큰제목</label>
                                                <input type="text" class="form-control" name="title" placeholder="큰제목" value="{{ $mainThumbnail->title }}">
                                                <div class="invalid-feedback text-danger">
                                                    * 큰제목
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="subtitle">작은제목</label>
                                                <input type="text" class="form-control" name="subtitle" placeholder="작은제목" value="{{ $mainThumbnail->subtitle }}">
                                                <div class="invalid-feedback text-danger">
                                                    * 소제목(내용 추가)
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="button">버튼 내용</label>
                                                <input type="text" class="form-control" name="button" placeholder="버튼 내용" value="{{ $mainThumbnail->button }}">
                                                <div class="invalid-feedback text-danger">
                                                    * 버튼에 추가될 Text
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="src_default" class="text-black-50">이미지 src_default</label>
                                                        <input type="file" name="src_img[]" class="form-control" accept=".jpg, .jpeg, .png, .gif" multiple value="{{ $mainThumbnail->src_default }}"/>
                                                        <input type="hidden" name="r_src_default" value="{{ $mainThumbnail->src_default }}">
                                                        <div class="row justify-content-center">
                                                            <div class="col-12 pt-1">
                                                                <img src="{{ asset($mainThumbnail->src_default) }}" alt="" class="imgimg-fluid" width="100%;">
                                                            </div>
                                                        </div>
                                                        <small>1200x600</small>
                                                        <div class="invalid-feedback text-danger">
                                                            src_default
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="order">순서</label>
                                                <input type="number" class="form-control" name="order" minlength="1" value="{{ $mainThumbnail->order }}">
                                                <div class="invalid-feedback text-danger">
                                                    * 필수값
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="href">이동 url:</label>
                                                <input type="text" class="form-control" name="href" value="{{ $mainThumbnail->href }}">
                                                <div class="invalid-feedback text-danger">
                                                    * 이동 URL
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

{{--  Start 자바스크립트 include  --}}
@section('script')
<script>
    // 프론트 유효성 체크 
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

</script>
@endsection  
{{--  END 자바스크립트 include  --}}
@endsection
