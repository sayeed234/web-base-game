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

<div class="row">
    <div class="col-md-12">
        <h4 style="color: black">Fund Transfer History</h4> <br>
      <table id="example" class="table table-striped table-bordered" style="width:100%" >
       
  <thead>
    <tr style="background-color:bisque; text-align:center;">
      <th>#</th>
      <th>Name</th>
      <th>User ID</th>
      {{-- <th>Code</th>    --}}
      <th>Amount</th>
      <th>Date</th>
    </tr>
  </thead>
  @php $sum=0; @endphp
  <tbody style=" text-align:center;">
      @foreach($clientFundhistory as $key => $client)
      <tr>
        <td>{{ ++$key }}</td>
        <td>{{ $client->clientuserhistory ? $client->clientuserhistory->name:'' }}</td>
        <td>{{ $client->clientuserhistory ? $client->clientuserhistory->mobile:'' }}</td>
        {{-- <td>{{ $client->clientuserhistory ? $client->clientuserhistory->usercode:'' }}</td> --}}
        <td> $ {{ $client->amount }}</td>
        <td >{{ date('d-M-Y', strtotime($client->created_at)) }}</td>
      </tr>
      <?php $sum=$sum+$client->amount; ?>  
      @endforeach
  </tbody>
  <tr>
    <td colspan="3" style=" text-align:right;"><b>Total :</b></td>
    <td style=" text-align:center;"><b>$ {{ $sum }}</b></td>
    <td ></td>
  </tr>
</table>
    </div>
</div>
    </div>

@endsection