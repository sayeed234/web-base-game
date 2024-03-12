<nav class="navbar navbar-expand-lg navbar-dark bg-secondary fixed-top">
  <div class="container">
  <a class="navbar-brand" href="{{ url('admin/dashboard') }}" style="font-size:25px;">5XBetclub </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
          <a class="nav-link text-white" href="{{ route('agentcode.index') }}">{{ __('Agent') }}</a>
      </li>
      <li class="nav-item ">
          <a class="nav-link text-white" href="{{ route('beating') }}">{{ __('Bet') }}</a>
      </li>
      <li class="nav-item ">
          <a class="nav-link text-white" href="{{ route('admin.fund') }}">{{ __('Wallet') }}</a>
      </li>
      <li class="nav-item ">
          <a class="nav-link text-white" href="{{ route('show.agent.fund.transfer') }}">{{ __('Fund Transfer') }}</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link text-white" href="{{ route('agent-client') }}">{{ __('Agents & Clients') }}</a>
    </li>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           All History
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('agent.fund.history') }}">Agent Fund Transfer</a>
            <a class="dropdown-item" href="{{ route('client.fund.history') }}">Client Fund Transfer</a>
            <a class="dropdown-item" href="{{ route('client.fund.client') }}">Clients To Clients</a>
            <a class="dropdown-item" href="{{ route('bet.wins') }}"> Win Board History</a>
            <a class="dropdown-item" href="{{ route('bet.win.history') }}">Bet Win History</a>
            <a class="dropdown-item" href="{{ route('withdraw.history') }}">Withdraw History</a>
          </div>
        </li>
       
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link text-white dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw">Admin</i>
          </a>
          <div class="dropdown-menu bgstyle dropdown-menu-right" aria-labelledby="userDropdown">
          {{-- <a class="dropdown-item" href="#">Settings</a> --}}
          <div class="dropdown-divider"></div>
            <a class="dropdown-item font-weight-medium" href="{{ route('admin.logout') }}">
              <i class="fa fa-lock"></i>
              Logout
            </a>
          </div>
      </li>
    </ul>
  </div>
</div>
</nav>