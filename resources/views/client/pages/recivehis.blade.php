@extends('client.layouts.app')
@section('content')


 <?php
$i=1;
  $sum=0; 
//dd();
?>
 <div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h4>Receive Fund History</h4><br>
            <table class="table table-striped text-center">
                <thead>
                  <tr style="background-color:bisque">
                    <th scope="col">#</th>                
                    <th scope="col">Agent ID</th>
                    <th scope="col">Agent Code</th>
                    <th scope="col">Receive</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($recive as $ref)
                  <tr>
                    <th>{{ $i++ }}</th>
                    <td>{{ $ref->mobile }}</td>
                    <td>{{ $ref->agentcode }}</td>
                    <td>$ {{ $ref->amount }}</td>
                    <td>{{ date('d-M-Y', strtotime($ref->updated_at)) }}</td>
                  </tr>
                  @php $sum=$sum+$ref->amount; @endphp
                  @endforeach
                </tbody>
                <tr>
                    <td colspan="3" style="text-align:right;"><b>Total : </b></td>
                    <td ><b> $ {{ $sum }}</b></td>
                    <td ></td>
                </tr>
              </table>
           
    </div>
    <div class="col-md-2"></div>
  </div>
   

@endsection