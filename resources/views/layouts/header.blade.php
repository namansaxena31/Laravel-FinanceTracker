<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="{{route('member_home')}}">Finance Tracker</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a href="{{ route('member_home') }}" class="nav-link">Dashboard</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="transactionDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Transactions
            </a>
            <ul class="dropdown-menu" aria-labelledby="transactionDropdown">
              <li><a class="dropdown-item" href="">All Transactions</a></li>
              <li><a class="dropdown-item" href="{{ route('member_addTransaction') }}">Add Transaction</a></li>
            </ul>
          </li>
          <li class="nav-item">       
              <a href="{{route('logout')}}" class="btn btn-link nav-link">Logout</a>
          </li>
      </ul>
    </div>
  </div>
</nav>