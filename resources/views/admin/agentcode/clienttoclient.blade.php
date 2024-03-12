@extends('admin.layouts.app')
@section('content')
    <div class="container">
    <div class="row " >
        <div class="col-md-12">
          <h5 style="color: black;text-align:center">Clients To Clients Fund Transfer</h5>
      <table id="example" class="table table-striped table-bordered text-center" style="width:100%"  > 
        <thead class="text-muted">
          <tr style="background-color:bisque">
            <th scope="col">#</th>
            <th scope="col">From Client</th>
            <th scope="col">To Client</th>
            <th scope="col">Amount</th>
            <th scope="col">Date</th>
          </tr>
        </thead>
        @php $sum=0;    $q=1; @endphp
        <tbody>
          @foreach($result as  $win)
          <tr>
            <td>{{ $q++ }}</td>

            @php  
            $from=DB::table('users')->where('id',$win->fromid)->first();
            //dd($from);
            $to=DB::table('users')->where('id',$win->toid)->first();
            @endphp



            <td>{{ $from->useragentcode }} => {{ $from->name }} => {{ $from->mobile }}</td>
            <td>{{ $to->useragentcode }} => {{ $to->name }} => {{ $to->mobile }}</td>
            <td>$ {{ $win->transferamount }}</td>
            <td >{{ $win->created_at}}</td>
          </tr>
          @php $sum=$sum+$win->transferamount ;  @endphp
          @endforeach
        </tbody>
        <td colspan="3" style="text-align:right;"><b>Total : </b></td>
          <td ><b>$ {{ $sum }}</b></td>
          <td ></td>
      </table>
    </div>
</div>
<!-- table chart end -->
    </div>

@endsection