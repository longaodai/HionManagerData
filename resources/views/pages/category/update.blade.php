@extends('layout.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h5 class="font-14">Sửa danh mục</h5>
            <div class="col-lg-12">
                <form class="form-horizontal" action="{{route('admin.category.update', ['id' => $data->id])}}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Tên danh mục</label>
                        <div class="col-md-10">
                            <input type="text" value="{{$data->name}}" name="name" class="form-control" value="Tên danh mục...">
                        </div>
                    </div>
                    <center>
                        <button type="submit" class="btn btn-success">Sửa</button>
                        <a href="{{route('admin.category.list')}}" class="btn btn-primary">Trở lại</a>
                    </center>
                </form>
            </div>

        </div>
        <!-- end -->

    </div>
</div>
@endsection