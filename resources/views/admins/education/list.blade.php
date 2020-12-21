@extends('admins.layouts.app')

@section('title', '교육/세미나 목록 - ')

@section('style')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<style>

</style>
@endsection

@section('content')
<div class="container-fluid pt-5">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">교육/세미나 목록</h1>
        <a href="{{ route('admin.education.create') }}"
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
                                    <th>부제목</th>
                                    <th>모집인원 / 목표인원</th>
                                    <th>모집 시작 / 마감</th>
                                    <th>조회수 </th>
                                    <th>삭제</th>
                                    <th>수정</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($educationList as $education)
                                <tr class="{{ $education->is_show == 0 ? '' : 'bg-secondary text-white' }}">
                                    <td>{{ $education->id }}</td>
                                    <td>
                                        <img src="{{ asset($education->thumbnail) }}" alt="" width="50px" />
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.education.receipt', ['id' => $education->id ]) }}">
                                        {{ $education->title }}
                                        </a>
                                    </td>
                                    <td>{{ $education->subtitle }}</td>
                                    <td>{{ $education->getEducationId->count() }} / {{ $education->recruitment_personnel }}</td>
                                    <td>{{ $education->start_date }} / {{ $education->end_date  }}</td>
                                    <td>{{ $education->is_show }}</td>
                                    <td>
                                        <a href="{{ route('admin.education.state', ['id' => $education->id ]) }}">
                                            {{-- {{ $education->is_show == 0 ? __('공개(on)') : __('삭제(off)') }} --}}
                                            삭제하기
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.education.update', ['id' => $education->id ]) }}" class="btn btn-sm btn-primary">
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
