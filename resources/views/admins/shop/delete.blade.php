@extends('admins.layouts.app')

@section('title', '상설매장 U&Shop 삭제목록 - ')

@section('style')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<style>

</style>
@endsection

@section('content')
<div class="container-fluid pt-5">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">상설매장 U&Shop 삭제목록</h1>
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
                                    <th>카테고리(제목)</th>
                                    <th>업로드 파일명</th>
                                    <th>조회수 </th>
                                    <th>작성일</th>
                                    <th>공개</th>
                                    <th>수정</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ushops as $ushop)
                                <tr class="{{ $ushop->is_show == 0 ? '' : 'bg-secondary text-white' }}">
                                    <th>{{ $ushop->id }}</th>
                                    <th>
                                        <img src="{{ asset($ushop->thumbnail) }}" alt="" width="50px" />
                                    </th>
                                    <th>
                                        <a href="{{ asset($ushop->href) }}" target="_blank">
                                            {{ $ushop->title }}
                                        </a>
                                    </th>
                                    <th>{{ $ushop->filename ? '있음기능추가해야함' : '없음' }}</th>
                                    <th>{{ $ushop->hits }}</th>
                                    <th>{{ $ushop->created_at }}</th>
                                    <th>
                                        <a href="{{ route('admin.shop.state', ['id' => $ushop->id ]) }}">
                                            삭제하기
                                        </a>
                                    </th>
                                    <td>
                                        <a href="{{ route('admin.shop.update', ['id' => $ushop->id ]) }}" class="btn btn-sm btn-primary">
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

@endsection

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