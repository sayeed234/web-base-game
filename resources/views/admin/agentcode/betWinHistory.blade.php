@extends('admin.layouts.app')
@section('content')
    <div class="container">
      <div class="row" style="margin-top: 100px;">
        <div class="col-md-4">
          @if ($message = Session::get('success'))
          <div class="alert alert-success">
              <p>{{ $message }}</p>
          </div>
          @endif
        </div>
      </div>

<!-- table chart start -->
<div class="row" >
<div class="col-md-12">
    <h4 style="color: black;text-align:center;">Clients Win History</h4>
      <table  id="example" class="table table-striped table-bordered text-center" style="width:100%"  >    
        <thead class="text-muted">
          <tr style="background-color:bisque">
            <th scope="col">#</th>
            <th scope="col">Client Name</th>
            <th scope="col">Client Code</th>
            <th scope="col">Client ID</th>
            <th scope="col">Bet Qty</th>
            <th scope="col">Amount</th>
            <th scope="col">Win Date</th>
          </tr>
        </thead>
        <tbody>
          @php $sum=0; $sum2=0; @endphp
            @foreach($betWinHistory as $key => $win)
            <tr>
              <td>{{ ++$key }}</td>
              <td>{{ $win->clientWinInfo ? $win->clientWinInfo->name : '' }}</td>
              <td>{{ $win->clientWinInfo ? $win->clientWinInfo->usercode : '' }}</td>
              <td>{{ $win->clientWinInfo ? $win->clientWinInfo->mobile : '' }}</td>
              <td>{{ $win->bcount }}</td>
              <td>$ {{ $win->bamount }}</td>
              <td >{{ date('d-M-Y', strtotime($win->created_at)) }}</td>
            </tr>
            <?php $sum=$sum+$win->bcount; $sum2=$sum2+$win->bamount; ?>
            @endforeach
          </tbody>
            <tr>
              <td colspan="4" ><b>Total</b></td>
              <td><b>{{ $sum }}</b></td>
              <td><b>$ {{ $sum2 }}</b></td>
              <td></td>
            </tr>
       
      </table>
</div>
    </div>
  </div>

@endsection