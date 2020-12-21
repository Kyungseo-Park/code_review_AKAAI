@extends('admins.layouts.app')

@section('title', '상설매장 U&Shop 수정 - ')

@section('style')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
<style>
    .label-title {
        font-size: 20px;
        color: #0f0f0f;
    }

</style>
@endsection

@section('content')
<div class="container-fluid pt-5">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">상설매장 U&Shop 수정</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.shop.update.form') }}" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $shop->id }}">
                        {{-- 'id', 'title', 'body', 'user_id','uploadfile', 'filename', 'is_show', 'hits', 'created_at', 'updated_at', --}}
                        <div class="form-group">
                            <label for="title" class="label-title">제목</label>
                            <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp" value="{{ $shop->title }}"
                                placeholder="제목을 작성해주세요">
                            <div class="invalid-feedback text-danger">
                                * 필수값
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="label-title">이동 url</label>
                            <input type="text" class="form-control" id="href" name="href" aria-describedby="hrefHelp" value="{{ $shop->href }}"
                                placeholder="url을 작성해주세요">
                            <div class="invalid-feedback text-danger">
                                * 필수값
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="thumbnail" class="label-title">썸네일</label>
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail" >
                            <input type="hidden" class="form-control" id="r_thumbnail" name="r_thumbnail" value="{{ $shop->thumbnail }}">
                            <div class="invalid-feedback text-danger">
                                * 필수값
                            </div>
                            <div class="row">
                                <img src="{{ asset($shop->thumbnail) }}" alt="750x500 sample image" width="300px"
                                    style="padding : 25px; 0px 0px 25px">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="body" class="label-title">내용작성</label>
                            <textarea id="summernote" name="body" id="body">
                                {!! $shop->body !!}
                            </textarea>
                            <div class="invalid-feedback text-danger">
                                * 필수값
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="file" class="label-title">첨부파일</label>
                            <input type="file" name="file" id="file">
                            <input type="hidden" name="r_filename" value="{{ $shop->filename }}">
                            <input type="hidden" name="r_file" value="{{ $shop->uploadfile }}">
                            <div class="invalid-feedback text-danger">
                                * 필수값
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">작성완료</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- summnernote 사용할경우 jquery-3.2.1 비활성화 후 3.5.1를 활성화 --}}
@section('summnernote')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ asset('admins/js/admin.min.js') }}"></script>
@endsection

{{-- 마지막 수정해야할부분 --}}
@section('script')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.js">
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#summernote').summernote({
            height: 200,
            dialogsInBody: true,
            callbacks: {
                onInit: function () {
                    $('body > .note-popover').hide();
                }
            },
        });
    });

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
{{-- 스크립트 수정 완료  --}}

@endsection
{{-- 페이지 import 종료 --}}
