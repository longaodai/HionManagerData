@extends('layout.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            @if (Session::has('msg'))
                    <span class="text-success">{{Session::get("msg")}}</span>
            @endif
            <h5 class="font-14">Xử lý data</h5>
            <a href="{{route('admin.handle_next')}}" class="btn btn-warning">Xử lý tiếp</a>
            <a href="{{route('admin.handle_all')}}" class="btn btn-success">Xử lý tất cả</a>
        </div>
        <!-- end -->

    </div>
</div>
@endsection