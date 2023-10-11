@extends('layouts.app') <!-- You might have a different layout -->

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb mt-4 ms-3">
        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Product List</li>
    </ol>
  </nav>
<div class="container-xl">
    <div class="row mt-4">
        @foreach($products as $product)
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 mb-5">
                <div class="card">
                    <img src="{{ $product->image }}" class="card-img-top " alt="{{ $product->name }}">
                    <div class="card-body">
                        <h6 class="card-title">{{ $product->name }}</h6>
                        <p class="card-text">Price: ${{ $product->price }}</p>
                        <a href="{{ route('details', ['product' => $product->id,'price' => $product->price]) }}" class="btn btn-primary">Buy Now</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
