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

    <div class="row " >
        <div class="col-md-12">
          <h4 style="color: black;text-align:center">Win Board History</h4>
      <table id="example" class="table table-striped table-bordered text-center" style="width:100%"  > 
        <thead class="text-muted">
          <tr style="background-color:bisque">
            <th scope="col">#</th>
            <th scope="col">Bet Name</th>
            <th scope="col">Bet Qty</th>
            <th scope="col">Payable Amount</th>
            <th scope="col">Win Date</th>
          </tr>
        </thead>
        @php $sum=0;  $sum2=0; @endphp
        <tbody>
          @foreach($betWins as $key => $win)
          <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $win->name }}</td>
            <td>{{ $win->totalbet }}</td>
            <td>$ {{ $win->totalbetamount }}</td>
            <td >{{ date('d-M-Y', strtotime($win->created_at)) }}</td>
          </tr>
          @php $sum=$sum+$win->totalbetamount ; $sum2=$sum2+$win->totalbet ;   @endphp
          @endforeach
        </tbody>
        <td colspan="2" style="text-align:right;"><b>Total : </b></td>
          <td ><b>{{ $sum2 }}</b></td>
          <td ><b>$ {{ $sum }}</b></td>
          <td ></td>
      </table>
    </div>
</div>
<!-- table chart end -->
    </div>

@endsection