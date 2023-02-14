@extends('layouts.app')
@section('content')

<section class="vh-100">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
            class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <form method="POST" action="{{ route('post_login') }}">
            @csrf
            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
              <h2 class="mb-0 me-3 mb-2">Halaman Login</h2>
            </div>
  
            <!-- Email input -->
            <div class="form-outline mb-2">
              <input  class="form-control form-control-lg" name="username"
                placeholder="Masukkan username" />
                @if ($errors->has('username'))
                    <span class="text-danger">{{ $errors->first('username') }}</span>
                @endif
            </div>
  
            <!-- Password input -->
            <div class="form-outline mb-2">
              <input type="password" name="password" class="form-control form-control-lg"
                placeholder="Masukkan password" />
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
  
            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            </div>
            @if (session()->has('error'))
                <span class="text-danger">{{ session()->get('error') }}</span>
            @endif 
          </form>
        </div>
      </div>
    </div>
    
  </section>
@endsection
