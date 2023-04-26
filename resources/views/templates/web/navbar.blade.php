<nav class="main-header navbar navbar-expand-md navbar-dark navbar-white" style="background:#06623B!important;">
    <div class="container">
      <a href="{{ route('web.welcome') }}" class="navbar-brand">
        <img src="{{ asset('web/img/logo.png') }}" alt="Perpus Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">e-Library</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="{{ route('web.daftar-buku') }}" class="nav-link">Daftar Buku</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('web.tentang') }}" class="nav-link">Tentang Perpustakaan</a>
          </li>
        </ul>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="btn btn-warning nav-link" href="{{ route('login') }}">
            Masuk
          </a>
        </li>
      </ul>
    </div>
  </nav>
