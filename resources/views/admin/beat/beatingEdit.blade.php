@extends('admin.layouts.app')
@section('content')
 <div class="container" >
    {{-- <h3 class="h3style">Create your account</h3><br> --}}
    <div class="row col-md-12">
      <div class="col-md-3">
      </div>
      <div class="col-md-6 boxstyle">
        <form class="form-horizontal col-md-12"  form method="POST" action="{{ URL::route('beating.update', $beat->id) }}" >
           @csrf
          <div class="form-group">
            <label>Name</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $beat->name }}" required autocomplete="name" autofocus placeholder="Enter your Name">
            <input type="hidden" name="id" value="{{ $beat->id }}">
            @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="price">Price</label>
            <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $beat->price }}" required autocomplete="price" placeholder="Enter your price">
                
            @error('price')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          {{-- <div class="form-group">
            <label for="quantity">Quantity</label>
            <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" required autocomplete="quantity" autofocus placeholder="Enter your quantity number">
                
            @error('quantity')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div> --}}
          
          <button  class="btn btn-primary my-4 btn-block " type="submit">Update</button>
          
        </form>
      </div>
      
    </div><br>
    
  </div>

@endsection