@extends('layout.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            @if (Session::has('msg'))
                    <span class="text-success">{{Session::get("msg")}}</span>
            @endif
            <h5 class="font-14">Danh sách danh mục</h5>
            <table id="datatable" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Danh mục</th>
                        <th>Hành động</th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($data) > 0)
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>
                                <a href="{{route('admin.category.edit', ['id' => $item->id])}}" class="btn btn-warning">Sửa</a>
                                <a href="{{route('admin.category.destroy', ['id' => $item->id])}}" class="btn btn-danger">Xóa</a>
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