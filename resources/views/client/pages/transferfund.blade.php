@extends('client.layouts.app')
@section('content')


 <?php
$i=1;
$ii=1;
$sum=0;
$sum2=0;
   
//dd();
?>
 <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h4> Fund Transfer History</h4><br>
            <table class="table table-striped text-center">
                <thead>
                  <tr style="background-color:bisque">
                    <th scope="col">#</th>                
                    <th scope="col">Agent</th>
                    <th scope="col">User ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($transfer as $ref)
                  <tr>
                    <th>{{ $i++ }}</th>
                    <td>{{ $ref->useragentcode }}</td>
                    <td>{{ $ref->mobile }}</td>
                    <td>{{ $ref->name }}</td>
                    <td>{{ $ref->transferamount }}</td>
                    <td>{{ $ref->created_at}}</td>
                  </tr>
                  @php $sum=$sum+$ref->transferamount  @endphp
                 
                  @endforeach
                </tbody>
                <tr>
                      <td colspan="4" style="text-align:right;"> <b>Total :</b></td>
                      <td style="text-align:center;"> <b> $ {{ $sum }}</b></td>
                      <td></td>
                </tr>
              </table>
         
              <hr>
              <br>
              {{ $transfer->links() }}
    </div>
   
    <div class="col-md-12">
          <hr>
          <h4> Fund Receive History</h4><br>
          <table class="table table-striped text-center">
                    <thead>
                      <tr style="background-color:bisque">
                        <th scope="col">#</th>                
                        <th scope="col">Agent</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($receive as $refs)
                      <tr>
                        <th>{{ $ii++ }}</th>
                        <td>{{ $refs->useragentcode }}</td>
                        <td>{{ $refs->mobile }}</td>
                        <td>{{ $refs->name }}</td>
                        <td>$ {{ $refs->transferamount }}</td>
                        <td>{{ $refs->created_at}}</td>
                      </tr>
                      @php $sum2=$sum2+$refs->transferamount  @endphp
                      @endforeach
                    </tbody>
                    <tr>
                      <td colspan="4" style="text-align:right;"> <b>Total :</b></td>
                      <td style="text-align:center;"> <b> $ {{ $sum2 }}</b></td>
                      <td></td>
                </tr>
                  </table>
            </table>
    </div>
 
  </div>
   

@endsection