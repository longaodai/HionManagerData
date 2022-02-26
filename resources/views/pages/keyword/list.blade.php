@extends('layout.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            @if (Session::has('msg'))
                    <span class="text-success">{{Session::get("msg")}}</span>
            @endif
            <h5 class="font-14">Danh sách từ khóa</h5>
            <table id="datatable" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Từ khóa</th>
                        <th>Loại</th>
                        <th>Hành động</th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($data) > 0)
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->keyword}}</td>
                            <td>{{$item->category->name}}</td>
                            <td>
                                <a href="{{route('admin.keyword.edit', ['id' => $item->id])}}" class="btn btn-warning">Sửa</a>
                                <a href="{{route('admin.keyword.destroy', ['id' => $item->id])}}" class="btn btn-danger">Xóa</a>
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