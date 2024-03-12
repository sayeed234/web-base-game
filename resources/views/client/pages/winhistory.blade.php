@extends('client.layouts.app')
@section('content')
<div class="row">
          <div class="col-md-2"></div>
<div class="col-md-8">
          <h4>Bet Win History</h4>
        <table id="example" class="table table-striped table-bordered" style="margin-top: 10px; background:lightgray;">
          <thead>
            <tr class="tablestyle text-center">
              <th>Bet Name</th>
              <th>Quantity</th>
              <th>Win Amount</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody style="text-align:center;">
            @php $sum=0; @endphp
            @foreach($betWin as $win)
            <tr>
              <td>{{ $win->betWinInfo->name }}</td>
              <td >{{ $win->bcount }}</td>
              <td >$ {{ $win->bamount }}</td>
              <td>{{ date('d-M-Y', strtotime($win->created_at)) }}</td>
            </tr>
            @php $sum=$sum+$win->bamount; @endphp
            @endforeach
          </tbody>
          <tr style="text-align:center;"> 
            <td colspan="2"><b>Total</b></td>
            <td ><b>$ {{ $sum }}</b></td>
            <td></td>
          </tr>
        </table>
     </div>
     <div class="col-md-2"></div>
</div>
@endsection