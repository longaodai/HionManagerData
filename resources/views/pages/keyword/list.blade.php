@extends('layout.master')

@section('style')
        <link href="{{asset('assets\libs\datatables\dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets\libs\datatables\buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets\libs\datatables\responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets\libs\datatables\select.bootstrap4.css')}}" rel="stylesheet" type="text/css">
@endsection
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

@section('script')
<script src="{{asset('assets\libs\datatables\jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets\libs\datatables\dataTables.bootstrap4.min.js')}}"></script>

<!-- Buttons examples -->
<script src="{{asset('assets\libs\datatables\dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets\libs\datatables\buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets\libs\datatables\dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('assets\libs\datatables\dataTables.select.min.js')}}"></script>
<script src="{{asset('assets\libs\jszip\jszip.min.js')}}"></script>
<script src="{{asset('assets\libs\pdfmake\pdfmake.min.js')}}"></script>
<script src="{{asset('assets\libs\pdfmake\vfs_fonts.js')}}"></script>
<script src="{{asset('assets\libs\datatables\buttons.html5.min.js')}}"></script>
<script src="{{asset('assets\libs\datatables\buttons.print.min.js')}}"></script>

<!-- Responsive examples -->
<script src="{{asset('assets\libs\datatables\dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets\libs\datatables\responsive.bootstrap4.min.js')}}"></script>

<!-- Datatables init -->
<script src="{{asset('assets\js\pages\datatables.init.js')}}"></script>
@endsection