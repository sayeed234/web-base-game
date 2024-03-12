@extends('client.layouts.app')
@section('content')
  <div class="container">

  @if (session('status'))
<div class="alert alert-success" role="alert">
  {{ session('status') }}
</div>

@endif    

<section class="service" style="margin-top: 100px;">
  <div class="container">
      <br>
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          @if($updateProfile->profileimage=='')
          <img src="{{ asset('coinbase/img/user.png') }}" alt="picture" style="width:100%">
          @else
          <img src="{{ asset('/coinbase/client/'. $updateProfile->profileimage) }}" alt="picture" style="width:100%">
          @endif
          <br> 
          <h3> <br>{{ $updateProfile->usercode }}</h3>
          <h3>{{ $updateProfile->name }}</h3>
          <h6>{{ $updateProfile->mobile }}</h6>
          <h6>{{ $updateProfile->email }}</h6>
          <input type="text" class="text-center" readonly value="5xbetclub.com/ref/{{ $updateProfile->usercode }}" id="myInput">
      <h6><button onclick="myFunction()"  class="btn btn-sm btn-info">Copy Refer Link</button></h6>

        </div>
        <br>
      </div>
     
      <div class="col-md-2">
      </div>
      <div class="col-md-6 boxstyle">
          <h4>Profile Update</h4>
          <br>
        <form action="{{ route('profileUpdate') }}" method="POST" enctype="multipart/form-data" file="true">
          @csrf
          <div class="form-group">
          <input type="text" class="form-control"  name="name" value="{{ $updateProfile->name }}">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="email" value="{{ $updateProfile->email }}">
          </div>
          <div class="form-group">
            <input type="file" class="form-control" name="profileimage">
          </div>
          <div class="form-group col-md-3">
            <button class="btn btn-outline-secondary">Update</button>
          </div>
        </form>
        <hr>
        <h4>Change Password</h4>
        <br>

        <form action="{{ route('passwordUpdate') }}" method="POST">
          @csrf
          @if (session('error'))
          <div class="alert alert-warning" role="alert">
            {{ session('error') }}
          </div>
          @endif  
          @if (session('successp'))
          <div class="alert alert-success" role="alert">
            {{ session('successp') }}
          </div>
          @endif 
          <div class="form-group">
          <input type="password" class="form-control" name="old_password" placeholder="Old password">
          </div>
          <div class="form-group">
            <input id="new_password" class="form-control" type="password" name="new_password" required="" placeholder="New password"/><br/>
                @if ($errors->has('new_password'))
                    <span class="help-block errshow">
                        <strong class="errshow">{{ $errors->first('new_password') }}</strong>
                    </span>
                @endif
              @error('new_password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
          </div>
          <div class="form-group">
            <input id="password-confirm" class="form-control" type="password" name="password_confirmation" required="" placeholder="Confirm password"><br/>
            @if ($errors->has('password_confirmation'))
                <span class="help-block errshow">
                    <strong class="errshow">{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group col-md-3">
              <button class="btn btn-outline-secondary">Update</button>
            </div>
 </div>
</div>
</section>
<!-- services end -->
    <div class="col-md-2">
      </div>
  </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('style')
<style>

  .errshow {
    color:red;
  }
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999999)
  document.execCommand("copy");
  alert("Copied the Refer Link: " + copyText.value);
}
</script>
@endsection