@extends('admin.layouts.app')
@section('content')
    <div class="container">
      <div class="row" style="margin-top: 100px;">
        <div class="col-md-6">
          @if ($message = Session::get('success'))
          <div class="alert alert-success">
              <p>{{ $message }}</p>
          </div>
          @endif
        </div>
      </div>

<!-- table chart start -->
<div class="row">
   
     
        <div class="col-md-4">                
          <a href="{{ route('withdraw.approve-list') }}"><button  class="btn btn-success" type="submit">Approve History</button></a>
      </div>
    <div class="col-md-12 " >
      <h4 style="color: black;text-align:center">Withdraw Pending History</h4>
      <table id="example" class="table table-striped table-bordered text-center" style="width:100%">
          <thead style="background-color:bisque">
            <th>#</th>
            <th>Agent Name</th>
            <th>Client Name</th>
            <th>Client ID</th>
            <th>Account</th>
            <th>Method</th>
            <th>Fund</th>          
            <th>Date</th>
            <th>Status</th>
          </thead>
          <tbody >
            @php $sum=0; $sum2=0; @endphp
            @foreach($withdraws as $key => $with)
            <tr>
              <td>{{ ++$key }}</td>
              <td>{{ $with->agentWinInfo ? $with->agentWinInfo->agentcode:'' }}</td>
              <td>{{ $with->clientWinInfo ? $with->clientWinInfo->usercode:'' }}</td>
              <td>{{ $with->clientWinInfo ? $with->clientWinInfo->mobile:'' }}</td>
              <td>{{ $with->number }}</td>
              <td>{{ $with->payment }}</td>
              <td >$ {{ $with->actualamount }}</td>
              <td>{{ date('d-M-Y', strtotime($with->created_at)) }}</td>
              <td>
                @if($with->status == 1)
                <form action="{{ route('withdraw.approve') }}" method="POST">
                  @csrf
                  <input type="hidden" name="winid" value="{{ $with->id }}">
                  <input type="hidden" name="clientid" value="{{ $with->clientid }}">
                  <input type="hidden" name="status" value="0">
                  <button class="btn btn-sm btn-primary">Approve</button>
                </form>
                @else
                <form action="{{ route('withdraw.approve') }}" method="POST">
                  @csrf
                  <input type="hidden" name="winid" value="{{ $with->id }}">
                  <input type="hidden" name="clientid" value="{{ $with->clientid }}">
                  <input type="hidden" name="status" value="1">
                  <button class="btn btn-sm btn-danger">Pending</button>
                </form>
                @endif
              </td>
             
            </tr>
           <?php 
                  $sum=$sum+$with->withdrawamount;
                  $sum2=$sum2+$with->actualamount;
           ?>
            @endforeach
          </tbody>
            <tr>
              <td colspan="6" style="text-align:right;"><b>Total :</b></td>
              <td ><b>$ {{ $sum2 }}</b></td>
                <td colspan="2"></td>
            </tr>
         
        </table>
    </div>
</div>
<!-- table chart end -->
    </div>
@endsection