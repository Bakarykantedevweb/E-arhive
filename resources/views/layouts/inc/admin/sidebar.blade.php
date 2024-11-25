<div class="vertical-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{ url('admin/dashbord') }}" class="logo logo-dark"> <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span> <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="20">
            </span> </a>
        <a href="{{ url('admin/dashbord') }}" class="logo logo-light"> <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span> <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="20">
            </span> </a>
    </div>
    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn"> <i
            class="fa fa-fw fa-bars"></i> </button>
    <div data-simplebar class="sidebar-menu-scroll">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a href="{{ url('admin/dashbord') }}"> 
                        <i class="iconify " data-icon="uil-home-alt" data-inline="false"></i> 
                            <span>Tableau de Bord</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/ministeres') }}" class="waves-effect"> 
                        <i class="uil-calender"></i>
                        <span>Ministeres</span> 
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/positions') }}" class="waves-effect"> 
                        <i class="uil-calender"></i>
                        <span>Position</span> 
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/regimes') }}" class="waves-effect"> 
                        <i class="uil-calender"></i>
                        <span>Regime</span> 
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/classes') }}" class="waves-effect"> 
                        <i class="uil-calender"></i>
                        <span>Classe</span> 
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/echelons') }}" class="waves-effect"> 
                        <i class="uil-calender"></i>
                        <span>Echelon</span> 
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/natures') }}" class="waves-effect"> 
                        <i class="uil-calender"></i>
                        <span>Nature</span> 
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/mentions') }}" class="waves-effect"> 
                        <i class="uil-calender"></i>
                        <span>Mention</span> 
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>