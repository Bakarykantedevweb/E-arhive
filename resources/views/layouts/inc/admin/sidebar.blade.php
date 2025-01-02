<div class="vertical-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{ url('admin/dashbord') }}" class="logo logo-dark"> 
            <span class="logo-sm">
                E-Archive
            </span>
        </a>
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
                    <a href="javascript: void(0);" class="has-arrow waves-effect"> <i class="uil-user-circle"></i>
                        <span>Actes Administratifs</span> </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('admin/ministeres') }}">Ministere</a></li>
                        <li><a href="{{ url('admin/positions') }}">Position</a></li>
                        <li><a href="{{ url('admin/cadres') }}">Cadre</a></li>
                        <li><a href="{{ url('admin/categories') }}">Categorie</a></li>
                        <li><a href="{{ url('admin/corps') }}">Corps</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect"> <i class="uil-file-alt"></i>
                        <span>Actes aux Agents</span> </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('admin/regimes') }}">Regime</a></li>
                        <li><a href="{{ url('admin/classes') }}">Classe</a></li>
                        <li><a href="{{ url('admin/echelons') }}">Echelon</a></li>
                        <li><a href="{{ url('admin/natures') }}">Nature</a></li>
                        <li><a href="{{ url('admin/mentions') }}">Mention</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect"> <i class="uil-list-ul"></i> <span>Dossiers Personnel</span> </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('admin/arretes') }}">Arrete</a></li>
                        <li><a href="{{ url('admin/agents') }}">Agents</a></li>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
