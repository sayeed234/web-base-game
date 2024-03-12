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

<nav class="navbar navbar-expand-lg navbar-dark bg-secondary fixed-top">
  <div class="container">
  <a class="navbar-brand" href="{{ ('/') }}" style="font-size:25px;"> <span style="font-size:35px;">5X</span>Betclub</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="" style="color:white;">Prices  </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;">
         Company
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" >
          <a class="dropdown-item" href="">About Us</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="">Blog</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="">Support</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="">Careers</a>
          
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="" style="color:white;"  >Earn 
            </a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
        <ul class="navbar-nav ml-auto  my-2 my-lg-0">
         <li class="nav-item">
           <a class="nav-link text-white" href="{{ route('login') }}">Sign in</a>
         </li>
         &nbsp; &nbsp;
          <li class="nav-item">

        @if(session()->has('admin'))
        <a class="btn btn-outline-light btn-lg my-2 my-sm-0" style="" href="{{ route('admin.dashboard') }}">Dashboard</a>
        @else 
        <a class="btn btn-outline-light btn-lg my-2 my-sm-0" style="" href="{{ route('register') }}">Get Started</a>
        @endif

     
         </li>
       </ul>
   </form>
  </div>
</div>
</nav>

 <!-- header part -->
  <header class="header bg-secondary " >
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
          <h2 class="text-white font-weight-bold text">Make a Qualifying Deposit</h2>
         <br>
        </div>
        <div class="col-lg-5 align-self-baseline">
          <p class="text-white-75 font-weight-light mb-5">Place bets to deposit value, once they are settled, matched amount in Bet Credits available to use </p>
            <div class="col-12 destop">
          <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" size="28" type="email" placeholder="Email Address" aria-label="Search">
              <button class="btn btn-success  my-2 my-sm-12" type="submit">Subscribe</button>
            </form>
            </div>

            <div class="col-12 mobile">
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" size="30" type="email" placeholder="Email Address" aria-label="Search">
                    <br> <br> 
                    <button class="btn btn-success  col-12" type="submit">Subscribe</button>
                  </form>
                </div>
           {{-- <input type="text" size="5" placeholder=" Email Address" class="form-control" name="search">
          <a class="btn btn-success btn3" href="{{ route('register') }}">Get started</a> --}}
        </div>
      </div>
    </div>
  </header>
   <!-- header end -->

<!-- Get stared -->

<section class="get-started">
          <div class="container text-center">
              <h2>Get started in a few minutes</h2>
                <p>5xbetclub supports a variety of the most popular digital currencies.</p>
            <br><br>
               <div class="row justify-content-center">
              <div class="col-md-4 text-center" >
               <img src="{{ asset('coinbase/img/8.PNG') }}" width="90px" height="90px;">
               <h5>Create an account</h5>
               <br><br>
              </div>
            <div class="col-md-4 text-center">
               <img src="{{ ('coinbase/img/9.PNG') }}" width="90px" height="90px;">
               <h5>Link your bank account</h5>
               <br><br>
              </div>
              <div class="col-md-4 text-center">
                <img src="{{ ('coinbase/img/10.PNG') }}" width="90px" height="90px;">
                <h5>Start buying & selling</h5>
              </div> <br>    
      </div>
      </div>
</section>
<!-- Get stared end -->


<!-- Footer -->
<br>
  <footer class="bg-white py-3 footer" >
    <div class="container">
      <hr>
      <div class="row">
        <div class="col-md-4">
          <h5>5XBetclub</h5>
          <p>+1 (888) 908-7000 <br>support@5xbetclub.com</p>
          <p>© 2019 5XBetclub</p>
        </div>
        <div class="col-md-2 text-color" >
          <h6>Products</h6><br>
        <a href="{{url('/register') }}">5XBetclub</a><br>
          <a href="">Commerce</a><br>
          <a href="">Custody</a><br>
          <a href="">Earn</a><br>
          <a href="">Wallet</a><br>
          <a href="">Ventures</a>
        </div>
        <div class="col-md-2 text-color">
         <h6>Learn</h6><br>
          <a href="">Support countries</a><br>
          <a href="">Status</a><br>
          <a href="">Ventures</a>
        </div>
        <div class="col-md-2 text-color">
         <h6> Company</h6><br>
         <a href="">About</a><br>
          <a href="">Affiliates</a><br>
          <a href="">Careers</a><br>
          <a href="">Partners</a><br>
          <a href="">Press</a><br>
          <a href="">Legal & Privacy</a><br>
          <a href="">Support</a><br>
        </div>
        <div class="col-md-2 text-color">
          <h6> Social</h6><br>
         <a href=""">Twitter</a><br>
          <a href="">Facbook</a><br>
        </div>
      </div>
    </div>
  </footer>
@endsection
