@php 
$client = App\User::with('clientfund')->findOrFail(Auth::user()->id);

//dd($client);
@endphp

<nav class="navbar navbar-expand-lg navbar-dark bg-secondary fixed-top">
  <div class="container">
    <a class="navbar-brand" href="{{ ('dashboard') }}" style="font-size:25px;">5XBetclub</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('get.update.profile') }}">Profile</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            All History
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('receivefund') }}">Receive Fund</a>
              <a class="dropdown-item" href="{{ route('fundtransfer') }}">Fund Transfer </a>
              <a class="dropdown-item" href="{{ route('winhistory') }}">Win History</a>
              <a class="dropdown-item" href="{{ route('withdrawhistory') }}">Withdraw History</a>
              <a class="dropdown-item" href="{{ route('referer.list') }}">Referrer List</a>
              <a class="dropdown-item" href="{{ route('referer.commision') }}">Ref. Com. Summery</a>
              <a class="dropdown-item" href="{{ route('referer.history') }}">Ref. Com. Details</a>
            </div>
          </li>
          {{-- <li class="nav-item active">
              <a class="nav-link" href=""  data-toggle="modal" data-target="#withdrawModal">
                  Withdraw
                </a>
          </li> --}}
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Transaction
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href=""  data-toggle="modal" data-target="#withdrawModal">
                Withdraw
              </a>
              <a class="dropdown-item" href=""  data-toggle="modal" data-target="#withdrawModal2">
                Transfer
              </a>
           </div>
          </li>
        
         &nbsp;
         <li>
          <a class="nav-link active" >A/C Balance</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white btn btn-warning" href="#">$ {{ $client->clientfund ? $client->clientfund->amount : '0000' }}</a>
        </li>
        @php 
          $recive=DB::table('agenttoclientfund_histories')
                ->where('to_client', Auth::user()->id)
                ->select(DB::raw('SUM(amount) as total'))
               ->first();
               //dd($recive);
        @endphp
        {{-- <li>
          <a class="nav-link active" >Receive Fund</a>
        </li>
          <li class="nav-item active">
             <a class="nav-link text-white btn btn-success " href="#"> $ {{ $recive->total}}</a>
          </li> --}}
      </ul>
      <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown no-arrow">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <span >
            @if(Auth::user()->country =='Bangladesh')
            <img src="{{ asset('coinbase/img/bd.jpg') }}" alt="picture" style="width:25px; margin-top:-1px;">

             @elseif(Auth::user()->country =='India')
             <img src="{{ asset('coinbase/img/india.jpg') }}" alt="picture" style="width:25px; margin-top:-1px;">

             @elseif(Auth::user()->country =='US')
             <img src="{{ asset('coinbase/img/us.png') }}" alt="picture" style="width:25px; margin-top:-1px;">

             @elseif(Auth::user()->country =='Japan')
             <img src="{{ asset('coinbase/img/japan.jpg') }}" alt="picture" style="width:25px; margin-top:-1px;">

             @elseif(Auth::user()->country =='Nepal')
             <img src="{{ asset('coinbase/img/nepal.jpg') }}" alt="picture" style="width:25px; margin-top:-1px;">

             @elseif(Auth::user()->country =='Pakistan')
             <img src="{{ asset('coinbase/img/paki.jpg') }}" alt="picture" style="width:25px; margin-top:-1px;">

             @elseif(Auth::user()->country =='Sri')
             <img src="{{ asset('coinbase/img/sri.png') }}" alt="picture" style="width:25px; margin-top:-1px;">
             @else
             <img src="{{ asset('coinbase/img/world.png') }}" alt="picture" style="width:25px; margin-top:-1px;">

             @endif 
            </span>       
            <span> &nbsp;{{ Auth::user()->name }} </span><span class="caret"></span>
              </a>
              
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>
              
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
          </li>
        </ul>
    </div>
  </div>
  </nav>
<!-- Modal -->
<div class="modal fade" id="withdrawModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <div class="col-md-10">
          <h5 class="modal-title" id="exampleModalLabel">Fund Withdraw</h5>
        </div>
        <div class="col-md-2">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>       
      </div>
    </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <form action="{{ route('withdrawAmount') }}" method="POST">
                @csrf
                <div class="form-group">
                  <input type="hidden" name="userid" value="{{ Auth::user()->id }}">
                  <div class="form-group">
                    <select class="form-control col-md-12" name="payment">
                      <option class="form-control" value="Neteller"><i>Neteller</i> </option>
                      <option class="form-control" value="Skrill">Skrill</option>
                      <option class="form-control" value="PayPal">PayPal</option>
                      <option class="form-control" value="Bitcoin">Bitcoin</option>
                    </select>
                  </div>
                  <input class="form-control" name="number" type="text" min="0" required="" placeholder="Account Information">
<br>
<input class="form-control" name="withdrawamount" type="number" min="20" required="" placeholder="$20">
<br>
                  <input class="form-control" name="password" type="password" required="" placeholder="Password">
                 
                </div>
                <button  class="btn btn-primary my-4 btn-block " type="submit">Send</button>
              </form>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>

  {{-- Transfer --}}
  <div class="modal fade" id="withdrawModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <div class="col-md-10">
          <h5 class="modal-title" id="exampleModalLabel2">Fund Transfer</h5>
        </div>
        <div class="col-md-2">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>       
      </div>
    </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <form action="{{ route('transferAmount') }}" method="POST">
                @csrf
                <div class="form-group">
                  <input type="hidden" name="fromid" value="{{ Auth::user()->mobile }}">
                    <br>
                  <input class="form-control" name="toid" type="text" min="0" required="" placeholder="User ID">
                  <br>
                  <input class="form-control" name="transferamount" type="number" min="1" required="" placeholder="Enter Amount">
                 <br>
                  <input class="form-control" name="password" type="password" required="" placeholder="Password">
                </div>
                <button  class="btn btn-primary my-4 btn-block " type="submit">Send</button>
              </form>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>