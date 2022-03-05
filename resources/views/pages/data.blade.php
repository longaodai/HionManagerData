@extends('layout.master')

@section('style')
<style>
    .table-bordered th, .table-bordered td {
        border: 1px solid #999b9c !important 
    }
</style>
@endsection
@section('content')
<div class="row">
    
    <div class="col-12">
        <div class="mt-5">
            <h5 class="font-20 text-center text-uppercase">Data 
                @php
                    $title = '';
                    if (isset($categories) && !empty($categories)) {
                        $title = $categories->where('id', request()->get('category'))->first();
                    }
                    if (empty($title)) {
                        echo '';
                    } else {
                        echo $title->name;
                    }
                @endphp
            </h5>
            <br>
            <div class="col-12">
                <form action="">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Tên khách hàng</label>
                                <input type="text" name="customer_name" value="{{ request()->get('customer_name') }}" placeholder="Tên khách hàng" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Địa chỉ</label>
                                <input type="text" name="address" value="{{ request()->get('address') }}" placeholder="Địa chỉ" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Tên cửa hàng</label>
                                <input type="text" name="store_name" value="{{ request()->get('store_name') }}" placeholder="Tên cửa hàng" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Tên sản phẩm</label>
                                <input type="text" name="product_name" value="{{ request()->get('product_name') }}" placeholder="Tên sản phẩm" class="form-control">
                            </div>
                        </div>
                        <input type="hidden" name="category" value="{{ request()->get('category') }}">
                    </div>
                    <button style="width:70px" class="btn btn-sm btn-success" type="submit">Lọc</button>
                    <a style="width:70px" href="{{ request()->get('category') ? 'data?category='.request()->get('category') : url()->current() }}" class="btn btn-sm btn-warning">Reset</a>
                    <button style="width:70px; padding: 0; height: 30px" class="btn btn-sm btn-primary" name="download" value="1" type="submit">
                        <i class="mdi mdi-cloud-download" style="font-size: 20px;"></i>
                    </button>
                </form>
            </div>
            <hr>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="bg-primary" style="color: white">
                        <th>Tên</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Cửa hàng</th>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($data) > 0)
                        @foreach ($data as $item)
                        <tr>
                            <td style="width: 10%">{{$item->name_customer ?? '-'}}</td>
                            <td style="width: 10%">{{$item->phone ?? '-'}}</td>
                            <td style="width: 20%">{{$item->address ?? '-'}}</td>
                            <td style="width: 10%">{{$item->store ?? '-'}}</td>
                            <td style="width: 20%">{{$item->product ?? '-'}}</td>
                            <td style="width: 10%">{{$item->price ?? '-'}}</td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-12">
        <center>
            <div>{!! $data->appends(request()->except('page'))->render() !!}</div>
        </center>
    </div>
</div>
@endsection