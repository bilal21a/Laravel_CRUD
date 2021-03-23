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
            <a href="{{ route('product.index') }}" class="btn btn-success">Back</a>
        </div>
    </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Product name:  </strong>
                {{ $product->product_name }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Product Code:  </strong>
                {{ $product->product_code }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Product Details:  </strong>
                {{ $product->details }}
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Featured Image:  </strong>
                <img src="{{ URL::to($product->logo) }}" height="150px" width="220px">
            </div>
        </div>
    </div>
</div>







@endsection