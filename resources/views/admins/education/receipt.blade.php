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
        <h1 class="h3 mb-0 text-gray-800">교육/세미나 신청자 목록</h1>
        <a href="{{ route('admin.education.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">추가</a>
    </div>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered display nowrap" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>신청자 이름</th>
                                    <th>신청자 이메일</th>
                                    <th>신청자 연락처</th>
                                    <th>신청자 소속</th>
                                    <th>신청 시간</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($receiptLists as $education)
                                <tr class="{{ $education->is_show == 0 ? '' : 'bg-secondary text-white' }}">
                                    <td>{{ $education->id }}</td>
                                    <td>{{ $education->name }}</a></td>
                                    <td>{{ $education->email }}</td>
                                    <td>{{ $education->tel }}</a></td>
                                    <td>{{ $education->class }}</td>
                                    <td>{{ $education->created_at  }}</td>
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
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>

<script>
    $(document).ready(function () {
        $('#dataTable').DataTable({
            order: [
                [0, 'desc']
            ],
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ]
        });
    });
</script>


@endsection

@endsection
