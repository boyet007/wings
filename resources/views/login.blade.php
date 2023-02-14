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
          <form>
            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
              <h2 class="mb-0 me-3 mb-2">Halaman Login</h2>
            </div>
  
            <!-- Email input -->
            <div class="form-outline mb-2">
              <input  class="form-control form-control-lg"
                placeholder="Masukkan username" />
            </div>
  
            <!-- Password input -->
            <div class="form-outline mb-2">
              <input type="password" id="form3Example4" class="form-control form-control-lg"
                placeholder="Masukkan password" />
            </div>
  
            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="button" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    
  </section>
@endsection
