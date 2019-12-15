<div class="admin-header">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <a class="sidebar-brand d-flex align-items-center justify-content-center"
           href="{{ action('system\SystemController@system')}}">
            <div class="sidebar-brand-icon">
                <i class="admin-ukf-logo"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Erasmus+</div>
        </a>

        <div class="sidebar-heading">
            Hlavné
        </div>

        <li class="nav-item admin-menu-links-hover @if($users = str_contains(url()->current(), "admin/users")) active @endif">
            <a class="nav-link" href="{{ action('system\UserController@users')}}">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>Používatelia</span>
            </a>
        </li>

        <li class="nav-item admin-menu-links-hover @if($users = str_contains(url()->current(), "admin/mobilities")) active @endif">
            <a class="nav-link" href="{{ action('system\MobilityController@mobilities')}}">
                <i class="fa fa-list-alt" aria-hidden="true"></i>
                <span>Mobility</span>
            </a>
        </li>

        <li class="nav-item admin-menu-links-hover @if($users = str_contains(url()->current(), "admin/season")) active @endif">
            <a class="nav-link" href="{{ action('system\SeasonController@season')}}">
                <i class="fa fa-ravelry" aria-hidden="true"></i>
                <span>Sezóny</span>
            </a>
        </li>

        <li class="nav-item admin-menu-links-hover @if($users = str_contains(url()->current(), "admin/universities")) active @endif">
            <a class="nav-link " href="{{ action('system\UniversityController@universities')}}">
                <i class="fa fa-university" aria-hidden="true"></i>
                <span>Univerzity</span>
            </a>
        </li>

        <div class="sidebar-heading">
            Ostatné
        </div>

        <li class="nav-item admin-menu-links-hover @if($users = str_contains(url()->current(), "admin/blogs")) active @endif">
            <a class="nav-link " href="{{ action('system\BlogController@blog')}}">
                <i class="fa fa-tag" aria-hidden="true"></i>
                <span>Spravovanie blogov</span>
            </a>
        </li>

        <li class="nav-item admin-menu-links-hover @if($users = str_contains(url()->current(), "admin/mobilities_category")) active @endif">
            <a class="nav-link" href="{{ action('system\CategoryMobilityController@mobility_category')}}">
                <i class="fa fa-list-alt" aria-hidden="true"></i>
                <span>Kategórie mobilít</span>
            </a>
        </li>

        <li class="nav-item admin-menu-links-hover @if($users = str_contains(url()->current(), "admin/mobility_type")) active @endif">
            <a class="nav-link" href="{{ action('system\TypeMobilityController@mobility_type')}}">
                <i class="fa fa-list-alt" aria-hidden="true"></i>
                <span>Typ mobility</span>
            </a>
        </li>

        <li class="nav-item admin-menu-links-hover @if($users = str_contains(url()->current(), "admin/roles")) active @endif">
            <a class="nav-link" href="{{ action('system\UserRoleController@roles')}}">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>Role používateľov</span>
            </a>
        </li>

        <li class="nav-item admin-menu-links-hover @if($users = str_contains(url()->current(), "admin/reviews")) active @endif">
            <a class="nav-link" href="{{ action('system\ReviewsController@reviews')}}">
                <i class="fa fa-telegram" aria-hidden="true"></i>
                <span>Hodnotenia</span>
            </a>
        </li>

        <li class="nav-item admin-menu-links-hover @if($users = str_contains(url()->current(), "admin/faq")) active @endif">
            <a class="nav-link " href="{{ action('system\FaqController@faq')}}">
                <i class="fa fa-question" aria-hidden="true"></i>
                <span>FAQ</span>
            </a>
        </li>

        <li class="nav-item admin-menu-links-hover @if($users = str_contains(url()->current(), "admin/open_hours")) active @endif">
            <a class="nav-link " href="{{ action('system\OfficeHourController@office_hours')}}">
                <i class="fa fa-clock-o" aria-hidden="true"></i>
                <span>Otváracie hodiny</span>
            </a>
        </li>

        <li class="nav-item admin-menu-links-hover @if($users = str_contains(url()->current(), "admin/countries")) active @endif">
            <a class="nav-link " href="{{ action('system\CountryController@countries')}}">
                <i class="fa fa-globe" aria-hidden="true"></i>
                <span>Krajiny</span>
            </a>
        </li>

    </ul>
</div>
