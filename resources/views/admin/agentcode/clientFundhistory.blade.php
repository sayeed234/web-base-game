@extends('admin.layouts.app')
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

    <div class="row " >
        <div class="col-md-12">
        <h4 style="color: black; text-align:center;"> Agent To Client Fund Transfer History</h4>
      <table  id="example" class="table table-striped table-bordered text-center" style="width:100%"  >   
        <thead class="text-muted">
          <tr style="background-color:bisque">
            <th>#</th>
            <th>Agent Name</th>
            <th>Client Name</th>
            <th>Client ID</th>
            <th>Amount</th>
            <th>Date</th>
          </tr>
        </thead>
        @php $sum=0 ; @endphp
        <tbody>
            @foreach($clientFundhistory as $key => $client)
            <tr>
              <td>{{ ++$key }}</td>
              <td>{{ $client->agentuserh ? $client->agentuserh->name :'' }}</td>
              <td>{{ $client->clientuserhistory ? $client->clientuserhistory->name:'' }}</td>
              <td>{{ $client->clientuserhistory ? $client->clientuserhistory->mobile:'' }}</td>
              <td>$ {{ $client->amount }}</td>
              <td >{{ date('d-M-Y', strtotime($client->created_at)) }}</td>
            </tr>
            @php $sum=$sum+$client->amount  ; @endphp
            @endforeach
        </tbody>
        <td colspan="4" style="text-align:right;"><b>Total : </b></td>
          <td ><b>$ {{ $sum }}</b></td>
          <td ></td>
      </table>
    </div>
  </div>
<!-- table chart end -->
</div>

@endsection