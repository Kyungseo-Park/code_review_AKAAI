@extends('admins.layouts.app')

@section('title', '교육/세미나 추가 - ')

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
        <h1 class="h3 mb-0 text-gray-800">교육/세미나 추가</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.education.create.form') }}" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title" class="label-title">제목</label>
                            <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp" required
                                placeholder="제목을 작성해주세요">
                            <div class="invalid-feedback text-danger">
                                * 필수값
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subtitle" class="label-title">소제목</label>
                            <input type="text" class="form-control" id="subtitle" name="subtitle" required
                                placeholder="소제목을 입력해주세요">
                            <div class="invalid-feedback text-danger">
                                * 필수값
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="thumbnail" class="label-title">썸네일</label>
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail" required>
                            <div class="invalid-feedback text-danger">
                                * 필수값
                            </div>
                            <div class="row">
                                <img src="https://dummyimage.com/750x500.jpg" alt="750x500 sample image" width="300px"
                                    style="padding : 25px; 0px 0px 25px">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="body" class="label-title">내용작성</label>
                            <textarea id="summernote" name="body" id="body" required></textarea>
                            <div class="invalid-feedback text-danger">
                                * 필수값
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="file" class="label-title">첨부파일</label>
                            <input type="file" name="file" id="file">
                            <div class="invalid-feedback text-danger">
                                * 필수값
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="recruitment_personnel" class="label-title">모집 인원</label>
                            <input type="number" name="recruitment_personnel" id="recruitment_personnel" minlength="0">
                            <div class="invalid-feedback text-danger">
                                * 필수값
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 col-6">
                                <div class="invalid-feedback text-danger">
                                    * 필수값
                                </div>
                                <label for="start_date" class="label-title">모집 시작</label>
                                <div class='input-group date'>
                                    <input type='text' class="form-control" id='start_date' name="start_date" required/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6 col-6">
                                <div class="invalid-feedback text-danger">
                                    * 필수값
                                </div>
                                <label for="end_date" class="label-title">모집 마감</label>
                                <div class='input-group date'>
                                    <input type='text' class="form-control" id="end_date" name="end_date" required/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
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

{{-- 마지막 추가해야할부분 --}}
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

    $(function () {
        $('#start_date').datetimepicker({
            dateFormat: 'yy-mm-dd',
            timeFormat:  "HH:mm:ss",
            prevText: '이전 달',
            nextText: '다음 달',
            monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
            monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
            dayNames: ['일', '월', '화', '수', '목', '금', '토'],
            dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
            dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
            showMonthAfterYear: true,
            yearSuffix: '년',
            inline: true,
            lang: 'kr'
        });
        $('#end_date').datetimepicker({
            dateFormat: 'yy-mm-dd',
            timeFormat:  "HH:mm:ss",
            prevText: '이전 달',
            nextText: '다음 달',
            monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
            monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
            dayNames: ['일', '월', '화', '수', '목', '금', '토'],
            dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
            dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
            showMonthAfterYear: true,
            yearSuffix: '년',
            lang: 'kr',
            useCurrent: false //Important! issue #1075 참고
        });
        // 도큐먼트 문서 참고 후 고도화 해야함 
        $("#start_date").on("dp.change", function (e) {
            $('#end_date').data("DateTimePicker").minDate(e.date);
        });
        $("#end_date").on("dp.change", function (e) {
            $('#start_date').data("DateTimePicker").maxDate(e.date);
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
{{-- 스크립트 추가 완료  --}}

@endsection
{{-- 페이지 import 종료 --}}
