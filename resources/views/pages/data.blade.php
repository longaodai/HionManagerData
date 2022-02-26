@extends('layout.master')

@section('style')
    <style>
        .buttons-pdf, .buttons-copy {
            display: none;
        }    
    </style>    
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="mt-5">
            <h5 class="font-14">Data 
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
            <table id="datatable-buttons" class="table table-bordered dt-responsive " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Store</th>
                        <th>Product</th>
                        <th>Price</th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($data) > 0)
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$item->name_customer}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->address}}</td>
                            <td>{{$item->store}}</td>
                            <td>{{$item->product}}</td>
                            <td>{{$item->price}}</td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection