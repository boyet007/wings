@extends('layouts.app')
@section('content')
<section class="h-100 h-custom" style="background-color: #eee;">
    @if (Session::get('error'))
        <div class="col-md-12 col-xl-10">
            <h3 class="badge bg-error">{{ Session::get('error') }}</h3>
        </div>
    @endif
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card">
            <div class="card-body p-4">
              <div class="row">
                @foreach($carts as $cart)
                    <div class="col-lg-7">
                    <div class="card mb-3">
                        <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                            <div>
                                <img src="https://upload.wikimedia.org/wikipedia/commons/f/f0/GHS-pictogram-unknown.svg"
                                class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                            </div>
                            <div class="ms-3">
                                <h5>{{ $cart['product_name'] }}</h5>
                            </div>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                            <div style="width: 132px;">
                                <h5 class="fw-normal mb-0">
                                    <input type="number" disabled  class="form-control" value="{{ $cart['qty'] }}" style="width: 70px;" />
                                </h5>
                            </div>
                            <div style="width: 124px;">
                                <h5 class="mb-0">{{ $cart['product_currency'] }} {{ $cart['product_price'] }}</h5>
                            </div>
                            <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                @endforeach
              </div>
              <div class="row">
                <div class="col-lg-5">
                    <div class="card bg-primary text-white rounded-3">
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <p class="mb-2">Subtotal</p>
                        <p class="mb-2">IDR {{ $subtotal }}</p>
                      </div>
                      <a href="/process-checkout" class="btn btn-info btn-block btn-lg">Confirm</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
 </section>
 @endsection
