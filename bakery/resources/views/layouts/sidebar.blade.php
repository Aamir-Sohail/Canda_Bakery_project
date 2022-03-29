<style>
    .pcoded .pcoded-navbar .pcoded-item:after {
        content: "";
        background-color: #e4e9eb;
        width: 0%;
        height: 1px;
        position: absolute;
        left: 10%;
        bottom: 10px;
    }

</style>
<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <img class="img-80 img-radius" src="{{ asset('user.png') }}" alt="User-Profile-Image">
                <div class="user-details">
                    <span id="more-details">{{ \Auth::user()->name }}<i class="fa fa-caret-down"></i></span>
                </div>
            </div>

            <div class="main-menu-content">
                <ul>
                    <li class="more-details">

                        <a href="#!"><i class="ti-settings"></i>Settings</a>
                        <a href="{{ route('logout') }}"><i class="ti-layout-sidebar-left"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>



        <ul class="pcoded-item pcoded-left-item" style="margin-top: 3%">
            <li class="@if (Route::currentRouteName()=='dashboard' ) active @endif">
                <a href="{{ route('dashboard') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-desktop"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>


            <ul class="pcoded-item pcoded-left-item" style="border: none">
                <li class="@if (Route::currentRouteName()=='resturants' ) active @endif" style="border: none !important">
                    <a href="{{ route('resturants') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-desktop"></i><b>RS</b></span>
                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Resturants</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class="@if (Route::currentRouteName()=='bakers' ) active @endif">
                    <a href="{{ route('bakers') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-user"></i><b>BK</b></span>
                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Bakers</span>
                    </a>
                </li>
                <li class="@if (Route::currentRouteName()=='bread.types' ) active @endif">
                    <a href="{{ route('bread.types') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-layers-alt"></i><b>BT</b></span>
                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Bread Type</span>
                    </a>
                </li>
                <li class="@if (Route::currentRouteName()=='sheets' ) active @endif">
                    <a href="{{ route('sheets') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-layers-alt"></i><b>BT</b></span>
                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Sheets</span>
                    </a>
                </li>
            </ul>


        </ul>
    </div>
</nav>
