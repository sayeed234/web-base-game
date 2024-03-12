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

  <div class="col-md-12">
      <table id="example" class="table table-striped table-bordered text-center" style="width:100%" >
        <h4 style="color: black;text-align:center;"> Fund Transfer History</h4>
        <thead class="text-muted">
          <tr style="background-color:bisque">
            <th>#</th>
            <th>From Admin</th>
            <th>Agent Name</th>
            <th>Agent Code</th>
            <th>Agent ID</th>
            <th>Amount</th>
            <th>Date</th>
          </tr>
        </thead>
        @php $sum=0; @endphp
        <tbody>
            @foreach($agentFundhistory as $key => $agent)
            <tr>
              <td>{{ ++$key }}</td>
              <td>{{ $agent->adminuserh->name }}</td>
              <td>{{ $agent->agentuserhistory->name }}</td>
              <td>{{ $agent->agentuserhistory->agentcode }}</td>
              <td>{{ $agent->agentuserhistory->mobile }}</td>
              <td>$ {{ $agent->amount }}</td>
              <td >{{ date('d-M-Y', strtotime($agent->created_at)) }}</td>
            </tr>
            @php $sum=$sum+$agent->amount ; @endphp
            @endforeach
        </tbody>
        <td colspan="5" style="text-align:right;"><b>Total : </b></td>
            <td ><b>$ {{ $sum }}</b></td>
            <td ></td>
      </table>
    </div>
<!-- table chart end -->
</div>
@endsection