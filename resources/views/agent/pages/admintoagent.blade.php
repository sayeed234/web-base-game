@extends('agent.layouts.app')
@section('content')
    <div class="container">
      <div class="row" style="margin-top: 100px;">
        <div class="col-md-6">
          {{-- <a class="btn btn-sm btn-success" href="{{ route('agent.fund.transfer') }}">Add</a> --}}
          @if ($message = Session::get('success'))
          <div class="alert alert-success">
              <p>{{ $message }}</p>
          </div>
          @endif
        </div>
      </div>

<!-- table chart start -->
<div class="row">
              <div class="col-md-2"></div>
<div class="col-md-8">
        <h4 style="color: black">Fund Receive History</h4><br>                  
          <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
          <tr style="background-color:bisque; text-align:center;">
          <th>#</th>
          <th>Date</th>
          <th>Amount</th>
          </tr>
          </thead>
          @php $sum=0; @endphp
          <tbody style=" text-align:center;">
          @foreach($adminFundhistory as $key => $client)
          <tr>
                    <td>{{ ++$key }}</td>
                    <td >{{ date('d-M-Y', strtotime($client->created_at)) }}</td>
                    <td>$ {{ $client->amount }}</td>
          </tr>
          @php $sum=$sum+$client->amount; @endphp  
          @endforeach
          </tbody>
          <tr>
          <td colspan="2" style=" text-align:right;"><b>Total :</b></td>
          <td style=" text-align:center;"><b> $ {{ $sum }}</b></td>
          </tr>
          </table>
          </div>
<div class="col-md-2"></div>
</div>

<!-- Footer -->

  <footer class="bg-white py-3 footer" >
    <div class="container">
        <hr>
      <div class="row">
        <div class="col-md-4">
          <h5>coinbaseclub</h5>
          <p>+1 (888) 908-7000 <br>support@coinbaseclub.com <br>© 2019 Coinbaseclub </p>
          {{-- <p><a href="">support.coinbaseclub.com</a></p>
          <p></p> --}}
        </div>
        <div class="col-md-2 text-color" >
          <h6>Products</h6><br>
          <a href="">Coinbaseclub</a>
          <a href="">Commerce</a><br>
          <a href="">Custody</a><br>
        </div>
        <div class="col-md-2 text-color">
         <h6>Learn</h6><br>
         <a href="">Buy Bitcoin</a><br>
          <a href="">Buy Bitcoin Cash</a><br>
          <a href="">Buy Ethereum</a><br>
        </div>
        <div class="col-md-2 text-color">
         <h6> Company</h6><br>
         <a href="">About</a><br>
          <a href="">Affiliates</a><br>
          <a href="">Careers</a><br>
        </div>
        <div class="col-md-2 text-color">
          <h6> Social</h6><br>
         <a href="">Blog</a><br>
          <a href="">Twitter</a><br>
          <a href="">Facbook</a><br>
        </div>
      </div>
    </div>
  </footer>
@endsection