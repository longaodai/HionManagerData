@extends('layout.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            @if (Session::has('msg'))
                    <span class="text-success">{{Session::get("msg")}}</span>
            @endif
            <h5 class="font-14">Danh sách file import</h5>
            <table id="datatable" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tên file</th>
                        <th>Số data</th>
                        <th>Ngày nhập</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($data) > 0)
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->file_import}}</td>
                            <td>{{$item->data_number}}</td>
                            <td>{{$item->created_at->format('m/d/Y')}}</td>
                            <td>{{$item->status == DATA_USE ? 'Đang sử dụng' : 'Đã ẩn'}}</td>
                            <td>
                                @if ($item->status == DATA_USE)
                                <a href="{{route('admin.log_import.hidden', ['code' => $item->code, 'id' => $item->id])}}" class="btn btn-warning">Ẩn data</a>
                                @elseif ($item->status == DATA_NOT_USE)
                                <a href="{{route('admin.log_import.update', ['code' => $item->code, 'id' => $item->id])}}" class="btn btn-danger">Hiện data</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

        </div>
        <!-- end -->

    </div>
</div>
@endsection