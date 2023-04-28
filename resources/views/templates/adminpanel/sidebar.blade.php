<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard.index') }}" class="brand-link bg-gradient-info">
      <img src="{{ asset('web/img/logo.png') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-bold">e-Library</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth()->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('dashboard.index') }}" class="nav-link {{ (request()->is('dashboard')) ? 'bg-info' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item {{ (request()->is('book') || (request()->is('book/categories')) || (request()->is('book/publishers')) ? 'menu-open' : '') }}">
            <a href="#" class="nav-link {{ (request()->is('book') || (request()->is('book/categories')) || (request()->is('book/publishers')) ? 'bg-info' : '') }}">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Katalog Buku
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('book.index') }}" class="nav-link {{ (request()->is('book')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Buku</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('book.categories') }}" class="nav-link {{ (request()->is('book/categories')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('book.publishers') }}" class="nav-link {{ (request()->is('book/publishers')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penerbit</p>
                </a>
              </li>
            </ul>
            <li class="nav-item {{ (request()->is('borrowers')) ? 'bg-info' : '' }}">
              <a href="{{ route('borrower.index') }}" class="nav-link">
                <i class="nav-icon fas fa-user-clock"></i>
                <p>
                  Peminjam
                </p>
              </a>
            </li>
            <li class="nav-item {{ (request()->is('members')) ? 'bg-info' : '' }}">
              <a href="{{ route('member.index') }}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Member
                </p>
              </a>
            </li>
            <li class="nav-item {{ (request()->is('user-management')) || (request()->is('user-management/new-user')) ? 'bg-info' : '' }}">
              <a href="{{ route('user-management.index') }}" class="nav-link">
                <i class="nav-icon fas fa-users-cog"></i>
                <p>
                  Manajemen User
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../widgets.html" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Laporan
                </p>
              </a>
            </li>
            <li class="nav-item {{ (request()->is('histories')) ? 'bg-info' : '' }}">
              <a href="{{ route('my-histories') }}" class="nav-link">
                <i class="nav-icon fas fa-history"></i>
                <p>
                  Riwayat Peminjaman
                </p>
              </a>
            </li>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
