<!-- Sidebar -->
<div class="admin-header">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center"
           href="{{ action('system\SystemController@system')}}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fa fa-wheelchair-alt"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Erasmus</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Zhrnutie</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Administrácia tabuliek
        </div>

        <li class="nav-item">
            <a class="nav-link" href="{{ action('system\SystemController@users')}}">
                <i class="fa fa-user-circle-o"></i>
                <span>Členovia</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ action('system\SystemController@mobilities')}}">
                <i class="fa fa-list-alt"></i>
                <span>Mobility</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa fa-tag"></i>
                <span>Blogy</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
</div>
<!-- End of Sidebar -->
