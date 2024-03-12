@extends('layouts.main')

@section('content')

<style>
@media only screen and (min-width: 600px) {
  .mobile{
    display: none;
  }
}
@media only screen and (max-width: 600px) {
  .destop{
    display: none;
  }
}
</style>

  <nav class="mb-1 navbar navbar-expand-lg navbar-dark info-color" >
    <a class="navbar-brand" href="{{ ('/') }}" style="font-size:28px;">Coinbaseclub</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a class="nav-link text-white" href="https://support.coinbase.com/"> Help</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="https://www.coinbase.com/price">Price</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="{{ route('login') }}">Sign In</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white sn" href="{{ route('register') }}">Sign Up</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container">
  <h3 > Password Recovery in to Coinbaseclub</h3><br>
  <div class="row destop">
    <div class="col-md-3">
    </div>

    <div class="col-md-6 ">
      <form class="form-horizontal col-md-12"  method="POST" action="{{ route('forgetepassreset') }}">
        @csrf
        <div class="form-group">
          <input id="mobile" type="number" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus placeholder=" User ID">

          @error('mobile')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
        <div class="form-group">
          <input type="email" class="form-control @error('password') is-invalid @enderror" name="email" required  placeholder="Email">

          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
        <div class="custom-control custom-checkbox">
         {{-- <label> <input type="checkbox" name="remember"> Keep me signed in on this computer</label> --}}
          <button  class="btn btn-primary  pull-right" type="submit"> Reset Password </button>
       </div>
     </form>
   </div>

   <div class="col-md-3">
   </div>

 </div>



 <div class="row mobile">
          <div class="col-md-2">
          </div>
    <div class="col-mdphp-8 " style="margin-left:-90px;">
          <form class="form-horizontal col-md-12"  method="POST" action="{{ route('forgetepassreset') }}">
                    @csrf
                    <div class="form-group">
                      <input id="mobile" type="number" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus placeholder=" User ID">
            
                      @error('mobile')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <input type="email" class="form-control @error('password') is-invalid @enderror" name="email" required  placeholder="Email">
            
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="custom-control custom-checkbox">
                     {{-- <label> <input type="checkbox" name="remember"> Keep me signed in on this computer</label> --}}
                      <button  class="btn btn-primary  pull-right" type="submit"> Reset Password </button>
                   </div>
                 </form>
             </div>
             <div class="col-md-2">
          </div>

 </div>

 <br>
 <div class="content" >
           {{-- <a  href="">Forgot password? </a> <a href="{{ route('register') }}">Don't have an account'?</a>  --}}
 @endsection
 @section('style')
   <link href="{{ asset('coinbase/css/login.css') }}" rel="stylesheet">
 @endsection