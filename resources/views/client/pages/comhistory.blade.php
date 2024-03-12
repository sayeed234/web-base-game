@extends('client.layouts.app')
@section('content')
<div class="container">
<div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
          <div class="row boxstyle" style="margin-top: 30px;">
                    <table class="table" >
                      <h4 style="color: black">Referrer Commission Details</h4><br>
                      <thead class="text-muted text-center">
                        <tr style="background-color:bisque ">
                          <th scope="col">#</th>
                          <th scope="col">User ID</th>
                          <th scope="col">Referrer Name</th>
                          <th scope="col">Referrer Code</th>
                          <th scope="col">Commission ( 20% )</th>
                          <th scope="col">Date</th>

                        </tr>

                      </thead>
                      <tbody style="text-align:center;">
                    @php $i=1; $sum=0; @endphp
                    @foreach($result as $com)
                         <tr>
                       <td>{{ $i++ }}</td>
                       <td>{{ $com->mobile }}</td>
                       <td>{{ $com->name }}</td>
                       <td>{{ $com->userscode }}</td>
                       <td> $ {{ $com->commision }}</td>
                       <td> {{ date('d-M-Y', strtotime($com->updated_at)) }}</td>
                         </tr>
                         @php $sum=$sum+$com->commision;  @endphp
                         @endforeach
                      </tbody>
                      <tr style="text-align:center;">

                        <td colspan="4"  style="text-align:right;"><b>Total: </b></td>
                        <td ><b>$ {{ $sum }}</b></td>
                      </tr>
                    </table>
                  </div>
          </div>
          <div class="col-md-1"></div>
</div>
@endsection