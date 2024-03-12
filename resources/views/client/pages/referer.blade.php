@extends('client.layouts.app')
@section('content')


 <?php
$i=1;
   
//dd();
?>
 <div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h4>Referrer List</h4><br>
            <table class="table table-striped text-center">
                <thead>
                  <tr style="background-color:bisque">
                    <th scope="col">#</th>                
                    <th scope="col">User ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Ref Code</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($ref as $ref)
                  <tr>
                    <th>{{ $i++ }}</th>
                    <td>{{ $ref->mobile }}</td>
                    <td>{{ $ref->name }}</td>
                    <td>{{ $ref->usercode }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
           
    </div>
    <div class="col-md-2"></div>
  </div>
   

@endsection