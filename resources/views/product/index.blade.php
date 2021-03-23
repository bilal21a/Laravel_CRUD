@extends('product.layout')

@section('content')
<br><br><br>
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Laravel Product LIST</h2>
        </div>
        <div class="pull-right">
            <a href="{{ route('create.product') }}" class="btn btn-success">Create new Product</a>
        </div>
    </div>
    </div>

{{-- alerts --}}
@if ($message=Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
@if ($message=Session::get('danger'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
@endif
@if ($message=Session::get('info'))
    <div class="alert alert-info">
        <p>{{ $message }}</p>
    </div>
@endif



        <table class="table table-bordered">
            <tr>
                <th width="150px">Product Name</th>
                <th width="150px">Product Code</th>
                <th width="250px">details</th>
                <th width="150px">Product Logo</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($product as $pro)
            <tr>
                <td>{{ $pro->product_name }}</td>
                <td>{{ $pro->product_code }}</td>
                <td>{{ str_limit($pro->details),$limit=70 }}</td>
                <td><img src="{{ URL::to($pro->logo) }}" height="60px" width="80px"></td>
                <td ><a class="btn btn-info"href="{{ URL::to('show/product/'.$pro->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ URL::to('edit/product/'.$pro->id) }}">Edit</a>
                    <a class="btn btn-danger" href="{{ URL::to('delete/product/'.$pro->id) }}" onclick="return confirm('are u sure??')">Delete</a></td>
            </tr>
            @endforeach
        </table>
        {!! $product->links() !!}
</div>


@endsection