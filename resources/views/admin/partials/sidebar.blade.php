<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
        <img src="{{asset('public/assets-backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('public/assets-backend/dist/img/admin-logo.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-header text-uppercase font-weight-bold">
                    <span class="text-muted">Modules</span>
                </li>

                @forelse($Modules as $module)
                <li class="nav-item">
                    <a href="{{ url($module->slug) }}" class="nav-link rounded-lg mx-2">
                        <i class="fas fa-cube"></i>
                        <p>{{ $module->name }}</p>
                    </a>
                </li>
                @empty
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link rounded-lg mx-2">
                        <i class="fas fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url()->previous() }}" class="nav-link rounded-lg mx-2">
                        <i class="fas fa-arrow-left"></i>
                        <p>Back</p>
                    </a>
                </li>
                @endforelse

                <li class="nav-header text-uppercase font-weight-bold mt-4">
                    <span class="text-muted">Account</span>
                </li>

                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" class="w-100">
                        @csrf
                        <button type="submit" class="nav-link rounded-lg mx-2 w-100 text-left">
                            <i class="fas fa-sign-out-alt"></i>
                            <p>{{ __('Log Out') }}</p>
                        </button>
                    </form>
                </li>

            </ul>
        </nav>

        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>