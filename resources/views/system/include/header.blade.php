<!-- Sidebar -->
<div class="admin-header">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center"
           href="{{ action('system\SystemController@system')}}">
            <div class="sidebar-brand-icon">
                <i class="admin-ukf-logo"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Erasmus</div>
        </a>

        <!-- Heading -->
        <div class="sidebar-heading">
            Administrácia tabuliek
        </div>

        <li class="nav-item admin-menu-links-hover {{ (request()->is('admin/users')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ action('system\UserController@users')}}">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>Používatelia</span>
            </a>
        </li>

        <li class="nav-item admin-menu-links-hover {{(request()->is('admin/roles')) ? 'active' : ''}}">
            <a class="nav-link" href="{{ action('system\UserRoleController@roles')}}">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>Role používateľov</span>
            </a>
        </li>

        <li class="nav-item admin-menu-links-hover {{(request()->is('admin/mobilities')) ? 'active' : ''}}">
            <a class="nav-link" href="{{ action('system\SystemController@mobilities')}}">
                <i class="fa fa-list-alt" aria-hidden="true"></i>
                <span>Mobility</span>
            </a>
        </li>

        <li class="nav-item admin-menu-links-hover {{(request()->is('admin/mobilities_category')) ? 'active' : ''}}">
            <a class="nav-link" href="{{ action('system\SystemController@mobility_category')}}">
                <i class="fa fa-list-alt" aria-hidden="true"></i>
                <span>Kategórie mobilít</span>
            </a>
        </li>

        <!-- Heading -->
        <div class="sidebar-heading">
            Ostatné
        </div>

        <li class="nav-item admin-menu-links-hover {{(request()->is('admin/blogs')) ? 'active' : ''}}">
            <a class="nav-link " href="{{ action('system\SystemController@blogs_view')}}">
                <i class="fa fa-tag" aria-hidden="true"></i>
                <span>Spravovanie blogov</span>
            </a>
        </li>

        <li class="nav-item admin-menu-links-hover {{(request()->is('admin/universities')) ? 'active' : ''}}">
            <a class="nav-link " href="{{ action('system\SystemController@universities')}}">
                <i class="fa fa-university" aria-hidden="true"></i>
                <span>Správa univerzít</span>
            </a>
        </li>

        <li class="nav-item admin-menu-links-hover {{(request()->is('admin/images')) ? 'active' : ''}}">
            <a class="nav-link " href="{{ action('system\SystemController@images')}}">
                <i class="fa fa-picture-o" aria-hidden="true"></i>
                <span>Správa fotografií</span>
            </a>
        </li>

        <li class="nav-item admin-menu-links-hover {{(request()->is('admin/faq')) ? 'active' : ''}}">
            <a class="nav-link " href="{{ action('system\SystemController@faq')}}">
                <i class="fa fa-question" aria-hidden="true"></i>
                <span>FAQ</span>
            </a>
        </li>

        <li class="nav-item admin-menu-links-hover {{(request()->is('admin/open_hours')) ? 'active' : ''}}">
            <a class="nav-link " href="{{ action('system\SystemController@office_hours')}}">
                <i class="fa fa-clock-o" aria-hidden="true"></i>
                <span>Otváracie hodiny</span>
            </a>
        </li>

    </ul>
</div>
<!-- End of Sidebar -->
