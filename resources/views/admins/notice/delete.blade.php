@extends('admins.layouts.app')

@section('title', '공지사항 삭제목록 - ')

@section('style')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<style>

</style>
@endsection

@section('content')
<div class="container-fluid pt-5">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">공지사항 삭제목록</h1>
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
                                    <th>제목</th>
                                    <th>업로드 파일명</th>
                                    <th>조회수 </th>
                                    <th>작성일</th>
                                    <th>공개</th>
                                    <th>수정</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($noticeList as $notice)
                                <tr class="{{ $notice->is_show == 0 ? '' : 'bg-secondary text-white' }}">
                                    <th>{{ $notice->id }}</th>
                                    <th>{{ $notice->title }}</th>
                                    <th>{{ $notice->filename ? '' : '없음' }}</th>
                                    <th>{{ $notice->hits }}</th>
                                    <th>{{ $notice->created_at }}</th>
                                    <th>
                                        <a href="{{ route('admin.notice.state', ['id' => $notice->id ]) }}">
                                            {{-- {{ $notice->is_show == 0 ? __('공개(on)') : __('삭제(off)') }} --}}
                                            삭제하기
                                        </a>
                                    </th>
                                    <td>
                                        <a href="{{ route('admin.notice.update', ['id' => $notice->id ]) }}" class="btn btn-sm btn-primary">
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
