@extends('layout.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h5 class="font-14">Import data</h5>
            @if (Session::has('msg'))
                    <span class="text-success">{{Session::get("msg")}}</span>
            @endif
            <form action="{{route('admin.importing')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file_csv" id="file">
                <button class="btn btn-success">Import data</button>
            </form>
        </div>
        <!-- end -->

    </div>
</div>
@endsection