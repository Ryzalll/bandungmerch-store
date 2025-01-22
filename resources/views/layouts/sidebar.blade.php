<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item navbar-brand-mini-wrapper">
        <a class="nav-link navbar-brand brand-logo-mini" href="/dashboard"><img src="/vendor/stellar/assets/images/logo-mini.svg" alt="logo" /></a>
      </li>
      <li class="nav-item nav-profile">
        <a href="/dashboard" class="nav-link">
          <div class="profile-image">
            <img class="img-xs rounded-circle" src="{{ asset('assets/no_user.png') }}" alt="profile image">
          </div>
          <div class="text-wrapper">
            <p class="profile-name">{{ auth()->user()->username }}</p>
            <p class="designation">Administrator</p>
          </div>
        </a>
      </li>
      <li class="nav-item nav-category">
        <span class="nav-link">Dashboard</span>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/dashboard">
          <span class="menu-title">Dashboard</span>
          <i class="icon-screen-desktop menu-icon"></i>
        </a>
      </li>
      <li class="nav-item nav-category"><span class="nav-link">Master Data</span></li>
      <li class="nav-item">
        <a class="nav-link" href="/userdata">
            <span class="menu-title">User</span>
            <i class="icon-user menu-icon"></i>
        </a>
    </li>
      <li class="nav-item">
        <a class="nav-link" href="/category">
            <span class="menu-title">Category</span>
            <i class="icon-list menu-icon"></i>
        </a>
    </li>
      <li class="nav-item">
        <a class="nav-link" href="/product">
            <span class="menu-title">Product</span>
            <i class="icon-handbag menu-icon"></i>
        </a>
    </li>
      <li class="nav-item">
        <a class="nav-link" href="/order">
            <span class="menu-title">Order</span>
            <i class="icon-basket menu-icon"></i>
        </a>
    </li>
    <li class="nav-item nav-category"><span class="nav-link">Transaction</span></li>
      <li class="nav-item">
        <a class="nav-link" href="/sales">
            <span class="menu-title">Sales</span>
            <i class="icon-chart menu-icon"></i>
        </a>
    </li>
    </ul>
  </nav>
