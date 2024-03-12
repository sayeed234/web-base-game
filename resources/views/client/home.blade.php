@extends('client.layouts.app')

@section('content')

  
@if (session('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif    

<!-- table chart start -->

<div class="container table-chart" style="margin-top: 100px;">
  <br><br>
      <div class="row boxstyle">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <table class="table" >
            <h5 style="text-align: left; margin-bottom: 20px;">Bet Hold</h5>
            <thead class="text-muted text-center" >
              <tr class="trstyle">
                <th scope="col">#</th>
                <th scope="col"> Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Hold</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <tr>
                <th scope="row">1</th>
                <td>&nbsp;&nbsp;<span class="span">{{ $bets[0]['name']}}</span></td>
                <td> $ {{ $bets[0]['price']}}</td>
                <td>{{ $count1 }}</td>
                <td>
                  {{-- <form action="{{ route('bet.hold') }}" method="POST">
                    @csrf --}}
                    <input type="hidden" name="betid" value="{{ $bets[0]['id']}}">
                    <input type="hidden" name="betname" value="{{ $bets[0]['name']}}">
                    <input type="hidden" name="betprice" value="{{ $bets[0]['price']}}">
                    {{-- <button class="btn-success btn4">Buy</button> --}}
                     <a class="btn btn-sm btn-success betHold" data-refresh="true" data-toggle="modal" data-target="#betEditModal" data-bets="{{ json_encode($bets[0])}}" href="#">Buy</a>
                  {{-- </form> --}}
                </td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>&nbsp;&nbsp;<span class="span">{{ $bets[1]['name']}}</span></td>
                <td> $ {{ $bets[1]['price']}}</td>
                <td>{{ $count2 }}</td>
                <td>
                  {{-- <form action="{{ route('bet.hold') }}" method="POST">
                    @csrf --}}
                    <input type="hidden" name="betid" value="{{ $bets[1]['id']}}">
                    <input type="hidden" name="betname" value="{{ $bets[1]['name']}}">
                    <input type="hidden" name="betprice" value="{{ $bets[1]['price']}}">
                    {{-- <button class="btn-success btn4">Buy</button> --}}
                     <a class="btn btn-sm btn-success betHold" data-refresh="true" data-toggle="modal" data-target="#betEditModal" data-bets="{{ json_encode($bets[1])}}" href="#">Buy</a>
                  {{-- </form> --}}
                </td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>&nbsp;&nbsp;<span class="span">{{ $bets[2]['name']}}</span></td>
                <td> $ {{ $bets[2]['price']}}</td>
                <td>{{ $count3 }}</td>
                <td>
                  {{-- <form action="{{ route('bet.hold') }}" method="POST">
                    @csrf --}}
                    <input type="hidden" name="betid" value="{{ $bets[2]['id']}}">
                    <input type="hidden" name="betname" value="{{ $bets[2]['name']}}">
                    <input type="hidden" name="betprice" value="{{ $bets[2]['price']}}">
                    {{-- <button class="btn-success btn4">Buy</button> --}}
                     <a class="btn btn-sm btn-success betHold" data-refresh="true" data-toggle="modal" data-target="#betEditModal" data-bets="{{ json_encode($bets[2])}}" href="#">Buy</a>
                  {{-- </form> --}}
                </td>
              </tr>
              <tr>
                <th scope="row">4</th>
                <td>&nbsp;&nbsp;<span class="span">{{ $bets[3]['name']}}</span></td>
                <td>$ {{ $bets[3]['price']}}</td>
                <td>{{ $count4 }}</td>
                <td>
                  {{-- <form action="{{ route('bet.hold') }}" method="POST">
                    @csrf --}}
                    <input type="hidden" name="betid" value="{{ $bets[3]['id']}}">
                    <input type="hidden" name="betname" value="{{ $bets[3]['name']}}">
                    <input type="hidden" name="betprice" value="{{ $bets[3]['price']}}">
                    {{-- <button class="btn-success btn4">Buy</button> --}}
                    <a class="btn btn-sm btn-success betHold" data-refresh="true" data-toggle="modal" data-target="#betEditModal" data-bets="{{ json_encode($bets[3])}}" href="#">Buy</a>
                  {{-- </form> --}}
                </td>
              </tr>
              <tr>
                <th scope="row">5</th>
                <td>&nbsp;&nbsp;<span class="span">{{ $bets[4]['name']}}</span></td>
                <td>$ {{ $bets[4]['price']}}</td>
                <td>{{ $count5 }}</td>
                <td>
                  {{-- <form action="{{ route('bet.hold') }}" method="POST">
                    @csrf --}}
                    <input type="hidden" name="betid" value="{{ $bets[4]['id']}}">
                    <input type="hidden" name="betname" value="{{ $bets[4]['name']}}">
                    <input type="hidden" name="betprice" value="{{ $bets[4]['price']}}">
                    {{-- <button class="btn-success btn4">Buy</button> --}}
                    <a class="btn btn-sm btn-success betHold" data-refresh="true" data-toggle="modal" data-target="#betEditModal" data-bets="{{ json_encode($bets[4])}}" href="#">Buy</a>
                  {{-- </form> --}}
                </td>
              </tr>
              
            </tbody>
          </table>

    </div>
    <div class="col-md-2"></div>

   
    </div>
</div>
<br><br><br><br>

<div class="modal fade" id="betEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Bet Hold</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body betEditAdd">
          <form action="{{ route('bet.hold') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                <input type="hidden" class="bet_id" name="bet_id">
                <input type="hidden" class="bet_price" name="bet_price">
                <input type="text" readonly="" class="bet_name" name="bet_name">
                <input type="text" readonly="" class="total_price" name="total_price">
                <div class="number">
                  <span class="minus">-</span>
                  <input class="quantity" readonly="" name="quantity" type="text"/>
                  <span class="plus" id="plus_d">+</span>
                </div>
                <div class="div_style">
                  <input type="password" name="password" class="form-control" placeholder="Enter your password" required=""></br>
                </div>
                <button class="btn btn-success btn-block">Buy</button>
                </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
        </div>
        </div>
    </div>
</div>  
@endsection

@section('style')
<style>
  .span {cursor:pointer; color:black; font-weight: bold;}
    .div_style{
      width: 97%;
      
    }
    .number{
       margin: 35px 0px 25px 0px;
    }

    input.quantity {
        width: 61%;
    }
    .plus{
      width:34px;
      height:54px;
      background:#05b169;
      font-size: 25px;
      color: #ffffff;
      border-radius:4px;
      padding:8px 5px 8px 5px;
      border:1px solid #05b169;
      display: inline-block;
      vertical-align: middle;
      text-align: center;
    }

    .minus{
      width:34px;
      height:54px;
      background:#ff0202;
      font-size: 25px;
      color: #ffffff;
      border-radius:4px;
      padding:8px 5px 8px 5px;
      border:1px solid #ff0202;
      display: inline-block;
      vertical-align: middle;
      text-align: center;
    }

    input{
      height:34px;
      width: 100px;
      text-align: center;
      font-size: 26px;
      border:1px solid #ddd;
      border-radius:4px;
      display: inline-block;
      vertical-align: middle;
</style>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function(){
      
      var count = 0;
      var bet = {};
      $(document).on('click', 'a.betHold', function() {
        count = 1;
        $('.quantity').val(count)
          bet = $(this).attr('data-bets');
          bet = JSON.parse(bet);
          $('.bet_id').val(bet.id);
          $('.bet_price').val(bet.price);
          $('.bet_name').val(bet.name);
          if (count < 5) {
            $('.total_price').val(bet.price*count)
          }
          
      });

      $('.minus').click(function () {
        if (count > 1) {
          count = parseInt(count) - 1;
          $('.total_price').val(count*bet.price);
        }
        
        var $input = $(this).parent().find('input');
        var change = parseInt($input.val()) - 1;
        change = change < 1 ? 1 : change;
        $input.val(change);
        $input.change();
        return false;
      });

      $('.plus').click(function () {
        
        var $input = $(this).parent().find('input');
        if (count < 5) {
          count = parseInt(count) + parseInt(1)
          $input.val(parseInt($input.val()) + 1);
          $('.total_price').val(count*bet.price);
        }
        $input.change();
        return false;
      });

    });



    $(document).ready(function() {
	    $('#example').DataTable();
      $('#example1').DataTable();
	} ); 

</script>



@endsection
