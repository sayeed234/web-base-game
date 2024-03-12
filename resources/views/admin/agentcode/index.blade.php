@extends('admin.layouts.app')
@section('content')
    <div class="container">
      <div class="row" style="margin-top: 100px;">
        <div class="col-md-6">
          <a class="btn btn-sm btn-success" href="{{ route('agentcode.create') }}"> Create New Agent</a>
          @if ($message = Session::get('success'))
          <div class="alert alert-success">
              <p>{{ $message }}</p>
          </div>
          @endif
        </div>
      </div>
<br>
<!-- table chart start -->
<div class="col-md-12">
  <h4> Agent List</h4><br>

      <table id="example" class="table table-striped table-bordered text-center" style="width:100%" >
  <thead class="text-muted">
    <tr style="background-color:bisque">
      <th>#</th>
      <th>Name</th>
      <th>Mobile</th>
      <th>Email</th>
      <th>Agent Code</th>
      <th>Date</th>
    </tr>
  </thead>
  <tbody>
      @foreach($agentcodes as $key => $agent)
      <tr>
        <td>{{ ++$key }}</td>
        <td>{{ $agent->name }}</td>
        <td>{{ $agent->mobile }}</td>
        <td>{{ $agent->email }}</td>
        <td>{{ $agent->agentcode }}</td>
        <td >{{ date('d-M-Y', strtotime($agent->created_at)) }}</td>
      </tr>
      @endforeach
  </tbody>
</table>
    </div>
</div>
<!-- table chart end -->
  </div>

  @endsection