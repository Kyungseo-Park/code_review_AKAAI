@extends('admins.layouts.app')

@section('title', '최근소식 목록 - ')

@section('style')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<style>

</style>
@endsection

@section('content')
<div class="container-fluid pt-5">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">최근소식 목록</h1>
        <a href="{{ route('admin.news.create') }}"
            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">추가</a>
    </div>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>썸네일</th>
                                    <th>제목</th>
                                    <th>업로드 파일명</th>
                                    <th>조회수 </th>
                                    <th>작성일</th>
                                    <th>삭제</th>
                                    <th>수정</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($newsList as $news)
                                <tr class="{{ $news->is_show == 0 ? '' : 'bg-secondary text-white' }}">
                                    <th>{{ $news->id }}</th>
                                    <th>
                                        <img src="{{ asset($news->thumbnail) }}" alt="" width="50px" />
                                    </th>
                                    <th>{{ $news->title }}</th>
                                    <th>{{ $news->filename ? '있음기능추가해야함' : '없음' }}</th>
                                    <th>{{ $news->hits }}</th>
                                    <th>{{ $news->created_at }}</th>
                                    <th>
                                        <a href="{{ route('admin.news.state', ['id' => $news->id ]) }}">
                                            {{-- {{ $news->is_show == 0 ? __('공개(on)') : __('삭제(off)') }} --}}
                                            삭제하기
                                        </a>
                                    </th>
                                    <td>
                                        <a href="{{ route('admin.news.update', ['id' => $news->id ]) }}" class="btn btn-sm btn-primary">
                                            수정
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script')
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable({
            order: [
                [0, 'desc']
            ]
        });
    });
</script>
@endsection

@endsection
