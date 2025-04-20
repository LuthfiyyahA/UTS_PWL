<div class="sidebar">
  <!-- SidebarSearch Form -->
  <div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
      <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-sidebar">
          <i class="fas fa-search fa-fw"></i>
        </button>
      </div>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item">
        <a href="{{ url('/') }}" class="nav-link {{ ($activeMenu == 'dashboard') ? 'active' : '' }}">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-header">Data UKM</li>
      <li class="nav-item">
          <a href="{{ url('/ukm') }}" class="nav-link {{ ($activeMenu == 'ukm') ? 'active' : '' }}">
              <i class="nav-icon fas fa-layer-group"></i>
              <p>Unit Kegiatan Mahasiswa</p>
          </a>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>