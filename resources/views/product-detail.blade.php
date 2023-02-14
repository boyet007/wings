@extends('layouts.app')
@section('content')
<section style="background-color: #eee;">
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-4">
          <div class="card text-black">
            <div class="card-header">Product Detail</div>
            <i class="fab fa-apple fa-lg pt-3 pb-1 px-3"></i>
            <img src="https://upload.wikimedia.org/wikipedia/commons/f/f0/GHS-pictogram-unknown.svg"
              class="card-img-top" />
            <div class="card-body">
              <div class="text-center">
                <h5 class="card-title">{{ $product->product_name}}</h5>
              </div>
              <div>
                <div class="d-flex justify-content-between">
                  <span>{{ $product->currency }} {{ $product->price - $product->discount / 100 * $product->price }}</span>
                  @if($product->discount)
                       <span class="text-danger"><s>{{ $product->currency }} {{ $product->price }}</s></span>
                   @endif
                </div>
              </div>
              {{-- <div class="d-flex flex-column mt-4">
                <button class="btn btn-primary btn-lg" type="button">Buy</button>
            </div> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection