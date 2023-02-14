@extends('layouts.app')

@section('content')
<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row justify-content-center">
        @foreach($products as $product)
            <div class="col-md-12 col-xl-10">
            <div class="card shadow-0 border rounded-3">
                <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                    <div class="bg-image hover-zoom ripple rounded ripple-surface">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/f/f0/GHS-pictogram-unknown.svg"
                        class="w-100" />
                        <a href="#!">
                        <div class="hover-overlay">
                            <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                        </div>
                        </a>
                    </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-6">
                    <h5>{{ $product->product_name }}</h5>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                    <div class="d-flex flex-row align-items-center mb-1">
                        <h4 class="mb-1 me-1">{{ $product->currency }} {{ $product->price - $product->discount * $product->price }}</h4>
                        <span class="text-danger"><s>{{ $product->currency }} {{ $product->price }}</s></span>
                    </div>
                    <div class="d-flex flex-column mt-4">
                        <button class="btn btn-primary btn-sm" type="button">Buy</button>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
      @endforeach
      <div class="col-md-12 col-xl-10 mt-2">
        <div class="d-flex justify-content-center">
            <button class="btn btn-lg btn-info" href="#">Checkout</button>
        </div>
            </div>
    </div>
    </div>
  </section>
@endsection