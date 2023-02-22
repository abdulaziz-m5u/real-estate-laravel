 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a target="_blank" href="{{ route('homepage') }}" class="brand-link text-center">
        <span class="brand-text font-weight-light">Homie</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="{{ route('admin.dashboard') }}" class="d-block">Dashboard</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
          <li class="nav-item">
            <a href="{{ route('admin.categories.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Category
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.properties.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Property
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.messages.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Messages
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.subscribers.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Subscriber
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a onclick="return document.getElementById('logout').submit();" href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Logout
              </p>
              <form id="logout" action="{{route('logout') }}" method="post">
                @csrf
              </form>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>