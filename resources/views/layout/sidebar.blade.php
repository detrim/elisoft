@section('sidebar')
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        @if (Auth()->user()->level == 'admin')
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                                                                                   with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/user') }}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User Control</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/konversi') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Konversi</p>
                            </a>
                        </li>
                    </ul>
                </li>


            </ul>
        @else
        @endif

    </nav>
    <!-- /.sidebar-menu -->
@endsection
