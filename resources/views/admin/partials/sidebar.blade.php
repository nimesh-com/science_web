<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
        <img src="{{asset('assets-backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('assets-backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-header">MODULES</li>

                @forelse($Modules as $module)
                <li class="nav-item">
                    <a href="{{ url($module->slug) }}" class="nav-link">
                   <i class="fa-regular fa-gear fa-spin"></i>
                        <p>{{ $module->name }}</p>
                    </a>
                </li>
                @empty
                <li class="nav-item">
                    <p class="text-muted ps-3">No Modules Found</p>
                </li>
                @endforelse

                <li class="nav-header">
                      <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="btn btn-block btn-outline-danger">
                {{ __('Log Out') }}
            </button>
        </form>
                </li>


            </ul>
        </nav>

        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>