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


    <h4 style="color: black">Referrer Commission Details</h4>
          <div class="row boxstyle" style="margin-top: 30px;">
             <div class="col-md-12">
          <table  id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
          <tr style="background-color:bisque; text-align:center;">
          <th>#</th>
          <th>User ID</th>
          <th>Name</th>
          {{-- <th>Ref Code</th> --}}
          <th>Commission( 2% )</th>
          <th>Date</th>
          </tr>
          </thead>
          @php $sum=0; $key=1; @endphp
          <tbody style=" text-align:center;">
          @foreach($result as $client)
          <tr>
          <td>{{ $key++ }}</td>
          <td >{{ $client->mobile }}</td>
           <td >{{ $client->name }}</td>
           {{-- <td >{{ $client->referrercode }}</td> --}}
          <td>$ {{ $client->amount }}</td>
          <td> {{ date('d-M-Y', strtotime($client->updated_at)) }}</td>
          </tr>
          @php $sum=$sum+$client->amount; @endphp  
          @endforeach
          </tbody>
          <tr>
          <td colspan="3" style=" text-align:right;"><b>Total :</b></td>
          <td style=" text-align:center;"><b>$ {{ $sum }}</b></td>
          <td></td>
          </tr>
          </table>
          </div>
          </div>
        </div>



<!-- Footer -->

@endsection