@extends('agent.layouts.app')
@section('content')
<br><br>
<?php
$i=1;
    $ref=DB::table('users')
         ->where('users.useragentcode',Auth::user()->agentcode)
         ->get();
//dd();
?>
 <div class="container">
    <div class="row">
    
      <div class="col-md-2">
      </div>
        <div class="col-md-8">
            <h4>My Referrer</h4><br>

            <table id="example" class="table table-striped table-bordered text-center" style="width:100%">
              <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">User ID</th>
                    <th scope="col">Ref Code</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($ref as $ref)
                <tr>
                  <th>{{ $i++ }}</th>
                  <td>{{ $ref->name }}</td>
                  <td>{{ $ref->mobile }}</td>
                  <td>{{ $ref->usercode }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{-- <table class="table table-striped">
                <thead>
                  <tr style="background-color:bisque; text-align:center;">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">ID</th>
                    <th scope="col">Ref Code</th>
                  </tr>
                </thead>
                <tbody style="text-align:center;">
                  @foreach($ref as $ref)
                  <tr>
                    <th>{{ $i++ }}</th>
                    <td>{{ $ref->name }}</td>
                    <td>{{ $ref->mobile }}</td>
                    <td>{{ $ref->usercode }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table> --}}
    </div>
    <div class="col-md-2">
      </div>
      
  </div>
  </div>
  <br>
@endsection