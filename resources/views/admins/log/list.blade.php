@extends('admins.layouts.app')

@section('title', '로그 - ')

@section('style')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<style>

</style>
@endsection

@section('content')
<div class="container-fluid pt-5">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">로그 목록</h1>
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
                                    <th>제목</th>
                                    <th>사용자</th>
                                    <th>내용</th>
                                    <th>일시</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($logs as $log)
                                <tr>
                                    <th>{{ $log->id }}</th>
                                    <th>{{ $log->title }}</th>
                                    <th>{{ $log->getUserName ? $log->getUserName->email : '삭제된계정' }}</th>
                                    <th>{{ $log->body }}</th>
                                    <th>{{ $log->created_at }}</th>
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
