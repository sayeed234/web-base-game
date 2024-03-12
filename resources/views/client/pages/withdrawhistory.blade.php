@extends('client.layouts.app')
@section('content')
<div class="row">
          <div class="col-md-2"></div>
<div class="col-md-8">
          <h4>Withdraw History</h4>
          <table id="example" class="table table-striped table-bordered" style="margin-top: 10px;background:lemonchiffon;">
            <thead>
              <tr class="trstyle text-center">
                <th>#</th>
                <th>Withdraw Amount</th>
                {{-- <th>Withdraw charge</th> --}}
                <th>Status</th>
                <th>Date</th> 
              </tr>
            </thead>
            <tbody style="text-align:center;">
              @php $sum=0; $sum2=0;  @endphp
              @foreach($withdraws as $key => $with)
              <tr>
                <td>{{ ++$key }}</td>
                <td >$ {{ $with->actualamount }}</td>
                {{-- <td >$ {{ $with->chargeamount }}</td> --}}
                <td>
                  @if($with->status == 1)
                  <span style="color:green;">Paid</span>
                  @else
                  <span style="color:red;">Pending</span>
                  @endif
                </td>
                <td>{{ date('d-M-Y', strtotime($with->updated_at)) }}</td>
              </tr>
              @php $sum=$sum+$with->actualamount ; $sum2=$sum2+$with->chargeamount ;  @endphp
              @endforeach
            </tbody>
            <tr style="text-align:center;">
              <td><b>Total</b></td>
              <td><b>$ {{ $sum }}</b></td>
              {{-- <td><b>$ {{ $sum2 }}</b></td> --}}
              <td colspan="2"></td>
            </tr>
          </table>
        </div>
        <div class="col-md-2"></div>
</div>
@endsection