<!--   nabbar start -->
@php 
$agent = App\User::with('agentfund')->findOrFail(Auth::user()->id);
@endphp

<nav class="navbar navbar-expand-lg navbar-dark bg-secondary  fixed-top">
  <div class="container">
    <a class="navbar-brand" href="{{ url('agent/dashboard') }}" style="font-size:25px;">5XBetclub</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('agent.to.client') }}">Fund Transfer</a>
          </li>
          {{-- <li class="nav-item">
              <a class="nav-link active" href="{{ route('agent-commission') }}">Referrer Commission</a>
            </li> --}}
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   All History
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('agent-listss') }}">Referrer List</a>
                  <a class="dropdown-item" href="{{ route('agent-commission') }}"> Ref. Com. Summery</a>           <a class="dropdown-item"href="{{ route('agent-history') }}">Ref. Com. Details</a>
                  <a class="dropdown-item" href="{{ route('admin-agent-fund-history') }}">Fund Receive </a>
                  <a class="dropdown-item" href="{{ route('agent.client.fund.history') }}">Fund Transfer</a> 
               </div>
              </li>
              <li>
              <a class="nav-link active" >A/C Balance</a>
                   </li>
            <li class="nav-item active">
                <a class="nav-link text-white btn btn-warning " href="#">$ {{ $agent->agentfund ? $agent->agentfund->amount : '0000' }}</a>
              </li>
      <li>

    <a class="nav-link active" >Fund Rececive</a>
        </li>
@php               
            $result=DB::table('adintoagnetfund_histories')
                   ->where('to_agent',Auth::user()->id)
                  ->select(DB::raw('SUM(amount) as total'))
                   ->first();
                 
           $result2=DB::table('agenttoclientfund_histories')
                   ->where('from_agent',Auth::user()->id)
                  ->select(DB::raw('SUM(amount) as total'))
                   ->first();
                 //dd($result);   
      @endphp
   
      <li class="nav-item active">
          <a class="nav-link text-white btn btn-success " href="#"> $ {{ $result->total }}</a>
        </li>
        <li>
              <a class="nav-link active" >Fund Transfer</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-white btn btn-info " href="#"> $ {{ $result2->total}}</a>
                  </li>
      </ul>
      <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown no-arrow">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                  </span> 
                {{ Auth::user()->name }} <span class="caret"></span>
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
 <!--   nabbar end -->